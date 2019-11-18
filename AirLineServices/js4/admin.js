function addAdmin1() {
    if ($("#addAdminForm").valid()) {
        var controls = document.getElementById("addAdminForm").elements;
        var formdata = new FormData();
        for (var i = 0; i < controls.length; i++) {
            if (controls[i].type == "file") {
                formdata.append(controls[i].name, controls[i].files[0]);
            } else {
                formdata.append(controls[i].name, controls[i].value);
            }

        }
        var httpreg = new XMLHttpRequest();
        httpreg.onreadystatechange = function () {
            if (this.status == 200 && this.readyState == 4) {
                var output = this.responseText;
                console.log(output);
                var result = '';
                if (output == 0) {
                    result = "<span class='text-danger'>Username already Exist</span>";
                } else {
                    result = "<span class='text-success'>Admin Added Successfully</span>";
                }
                document.getElementById("output").innerHTML = result;
            }
        };
        httpreg.open("POST", "adminaction.php", true);
        httpreg.send(formdata);
    }
}

function getAdmin() {
    var httpreg = new XMLHttpRequest();
    httpreg.onreadystatechange = function () {
        if (this.status == 200 && this.readyState == 4) {

            var ar = JSON.parse(this.response);

            var tab = "";
            var srno = 1;
            for (var x in ar) {
                obj = ar[x];
                tab += "<tr>";
                tab += "<td>" + srno + "</td>";
                tab += "<td>" + obj.username + "</td>";
                tab += "<td>" + obj.name + "</td>";
                tab += "<td>" + obj.usertype + "</td>";
                tab += "<td> <i onclick='removeAdmin(\"" + obj.username + "\")' " +
                    "class='fa fa-trash-alt text-danger' style='cursor: pointer;'></i> </td>";

                tab += "<td> <i onclick='editAdmin(" + JSON.stringify(obj) + ")' " +
                    "class='fa fa-edit text-warning' style='cursor: pointer;'></i> </td>";
                tab += "<td></td>";


                tab += "</tr>";
                srno++;
            }
            document.getElementById("content").innerHTML = tab;
        } else {
            document.getElementById("content").innerHTML = "<span class='spinner-border'></sapn>";
        }
    };
    httpreg.open("get", "adminaction.php", true);
    httpreg.send()
}

function editAdmin(obj) {
    $("#editAdminModal").modal('show');
    document.getElementById("username").value = obj.username;
    document.getElementById("adminname").value = obj.name;
    document.getElementById("usertype").value = obj.usertype;
}

function updateAdmin1() {
    if ($("#editAdminForm").valid()) {
        var controls = document.getElementById("editAdminForm").elements;
        var formdata = new FormData();
        for (var i = 0; i < controls.length; i++) {
            if (controls[i].type == "file") {
                formdata.append(controls[i].name, controls[i].files[0]);
            } else {
                formdata.append(controls[i].name, controls[i].value);
            }

        }
        var httpreg = new XMLHttpRequest();
        httpreg.onreadystatechange = function () {
            if (this.status == 200 && this.readyState == 4) {
                $("#editAdminModal").modal('hide');
                getAdmin();
            }
        };
        httpreg.open("POST", "adminaction.php", true);
        httpreg.send(formdata);
    }
}

function removeAdmin(email) {
    var rs = confirm("Are you sure to delete ?");
    if (rs) {
        var httpreg = new XMLHttpRequest();
        httpreg.onreadystatechange = function () {
            if (this.status == 200 && this.readyState == 4) {
                getAdmin();
            } else {
                // document.getElementById("btn1").innerHTML = "<span class='spinner-border'></span>";
            }
        };
        httpreg.open("GET", "adminaction.php?q=" + email, true);
        httpreg.send()
    }
}

function adminChangePassword() {
    if ($("#changePasswordForm").valid()) {
        var controls = document.getElementById("changePasswordForm").elements;
        var formdata = new FormData();
        for (var i = 0; i < controls.length; i++) {
            if (controls[i].type == "file") {
                formdata.append(controls[i].name, controls[i].files[0]);
            } else {
                formdata.append(controls[i].name, controls[i].value);
            }

        }
        var httpreg = new XMLHttpRequest();
        httpreg.onreadystatechange = function () {
            if (this.status == 200 && this.readyState == 4) {
                var output = this.responseText;
                var result = '';
                if (output == 0) {
                    result = "<span class='text-success'>Password Changed Successfully</span>";
                } else if (output == 1) {
                    result = "<span class='text-danger'>Invalid Password</span>";
                } else if (output == 2) {
                    result = "<span class='text-danger'>Username does not Exist</span>";
                }
                document.getElementById("output").innerHTML = result;
            }
        };
        httpreg.open("POST", "adminaction.php", true);
        httpreg.send(formdata);
    }
}