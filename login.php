<h1> Log in </h1>
<?php
            require_once('db_setup.php');
            $sql = "USE lyang29;";
            if ($conn->query($sql) === TRUE) {
               // echo "using Database lyang29_users";
            } else {
                echo "Error using  database: " . $conn->error;
            }
        
        
        session_start();
        
        // Query:
        
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
        
            $username=addslashes($_POST['username']);
            $password=addslashes($_POST['password']);
 
            $sql="SELECT * FROM Client WHERE UserID='$username' and Password='$password'";
	
	    $result = $conn->query($sql);

	    if($result->num_rows==1)
            {
                $_SESSION['login_user']=$username;
                header("location: room_reservation.html");
	    }
            else
            {
                echo "Your username or password is invalid";
            }
        }

        ?>
<html>
<head>
<head/>
<body>  
    <form action="" method="post">
        <input type="text" name="username" placeholder="Username"><br>
        <input type="text" name="password" placeholder="Password"><br>
        <input type="submit" value="Log in">
    </form>

 <td>Don't have an account? <a href="create_account.html">Sign up</a>
<body/>
<html/>
<?php
$conn->close();
?>
