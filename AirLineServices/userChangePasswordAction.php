<?php
include "connection.php";

$email = $_POST['email'];
$oPassword = $_POST['oPassword'];
$nPassword = $_POST['nPassword'];

$s = "select * from user where email='$email'";
$result = mysqli_query($conn, $s);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_array($result);
    if ($row['password'] == $oPassword) {
        $sql="update user set password='$nPassword' where email='$email'";
        mysqli_query($conn,$sql);
        echo 0;
    } else {
        echo 1;
    }
} else {
    echo 2;
}