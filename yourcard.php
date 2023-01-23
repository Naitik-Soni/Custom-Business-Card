    <?php
    session_start();

    include "ConnectDB.php";
    $email = $name = "";
    $email = $_SESSION['usermail'];
    if($email == true){}
    else{
        header("location: login.php");
    }

    $sql = "SELECT Email FROM card WHERE Email = '$email'";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        header("location: card.php");
    }

    $sql = "SELECT `Name` FROM `userinformation` WHERE Email = '$email'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $name = $row['Name'];

    if(isset($_POST['create'])){
        $front = $back = "";
        $front = $_POST['front'];
        $back = $_POST['back'];
        if($front == $back){
            echo "<script>alert('Two colors cannot be same');</script>";
        }else{
            $Oname = $Oemail = $insta = $facebook = $twitter = $pNumber = $website = $color1 = $color2 = "";
            $logos = "";
        
            $logos = $_FILES['photo']['name'];
            $temp1 = $_FILES['photo']['tmp_name'];
            move_uploaded_file($temp1,"./Logo/".$logos);
            $Oname = $_POST['name'];
            $Oemail = $_POST['email'];
            $insta = $_POST['instagram'];
            $twitter = $_POST['twitter'];
            $facebook = $_POST['facebook'];
            $website = $_POST['website'];
            $pNumber = $_POST['pnumber'];
            $color1 = $_POST['front'];
            $color2 = $_POST['back'];

            $sql="INSERT INTO `card`(`Email`, `OName`, `Logo`, `Phone number`, `Website`, `Facebook`, `Instagram`, `OEmail`, `Twitter`, `Color-1`, `Color-2`) 
            VALUES ('$email','$Oname','$logos','$pNumber','$website','$facebook','$insta','$Oemail','$twitter','$color1','$color2')";
        
            if($conn->query($sql)){
                header('location: card.php');
            }else{
                echo "<script>alert('Error accepting data');</script>";
            }
    }
    }
    $conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/09d21e6cd0.js" crossorigin="anonymous"></script>
    <title>Your card</title>
</head>
<body>
    <header class="user">
        <img src="user.png" alt="">
        <h3><?php echo $name; ?></h3>
        <!--<a href="login.php">Logout</a>-->
    </header>

    <form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype='multipart/form-data'>
        <table>
            <tr>
                <td>
                    Organization's Name: <br>
                    <input type="text" name="name" required>
                </td>
                <td>
                    Upload Logo: <br>
                    <input type="file" name="photo" accept=".jpg, .jpeg, .png" required>
                </td>
            </tr>
            <tr>
                <td>
                    Phone Number: <br>
                    <input type="tel" name="pnumber" pattern="[0-9]{10}" required>
                </td>
                <td>
                    Organization's website: <br>
                    <input type="url" name="website" required>
                </td>
            </tr>
            <tr>
                <td>
                    Facebook page link: <br>
                    <input type="url" name="facebook" required>
                </td>
                <td>
                    Instagram page link:
                    <input type="url" name="instagram" required>
                </td>
            </tr>
            <tr>
                <td>
                    Organization's Email: <br>
                    <input type="email" name="email" required>
                </td>
                <td>
                    Twitter page link: <br>
                    <input type="url" name="twitter" required>
                </td>
            </tr>
            <tr id="colors">
                Choose color-1: 
                <input type="color" onchange='setBgColor()' name="front" value="#464a4e" id="a" required>&nbsp &nbsp &nbsp
                Choose color-2: 
                <input type="color" onchange='setTextColor()' name="back" value="#ffbd59" id="b" required>
            </tr>
            <tr colspan="2">
                <td>
                    <input type="submit" value="Create card" name="create">
                </td>
            </tr>
        </table>
    </form>

    <div class="cc">
        <br><br>
        <div class="front" id="front">
            <img src="mylogo.png" alt="">
            <h2 class="texts" id="cc">Naitik</h2>
        </div><br>
        <div class="back" id="back">
            <table id="table">
                <tr>
                    <td rowspan="3" id="logos">
                        <img src="mylogo.png" alt="">
                    </td>
                    <td class="icon"><i class="fa-solid fa-phone texts"></i></td>
                    <td class="text"><p class="texts">1111111111</p></td>
                </tr>
                <tr>
                    <td class="icon texts"><i class="fa-regular fa-window-maximize texts"></i></td>
                    <td class="text"><p class="texts">www.abc.xyz</p></td>
                </tr>
                <tr>
                    <td class="icon"><i class="fa-solid fa-envelope texts"></i></td>
                    <td class="text"><p class="texts">abcd@xyz.com</p></td>
                </tr>
            </table>
            <div class="social texts">
                <i class="fa-brands fa-facebook-f texts" id="cc"></i>
                <i class="fa-brands fa-instagram texts" id="cc"></i>
                <i class="fa-brands fa-twitter texts" id="cc"></i>
            </div>
        </div><br><br>
        
    </div>

    <script>
        function setBgColor(){
            let c1=document.getElementById('a').value;
            document.getElementById("front").style.background=c1;
            document.getElementById("back").style.background=c1;
        }

        function setTextColor(){
            let c2=document.getElementById('b').value;
            document.getElementById('cc').style.color=c2;
            var elements = document.getElementsByClassName('texts');
            for(var i = 0, length = elements.length; i < length; i++) {
                elements[i].style.color = c2;
            }
            document.getElementById('table').style.borderBottomColor=c2;
        }
        
    </script>

</body>
</html>