<?php
require ('qs_connection.php');
//login
if (isset($_SESSION['access']) && $_SESSION['access']!="")header('Location: home.php');
if(isset($_POST['username']) || isset($_POST['password'])){
	if(!isset($_POST['username']) || !isset($_POST['password'])){
		$error = 1;
	}

	$sql="SELECT * FROM user WHERE username='".$_POST['username']."' and password='".$_POST['password']."'";
	$result=mysql_query($sql);
	$row = mysql_fetch_assoc($result);
	$status = $row["status"];
	
	$count=mysql_num_rows($result);

	// If result matched $myusername and $mypassword, table row must be 1 row

	if($count==1){

	// Register $myusername, $mypassword and redirect to file "login_success.php"
	$_SESSION['user'] = $_POST['username'];
	$_SESSION['access'] = $status;
	header("location:home.php");
	}
	else $error = 1;
}
//register
if(isset($_POST['usernamebaru']) || isset($_POST['passwordbaru'])|| isset($_POST['emailbaru'])|| isset($_POST['statusbaru'])){
	if(!isset($_POST['usernamebaru']) || !isset($_POST['passwordbaru']) || !isset($_POST['emailbaru'])|| !isset($_POST['statusbaru'])){
		$errorbaru = 1;
		header("location:index.php");
	}

	$sql="INSERT INTO user values ('".$_POST['usernamebaru']."', '".$_POST['passwordbaru']."' , '".$_POST['emailbaru']."', '".$_POST['statusbaru']."')";
	$result=mysql_query($sql);
	if($result==1){

		$berhasil = 1;
		header("location:index.php");
	}
	if($result==0){

		$errorbaru = 1;
		header("location:index.php");
	}
}

if (isset($error)) echo "<script type='text/javascript'>alert('Login failed: Incorrect user name, password')</script>";
if (isset($errorbaru)) echo "<script type='text/javascript'>alert('Register failed: Please fill data correctly and complete')</script>";
if (isset($berhasil)) echo "<script type='text/javascript'>alert('Register Success')</script>";
if(isset($_GET['out'])) {
	// destroy session
	session_unset();
	$_SESSION = array();
	unset($_SESSION['user'],$_SESSION['access']);
	session_destroy();
	echo "<script type='text/javascript'>alert('Logout successful')</script>";
	
}
?>
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Water Quality Monitoring</title>
    
    
    <link rel="stylesheet" href="css/reset.css">

    <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

        <link rel="stylesheet" href="css/style.css">

    
    
    
  </head>

  <body>

    
<!-- Form Mixin-->
<!-- Pen Title-->
<div class="pen-title">
  <h1>Hello !!</h1><span>Selamat datang di Water Quality Monitoring</span>
</div>
<!-- Form Module-->
<div class="module form-module">
  <div class="toggle"><i class="fa fa-times fa-pencil"></i>
    <div class="tooltip">Register</div>
  </div>
  <div class="form">
    <h2>Login to your account</h2>
    <form action="index.php" method="post">
      <input type="text" placeholder="Username" name="username"/>
      <input type="password" placeholder="Password" name="password"/>
      <button type="submit">Login</button>
    </form>
  </div>
  <div class="form">
    <h2>Create an account</h2>
    <form action="index.php" method="post" >
      <input type="text" placeholder="Username" name="usernamebaru"/>
      <input type="password" placeholder="Password" name="passwordbaru"/>
	  <input type="email" placeholder="Email" name="emailbaru"/>
	  <label><center>Status</label><br>
                <select name="statusbaru" >
					<option value ="Admin" >Admin<br>
					<option value ="User"  >User<br>
				</select><br><br>
      <!--input type="status" placeholder="Status"/-->
      <button type="submit">Register</button>
    </form>
  </div>
  <!--div class="cta"><a href="http://andytran.me">Forgot your password?</a></div-->
</div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='js/da0415260bc83974687e3f9ae.js'></script>

        <script src="js/index.js"></script>

    
    
    
  </body>
</html>
