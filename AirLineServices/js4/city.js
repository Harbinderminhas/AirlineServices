function addCity1() {
    if ($("#addCityForm").valid()) {
        var controls = document.getElementById("addCityForm").elements;
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
                    result = "<span class='text-danger'>City already Exist</span>";
                } else {
                    result = "<span class='text-success'>City Added Successfully</span>";
                }
                document.getElementById("output").innerHTML = result;
            }
        };
        httpreg.open("POST", "Cityaction.php", true);
        httpreg.send(formdata);
    }
}

function getCity() {
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
                tab += "<td>" + obj.cityname + "</td>";
                tab += "<td>" + obj.airportcode + "</td>";
                tab += "<td> <i onclick='removeCity(\"" + obj.cityid + "\")' " +
                    "class='fa fa-trash-alt text-danger' style='cursor: pointer;'></i> </td>";

                tab += "<td> <i onclick='editCity(" + JSON.stringify(obj) + ")' " +
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
    httpreg.open("get", "Cityaction.php", true);
    httpreg.send()
}

function editCity(obj) {
    $("#editCityModal").modal('show');
    document.getElementById("cityid").value = obj.cityid;
    document.getElementById("city").value = obj.cityname;
    document.getElementById("airportcode").value = obj.airportcode;
}

function updateCity1() {
    if ($("#editCityForm").valid()) {
        var controls = document.getElementById("editCityForm").elements;
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
                $("#editCityModal").modal('hide');
                getCity();
            }
        };
        httpreg.open("POST", "Cityaction.php", true);
        httpreg.send(formdata);
    }
}

function removeCity(cityid) {
    var rs = confirm("Are you sure to delete ?");
    if (rs) {
        var httpreg = new XMLHttpRequest();
        httpreg.onreadystatechange = function () {
            if (this.status == 200 && this.readyState == 4) {
                getCity();
            } else {
                // document.getElementById("btn1").innerHTML = "<span class='spinner-border'></span>";
            }
        };
        httpreg.open("GET", "Cityaction.php?q=" + cityid, true);
        httpreg.send()
    }
}