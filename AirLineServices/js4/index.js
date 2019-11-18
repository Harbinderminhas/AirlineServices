$(document).ready(function () {
    $("#dateofPickup").datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: "yy-mm-dd",
        minDate: 0
    })
});

function chooseDestination(sourceCity) {
    var httpreg = new XMLHttpRequest();
    httpreg.onreadystatechange = function () {
        if (this.status == 200 && this.readyState == 4) {
            var ar = JSON.parse(this.response);
            //console.log(ar);
            var sel = '<select class="form-control" name="destinationcity" id="destinationcity">' +
                '<option value="">Destination City</option>';
            for (var x in ar) {
                obj = ar[x];
                sel += '<option value="' + obj.cityid + '">' + obj.cityname + '</option>';
            }
            sel += '</select>';
            //alert(sel);
            document.getElementById("destinationcity").innerHTML = sel;
            document.getElementById("destinationcity1").innerHTML = sel;
        }
    };
    httpreg.open("POST", "Cityaction.php?sourceCity=" + sourceCity, true);
    httpreg.send();
}

function searchFlights() {
    var sourcecity = document.getElementById("sourcecity").value;
    var destinationcity = document.getElementById("destinationcity").value;
    var dateofPickup = document.getElementById("dateofPickup").value;
    window.location.href = "showFlights.php?sourceCity=" + sourcecity + "&destinationCity=" + destinationcity + "&dateofTravel=" + dateofPickup;
}

var seats = [];
var num = 0;
var grandTotal = 0;

function chooseSeat(obj, price) {
    var singleSeat = {"seatno": obj.value, "type": obj.title, "price": price};
    var flag = 0;
    var index = 0;
    for (i = 0; i < seats.length; i++) {
        if (seats[i].seatno == obj.value && seats[i].type == obj.title) {
            flag = 1;
            index = i;
            break;
        }
    }
    if (flag == 1) {
        seats.splice(index, 1);
        if (obj.title == 'Business') {
            document.getElementById(obj.id).className = "btn btn-primary";
        } else {
            document.getElementById(obj.id).className = "btn btn-danger";
        }
    } else {
        seats.push(singleSeat);
        document.getElementById(obj.id).className = "btn btn-warning";
    }
    var tab = '';
    var k = 0;
    grandTotal = 0;
    for (i = 0; i < seats.length; i++) {
        grandTotal += seats[i].price;
        k++;
        tab += "<tr>" +
            "<td>" + k + "</td>" +
            "<td>" + seats[i].seatno + "</td>" +
            "<td>" + seats[i].type + "</td>" +
            "<td>" + seats[i].price + "</td>" +
            "</tr>";
    }
    $("#seatsContent").html(tab);
    $("#grandTotal").html(grandTotal);
    $("#grandTotalVal").val(grandTotal);
}

function passengerDetails(email, dateoftravel, fid) {
    if (email == "") {
        window.location.href = "userLogin.php?q=" + fid + "&date=" + dateoftravel;
    } else {
        if (seats.length > 0) {
            $("#passengerModal").modal('show');
            var tab = "<form id='passengerForm'>" +
                "<input type='hidden' name='dateoftravel' id='dateoftravel' value='" + dateoftravel + "'>" +
                "<input type='hidden' name='fid' id='fid' value='" + fid + "'>" +
                "<input type='hidden' name='noofpassengers' id='noofpassengers' value='" + seats.length + "'>" +
                "<input type='hidden' name='grandTotal' id='grandTotal' value='" + grandTotal + "'>" +
                "<table>" +
                "<tr>" +
                "<th>Sr No.</th>" +
                "<th>Seat No</th>" +
                "<th>Name</th>" +
                "<th>Age</th>" +
                "<th>Gender</th>" +
                "<th>Proof Photo</th>" +
                "</tr>";
            var k = 1;
            for (i = 0; i < seats.length; i++) {
                tab += "<tr>" +
                    "<td>" + k + "</td>" +
                    "<td>" + seats[i].seatno + "" +
                    "<input type='hidden' name='price-" + i + "' id='price-" + i + "' value='" + seats[i].price + "'>" +
                    "<input type='hidden' name='type-" + i + "' id='type-" + i + "' value='" + seats[i].type + "'>" +
                    "<input type='hidden' name='seatno-" + i + "' id='seatno-" + i + "' value='" + seats[i].seatno + "'>" +
                    "</td>" +
                    "<td><input type='text' name='pname-" + i + "' id='pname-" + i + "' class='form-control' data-rule-required='true'></td>" +
                    "<td><input type='text' name='age-" + i + "' id='age-" + i + "' class='form-control' data-rule-required='true' data-rule-number='true'></td>" +
                    "<td><select name='gender-" + i + "' id='gender-" + i + "' class='form-control' data-rule-required='true'>" +
                    "<option value=''>--Choose--</option> " +
                    "<option>Male</option>" +
                    "<option>Female</option>" +
                    "</select></td>" +
                    "<td><input type='file' name='proof-" + i + "' class='form-control' data-rule-required='true' data-rule-extension='jpg|png|gif|jpeg'></td>" +
                    "</tr>";
                k++;
            }
            tab += "</table>" +
                "</form>";
            $("#passengerList").html(tab);
        } else {
            alert("Choose your Seat");
        }
    }
}

function payNow() {
    if ($("#passengerForm").valid()) {
        var grandTotalVal = parseInt($("#grandTotalVal").val()) * 100;
        document.cookie = "SameSite=None; secure";
        var options = {
            "key": "rzp_test_dRWiKHS7zr2Gki",
            "amount": grandTotalVal,
            "name": "Airline Services",
            "description": "Fly with us",
            "SameSite": "None",
            "image": "https://images.unsplash.com/photo-1525396524423-64f7b55f5b33?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&w=1000&q=80",
            "handler": function (response) {

                if (response.razorpay_payment_id == "") {
//alert('Failed');
                    window.location.href = "add_payment_details.php?status=failed";
                } else {
                    var controls = document.getElementById("passengerForm").elements;
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
                            console.log(this.responseText);
                            //alert(this.responseText);
                            $("#output1").html("Processing....");
                            window.location.href = "thanks.php?q=" + this.responseText;
                        } else {
                            $("#output1").html("Processing....");
                        }
                    };
                    httpreg.open("POST", "bookingAction.php", true);
                    httpreg.send(formdata);
                }
            },
            "prefill": {
                "name": "",
                "email": ""
            },
            "notes": {
                "address": ""
            },
            "theme": {
                "color": "#F37254"
            }
        };
        var rzp1 = new Razorpay(options);
        rzp1.open();
    }
}

function getBookings(type) {
    var sourcecity = $("#sourcecity1").val();
    var destinationcity = $("#destinationcity1").val();
    var httpreg = new XMLHttpRequest();
    httpreg.onreadystatechange = function () {
        if (this.status == 200 && this.readyState == 4) {
            //console.log(this.responseText);
            var output = JSON.parse(this.responseText);
            var tab = "";
            var num = 0;
            if(output==""){
                tab+="<span class='text-danger'>No Data Found</span>";
            }
            else {
                for (i = 0; i < output.length; i++) {
                    num++;
                    tab += "<tr class='table-striped table-dark'>" +
                        "<td>" + num + "</td>" +
                        "<td>" +
                        "<table class='table'>" +
                        "<tr>" +
                        "<th>Booking ID</th>" +
                        "<td>" + output[i][0] + "</td>" +
                        "</tr>" +
                        "<tr>" +
                        "<th>Booking Date</th>" +
                        "<td>" + output[i].dateofbooking + "</td>" +
                        "</tr>" +
                        "<tr>" +
                        "<th>Date of Travel</th>" +
                        "<td>" + output[i].dateoftravel + "</td>" +
                        "</tr>" +
                        "<tr>" +
                        "<th>From</th>" +
                        "<td>" + output[i].sourcecityname + "</td>" +
                        "</tr>" +
                        "<tr>" +
                        "<th>To</th>" +
                        "<td>" + output[i].destinationcityname + "</td>" +
                        "</tr>" +
                        "</table> " +
                        "</td>";
                    if (type != 'user') {
                        tab += "<td>" +
                            "<table class='table'>" +
                            "<tr>" +
                            "<th>Name</th>" +
                            "<td>" + output[i].name + "</td>" +
                            "</tr>" + "<tr>" +
                            "<th>Email</th>" +
                            "<td>" + output[i].email + "</td>" +
                            "</tr>" + "<tr>" +
                            "<th>Mobile</th>" +
                            "<td>" + output[i].mobile + "</td>" +
                            "</tr>" +
                            "</table>" +
                            "</td>";
                    }

                    tab += "<td>" +
                        "<table class='table'>" +
                        "<tr>" +
                        "<th>Sr No.</th>" +
                        "<th>Seat No</th>" +
                        "<th>Class</th>" +
                        "<th>Price</th>" +
                        "<th>Passenger Name</th>" +
                        "<th>Age</th>" +
                        "<th>Gender</th>" +
                        "</tr>";
                    var k = 0;
                    for (j = 0; j < output[i].detail.length; j++) {
                        var obj = output[i].detail;
                        k++;
                        tab += "<tr>" +
                            "<td>" + k + "</td>" +
                            "<td>" + obj[j].seatno + "</td>" +
                            "<td>" + obj[j].type + "</td>" +
                            "<td>" + obj[j].price + "</td>" +
                            "<td>" + obj[j].name + "</td>" +
                            "<td>" + obj[j].age + "</td>" +
                            "<td>" + obj[j].gender + "</td>" +
                            "</tr>";
                    }
                    tab += "</table></td>" +
                        "</tr>" +
                        "<tr>" +
                        "<th colspan='7'>Grand Total</th>" +
                        "<td>" + output[i].grandtotal + "</td>" +
                        "</tr>" +
                        "</table>";
                }
            }
            $("#content").html(tab);
        }
    };
    httpreg.open("GET", "bookingAction.php?q=" + sourcecity + "&des=" + destinationcity+"&type="+type, true);
    httpreg.send();
}