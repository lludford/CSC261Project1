<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  
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

<?php 

  $username_id = $_REQUEST['username_id'];
  $firstname = $_REQUEST['firstname'];
  $lastname = $_REQUEST['lastname'];
  $type = $_REQUEST['type_radio'];
  $email = $_REQUEST['email'];
  $pw = $_REQUEST['password'];
  $year = $_REQUEST['class_year'];
  require_once('db_setup.php');
  $sql = "USE lludford;";
  if ($conn->query($sql) === TRUE) {
     // echo "using Database tbiswas2_company";
  } else {
     echo "Error using  database: " . $conn->error;
  }?>
  <div class="container-fluid">
    <div class="form-group col-md-6">
  <h1> Create an Account </h1>
</div>
  <?php
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $sql = "SELECT * FROM User WHERE UserID like '$username_id';";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
      
      ?>
      <div class="form-group col-md-6">
      
      <div class="alert alert-danger" role="alert"> <strong> Oh no! </strong>This username is already taken.<span class="glyphicon glyphicon-warning-sign form-control-feedback"></span></div></div>
      <?php
    }else {
      $sql = "INSERT INTO User (UserID, Password) VALUES ('$username_id', '$pw');";
      $result = $conn->query($sql);
      echo strcmp($type, 'student');
      echo '\n'.$type.'--';
      if (strcmp($type, 'student')==0){
        
        $name = $firstname.' '.$lastname;
        echo $name;
        $sql = "INSERT INTO Student (StudentID, Name, Email, Year, Major) VALUES ('$username_id', '$name', '$email', '$year', '$dptmt');";
        $result = $conn->query($sql);
      }
      else{

      }
      header("location: make_reservation.html");
      echo "bye";

    }
    $conn->close();
  }
?>


<form id="create_account_form" action="" method="post">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="firstname" >First Name</label>
      <input required type="firstname" class="form-control" name="firstname" id="firstname" placeholder="First Name">
    </div>
    
</div>
<div class="form-row">
  <div class="form-group col-md-6">
      <label for="lastname"  >Last Name</label>
      <input required type="lastname" class="form-control" name="lastname" id="lastname" placeholder="Last Name">
    </div>
</div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="username">Username</label>
      <input required type="username" class="form-control" name="username_id" id="username_id" placeholder="Username">
    </div>
    
</div>

<div class="form-row">
    <div class="form-group col-md-6">
      <label for="email">Email</label>
      <input required type="email" class="form-control" name="email" id="email" placeholder="Email">
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
      <label for="password">Password</label>
      <input required type="password" class="form-control" name="password" id="password" placeholder="Password">
    </div>
</div>

<div class="form-row">
<div class="form-check form-check-inline">
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
<div class="form-row">
     <div class="form-group col-md-4" id="class_year_div" hidden>
    <label for="class_year">Class Year</label>
      <select required id="class_year" name="class_year" class="form-control">
        <option selected value="0"> Choose... </option>
        <option value="1">Freshman</option>
        <option value="2">Sophomore</option>
        <option value="3">Junior</option>
        <option value="4">Senior</option>
        <option value="5">Graduate Student</option>
        <option value="6">Take 5</option>
      </select>
  </div>
</div>
 <div class="form-row">
    
    <div class="form-group col-md-4">
    <label for="dptmt">Department</label>
      <select required id="dptmt" name="dptmt" class="form-control">
        <option selected value="0">Choose...</option>
        <option value="bio">Biology</option>
        <option value="bme">Biomedical Engineering</option>
        <option value="bcs">Brain and Cognitive Sciences</option>
        <option value="che">Chemical Engineering</option>
        <option value="csc">Computer Science</option>
        <option value="ds">Data Science</option>
        <option value="eng">English</option>
        <option value="his">History</option>
        <option value="me">Mechanical Engineering</option>
        <option value="mus">Music</option>
        <option value="opt">Optics/Optical Engineering</option>
        <option value="phi">Philosophy</option>
        <option value="psy">Psychology</option>
        <option value="spa">Spanish</option>
        <option value="vsa">Visual Arts</option>
      </select>
  </div>
</div>
  



<br>
 
  <input type="submit" class="btn btn-primary" value="Submit">
</form></div></head></html>