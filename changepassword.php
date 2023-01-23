<?php
    session_start();
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'C:\xampp\htdocs\CustomCard/phpmailer/src/Exception.php';
    require 'C:\xampp\htdocs\CustomCard/phpmailer/src/PHPMailer.php';
    require 'C:\xampp\htdocs\CustomCard/phpmailer/src/SMTP.php';

    include 'ConnectDB.php';

    $email=""; 

    if(isset($_POST['send'])){
        $email=$_POST['email'];
        $number = rand(100000,1000000);
        $_SESSION['verify'] = $number;
        $_SESSION['email'] = $email;

        $msg = "Hey this is From Custom card <br> OTP for resetting password is: <br> <h1 style='color: grey; margin-left: 50px; font-size: 200%;'>".$number."</h1>";
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth=true;
        $mail->Username='naitiksoni1705@gmail.com';
        $mail->Password='kwtwqbevjibqiewn';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('naitiksoni1705@gmail.com');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject ='Reset password';
        $mail->Body = $msg;

        $mail->send();
        header('location: getOTP.php');
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
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <h2>Enter Email</h2>
        <input type="email" name="email">
        <input type="submit" name="send">
    </form>
</body>
</html>