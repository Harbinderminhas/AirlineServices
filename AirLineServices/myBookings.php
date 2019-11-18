<!Doctype HTML>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Flight</title>
    <?php
    include "headerfiles.html";
    ?>
</head>
<body>
<?php
include "userHeader.php";
date_default_timezone_set('Asia/Kolkata');
?>
<div class="container"><br><br>
    <div class="form-group row">
        <label class="col-md-2">Source City</label>
        <div class="col-md-3">
            <select class="form-control" name="sourcecity" id="sourcecity1" onchange="chooseDestination(this.value)">
                <option value="">Source City</option>
                <?php
                $city = "SELECT * FROM `flight` INNER JOIN city ON city.cityid=flight.sourcecity GROUP BY city.cityname";
                $city_result = mysqli_query($conn, $city);
                while ($city_row = mysqli_fetch_array($city_result)) {
                    ?>
                    <option value="<?php echo $city_row['cityid'] ?>"><?php echo $city_row['cityname'] ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
        <label class="col-md-2">Destination City</label>
        <div class="col-md-3">
            <select class="form-control" name="destinationcity" id="destinationcity1">
                <option value="">Destination City</option>
            </select>
        </div>
        <div class="col-md-2"><input type="button" class="btn btn-primary" value="Go" onclick="getBookings('user')">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">My Bookings</h1>
        </div>
    </div>
    <div class="table-responsive" style="overflow-x: inherit">
        <table class="table">
            <tr>
                <th>Sr No.</th>
                <th>Booking Details</th>
                <th>Passenger Info</th>
            </tr>

            <tbody id="content"></tbody>
        </table>
    </div>
    <div></div>
</div>
<?php
include "footer.php";
?>
</body>
</html>