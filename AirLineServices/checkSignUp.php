<?php
include_once "connection.php";
if (isset($_POST['buttonSignUp']))
{
    $email=$_POST["email"];
    $name=$_POST["name"];
    $password=$_POST["password"];
    $adminType=$_POST["adminType"];

    $query="select * from admin where email='$email'";
    $result = mysqli_query($conn,$query);
    if (mysqli_num_rows($result)>0)
    {
        echo"USER ALREADY EXISTS!";

    }
    else {

        $query = "insert into admin values('$email','$password','$name','$adminType')";
        $result = mysqli_query($conn, $query);
        echo "DATA INSERTED";
    }

}

if (isset($_POST['btnlogin'])){
    $username=$_POST["username"];
    $password=$_POST["password"];

    $query="select * from admin where email='$username' and password='$password'";
    $result=mysqli_query($conn,$query);
    if (mysqli_num_rows($result)>0){
        echo "success";

    }else{
        echo "failure";
    }

}

if(isset($_POST['buttonUpdate'])){
    $email=$_POST["email"];
    $name=$_POST["name"];
    $adminType=$_POST["adminType"];

    $s="update admin set name='$name',usertype='$adminType' where email='$email'";
    mysqli_query($conn,$s);
}


if(isset($_POST["getAdminData"]))
{

    $query="select * from admin";
    $result=mysqli_query($conn,$query);
    $ar=array();
    while($row=mysqli_fetch_assoc($result))
    {
       array_push($ar,$row);

    }


    echo json_encode($ar);
}






if(isset($_POST["deleteAdminData"]))
{
    $email=$_POST["email"];
    $query="delete from admin where email='$email'";
    mysqli_query($conn,$query);
    echo "Data Deleted";

}
?>
