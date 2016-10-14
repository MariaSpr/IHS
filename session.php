<?php
// Establishing Connection with Server by passing server_name, user_id, password and database as a parameter
$connection = mysqli_connect("localhost", "root", "", "ihs");
session_start();// Starting Session
// Storing Session
$SSN=$_SESSION['login_user'];
$type=$_SESSION['login_type'];

if ($type == "patient") {
// SQL Query To Fetch Complete Information Of Patient
$ses_sql=mysqli_query($connection, "SELECT SSN, name, surname FROM Patient WHERE SSN='$SSN'");
}
else if ($type == "doctor") {
// SQL Query To Fetch Complete Information Of Doctor
$ses_sql=mysqli_query($connection, "SELECT SSN, name, surname FROM Doctor WHERE SSN='$SSN'");
}
$row = mysqli_fetch_assoc($ses_sql);
$login_session=$row['SSN'];
$first_name=$row['name'];
$surname=$row['surname'];

if(!isset($login_session)){
mysqli_close($connection); // Closing Connection
header('Location: login.php'); // Redirecting To Login Page
}
?>