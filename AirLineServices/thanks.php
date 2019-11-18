<!DOCTYPE html>
<html lang="zxx">
<head>
    <?php
    include "headerfiles.html";
    ?>
</head>

<body>
<?php
@session_start();
if (!isset($_SESSION["useremail"])) {
    include "publicHeader.php";
    $email = "";
} else {
    include "userHeader.php";
    $email = $_SESSION["useremail"];
}

?>
<div class="container">
    <div class="row">
        <div class="text-center col-sm-12">
            <br><br><br>
            <h3>Thank you for Booking with us. Your Booking ID is <?php echo $_REQUEST['q']; ?></h3>
            <br><br><br>
        </div>
    </div>
</div>
<?php
include "footer.php";
?>
</body>
</html>