<?php
session_start();
include('connection.php');

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
    <title>GWSC - Home Page | Global Wild Swimming and Camping</title>
</head>
<body>
<!-- req -->
    <header>
        <nav class="navWholeContainer">
            <div class="logoLoginContainer">
                <a href="HomePage.php" class="logoContainer">
                    <img src="./images/campimgLogo.png" alt="Logo">
                    <h1 class="logo-text">GWSC</h1>
                </a>
                <div class="headerGrp">
                    <!-- ViewCount? -->
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
            <div class="navMainContainer homeNav">
                <div class="navContents">
                    <ul class="navUl">
                        <li >
                            <a href="HomePage.php" class="navActive">Home</a>
                        </li>
                        <li>
                            <a href="Information.php?">Information</a>
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
                            <a href="HomePage.php" class="navActive">Home</a>
                        </li>
                        <li>
                            <a href="Information.php">Information</a>
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
    <!-- Pop Up box  -->
    <div id="modalBox">
        <div class="modalBox">
            <img src="./images/bookNow.jpg" alt="Book Now Image">
            <div class="modalText">
                <h3>Spend your valuable holidays with GWSC !</h3>
                <div class="modalBtn">
                    <button class="modalCancel" onclick="cancelBtn()">Cancel</button>
                    <button class="modalBook"><a href="PitchTypeAvailability.php">Book Now</a></button>
                </div>
            </div>
        </div>
    </div>
<br>
<!-- Cookie Consent -->
    <div id="modalCBox">
        <div class="modalCBox ">
            <div class="modalIconGrp">
                <i class=" fa fa-solid fa-cookie-bite Cookie"></i>
                <i class="fa-solid fa-xmark crossTick" onclick="cancelBtn()"></i>
            </div>
            <div class="modalCText">
                <h3>Your Privacy</h3><br>
                <p>By clicking “Accept all cookies”, you agree Stack Exchange can store cookies on your device and 
                    disclose information in accordance with our 
                    <a href="Policy.php">Cookie Policy</a>.
                </p>
                <div class="modalCBtn">
                    <button class="modalCancel" onclick="cancelBtn()">Reject</button>
                    <button class="modalCancel" onclick="cancelBtn()">Accept</button>
                </div>
            </div>
        </div>
    </div>
    <section>
        <div class="slideshowContainer">
        
            <div class="slide slideTransform">
                <img src="./images/slideshowImg2.jpg" alt="Slideshow Image">
                <div class="slideText">Connecting with Nature</div>
            </div>

            <div class="slide slideTransform">
                <img src="./images/slideshowImg1.jpg" alt="Slideshow Image">
                <div class="slideText">Wild Swimming Experiences</div>
            </div>

            <div class="slide slideTransform">
                <img src="./images/slideshowImg3.jpg" alt="Slideshow Image">
                <div class="slideText">Unique Camping Experiences</div>
            </div>
            <div class="slide slideTransform">
                <img src="./images/slideshowImg4.jpg" alt="Slideshow Image">
                <div class="slideText">Offering Various Services</div>
            </div>
            <div class="slide slideTransform">
                <img src="./images/slideshowImg5.jpg" alt="Slideshow Image">
                <div class="slideText">Various Types of Pitches</div>
            </div>

            <a class="prevBtn" onclick="plusSlides(-1)">❮</a>
            <a class="nextBtn" onclick="plusSlides(1)">❯</a>

        </div>
        <br>

        <div class="indicatorGrp">
            <span class="indicator" onclick="currentSlide(1)"></span> 
            <span class="indicator" onclick="currentSlide(2)"></span> 
            <span class="indicator" onclick="currentSlide(3)"></span> 
            <span class="indicator" onclick="currentSlide(4)"></span> 
            <span class="indicator" onclick="currentSlide(5)"></span> 
        </div>
    </section>


<!-- Body contents -->
    <section class="wclSection">
        <div class="wclDiv">
            <h1>Welcome to GWSC, Global Wild Swimming and Camping</h1>
            <p>GWSC offers the most unique camping experiences and open wild swimming environments which allow you enjoy your holidays with beautiful moments. 
                Experience natural vibes and unforgettable memories with GWSC. </p>
            <div class="searchContainer">
                <input type="text" placeholder="Search for Available Pitches..." />
                <a href="PitchTypeAvailability.php">
                    <i class="fa fa-light fa-magnifying-glass iconSearch"></i>
                </a>
            </div> 
        </div>
        <hr class="hr">
        <div class="pitchShowcase">
            <h2>Available Pitch Types</h2>
            <div class="pitchGrp">
                <div class="pitchCard">
                    <img src="./images/pitchTypeTent.jpg" alt="Tent Pitch Image">
                    <div class="pitchTextGrp">
                        <h3>Tent Pitch</h3>
                        <p>Experience nature like never before with our cozy and convenient tent pitches. Nestled in the breathtaking Blue Ridge Mountains of North Carolina,
                            our tent pitches offer a serene escape from the hustle and bustle of everyday life.</p>
                    </div>
                    <button class="pitchCardBtn">
                        <a href="PitchTypeAvailability.php">Check Availability</a>
                        <i class="fa fa-light fa-arrow-right"></i>
                    </button>
                </div>
                <div class="pitchCard">
                    <img src="./images/pitchTypeTouringCaravan.jpg" alt="Caravan Pitch Image">
                    <div class="pitchTextGrp">
                        <h3>Touring Caravan Pitch</h3>
                        <p>Experience the joy of the open road and the freedom of traveling with your touring caravan.
                            Our spacious and well-equipped touring caravan pitch offers a perfect spot to park your caravan and unwind.</p>
                    </div>
                    <button class="pitchCardBtn">
                        <a href="PitchTypeAvailability.php">Check Availability</a>
                        <i class="fa fa-light fa-arrow-right"></i>
                    </button>
                </div>
                <div class="pitchCard">
                    <img src="./images/pitchTypeMotorHomePitch.jpg" alt="Motor Home Pitch Image">
                    <div class="pitchTextGrp">
                        <h3>Motorhome Pitch</h3>
                        <p>Embark on a thrilling journey with your motorhome and explore the natural environments.
                            Our motorhome pitch is designed to accommodate various motorhome sizes and offers ample space for relaxation.</p>
                    </div>
                    <button class="pitchCardBtn">
                        <a href="PitchTypeAvailability.php">Check Availability</a>
                        <i class="fa fa-light fa-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>

        <div class="homeImgGrp"> 
            <div class="homeImgTextGrp">
                <h2>Enjoy moments with GWSC</h2>
                <p>Keep in touch with GWSC for your valuable holidays.</p>
            </div>
        </div>

    <section>
        <div class="flexHomeGrp">
            <div class="flexHomeContent1">
                <img src="./images/homeWorldWide.jpg" alt="Camping Site Image">
            </div>
            <div class="flexHomeContent2">
                <h2>World Wide Camping Sites</h2>
                <p>GWSC offers various camping sites located in all around the world, in UK, US, Europe and South Korea. 
                    Customers can book the desired camping site and select the specific camping pitch.</p>
            </div>
        </div>
        <div class="flexHomeGrp">
            <div class="flexHomeContent2">
                <h2>Offering Numerous Facilities</h2>
                <p>Beside main requirements for camping or wild swimming, GWSC also offers additional facilities or features. 
                    Two main facilities are included in each package. Additional facilities like campfire, bell tents, electrical hookup, wifi and many others can also be requested.
                    <br><br>
                    <a href="PitchTypeAvailability.php">See Details in Pitches</a>
                </p>
            </div>
            <div class="flexHomeContent1">
                <img src="./images/homeFacilities.jpg" alt="Facility Image">
            </div>
        </div>
        <div class="flexHomeGrp">
            <div class="flexHomeContent1">
                <iframe class="mapFrame" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2484.3284928911085!2d-0.16744422378381182!3d51.488839112059715!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4876056b59f68ea3%3A0x38cd788248258c5e!2s93%20King&#39;s%20Rd%2C%20London%20SW3%204PA%2C%20UK!5e0!3m2!1sen!2snl!4v1693283756519!5m2!1sen!2snl" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="flexHomeContent2">
                <h2>Headquarter's Location</h2>
                <p>The main centre of GWSC is located on 93 Kings Road, in London, UK. 
                    Can contact directly to the main headquarter or <br><br>
                    <a href="Contact.php">Contact via Email</a>
                </p>
            </div>
        </div>
        <div class="flexHomeGrp">
            <div class="flexHomeContent2">
                <h2>Experiencing breathtaking nature</h2>
                <p>Spending the holidays with us. You will have unexpected experiences that never happen before in your life.
                    <br><br>
                    <a href="PitchTypeAvailability.php">Booking Now</a>
                </p>
            </div>
            <div class="flexHomeContentV1">
                <iframe class="flexHomeVideo"  src="https://www.youtube.com/embed/h2U3R5JfYUc?si=oOWrtgZICuHH0gLg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
        </div>
    </section>
    
    <hr class="hr">

    <section>
        <div class="susViewGrp">
            <br><br>
                <div class="subscribeGrp">
                    <h2>Subscribe</h2>
                    <p>Sign Up to our newsletter</p>
                    <form action="" class="subscribeForm">
                        <input type="email" placeholder="example@gmail.com"><br>
                        <input type="submit" value="Subscribe" class="homeSuscribe">
                    </form>
                    <span> 
                        <img src="./images/HomePageSuscribe.png" class="SubscribeImg" alt="Suscribe Arrow">
                    </span>
                </div>
                <div class="viewCount">
                    <div class="view">
                        <p>Your View Count &nbsp; : </p>
                        <span>
                            <?php
                                if(!isset($_SESSION['CID'])) {
                                    echo "<script>window.alert('Please Login')</script>";
                                    echo "0";
                                }
                                else {
                                    $CID=$_SESSION['CID'];
                                    $select="SELECT * FROM customers WHERE CustomerID='$CID'";
                                    $query=mysqli_query($connectDB,$select);
                                    $count=mysqli_num_rows($query);

                                    if($count>0) {
                                        $data=mysqli_fetch_array($query);
                                        $Viewcount=$data['Viewcount'];

                                        echo $Viewcount;
                                    }
                                }
                            ?>
                        </span>
                    </div>
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
                for (i = 0; i < indicators.length; i++) {
                indicators[i].className = indicators[i].className.replace(" indicatorActive", "");
                }
                slides[slideNum-1].style.display = "block";  
                indicators[slideNum-1].className += " indicatorActive";
            }
    </script>
    <script src="./GWSC.js"></script>
    <script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</body>
<footer>
        <div class="footerRow">
            <div class="footerCol">
                You are at 
                <a href="HomePage.php">Home Page</a>
            </div>
            <div class="footerCol">
                GWSC &copy; All Rights Reserved 2023 <br>
                For an Educational Purpose
            </div>
            <div class="footerCol">
                
                <a href="https://www.facebook.com/" class="footerIcon"><i class="fa fa-brands fa-facebook"></i></a>
                <a href="https://www.youtube.com/" class="footerIcon"><i class="fa-brands fa-youtube " id="iconYoutube"></i></a>
                <a href="https://www.linkedin.com/" class="footerIcon"><i class="fa-brands fa-linkedin"></i></i></a>
                
                <div class="RSSfeedContainer">
                    <a href="./RSSFeed.php" class="footerIcon rssIcon"><i class="fa-solid fa-rss"></i></a>
                </div>
            </div>
        </div>
</footer>
</html>