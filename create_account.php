<!DOCTYPE html>
<html>
    <head>
  
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css"> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
            
            <script>
                function validateForm() {
                    var x = document.forms["new_account"]["fname"].value;
                    if (x == "") {
                        alert("Name must be filled out");
                        return false;
                    }
                    }
                    function validateUsername(){
                    //check if username is blank or if username already exists
                    //alert("username is, " + username);
                    var x = $('#username');
                    x.val(x.val().toUpperCase());
                    console.log("helop");
                    }
                    function passwordsMatch(){
                    var pw = $('password');
                    var pwc = $('password_confirmation');
                    if (pw.val() !== pwc.val()){

                    }
                    }
                    function myFunction() {
                    var x = document.getElementById("username");
                    x.value = x.value.toUpperCase();
                }
                
                $(document).ready(function () {
                    $("input[name=type_radio]:radio").change(function () {
                        if ($(this).val() ==='student') {
                        $('#class_year_div').removeAttr("hidden");
                            console.log("student");
                            
                        }
                        else {
                        //$('#class_year').selectedIndex = 0;//change class year back to Choose..
                        $('#class_year_div').attr("hidden", true);
                        
                        console.log("Class year: " + $('#class_year').val());
                            console.log("employee");
                        }
                        
                    })
                });
                function check(){
                if ($('#dptmt').val()==="0"){
                    console.log("val=0");
                    e.preventDefault();
                };
                }

                $(document).ready(function () {

                    $('#create_account_form').submit(function (e) {
                    if($('#type_radio').val()==='student'){
                        if($('#class_year').val()==0){
                            e.preventDefault();
                        $('#class_year').focus()
                        }
                        }
                        if ($('#dptmt').val()==="0"){
                    console.log("val=0");
                    e.preventDefault();
                    $('#dptmt').focus()
                    };
                    });
                });
            </script>

        <style>
        body, html { 
            height: 100%; 
            margin: 0;
        }
        .bg {
        /* The image used */
            background-image: url('https://mdbootstrap.com/img/Photos/Others/img%20%2848%29.jpg');
            height: 100%;
            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        nav{
            background: rgba(255, 255, 255, 0.7);
            z-index:99
        }
        h1 {
            letter-spacing: 8px;
        }
        .hr{
            border-top: 3px solid #fff;
            width: 80px;
        }
        #create_account_id {
            margin-top: 2.5%;
            display: inline-block;
            text-align: center;
            color: white;
            border-radius: 1em;
            padding: 1em;
            position: absolute;
            top: 50%;
            left: 50%;
            margin-right: -50%;
            transform: translate(-50%, -50%) 
        }

        
        </style>
    
    </head>
    

    <body>
        <div class="bg">

        <nav class="navbar navbar-toggleable navbar-light bg-faded">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#">Room Reservations 2.61</a>
            
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <a class="navbar-brand" href="#">Room Reservations 2.61</a>
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                
                <li class="nav-item">
                    <a class="nav-link " href="login.php">Log In</a>
                </li>
                </ul>
                
            </div>
        </nav>

            <?php 

                $username_id = $_REQUEST['username_id'];
                $firstname = $_REQUEST['firstname'];
                $lastname = $_REQUEST['lastname'];
                $type = $_REQUEST['type_radio'];
                $email = $_REQUEST['email'];
                $pw = $_REQUEST['password'];
                $dptmt = $_REQUEST['dptmt'];
                $year = $_REQUEST['class_year'];
                require_once('db_setup.php');
                $sql = "USE lludford";

                if ($conn->query($sql) === TRUE) {

                } else {
                    echo "Error using  database: " . $conn->error;
                }
                session_start();
            $user = $_SESSION['login_user'];
            //Check if there is a user logged in
            if(isset($_SESSION['login_user'])){//if they are logged in, take them back to room reservation page
                header("location:login.php");
             }else{
                header("location:room_reservation.php");
         }
            ?>


<!--             <section> -->
<div class="container" id="create_account_id">
                <h1> Create an Account </h1>
                
                <hr class="hr-light mt-4 wow fadeInDown" color="#ffffff">

                    <?php
                    if($_SERVER["REQUEST_METHOD"] == "POST"){
                        $sql = "SELECT * FROM User WHERE UserID like '$username_id';";
                        $result = $conn->query($sql);
                        if($result->num_rows > 0){
                    ?>

                <div class="form-group ">
                
                    <div class="form-control alert alert-danger" role="alert"> <strong> Oh no! </strong>This username is already taken.<span class="glyphicon glyphicon-warning-sign form-control-feedback"></span></div></div>
                    
                    <?php
                        }else {
                        $sql = "INSERT INTO User (UserID, Password) VALUES ('$username_id', '$pw');";
                        $result = $conn->query($sql);
                        
                        $name = $firstname.' '.$lastname;
                        if (strcmp($type, 'student')==0){
                            
                            
                            
                            $sql = "INSERT INTO Student (StudentID, Name, Email, Year, Major) VALUES ('$username_id', '$name', '$email', '$year', '$dptmt');";
                            $result = $conn->query($sql);
                        }
                        else{
                            $sql = "INSERT INTO Employee (EmployeeID, Name, Department, Email) VALUES ('$username_id', '$name', '$dptmt', '$email');";
                            $result = $conn->query($sql);
                        }
                        $conn->close();?>
                        <div class="form-control alert alert-success"><strong> Congrats! </strong> User successfully created! <a href="login.php">Login here!</a></div>
                        <?php header("location: room_reservation.php");
                        

                        }
                        
                        }
                    ?>


                <form id="create_account_form" action="" method="post">

                <div class="form-row">
                    <label for="firstname" class="col-2 col-form-label">First Name</label>
                    <div class="col-10">
                        <input required type="firstname" class="form-control" name="firstname" id="firstname" placeholder="First Name">
                    </div>
                </div>

                <div class="form-row">
                    <label for="lastname" class="col-2 col-form-label">Last Name</label>
                    <div class="col-10">
                        <input required type="lastname" class="form-control" name="lastname" id="lastname" placeholder="Last Name">
                    </div>
                </div>

                <div class="form-row">
                    <label for="username" class="col-2 col-form-label">Username     </label>
                    <div class="col-10">
                        <input required type="username" class="form-control" name="username_id" id="username_id" placeholder="Username">    
                    </div>       
                </div>

                <div class="form-row">
                    <label for="email" class="col-2 col-form-label">Email       </label>
                    <div class="col-10">
                        <input required type="email" class="form-control" name="email" id="email" placeholder="Email">
                    </div>      
                </div>

                <div class="form-row">
                    <label for="password" class="col-2 col-form-label">Password     </label>
                    <div class="col-10">
                        <input required type="password" class="form-control" name="password" id="password" placeholder="Password">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-row form-check form-check-inline">
                        <label class="form-check-label">
                            <input required class="form-check-input" type="radio" name="type_radio" id="student_radio" value="student"> Student
                        </label>
                    </div>

                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input required class="form-check-input" type="radio" name="type_radio" id="employee_radio" value="employee"> Employee
                    </label>
                    </div>
                </div>

                <div class="form-row" id="class_year_div" hidden>
                    <!-- <div id="class_year_div" hidden> -->
                        <label for="class_year" class="col-2 col-form-label">Class Year</label>
                        <select required id="class_year" name="class_year" class="form-control">
                            <option selected value="0"> Choose... </option>
                            <option value="1">Freshman</option>
                            <option value="2">Sophomore</option>
                            <option value="3">Junior</option>
                            <option value="4">Senior</option>
                            <option value="5">Graduate Student</option>
                            <option value="6">Take 5</option>
                        </select>
                    <!-- </div> -->
                </div>


                <div class="form-row">                
   
                        <label for="dptmt" class="col-2 col-form-label">Department</label>
                        <select required id="dptmt" name="dptmt" class="form-control">
                            <option selected value="0">Choose...</option>
                            <option value="ANT">Anthropology</option>
                            <option value="BIO">Biology</option>
                            <option value="BME">Biomedical Engineering</option>
                            <option value="BCS">Brain and Cognitive Sciences</option>
                            <option value="CHE">Chemical Engineering</option>
                            <option value="CHI"> Chinese </option>
                            <option value="CSC">Computer Science</option>
                            <option value="DS">Data Science</option>
                            <option value="ENG">English</option>
                            <option value="HIS">History</option>
                            <option value="ME">Mechanical Engineering</option>
                            <option value="MUS">Music</option>
                            <option value="OPT">Optics/Optical Engineering</option>
                            <option value="PHI">Philosophy</option>
                            <option value="POL">Political Science</option>
                            <option value="PSY">Psychology</option>
                            <option value="PUB">Public Health</option>
                            <option value="SPA">Spanish</option>
                            <option value="VSA">Visual Arts</option>         

                        </select>

                </div> 
            
                <br>
                
                <input type="submit" class="btn btn-primary" value="Submit">
                </form>  
            </div>
<!--             </section> -->
        </div>
    </body>
  
  </html>
