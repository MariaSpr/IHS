<?php 
$region = $_GET['region'];
$connection = mysqli_connect("localhost", "root", "", "ihs");
$sql = "SELECT DISTINCT specialty FROM Health_Inst WHERE area=\"".$region."\"";
$result = mysqli_query($connection,$sql);
 ?>

<label for="specList">Select Specialty:</label>
<select class="form-control" id="spList" onchange="spListChange()">
<option>--</option>
<?php  
	while ($row = mysqli_fetch_array($result)) {
        echo ("<option>".$row['specialty']."</option>");
    } 
?>
</select>