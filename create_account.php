
<?php 

$username_id = $_REQUEST['username_id'];
$firstname = $_REQUEST['firstname'];
$lastname = $_REQUEST['lastname'];
$type = $_REQUEST['type_radio'];

require_once('db_setup.php');
$sql = "USE lludford;";
if ($conn->query($sql) === TRUE) {
   // echo "using Database tbiswas2_company";
} else {
   echo "Error using  database: " . $conn->error;
}
$sql = "SELECT * FROM User WHERE UserID like '$username_id';";
$result = $conn->query($sql);
if($result->num_rows > 0){
  echo "Found Username: ".$username_id;
}else {
  echo "bye";
}
?>