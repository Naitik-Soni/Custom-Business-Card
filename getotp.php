<?php
    session_start();

    if(isset($_POST['reset'])){
        if($_POST['OTP'] == ""){
            echo "<script>alert('Please enter OTP');</script>";
        }else{
            if($_POST['OTP'] == $_SESSION['verify']){
                echo "<script>alert('Entered correct OTP');</script>";
                $_SESSION['confirm'] = "confirm";
                header("location: newpassword.php");
            }else{
                echo "<script>alert('Wrong OTP entered');</script>";
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
    <link rel="icon" href="MyLogo.png">
    <link rel="stylesheet" href="signup.css">
</head>
<body>
    <form action="" method="POST">
        <h2>Enter OTP</h2>
        <input type="text" name="OTP">
        <input type="submit" value="Reset" name="reset">
    </form>
</body>
</html>