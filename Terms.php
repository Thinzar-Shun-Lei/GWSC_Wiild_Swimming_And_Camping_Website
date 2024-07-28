<?php
include('connection.php');
session_start();

if(!isset($_SESSION['CID'])) {
	echo "<script>window.alert('Please Login first')</script>";
	echo "<script>window.location='customerLogin.php'</script>";
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
    <title>GWSC - Terms and Conditions | Global Wild Swimming and Camping</title>
</head>
<body>
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
                            <a href="Contact.php" class="navActive">Contact</a>
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
                            <a href="Contact.php" class="navActive">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <section>
        <div class="policyContainer">
            <div>
                <h1>Terms and Conditions for GWSC Camping</h1>
                <p>Please read these Terms and Conditions carefully before using the GWSC Camping website operated by GWSC Camping.
                    By accessing or using the Service, you agree to be bound by these Terms. If you disagree 
                    with any part of the Terms, you may not access the Service.</p>  
            </div>  
            <div>
                <h2>Reservations and Bookings</h2>
                <div>
                    <div>
                        <h4>Reservations:</h4>
                        <p>Reservations for camping pitches and other services offered by GWSC Camping can be
                             made through our website or by contacting our customer service.</p> 
                    </div>
                    <div>
                        <h4>Payment:</h4>
                        <p>Payment for reservations and bookings must be made according 
                            to the terms specified during the reservation process. 
                            We accept various payment methods, which are detailed on our website.</p> 
                    </div>
                    <div>
                        <h4>Cancellation:</h4>
                        <p>Cancellation policies vary depending on the type of reservation and 
                            specific terms stated during the booking process. 
                            Please review the cancellation policy for your reservation carefully.</p> 
                    </div>
                </div>
                    <div>
                        <h2>Use of Service</h2>
                        <div>
                            <h4>Prohibited Activities:</h4>
                            <ul>
                                <li>Violate any local, state, national, or international law or regulation.</li>
                                <li>Infringe upon or violate our intellectual property rights or the intellectual property rights of others.</li>
                                <li>Be harmful, threatening, abusive, harassing, defamatory, obscene, or invasive of another's privacy.</li>
                                <li> Impersonate any person or entity or misrepresent your affiliation with a person or entity.</li>
                                <li>Interfere with or disrupt the Service or servers or networks connected to the Service.</li>
                            </ul>
                        </div>
                        <div>
                            <h4>Accuracy of Information:</h4>
                            <p>While we strive to provide accurate and up-to-date information on our website, 
                                we do not warrant the accuracy, completeness, or reliability of any information displayed. 
                                You acknowledge and agree to use this information at your own risk.</p>
                        </div>
                    </div>  
                    <div>
                        <h2>Privacy</h2>
                        <p>Your use of the Service is also governed by our Privacy Policy. 
                            Please review our Privacy Policy to understand 
                            our practices regarding the collection and use of your personal information.</p> 
                    </div>
                    <div>
                        <h2>Changes to Terms</h2>
                        <p>We reserve the right to modify or replace these Terms at any time. 
                            Any changes will be effective immediately upon posting on our website. 
                            You are responsible for regularly reviewing these Terms for updates.</p> 
                    </div>
                    <div>
                        <h2>Contact Us</h2>
                        <p>If you have any questions or concerns about this Privacy Policy, please contact us 
                            at <a href="mailto:gwscinfo@gmail.com">gwscinfo@gmail.com</a></p>
                        <br>
                        <p>Check our Policy and Privacy at <a href="Policy.php">here</a>.</p>  
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
                <a href="Terms.php">Terms & Conditions Page</a>
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