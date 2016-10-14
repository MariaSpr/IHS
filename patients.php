<?php include('session.php'); 
if ($type=="patient") { // Patients not allowed to see other patients
	header('Location: index.php'); // Redirecting To Index Page
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
    <link rel="stylesheet" type="text/css" href="bower_components/fullcalendar/dist/fullcalendar.css">
    <link rel="stylesheet" type="text/css" href="styles/mainstyle.css">
    <!-- <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'> -->
    <script type="text/javascript">
	function showResult(str){
			if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("patientTable").innerHTML = xmlhttp.responseText;
            }
        }
		
        xmlhttp.open("GET","searchPatients.php?q="+str,true);
        xmlhttp.send();
		}

	function delPatient(SSN){
		if (confirm("Are you sure you want to delete that?")){
			window.location.href = 'deletePatient.php?SSN='+SSN;
		}
	}

	 function getModalPatient(SSN) {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("searchContainer").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","searchPatientBySSN.php?SSN="+SSN,true);
        xmlhttp.send();
		
        }

        function editPatient(SSN) {
        	$('#patModal').modal('toggle');
        	getModalPatient(SSN);
        }

        function doneEditing() {
        if (confirm("Are you sure you want to change that?")){
            window.location.href = "editPatient.php?SSN="+document.getElementById("resultSSN").value+"&name="+document.getElementById("patName").value+"&surname="+document.getElementById("patSurname").value+"&fathers_name="+document.getElementById("fathers_name").value+"&mothers_name="+document.getElementById("mothers_name").value+"&sex="+document.getElementById("sex").value+"&birth="+document.getElementById("birth").value+"&residence="+document.getElementById("residence").value+"&phone_home="+document.getElementById("phone_home").value+"&phone_cell="+document.getElementById("phone_cell").value+"&phone_work="+document.getElementById("phone_work").value+"&issues="+document.getElementById("issues").value;
        }
        }

    </script>
    <title>Patients</title>
</head>

<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><span class="fa fa-user-md navIcon"></span>I.H.S </a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.php"> <span class="fa fa-calendar navIcon"></span>Appointments <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="active"><a href="patients.php"><span class="fa fa-users navIcon"></span>Patients</a></li>
                    <li><a href="profile.php"><span class="fa fa-universal-access navIcon"></span>Profile</a></li>
                </ul>
                <form class="nav navbar-nav navbar-form" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search..." onkeyup="showResult(this.value)">
                    </div>
                    <!-- <button type="submit" class="btn btn-default">Submit</button> -->
                </form>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> <span class="fa fa-user navIcon"></span><?php echo $first_name . ' ' . $surname; ?><span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="profile.php"><span class="fa fa-cog navIcon"></span> Profile</a></li>
                            <li class="divider"></li>
                            <li><a href="logout.php"><span class="fa fa-power-off navIcon"></span> Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="modal fade" style="overflow-y:auto;" id="patModal" tabindex="-1" role="dialog" aria-labelledby="patModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="patModal">Patient Info</h4>
                </div>
                <div class="modal-body" id="searchContainer">
                    <div class="row">
                        <div class="col-md-3 col-xs-3">
                            <label for="searchpat">Search Patient:</label>
                        </div>
                        <div class="col-md-3 col-xs-1">
                            <input id="searchpat" type="text" name="searchpat" placeholder="search ssn">
                        </div>
                        <div class="col-md-1 col-md-offset-1 col-xs-1 col-xs-offset-6">
                            <button id="searchpatbtn" type="button" class="btn btn-primary btn-sm" onclick="getModalPatient(document.getElementById('searchpat').value)"><span id="searchIcon" class="fa fa-search"></span></button>
                        </div>
                    </div>
                    <hr>
                    <div class="row cusrow">
                        <div class="col-md-2 col-xs-4">
                            <label for="name">SSN: </label>
                        </div>
                        <div class="col-md-2 col-xs-4 col-xs-offset-4">
                            <input class="inStyle" type="text" name="name">
                        </div>
                    </div>
                    <div class="row cusrow">
                        <div class="col-md-2 col-xs-4">
                            <label for="name">Patient Name: </label>
                        </div>
                        <div class="col-md-2 col-xs-4 col-xs-offset-4">
                            <input class="inStyle" type="text" name="name" id="patName">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 col-xs-4">
                            <label for="name">Patient Surname: </label>
                        </div>
                        <div class="col-md-2 col-xs-4 col-xs-offset-4">
                            <input class="inStyle" type="text" name="name" id="patSurname">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 col-xs-4">
                            <label for="name">Father's Name: </label>
                        </div>
                        <div class="col-md-2 col-xs-4 col-xs-offset-4">
                            <input class="inStyle" type="text" name="name" id="fathersName">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 col-xs-4">
                            <label for="name">Mother's Name: </label>
                        </div>
                        <div class="col-md-2 col-xs-4 col-xs-offset-4">
                            <input class="inStyle" type="text" name="name" id="mothersName">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 col-xs-4">
                            <label for="name">Gender: </label>
                        </div>
                        <div class="col-md-2 col-xs-4 col-xs-offset-4">
                            <input class="inStyle" type="text" name="name" id="patSex">
                        </div>
                    </div>
                    <div class="row cusrow">
                        <div class="col-md-2 col-xs-4">
                            <label for="name">Date of birth: </label>
                        </div>
                        <div class="col-md-2 col-xs-4 col-xs-offset-4">
                            <input class="inStyle" type="date" name="name" id="patBirth">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 col-xs-4">
                            <label for="name">Home Address: </label>
                        </div>
                        <div class="col-md-2 col-xs-4 col-xs-offset-4">
                            <input class="inStyle" type="text" name="name" id="patResidence">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 col-xs-4">
                            <label for="name">Phone Number: </label>
                        </div>
                        <div class="col-md-2 col-xs-4 col-xs-offset-4">
                            <input class="inStyle" type="text" name="name" id="phoneHome">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 col-xs-4">
                            <label for="name">Mobile Number: </label>
                        </div>
                        <div class="col-md-2 col-xs-4 col-xs-offset-4">
                            <input class="inStyle" type="text" name="name" id="phoneCell">
                        </div>
                    </div>
                    <div class="row">
                       <div class="col-md-2 col-xs-4">
                         <label for="name">Work Number: </label>
                        </div>
                        <div class="col-md-2 col-xs-4 col-xs-offset-4">
                            <input class="inStyle" type="text" name="name" id="phoneWork">
                        </div>
                    </div>
                    <div class="row cusrow">
                        <div class="col-md-2">
                            <label for="issues">Critical Issues:</label>
                        </div>
                        <div class="col-md-10">
                            <textarea name="issues" id="patIssues" olaceholder="Critical Health Issues" cols="40" rows="10"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="saveBtn" class="btn btn-primary" onclick="doneEditing()">Save</button>
                    <button type="button" id="backBtn" class="btn btn-warning" data-dismiss="modal">Back</button>
                    <div id="errorContainer"></div>
                </div>
            </div>
        </div>
    </div>

    

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="page-header"><span id="pageheadIcon" class="fa fa-users"></span>Patients</h1>
            </div>
<!--    <div class="col-md-6">
                <div class="btn-group col-md-6 pull-right" id='btn-group'>
                    <button type="button" class="btn btn-default" onclick="addPatient()"><span class="fa fa-plus group"></span>New</button>
                </div>
        </div> -->
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive table-striped">
                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>SSN</th>
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th>Gender</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody id="patientTable">
                        <?php 
                        $sql="SELECT SSN,name,surname,sex FROM Patient";
                        $result=mysqli_query($connection, $sql); 

                        while ($row=mysqli_fetch_array($result)) {
                        	echo ("<tr>");
                        	echo ("<td>".$row['SSN']."</td>");
                        	echo ("<td>".$row['name']."</td>");
                        	echo ("<td>".$row['surname']."</td>");
                        	echo ("<td>".$row['sex']."</td>");
                        	echo ("<td><center><button type=\"button\" class=\"btn btn-default\" onclick=\"editPatient('".$row['SSN']."')\" ><span class=\"fa fa-pencil group\"></span></button><button type=\"button\" class=\"btn btn-default\" onclick=\"delPatient('".$row['SSN']."')\"><span class=\"fa fa-times group\"></span></button></center></td>");
                        	echo ("</tr>");
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- scripts -->
    <script type="text/javascript" src="bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="bower_components/moment/min/moment.min.js"></script>
    <script type="text/javascript" src="bower_components/fullcalendar/dist/fullcalendar.js"></script>
    <script>
    /* Initializing Calendar */

    $(document).ready(function() {







    });
    </script>
</body>

</html>
