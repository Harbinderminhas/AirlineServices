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
<script>
    function userLogin() {
        $("#formLogin").validate();
        if ($("#formLogin").valid()) {
            var controls = document.getElementById("formLogin").elements;
            var formdata = new FormData();
            var httpreg = new XMLHttpRequest();
            for (var i = 0; i < controls.length; i++) {

                formdata.append(controls[i].name, controls[i].value);
                console.log(controls[i].name, controls[i].value)
            }
            httpreg.onreadystatechange = function () {
                if (this.status = 200 && this.readyState == 4) {
                    var output=this.responseText;
                    var result='';
                    if(output==0){
                        result='<span class="text-danger">Email already Exist</span>';
                    }
                    else {
                        result='<span class="text-success">You have Signup Successfully</span>';
                    }
                    document.getElementById("result").innerHTML=result;
                }
            };
            httpreg.open("post", "signupaction.php", true);
            httpreg.send(formdata)
        }
    }
</script>

<body>
<?php
include "publicHeader.php";
?>


<div class="container">
    <form class="formvalidation" id="formLogin" method="post" >
        <div class="form-group">
            <label>Email</label>
            <input type="email" data-rule-required="true" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" data-rule-required="true" name="password" id="password" class="form-control">
        </div>

        <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" data-rule-required="true" name="CPassword" id="CPassword" class="form-control">
        </div>

        <div class="form-group">
            <label>Name</label>
            <input type="text" data-rule-required="true" name="name" id="name" class="form-control">
        </div>

        <div class="form-group">

            <button type="button" id="btnSignUp" name="buttonSignUp" value="signUp"
                    class="btn btn-primary" onclick="userLogin()">SIGN UP
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
