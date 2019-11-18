<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php
    include_once "headerfiles.html";
    ?>
</head>
<body>
<?php
include_once "adminheader.php";
?>
<div class="container">
    <form class="formvalidation" id="changePassword">

        <div class="form-group">
            <h1>Change Password</h1>
        </div>
        <div class="form-group">
            <label>Old Password</label>
            <input type="password" data-rule-required="true" name="oPassword" id="oPassword" class="form-control">
        </div>
        <div class="form-group">
            <label>New Password</label>
            <input type="password" data-rule-required="true" name="nPassword" id="nPassword" class="form-control">
        </div>

        <div class="container">
            <button type="button" onclick="UchangePassword()" id="btnPassword" name="submit" value="cPassword"
                    class="btn btn-primary">Submit
        </div>


    </form>
</div>

</body>
</html>

