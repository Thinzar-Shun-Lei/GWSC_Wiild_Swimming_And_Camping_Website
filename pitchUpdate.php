<?php
include('connection.php');

if(isset($_GET['PID'])) { //data get // REQUEST nk ll ya
    $PID=$_REQUEST['PID'];
    $select="SELECT * FROM pitches WHERE PitchID='$PID'";

    $ret=mysqli_query($connectDB,$select);
    $row=mysqli_fetch_array($ret);

    $PID=$row['PitchID'];
    $PName=$row['PitchName'];
    $PLocation=$row['PitchLocation'];
    $PDuration=$row['Duration'];
    $PPrice=$row['Price'];
    $PFeature1=$row['Feature1'];
    $PFeature2=$row['Feature2'];
    $PFDetails1=$row['FeatureDetails1'];
    $PFDetails2=$row['FeatureDetails2'];
    $PStatus=$row['PitchStatus'];
    $PCapacity=$row['Capacity'];
    $PLAName1=$row['LocalAttractionName1'];
    $PLAName2=$row['LocalAttractionName2'];
    $PLADetails1=$row['LocalAttractionDetails1'];
    $PLADetails2=$row['LocalAttractionDetails2'];
}

if(isset($_POST['btnUpdate'])) {
    $uPID = $_POST['txtPID'];
    $uPName = $_POST['txtPName'];
    $uPLocation = $_POST['txtPLocation'];
    $uPDuration = $_POST['txtPDuration'];
    $uPPrice = $_POST['txtPPrice'];
    $uPFeature1 = $_POST['txtPFeature1'];
    $uPFeature2 = $_POST['txtPFeature2'];
    $uPFDetails1 = $_POST['txtPFDetails1'];
    $uPFDetails2 = $_POST['txtPFDetails2'];
    $uPStatus = $_POST['txtPStatus'];
    $uPCapacity = $_POST['txtPCapacity'];
    $uPLAName1 = $_POST['txtPLAName1'];
    $uPLAName2 = $_POST['txtPLAName2'];
    $uPLADetails1 = $_POST['txtPLADetails1'];
    $uPLADetails2 = $_POST['txtPLADetails2'];

    $update="UPDATE pitches SET PitchName='$uPName', PitchLocation='$uPLocation', Duration='$uPDuration', Pirce='$uPPrice', 
            Feature1='$uPFeature1',Feature2='$uPFeature2',FeatureDetails1='$uPFDetails1',FeatureDetails2='$uPFDetails2',PitchStatus='$uPStatus',Capacity='$uPCapacity',
            LocalAttractionName1='$uPLAName1',LocalAttractionName2='$uPLAName2',LocalAttractionDetails1='$uPLADetails1',LocalAttractionDetails2='$uPLADetails2'
            WHERE PitchID='$uPID'";
    $Uret=mysqli_query($connectDB,$update);
    if($Uret) {
        echo "<script>window.alert('The pitch data are successfully updated.')</script>";
        echo "<script>window.location='pitches.php'</script>";
    }
    else {
        echo "<script>window.alert(Pitch cannot be updated.)</script>";
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
            <h2>Update Pitch Info Here.
                <i class="fa fa-light fa-pen-to-square"></i>
            </h2>
            <input type="hidden" name="txtPID" value="<?php echo $PID; ?>"><br>
            
            <label for="">Pitch Name</label><br>
            <input type="text" name="txtPName" value="<?php echo $PName; ?>">
            <br><br>

            <label for="">Pitch Location</label><br>
            <input type="text" name="txtPLocation" value="<?php echo $PLocation; ?>">
            <br><br>

            <label for="">Duration</label><br>
            <input type="text" name="txtPDuration" value="<?php echo $PDuration; ?>">
            <br><br>

            <label for="">Price</label><br>
            <input type="text" name="txtPPrice" value="<?php echo $PPrice; ?>">
            <br><br>

            <label for="">Feature 1</label><br>
            <input type="text" name="txtPFeature1" value="<?php echo $PFeature1; ?>">
            <br><br>

            <label for="">Feature 2</label><br>
            <input type="text" name="txtPFeature2" value="<?php echo $PFeature2; ?>">
            <br><br>

            <label for="">Feature Details 1</label><br>
            <input type="text" name="txtPFDetails1" value="<?php echo $PFDetails1; ?>">
            <br><br>

            <label for="">Feature Details 2</label><br>
            <input type="text" name="txtPFDetails2" value="<?php echo $PFDetails2; ?>">
            <br><br>

            <label for="">Status</label><br>
            <input type="text" name="txtPStatus" value="<?php echo $PStatus; ?>">
            <br><br>

            <label for="">Capacity</label><br>
            <input type="text" name="txtPCapacity" value="<?php echo $PCapacity; ?>">
            <br><br>

            <label for="">Local Attraction 1</label><br>
            <input type="text" name="txtPLAName1" value="<?php echo $PLAName1; ?>">
            <br><br>

            <label for="">Local Attraction 2</label><br>
            <input type="text" name="txtPLAName2" value="<?php echo $PLAName2; ?>">
            <br><br>

            <label for="">Local Attraction Details 1</label><br>
            <input type="text" name="txtPLADetails1" value="<?php echo $PLADetails1; ?>">
            <br><br>

            <label for="">Local Attraction Details 2</label><br>
            <input type="text" name="txtPLADetails2" value="<?php echo $PLADetails2; ?>">
            <br><br>

            <div class="btnGrp">
                 <input type="submit" name="btnUpdate" value="Update">
            </div>
        </form>
    </div>
    <script src="./GWSC.js"></script>
</body>
</html>