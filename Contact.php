<?php
include('connection.php');
session_start();

if(!isset($_SESSION['CID'])) {
    echo "<script>window.alert('Please Login first')</script>";
    echo "<script>window.location='customerLogin.php'</script>";
}
  $cFName=$_SESSION['CFName'];
  $cSName=$_SESSION['CSName'];

  if (isset($_POST['btnSubmit'])) {
    $firstName = $_POST['txtFName'];
    $surname = $_POST['txtSName'];
    $phone = $_POST['txtCPhone'];
    $email = $_POST['txtCEmail'];
    $message = $_POST['txtCMessage'];
    

    $CID = $_POST['txtCID'];
//insert code
    $insert = "INSERT into Contact (FirstName, Surname, ContactPhone, ContactEmail, ContactMessage, CustomerID) 
    VALUES('$firstName', '$surname', '$phone', '$email', '$message', '$CID')";
    $query = mysqli_query($connectDB, $insert);

    if($query) {
        echo "<script>window.alert('Success in Filling Contact Form')</script>";
    	echo "<script>window.location='Contact.php'</script>";
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
    <title>GWSC - Customer Contact | Global Wild Swimming and Camping</title>
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
        <div class="abtContactParent">
            <div class="abtContactContainer contactBgImg">
                <div class="abtContact">
                    <div class="contactTitle">
                        <h2>Contact Us</h2> <i class="fa fa-duotone fa-message"></i>
                    </div>
                    <p>Our team is available to assist you during the following hours: <br><br>

                        Monday-Friday: [8:00 am - 5:00 pm] <br>
                        Saturday, Sunday: [9:00 am - 3:00 pm]</p>
                    <p>
                        You can contact via <a href="mailto:gwscinfo@gmail.com">email</a> or via <a href="#contactForm">contact form</a>.
                    </p>
                    <h4>See our <a href="Policy.php">Privacy Policy .</a> </h4>
                    <h4>See our <a href="Terms.php">Terms & Conditions .</a> </h4>
                </div>
            </div>
        </div>
    </section>
   
    <section>
        <div class="contactInfo">
            <div class="contactCol">
                <h3>Address</h3>
                <div class="contactInfoFlex">
                    <i class="fa fa-duotone fa-location-dot"></i>
                    <p>93 King's Rd London SW3 4PA UK</p>
                </div>
            </div>
            <div class="contactCol">
                <h3>Email Address</h3>
                <div class="contactInfoFlex">
                    <i class="fa fa-duotone fa-envelope"></i>
                    <p><a href="mailto:gwscinfo@gmail.com">gwscinfo@gmail.com</a></p>
                </div>
            </div>
            <div class="contactCol">
                <h3>Phone Number</h3>
                <div class="contactInfoFlex">
                    <i class="fa fa-duotone fa-phone"></i>
                    <p><a href="tel:(717) 550-1675">(717) 550-1675</a></p>
                </div>
            </div>
            <div class="contactCol">
                <h3>Social Platforms</h3>
                <div class="contactInfoFlex">
                <a href="https://www.facebook.com/" class="footerIcon"><i class="fa fa-brands fa-facebook"></i></a>
                <a href="https://www.youtube.com/" class="footerIcon"><i class="fa-brands fa-youtube " id="iconYoutube"></i></a>
                <a href="https://www.linkedin.com/" class="footerIcon"><i class="fa-brands fa-linkedin"></i></i></a>   
                </div>
            </div>
        </div>
    </section>
    <br>
    <section>
        <div class="frmParent">
            <div class="frmContainer">
                <form class="contactFrm" id="contactForm" action="Contact.php" method="POST">
                    <h2>Keep in Touch</h2>
                    <div class="frmContent">
                        <label for="">First Name</label>
                        <input type="text" name="txtFName" value="<?php echo $cFName; ?>" readonly>
                    </div>

                    <div class="frmContent">
                        <label for="">Surname</label>
                        <input type="text" name="txtSName" value="<?php echo $cSName; ?>" readonly>
                    </div>
    
                    <div class="frmContent">
                        <label for="">Phone</label>
                        <input type="number" name="txtCPhone">
                    </div>
    
                    <div class="frmContent">
                        <label for="">Email Address</label>
                        <input type="email" name="txtCEmail">
                    </div>

                    <div class="frmContent">
                        <label for="">Message</label>
                        <textarea name="txtCMessage" ></textarea>
                    </div>

                    <div class="">
                        <input type="checkbox" required>
                        <label for="">I Agree to <a href="Policy.php">Privacy Policy</a></label>
                    </div>
                    <br>
                    <input type="hidden" name="txtCID" value="<?php echo $_SESSION['CID']; ?>">

                    <div class="frmContent submitContainer">
                        <input type="submit" value="SEND" name="btnSubmit">
                        <img src="./images/HomePageSuscribe.png" class="submitVector" alt="Submit Arrow Vector">
                    </div>
                </form>
            </div>
            <div>
                <img src="./images/ContactVector.png" class="contactVector" alt="World, Earth Vector">
            </div>
        </div>
    </section>
    <hr class="hr">

    <section>
        <div class=" contactEndParent">
            <div class="contactEndContainer">
                <div class="contactEnd">
                    <h2>Feedback</h2>
                    <p>We value your feedback. If you have any suggestions, comments, or ideas on how we can improve our products or services, please let us know. 
                       <a href="Reviews.php"> Review Here</a> .</p>
                </div>
                <div class="contactEnd">
                    <h2>Privacy</h2>
                    <p>Your privacy is important to us. We will never share your contact information with third parties.
                        For more details on how we handle your data, please refer to our <a href="Policy.php">Privacy Policy</a> .</p>
                </div>
            </div>
            <div class="mapContainer">
                <iframe class="mapFrame" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2484.3284928911085!2d-0.16744422378381182!3d51.488839112059715!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4876056b59f68ea3%3A0x38cd788248258c5e!2s93%20King&#39;s%20Rd%2C%20London%20SW3%204PA%2C%20UK!5e0!3m2!1sen!2snl!4v1693283756519!5m2!1sen!2snl" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
                <a href="Contact.php">Contact Page</a>
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