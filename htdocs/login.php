<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login to Scholar Vision</title>
  
  
  
      <link rel="stylesheet" href="mystyle/style.css">

  
</head>

<body>
  <body>
<div class="container">
	<section id="content">
		<form action="" method="POST">
			<h1>Login Form</h1>
			<div>
				<input type="text" placeholder="Username" required="" name="user" />
			</div>
			<div>
				<input type="password" placeholder="Password" required="" name="pass" />
			</div>
			<div>
				<input type="submit" value="LogIn" name="submit" />
				<a href="https://cpanel.epizy.com/login.php">ADMIN</a>
				<a href="register.php">Register</a>
			</div>
		</form><!-- form -->
		<!--<div class="button">
			<a href="#">Download source file</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
  
    <script src="myjs/index.js"></script>
<?php 
if(isset($_POST["submit"])){  
  
if(!empty($_POST['user']) && !empty($_POST['pass'])) {  
    $user=$_POST['user'];  
    $pass=$_POST['pass'];  
  
    $con=mysqli_connect('sql308.epizy.com','epiz_20473854','Zl5lgPEH') or die(mysqli_error());  
    mysqli_select_db($con,"epiz_20473854_user_registration");  
  
    $query=mysqli_query($con,"SELECT * FROM login WHERE username='".$user."' AND password='".$pass."'");  
    $numrows=mysqli_num_rows($query);  
    if($numrows!=0)  
    {  
    while($row=mysqli_fetch_assoc($query))  
    {  
    $dbusername=$row['username'];  
    $dbpassword=$row['password'];  
    }  
  
    if($user == $dbusername && $pass == $dbpassword)  
    {  
    session_start();  
    $_SESSION['sess_user']=$user;  
  
    /* Redirect browser */  
    header("Location: member.php");  
    }  
    } else {  
    echo "Invalid username or password!";  
    }  
  
} else {  
    echo "All fields are required!";  
}  
}  
?>
</body>
</html>