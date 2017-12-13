<!DOCTYPE html>
<html>
<head>
<title>Make a Reservation</title>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  
<script>
	function validateDate(){
		var today = new Date();//gets today's date
		
		
		inputdate = new Date($('#date').val());
		console.log("inputdate: " + $('#date').val());
		console.log("today's date: " + today.toDateString());
		if (inputdate.toDateString()< today.toDateString()){
			$('#date').focus();
			console.log("yep");
			//alert("Date must be after "+today.toDateString());

		}

	}

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

    section {
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
        <a class="nav-link" href="room_reservation.php">View Your Reservations </a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="logout.php">Log Out</a>
      </li>
    </ul>
    
  </div>
</nav>
	

	<section>	
<h1> Make A Reservation</h1>
<hr class="hr-light mt-4 wow fadeInDown" color="#ffffff">
	<form id="make_reservation_form" method="post">

<div class="form-group row">
	<label for="room_name" class="col-2 col-form-label"> Room</label>
     <div class="col-10" id="class_year_div" >
    
      <select required id="room_name" name="room_name" class="form-control">
        <option selected value="0"> Choose... </option>
        <?php
  
  
  
        	require_once('db_setup.php');
			  $sql = "USE lludford;";

			  if ($conn->query($sql) === TRUE) {
			     // echo "using Database tbiswas2_company";
			  } else {
			     echo "Error using  database: " . $conn->error;
			  }
        session_start();
            $user = $_SESSION['login_user'];
            //Check if there is a user logged in
            if(!isset($_SESSION['login_user'])){
                header("location:login.php");
             }
			  $sql = "SELECT * FROM Room;";
			  $result = $conn->query($sql);
			  if($result->num_rows > 0){
			  	while($row = $result->fetch_assoc()){
			  		?>
			  		<option value="<?php echo $row['RoomID'] ?>"> 
			  			<?php $roomname = $row['Building'].' '.$row['Number'];
			  			echo $roomname;?> </option>
			  		<?php
			  	}
			  }
        ?>
      </select>
  </div>
</div>


<div class="form-group row">
  <label for="date" class="col-2 col-form-label" >Date</label>
  <div class="col-10">
    <input required class="form-control" type="date" name="date" id="date" >
  </div>
</div>

<div class="form-group row">
  <label for="start_time" class="col-2 col-form-label">Start Time</label>
  <div class="col-10">
    <input required class="form-control" name="start_time" type="time" id="start_time">
  </div>
</div>
<div class="form-group row">
  <label for="end_time" class="col-2 col-form-label">End Time</label>
  <div class="col-10">
    <input required class="form-control" name="end_time" type="time"  id="end_time">
  </div>
</div>

<input type="submit" class="btn btn-primary" value="Submit">
</form>
</div>
<?php 

session_start();
$username_id = $_SESSION['login_user'];
//Check if there is a user logged in
if(!isset($_SESSION['login_user'])){
    header("location:login.php");
 }

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $room = $_REQUEST['room_name'];
  $date = $_REQUEST['date'];
  $start_time = $_REQUEST['start_time'];
  $end_time = $_REQUEST['end_time'];
  //$var = "20/04/2012";
//echo date("Y-m-d", strtotime($var) )
  $start_time = date("H:i:s", strtotime($start_time));
  $end_time = date("H:i:s", strtotime($end_time));
  
  $date_reformatted = date("Y-m-d", strtotime($date));

 $sql = "SELECT * FROM User WHERE UserID='$username_id';";
 $result = $conn->query($sql);
 if ($result->num_rows > 0){
	  $sql = "SELECT * FROM Reservation WHERE RoomID='$room' AND ReservationDate='$date_reformatted' AND StartTime='$start_time' OR (StartTime < '$end_time' AND StartTime > '$start_time')  OR (EndTime > '$start_time' AND EndTime < '$end_time') OR (StartTime <'$start_time' AND EndTime > '$end_time');"; 
	  $sql = "SELECT * FROM Reservation WHERE RoomID='$room' AND ReservationDate='$date_reformatted' AND 
StartTime BETWEEN $start_time AND $end_time OR 
EndTime BETWEEN $start_time AND $end_time OR
$start_time BETWEEN StartTime AND EndTime;";
	  $result = $conn->query($sql);
		if($result->num_rows > 0){
			?>
			<div class="alert alert-danger"> There is already a reservation during this time </div>
			<?php
			echo "There is already a reservation during this time: ".$date_reformatted;
			
				  	
		}else{
			
			
			$sql="INSERT INTO Reservation (UserID, RoomID, ReservationDate, StartTime, EndTime) VALUES('$username_id', '$room', '$date_reformatted', '$start_time', '$end_time');";
			$result = $conn->query($sql);

			header("location: room_reservation.php");
		}
		$conn->close();
}
else{
	?> 
	<div class="col-10">
	<div class="alert alert-danger" role="alert" >
		<strong> Oh no! </strong>You inputted an invalid username.
		</div>
		</div><?php
}
}
?></section>

</body>

</html>



