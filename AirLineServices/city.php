<!Doctype HTML>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add City</title>
    <?php
    include "headerfiles.html";
    ?>
</head>
<body>
<?php
include "adminheader.php";
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Add City</h1>
        </div>
    </div>
    <form id="addCityForm">
        <div class="form-group row">
            <label class="col-md-2">City</label>
            <div class="col-md-10"><input type="text" name="city" class="form-control" data-rule-required="true">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2">Airpot Code</label>
            <div class="col-md-10"><input type="text" name="airpotCode" class="form-control" data-rule-required="true">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2"></label>
            <div class="col-md-10"><input type="button" name="addCity" class="btn btn-primary" value="Submit"
                                          onclick="addCity1()">
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
<?php
include "footer.php";
?>
</body>
</html>