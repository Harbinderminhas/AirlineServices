<!Doctype HTML>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Change Password</title>
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
            <h1 class="text-center">Change Password</h1>
        </div>
    </div>
    <form id="changePasswordForm">
        <div class="form-group row">
            <label class="col-md-2">Username</label>
            <div class="col-md-10"><input type="text" name="username" value="<?php echo $username; ?>" readonly
                                          class="form-control" data-rule-required="true">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2">Old Password</label>
            <div class="col-md-10"><input type="password" name="oldpass" class="form-control" data-rule-required="true">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2">New Password</label>
            <div class="col-md-4"><input type="password" name="password" id="password" class="form-control"
                                         data-rule-required="true">
            </div>
            <label class="col-md-2">Confirm Password</label>
            <div class="col-md-4"><input type="password" name="cpass" class="form-control" data-rule-required="true"
                                         data-rule-equalTo="#password">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2"></label>
            <div class="col-md-10"><input type="button" name="adminChangePasswordbtn" class="btn btn-primary" value="Submit"
                                          onclick="adminChangePassword()">
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
</body>
</html>