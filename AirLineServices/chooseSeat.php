<!DOCTYPE html>
<html lang="zxx">
<head>
    <?php
    include "headerfiles.html";
    ?>
</head>

<body>
<?php
@session_start();
if (!isset($_SESSION["useremail"])) {
    include "publicHeader.php";
    $email = "";
} else {
    include "userHeader.php";
    $email = $_SESSION["useremail"];
}


$fid = $_REQUEST['q'];

$dateofTravel = $_REQUEST['dateofTravel'];
$day = strtolower(date('l', strtotime($dateofTravel)));
$s = "SELECT *,(SELECT city.cityname FROM city WHERE city.cityid=sourcecity) as sourcecityname,(SELECT city.cityname FROM city WHERE city.cityid=destinationcity) as destinationcityname FROM `flight` where fid='$fid'";
$result = mysqli_query($conn, $s);
$row = mysqli_fetch_array($result);


$booked = "SELECT * FROM booking INNER JOIN bookingdetail ON `bookingdetail`.`bookid`=booking.id WHERE `dateoftravel`='$dateofTravel' and `flightid`='$fid'";
//echo $booked;
$booked_result = mysqli_query($conn, $booked);

$data = array();
$num = 0;
while ($book_row = mysqli_fetch_array($booked_result)) {
    $data[$num] = array("seatno" => $book_row['seatno'], "type" => $book_row['type']);
    $num++;
}
$arData = $data;
function disablSeat($seatno, $type)
{
    global $arData;
    $rt = "";
    foreach ($arData as $x) {
        if ($x['seatno'] == $seatno && $x['type'] == $type) {
            $rt = true;
        }
    }
    return $rt;
}
?>
<!-- banner -->

<!--//banner -->
<!--About-->
<div class="about" id="about">
    <div class="container">
        <h5 class="headerText">You are Looking for Flights from <i><?php echo $row['sourcecityname'] ?></i> To
            <i><?php echo $row['destinationcityname'] ?></i> on <i><?php echo $dateofTravel; ?> (<?php echo $day ?>)</i>
        </h5>
        <br>
        <br>
        <div class="about-inner-grids">
            <div class="row">
                <div class="col-md-7"><?php include $row['aircraft'] . ".php"; ?></div>
                <div class="col-md-5">
                    <br><br>
                    <h3 class="text-center">Your Booking Details</h3>
                    <br><br>
                    <div class="panel panel-info">
                        <div class="panel-heading">Your Choosen Seats</div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th>Sr No.</th>
                                        <th>Seat No.</th>
                                        <th>Class</th>
                                        <th>Price</th>
                                    </tr>
                                    <tbody id="seatsContent"></tbody>
                                </table>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <input type="hidden" name="grandTotalVal" id="grandTotalVal">
                            <b>Grand Total: </b> <span id="grandTotal"></span>
                            <div class="text-right"><input type="button" class="btn btn-primary" value="Next"
                                                           onclick="passengerDetails('<?php echo $email ?>','<?php echo $dateofTravel ?>',<?php echo $fid ?>)">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<div class="modal" tabindex="-1" role="dialog" id="passengerModal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Passenger Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="passengerList"></div>
            </div>
            <div class="modal-footer">
                <div id="output"></div>
                <button type="button" class="btn btn-primary" onclick="payNow()">Pay Now</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php
include "footer.php";
?>
</body>
</html>