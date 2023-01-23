<?php
    session_start();
    $email=$Name="";
    $_SESSION['usermail']="";
    if($_SESSION['usermail'] != ""){
        echo '<script>window.reload();</script>';
        $email = $_SESSION['usermail'];
        $sql = "SELECT `Name` FROM `userinformation` WHERE `Email`='$email'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $Name = $row['Name'];
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="MyLogo.png">
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="iframe.css">
    <title>Design Card</title>
</head>

<body>
    <nav>
        <!-- #464a4e   #ffbd59 -->
        <img src="MyLogo.png" alt="Naitik's Logo" width="200px" height="200px"><br>
        <ul>
            <li><a href="card.php" target="getPage">Your Card</a></li>
            <li><a href="editcard.php" target="getPage">Edit Card</a></li>
        </ul>
    </nav>

    <iframe src="welcome.html" frameborder="0" name="getPage">

    </iframe>

</body>

</html>