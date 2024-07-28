<?php
include('connection.php');

if(isset($_GET['BID'])) { 
    $BID=$_REQUEST['BID'];
    $select="SELECT * FROM Booking b, Customers c, Pitches p WHERE BookingID='$BID' AND 
    b.CustomerID = c.CustomerID AND p.PitchID = b.PitchID";

    $ret=mysqli_query($connectDB,$select);
    $row=mysqli_fetch_array($ret);

    $BID=$row['BookingID'];
    $BDate=$row['BookingDate'];
    $CID=$row['CustomerID'];
    $CName=$row['Username'];
    $PID=$row['PitchID'];
    $PName=$row['PitchName'];
    $CIDate=$row['CheckInDate'];
    $Qty=$row['Quantity'];
    $Subtotal=$row['Subtotal'];
    $Tax=$row['Tax'];
    $Total=$row['TotalPrice'];
    $PType=$row['PaymentType'];
    $PInfo=$row['PaymentInfo'];
    $CEmail=$row['ConfirmedEmail'];
    $CPhone=$row['ConfirmedPhone'];
    $Msg=$row['Msg'];
}

if(isset($_POST['btnUpdate'])) {
    $uBID = $_POST['txtBID'];
    $uBDate = $_POST['txtBDate'];
    $uCID = $_POST['txtCID'];
    $uCName = $_POST['txtCName'];
    $uPID = $_POST['txtPID'];
    $uPName = $_POST['txtPName'];
    $uCIDate = $_POST['txtCIDate'];
    $uQty = $_POST['txtQty'];
    $uSubtotal = $_POST['txtSubtotal'];
    $uTax = $_POST['txtTax'];
    $uTotal = $_POST['txtTotal'];
    $uPType = $_POST['txtPType'];
    $uPInfo = $_POST['txtPInfo'];
    $uCEmail = $_POST['txtCEmail'];
    $uCPhone = $_POST['txtCPhone'];
    $uMsg = $_POST['txtMsg'];




    $update="UPDATE Booking SET CheckInDate='$uCIDate', Quantity='$uQty', Subtotal='$uSubtotal', 
    Tax='$uTax', TotalPrice='$uTotal', PaymentType='$uPType', PaymentInfo='$uPInfo', ConfirmedEmail='$uCEmail', 
    ConfirmedPhone='$uCPhone', Msg='$uMsg'
                WHERE BookingID='$uBID'";
    $Uret=mysqli_query($connectDB,$update);
    if($Uret) {
        echo "<script>window.alert('The booking data are successfully updated.')</script>";
        echo "<script>window.location='Report.php'</script>";
    }
    else {
        echo "<script>window.alert(Booking cannot be updated.)</script>";
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
            <h2>Update Booking Info Here.
                <i class="fa fa-light fa-pen-to-square"></i>
            </h2>
            <input type="hidden" name="txtBID" value="<?php echo $BID; ?>"><br>
            
            <label for="">Booking Date</label><br>
            <input type="text" name="txtBDate" value="<?php echo $BDate; ?>" readonly>
            <br><br>

            <label for="">Customer ID</label><br>
            <input type="text" name="txtCID" value="<?php echo $CID; ?>" readonly>
            <br><br>

            <label for="">Customer Name</label><br>
            <input type="text" name="txtCName" value="<?php echo $CName; ?>" readonly>
            <br><br>

            <label for="">Pitch ID</label><br>
            <input type="text" name="txtPID" value="<?php echo $PID; ?>" readonly>
            <br><br>

            <label for="">Pitch Name</label><br>
            <input type="text" name="txtPName" value="<?php echo $PName; ?>" readonly>
            <br><br>

            <label for="">Check-In Date</label><br>
            <input type="text" name="txtCIDate" value="<?php echo $CIDate; ?>">
            <br><br>

            <label for="">Quantity</label><br>
            <input type="text" name="txtQty" value="<?php echo $Qty; ?>">
            <br><br>

            <label for="">Subtotal</label><br>
            <input type="text" name="txtSubtotal" value="<?php echo $Subtotal; ?>">
            <br><br>

            <label for="">Tax</label><br>
            <input type="text" name="txtTax" value="<?php echo $Tax; ?>">
            <br><br>

            <label for="">Total</label><br>
            <input type="text" name="txtTotal" value="<?php echo $Total; ?>">
            <br><br>

            <label for="">Payment Type</label><br>
            <input type="text" name="txtPType" value="<?php echo $PType; ?>">
            <br><br>

            <label for="">Payment Info</label><br>
            <input type="text" name="txtPInfo" value="<?php echo $PInfo; ?>">
            <br><br>

            <label for="">Confirmed Email</label><br>
            <input type="text" name="txtCEmail" value="<?php echo $CEmail; ?>">
            <br><br>

            <label for="">Confirmed Phone</label><br>
            <input type="text" name="txtCPhone" value="<?php echo $CPhone; ?>">
            <br><br>

            <label for="">Message</label><br>
            <input type="text" name="txtMsg" value="<?php echo $Msg; ?>">
            <br><br>

            <div class="btnGrp">
                <input type="submit" name="btnUpdate" value="Update">
            </div>
        </form>
    </div>
    <script src="./GWSC.js"></script>
</body>
</html>