<?php
session_start();
$username = $_REQUEST["username"];
$password = $_REQUEST["password"];
include_once "connection.php";
$select = "select * from admin where username='$username' and password='$password'";
//echo $select;
$result_data = mysqli_query($conn, $select);
if (mysqli_num_rows($result_data) > 0) {
    $row = mysqli_fetch_array($result_data);
    $_SESSION["admin_username"] = $username;
    $_SESSION["display_name"] = $row[2];
    echo "success";

} else {
    echo "failed";
}
