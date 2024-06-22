<?php
  session_start();
  include_once('assets/php/connect.php');

  // if(isset($_SESSION['name']) && isset($_SESSION['username'] )){

  // }
  $_SESSION['fullname'];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>MoneyMate - Logout</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' href='assets/css/logout.css'>
</head>
<body>
    <div class="logo">
        <a href="home.php">
            <img src="assets/image/logo.png" alt="Logo">
        </a>
    </div>

    <div class="container">
        <div class="box">
            <div class="text">
                <h3>Goodbye,</h3>
                <h5><?=$_SESSION['fullname'];?></h5>
                <h1>You have successfully logged out</h1>
            </div>
            

            <div class="button">
                <a href="home.php">
                    <button type="submit">Back to Homepage</button> 
                </a>
            </div>
            
        </div>
    </div>    
</body>
</html>