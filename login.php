<?php
ob_start();
session_start();
?>

<html>
<head>
<title> DehleezDrop </title>
<link rel="stylesheet" href="css/style.css">
<style>
body
{
background-image:url('login.webp');
height:100%;
}
.xyz
{
font-size:50px;
color:yellow;
margin-top:6px;
}
.pqr
{
font-size:30px;
color:brown;
font-weight:bold;
}
a:link
{
color:#2eb8b8;
}
a:visited
{
color:brown;
}
a:hover
{
color:blue;
text-decoration:none;
}
::placeholder { 
  color: brown;
  opacity:1
}
.abc
{
font-weight:bold;
font-size: 50px;
color: brown;
}
</style>
<!-- Password Validation -->
<script>
	function validation()
{
	var result=true;
	var i=document.getElementsByTagName("input");
	if(i[0].value.length==0 || i[1].value.length<=6)
	{
	var result=false;
	alert("Please fill the form correctly");
    }
	return(result);
}
</script>

</head>

<body>
    <!-- Navabar starts -->
<section class="navbar" style="background-color: rgb(239, 111, 51);">
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
                        <a href="signup.php">SIGN UP</a>
                    </li>
                    <li>
                        <a href="login.php">LOGIN</a>
                    </li>
                    <li>
                        <a href="contact.html">CONTACT</a>
                    </li>
                </ul>
            </div>

        </div>
    </section>
    <!-- NavBar Ends -->

<center><div style="margin-top:100px; border:4px solid black; width:30%; background-color: grey;border-radius:35px;">
<center><?php

// error message printing.
if(isset($_SESSION['insert'])){
    echo $_SESSION['insert'];
    session_destroy();
}
?></njmcenter>

<center><p class="abc">LOGIN</p></center>
<center><form action="checklogin.php" method="POST" onsubmit="return validation()">
<table>
<tr class="xyz">
<td ><input type="text" name="username" placeholder="username" style="margin-left:0px;"></td>
</tr>
<tr class="xyz">
<td ><input type="password" name="pass" placeholder="password atleast 6 digit"style="margin-top:20px; margin-left:0px;" ></td>
</tr>
<tr style="padding-top:50pxl">
<td><input type="submit" value="Login"style="padding: 2px 4px;height:40px;width:100px; margin-top:40px; margin-bottom:40px;margin-left:30px;"></td>
</tr>
</table>
<?php
// error message printing.
if(isset($_SESSION['error'])){
echo  $_SESSION['error'];
session_destroy();
}
?>
</form>
<p class="pqr">New User?<a href="signup.php">Signup</a></p> 
</center>
</div></center>
</body>
</html> 