<?php
session_start();
$email = $_POST["email"];
$password = $_POST["password"];
include_once "connection.php";
$select = "select * from user where email='$email' and password='$password'";
//echo $select;
$result_data = mysqli_query($conn, $select);
if (mysqli_num_rows($result_data) > 0) {
    $row = mysqli_fetch_array($result_data);
    $_SESSION["useremail"] = $email;
    echo "success";

} else {
    echo "failed";
}
