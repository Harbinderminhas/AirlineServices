<!Doctype HTML>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Admin</title>
    <?php
    include "headerfiles.html";
    ?>
</head>
<body onload="getAdmin()">
<?php
include "adminheader.php";
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">View Admin</h1>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <th>Sr No.</th>
                <th>Username</th>
                <th>Name</th>
                <th>UserType</th>
                <th colspan="2">Controls</th>
            </tr>
            <tbody id="content"></tbody>
        </table>
    </div>
    <div ></div>
</div>
<div class="modal fade" id="editAdminModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Edit admin</h3>
                <a href="#" class="close" data-dismiss="modal">&times;</a>
            </div>
            <div class="modal-body">
                <form id="editAdminForm">
                    <div class="form-group row">
                        <label class="col-md-2">Username</label>
                        <div class="col-md-10"><input type="text" name="username" id="username" readonly class="form-control" data-rule-required="true">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">Name</label>
                        <div class="col-md-10"><input type="text" name="name" id="adminname" class="form-control" data-rule-required="true">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">User Type</label>
                        <div class="col-md-10"><select name="usertype" id="usertype" class="form-control" data-rule-required="true">
                                <option value="">--Choose--</option>
                                <option>Admin</option>
                                <option>Sub Admin</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2"></label>
                        <div class="col-md-10"><input type="button" name="updateAdmin" class="btn btn-primary" value="Submit"
                                                      onclick="updateAdmin1()">
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