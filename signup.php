<!DOCTYPE html>
<html>
<head>
<title>sign up</title>
<link rel="stylesheet" href="css/style.css">
<meta name="description" content="Try our best 24 hours food delivery service in Guwahati.  Order Indian, South Indian, Chinese food in IITG Campus. We also deliver the best quality of food in Campus">
<meta name="keywords" content="24 hours online food delivery services in IIT Guwahati">
<style>
body
{
background-image : url('https://1.bp.blogspot.com/-o3vdO5nOwFU/XlFviZAB_LI/AAAAAAAAARE/681CriNh4Ow4BaTFQap4BxCGr3okfHIkwCNcBGAsYHQ/s640/signup.jpeg');
background-repeat : no-repeat;
background-attachment: fixed; 
background-size: cover;
height: 100%;
}
.signup
{
    width: 30%;
	min-width: 350px;
	background: rgb(90, 9, 9);
	color: #fff;
	top:85%;
	left:50%;
	position: absolute;
	transform: translate(-50%,-50%);
	box-sizing: border-box;
	padding: 40px 30px;
	border-radius:20px;
	margin-bottom: 30px;
	display: flex;
	flex-direction: column;
}
}
.signup label{
	margin: 0;
	padding: 0;
	font-weight: bold;
}
.signup input{
	margin-bottom: 20px;
}
.signup input[type="text"],input[type="email"], input[type="password"] 
{
    border: none;
	border-bottom: 1px solid #fff;
	background: transparent;
	outline: none;
	height: 40px;
	color: #fff;
	font-size: 16px;
	width: 100%;

}
.signup button
{
    border: none;
	outline: none;
	height: 40px;
	background: #189ec7;
	color: #fff;
	font-size: 18px;
	border-radius: 30px;
}
.signup button:hover
{
	cursor: pointer;
	background: #ffc107;
	color: #000;
}
</style>
<script>

function validation()
{
	var result=true;
	var i=document.getElementsByTagName("input");
	if(i[5].value.length<=6 ||){
		result=false;
		alert("password must be greater than 6 digit");
	}
	else if(i[5].value!=i[6].value)
	{
	var result=false;
	alert("Password must be same");
	
	}
	return(result);
	
}

</script>
</head>

<body>
<!-- connectinon of db -->
 <?php include_once('db_connect.php');  ?> 

 <!--NavaBar Starts here  -->
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
	<!-- Navbar Ends here -->
	<!-- Register form starts -->
    <form method="post" action="register.php"  onsubmit="return validation()">
		<div class="signup">
		<h1 style="text-align: center;">SIGN UP</h1>
	
			<label>Username :
                <br><br>
                <input type="text" name="username" placeholder="Enter Username" required>
            </label><br>

            <label>Email :
                <br><br>
                <input type="email" name="email" placeholder="Enter Email" required>
            </label><br>
			<label>Password :
                <br><br>
                <input type="Password" name="pass" placeholder="Enter Password Greater than 6 digits" required>
            </label><br>
			
			<label>Confirm Password :
                <br><br>
                <input type="Password" name="confirm" placeholder="Re-enter Password" required>
            </label><br>
			<!-- <label>User Type :<br><br>
            <input type="text" name="User_type" placeholder="Enter User/Restaurant" required>
        </label><br> -->
			<label>Contact Number :<br><br>
            <input type="text" name="contact" placeholder="Enter Your Phone Number" required>
        </label><br>

			<button type="submit">submit</button>
			
			<!-- Register form ends -->
		
				</div>
			</form>
		</div>
	</body>
</html>