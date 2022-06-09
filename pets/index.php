
<?php

include './shared/config.php';
session_start();


// login

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];
    $select = "SELECT * FROM  `users` WHERE `name` = '$name' and `password` = '$password'";
    $s = mysqli_query($conn, $select);
    $numOfRows = mysqli_num_rows($s);
    $row = mysqli_fetch_assoc($s);
    if ($numOfRows > 0) {
      $_SESSION['user'] = $name;
      $_SESSION['userId'] = $row['id'];
    header('location:/pets/home.php');
         
    } else {
      echo '<script>alert(" The name or password is incorrect ")</script>';
    }
  }
  
// creat acount

  if (isset($_POST['creat'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $image = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = 'uploaded_img/'.$image;
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $cpass = $_POST['cpassword'];
    $job = $_POST['job'];
 
    $select = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$password '") or die('query failed');
 
    if(mysqli_num_rows($select) > 0){
      $message[] = '<script>alert("Already exists")</script>'; 
   }else{
      if($password  != $cpass){
         
         $message[] = '<script>alert("confirm password not matched!")</script>';
      }elseif($image_size > 2000000){
         $message[] = 'image size is too large!';
      }else{
         $insert = mysqli_query($conn, "INSERT INTO `users`(name, email,image, phone, address, password, job ) VALUES('$name', '$email','$image', '$phone', '$address', '$password', '$job' )") or die('query failed');
         echo '<script>alert(" successfully registered ")</script>';
         if($insert){
            move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = 'registered successfully!';
           
         }else{
            $message[] = 'registeration failed!';
         }
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
    <title>Document</title>
    <link rel="stylesheet" href="css/sign.css">
</head>
<body>


<!-- creat acouna -->
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form method="post" enctype="multipart/form-data">
			<h1>Create Account</h1>
            <?php
      if(isset($message)){
         foreach($message as $message){
            echo '<div class="message">'.$message.'</div>';
         }
      }
      ?>
			<span>or use your email for registration</span>
            <input type="text" name="name" placeholder="Your Name" class="box" required>
      <input type="email" name="email" placeholder="Eour Email" class="box" required>
      <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png">
      <input type="text" name="phone" placeholder="Your Phone" class="box" required>
      <input type="text" name="address" placeholder="Your Address" class="box" required>
      <input type="text" name="job" placeholder="Your Job" class="box" required>
      <input type="password" name="password" placeholder="password" class="box" required>
      <input type="password" name="cpassword" placeholder="Confirm Password" class="box" required>
      
      
			<button name="creat">Sign Up</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form method="post" enctype="multipart/form-data">
      <h1 style="color: #FF4B2B ;">Pets Shop</h1>
			<h1>Sign in</h1>
			<div class="social-container">
				
			</div>
			
			<input type="text" name="name" placeholder="User Name" class="box" required>
   <input type="password" name="password" placeholder="password" class="box" required>
			<br>
			<button name="submit">Sign In</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
            <h2>🐶🐶🐶</h2>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<h2>Welcom at Pets Shop <br> <br> 🐶🐶🐶</h2>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>

<script>
    const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});
</script>
</body>
</html>