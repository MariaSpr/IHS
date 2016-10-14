<?php include('session.php'); ?>

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
    <title>Dashboard</title>
    <script type="text/javascript">
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

       function spListChange() {
       if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("facilityList").innerHTML = xmlhttp.responseText;
            }
        }
        console.log("getFacilitiesBySpecialty.php?region="+document.getElementById("regionList").value+"&specialty="+document.getElementById('spList').value);
        xmlhttp.open("GET","getFacilitiesBySpecialty.php?region="+document.getElementById("regionList").value+"&specialty="+document.getElementById('spList').value,true);
        xmlhttp.send();
        }

        function searchSSN() {
            $('#myModal').modal('toggle');
            $('#patModal').modal('toggle');
            console.log("event fired");
        }

       function saveAppointment() {

       if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("errorContainer").innerHTML = xmlhttp.responseText;
            }
        }

        xmlhttp.open("GET","saveAppointment.php?title="+document.getElementById("eventTitle").value+"&date="+document.getElementById("dateSelection").value+"&Patient_SSN="+document.getElementById("searchSSN").value+"&time="+document.getElementById("timeList").value+":"+document.getElementById("minuteList").value+"&region="+document.getElementById("regionList").value+"&specialty="+document.getElementById("spList").value+"&facility="+document.getElementById("facList").value,true);
        xmlhttp.send();

        }

        function getAppointment(ID) {

        document.getElementById("aptDeleteBtn").onclick = function() {
            deleteAppointment(ID);
        };

       if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("aptContainer").innerHTML = xmlhttp.responseText;
            }
        }

        xmlhttp.open("GET","getAppointment.php?id="+ID,true);
        xmlhttp.send();

        }

        function deleteAppointment(ID) {
        	if (confirm("Are you sure you want to delete that?")){
			window.location.href = 'deleteAppointment.php?id='+ID;
		}

        }


    </script>
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
                    <li class="active">
                        <a href="index.php"> <span class="fa fa-calendar navIcon"></span>Appointments <span class="sr-only">(current)</span></a>
                    </li>
                    <li><a href="patients.php" <?php if ($type == "patient") { echo ("style=\"display:none\""); }?>><span class="fa fa-users navIcon"></span>Patients</a></li>
                    <li><a href="profile.php"><span class="fa fa-universal-access navIcon"></span>Profile</a></li>
                </ul>
<!--                 <form class="nav navbar-nav navbar-form" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search...">
                    </div> -->
                    <!-- <button type="submit" class="btn btn-default">Submit</button> -->
      <!--           </form> -->
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> <span class="fa fa-user navIcon"></span><?php echo $first_name . ' ' . $surname; ?> <span class="caret"></span></a>
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
    <!-- Appointment Modal -->
 <div id="aptModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Appointment Info</h4>
      </div>
      <div class="modal-body" id="aptContainer">
        
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-danger" id="aptDeleteBtn">Delete Appointment</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
 </div>
    <!-- Patient Modal -->
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
                            <input class="inStyle" type="text" name="name">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 col-xs-4">
                            <label for="name">Patient Surname: </label>
                        </div>
                        <div class="col-md-2 col-xs-4 col-xs-offset-4">
                            <input class="inStyle" type="text" name="name">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 col-xs-4">
                            <label for="name">Father's Name: </label>
                        </div>
                        <div class="col-md-2 col-xs-4 col-xs-offset-4">
                            <input class="inStyle" type="text" name="name">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 col-xs-4">
                            <label for="name">Mother's Name: </label>
                        </div>
                        <div class="col-md-2 col-xs-4 col-xs-offset-4">
                            <input class="inStyle" type="text" name="name">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 col-xs-4">
                            <label for="name">Gender: </label>
                        </div>
                        <div class="col-md-2 col-xs-4 col-xs-offset-4">
                            <input class="inStyle" type="text" name="name">
                        </div>
                    </div>
                    <div class="row cusrow">
                        <div class="col-md-2 col-xs-4">
                            <label for="name">Date of birth: </label>
                        </div>
                        <div class="col-md-2 col-xs-4 col-xs-offset-4">
                            <input class="inStyle" type="date" name="name">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 col-xs-4">
                            <label for="name">Home Address: </label>
                        </div>
                        <div class="col-md-2 col-xs-4 col-xs-offset-4">
                            <input class="inStyle" type="text" name="name">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 col-xs-4">
                            <label for="name">Phone Number: </label>
                        </div>
                        <div class="col-md-2 col-xs-4 col-xs-offset-4">
                            <input class="inStyle" type="text" name="name">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 col-xs-4">
                            <label for="name">Mobile Number: </label>
                        </div>
                        <div class="col-md-2 col-xs-4 col-xs-offset-4">
                            <input class="inStyle" type="text" name="name">
                        </div>
                    </div>
                    <div class="row">
                       <div class="col-md-2 col-xs-4">
                         <label for="name">Work Number: </label>
                        </div>
                        <div class="col-md-2 col-xs-4 col-xs-offset-4">
                            <input class="inStyle" type="text" name="name">
                        </div>
                    </div>
                    <div class="row cusrow">
                        <div class="col-md-2">
                            <label for="issues">Critical Issues:</label>
                        </div>
                        <div class="col-md-10">
                            <textarea name="issues" id="issues" olaceholder="Critical Health Issues" cols="40" rows="10"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="saveBtn" class="btn btn-primary" >Save</button>
                    <button type="button" id="backBtn" class="btn btn-warning" data-dismiss="modal">Back</button>
                </div>
            </div>
        </div>
    </div>
    <!--  Event Modal  -->
    <div class="modal fade" tabindex="-1" role="dialog" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Schedule Appointment</h4>
                </div>
                <div class="modal-body">
               
                    <div class="form">
                        <div class="form-group col-md-12">
                            <div class="col-md-3">
                                <label for="title">Event title:</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="title" class="form-control" id="eventTitle" required>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="col-md-1">
                                <label for="title">Date:</label>
                            </div>
                            <div class="col-md-5">
                                <input type="date" name="title" id="dateSelection" class="form-control" required>
                            </div>
                            <div class="col-md-1">
                                <label for="timeList">Time:</label>
                            </div>
                            <div class="col-md-2">
                                <select class="form-control" id="timeList" required>
                                    <option>9</option>
                                    <option>10</option>
                                    <option>11</option>
                                    <option>12</option>
                                    <option>13</option>
                                    <option>14</option>
                                    <option>15</option>
                                    <option>16</option>
                                    <option>17</option>
                                    <option>18</option>
                                </select>
                            </div>
                           <div class="col-md-2">
                                <select class="form-control" id="minuteList" required>
                                    <option>00</option>
                                    <option>30</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="col-md-3 col-xs-9">
                                <label for="title">Patient SSN:</label>
                            </div>
                            <div class="col-md-9">
                            <?php if ($type == 'patient'){
                        			echo("<input type=\"text\" id=\"searchSSN\" name=\"title\" class=\"form-control\" value=\"".$SSN."\">");
                            	}
                            	else {
                            		echo("<input type=\"text\" id=\"searchSSN\" name=\"title\" class=\"form-control\" placeholder=\"Click to search\" required>");
                            	} 
                            	?>
                                
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="regionList">Select region:</label> <!-- Fist Here -->
                            <select class="form-control" id="regionList" required>
                            <option>--</option>
                            <?php 
                            	  $sql = "SELECT DISTINCT area FROM Health_Inst";
                            	  $result = mysqli_query($connection,$sql);

                            	  while ($row = mysqli_fetch_array($result)) {
                            	  	echo ("<option>".$row['area']."</option>");
                            	  }
                            ?>
                            </select>
                        </div>
                        <div class="form-group" id="specialtyList">
                            <label for="specList">Select Specialty:</label>
                            <select class="form-control" id="spList" required>
                                <option>--</option>
                            </select>
                        </div>
                        <div class="form-group" id="facilityList">
                            <label for="hospList">Select Facility:</label>
                            <select class="form-control" id="facList" required>
                                <option>--</option>
                            </select>
                        </div>
                        <br>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" onclick="saveAppointment()">Schedule</button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
                        <div id="errorContainer"> <span style="color:red; margin-left: 10px;"></span> </div>
                    </div>
                    
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <!-- Calendar -->
    <div class="container">
        <div class="row">
            <div class="col-md-12" id="calDiv">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Calendar</h3>
                        
                            <button id="newBtn" type="button" class="btn btn-primary btn-xs"><span class="fa fa-plus"></span> NEW</button>
                        
                    </div>
                    <div class="panel-body">
                        <div id="calendar"></div>
                    </div>
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



        $('#calendar').fullCalendar({
            schedulerLicenseKey: 'CC-Attribution-NonCommercial-NoDerivatives',
            // businessHours:true,
            contentHeight: 480,
            weekNumbers: true,
            hiddenDays: [0],
            header: {
                left: 'prev,next today',
                center: "title",
                right: 'month,basicWeek,basicDay'
            },

            dayClick: function(date, jsEvent, view) {
                console.log("dayclicked" + date.format());
                document.getElementById("dateSelection").value = date.format();
                $('#myModal').modal('toggle');


            },
                eventClick: function(calEvent, jsEvent, view) {

        $('#aptModal').modal('toggle');
        getAppointment(calEvent.id);

        // change the border color just for fun
        // $(this).css('border-color', 'red');

    		}

           ,

            events: [
                    {
                        title: "Null Event",
                        start: "1969-01-01",
                        description: "this is niar"
                    }
            	<?php 
            	if ($type == "patient"){
            		$sql="SELECT * FROM Appointment, Health_Inst WHERE Health_Inst_idHealth_Inst = idHealth_Inst AND Patient_SSN='".$SSN."'";
            	}
            	else { 
            		$sql="SELECT * FROM Appointment, Health_Inst WHERE Health_Inst_idHealth_Inst = idHealth_Inst";
            	}
            	
            	$result = mysqli_query($connection, $sql);

            	while($row = mysqli_fetch_array($result)) {
            		echo(",");
            		echo("{ title: '".$row['title']."',");
            		echo("start: '".$row['atDateTime']."',");
            		echo("description: '".$row['specialty']." at ".$row['area']."',");
            		echo("id: '".$row['idAppointment']."',");
            		echo("title: '".$row['title']."'}");
            	}
				?>// more events here
                ],
               eventMouseover: function(event, element) {
                    $(this).tooltip({title:event.description, html: true, container: "body"});
                    $(this).tooltip('show');
      }
                

        }); //end calendar
<?php 

if ($type == "doctor") {
 echo("document.getElementById(\"searchSSN\").onclick = function() {
            searchSSN();
        };");
}
 ?>

        document.getElementById("backBtn").onclick = function() {
            searchSSN();
        };
        document.getElementById("saveBtn").onclick = function() {
            document.getElementById('searchSSN').value = document.getElementById('resultSSN').value;
            searchSSN();
        };
        document.getElementById("newBtn").onclick = function() {
            $('#myModal').modal('toggle');
        };

        document.getElementById("regionList").onchange = function() {
        document.getElementById('facList').selectedIndex = 0;
       if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("specialtyList").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","getSpecialtiesByArea.php?region="+this.value,true);
        xmlhttp.send();
        };



    });
    </script>
</body>

</html>
