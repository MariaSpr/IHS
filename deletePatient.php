<?php 
$SSN = $_GET['SSN'];
$connection = mysqli_connect("localhost", "root", "", "ihs");
$sql = "DELETE FROM Appointment WHERE Patient_SSN='".$SSN."'";
mysqli_query($connection, $sql);
$sql = "DELETE FROM Patient WHERE SSN='".$SSN."'";
if (mysqli_query($connection, $sql)) { 
echo($sql);
header('Location: patients.php');
}
else {
 echo ("Error: " .$sql. mysqli_error($connection));
}
 ?>
