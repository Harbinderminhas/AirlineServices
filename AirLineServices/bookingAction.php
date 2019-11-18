<?php
include "connection.php";
if (isset($_REQUEST['q'])) {
    $sourcecity = $_REQUEST['q'];
    $destinationcity = $_REQUEST['des'];
    $type = $_REQUEST['type'];

    $ar = array();
    $num = 0;
    if ($type == 'user') {
        @session_start();
        $email = $_SESSION["useremail"];
        $sql = "SELECT *,(SELECT city.cityname FROM city WHERE city.cityid=sourcecity) as sourcecityname,(SELECT city.cityname FROM city WHERE city.cityid=destinationcity) as destinationcityname FROM `booking` INNER JOIN user ON user.email=booking.email INNER JOIN flight ON flight.fid=booking.flightid WHERE flight.sourcecity='$sourcecity' AND flight.destinationcity='$destinationcity' and booking.email='$email'";
    } else {
        $sql = "SELECT *,(SELECT city.cityname FROM city WHERE city.cityid=sourcecity) as sourcecityname,(SELECT city.cityname FROM city WHERE city.cityid=destinationcity) as destinationcityname FROM `booking` INNER JOIN user ON user.email=booking.email INNER JOIN flight ON flight.fid=booking.flightid WHERE flight.sourcecity='$sourcecity' AND flight.destinationcity='$destinationcity'";
    }
    //echo $sql;
    $sql_result = mysqli_query($conn, $sql);
    while ($sql_row = mysqli_fetch_array($sql_result)) {
        $ar[$num] = $sql_row;

        $s = "SELECT * FROM `bookingdetail` where bookid='$sql_row[0]'";
        $result = mysqli_query($conn, $s);
        if (mysqli_num_rows($result) > 0) {
            $k = 0;
            while ($row = mysqli_fetch_array($result)) {
                $ar[$num]['detail'][$k] = $row;
                $k++;
            }

        } else {
            $ar[$num]['detail'][0] = "";
        }
        $num++;
    }
    echo json_encode($ar);

} else {
    @session_start();
    if (!isset($_SESSION["useremail"])) {

    } else {
        $email = $_SESSION["useremail"];
        $user = "SELECT * FROM `user` where email='$email'";
        $user_result = mysqli_query($conn, $user);
        $user_row = mysqli_fetch_array($user_result);
    }
    $dateoftravel = $_POST['dateoftravel'];
    $noofpassengers = $_POST['noofpassengers'];
    $fid = $_POST['fid'];
    $grandTotal = $_POST['grandTotal'];
    $dateofBooking = date('Y-m-d');

    $s = "INSERT INTO `booking`(`id`, `dateoftravel`, `passengers`, `flightid`, `email`, `grandtotal`, `dateofbooking`) 
VALUES (null ,'$dateoftravel','$noofpassengers','$fid','$email','$grandTotal','$dateofBooking')";

    $flight = "SELECT *,(SELECT city.cityname FROM city WHERE city.cityid=sourcecity) as sourcecityname,(SELECT city.cityname FROM city WHERE city.cityid=destinationcity) as destinationcityname FROM `flight` where fid='$fid'";
//echo $flight;
    $flight_result = mysqli_query($conn, $flight);
    $flight_row = mysqli_fetch_array($flight_result);

    mysqli_query($conn, $s);

    $bookingid = $conn->insert_id;

    $msg = "Thank you for Booking with us. Your Booking ID is " . $bookingid . " You are Travelling from " . $flight_row['sourcecityname'] . " To " . $flight_row['destinationcityname'] . " on " . $dateoftravel . ". Date of Booking " . $dateofBooking . ". No of Passengers " . $noofpassengers . "\nDetails are as Follows:-";
    exec("chcon -R -t httpd_sys_rw_content_t proofs");
    for ($i = 0; $i < $noofpassengers; $i++) {
        $price = $_POST['price-' . $i];
        $type = $_POST['type-' . $i];
        $seatno = $_POST['seatno-' . $i];
        $pname = $_POST['pname-' . $i];
        $age = $_POST['age-' . $i];
        $gender = $_POST['gender-' . $i];
        $proof = $_FILES['proof-' . $i]['name'];
        $tmp = $_FILES['proof-' . $i]['tmp_name'];

        $msg .= "Seat No. " . $seatno . "\n";
        $msg .= "Class: " . $type . "\n";
        $msg .= "Price: " . $price . "\n";
        $msg .= "Passenger Name: " . $pname . "\n";
        $msg .= "Age: " . $age . "\n";
        $msg .= "Gender: " . $gender . "\n";

        $path = $_SERVER['DOCUMENT_ROOT'] . "/proofs/" . $proof;
        // move_uploaded_file($tmp, $path);

        $sql = "INSERT INTO `bookingdetail`(`bdid`, `name`, `age`, `proof`, `gender`, `seatno`, `type`, `price`, `bookid`) 
VALUES (null ,'$pname','$age','$proof','$gender','$seatno','$type','$price','$bookingid')";
        mysqli_query($conn, $sql);
    }
    $msg .= "Grand Total " . $grandTotal;
    $ch = curl_init();
    $message = urlencode($msg);
    curl_setopt($ch, CURLOPT_URL, "http://server1.vmm.education/VMMCloudMessaging/AWS_SMS_Sender?");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,
        "username=JulyBatchPHP2019&password=PHFDUD2Y&message=" . $message . "&phone_numbers=" . $user_row['mobile']);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//print_r($ch);
    $server_output = curl_exec($ch);

    curl_close($ch);
    echo $bookingid;
}
