
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

        function checkloginfun() {
            var controls = document.getElementById("formlogin").elements;
            var formdata= new FormData();
            for (var i=0; i<controls.length;i++) {
                formdata.append(controls[i].name, controls[i].value);
                console.log(controls[i].name, controls[i].value);
            }
            var httpreg = new XMLHttpRequest();
            httpreg.onreadystatechange = function () {
                if (this.status == 200 && this.readyState == 4) {
                    if(this.response=="success")
                    {
                        window.location.href="admin_home.php";
                        // window.location.assign("admin_home.php");
                    }
                    document.getElementById("result").innerHTML = this.response;
                    document.getElementById("btnlogin"). innerHTML = "Login";
                } else {
                    document.getElementById("btnlogin").innerHTML = "<span class='spinner-border'></sapn>";
                }
            };

            httpreg.open("POST", "checklogin.php", true);
            httpreg.send(formdata)

        }








    </script>

</head>
<body>
<?php
include_once "publicheader.php";
?>
<div class="inner_page_about">

</div>
<div class="container">

    <form class="formvalidation" id="formlogin">
        <div class="form-group">
            <label>Username</label>
            <input type="text" data-rule-required="true" name="username" id="username" class="form-control">
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" data-rule-required="true" name="password" id="password" class="form-control">
        </div>
        <div class="form-group">
            <!---->
            <!--            <button type="button" id="btnlogin" name="submit" value="Login" onclick="checklogin()"-->
            <!--                    class="btn btn-primary">Login-->
            <!--            </button>-->
            <button type="button" onclick="checkloginfun()" id="btnlogin" name="btnlogin" value="Login"
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