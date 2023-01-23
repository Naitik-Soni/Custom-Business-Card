<?php
    session_start();
    include 'ConnectDB.php';

    if($_SESSION['confirm'] == true){}
    else{
        header('location: login.php');
    }

    if(isset($_POST['change'])){
        $email = $pass = "";
        $email = $_SESSION['email'];
        $pass = $_POST['pass'];
        $sql = "UPDATE userinformation SET Password='$pass' WHERE Email = '$email'";
        $conn->query($sql);
        session_unset();
        header('location: login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="icon" href="MyLogo.png">
    <link rel="stylesheet" href="signup.css">
</head>
<body>
    <form action="" method="POST">
        <h2>Enter Password</h2>
        <input type="password" name="pass">
        <input type="submit" value="change" name="change">
    </form>
</body>
</html>