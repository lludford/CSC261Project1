<!DOCTYPE html>
<html>
    <head> 
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<style>
        body, html { 
            height: 100%; 
            margin: 0;

        
        /* The image used */
            background-image: url('https://mdbootstrap.com/img/Photos/Others/img%20%2848%29.jpg');
            height: 100%;
            /* Center and scale the image nicely */
            background-position: center;
            
            background-attachment: fixed;
            background-size: cover;

     /*       z-index:3;
    top:0px;
    left:0px;
    width:100%;
    height:97px;
     position:fixed;*/
        }
        nav{
            background: rgba(255, 255, 255, 0.7);
            z-index:99
        }
        h1,p {
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
<header></header>
<div class="bg">

<!-- nvarbar -->
<nav class="navbar navbar-toggleable navbar-light bg-faded">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#">Room Reservations 2.61</a>
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
        
<h1> <font color="ffffff">My Reservations </font></h1>
        

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
     		
		 /*if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['edit'])){
                	echo "no";
			echo "$room_id";     
                        $_SESSION['reservation_room'] = $room_id;
                        $_SESSION['reservation_date'] = $row['ReservationDate'];
                        
                    } 
                    else if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['delete'])){
                
                        $sql_delete="DELETE FROM Reservation WHERE RoomID='$room_id' AND UserID='$user' AND ReservationDate='$row[ReservationDate]'";
                
                        $result = $conn->query($sql_delete);
                }*/
	      // Query:
            $sql = "SELECT * FROM Reservation where UserID = '$user' ORDER BY ReservationDate Desc, StartTime ;";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
        ?>
        
        <table class="table table-striped">
        <tr>
            <th><font color="ffffff">Building</font></th>
            <th><font color="ffffff">Room Number</font></th>
            <th><font color="ffffff">Reservation Date</font></th>
            <th><font color="ffffff">Start Time</font></th>
            <th><font color="ffffff">End Time</font></th>
            <th> </th>
            <th> </th>

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

                <td><font color="ffffff"><?php echo $row_room['Building']?></font></td>
                <td><font color="ffffff"><?php echo $row_room['Number']?></font></td>
                <td><font color="ffffff"><?php echo $row['ReservationDate']?></font></td>
                <td><font color="ffffff"><?php echo $row['StartTime']?></font></td>  
                <td><font color="ffffff"><?php echo $row['EndTime']?></font></td>
                <td>
                    <form action="edit_reservation.php?" method='post'>
                        <input type="submit" name="edit" value="Edit">    
                        <input hidden value="<?php echo $row['ReservationID'];?>" name="reservation_id">
                    </form>
                </td>
                
		
            </tr>

        <?php
                }
            }
            else {?>
            <p class="form-control alert alert-warning"> No current reservations to display <strong> <a href="make_reservation.php">Create one here!</a></strong></p>
            <?php
            }
        ?>

            </table>

        <?php
        //$conn->close();
        ?>
</td></div>
    </body>
</html>

