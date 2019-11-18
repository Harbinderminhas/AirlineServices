function addFlight1() {
    if ($("#addFlightForm").valid()) {
        var controls = document.getElementById("addFlightForm").elements;
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
                //  alert(output);
                console.log(output);
                var result = '';
                if (output == 0) {
                    result = "<span class='text-danger'>Flight already Exist</span>";
                } else if (output == 2) {
                    result = "<span class='text-danger'>Start and End Time should not be the Same</span>";
                } else if (output == 3) {
                    result = "<span class='text-danger'>Source and Destination City should not be the Same</span>";
                } else {
                    result = "<span class='text-success'>Flight Added Successfully</span>";
                }
                document.getElementById("output").innerHTML = result;
            }
        };
        httpreg.open("POST", "Flightaction.php", true);
        httpreg.send(formdata);
    }
}

function getFlight() {
    var sourcecity = document.getElementById("sourcecity").value;
    var destinationcity = document.getElementById("destinationcity").value;
    var httpreg = new XMLHttpRequest();
    httpreg.onreadystatechange = function () {
        if (this.status == 200 && this.readyState == 4) {
            var output = this.responseText;
            if (output == 0) {
                tab += "<tr>" +
                    "<td colspan='16'>No Data Found</td>" +
                    "</tr>";
            } else {
                var ar = JSON.parse(this.response);

                var tab = "";
                var srno = 1;
                for (var x in ar) {
                    obj = ar[x];
                    tab += "<tr>";
                    tab += "<td>" + srno + "</td>";
                    tab += "<td>" + obj.flightname + "</td>";
                    tab += "<td>" + obj.businessclass + "</td>";
                    tab += "<td>" + obj.economyclass + "</td>";
                    tab += "<td>" + obj.monday + "</td>";
                    tab += "<td>" + obj.Tuesday + "</td>";
                    tab += "<td>" + obj.Wednesday + "</td>";
                    tab += "<td>" + obj.thursday + "</td>";
                    tab += "<td>" + obj.friday + "</td>";
                    tab += "<td>" + obj.Saturday + "</td>";
                    tab += "<td>" + obj.sunday + "</td>";
                    tab += "<td>" + obj.starttime + "</td>";
                    tab += "<td>" + obj.endtime + "</td>";
                    tab += "<td>" + obj.aircraft + "</td>";
                    tab += "<td> <i onclick='removeFlight(\"" + obj.fid + "\")' " +
                        "class='fa fa-trash-alt text-danger' style='cursor: pointer;'></i> </td>";

                    tab += "<td> <i onclick='editFlight(" + JSON.stringify(obj) + ")' " +
                        "class='fa fa-edit text-warning' style='cursor: pointer;'></i> </td>";
                    tab += "<td></td>";


                    tab += "</tr>";
                    srno++;
                }
            }
            document.getElementById("content").innerHTML = tab;
        } else {
            document.getElementById("content").innerHTML = "<span class='spinner-border'></sapn>";
        }
    };
    httpreg.open("get", "Flightaction.php?sourcecity=" + sourcecity + "&destinationcity=" + destinationcity, true);
    httpreg.send()
}

function editFlight(obj) {
    $("#editFlightModal").modal('show');
    document.getElementById("Flightid").value = obj.fid;
    document.getElementById("flightname").value = obj.flightname;
    document.getElementById("sourcecityModal").value = obj.sourcecity;
    document.getElementById("destinationcityModal").value = obj.destinationcity;
    document.getElementById("bPrice").value = obj.businessclass;
    document.getElementById("ePrice").value = obj.economyclass;
    document.getElementById("monday").value = obj.monday;
    document.getElementById("tuesday").value = obj.Tuesday;
    document.getElementById("wednesday").value = obj.Wednesday;
    document.getElementById("thurseday").value = obj.thursday;
    document.getElementById("friday").value = obj.friday;
    document.getElementById("saturday").value = obj.Saturday;
    document.getElementById("sunday").value = obj.sunday;
    document.getElementById("sTime").value = obj.starttime;
    document.getElementById("eTime").value = obj.endtime;
    document.getElementById("aircraft").value = obj.aircraft;
}

function updateFlight1() {
    if ($("#editFlightForm").valid()) {
        var controls = document.getElementById("editFlightForm").elements;
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
                if (output == 0) {
                    alert("Start and End Time Should not be the Same");
                } else if (output == 1) {
                    alert("Source and Destination City Should not be the same");
                } else if (output==2){
                    $("#editFlightModal").modal('hide');
                    getFlight();
                }
            }
        };
        httpreg.open("POST", "Flightaction.php", true);
        httpreg.send(formdata);
    }
}

function removeFlight(Flightid) {
    var rs = confirm("Are you sure to delete ?");
    if (rs) {
        var httpreg = new XMLHttpRequest();
        httpreg.onreadystatechange = function () {
            if (this.status == 200 && this.readyState == 4) {
                getFlight();
            } else {
                // document.getElementById("btn1").innerHTML = "<span class='spinner-border'></span>";
            }
        };
        httpreg.open("GET", "Flightaction.php?q=" + Flightid, true);
        httpreg.send()
    }
}