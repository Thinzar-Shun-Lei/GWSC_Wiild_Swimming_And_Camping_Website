<?php
include('connection.php');
session_start();

if(isset($_GET['AID'])) { //data get // REQUEST nk ll ya
    $AID=$_REQUEST['AID'];
    $select="SELECT * FROM admins WHERE AdminID='$AID'";

    $ret=mysqli_query($connectDB,$select);
    $row=mysqli_fetch_array($ret);

    $AID=$row['AdminID'];
    $AName=$row['AdminName'];
    $AEmail=$row['Email'];
    $Apassword=$row['Password'];
    $APhone=$row['PhoneNo'];
    $AAddress=$row['Address'];
}

if(isset($_POST['btnUpdate'])) {
    $uAID = $_POST['txtAID'];
    $uAName = $_POST['txtAName'];
    $uAEmail = $_POST['txtAEmail'];
    $uAPw = $_POST['txtAPw'];
    $uAPhone = $_POST['txtAPhone'];
    $uAAddress = $_POST['txtAAddress'];

    $update="UPDATE admins SET AdminName='$uAName', Email='$uAEmail', Password='$uAPw', PhoneNo='$uAPhone', Address='$uAAddress'
                WHERE AdminID='$uAID'";
    $Uret=mysqli_query($connectDB,$update);
    if($Uret) {
        echo "<script>window.alert('The admin data are successfully updated.')</script>";
        echo "<script>window.location='adminDashboard.php'</script>";
    }
    else {
        echo "<script>window.alert(Admin cannot be updated.)</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./GWSC.css">
    <title>GWSC - Global Wild Swimming and Camping</title>
</head>
<body class="updateBg">
        <nav class="nav">
            <div class="logoContainer">
                <img src="./images/campimgLogo.png" alt="Logo">
                <h1 class="logo-text">GWSC</h1>
            </div>
            <div class="navContainer">
                <ul class="navList">
                    <li class="navLink" ><a href="./adminDashboard.php">Dashboard</a></li>
                    <li class="navLink"><a href="./adminMain.php" >Log Out</a></li>
                </ul>
            </div>
            <div class="hamburger" >
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </div>
            <ul class="dropdown-menu">
                    <li class="navLink" ><a href="./adminDashboard.php">Dashboard</a></li>
                    <li class="navLink"><a href="./adminMain.php" >Log Out</a></li>
            </ul>
        </nav>
        <div class="updateFrmContainer">
            
            <form action="" method="POST" class="updateForm">
                <h2>Update Admin info Here.
                <i class="fa fa-light fa-pen-to-square"></i>
                </h2>
                <input type="hidden" name="txtAID" value="<?php echo $AID; ?>"><br>
                
                <label for="">Admin Name</label><br>
                <input type="text" name="txtAName" value="<?php echo $AName; ?>">
                <br><br>

                <label for="">Email</label><br>
                <input type="text" name="txtAEmail" value="<?php echo $AEmail; ?>">
                <br><br>

                <label for="">Password</label><br>
                <input type="text" name="txtAPw" value="<?php echo $Apassword; ?>">
                <br><br>

                <label for="">Phone Number</label><br>
                <input type="text" name="txtAPhone" value="<?php echo $APhone; ?>">
                <br><br>

                <label for="">Address</label><br>
                <input type="text" name="txtAAddress" value="<?php echo $AAddress; ?>">
                <br><br>
                
                <div class="btnGrp">
                    <input type="submit" name="btnUpdate" value="Update">
                </div>

            </form>
        </div>    
    <script src="./GWSC.js"></script>
</body>
</html>