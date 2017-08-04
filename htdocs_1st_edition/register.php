<!doctype html>
<html>
<head>
<title>Register</title>
<style>html{background:url(startup-photos.jpg) no-repeat center center fixed;-webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;background-size:cover;}body{margin-top:100px;margin-bottom:100px;margin-right:150px;margin-left:80px;background-color:azure;color:palevioletred;font-family:verdana;font-size:100%}h1{color:indigo;font-family:verdana;font-size:100%;}h2{color:indigo;font-family:verdana;font-size:100%;}</style>
</head>
<body>
<center><h1 style="font-family:Comic Sans MS;">REGISTRATION AND LOGIN FORM USING PHP AND MYSQL</h1></center>
<p><a href="register.php" style="color:green;">Register</a> | <a href="login.php" style="color:green;">Login</a></p>
<center><h2>Registration Form</h2></center>
<form action="" method="POST">
<legend>
<fieldset>
Username: <input type="text" name="user"><br/>
Password: <input type="password" name="pass"><br/>
<input type="submit" value="Register" name="submit"/>
</fieldset>
</legend>
</form>
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