<?php
$conn=mysqli_connect("localhost","root","","airlineservice");
if(!$conn)
{
    die( "connection failed due to ". mysqli_connect_error());
}