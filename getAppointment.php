<?php 
$connection = mysqli_connect("localhost", "root", "", "ihs");
$aptID = $_GET['id'];

$sql = "SELECT * FROM Appointment WHERE idAppointment='".$aptID."'";

$ses_sql=mysqli_query($connection,$sql);
$row = mysqli_fetch_assoc($ses_sql);

echo ("<p> Title: ".$row['title']);
echo ("<br> Scheduled for: ".substr($row['atDateTime'], 0, -3)."</p>");

$patSSN = $row['Patient_SSN'];
$healthInt = $row['Health_Inst_idHealth_Inst'];

$sql = "SELECT Patient.name AS patientName, surname, Health_Inst.name AS hiName, area, specialty, type FROM Health_Inst,Patient WHERE SSN='".$patSSN."' AND idHealth_Inst='".$healthInt."'";

$ses_sql=mysqli_query($connection,$sql);
$row = mysqli_fetch_assoc($ses_sql);

echo ("<p><b> Patient Info </b> ");
echo ("<br> Full name: ".$row['patientName']." ".$row['surname']);
echo ("<br> SSN: ".$patSSN."</p> ");

echo ("<p><b> Health Institution Info </b> ");
echo ("<br> Name: ".$row['hiName']);
echo ("<br> Region: ".$row['area']);
echo ("<br> Specialty: ".$row['specialty']);
echo ("<br> Type: ".$row['type']."</p> ");

 ?>