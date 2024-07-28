<?php
include('connection.php');

if(isset($_GET['SID'])) { 
    $SID=$_REQUEST['SID'];
    $select="SELECT * FROM sites WHERE SiteID='$SID'";

    $ret=mysqli_query($connectDB,$select);
    $row=mysqli_fetch_array($ret);
    $SID=$row['SiteID'];
    $SName=$row['SiteName'];
    $SLocation=$row['Location'];
    $SDescription=$row['Description'];
}

if(isset($_POST['btnUpdate'])) {
    $uSID = $_POST['txtSID'];
    $uSName = $_POST['txtSName'];
    $uSLocation = $_POST['txtSLocation'];
    $uSDescription = $_POST['txtSDescription'];

    $update="UPDATE sites SET SiteName='$uSName', Location='$uSLocation', Description='$uSDescription'
                WHERE SiteID='$uSID'";
    $Uret=mysqli_query($connectDB,$update);
    if($Uret) {
        echo "<script>window.alert('The site data are successfully updated.')</script>";
        echo "<script>window.location='sites.php'</script>";
    }
    else {
        echo "<script>window.alert(Site cannot be updated.)</script>";
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
                    <li class="navLink"><a href="./adminRegister.php" >Log Out</a></li>
                </ul>
            </div>
            <div class="hamburger" >
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </div>
            <ul class="dropdown-menu">
                    <li class="navLink" ><a href="./adminDashboard.php">Dashboard</a></li>
                    <li class="navLink"><a href="./adminRegister.php" >Log Out</a></li>
            </ul>
        </nav>


    <div class="updateFrmContainer">
        <form action="" method="POST" class="updateForm">
            <h2>Update Site Info Here.
                <i class="fa fa-light fa-pen-to-square"></i>
            </h2>
            <input type="hidden" name="txtSID" value="<?php echo $SID; ?>"><br>
            
            <label for="">Site Name</label><br>
            <input type="text" name="txtSName" value="<?php echo $SName; ?>">
            <br><br>

            <label for="">Location</label><br>
            <input type="text" name="txtSLocation" value="<?php echo $SLocation; ?>">
            <br><br>

            <label for="">Description</label><br>
            <input type="text" name="txtSDescription" value="<?php echo $SDescription; ?>">
            <br><br>

            <div class="btnGrp">
                <input type="submit" name="btnUpdate" value="Update">
            </div>
        </form>
    </div>
    <script src="./GWSC.js"></script>
</body>
</html>