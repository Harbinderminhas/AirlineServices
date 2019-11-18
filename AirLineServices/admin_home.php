<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php
    //    include "headerfiles.html";
    include_once "headerfiles.html";
    ?>

</head>
<body>
<?php
include_once "adminheader.php";
?>
<div class="container">
    <h1 class="text-center">Welcome  <strong class=" text-success"><?php echo $_SESSION["display_name"];?></strong> to admin panel</h1>


</div>

<?php
include "footer.php";
?>
</body>
</html>