<?php
ob_start();
session_start();

if(!isset($_POST['username']))
{
    header('location:login.php');
}
if(!isset($_POST['pass']))
{
    header('location:login.php');
}

// connectinon of db
include_once('db_connect.php'); 

$user=$_POST['username'];
$pass=$_POST['pass'];

// user

$query_user="SELECT * FROM `user` WHERE username= '$user'";
$queryfire_user= mysqli_query($con,$query_user);
$result_user=mysqli_fetch_array($queryfire_user);

// admin

$query_admin="SELECT * FROM `restaurant` WHERE username= '$user' AND password='$pass'";
$queryfire_admin= mysqli_query($con,$query_admin);
$result_admin=mysqli_fetch_array($queryfire_admin);

$check_pass_user=$result_user['pass'];

if(password_verify($pass,$check_pass_user)){
    $_SESSION['username']=$user;
    header('location:homeDynamic.php');
    }
else if($result_admin){
    $_SESSION['username']=$user;
    header('location: ro1.php?r_id=' . $result_admin["r_id"] );
    }
    else{
        $wrong ="Wrong Credentials";
        $_SESSION['error'] =   $wrong;
        header('location: login.php');
    }

?>