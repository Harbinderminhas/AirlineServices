<?php
include "connection.php";
if (isset($_POST['addAdmin'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $usertype = $_POST['usertype'];

    $s = "select * from admin where  username='$username'";
    $result = mysqli_query($conn, $s);
    if (mysqli_num_rows($result) > 0) {
        echo 0;
    } else {
        $sql = "INSERT INTO `admin`(`username`, `password`, `name`, `usertype`) 
VALUES ('$username','$password','$name','$usertype')";
        // echo $sql;
        mysqli_query($conn, $sql);
        echo 1;
    }
} elseif (isset($_POST['updateAdmin'])) {
    $username = $_POST['username'];
    $name = $_POST['name'];
    $usertype = $_POST['usertype'];

    $sql = "UPDATE `admin` SET `name`='$name',`usertype`='$usertype' WHERE `username`='$username'";
    mysqli_query($conn, $sql);
} elseif (isset($_REQUEST['q'])) {
    $username = $_REQUEST['q'];

    $s = "delete from admin where username='$username'";
    mysqli_query($conn, $s);
} elseif (isset($_POST['adminChangePasswordbtn'])) {
    $username = $_POST['username'];
    $oldpass = $_POST['oldpass'];
    $password = $_POST['password'];

    $s = "select * from admin where username='$username'";
    $result = mysqli_query($conn, $s);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        if ($row['password'] == $oldpass) {
            $sql = "update admin set password='$password' where username='$username'";
            mysqli_query($conn, $sql);
            echo 0;
        } else {
            echo 1;
        }
    } else {
        echo 2;
    }
} else {
    $ar = array();
    $num = 0;
    $s = "select * from admin";
    $result = mysqli_query($conn, $s);
    while ($row = mysqli_fetch_array($result)) {
        $ar[$num] = $row;
        $num++;
    }
    echo json_encode($ar);
}
