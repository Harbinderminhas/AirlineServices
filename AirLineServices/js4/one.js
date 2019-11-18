$(document).ready(function () {
    // document.getElementById("button1").innerHTML=""
    $('#btn1').click(function () {

        // $(this).html("clicked");
        $("#div1").hide(5000,function () {
            $("#div1").show(5000);
        });

        $("#div1").toggle(5000);
        $("#div1").slideUp(500,function () {
            $("#div1").slideDown(500);
        });


        // $("#div1").slideToggle(500);

    //     $("#div1").fadeOut(1000);
    // });
    // $('#btn2').click(function () {
    //     $("#div1").fadeIn(1000);
    //
    // });
    // $('#btn3').click(function () {
    //     // $("#div1").fadeToggle(1000);
    //     alert($("#div1").html());

    });
    
    $("#abc").click(function () {
        
    })
});

function go() {
    document.write(document.getElementById("div1").innerText);
}