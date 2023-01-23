<?php
    include 'ConnectDB.php';

    $name=$email=$pnumber=$pass="";

    if(isset($_POST['signup'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pnumber = $_POST['pnumber'];
        $pass = $_POST['password'];
    }

    if($name != ""){
        $sql = "INSERT INTO `userinformation`(`Name`, `Email`, `Phone Number`, `Password`) VALUES ('$name','$email','$pnumber','$pass')";
        $conn->query($sql);
        session_Start();
        $_SESSION['usermail'] = $email;
        //Going to card page
        header("location: yourcard.php");
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
    <title>Sign up</title>
</head>

<body>
    <form action="#" method="POST">
        <h1>Sign Up</h1><br>
        <label for="name">
            <input type="text" name="name" placeholder="Name" required>
        </label><br>
        <label for="email">
            <input type="email" name="email" placeholder="Email" required>
        </label><br>
        <label for="pnumber">
            <input type="tel" name="pnumber" placeholder="Phone Number" pattern="[0-9]{10}" required>
        </label><br>
        <label for="password">
            <input type="password" name="password" placeholder="Password" required>
        </label><br><br>
        <input type="submit" value="Sign up" name="signup">
    </form>
</body>

</html>