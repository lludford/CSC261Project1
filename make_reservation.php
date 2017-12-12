<!DOCTYPE html>
<html>
<head>
<title>Make a Reservation</title>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
  
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
	$(document).ready(function () {

    $('#make_reservation_form').submit(function (e) {
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
    var username = $('#username_id').val();

    });
});
</script>
</style>
</head>

<body>



<!--  -->
<div class="container">
	<h1> Make a Reservation </h1>
	<form id="make_reservation_form" method="post">
<div class="form-group row">
  <label for="username_id" class="col-2 col-form-label">Username</label>
  <div class="col-10">
    <input required class="form-control" type="text" id="username_id" name="username_id">
  </div>
</div>
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
</body>

</html>
<?php 
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $username_id = $_REQUEST['username_id'];
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
			echo "There is already a reservation during this time: ".$date_reformatted;
			
				  	
		}else{
			echo "Good";
			echo $start_time;
			$sql="INSERT INTO Reservation (UserID, RoomID, ReservationDate, StartTime, EndTime) VALUES('$username_id', '$room', '$date_reformatted', '$start_time', '$end_time');";
			$result = $conn->query($sql);
		}
		$conn->close();
}
else{
	echo "Invalid Username";
}
}
?>
