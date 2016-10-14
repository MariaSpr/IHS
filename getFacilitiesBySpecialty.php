<?php 
$region = $_GET['region'];
$specialty = $_GET['specialty'];
$connection = mysqli_connect("localhost", "root", "", "ihs");
$sql = "SELECT DISTINCT name FROM Health_Inst WHERE area=\"".$region."\" AND specialty=\"".$specialty."\"";
$result = mysqli_query($connection,$sql);
 ?>

<label for="facList">Select Facility:</label>
<select class="form-control" id="facList">
<option>--</option>
<?php  
	while ($row = mysqli_fetch_array($result)) {
        echo ("<option>".$row['name']."</option>");
    } 
?>
</select>