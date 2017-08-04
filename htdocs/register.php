<!doctype html>  
<html>  
<head>
  <meta charset="UTF-8">
  <title>Register to Scholar Vision</title>
  
  
  
      <link rel="stylesheet" href="mystyle/style.css">

  
</head>

<body>
  <body>
<div class="container">
	<section id="content">
		<form action="" method="POST">
			<h1>Register Form</h1>
			<div>
				<input type="text" placeholder="Username" required="" name="user" />
			</div>
			<div>
				<input type="password" placeholder="Password" required="" name="pass" />
			</div>
			<div>
				<input type="submit" value="Register" name="submit" />
				
				<a href="login.php">LogIn</a>
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
  
    $query=mysqli_query($con,"SELECT * FROM login WHERE username='".$user."'");  
    $numrows=mysqli_num_rows($query);  
    if($numrows==0)  
    {  
    $sql="INSERT INTO login(username,password) VALUES('$user','$pass')";  
  
    $result=mysqli_query($con,$sql);  
        if($result){  
    echo "Account Successfully Created";  
    } else {  
    echo "Failure!";  
    }  
  
    } else {  
    echo "That username already exists! Please try again with another.";  
    }  
  
} else {  
    echo "All fields are required!";  
}  
}  
?>  
</body>  
</html>