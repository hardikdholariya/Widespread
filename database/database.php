<?php

class Database
{

    private $db_host = "localhost";
    private $db_user = "root";
    private $db_pass = "kd@9913";
    private $db_name = "widespread";


    public $mysqli = "";
    private $result = array();
    private $conn = false;

    public function __construct()
    {
        if (!$this->conn) {
            $this->mysqli = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
            $this->conn = true;
            if ($this->mysqli->connect_error) {
                array_push($this->result, $this->mysqli->connect_error);
                return false;
            }
        } else {
            return true;
        }
    }

    // Function to insert into the database
    public function insert($table, $params = array())
    {
        // Check to see if the table exists
        if ($this->tableExists($table)) {
            $table_columns = implode(', ', array_keys($params));

            $escaped_values = array_map(array($this->mysqli, 'real_escape_string'), array_values($params));

            $table_value = implode("', '", $escaped_values);

            $sql = "INSERT INTO `{$table}` ($table_columns) VALUES ('$table_value')";

            if ($this->mysqli->query($sql)) {
                array_push($this->result, $this->mysqli->insert_id);
                return true; // The data has been inserted
            } else {
                array_push($this->result, $this->mysqli->error);
                return false; // The data has not been inserted
            }
        } else {
            return false; // Table does not exist
        }
    }

    // Function to update row in database
    public function update($table, $params = array(), $where = null)
    {
        // Check to see if table exists
        if ($this->tableExists($table)) {
            // Create Array to hold all the columns to update
            $args = array();
            foreach ($params as $key => $value) {
                $args[] = "$key = '{$this->mysqli->real_escape_string($value)}'";
            }

            $sql = "UPDATE `{$table}` SET " . implode(', ', $args);
            if ($where != null) {
                $sql .= " WHERE $where";
            }
            // echo $sql;
            // Make query to database
            if ($this->mysqli->query($sql)) {
                array_push($this->result, $this->mysqli->affected_rows);
                return true; // Update has been successful
            } else {
                array_push($this->result, $this->mysqli->error);
                return false; // Update has not been successful
            }
        } else {
            return false; // The table does not exist
        }
    }

    //Function to delete table or row(s) from database
    public function delete($table, $where = null)
    {
        // Check to see if table exists
        if ($this->tableExists($table)) {
            $sql = "DELETE FROM `{$table}`";  // Create query to delete rows
            if ($where != null) {
                $sql .= " WHERE $where";
            }
            // Submit query to database
            if ($this->mysqli->query($sql)) {
                array_push($this->result, $this->mysqli->affected_rows);
                return true; // The query exectued correctly
            } else {
                array_push($this->result, $this->mysqli->error);
                return false; // The query did not execute correctly
            }
        } else {
            return false; // The table does not exist
        }
    }

    // Function to SELECT from the database
    public function select($table, $rows = "*", $join = null, $where = null, $order = null, $limit = null)
    {
        // Check to see if the table exists
        if ($this->tableExists($table)) {
            // Create query from the variables passed to the function
            $sql = "SELECT $rows FROM `{$table}`";
            if ($join != null) {
                $sql .= " JOIN $join";
            }
            if ($where != null) {
                $sql .= " WHERE $where";
            }
            if ($order != null) {
                $sql .= " ORDER BY $order";
            }
            if ($limit != null) {
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                } else {
                    $page = 1;
                }
                $start = ($page - 1) * $limit;
                $sql .= " LIMIT $start,$limit";
            }

            // echo $sql;

            $query = $this->mysqli->query($sql);

            if ($query) {
                $this->result = $query->fetch_all(MYSQLI_ASSOC);
                return true; // Query was successful
            } else {
                array_push($this->result, $this->mysqli->error);
                return false; // No rows were returned
            }
        } else {
            return false; // Table does not exist
        }
    }

    // FUNCTION to show Pagination
    public function pagination($table, $join = null, $where = null, $limit = null)
    {
        // Check to see if table exists
        if ($this->tableExists($table)) {
            if ($limit != null) {
                // select count() query for pagination
                $sql = "SELECT COUNT(*) FROM `{$table}`";
                if ($join != null) {
                    $sql .= " JOIN $join";
                }
                if ($where != null) {
                    $sql .= " WHERE $where";
                }

                $query = $this->mysqli->query($sql);

                $total_record = $query->fetch_array();
                $total_record = $total_record[0];

                $total_page = ceil($total_record / $limit);

                $url = basename($_SERVER['PHP_SELF']);
                // Get the Page Number which is set in URL
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                } else {
                    $page = 1;
                }
                // show pagination
                $output = "<ul class='pagination'>";

                if ($page > 1) {
                    $output .= "<li><a href='$url?page=" . ($page - 1) . "'>Prev</a></li>";
                }

                if ($total_record > $limit) {
                    for ($i = 1; $i <= $total_page; $i++) {
                        if ($i == $page) {
                            $cls = "class='active'";
                        } else {
                            $cls = "";
                        }
                        $output .= "<li><a $cls href='$url?page=$i'>$i</a></li>";
                    }
                }
                if ($total_page > $page) {
                    $output .= "<li><a href='$url?page=" . ($page + 1) . "'>Next</a></li>";
                }
                $output .= "</ul>";

                // echo $output;
            } else {
                return false; // If Limit is null
            }
        } else {
            return false; // Table does not exist
        }
    }

    public function sql($sql)
    {
        $query = $this->mysqli->query($sql);

        if ($query) {
            $this->result = $query->fetch_all(MYSQLI_ASSOC);
            return true; // Query was successful
        } else {
            array_push($this->result, $this->mysqli->error);
            return false; // No rows were returned
        }
    }

    // Private function to check if table exists for use with queries
    public function tableExists($table)
    {
        $sql = "SHOW TABLES FROM $this->db_name LIKE '$table'";
        $tableInDb = $this->mysqli->query($sql);
        if ($tableInDb) {
            if ($tableInDb->num_rows == 1) {
                return true; // The table exists
            } else {
                array_push($this->result, $table . " does not exist in this database.");
                return false; // The table does not exist
            }
        }
    }

    // count row of data
    public function count($table, $rows = "*", $join = null, $where = null)
    {
        // Check to see if the table exists
        if ($this->tableExists($table)) {
            // Create query from the variables passed to the function
            $sql = "SELECT $rows FROM `{$table}`";
            if ($join != null) {
                $sql .= " JOIN $join";
            }
            if ($where != null) {
                $sql .= " WHERE $where";
            }
            $query = $this->mysqli->query($sql);
            if ($query) {
                return $query->num_rows;
                // Query was successful
            } else {
                array_push($this->result, $this->mysqli->error);
                return false; // No rows were returned
            }
        } else {
            return false; // Table does not exist
        }
    }

    // session
    public function login($username, $pass)
    {
        $username = $this->mysqli->real_escape_string($username);
        $pass = $this->mysqli->real_escape_string($pass);
        $sql = "SELECT * FROM `user` WHERE username='$username' AND password='$pass' AND verify=1";
        $check = $this->mysqli->query($sql);
        $query = $check->fetch_array(MYSQLI_ASSOC);
        $result = $check->num_rows;
        if ($result == 1) {
            // session_start();

            setcookie("login", true, time() + (86400 * 30), "/");
            setcookie("id", $query['username'], time() + (86400 * 30), "/");
            // $_SESSION['login'] = true;
            // $_SESSION['id'] = $query['username'];
            return true;
        } else {
            array_push($this->result, $this->mysqli->error);
            return false;
        }
    }

    public function createTable($sql)
    {
        $query = $this->mysqli->query($sql);
        if ($query) {
            return true; // Query was successful
        } else {
            array_push($this->result, $this->mysqli->error);
            return false; // No rows were returned
        }
    }
    public function session()
    {

        if (isset($_COOKIE['login'])) {
            return $_COOKIE['login'];
        } else {
            return false;
        }
    }

    public function logout()
    {
        setcookie("login", false, time() - (86400 * 30), "/");
        setcookie("id", "", time() - (86400 * 30), "/");
    }
    // Public function to return the data to the user
    public function getResult()
    {
        $val = $this->result;
        $this->result = array();
        return $val;
    }

    // close connection
    public function __destruct()
    {
        if ($this->conn) {
            if ($this->mysqli->close()) {
                $this->conn = false;
                return true;
            }
        } else {
            return false;
        }
    }
} //Class Close


// $account_name = $_COOKIE['id'];
// $username_ff = "dk_9089";

// $following_name = $account_name . 'following';
// $followers_name = $username_ff . 'followers';

// $data = new Database;

// $data->select('user', 'username,following, followers', null, "username = '{$account_name}' OR username = '{$username_ff}'");

// $result = $data->getResult();
// // print_r($result);

// if (($data->delete($following_name, "following = '{$username_ff}'")) && ($data->delete($followers_name, "followers = '{$account_name}'"))) {

//     $data->update('user', ['following' => $result[1]['following'] - 1], "username='{$account_name}'");

//     $data->update('user', ['followers' => $result[0]['followers'] - 1], "username='{$username_ff}'");

//     echo "yes";
// } else {
//     echo "no";
// }
// print_r($result);
