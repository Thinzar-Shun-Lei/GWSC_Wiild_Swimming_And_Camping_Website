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
    <title>GWSC - Information | Global Wild Swimming and Camping</title>
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
                            <a href="Information.php" class="navActive">Information</a>
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
                            <a href="Information.php" class="navActive">Information</a>
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

    <section>
        <div class="infoCardText "> 
            <h2 class="infoHeading">Guidelines for Pitch choosing and booking &nbsp;
                <img src="./images/ContactSmallPicMap.png" alt="Map Vector">
            </h2>
        <br>
            <p>
                You can view a large variety of <i>Pitches</i>, <i>Features</i> and <i>Local Attractions.</i>
                Each Pitch includes two Facilities, also known as Features, and two Local Attractions.
                You can view more about them in details via each "View More" button.
            </p>
        </div>
    </section>

    <section> 
<!-- Pitches Display -->
        <div class="infoContainer">
            <div class="infoCardText">
                <h2>Pitch Information</h2><br>
                <p>Pitch Information are displayed, each together with its inluded features, location and local attractions.
                    View more for booking details.
                </p>  
            </div> 
<!-- Division change -->
            <div  class='infoCardContainer'> 
                <?php
                    $query = "SELECT * FROM pitches";
                    $ret=mysqli_query($connectDB,$query);
                    $count=mysqli_num_rows($ret);

                    if($count==0) {
                        echo "<p>Information cannot be available.</p>";
                    }
                    else {
                        for ($i=0; $i < $count; $i+=2) { 
                            $query1="SELECT * FROM pitches p, pitchtypes pt WHERE p.PitchTypeID = pt.PitchTypeID ORDER BY PitchID LIMIT $i,2"; 
                            $ret1=mysqli_query($connectDB,$query1);
                            $count1=mysqli_num_rows($ret1);

                            for ($j=0; $j < $count1 ; $j++) { 
                                $data=mysqli_fetch_array($ret1); 
                                $PIID=$data['PitchID'];
                                $Pname=$data['PitchName'];
                                $PTypeID=$data['PitchTypeID'];
                                $PType=$data['PitchTypeName'];
                                $PTypeImg=$data['PitchTypeImg'];
                                $PImg=$data['PitchImg2'];
                                $PFeature1=$data['Feature1'];
                                $PFeature2=$data['Feature2'];
                                $PFeatureimg1=$data['FeatureImg1'];
                                $PFeatureimg2=$data['FeatureImg2'];

                                $PLocation=$data['PitchLocation'];
                                $PMap=$data['LocationMap'];
                                $PLAttractionImg1=$data['LocalAttractionImg1'];
                                $PLAttractionImg2=$data['LocalAttractionImg2'];
                            ?>  
                            <div class="infoCard">
                                <img src="<?php echo $PImg ?>" class="ipitchImg" alt="Pitch Image"><br>               
                                <div class="infoCardTextGrp">
                                    <h3><?php echo $Pname ?></h3><br>
                                    <div class="flexContainer">
                                        <div class="iCardFlexGrp">
                                            <p>Pitch Type</p>
                                            <div class="iCardFlexImgGrp iCardFlexMapGrp">
                                                <a href="Features.php">
                                                    <img src="<?php echo $PTypeImg ?>" alt="Pitch Type Image" class="ifeatureImg">
                                                </a>
                                                <p><?php echo $PType ?></p>
                                            </div>
                                        </div><br>
                                        <div class="iCardFlexGrp">
                                            <p>Included Features</p>
                                            <div class="iCardFlexImgGrp">
                                                <a href="Features.php">
                                                    <img src="<?php echo $PFeatureimg1 ?>" alt="Feature Image" class="ifeatureImg">
                                                </a>
                                                <a href="Features.php">
                                                    <img src="<?php echo $PFeatureimg2 ?>" alt="Feature Image" class="ifeatureImg">
                                                </a>
                                            </div>
                                        </div><br>
                                        <div class="iCardFlexGrp">
                                            <p>Location</p>
                                            <div class="iCardFlexMapGrp">
                                                <iframe src="<?php echo $PMap ?>" class="infoMapDisplay" 
                                                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                                <p><?php echo $PLocation ?></p>
                                            </div>
                                        </div><br>
                                        <div class="iCardFlexGrp">
                                            <p>Local Attractions</p>
                                            <div class="iCardFlexImgGrp">
                                                <a href="LocalAttractions.php">
                                                    <img src="<?php echo $PLAttractionImg1 ?>" alt="Local Attraction Image" class="ifeatureImg">
                                                </a>
                                                <a href="LocalAttractions.php">
                                                    <img src="<?php echo $PLAttractionImg2 ?>" alt="Local Attraction Image" class="ifeatureImg">
                                                </a>
                                            </div>
                                        </div><br>
                                    </div>
                                </div>
                                <button class="infoViewMore">
                                    <a href="PitchDisplay.php?PID=<?php echo $PIID ?>">View More</a>
                                    <i class="fa fa-light fa-arrow-right"></i>
                                </button>
                            </div>
                        
                        <?php
                            }
                        }
                    }
                    ?>
            </div>
        </div>
        <hr class="hr">
<!-- Available Sites Display -->
        <div class="infoContainer">
            <div class="infoCardText">
                <h2>Available Campsites</h2><br>
                <p>GWSC has registered different breath-taking campsites and wild swimming areas which offer vibrant experiences.
                </p>  
            </div> 
            <!-- Available Sites overviw Display -->
            <div  class='infoCardContainer'> 
                <?php
                    $query = "SELECT * FROM sites";
                    $ret=mysqli_query($connectDB,$query);
                    $count=mysqli_num_rows($ret);

                    if($count==0) {
                        echo "<p>Information for features cannot be available.</p>";
                    }
                    else {
                        for ($i=0; $i < $count; $i+=2) { 
                            $query1="SELECT * FROM sites ORDER BY SiteID LIMIT $i,2"; 
                            $ret1=mysqli_query($connectDB,$query1);
                            $count1=mysqli_num_rows($ret1);

                            for ($j=0; $j < $count1 ; $j++) { 
                                $data=mysqli_fetch_array($ret1); 
                                $SID=$data['SiteID'];
                                
                                $Sname=$data['SiteName'];
                                $SImg=$data['SiteImg1'];
                            ?>  
                            <div class="infoSiteCard">
                                <div href="#?PID=$PID">
                                    <img src="<?php echo $SImg ?>" class="infoLAImg" alt=" Campsite Image">
                                    <p><?php echo $Sname ?></p>
                                </div>
                            </div>
                        
                        <?php
                            }
                        }
                    }
                    ?>
            </div>
        </div>
        <hr class="hr">
<!-- Features Display -->
        <div class="infoContainer">
            <div class="infoCardText">
                <h2>Available Features</h2><br>
                <p>Features including leisure facilities, amenities, snacks and other services are available according to each campsite.</p>  
            </div> 
            <!-- Features overview Display -->
            <div  class='infoCardContainer'> 
                <?php
                    $query = "SELECT * FROM pitches";
                    $ret=mysqli_query($connectDB,$query);
                    $count=mysqli_num_rows($ret);

                    if($count==0) {
                        echo "<p>Information for features cannot be available.</p>";
                    }
                    else {
                        for ($i=0; $i < $count; $i+=2) { 
                            $query1="SELECT * FROM pitches ORDER BY PitchID LIMIT $i,2"; 
                            $ret1=mysqli_query($connectDB,$query1);
                            $count1=mysqli_num_rows($ret1);

                            for ($j=0; $j < $count1 ; $j++) { 
                                $data=mysqli_fetch_array($ret1); 
                                $PID=$data['PitchID'];
                                $PFeature1=$data['Feature1'];
                                $PFeature2=$data['Feature2'];
                                $PFeatureimg1=$data['FeatureImg1'];
                                $PFeatureimg2=$data['FeatureImg2'];
                            ?>  
                            <div class="infoFeatureCard">
                                <a href="Features.php?PID=$PID">
                                    <div class="overlayFeatureCard">
                                        <img src="<?php echo $PFeatureimg1 ?>" alt="Feature Image">
                                        <p><?php echo $PFeature1 ?></p>
                                    </div>
                                </a>
                            </div>
                            <div class="infoFeatureCard">
                                <a href="Features.php?PID=$PID">
                                    <div class="overlayFeatureCard">
                                        <img src="<?php echo $PFeatureimg2 ?>" alt="Feature Image">
                                        <p><?php echo $PFeature2 ?></p>
                                    </div>
                                </a>
                            </div>
                        
                        <?php
                            }
                        }
                    }
                    ?>
            </div>
        </div>
        <hr class="hr">
<!-- Local Attractions Display -->
        <div class="infoContainer">
            <div class="infoCardText">
                <h2>Local attractions for each Pitch</h2><br>
                <p>GWSC offer particular peaceful and attractive local places such as National Parks, Resorts, Vintage cities and many others.
                    Explore with GWSC. Take a rest with GWSC.
                </p>  
            </div> 
            <!-- Features overview Display -->
            <div  class='infoCardContainer'> 
                <?php
                    $query = "SELECT * FROM pitches";
                    $ret=mysqli_query($connectDB,$query);
                    $count=mysqli_num_rows($ret);

                    if($count==0) {
                        echo "<p>Information for features cannot be available.</p>";
                    }
                    else {
                        for ($i=0; $i < $count; $i+=2) { 
                            $query1="SELECT * FROM pitches ORDER BY PitchID LIMIT $i,2"; 
                            $ret1=mysqli_query($connectDB,$query1);
                            $count1=mysqli_num_rows($ret1);

                            for ($j=0; $j < $count1 ; $j++) { 
                                $data=mysqli_fetch_array($ret1); 
                                $PID=$data['PitchID'];
                                $PLAttractionN1=$data['LocalAttractionName1'];
                                $PLAttractionImg1=$data['LocalAttractionImg1'];
                                $PLAttractionN2=$data['LocalAttractionName2'];
                                $PLAttractionImg2=$data['LocalAttractionImg2'];
                            ?>  
                            <div class="infoLACard">
                                <a href="LocalAttractions.php?PID=$PID">
                                    <img src="<?php echo $PLAttractionImg1 ?>" class="infoLAImg" alt="Local Attraction Image">
                                    <p><?php echo $PLAttractionN1 ?></p>
                                </a>
                            </div>
                            <div class="infoLACard">
                                <a href="LocalAttractions.php?PID=$PID">
                                        <img src="<?php echo $PLAttractionImg2 ?>" class="infoLAImg" alt="Local Attraction Image">
                                        <p><?php echo $PLAttractionN2 ?></p>
                                </a>
                            </div>
                        
                        <?php
                            }
                        }
                    }
                    ?>
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
                <a href="Information.php">Information Page</a>
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