<?php 
$SSN = $_GET['SSN'];
$connection = mysqli_connect("localhost", "root", "", "ihs");
$ses_sql=mysqli_query($connection, "SELECT * FROM Patient WHERE SSN='$SSN'");
$row = mysqli_fetch_assoc($ses_sql);
 ?>
<div class="row">
                        <div class="col-md-3 col-xs-3">
                            <label for="searchpat">Search Patient:</label>
                        </div>
                        <div class="col-md-3 col-xs-1">
                            <input id="searchpat" type="text" name="searchpat" placeholder="search ssn">
                        </div>
                        <div class="col-md-1 col-md-offset-1 col-xs-1 col-xs-offset-6">
                            <button id="searchpatbtn" type="button" class="btn btn-primary btn-sm" onclick="getModalPatient($('searchpat').value)"><span id="searchIcon" class="fa fa-search"></span></button>
                        </div>
                    </div>
                    <hr>
                    <div class="row cusrow">
                        <div class="col-md-2 col-xs-4">
                            <label for="name">SSN: </label>
                        </div>
                        <div class="col-md-2 col-xs-4 col-xs-offset-4">
                            <input class="inStyle" type="text" name="name" id="resultSSN" value="<?php echo($row['SSN']); ?>">
                        </div>
                    </div>
                    <div class="row cusrow">
                        <div class="col-md-2 col-xs-4">
                            <label for="name">Patient Name: </label>
                        </div>
                        <div class="col-md-2 col-xs-4 col-xs-offset-4">
                            <input class="inStyle" type="text" name="name" id="patName" value="<?php echo($row['name']); ?>"> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 col-xs-4">
                            <label for="name">Patient Surname: </label>
                        </div>
                        <div class="col-md-2 col-xs-4 col-xs-offset-4">
                            <input class="inStyle" type="text" name="name" id="patSurname" value="<?php echo($row['surname']); ?>"> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 col-xs-4">
                            <label for="name">Father's Name: </label>
                        </div>
                        <div class="col-md-2 col-xs-4 col-xs-offset-4">
                            <input class="inStyle" type="text" name="name" id="fathers_name" value="<?php echo($row['fathers_name']); ?>"> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 col-xs-4">
                            <label for="name">Mother's Name: </label>
                        </div>
                        <div class="col-md-2 col-xs-4 col-xs-offset-4">
                            <input class="inStyle" type="text" name="name" id="mothers_name" value="<?php echo($row['mothers_name']); ?>"> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 col-xs-4">
                            <label for="name">Gender: </label>
                        </div>
                        <div class="col-md-2 col-xs-4 col-xs-offset-4">
                            <input class="inStyle" type="text" name="name" id="sex" value="<?php echo($row['sex']); ?>"> 
                        </div>
                    </div>
                    <div class="row cusrow">
                        <div class="col-md-2 col-xs-4">
                            <label for="name">Date of birth: </label>
                        </div>
                        <div class="col-md-2 col-xs-4 col-xs-offset-4">
                            <input class="inStyle" type="date" name="name" id="birth" value="<?php echo($row['birth']); ?>"> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 col-xs-4">
                            <label for="name">Home Address: </label>
                        </div>
                        <div class="col-md-2 col-xs-4 col-xs-offset-4">
                            <input class="inStyle" type="text" name="name" id="residence" value="<?php echo($row['residence']); ?>"> 
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col-md-2 col-xs-4">
                            <label for="name">Phone Number: </label>
                        </div>
                        <div class="col-md-2 col-xs-4 col-xs-offset-4">
                            <input class="inStyle" type="text" name="name" id="phone_home" value="<?php echo($row['phone_home']); ?>"> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 col-xs-4">
                            <label for="name">Mobile Number: </label>
                        </div>
                        <div class="col-md-2 col-xs-4 col-xs-offset-4">
                            <input class="inStyle" type="text" name="name" id="phone_cell" value="<?php echo($row['phone_cell']); ?>"> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 col-xs-4">
                            <label for="name">Work Number: </label>
                        </div>
                        <div class="col-md-2 col-xs-4 col-xs-offset-4">
                            <input class="inStyle" type="text" name="name" id="phone_work" value="<?php echo($row['phone_work']); ?>"> 
                        </div>
                    </div>
                    <div class="row cusrow">
                        <div class="col-md-2">
                            <label for="issues">Critical Issues:</label>
                        </div>
                        <div class="col-md-10">
                            <textarea name="issues" id="issues" olaceholder="Critical Health Issues" cols="40" rows="10"> <?php echo($row['health_info']); ?></textarea>
                        </div>
                    </div>
</div>