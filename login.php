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

        $sql="SELECT * FROM User WHERE UserID='$username' and Password='$password'";

    $result = $conn->query($sql);

    if($result->num_rows==1)
        {
            $_SESSION['login_user']=$username;
            header("location: room_reservation.php");
    }
        else
        {
            echo "Your username or password is invalid";
        }
    }

?>

<html>
<head>
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
<head/>
<body>
    <div class="bg">

        
        <section>
            <h1> Log in </h1>

            <form action="" method="post">
                <input type="text" name="username" placeholder="Username"><br>
                <input type="text" name="password" placeholder="Password"><br>
                <input type="submit" class="btn btn-outline-white wow fadeInDown" value="Log in"><br>
            </form>

            <td>Don't have an account? <a href="create_account.html">Sign up</a>    
        </section>
        
    </div>

    
<body/>
<html/>

<?php
$conn->close();
?>

