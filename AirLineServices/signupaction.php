<?php
include "connection.php";
$email=$_POST['email'];
$password=$_POST['password'];
$name=$_POST['name'];

$s="select * from user where email='$email'";
$result=mysqli_query($conn,$s);
if(mysqli_num_rows($result)>0){
    echo 0;
}
else{
    $sql="INSERT INTO `user`(`email`, `password`, `name`) VALUES ('$email','$password','$name')";
    mysqli_query($conn,$sql);
    echo 1;
}