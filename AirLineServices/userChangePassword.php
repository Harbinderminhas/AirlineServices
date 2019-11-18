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
    <script>
        function userChangePassword1() {
            $("#UchangePassword").validate();
            if ($("#UchangePassword").valid())
                var controls = document.getElementById("UchangePassword").elements;
            var formdata = new FormData();
            for (var i = 0; i < controls.length; i++) {
                formdata.append(controls[i].name, controls[i].value);
            }
            var httpreg = new XMLHttpRequest();
            httpreg.onreadystatechange = function () {
                if (this.status == 200 && this.readyState == 4) {
                    var output = this.responseText;
                    console.log(output);
                    var result = '';
                    if (output == 0) {
                        result = "<span class='text-success'>Password changed successfully</span>";
                    } else if (output == 1) {
                        result = "<span class='text-danger'>Invalid Password</span>";
                    } else if (output == 2) {
                        result = "<span class='text-danger'>UserName Does Not Exist</span>";
                    }
                    document.getElementById("output").innerHTML = result;
                }
            };
            httpreg.open("POST", "userChangePasswordAction.php", true);
            httpreg.send(formdata);
        }
    </script>
</head>
<body>
<?php
include_once "userHeader.php";
?>
<div class="container">
    <form class="formvalidation" id="UchangePassword">
        <div class="form-group">
            <h1> User Change Password</h1>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" data-rule-required="true" value="<?php echo $email ?>" readonly name="email" id="email"
                   class="form-control">
        </div>
        <div class="form-group">
            <label>Old Password</label>
            <input type="password" data-rule-required="true" name="oPassword" id="oPassword" class="form-control">
        </div>
        <div class="form-group">
            <label>New Password</label>
            <input type="password" data-rule-required="true" name="nPassword" id="nPassword" class="form-control">
        </div>
        <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" data-rule-required="true" name="cPassword" id="cPassword" class="form-control">
        </div>
        <div class="container">
            <button type="button" onclick="userChangePassword1()" id="btnPassword" name="submit" value="cPassword"
                    class="btn btn-primary">Submit</button>
        </div>
        <div id="output"></div>
    </form>
</div>
<?php
include "footer.php";
?>
</body>
</html>

