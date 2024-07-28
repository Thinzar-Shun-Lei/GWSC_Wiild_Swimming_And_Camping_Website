<?php
session_start();
include('connection.php');

if (!isset($_SESSION['AID'])) {
	echo "<script>window.alert('Please Login again')</script>";
	echo "<script>window.location=('adminLogin.php')</script>";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./GWSC.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <title>GWSC - Global Wild Swimming and Camping</title>
</head>
<body>
<nav class="nav">
            <div class="logoContainer">
                <img src="./images/campimgLogo.png" alt="Logo">
                <h1 class="logo-text">GWSC</h1>
            </div>
            <div class="navContainer">
                <ul class="navList">
                    <li class="navItem" ><a href="adminDashboard.php">Dashboard</a></li>
                    <li class="navItem" ><a href="pitchTypes.php" >Pitch Types</a></li>
                    <li class="navItem "><a href="sites.php" >Sites</a></li>
                    <li class="navItem"><a href="pitches.php" >Pitches</a></li>
                    <li class="navItem"><a href="Report.php" class="navItemActive">Report</a></li>
                    <li class="navLink "><a href="./adminRegister.php">Logout</a></li>
                </ul>
            </div>
            <div class="hamburger" >
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </div>
            <ul class="dropdown-menu">
                <li class="navLink" ><a href="adminDashboard.php">Dashboard</a></li>
                <li class="navLink" ><a href="pitchTypes.php">Pitch Types</a></li>
                <li class="navLink"><a href="sites.php" >Sites</a></li>
                <li class="navLink"><a href="pitches.php" >Pitches</a></li>
                <li class="navLink active"><a href="Report.php" >Report</a></li>
                <li class="navLink"><a href="./adminRegister.php" >Log Out</a></li>
            </ul>
        </nav>
        <div class="displayList">
            <table border="1px" >
                <legend>Booking Info List</legend>
                <?php
                    $select="SELECT * FROM booking";
                    $ret=mysqli_query($connectDB,$select);
                    $count=mysqli_num_rows($ret);

                    if($count==0)
                    {
                        echo "<p>Booking Info not found</p>";
                    }
                ?>
                <table border="1px" class="tblInfo">
                    <tr class="thContainer">
                        <th>Booking ID</th>
                        <th>Booking Date</th>
                        <th>Customer ID</th>
                        <th>Pitch ID</th>
                        <th>Check In Date</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                        <th>Tax</th>
                        <th>Total Price</th>
                        <th>Payment Type</th>
                        <th>Payment Info</th>
                        <th>Confirmed Phone</th>
                        <th>Confirmed Email</th>
                        <th>Message</th>
                        <th>Manage</th>
                    </tr>

                    <?php
                        for ($i=0; $i <$count ; $i++) { 
                            $row=mysqli_fetch_array($ret);
                            $BID=$row['BookingID'];
                            $BDate=$row['BookingDate'];
                            $CID=$row['CustomerID'];
                            $PID=$row['PitchID'];
                            $CheckIn=$row['CheckInDate'];
                            $Quantity=$row['Quantity'];
                            $Subtotal=$row['Subtotal'];
                            $Tax=$row['Tax'];
                            $TotalPrice=$row['TotalPrice'];
                            $PaymentType=$row['PaymentType'];
                            $PaymentInfo=$row['PaymentInfo'];
                            $CEmail=$row['ConfirmedEmail'];
                            $CPhone=$row['ConfirmedPhone'];
                            $Msg=$row['Msg'];
                            echo "<tr>";

                            echo "<td>$BID</td>";
                            echo "<td>$BDate</td>";
                            echo "<td>$CID</td>";
                            echo "<td>$PID</td>";
                            echo "<td>$CheckIn</td>";
                            echo "<td>$Quantity</td>";
                            echo "<td>$Subtotal</td>";
                            echo "<td>$Tax</td>";
                            echo "<td>$TotalPrice</td>";
                            echo "<td>$PaymentType</td>";
                            echo "<td>$PaymentInfo</td>";
                            echo "<td>$CPhone</td>";
                            echo "<td>$CEmail</td>";
                            echo "<td>$Msg</td>";
                            echo "<td>
                                <a href='bookingUpdate.php?BID=$BID'>Update</a> |
                                <a href='bookingDelete.php?BID=$BID'>Delete</a>
                            </td>";

                            echo "<tr>";
                        }

                    ?>
                </table>
            </table>
        </div>
        <br>
        <div class="displayList">
            <table border="1px" >
                <legend>Reviews Info List</legend>
                <?php
                    $select="SELECT * FROM reviews";
                    $ret=mysqli_query($connectDB,$select);
                    $count=mysqli_num_rows($ret);

                    if($count==0)
                    {
                        echo "<p>Reviews Info not found</p>";
                    }
                ?>
                <table border="1px" class="tblInfo">
                    <tr class="thContainer">
                        <th>Review ID</th>
                        <th>Customer ID</th>
                        <th>Site ID</th>
                        <th>Customer name</th>
                        <th>Date</th>
                        <th>Rating</th>
                        <th>Feedback</th>
                    </tr>

                    <?php
                        for ($i=0; $i <$count ; $i++) { 
                            $row=mysqli_fetch_array($ret);
                            $RID=$row['ReviewID'];
                            $CID=$row['CustomerID'];
                            $SID=$row['SiteID'];
                            $UName=$row['Username'];
                            $Date=$row['Date'];
                            $Rating=$row['Rating'];
                            $Feedback=$row['Feedback'];

                            echo "<tr>";

                            echo "<td>$RID</td>";
                            echo "<td>$CID</td>";
                            echo "<td>$SID</td>";
                            echo "<td>$UName</td>";
                            echo "<td>$Date</td>";
                            echo "<td>$Rating</td>";
                            echo "<td>$Feedback</td>";

                            echo "<tr>";
                        }

                    ?>
                </table>
            </table>
        </div>
        <br>
        <div class="displayList">
            <table border="1px" >
                <legend>Contact Info List</legend>
                <?php
                    $select="SELECT * FROM contact";
                    $ret=mysqli_query($connectDB,$select);
                    $count=mysqli_num_rows($ret);

                    if($count==0)
                    {
                        echo "<p>Contact Info not found</p>";
                    }
                ?>
                <table border="1px" class="tblInfo">
                    <tr class="thContainer">
                        <th>Contact ID</th>
                        <th>Customer ID</th>
                        <th>First Name</th>
                        <th>Surname</th>
                        <th>Contact Phone</th>
                        <th>Contact Email</th>
                        <th>Contact Message</th>
                    </tr>

                    <?php
                        for ($i=0; $i <$count ; $i++) { 
                            $row=mysqli_fetch_array($ret);
                            $CoID=$row['ContactID'];
                            $CID=$row['CustomerID'];
                            $FName=$row['FirstName'];
                            $SName=$row['Surname'];
                            $CPhone=$row['ContactPhone'];
                            $CEmail=$row['ContactEmail'];
                            $CMsg=$row['ContactMessage'];

                            echo "<tr>";

                            echo "<td>$CoID</td>";
                            echo "<td>$CID</td>";
                            echo "<td>$FName</td>";
                            echo "<td>$SName</td>";
                            echo "<td>$CPhone</td>";
                            echo "<td>$CEmail</td>";
                            echo "<td>$CMsg</td>";

                            echo "<tr>";
                        }

                    ?>
                </table>
            </table>
        </div>
        <script src="./GWSC.js"></script>
</body>
</html>