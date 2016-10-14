<?php include('session.php');

if ($type == "patient") {
// SQL Query To Fetch Complete Information Of Patient
$ses_sql=mysqli_query($connection, "SELECT * FROM Patient WHERE SSN='$SSN'");
}
else if ($type == "doctor") {
// SQL Query To Fetch Complete Information Of Doctor
$ses_sql=mysqli_query($connection, "SELECT * FROM Doctor WHERE SSN='$SSN'");
}
$row = mysqli_fetch_assoc($ses_sql);

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
    <title>Profile</title>
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
                    <li><a href="patients.php" <?php if ($type == "patient") { echo ("style=\"display:none\""); }?>><span class="fa fa-users navIcon"></span>Patients</a></li>
                    <li class="active"><a href="profile.php"><span class="fa fa-universal-access navIcon"></span>Profile</a></li>
                </ul>
<!--                 <form class="nav navbar-nav navbar-form" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search...">
                    </div> -->
                    <!-- <button type="submit" class="btn btn-default">Submit</button> -->
                <!-- </form> -->
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
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-header"><span class="fa fa-info-circle"></span> Profile</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <p class="headProf">SSN:</p>
            </div>
            <div class="col-md-9">
                <p class="contProf"><?php echo($SSN); ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <p class="headProf">Name:</p>
            </div>
            <div class="col-md-9">
                <p class="contProf"><?php echo($first_name); ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <p class="headProf">Surname:</p>
            </div>
            <div class="col-md-9">
                <p class="contProf"><?php echo($surname); ?></p>
            </div>
        </div>
        <div class="row" <?php if ($type == "patient") { echo ("style=\"display:none\""); }?>>
            <div class="col-md-3">
                <p class="headProf">Specialty:</p>
            </div>
            <div class="col-md-9">
                <p class="contProf"><?php echo($row['specialty']); ?></p>
            </div>
        </div>
        <div class="row" <?php if ($type == "doctor") { echo ("style=\"display:none\""); }?>>
            <div class="col-md-3">
                <p class="headProf" >Father's Name:</p>
            </div>
            <div class="col-md-9">
                <p class="contProf"><?php echo($row['fathers_name']); ?></p>
            </div>
        </div>
        <div class="row" <?php if ($type == "doctor") { echo ("style=\"display:none\""); }?>>
            <div class="col-md-3">
                <p class="headProf">Mother's Name:</p>
            </div>
            <div class="col-md-9">
                <p class="contProf"><?php echo($row['mothers_name']); ?></p>
            </div>
        </div>
        <div class="row" <?php if ($type == "doctor") { echo ("style=\"display:none\""); }?>>
            <div class="col-md-3">
                <p class="headProf">Gender:</p>
            </div>
            <div class="col-md-9">
                <p class="contProf"><?php echo($row['sex']); ?></p>
            </div>
        </div>
        <div class="row" <?php if ($type == "doctor") { echo ("style=\"display:none\""); }?>>
            <div class="col-md-3">
                <p class="headProf">Home address:</p>
            </div>
            <div class="col-md-9">
                <p class="contProf"><?php echo($row['residence']); ?></p>
            </div>
        </div>
        <div class="row" <?php if ($type == "doctor") { echo ("style=\"display:none\""); }?>>
            <div class="col-md-3">
                <p class="headProf">Phone Number:</p>
            </div>
            <div class="col-md-9">
                <p class="contProf"><?php echo($row['phone_home']); ?></p>
            </div>
        </div>
        <div class="row" <?php if ($type == "doctor") { echo ("style=\"display:none\""); }?>>
            <div class="col-md-3">
                <p class="headProf">Mobile Number:</p>
            </div>
            <div class="col-md-9">
                <p class="contProf"><?php echo($row['phone_cell']); ?></p>
            </div>
        </div>
        <div class="row" <?php if ($type == "doctor") { echo ("style=\"display:none\""); }?>>
            <div class="col-md-3">
                <p class="headProf">Work Number:</p>
            </div>
            <div class="col-md-9">
                <p class="contProf"><?php echo($row['phone_work']); ?></p>
            </div>
        </div>
         <div class="row" <?php if ($type == "doctor") { echo ("style=\"display:none\""); }?>>
            <div class="col-md-3">
                <p class="headProf">Critical issues:</p>
            </div>
            <div class="col-md-9">
                <p class="contProf"><?php echo($row['health_info']); ?></p>
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
