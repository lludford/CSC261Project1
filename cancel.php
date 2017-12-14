<?php
	require_once('db_setup.php');
			  $sql = "USE lludford;";
        $reservation_id = $_POST['reservation_id'];
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
$reservation_id = $_GET['reservation_id'];
$sql_delete="DELETE FROM Reservation WHERE ReservationID='$reservation_id';";
$result = $conn->query($sql_delete);
$conn->close();
header("location:room_reservation.php");
?>
