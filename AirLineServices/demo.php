var grandTotalVal = parseInt($("#grandTotalVal").val()) * 100;
var options = {
"key": "rzp_test_dRWiKHS7zr2Gki",
"amount": grandTotalVal,
"name": "Airline Services",
"description": "Fly with us",
"image": "https://images.unsplash.com/photo-1525396524423-64f7b55f5b33?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&w=1000&q=80",
"handler": function (response) {
//alert(response.razorpay_payment_id);
if (response.razorpay_payment_id == "") {
//alert('Failed');
window.location.href = "add_payment_details.php?status=failed";
} else {
//alert('Success');
window.location.href = "insert_payment.php?status=success&id=" + fid + "&date=" + dateoftravel;
}
},
"prefill": {
"name": "",
"email": email
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