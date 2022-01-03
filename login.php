<?php
include ("config.php"); //Database Connection;
//To Display No Error from username and password variables;
error_reporting(0);

//Get User Credentials;
$username=$_POST['username'];
$password=$_POST['password'];

$md5pass=md5($password);

// Username is set or not (if username is set, the query will be continued.)
if (isset($username)){

        // SQL Query to Extract Credentials from Users
        $sql=mysqli_query($connect,"SELECT * FROM users WHERE username='$username' and password='$md5pass'");


        //Get Result from SQL Query
        $result=mysqli_fetch_assoc($sql);

        //Test Username and Password is Correct or not

        if($username==$result['username'] && $md5pass==$result['password']){
                header("location:users.php?username=".$username);// If Login Credentials is correct, Redirect to users.php
        }
}

?>
<!DOCTYPE html>
<html>
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Login</title>
</head>
<body>


<form method="post" action="login.php">
        <label for="username">Username :</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="password">Password :</label><br>
        <input type="password" id="password" name="password"><br>
        <input type="submit" value="Submit"><br>
</form>


</body>
</html>
