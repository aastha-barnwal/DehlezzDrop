<?php
ob_start();
session_start();
$user=$_SESSION['username'];
if(!isset($_SESSION['username'])){
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/style.css">
<title>cart</title>
<style>
#form {
    width:50%;
	min-width: 350px;
	background-color: rgb(255, 255, 255);
	color: black;
	top:150%;
	left:50%;
	position: absolute;
	transform: translate(-50%,-50%);
	box-sizing: border-box;
	padding: 40px 30px;
	border-radius:20px;
	margin-bottom: 30px;
	display: flex;
    flex-direction: column;
    border:.5px solid gray;
}
#form label{
	margin: 0;
	padding: 0;
	font-weight: bold;
}
#form input{
	margin-bottom: 20px;
}
#form input[type="text"],input[type="email"], input[type="password"] 
{
    border: none;
	border: 1px solid black;
	background: transparent;
    outline: none;
    padding-left:5px;
	height: 40px;
	color: black;
	font-size: 16px;
	width: 100%;
}


</style>    
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
</head>
<body style="padding-left:20px;padding-right:20px;padding-bottom:50px;">
<section class="navbar" style=" background-color: #f0f0f0;">
    <div class="container">
        <div class="logo">
            <a href="index.html" ><h3 style="color: black;">DehlezzDrop</h3></a>
        </div>
        <div class="menu text-right">
            <ul>
                <li>
                    <a href="index.html">HOME</a>
                </li>
                <li>
                    <a href="login.php">LOG OUT</a>
                </li>
            </ul>
        </div>
</section>   

<b style="background-color:"><hr><hr><p style="padding-left:20px;font-size:20px; font-family:Franklin Gothic Medium;">
LET'S CHECKOUT <?php  echo $user ?>
</p><hr><hr></b>
<br><br>
<a href="cart.php" style="text-decoration:none; width:20%; "><div style="font-family:Lucida Sans;border-radius:6px; border:2px solid black; width:20%;">
    <p style="color:black; font-weight:bold; text-align:center;">  BACK  </p>
</div></a>
<br><br>
<?php
// connectinon of db
include_once('db_connect.php');
//db connected

$gt=$_GET['gt'];
?>

<form action="conform_order.php?gt=<?php echo $gt; ?>" method="post" id="form">

<h1 style="text-align: center;">NAME AND ADDRESS</h1>
<label>PERSONAL DETAIL</label><br><br>
<label>FULL NAME :
                <br><br>
                <input type="text" name="name" placeholder="Enter Your  Name" required>
            </label><br><br>
            <br>
            <label>CONTACT NO :
                <br><br>
                <input type="text" name="contact" placeholder="Enter Your  Contact No" required>
            </label><br><br>
            <label>EMAIL :
                <br><br>
                <input type="email" name="email" placeholder="Enter Your Email" required>
            </label><br><br>
			<label>ADRESS</label><br><br>
			<label>HOUSE NO AND STREET NAME :
                <br><br>
                <input type="text" name="add" placeholder="Enter Your House No And Street Name" required>
            </label><br><br>
			<div>
			<label>LANDMARK :
                <br><br>
                <input type="TEXT" name="landmark" placeholder="Enter Your Landmark" required>
            </label>
			<label>STATE :<br><br>
            <input type="text" name="state" placeholder="Enter Your State" required></label>
            </div>
            <br><br>
            <div>
			<label>COUNTRY :
                <br><br>
                <input type="TEXT" name="country" placeholder="Country" required>
            </label>
			<label>PIN CODE :<br><br>
            <input type="text" name="pincode" placeholder="Pin Code" required></label>
            </div><br><br>
            
<center><button id="button2" style="cursor:pointer; font-size:27px; font-weight:bold; border:3 px solid blue; background-color :green; padding:5px; padding-left:50px; padding-right:50px;">  Confirm Your Order </button><br>
</center>
<center>
<p id="button1" style="border:2px solid gray; cursor:pointer; font-size:27px; font-weight:bold; border:3 px solid blue; background-color :green; padding:5px; padding-left:50px; padding-right:50px; width : 70%">  Proceed With Cash on Delivery </p>
</center>
</form>


<!-- set to run when document is fully loaded and ready -->
<script>
$(document).ready(function(){
// jQuery methods go here...
$("#button2").hide();
$("#button1").click(function(){
    $("#button2").show();
    $("#button1").hide();
 });

});
</script>


</div>
</body>
</html>
