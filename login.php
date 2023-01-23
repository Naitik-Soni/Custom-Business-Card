<?php
    session_start();
    include 'ConnectDB.php';

    $email=$pass="";

    if(isset($_POST['login'])){
        $email = $_POST['email'];
        $pass = $_POST['password'];
    }

    if($email != ""){
        $sql = "SELECT `Email`,`Password` FROM `userinformation` WHERE `Email`='$email' AND `Password`='$pass'";
        $result = $conn->query($sql);
        if($result->num_rows>0){
            $_SESSION['usermail'] = $email;
            header("location: yourcard.php");
        }else{
            echo "<script>alert('Wrong Email or Password');</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="MyLogo.png">
    <link rel="stylesheet" href="signup.css">
    <title>Login</title>
    <style>
        a{
            position: relative;
            left: -50px;
            text-decoration:none;
            color: #464a4e;
            font-size: 15px;
        }
    </style>
</head>

<body>
    <form action="#" method="POST"> 
        <h1>Login</h1><br>
        <input type="email" name="email" placeholder="Email" id="email" required><br>
        <input type="password" name="password" placeholder="Password" id="pass" required><br>
        <a href="changepassword.php">Forgot password?</a><br>
        <input type="submit" value="Login" name="login" onclick="getData()">
    </form>

    <script>
        function getData(){
            window.parent.reload();
        }
    </script>
</body>

</html>