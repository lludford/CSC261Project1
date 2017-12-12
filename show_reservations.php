<!DOCTYPE html>
<html>
    <head> 
    </head>

    <body>
        <h1> Reservations </h1>

        <td><a href="logout.php">Sign out</a>

        <td><a href="make_reservation.php">Make New Reservations</a>

        <?php
            require_once('db_setup.php');
            $sql = "USE lyang29;";
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
                echo "$room_id";
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

    </body>
</html>