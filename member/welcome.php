<?php
	session_start();
	include_once('../assets/php/connect.php');

	$sql = "SELECT * FROM user";
	$result = $conn->query($sql);
	
	if ($result && $result->num_rows > 0) {
		$row = $result->fetch_assoc();
		$_SESSION['fullname'] = $row['fullname'];
		$_SESSION['profile'] = $row['profile'];
	} else {
		echo "Error: User not found or database error.";
	}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>MoneyMate - Welcome</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' href='css/welcome.css'>
</head>
<body>
    <div class="right">
        <img src="images/right.png" alt="">
    </div>

    <h1>Good to see you again,</h1>

    <p>
        <?=$_SESSION['fullname'];?>
    </p>

    <img class="profile" src="uploaded/<?php echo $_SESSION['profile'];?>">

    <div class="left">
        <img src="images/left.png" alt="">
    </div>

    <a href="dashboard.php" class="btn">OKAY</a>
</body>
</html>