<?php 
$connection = mysqli_connect("localhost", "root", "", "ihs");
$aptID = $_GET['id'];

$sql = "DELETE FROM Appointment WHERE idAppointment='".$aptID."'";
if (mysqli_query($connection, $sql)) { 
echo($sql);
header('Location: index.php');
}
else {
 echo ("Error: " .$sql. mysqli_error($connection));
}
?>