<?php
session_start();
include('connection.php');

if(!isset($_SESSION['CID'])) {
    echo "<script>window.alert('Please Login first')</script>";
    echo "<script>window.location='customerLogin.php'</script>";
}

//BookingDate 
$thisMonth = date('m');
$thisDay = date('d');
$thisYear = date('Y');

$today = $thisYear . '-' . $thisMonth . '-' . $thisDay;

//fetch data pitch
if(isset($_REQUEST['PID'])) {//Get or Request nak lak khan loc ya
	$PID=$_REQUEST['PID'];
	$pitch="SELECT * FROM Pitches WHERE PitchID='$PID'";
	$query=mysqli_query($connectDB,$pitch);
	$data=mysqli_fetch_array($query);
	$PName=$data['PitchName'];
	$PID=$data['PitchID'];
	$PPrice=$data['Price'];
}


if (isset($_POST['btnReserve'])) {
    $PID = $_POST['txtPID'];
    $PName = $_POST['txtPName'];
    $BDate = $_POST['txtBDate'];
    $CIDate = $_POST['txtCIDate'];
    $Qty = $_POST['txtQty'];
    $PPrice = $_POST['txtPPrice'];
    $paymentType = $_POST['PaymentType'];
    
    if ($paymentType === "Card") {
        $paymentInfo = $_POST["cardInfo"];
    } elseif ($paymentType === "DigitalPay") {
        $paymentInfo = $_POST["digitalInfo"];
    }

    $CID = $_POST['txtCID'];
    $uName = $_POST['txtUName'];
    $uPhone = $_POST['txtUPhone'];
    $uEmail = $_POST['txtUMail'];
    $uAddress = $_POST['txtUAddress'];
    $ucMsg = $_POST['txtCMessage'];
    $msg = $_POST['txtCMessage'];

    $Subtotal = $Qty * $PPrice;
    $Tax = $Subtotal * 0.05;
    $Total = $Subtotal + $Tax;
    
// Change date format
$Bdate=date("Y-m-d H:i:s",strtotime($BDate));
$CIdate=date("Y-m-d H:i:s",strtotime($CIDate));

    $insert = "INSERT into Booking (BookingDate, CustomerID, PitchID, 
    CheckInDate,  Quantity, Subtotal, Tax, TotalPrice, PaymentType, PaymentInfo, 
    ConfirmedEmail, ConfirmedPhone, Msg) 
    VALUES('$Bdate', '$CID', '$PID', '$CIdate', '$Qty', '$Subtotal', '$Tax',
    '$Total','$paymentType', '$paymentInfo', '$uEmail', '$uPhone', '$msg')";
    $query = mysqli_query($connectDB, $insert);

    if($query) {
        echo "<script>window.alert('Success in Reservation')</script>";
    	echo "<script>window.location='PitchTypeAvailability.php'</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="GWSC.css">
    <title>GWSC - Customer Booking | Global Wild Swimming and Camping</title>
</head>
<body class="bgBook">
    <header>
        <nav class="navWholeContainer">
            <div class="logoLoginContainer">
                <a href="HomePage.php" class="logoContainer">
                    <img src="./images/campimgLogo.png" alt="Logo">
                    <h1 class="logo-text">GWSC</h1>
                </a>
                <div class="headerGrp">
                    <!-- Google Translate -->
                    <div id="google_translate_element" class="googleTranslate" onclick=googleTranslateElementInit()></div>
                    <?php if( isset($_SESSION['CID']) && !empty($_SESSION['CID']) ) { ?>
            <button class="cusLogInBtn">
                        <a href='SessionDestroy.php'>Log Out</a>
                        <i class="fa fa-solid fa-arrow-right-from-bracket"></i>
                    </button>
            <?php }else{ ?>
                    <button class="cusLogInBtn">
                        <a href="customerLogin.php">Log In</a>
                        <i class="fa fa-regular fa-user loginIcon"></i>
                    </button>
            <?php } ?>
                    
                </div>
            </div>
            <div class="navMainContainer">
                <div class="navContents">
                    <ul class="navUl">
                        <li >
                            <a href="HomePage.php">Home</a>
                        </li>
                        <li>
                            <a href="Information.php" >Information</a>
                        </li>
                        <li>
                            <a href="PitchTypeAvailability.php">Available Pitches</a>
                        </li>
                        <li>
                            <a href="LocalAttractions.php">Local Attractions</a>
                        </li>
                        <li>
                            <a href="Features.php">Features</a>
                        </li>
                        <li>
                            <a href="Reviews.php">Reviews</a>
                        </li>
                        <li>
                            <a href="Contact.php">Contact</a>
                        </li>
                    </ul>
                        <div class="hamburger homeHamburger" >
                        <div class="line"></div>
                        <div class="line"></div>
                        <div class="line"></div>
                    </div>
                    <ul class="navUl dropdown-menu homeDropdown">
                        <li >
                            <a href="HomePage.php">Home</a>
                        </li>
                        <li>
                            <a href="Information.php" >Information</a>
                        </li>
                        <li>
                            <a href="PitchTypeAvailability.php">Available Pitches</a>
                        </li>
                        <li>
                            <a href="LocalAttractions.php">Local Attractions</a>
                        </li>
                        <li>
                            <a href="Features.php">Features</a>
                        </li>
                        <li>
                            <a href="Reviews.php">Reviews</a>
                        </li>
                        <li>
                            <a href="Contact.php">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

<section >
    <div class="bgTextGrp">
        <div class="infoCardText "> 
            <h2 class="infoHeading featureHeading">"Escape to Nature's Paradise – Reserve Your Slice of Wilderness Today!"
            </h2>
            <p>
            Welcome to our campsite booking page, where adventure and tranquility collide. Nestled in the heart of pristine wilderness, our campsite offers you the perfect escape from the hustle and bustle of city life. 
            Picture yourself under a canopy of stars, the crackling of the campfire, and the soothing sounds of nature as your lullaby.  
            </p>
        </div>
    </div>
    <div>
        <div class="bookingParent">
            <div class="bookingContainer">
                <form class="contactFrm bookingFrm" id="contactForm" action="Booking.php" method="POST">
                    <h2>Reserve Here
                        &nbsp;<i class="fa fa-regular fa-pen-to-square"></i>
                    </h2>
                    <h4>Please fill these to reserve</h4>
                    <div class="frmContent">
                        <label for="">Pitch Name</label>
                        <input type="text" name="txtPName" value="<?php echo $PName; ?> " readonly>
                    </div>

                    <input type="hidden" name="txtPID" value="<?php echo $PID;?>" readonly>


                    <div class="frmContent">
                        <label for="">Booking Date</label>
                        <input type="date" name="txtBDate" value="<?php echo $today ?>" readonly>
                    </div>
    
                    <div class="frmContent">
                        <label for="">Check-In Date</label>
                        <input type="date" name="txtCIDate"  placeholder="<?php echo $today ?>">
                    </div>

                    <div>
                        <div class="frmContent">
                            <label for="">Quantity</label>
                            <input type="number" name="txtQty" min="1" max="15">
                        </div>
                        <div class="frmContent">
                            <label for="">Pitch Price ($)</label>
                            <input type="number" name="txtPPrice" value="<?php echo $PPrice; ?>" readonly>
                        </div>
                    </div>
                    

                    <div class="paymentContainer">
                            <label for="">Payment Type</label>
                            <input onchange="cardBoxVisible()" type="radio" name="PaymentType" value="Card"><span>&nbsp;Card</span> &nbsp;
                            <input onchange="digitalBoxVisible()" type="radio" name="PaymentType" value="DigitalPay"><span>&nbsp;Digital Payment</span>
                            
                            <br>
                            <div class="paymentFlex">
                                <div class="frmContent paymentCardBox hidden">
                                    <label for="">Choose your Card</label> <br>
                                    <div class="dPayFlex">
                                        <div class="rdoFlex">
                                            <input type="radio" name="cardPaymentType">&nbsp;<span>Visa Card</span>&nbsp; &nbsp;
                                        </div>
                                        <div class="rdoFlex">
                                            <input type="radio" name="cardPaymentType">&nbsp;<span>Master Card</span>&nbsp; &nbsp;
                                        </div>
                                        <div class="rdoFlex">
                                            <input type="radio" name="cardPaymentType">&nbsp;<span>Debit Card</span>&nbsp; &nbsp;
                                        </div>
                                    </div> <br>
                                    <label for="">Enter your card number <span>*</span></label>
                                    <input type="number" name="cardInfo" placeholder="" required>
                                </div> 
                                <div class="frmContent paymentDigitalBox hidden">
                                    <label for="">Choose your Digital Pay</label> <br>
                                    <div class="dPayFlex">
                                        <div class="rdoFlex">
                                            <input type="radio" name="digitalPaymentType">&nbsp;<span>&nbsp;PayPal</span>&nbsp; &nbsp; &nbsp;
                                        </div>

                                        <div class="rdoFlex">
                                            <input type="radio" name="digitalPaymentType">&nbsp;<span>&nbsp;Pay M</span>&nbsp; &nbsp; &nbsp;
                                        </div>

                                        <div class="rdoFlex">
                                            <input type="radio" name="digitalPaymentType">&nbsp;<span>&nbsp;Payoneer</span>&nbsp; &nbsp; &nbsp; 
                                        </div>
                                </div> <br>
                                    <label for="">Enter your phone number <span>*</span></label>
                                    <input type="number" name="digitalInfo" placeholder="+95*********" required>
                                </div>
                            </div>
                    </div>
    <?php
		     $cname=$_SESSION['Cname'];
             $cPhone=$_SESSION['CPhone'];
		     $cEmail=$_SESSION['CEmail'];
		     $cAddress=$_SESSION['CAddress'];

    ?>
                <h4>Please check your info</h4>
                    <input type="hidden" name="txtCID" value="<?php echo $_SESSION['CID']; ?>">
                    <div class="frmContent">
                        <label for="">Username</label>
                        <input type="text" name="txtUName" value="" placeholder="<?php echo $cname;?>">
                    </div>

                    <div class="frmContent">
                        <label for="">Contact Phone</label>
                        <input type="phone" name="txtUPhone" value="" placeholder="<?php echo $cPhone;?>">
                    </div>

                    <div class="frmContent">
                        <label for="">Contact Email</label>
                        <input type="email" name="txtUMail" value="" placeholder="<?php echo $cEmail;?>">
                    </div>
    
                    <div class="frmContent">
                        <label for="">Address</label>
                        <input type="text" name="txtUAddress" value="" placeholder="<?php echo $cAddress;?>">
                    </div>

                    <div class="frmContent">
                        <label for="">Other Message</label>
                        <textarea name="txtCMessage"></textarea>
                    </div>
                    <div class="submitBParent">
                        <div class="frmContent submitBContainer">
                            <input type="submit" value="RESERVE" name="btnReserve">
                            <img src="./images/HomePageSuscribe.png" class="submitBVector" alt="Submit Arrow Vector">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> 
</section>
    <script src="./GWSC.js"></script>
    <script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</body>
<footer>
        <div class="footerRow">
            <div class="footerCol">
                You are at 
                <a href="Booking.php">Booking Page</a>
            </div>
            <div class="footerCol">
                GWSC &copy; All Rights Reserved 2023 <br>
                For an Educational Purpose
            </div>
            <div class="footerCol">           
                <a href="https://www.facebook.com/" class="footerIcon"><i class="fa fa-brands fa-facebook"></i></a>
                <a href="https://www.youtube.com/" class="footerIcon"><i class="fa-brands fa-youtube " id="iconYoutube"></i></a>
                <a href="https://www.linkedin.com/" class="footerIcon"><i class="fa-brands fa-linkedin"></i></i></a>                
            </div>
        </div>
</footer>
</html>