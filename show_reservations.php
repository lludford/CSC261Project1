<!DOCTYPE html>
<html>
    <head> 
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  
</head>
<body>

        <div class = "container">
<!-- nvarbar -->
<nav class="navbar navbar-toggleable navbar-light bg-faded">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#">Your Reservations</a>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <a class="navbar-brand" href="#">Room Reservations 2.61</a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      
      <li class="nav-item">
        <a class="nav-link" href="make_reservation.php">Make a Reservation</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="logout.php">Log Out</a>
      </li>
    </ul>
    
  </div>
</nav>
            <!-- nvarbar -->
        

        

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

            // Query:
            $sql = "SELECT * FROM Reservation where UserID = '$user'";
            $result = $conn->query($sql);
            if($result->num_rows > 0){

        ?>
        
        <table class="table table-striped">
        <tr>
            <th>Building</th>
            <th>Room Number</th>
            <th>Reservation Date</th>
            <th>Start Time</th>
            <th>End Time</th>
        </tr>

        <?php
            while($row = $result->fetch_assoc()){
                $room_id = $row['RoomID'];
                
        ?>
            <tr>
                <?php
                    $sql_room = "SELECT Building, Number FROM Room WHERE RoomID = '$room_id'";
                    $result_room = $conn->query($sql_room);
                    $row_room = $result_room->fetch_assoc();
                ?>
                
                <td><?php echo $row_room['Building']?></td>
                <td><?php echo $row_room['Number']?></td>
                <td><?php echo $row['ReservationDate']?></td>
                <td><?php echo $row['StartTime']?></td>  
                <td><?php echo $row['EndTime']?></td>

            </tr>

        <?php

                }
            }
            else {
            echo "Nothing to display";
            }

        ?>

            </table>

        <?php
        $conn->close();
        ?>
</td>
    </body>
</html>