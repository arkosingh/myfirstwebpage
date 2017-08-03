<!doctype html>
<html>
<head>
<title>Login</title>
<style>html{background:url(startup-photos.jpg) no-repeat center center fixed;-webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;background-size:cover;}body{margin-top:100px;margin-bottom:100px;margin-right:150px;margin-left:80px;color:palevioletred;font-family:verdana;font-size:100%}h1{color:indigo;font-family:verdana;font-size:100%;}h3{color:indigo;font-family:verdana;font-size:100%;}</style>
</head>
<body>
<center><h1 style="font-family:Courier,font-size:160%,color:yellow;">REGISTRATION AND LOGIN FORM USING PHP AND MYSQL</h1></center>
<p><a href="register.php" style="color:green;">Register</a> | <a href="login.php" style="color:green;">Login</a></p>
<h3>Login Form</h3>
<form action="" method="POST">
Username: <input type="text" name="user"><br/>
Password: <input type="password" name="pass"><br/>
<input type="submit" value="Login" name="submit"/>
</form>
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