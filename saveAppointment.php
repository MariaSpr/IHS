<?php 

$title = $_GET['title'];
$date = $_GET['date'];
$Patient_SSN = $_GET['Patient_SSN'];
$time = $_GET['time'];
$region = $_GET['region'];
$specialty = $_GET['specialty'];
$facility = $_GET['facility'];
$error = '';

if ($region != '--' || $specialty != '--' || $facility!='--') {
$connection = mysqli_connect("localhost", "root", "", "ihs");
$sql = "SELECT idHealth_Inst FROM Health_Inst WHERE name='".$facility."' AND area='".$region."' AND specialty='".$specialty."'";
$ses_sql=mysqli_query($connection,$sql);
$row = mysqli_fetch_assoc($ses_sql);
$inst_ID = $row['idHealth_Inst'];
$dateTime = $date . ' ' . $time.':00';

$sql = "SELECT title FROM Appointment WHERE Health_Inst_idHealth_Inst='".$inst_ID."' AND atDateTime='".$dateTime."'";
$ses_sql=mysqli_query($connection, $sql);
$row = mysqli_fetch_assoc($ses_sql);

if($row['title'] != ''){
	$error = "Time slot occupied. Select a different time.";
} else {
	$sql="INSERT INTO Appointment (idAppointment, title, atDateTime, Patient_SSN, Health_Inst_idHealth_Inst) VALUES (NULL, '".$title."', '".$dateTime."', '".$Patient_SSN."', '".$inst_ID."')";
	
	if (mysqli_query($connection, $sql)) {
		echo ("<span style=\"color:green; margin-left: 10px;\" onclick=\"location.reload()\">Success! Refresh to continue.</span>");
	header("Refresh:0");
} else {
    $error= "Error: " .$sql. mysqli_error($connection);
}

}
}
else {
	$error = "Please check the info you provided.";
}



 ?>
<span style="color:red; margin-left: 10px;"> <?php echo($error); ?></span>
