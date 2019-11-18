<!doctype html>
<html lang="en">
<head>
    <?php
    include_once "headerfiles.html";
    ?>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
<?php
include_once "adminheader.php";
?>

<div class="container">
    <form class="formvalidation" id="addFlightForm" method="post">
        <div class="form-group">
            <label>Flight Name</label>
            <input type="text" data-rule-required="true" name="flightname" id="flightname" class="form-control" d>
        </div>
        <div class="form-group">
            <label>Source</label>
            <select data-rule-required="true" name="sourcecity" id="sourcecity" class="form-control">
                <option value="">--Choose--</option>
                <?php
                $city = "select * from city";
                $city_result = mysqli_query($conn, $city);
                while ($city_row = mysqli_fetch_array($city_result)) {
                    ?>
                    <option value="<?php echo $city_row['cityid'] ?>"><?php echo $city_row['cityname'] ?></option>
                    <?php
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label>Destination City</label>
            <select data-rule-required="true" name="destinationcity" id="destinationcity" class="form-control">
                <option value="">--Choose--</option>
                <?php
                $city = "select * from city";
                $city_result = mysqli_query($conn, $city);
                while ($city_row = mysqli_fetch_array($city_result)) {
                    ?>
                    <option value="<?php echo $city_row['cityid'] ?>"><?php echo $city_row['cityname'] ?></option>
                    <?php
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label>Busness Price</label>
            <input type="number" data-rule-required="true" name="bPrice" id="bPrice" class="form-control">
        </div>


        <div class="form-group">
            <label>Economy Price</label>
            <input type="number" data-rule-required="true" name="ePrice" id="ePrice" class="form-control">
        </div>


        <div class="row mt-2">

            <div class="col-sm-6">
                <label>Monday</label>
                <select id="monday" name="monday" class="form-control">
                    <option value="">Select Day</option>
                    <option value="yes">YES</option>
                    <option value="no">NO</option>
                </select>
            </div>


            <div class="col-sm-6">
                <label>Tuesday</label>
                <select id="tuesday" name="tuesday" class="form-control">
                    <option value="">Select Day</option>
                    <option value="yes">YES</option>
                    <option value="no">NO</option>
                </select>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-sm-6">
                <label>Wednesday</label>
                <select id="wednesday" name="wednesday" class="form-control">
                    <option value="">Select Day</option>
                    <option value="yes">YES</option>
                    <option value="no">NO</option>
                </select>
            </div>


            <div class="col-sm-6">
                <label>Thursday</label>
                <select id="thurseday" name="thurseday" class="form-control">
                    <option value="">Select Day</option>
                    <option value="yes">YES</option>
                    <option value="no">NO</option>
                </select>
            </div>
        </div>


        <div class="row mt-2">
            <div class="col-sm-4">
                <label>Friday</label>
                <select id="friday" name="friday" class="form-control">
                    <option value="">Select Day</option>
                    <option value="yes">YES</option>
                    <option value="no">NO</option>
                </select>

            </div>


            <div class="col-sm-4">
                <label>Saturday</label>
                <select id="saturday" name="saturday" class="form-control">
                    <option value="">Select Day</option>
                    <option value="yes">YES</option>
                    <option value="no">NO</option>
                </select>
            </div>


            <div class="col-sm-4">
                <label>Sunday</label>
                <select id="sunday" name="sunday" class="form-control">
                    <option value="">Select Day</option>
                    <option value="yes">YES</option>
                    <option value="no">NO</option>
                </select>
            </div>
        </div>


        <div class="row mt-2">
            <div class="col-sm-6">
                <label>Start Time</label>
                <input type="time" data-rule-required="true" name="sTime" id="sTime" class="form-control">
            </div>

            <div class="col-sm-6">
                <label>End Time</label>
                <input type="time" data-rule-required="true" name="eTime" id="eTime" class="form-control">
            </div>
        </div>


        <div class="form-group">
            <label>Aircraft</label>
            <select id="aircraft" name="aircraft" class="form-control">
                <option>Aircraft 1</option>
                <option>Aircraft 2</option>
                <option>Aircraft 3</option>
            </select>
        </div>


        <div class="form-group">

            <button type="button" id="btnSignUp" name="addFlightBtn" value="signUp"
                    class="btn btn-primary" onclick="addFlight1()">SIGN UP
            </button>
            <label id="output"></label>
        </div>
    </form>
</div>
<?php
include "footer.php";
?>

</body>
</html>

