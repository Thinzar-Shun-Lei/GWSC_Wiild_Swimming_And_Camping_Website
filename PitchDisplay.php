<?php
include('connection.php');
session_start();

if(!isset($_SESSION['CID'])) {
    echo "<script>window.alert('Please Login first')</script>";
    echo "<script>window.location='customerLogin.php'</script>";
}

if (isset($_GET['PID'])) {
    $PID=$_GET['PID'];
    $query="SELECT * FROM Pitches p, PitchTypes pt, Sites s WHERE p.PitchTypeID = pt.PitchTypeID AND p.SiteID = s.SiteID AND p.PitchID='$PID'";
    $queryConnect=mysqli_query($connectDB,$query);
    $data=mysqli_fetch_array($queryConnect); 
        
        $PID=$data['PitchID'];
        $PTypeID=$data['PitchTypeID'];
        $SiteID=$data['SiteID'];
        $Sname=$data['SiteName'];
        $SImg1=$data['SiteImg1'];
        $SImg2=$data['SiteImg2'];
        $Pname=$data['PitchName'];
        $PType=$data['PitchTypeName'];
        $PDuration=$data['Duration'];
        $PCapacity=$data['Capacity'];
        $PPrice=$data['Price'];
        $PDescription=$data['PitchDescription'];
        $PMap=$data['LocationMap'];
        $PLocation=$data['Location'];
        $PImg1=$data['PitchImg1'];
        $PImg2=$data['PitchImg2'];
        $PImg3=$data['PitchImg3'];

        $PFeature1=$data['Feature1'];
        $PFeature2=$data['Feature2'];
        $PFeatureimg1=$data['FeatureImg1'];
        $PFeatureimg2=$data['FeatureImg2'];
        $PMap=$data['LocationMap'];
        $PLAttractionN1=$data['LocalAttractionName1'];
        $PLAttractionImg1=$data['LocalAttractionImg1'];
        $PLAttractionN2=$data['LocalAttractionName2'];
        $PLAttractionImg2=$data['LocalAttractionImg2'];
    }
else {
    echo "<p>Pitch Detail not found.</p>";
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
    <title>GWSC - Global Wild Swimming and Camping</title>
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
                        <a href="SessionDestroy.php">Log Out</a>
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
                            <a href="Information.php">Information</a>
                        </li>
                        <li>
                            <a href="PitchTypeAvailability.php"  class="navActive">Available Pitches</a>
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
                            <a href="Information.php">Information</a>
                        </li>
                        <li>
                            <a href="PitchTypeAvailability.php" class="navActive">Available Pitches</a>
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

    <body>
<!-- Pitch Intro -->
        <section>
            <div>
                <div class="displayHeadingGrp">
                    <h2><?php echo $Pname ?></h2>  : &nbsp;
                    <p><?php echo $Sname ?></p>
                </div>
                <div class="subContainer">
                    <div class="subGrp">
                        <h4>Duration</h4> &nbsp; : &nbsp;
                        <p><?php echo $PDuration ?></p>
                    </div>
                    <div class="subGrp">
                        <h4>Capacity</h4> &nbsp; : &nbsp;
                        <p><?php echo $PCapacity ?></p>
                    </div>
                    <div class="subGrp">
                        <h4>Pitch Type</h4> &nbsp; : &nbsp;
                        <p><?php echo $PType ?></p>
                    </div>
                    <div class="subGrp">
                        <h4>Price</h4> &nbsp; : &nbsp; 
                        <p>$<?php echo $PPrice ?></p>
                    </div>
                    <div class="btnBookContainer">
                        <a href="Booking.php?PID=<?php echo $PID ?>" class="btnBook">Book Now</a>
                        <img src="./images/HomePageSuscribe.png" class="bookImg" alt="Book Arrow Vector">
                    </div>
                </div>
            </div>
        </section>
        <section>
<!-- Pitch Img -->
            <div class="pitchImgGrp">
                <img src="<?php echo $PImg1 ?>" alt="Pitch Image">
                <img src="<?php echo $PImg2 ?>" alt="Pitch Image">
                <img src="<?php echo $PImg3 ?>" alt="Pitch Image">
            </div>
            <p class="pDescription"><?php echo $PDescription ?></p>
        </section>
<!-- slide show Display -->
        <section>
            <div class="slideshowContainer slideDisplay">
                <div class="slide slideTransform">
                    <img src="<?php echo $PImg1 ?>" alt="Pitch Image in Slideshow">
                </div>

                <div class="slide slideTransform">
                    <img src="<?php echo $PImg2 ?>" alt="Pitch Image in Slideshow">
                </div>

                <div class="slide slideTransform">
                    <img src="<?php echo $PImg3 ?>" alt="Pitch Image in Slideshow">
                </div>

                <a class="prevBtn" onclick="plusSlides(-1)">❮</a>
                <a class="nextBtn" onclick="plusSlides(1)">❯</a>
            </div>
                 
            <br>
        </section>

<!-- Site, Features, Local Attractions  -->
        <section>
            <div class="siteGrp">
                <div class="displayHeadingGrp">
                    <h2>Site</h2>&nbsp;  : &nbsp;
                    <p><?php echo $Sname ?></p>
                </div>
                <div class="siteImgGrp">
                    <img src="<?php echo $SImg1?>" alt="Campsite Image">
                    <img src="<?php echo $SImg2?>" alt="Campsite Image">
                </div>
            </div>
            <br>
            
            <div class="LAGrp">
                <h2>Included Facilities</h2><br>
                <div class="LAFlexGrp">
                    <div class="LAFlex">
                        <a href="Features.php?PID=$PID">
                            <img src="<?php echo $PFeatureimg1 ?>" class="infoLAImg LAImg" alt="Feature Image">
                            <p><?php echo $PFeature1 ?></p>
                        </a>
                    </div>
                    <div class="LAFlex">
                        <a href="Features.php?PID=$PID">
                            <img src="<?php echo $PFeatureimg2 ?>" class="infoLAImg LAImg" alt="Feature Image">
                            <p><?php echo $PFeature2 ?></p>
                        </a>
                    </div>   
                </div> 
            </div>

            <div class="LAGrp">
                <h2>Recommended Local Attractions</h2>
                <div class="LAFlexGrp">
                    <div class="LAFlex">
                        <a href="LocalAttractions.php?PID=$PID">
                            <img src="<?php echo $PLAttractionImg1 ?>" class="infoLAImg LAImg" alt="Local Attraction Image">
                            <p><?php echo $PLAttractionN1 ?></p>
                        </a>
                    </div>
                    <div class="LAFlex">
                        <a href="LocalAttractions.php?PID=$PID">
                            <img src="<?php echo $PLAttractionImg2 ?>" class="infoLAImg LAImg" alt="Local Attraction Image">
                            <p><?php echo $PLAttractionN2 ?></p>
                        </a>
                    </div>   
                </div> 
            </div>           
        </section>

<!-- Location Map -->
        <section>
            <div class="LAGrp">
                <h2>Location Map</h2>
                <div class="lMap">
                    <iframe src="<?php echo $PMap ?>" class="mapSource" 
                     allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <p><?php echo $PLocation ?></p>
                </div>
            </div>
        </section>

    <script>
        // Slideshow

            let slideNum = 1;
            showSlides(slideNum);
            
            function plusSlides(n) {
                showSlides(slideNum += n);
            }
            
            function currentSlide(n) {
                showSlides(slideNum = n);
            }
            
            function showSlides(n) {
                let i;
                let slides = document.getElementsByClassName("slide");
                let indicators = document.getElementsByClassName("indicator");
                if (n > slides.length) {
                slideNum = 1
                }    
                if (n < 1) {
                slideNum = slides.length
                }
                for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none"; 
                }
                slides[slideNum-1].style.display = "block";  
            }
    </script>
    <script src="./GWSC.js"></script>
    <script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</body>
<footer>
        <div class="footerRow">
            <div class="footerCol">
                You are at 
                <a href="PitchDisplay.php">Pitch Display Page</a>
            </div>
            <div class="footerCol">
                GWSC &copy; All Rights Reserved 2023
            </div>
            <div class="footerCol">
                
                <a href="https://www.facebook.com/" class="footerIcon"><i class="fa fa-brands fa-facebook"></i></a>
                <a href="https://www.youtube.com/" class="footerIcon"><i class="fa-brands fa-youtube " id="iconYoutube"></i></a>
                <a href="https://www.linkedin.com/" class="footerIcon"><i class="fa-brands fa-linkedin"></i></i></a>
                
            </div>
        </div>
</footer>
</html>