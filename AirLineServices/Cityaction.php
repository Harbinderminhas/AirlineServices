<?php
include "connection.php";
if (isset($_POST['addCity'])) {
    $city = $_POST['city'];
    $airpotCode = $_POST['airpotCode'];

    $s = "select * from city where  cityname='$city'";
    $result = mysqli_query($conn, $s);
    if (mysqli_num_rows($result) > 0) {
        echo 0;
    } else {
        $sql = "INSERT INTO `city`(`cityid`, `cityname`,`airportcode`) VALUES (null ,'$city','$airpotCode')";
        // echo $sql;
        mysqli_query($conn, $sql);
        echo 1;
    }
} elseif (isset($_POST['updateCity'])) {
    $city = $_POST['city'];
    $cityid = $_POST['cityid'];
    $airpotCode = $_POST['airpotCode'];

    $sql = "UPDATE `city` SET `cityname`='$city',`airportcode`='$airpotCode' WHERE `cityid`='$cityid'";
    mysqli_query($conn, $sql);
} elseif (isset($_REQUEST['q'])) {
    $cityid = $_REQUEST['q'];

    $s = "delete from city where cityid='$cityid'";
    mysqli_query($conn, $s);
} elseif ($_REQUEST['sourceCity']) {
    $sourceCity=$_REQUEST['sourceCity'];
    $ar = array();
    $num = 0;
    $s = "SELECT * FROM `flight` INNER JOIN city ON city.cityid=flight.destinationcity WHERE flight.sourcecity='$sourceCity' GROUP BY city.cityname";
    $result = mysqli_query($conn, $s);
    while ($row = mysqli_fetch_array($result)) {
        $ar[$num] = $row;
        $num++;
    }
    echo json_encode($ar);
} else {
    $ar = array();
    $num = 0;
    $s = "select * from City";
    $result = mysqli_query($conn, $s);
    while ($row = mysqli_fetch_array($result)) {
        $ar[$num] = $row;
        $num++;
    }
    echo json_encode($ar);
}
