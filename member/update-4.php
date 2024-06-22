<?php
   include '../assets/php/connect.php';
   session_start();

   $sql = "SELECT * FROM user";
	$result = $conn->query($sql);
	
	if ($result && $result->num_rows > 0) {
		$row = $result->fetch_assoc();
      $_SESSION['id'] = $row['id'];
		$_SESSION['email'] = $row['email'];
      $_SESSION['password'] = $row['password'];
	} else {
		echo "Error: User not found or database error.";
	}

   $user_id = $_SESSION['id'];

   if(isset($_POST['update'])){
      $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);

      mysqli_query($conn, "UPDATE `user` SET email = '$update_email' WHERE id = '$user_id'") or die('query failed');

      $old_pass = $_POST['old_pass'];
      $update_pass = mysqli_real_escape_string($conn, md5($_POST['update_pass']));
      $new_pass = mysqli_real_escape_string($conn, md5($_POST['new_pass']));
      $confirm_pass = mysqli_real_escape_string($conn, md5($_POST['confirm_pass']));

      if(!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)){
         if($update_pass != $old_pass){
            $message[] = 'old password not matched!';
         }elseif($new_pass != $confirm_pass){
            $message[] = 'confirm password not matched!';
         }else{
            mysqli_query($conn, "UPDATE `user` SET password = '$confirm_pass' WHERE id = '$user_id'") or die('query failed');
            $message[] = 'password updated successfully!';
         }
      }
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Update Profile</title>
   <link rel="stylesheet" href="css/update.css">
</head>
<body>
   
<div class="update-profile">
   <?php
      $select = mysqli_query($conn, "SELECT * FROM `user` WHERE id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select) > 0){
         $fetch = mysqli_fetch_assoc($select);
      }
   ?>

   <form action="" method="post" enctype="multipart/form-data">
      <div class="flex">
         <div class="inputBox">
            <span>Email :</span>
            <input type="email" name="update_email" value="<?php echo $fetch['email']; ?>" class="box">

            <input type="hidden" name="old_pass" value="<?php echo $fetch['password']; ?>">
            
            <span>Old Password :</span>
            <input type="password" name="update_pass" placeholder="enter previous password" class="box">

            <span>New Password :</span>
            <input type="password" name="new_pass" placeholder="enter new password" class="box">
            
            <span>Confirm Password :</span>
            <input type="password" name="confirm_pass" placeholder="confirm new password" class="box">
         </div>
      </div>
      <input type="submit" value="Update" name="update" class="btn">
      <a href="settings.php" class="delete-btn">Back</a>
   </form>

</div>

</body>
</html>