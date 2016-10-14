<?php
session_start(); // Starting Session
$error=''; // Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['SSN']) || empty($_POST['password'])) {
$error = "SSN or Password is empty";
}
else
{
// Define $SSN and $password
$SSN=strtolower($_POST['SSN']);
$password=$_POST['password'];
// Establishing Connection with Server by passing server_name, user_id, password and database as a parameter
$connection = mysqli_connect("localhost", "root", "", "ihs");
// To protect MySQL injection for Security purposes
$SSN = stripslashes($SSN);
$password = stripslashes($password);
$SSN = mysql_real_escape_string($SSN);
$password = mysql_real_escape_string($password);

// SQL query to fetch information of registerd users and finds user match.
$patient_query = mysqli_query($connection , "SELECT SSN, pass FROM Patient WHERE pass='$password' AND SSN='$SSN'");
$rows = mysqli_num_rows($patient_query);
if ($rows == 1) {
$_SESSION['login_user']=$SSN; // Initializing Session
$_SESSION['login_type']="patient"; // Log in as Patient
header("location: index.php"); // Redirecting To Index Page
} else { 
  $doctor_query = mysqli_query($connection, "SELECT SSN, pass FROM Doctor WHERE pass='$password' AND SSN='$SSN'");
  $rows = mysqli_num_rows($doctor_query);
  if ($rows == 1) {
	$_SESSION['login_user']=$SSN; // Initializing Session
	$_SESSION['login_type']="doctor"; // Log in as Doctor
	header("location: index.php"); // Redirecting to Index Page
  } else {
    $error = "SSN or Password is invalid";
  }
}
mysqli_close($connection); // Closing Connection
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- style sheets -->
    <link rel="stylesheet" type="text/css" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="styles/mainstyle.css">
    <!-- <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'> -->
    <title>Login Page</title>
</head>

<body id="login">
    <div class="container">
        <form class="form-signin" action="" method="POST">
            <h2 class="form-signin-heading text-center"><span id="logoIcon" class="fa fa-heartbeat"></span>I.H.S</h2>
            <label for="ssnID" class="sr-only">Email address</label>
            <input type="text" id="ssnID" class="form-control" placeholder="SSN" name="SSN" required autofocus>
            
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign in</button>
            <br>
			<center><p class="errorText" id="logHead" style="color:red; font-size:140%; "><?php echo ($error); ?></p></center>
        </form>
    </div>
    <!-- /container -->
    <!-- scripts -->
    <script type="text/javascript" src="bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script>
    $(document).ready(function() {
    	console.log("niar");
    });
    </script>
</body>

</html>