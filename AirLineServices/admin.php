<!Doctype HTML>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Admin</title>
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
            <h1 class="text-center">Add Admin</h1>
        </div>
    </div>
    <form id="addAdminForm">
        <div class="form-group row">
            <label class="col-md-2">Username</label>
            <div class="col-md-10"><input type="text" name="username" class="form-control" data-rule-required="true">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2">Password</label>
            <div class="col-md-4"><input type="password" name="password" id="password" class="form-control"
                                         data-rule-required="true">
            </div>
            <label class="col-md-2">Confirm Password</label>
            <div class="col-md-4"><input type="password" name="cpass" class="form-control" data-rule-required="true"
                                         data-rule-equalTo="#password">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-2">Name</label>
            <div class="col-md-10"><input type="text" name="name" class="form-control" data-rule-required="true">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2">User Type</label>
            <div class="col-md-10"><select name="usertype" class="form-control" data-rule-required="true">
                    <option value="">--Choose--</option>
                    <option>Admin</option>
                    <option>Sub Admin</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2"></label>
            <div class="col-md-10"><input type="button" name="addAdmin" class="btn btn-primary" value="Submit"
                                          onclick="addAdmin1()">
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