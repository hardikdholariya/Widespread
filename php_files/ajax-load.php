<?php
$conn = mysqli_connect("localhost", "root", "kd@9913", "test") or die("connection failed.");
$sql = " SELECT * FROM students";
$result = mysqli_query($conn, $sql) or die("sql query failed");
$output = "";

if (mysqli_num_rows($result) > 0) {
    $output = '<table border="1" width="100%" cellspacing="0" cellpadding="10px">
    <tr>
        <th width="100px">Id</th>
        <th>Name</th>
        <th width="100px">Update</th>
        <th width="100px">Delete</th>
    </tr>';
    while ($row = mysqli_fetch_array($result)) {
        $output .= "<tr>
                    <td align='center'>{$row[0]}</td>
                    <td>{$row[1]} {$row[2]}</td>
                    <td><button class='edit-btn' data-eid='{$row[0]}'>Edit</button></td>
                    <td><button class='delete-btn' data-id='{$row[0]}'>Delete</button></td>
                    </tr>";
    }
    $output .= "</table>";
    mysqli_close($conn);
    echo $output;
} else {
    echo "<h2>no record found.</h2>";
}
echo "yes";
