<?php
    session_start();

    include "ConnectDB.php";
    $email = $name = "";
    $email = $_SESSION['usermail'];
    if($email == true){}
    else{
        header("location: login.php");
    }

    $sql = "SELECT `Name` FROM `userinformation` WHERE Email = '$email'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $name = $row['Name'];

    $Oname = $pnumber = $website = $facebook = $insta = $twitter = $oemail = $color1 = $color2 = "";

    $sql = "SELECT `OName`, `Logo`, `Phone number`, `Website`, `Facebook`, `Instagram`, `OEmail`, `Twitter`, `Color-1`, `Color-2` FROM `card` WHERE Email='$email'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    $Oname = $row['OName'];
    $pnumber = $row['Phone number'];
    $website = $row['Website'];
    $facebook = $row['Facebook'];
    $insta = $row['Instagram'];
    $twitter = $row['Twitter'];
    $oemail = $row['OEmail'];
    $color1 = $row['Color-1'];
    $color2 = $row['Color-2'];
    $logo = $row['Logo'];
    $path = "./Logo/";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="card.css">
    <script src="https://kit.fontawesome.com/09d21e6cd0.js" crossorigin="anonymous"></script>
    <title>Card</title>

    <style>
        #backwards, #forths{
            background-color: <?php echo $color1 ?>;
            border-radius: 14px;
        }
        #cc{
            color: <?php echo $color2 ?>;
        }
        #table{
            border-bottom-color: <?php echo $color2 ?>;
        }
        #fa-brands{
            color: <?php echo $color2 ?>;
        }

        @media print {
            body * {
                visibility: hidden;
            }

            #forths,
            #forths *,
            #backwards,
            #backwards * {
                visibility: visible;
            }

            #forths,
            #backwards {
                position: relative;
                left: 0;
                top: -60%;
                transform: rotateY(0deg);
                background-color: <?php echo $color1 ?>;
                margin: 10px 0;
            }
        }
    
    </style>
</head>
<body onload="myFunction()">
    <header class="user">
        <img src="user.png" alt="">
        <h3><?php echo $name; ?></h3>
        <!--<a href="login.php">Logout</a>-->
    </header>

    <div class="containers">
        <section class="forth" id="forths">
            <img src="<?php echo $path.$logo; ?>" alt="">
            <h2 id="cc"><?php echo $Oname ?></h2>
        </section>

        <section class="backward" id="backwards">
            <table id="table">
                <tr>
                    <td rowspan="3" id="logos">
                        <a href="<?php echo $website; ?>" target="_blank"><img src="<?php echo $path.$logo; ?>" alt=""></a>
                    </td>
                    <td class="icon"><i id="fa-brands" class="fa-solid fa-phone texts"></i></td>
                    <td class="text"><p id="fa-brands" class="texts"><?php echo $pnumber; ?></p></td>
                </tr>
                <tr>
                    <td class="icon texts"><i id="fa-brands" class="fa-regular fa-window-maximize texts"></i></td>
                    <td class="text"><p id="fa-brands" class="texts"><?php echo $website; ?></p></td>
                </tr>
                <tr>
                    <td class="icon"><i id="fa-brands" class="fa-solid fa-envelope texts"></i></td>
                    <td class="text"><p id="fa-brands" class="texts"><?php echo $oemail; ?></p></td>
                </tr>
            </table>
            <div class="social texts">
                <a href="<?php echo $facebook; ?>" target="_blank"><i id="fa-brands" class="fa-brands fa-facebook-f texts"></i></a>
                <a href="<?php echo $insta; ?>" target="_blank"><i id="fa-brands" class="fa-brands fa-instagram texts"></i></a>
                <a href="<?php echo $twitter; ?>" target="_blank"><i id="fa-brands" class="fa-brands fa-twitter texts"></i></a>
            </div>
        </section>
    </div>

    <div class="download" onclick="window.print()">
        <button>
            <i class="fa-solid fa-download"></i>
        </button>
    </div>
</body>
</html>