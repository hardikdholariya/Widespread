<?php
class userValidation
{
    private $data = "";
    private $errors = [];
    private static $fields = ['email_address', 'name', 'uname', 'pass'];
    public function __construct($post_data)
    {
        $this->data = $post_data;
    }
    public function validateForm()
    {
        foreach (self::$fields as  $field) {
            if (!array_key_exists($field, $this->data)) {
                trigger_error("$field is not present in data.");
                return;
            }
        }

        $this->validateEmail();
        $this->validateFullname();
        $this->validateUsernmae();
        $this->validatePassword();
        return $this->errors;
    }
    private function validateEmail()
    {
        $emailAdders = $this->data['email_address'];
        if (empty($emailAdders)) {
            $this->addError('email_address', 'email cannot be empty.');
        } else {
            if (!filter_var($emailAdders, FILTER_VALIDATE_EMAIL)) {
                $this->addError('email_address', 'email not validate .');
            } else {
                $data = new Database;
                $countRole = $data->count('user', '*', null, "email='{$emailAdders}' AND verify=0");
                $count = $data->count('user', '*', null, "email='{$emailAdders}'");
                if ($countRole > 0) {
                    $data->delete('user', "email='{$emailAdders}' AND verify=0");
                } else {
                    if ($count > 0) {
                        $this->addError('email_address', 'email not validate .');
                    }
                }
            }
        }
    }
    private function validateFullname()
    {
        $fullname = $this->data['name'];
        if (empty($fullname)) {
            $this->addError('name', 'full name cannot be empty.');
        } else {
            if (!preg_match("/^([a-zA-Z' ]+)$/", $fullname)) {
                $this->addError('name', 'not enter spacial characters.');
            }
        }
    }
    private function validateUsernmae()
    {
        $uname = trim($this->data['uname']);
        if (empty($uname)) {
            $this->addError('uname', 'username cannot be empty.');
        } else {
            if (strlen($uname) < 7) {
                $this->addError('uname', 'more then 7 letters.');
            } else if ((preg_match("/[\'^£$%&*()}{@#~?><>,|=+¬-]/", $uname)) || (preg_match("/[A-Z]/", $uname))) {
                $this->addError('uname', 'not enter spacial characters.');
            } else {
                $data = new Database;
                $count = $data->count('user', '*', null, "username='{$uname}'");
                if ($count > 0) {
                    $this->addError('uname', 'not valid.');
                }
            }
        }
    }
    private function validatePassword()
    {
        $pwd = trim($this->data['pass']);
        if (empty($pwd)) {
            $this->addError('pass', 'password cannot be empty.');
        } else {
            if (!preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#", $pwd)) {
                $this->addError('pass', 'password wrong.');
            }
        }
    }

    private function addError($key, $value)
    {
        $this->errors[$key] = $value;
    }
}
class userDateValidation
{
    private $data = "";
    private static $fieldDate = ['dob'];
    private $errorDate = [];
    public function __construct($post_data)
    {
        $this->data = $post_data;
    }
    public function validateForm()
    {
        foreach (self::$fieldDate as  $field) {

            if (!array_key_exists($field, $this->data)) {
                trigger_error($field . "is not present in data.");
                return;
            }
        }

        $this->validateDate();
        return $this->errorDate;
    }
    private function validateDate()
    {
        $date = $this->data['dob'];
        if (empty($date)) {
            $this->errorDate['dob'] = false;
        }
    }
}

class frogotEmailDateValidation
{
    private $data = "";
    private static $fieldEmail = ['email'];
    private $errorEmail;
    public function __construct($post_data)
    {
        $this->data = $post_data;
    }
    public function validateForm()
    {
        foreach (self::$fieldEmail as  $field) {

            if (!array_key_exists($field, $this->data)) {
                trigger_error($field . "is not present in data.");
                return;
            }
        }
        $this->validateEmail();
        return $this->errorEmail;
    }
    private function validateEmail()
    {
        $email = $this->data['email'];
        if (empty($email)) {
            $this->errorEmail = false;
        } else {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->errorEmail = false;
            } else {
                $data = new Database;
                $countRole = $data->count('user', '*', null, "email='{$email}' AND verify=1");
                $count = $data->count('user', '*', null, "email='{$email}'");
                if ($countRole == 1) {
                    $this->errorEmail = true;
                } else {
                    $this->errorEmail = false;
                }
            }
        }
    }
}

class passwordValidation
{
    private $data = "";
    private static $fieldpass = ['password', 'cPassword'];
    private $errorpass;
    public function __construct($post_data)
    {
        $this->data = $post_data;
    }
    public function validateForm()
    {
        foreach (self::$fieldpass as  $field) {

            if (!array_key_exists($field, $this->data)) {
                trigger_error($field . "is not present in data.");
                return;
            }
        }
        $this->validatePassword();
        return $this->errorpass;
    }
    private function validatePassword()
    {
        $password = $this->data['password'];
        $cPassword = $this->data['cPassword'];

        if (empty($password) && empty($cPassword)) {
            $this->errorpass = false;
        } else {
            if (!preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#", $password)) {
                $this->errorpass = false;
            } else {
                if ($password == $cPassword) {
                    $this->errorpass = true;
                } else {
                    $this->errorpass = false;
                }
            }
        }
    }
}
