<?php
include "connection.php";
if (isset($_POST['addFlightBtn'])) {
    $flightname = $_POST['flightname'];
    $sourcecity = $_POST['sourcecity'];
    $destinationcity = $_POST['destinationcity'];
    $bPrice = $_POST['bPrice'];
    $ePrice = $_POST['ePrice'];
    $monday = $_POST['monday'];
    $tuesday = $_POST['tuesday'];
    $wednesday = $_POST['wednesday'];
    $thurseday = $_POST['thurseday'];
    $friday = $_POST['friday'];
    $saturday = $_POST['saturday'];
    $sunday = $_POST['sunday'];
    $sTime = date('H:i:s', strtotime($_POST['sTime']));
    $eTime = date("H:i:s", strtotime($_POST['eTime']));
    $aircraft = $_POST['aircraft'];

    if ($sourcecity != $destinationcity) {
        if ($sTime != $eTime) {
            $s = "SELECT * FROM `flight` WHERE `flightname`='$flightname' and `sourcecity`='$sourcecity' and `destinationcity`='$destinationcity' and starttime='$sTime' and endtime='$eTime'";
            $result = mysqli_query($conn, $s);
            if (mysqli_num_rows($result) > 0) {
                echo 0;
            } else {
                $sql = "INSERT INTO `flight`(`fid`, `flightname`, `sourcecity`, `destinationcity`, `businessclass`, `economyclass`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `saturday`, `sunday`, `starttime`, `endtime`, `aircraft`) 
VALUES (null ,'$flightname','$sourcecity','$destinationcity','$bPrice','$ePrice','$monday','$tuesday','$wednesday','$thurseday','$friday','$saturday','$sunday','$sTime','$eTime','$aircraft')";
                mysqli_query($conn, $sql);
                //  echo $sql;
                echo 1;
            }
        } else {
            echo 2;
        }
    } else {
        echo 3;
    }
} elseif (isset($_POST['updateFlight'])) {
    $Flightid = $_POST['Flightid'];
    $flightname = $_POST['flightname'];
    $sourcecity = $_POST['sourcecity'];
    $destinationcity = $_POST['destinationcity'];
    $bPrice = $_POST['bPrice'];
    $ePrice = $_POST['ePrice'];
    $monday = $_POST['monday'];
    $tuesday = $_POST['tuesday'];
    $wednesday = $_POST['wednesday'];
    $thurseday = $_POST['thurseday'];
    $friday = $_POST['friday'];
    $saturday = $_POST['saturday'];
    $sunday = $_POST['sunday'];
    $sTime = date('H:i:s', strtotime($_POST['sTime']));
    $eTime = date("H:i:s", strtotime($_POST['eTime']));
    $aircraft = $_POST['aircraft'];

    if ($sourcecity != $destinationcity) {
        if ($sTime != $eTime) {
            $sql = "UPDATE `flight` SET `flightname`='$flightname',`sourcecity`='$sourcecity',`destinationcity`='$destinationcity',`businessclass`='$bPrice',`economyclass`='$ePrice',`monday`='$monday',`tuesday`='$tuesday',`wednesday`='$wednesday',`thursday`='$thurseday',`friday`='$friday',`saturday`='$saturday',`sunday`='$sunday',`starttime`='$sTime',`endtime`='$eTime',`aircraft`='$aircraft' WHERE `fid`='$Flightid'";
           //echo $sql;
            mysqli_query($conn, $sql);
            echo 2;
        } else {
            echo 0;
        }
    } else {
        echo 1;
    }

} elseif (isset($_REQUEST['q'])) {
    $flightid = $_REQUEST['q'];

    $s = "delete from flight where fid='$flightid'";
    mysqli_query($conn, $s);
} elseif (isset($_REQUEST['sourcecity']) && isset($_REQUEST['destinationcity'])) {
    $sourcecity = $_REQUEST['sourcecity'];
    $destinationcity = $_REQUEST['destinationcity'];

    $ar = array();
    $num = 0;
    $s = "SELECT *,(SELECT city.cityname FROM city WHERE city.cityid=sourcecity) as sourcecityname,(SELECT city.cityname FROM city WHERE city.cityid=destinationcity) as destinationcityname FROM `flight` WHERE`sourcecity`='$sourcecity' and `destinationcity`='$destinationcity'";
    $result = mysqli_query($conn, $s);
    while ($row = mysqli_fetch_array($result)) {
        $ar[$num] = $row;
        $num++;
    }
    echo json_encode($ar);
} else {
    $ar = array();
    $num = 0;
    $s = "SELECT *,(SELECT city.cityname FROM city WHERE city.cityid=sourcecity) as sourcecityname,(SELECT city.cityname FROM city WHERE city.cityid=destinationcity) as destinationcityname FROM `flight`";
    $result = mysqli_query($conn, $s);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $ar[$num] = $row;
            $num++;
        }
        echo json_encode($ar);
    } else {
        echo 0;
    }
}
