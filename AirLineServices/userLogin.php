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

        function userLoginFun() {
            var controls = document.getElementById("formlogin").elements;
            var formdata = new FormData();
            for (var i = 0; i < controls.length; i++) {
                formdata.append(controls[i].name, controls[i].value);
                console.log(controls[i].name, controls[i].value);
            }
            var httpreg = new XMLHttpRequest();
            httpreg.onreadystatechange = function () {
                if (this.status == 200 && this.readyState == 4) {
                    console.log(this.response);
                    if (this.response == "success") {
                        if (formdata.get("dateoftravel") == "") {
                            window.location.href = "user_home.php";
                        } else {
                            window.location.href = "chooseSeat.php?q=" + formdata.get("fid") + "&dateofTravel=" + formdata.get("dateoftravel");
                        }
                        // window.location.assign("admin_home.php");
                    } else {
                        document.getElementById("btnlogin").innerHTML = "<span class='text-danger'>Invalid Credentials</span>";
                    }
                } else {
                    document.getElementById("btnlogin").innerHTML = "<span class='spinner-border'></sapn>";
                }
            };

            httpreg.open("POST", "userchecklogin.php", true);
            httpreg.send(formdata)

        }

    </script>

</head>
<body>
<?php
include_once "publicheader.php";
if (isset($_REQUEST['q']) && isset($_REQUEST['date'])) {
    $fid = $_REQUEST['q'];
    $dateofTravel = $_REQUEST['date'];
} else {
    $fid = "";
    $dateofTravel = "";
}
?>

<div class="container">

    <form class="formvalidation" id="formlogin">
        <input type="hidden" name="dateoftravel" value="<?php echo $dateofTravel ?>">
        <input type="hidden" name="fid" value="<?php echo $fid; ?>">
        <div class="form-group">
            <label>Email</label>
            <input type="email" data-rule-required="true" name="email" id="email" class="form-control">
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" data-rule-required="true" name="password" id="password" class="form-control">
        </div>
        <div class="form-group">

            <button type="button" onclick="userLoginFun()" id="btnlogin" name="btnlogin" value="Login"
                    class="btn btn-primary">Login
            </button>
            <label id="result"></label>
        </div>


    </form>
</div>
<?php
include "footer.php";
?>
</body>
</html>
