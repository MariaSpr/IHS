<?php 
$SSN = $_GET['SSN'];
$name = $_GET['name'];
$surname = $_GET['surname'];
$fathers_name = $_GET['fathers_name'];
$mothers_name = $_GET['mothers_name'];
$sex = $_GET['sex'];
$birth = $_GET['birth'];
$residence = $_GET['residence'];
$phone_home = $_GET['phone_home'];
$phone_cell = $_GET['phone_cell'];
$phone_work = $_GET['phone_work'];
$issues = $_GET['issues'];

$sql = "UPDATE Patient SET name='".$name."', surname='".$surname."', fathers_name='".$fathers_name."', mothers_name='".$mothers_name."', sex='".$sex."', birth='".$birth."', residence='".$residence."', phone_home='".$phone_home."', phone_cell='".$phone_cell."', phone_work='".$phone_work."', health_info='".$issues."' WHERE SSN='".$SSN."'";

$connection = mysqli_connect("localhost", "root", "", "ihs");
if (mysqli_query($connection, $sql)) { 
echo($sql);
header('Location: patients.php');
}
else {
 echo ("Error: " .$sql. mysqli_error($connection));
}
 ?>