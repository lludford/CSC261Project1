<!DOCTYPE html>
<html>
<head>
<title>Make a Reservation</title>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
  
  <script>
  $(document).ready(function() {
    $("#reservation_date").datepicker();
  });
  </script>
  <style>

  .dropdown {
	  float: left;
	  overflow: hidden;
	}
	.dropdown-content {
	  display: none;
	  position: absolute;
	  background-color: #f9f9f9;
	  min-width: 160px;
	  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
	  z-index: 1;
	}
	.dropdown-content a:hover {
  background-color: #ddd;
}
/* Links inside the dropdown */
.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}


/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
  display: block;
}
</style>
</head>

<body>

<h1> Make a Reservation: </h1>
<table>
	<tr>
		<td>UserID:</td>
		<td> <input id="userID"/></td>
	</tr>
	<tr>
		<td>Number of People:</td>
		<td> <input id="num_people"/></td>
	</tr>
	<tr>
		<td> Room:</td>
		<td>
			<select>
				
			</select>
		</td>
	</tr>
	<tr>
		<td>Date: </td>
		<td><input class="reservation_date" id="reservation_date"/></td>
	</tr>
<br>
</table>
<Button> Make Reservation </Button>
</body>

</html>




<!--  -->
<div class="container">
<div class="form-group row">
  <label for="username_id" class="col-2 col-form-label">Username</label>
  <div class="col-10">
    <input class="form-control" type="text" id="username_id" name="username_id">
  </div>
</div>
<div class="form-group row">
	<label for="class_year" class="col-2 col-form-label"> Room</label>
     <div class="col-10" id="class_year_div" >
    
      <select required id="class_year" name="class_year" class="form-control">
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
  <label for="example-number-input" class="col-2 col-form-label">Number</label>
  <div class="col-10">
    <input class="form-control" type="number" value="42" id="example-number-input">
  </div>
</div>

<div class="form-group row">
  <label for="example-date-input" class="col-2 col-form-label">Date</label>
  <div class="col-10">
    <input class="form-control" type="date" value="2011-08-19" id="example-date-input">
  </div>
</div>

<div class="form-group row">
  <label for="example-time-input" class="col-2 col-form-label">Time</label>
  <div class="col-10">
    <input class="form-control" type="time" value="13:45:00" id="example-time-input">
  </div>
</div>
</div>