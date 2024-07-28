<?php 
include('connection.php');

if(isset($_GET['PTID'])) {
    $PTID = $_REQUEST['PTID'];
    $select = "SELECT * FROM pitchtypes WHERE PitchTypeID = '$PTID'";

    $ret = mysqli_query($connectDB,$select);
    $row=mysqli_fetch_array(($ret));

    $PTID = $row['PitchTypeID'];
    $PTName = $row['PitchTypeName'];
    $PTDescription = $row['Description'];
}
if (isset($_POST['btnUpdate'])) {
    $uPTID = $_POST['txtPTID'];
    $uPTName = $_POST['txtPTName'];
    $uPTDescription = $_POST['txtPTDescription'];

    $update = "UPDATE pitchtypes SET PitchTypeName='$uPTName', Description='$uPTDescription'
                WHERE PitchTypeID='$uPTID'";
    $Uret=mysqli_query($connectDB,$update);
    if($Uret) {
        echo "<script>window.alert('The pitch type data are successfully updated.')</script>";
        echo "<script>window.location='pitchTypes.php'</script>";
    }
    else {
        echo "<script>window.alert(Pitch Type cannot be updated.)</script>";
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
            <h2>Update Pitch Type Info Here.
                <i class="fa fa-light fa-pen-to-square"></i>
            </h2>
            <input type="hidden" name="txtPTID" value="<?php echo $PTID; ?>"><br>
            
            <label for="">Pitch Type Name</label><br>
            <input type="text" name="txtPTName" value="<?php echo $PTName; ?>">
            <br><br>

            <label for="">Description</label><br>
            <input type="text" name="txtPTDescription" value="<?php echo $PTDescription; ?>">
            <br><br>

            <div class="btnGrp">
                <input type="submit" name="btnUpdate" value="Update">
            </div>
         </form>
    </div>
    <script src="./GWSC.js"></script>
</body>
</html>