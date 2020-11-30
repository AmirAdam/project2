<?php

session_start();

    $db = mysqli_connect("localhost", "root", "", "register");

    if(isset($_POST['btn'])){

        $username =($_POST['username']);
        $email = ($_POST['email']);
        $password = ($_POST['password']);
        $password1 = ($_POST['password1']);


        if($password == $password1){
            $password = md5($password);
            $sql = "insert into user(username, email, password) values ('$username', '$email', '$password')";
            mysqli_query($db, $sql);
            $_SESSION['message'] = "you are naw logged in";
            $_SESSION['username'] = $username;
            header("location: home.php");

        }else{
            $_SESSION['message'] = "The tow password do not match";
        }
    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div>
    <h1>Register, Login</h1>
</div>    

<form action="register.php" method="POST">
    <table>
        <tr>
            <td>Username:</td>
            <td><input type="text" name="username" class="textInput"></td>
        </tr>
        <tr>
            <td>Email:</td>
            <td><input type="email" name="email" class="textInput"></td>
        </tr>
        <tr>
            <td>Password:</td>
            <td><input type="password" name="password" class="textInput"></td>
        </tr>
        <tr>
            <td>Password agine:</td>
            <td><input type="password" name="password1" class="textInput"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="btn" value="Log in"></td>
        </tr>
    </table>
</form>
</body>
</html>