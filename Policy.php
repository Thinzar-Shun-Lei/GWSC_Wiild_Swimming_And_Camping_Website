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
    <title>GWSC - Privacy Policy | Global Wild Swimming and Camping</title>
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
                <h1>Privacy Policy for GWSC Camping Website</h1>
                <p>At GWSC Camping, we are committed to protecting your privacy. 
                This Privacy Policy outlines our practices concerning the collection, use, and 
                protection of your personal information when you visit our website or 
                use our services. By using our website and services, you consent to the practices 
                described in this Privacy Policy.</p>  
            </div>  
            <div>
                <h2>Information We Collect</h2>
                <div>
                    <div>
                        <h4>Personal Information</h4>
                        <p>When you make a reservation or inquire about our services, 
                            we may collect personal information such as your name, email address, phone number, 
                            and billing information.</p> 
                    </div>
                    <div>
                        <h4>Log Data</h4>
                        <p>We automatically collect information that your browser sends 
                            whenever you visit our website ("Log Data"). This Log Data may include 
                            information such as your computer's Internet Protocol ("IP") address, browser type, 
                            browser version, the pages of our website that you visit, the time and date of your visit, the
                             time spent on those pages, and other statistics.</p> 
                    </div>
                </div>
                    <div>
                        <h2>How We Use Your Information</h2>
                        <p>We may use your personal information for the following purposes:</p> 
                        <ul>
                            <li>To provide and maintain our services.</li>
                            <li>To process your reservations and bookings.</li>
                            <li>To notify you about changes to our services.</li>
                            <li>To respond to your inquiries, comments, or questions.</li>
                            <li>To improve our services and website.</li>
                            <li>To monitor the usage of our services.</li>
                            <li>To detect, prevent, and address technical issues.</li>
                        </ul>
                    </div>  
                    <div>
                        <h2>Data Security</h2>
                        <p>We take the security of your personal information seriously. 
                            We implement reasonable measures to protect your 
                            data from unauthorized access, alteration, disclosure, or destruction.</p> 
                    </div>
                    <div>
                        <h2>Third-Party Services</h2>
                        <p>Our website may contain links to third-party websites or 
                            services that are not operated by us. We have no control over, and 
                            assume no responsibility for, the content, privacy policies, or practices of 
                            any third-party sites or services. We encourage 
                            you to review the privacy policies of these third-party websites.</p> 
                    </div>
                    <div>
                        <h2>Changes to This Privacy Policy</h2>
                        <p>We may update our Privacy Policy from time to time. We will notify you of 
                            any changes by posting the new Privacy Policy on this page.
                            You are advised to review this 
                            Privacy Policy periodically for any changes.</p> 
                    </div> 
                    <div>
                        <h2>Contact Us</h2>
                        <p>If you have any questions or concerns about this Privacy Policy, please contact us 
                            at <a href="mailto:gwscinfo@gmail.com">gwscinfo@gmail.com</a></p>
                        <br>
                        <small>Check our Terms and Conditions at <a href="Terms.php">here</a>.</small>  
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
                <a href="Policy.php">Privacy and Policy Page</a>
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