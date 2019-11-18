<!Doctype HTML>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View City</title>
    <?php
    include "headerfiles.html";
    ?>
</head>
<body onload="getCity()">
<?php
include "adminheader.php";
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">View City</h1>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <th>Sr No.</th>
                <th>City Name</th>
                <th>Airpot Code</th>
                <th colspan="2">Controls</th>
            </tr>
            <tbody id="content"></tbody>
        </table>
    </div>
    <div ></div>
</div>
<div class="modal fade" id="editCityModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Edit City</h3>
                <a href="#" class="close" data-dismiss="modal">&times;</a>
            </div>
            <div class="modal-body">
                <form id="editCityForm">
                    <input type="hidden" name="cityid" id="cityid">
                    <div class="form-group row">
                        <label class="col-md-2">City</label>
                        <div class="col-md-10"><input type="text" name="city" id="city" class="form-control" data-rule-required="true">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">Airpot Code</label>
                        <div class="col-md-10"><input type="text" name="airpotCode" id="airportcode" class="form-control" data-rule-required="true">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2"></label>
                        <div class="col-md-10"><input type="button" name="updateCity" class="btn btn-primary" value="Submit"
                                                      onclick="updateCity1()">
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