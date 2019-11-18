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
include "adminheader.php";
date_default_timezone_set('Asia/Kolkata');
?>
<div class="container"><br><br>
    <div class="form-group row">
        <label class="col-md-2">Source City</label>
        <div class="col-md-3">
            <select class="form-control" name="sourcecity" id="sourcecity">
                <option value="">--Choose--</option>
                <?php
                $city = "select * from city";
                $city_result = mysqli_query($conn, $city);
                while ($city_row = mysqli_fetch_array($city_result)) {
                    ?>
                    <option value="<?php echo $city_row[0] ?>"><?php echo $city_row[1] ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
        <label class="col-md-2">Destination City</label>
        <div class="col-md-3">
            <select class="form-control" name="destinationcity" id="destinationcity">
                <option value="">--Choose--</option>
                <?php
                $city = "select * from city";
                $city_result = mysqli_query($conn, $city);
                while ($city_row = mysqli_fetch_array($city_result)) {
                    ?>
                    <option value="<?php echo $city_row[0] ?>"><?php echo $city_row[1] ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div class="col-md-2"><input type="button" class="btn btn-primary" value="Go" onclick="getFlight()"></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">View Flight</h1>
        </div>
    </div>
    <div class="table-responsive" style="overflow-x: inherit">
        <table class="table">
            <tr>
                <th rowspan="2">Sr No.</th>
                <th rowspan="2">Flight Name</th>
                <th colspan="2">Price</th>
                <th colspan="7">Days of Working</th>
                <th colspan="2">Timings</th>
                <th rowspan="2">Aircraft</th>
                <th colspan="2" rowspan="2">Controls</th>
            </tr>
            <tr>
                <th>Business Class</th>
                <th>Economy Class</th>
                <th>Monday</th>
                <th>Tuesday</th>
                <th>Wednesday</th>
                <th>Thursday</th>
                <th>Friday</th>
                <th>Saturday</th>
                <th>Sunday</th>
                <th>Start Time</th>
                <th>End Time</th>
            </tr>
            <tbody id="content"></tbody>
        </table>
    </div>
    <div></div>
</div>
<div class="modal fade" id="editFlightModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Edit Flight</h3>
                <a href="#" class="close" data-dismiss="modal">&times;</a>
            </div>
            <div class="modal-body">
                <form id="editFlightForm">
                    <input type="hidden" name="Flightid" id="Flightid">
                    <div class="form-group">
                        <label>Flight Name</label>
                        <input type="text" data-rule-required="true" name="flightname" id="flightname"
                               class="form-control" d>
                    </div>
                    <div class="form-group">
                        <label>Source</label>
                        <select data-rule-required="true" name="sourcecity" id="sourcecityModal" class="form-control">
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
                        <select data-rule-required="true" name="destinationcity" id="destinationcityModal"
                                class="form-control">
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
                    <div class="form-group row">
                        <label class="col-md-2"></label>
                        <div class="col-md-10"><input type="button" name="updateFlight" class="btn btn-primary"
                                                      value="Submit"
                                                      onclick="updateFlight1()">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2"></label>
                        <div class="col-md-10">
                            <div id="output"></div>
                        </div>
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button class="close" data-dismiss="modal">close</button>
            </div>
        </div>
    </div>
</div>
<?php
include "footer.php";
?>
</body>
</html>