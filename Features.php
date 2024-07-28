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
    <title>GWSC - Features | Global Wild Swimming and Camping</title>
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
            <div class="navMainContainer">
                <div class="navContents">
                    <ul class="navUl">
                        <li >
                            <a href="HomePage.php" >Home</a>
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
                            <a href="Features.php" class="navActive">Features</a>
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
                            <a href="HomePage.php" >Home</a>
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
                            <a href="Features.php" class="navActive">Features</a>
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

    
    <!-- Feature display -->
    <section>
<!-- Site 1 -->
    <div class="fCompoundContainer">
        <div class="fWholeContainer">
            <section>
                <div class="infoCardText "> 
                    <h2 class="infoHeading featureHeading">Available Features and Sites
                        <img src="./images/tentVector.png" alt="Tent Vector" >
                    </h2>
                <br>
                    <p>
                        GWSC provides at least two facilities in each pitch package. The available features in each site can be viewed in details.
                        Some Wearable Technological Devices are suggested below for your future convenient journey.   
                    </p>
                </div>
            </section>
            <div class="featureContainer"> 
                <?php
                    $querySite = "SELECT * FROM sites WHERE SiteID = 1";
                    $retSite=mysqli_query($connectDB,$querySite);
                    $countSite=mysqli_num_rows($retSite);

                    if($countSite==0) {
                        echo "<p>Information cannot be available.</p>";
                    }
                    else {
                                $dataSite=mysqli_fetch_array($retSite); //query ko swal htoke
                                $SiteID=$dataSite['SiteID'];
                                $SiteName=$dataSite['SiteName'];
                                $SiteLocation=$dataSite['Location'];
                            ?> 
                                <!-- Site display -->
                            <div class="siteTextGrp">
                                <h2><?php echo $SiteName ?></h2>
                                <p><?php echo $SiteLocation ?></p>
                            </div>
                        <?php
                            }
                ?>
                <!-- container flex card -->
                    <div class="featureCardContainer">
                <?php
                    $query = "SELECT * FROM pitches p, sites s WHERE p.SiteID = s.SiteID AND s.SiteID = 1";
                    $ret=mysqli_query($connectDB,$query);
                    $count=mysqli_num_rows($ret);

                    if($count==0) {
                        echo "<p>Information cannot be available.</p>";
                    }
                    else {
                        for ($i=0; $i < $count; $i+=2) { //for row, 1row mhr 2pon paw chin loc ,, p, pitchtypes pt WHERE pt.PitchTypeID = p.PitchTypeID
                            $query1="SELECT * FROM pitches p, sites s WHERE p.SiteID = s.SiteID AND s.SiteID = 1 LIMIT $i,2"; //apaw query nk name ma tuu ag, $i, anouk mhr apaw ka limit loke htr dk hr htae
                            $ret1=mysqli_query($connectDB,$query1);
                            $count1=mysqli_num_rows($ret1);

                            for ($j=0; $j < $count1 ; $j++) { //for col, 1khu p 1khu swal htoke
                                $data=mysqli_fetch_array($ret1); //query ko swal htoke
                                $PIID=$data['PitchID'];
                                $SiteID=$data['SiteID'];
                                $SiteName=$data['SiteName'];
                                $SiteLocation=$data['Location'];
                                $Pname = $data['PitchName'];
                                $PFeature1=$data['Feature1'];
                                $PFeature2=$data['Feature2'];
                                $PFeatureDetails1=$data['FeatureDetails1'];
                                $PFeatureDetails2=$data['FeatureDetails2'];
                                $PFeatureImg1=$data['FeatureImg1'];
                                $PFeatureImg2=$data['FeatureImg2'];
                            ?>  
                                
                                    <div class="featureCard">
                                        <img src="<?php echo $PFeatureImg1 ?>" alt="Feature Image">
                                        <div class="featureTextGrp">
                                            <h3><?php echo $PFeature1 ?></h3>
                                            <p><?php echo $PFeatureDetails1 ?> <br>
                                            Available at</p>
                                        </div>
                                        <a href="PitchDisplay.php?PID=<?php echo $PIID ?>" class="fPitchName">
                                                <p><?php echo  $Pname ?></p>
                                        </a>
                                    </div>

                                    <div class="featureCard">
                                        <img src="<?php echo $PFeatureImg2 ?>" alt="Feature Image">
                                        <div class="featureTextGrp">
                                            <h3><?php echo $PFeature2 ?></h3>
                                            <p><?php echo $PFeatureDetails2 ?> <br> 
                                            Available at</p>
                                        </div>
                                        <a href="PitchDisplay.php?PID=<?php echo $PIID ?>" class="fPitchName">
                                                    <p><?php echo  $Pname ?></p>
                                        </a>
                                    </div>
                            
                        <?php
                            }
                        }
                    }
                    ?>
                </div>
            </div>
            <br>
            <hr class="hr">
<!-- Site 2 -->
            <div class="featureContainer"> 
                <?php
                    $querySite = "SELECT * FROM sites WHERE SiteID = 2";
                    $retSite=mysqli_query($connectDB,$querySite);
                    $countSite=mysqli_num_rows($retSite);

                    if($countSite==0) {
                        echo "<p>Information cannot be available.</p>";
                    }
                    else {
                                $dataSite=mysqli_fetch_array($retSite); //query ko swal htoke
                                $SiteID=$dataSite['SiteID'];
                                $SiteName=$dataSite['SiteName'];
                                $SiteLocation=$dataSite['Location'];
                            ?> 
                                <!-- Site display -->
                            <div class="siteTextGrp">
                                <h2><?php echo $SiteName ?></h2>
                                <p><?php echo $SiteLocation ?></p>
                            </div>
                        <?php
                            }
                ?>
                <!-- container flex card -->
                    <div class="featureCardContainer">
                <?php
                    $query = "SELECT * FROM pitches p, sites s WHERE p.SiteID = s.SiteID AND s.SiteID = 2";
                    $ret=mysqli_query($connectDB,$query);
                    $count=mysqli_num_rows($ret);

                    if($count==0) {
                        echo "<p>Information cannot be available.</p>";
                    }
                    else {
                        for ($i=0; $i < $count; $i+=2) { //for row, 1row mhr 2pon paw chin loc ,, p, pitchtypes pt WHERE pt.PitchTypeID = p.PitchTypeID
                            $query1="SELECT * FROM pitches p, sites s WHERE p.SiteID = s.SiteID AND s.SiteID = 2 LIMIT $i,2"; //apaw query nk name ma tuu ag, $i, anouk mhr apaw ka limit loke htr dk hr htae
                            $ret1=mysqli_query($connectDB,$query1);
                            $count1=mysqli_num_rows($ret1);

                            for ($j=0; $j < $count1 ; $j++) { //for col, 1khu p 1khu swal htoke
                                $data=mysqli_fetch_array($ret1); //query ko swal htoke
                                $PID=$data['PitchID'];
                                $SiteID=$data['SiteID'];
                                $SiteName=$data['SiteName'];
                                $SiteLocation=$data['Location'];
                                $Pname = $data['PitchName'];
                                $PFeature1=$data['Feature1'];
                                $PFeature2=$data['Feature2'];
                                $PFeatureDetails1=$data['FeatureDetails1'];
                                $PFeatureDetails2=$data['FeatureDetails2'];
                                $PFeatureImg1=$data['FeatureImg1'];
                                $PFeatureImg2=$data['FeatureImg2'];
                            ?>  
                                
                                    <div class="featureCard">
                                        <img src="<?php echo $PFeatureImg1 ?>" alt="Feature Image">
                                        <div class="featureTextGrp">
                                            <h3><?php echo $PFeature1 ?></h3>
                                            <p><?php echo $PFeatureDetails1 ?> <br>
                                            Available at</p>
                                        </div>
                                        <a href="PitchDisplay.php?PID=<?php echo $PIID ?>" class="fPitchName">
                                                <p><?php echo  $Pname ?></p>
                                        </a>
                                    </div>

                                    <div class="featureCard">
                                        <img src="<?php echo $PFeatureImg2 ?>" alt="Feature Image">
                                        <div class="featureTextGrp">
                                            <h3><?php echo $PFeature2 ?></h3>
                                            <p><?php echo $PFeatureDetails2 ?> <br> 
                                            Available at</p>
                                        </div>
                                        <a href="PitchDisplay.php?PID=<?php echo $PIID ?>" class="fPitchName">
                                                    <p><?php echo  $Pname ?></p>
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
<!-- Site 3 -->
        <div class="featureContainer"> 
                <?php
                    $querySite = "SELECT * FROM sites WHERE SiteID = 3";
                    $retSite=mysqli_query($connectDB,$querySite);
                    $countSite=mysqli_num_rows($retSite);

                    if($countSite==0) {
                        echo "<p>Information cannot be available.</p>";
                    }
                    else {
                                $dataSite=mysqli_fetch_array($retSite); //query ko swal htoke
                                $SiteID=$dataSite['SiteID'];
                                $SiteName=$dataSite['SiteName'];
                                $SiteLocation=$dataSite['Location'];
                            ?> 
                                <!-- Site display -->
                            <div class="siteTextGrp">
                                <h2><?php echo $SiteName ?></h2>
                                <p><?php echo $SiteLocation ?></p>
                            </div>
                        <?php
                            }
                ?>
                <!-- container flex card -->
                    <div class="featureCardContainer">
                <?php
                    $query = "SELECT * FROM pitches p, sites s WHERE p.SiteID = s.SiteID AND s.SiteID = 3";
                    $ret=mysqli_query($connectDB,$query);
                    $count=mysqli_num_rows($ret);

                    if($count==0) {
                        echo "<p>Information cannot be available.</p>";
                    }
                    else {
                        for ($i=0; $i < $count; $i+=2) { //for row, 1row mhr 2pon paw chin loc ,, p, pitchtypes pt WHERE pt.PitchTypeID = p.PitchTypeID
                            $query1="SELECT * FROM pitches p, sites s WHERE p.SiteID = s.SiteID AND s.SiteID = 3 LIMIT $i,2"; //apaw query nk name ma tuu ag, $i, anouk mhr apaw ka limit loke htr dk hr htae
                            $ret1=mysqli_query($connectDB,$query1);
                            $count1=mysqli_num_rows($ret1);

                            for ($j=0; $j < $count1 ; $j++) { //for col, 1khu p 1khu swal htoke
                                $data=mysqli_fetch_array($ret1); //query ko swal htoke
                                $PID=$data['PitchID'];
                                $SiteID=$data['SiteID'];
                                $SiteName=$data['SiteName'];
                                $SiteLocation=$data['Location'];
                                $Pname = $data['PitchName'];
                                $PFeature1=$data['Feature1'];
                                $PFeature2=$data['Feature2'];
                                $PFeatureDetails1=$data['FeatureDetails1'];
                                $PFeatureDetails2=$data['FeatureDetails2'];
                                $PFeatureImg1=$data['FeatureImg1'];
                                $PFeatureImg2=$data['FeatureImg2'];
                            ?>  
                                
                                    <div class="featureCard">
                                        <img src="<?php echo $PFeatureImg1 ?>" alt="Feature Image">
                                        <div class="featureTextGrp">
                                            <h3><?php echo $PFeature1 ?></h3>
                                            <p><?php echo $PFeatureDetails1 ?> <br>
                                            Available at</p>
                                        </div>
                                        <a href="PitchDisplay.php?PID=<?php echo $PIID ?>" class="fPitchName">
                                                <p><?php echo  $Pname ?></p>
                                        </a>
                                    </div>

                                    <div class="featureCard">
                                        <img src="<?php echo $PFeatureImg2 ?>" alt="Feature Image">
                                        <div class="featureTextGrp">
                                            <h3><?php echo $PFeature2 ?></h3>
                                            <p><?php echo $PFeatureDetails2 ?> <br> 
                                            Available at</p>
                                        </div>
                                        <a href="PitchDisplay.php?PID=<?php echo $PIID ?>" class="fPitchName">
                                                    <p><?php echo  $Pname ?></p>
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
<!-- Site 4 -->
            <div class="featureContainer"> 
                <?php
                    $querySite = "SELECT * FROM sites WHERE SiteID = 4";
                    $retSite=mysqli_query($connectDB,$querySite);
                    $countSite=mysqli_num_rows($retSite);

                    if($countSite==0) {
                        echo "<p>Information cannot be available.</p>";
                    }
                    else {
                                $dataSite=mysqli_fetch_array($retSite); //query ko swal htoke
                                $SiteID=$dataSite['SiteID'];
                                $SiteName=$dataSite['SiteName'];
                                $SiteLocation=$dataSite['Location'];
                            ?> 
                                <!-- Site display -->
                            <div class="siteTextGrp">
                                <h2><?php echo $SiteName ?></h2>
                                <p><?php echo $SiteLocation ?></p>
                            </div>
                        <?php
                            }
                ?>
                <!-- container flex card -->
                    <div class="featureCardContainer">
                <?php
                    $query = "SELECT * FROM pitches p, sites s WHERE p.SiteID = s.SiteID AND s.SiteID = 4";
                    $ret=mysqli_query($connectDB,$query);
                    $count=mysqli_num_rows($ret);

                    if($count==0) {
                        echo "<p>Information cannot be available.</p>";
                    }
                    else {
                        for ($i=0; $i < $count; $i+=2) { //for row, 1row mhr 2pon paw chin loc ,, p, pitchtypes pt WHERE pt.PitchTypeID = p.PitchTypeID
                            $query1="SELECT * FROM pitches p, sites s WHERE p.SiteID = s.SiteID AND s.SiteID = 4 LIMIT $i,2"; //apaw query nk name ma tuu ag, $i, anouk mhr apaw ka limit loke htr dk hr htae
                            $ret1=mysqli_query($connectDB,$query1);
                            $count1=mysqli_num_rows($ret1);

                            for ($j=0; $j < $count1 ; $j++) { //for col, 1khu p 1khu swal htoke
                                $data=mysqli_fetch_array($ret1); //query ko swal htoke
                                $PID=$data['PitchID'];
                                $SiteID=$data['SiteID'];
                                $SiteName=$data['SiteName'];
                                $SiteLocation=$data['Location'];
                                $Pname = $data['PitchName'];
                                $PFeature1=$data['Feature1'];
                                $PFeature2=$data['Feature2'];
                                $PFeatureDetails1=$data['FeatureDetails1'];
                                $PFeatureDetails2=$data['FeatureDetails2'];
                                $PFeatureImg1=$data['FeatureImg1'];
                                $PFeatureImg2=$data['FeatureImg2'];
                            ?>  
                                
                                    <div class="featureCard">
                                        <img src="<?php echo $PFeatureImg1 ?>" alt="Feature Image">
                                        <div class="featureTextGrp">
                                            <h3><?php echo $PFeature1 ?></h3>
                                            <p><?php echo $PFeatureDetails1 ?> <br>
                                            Available at</p>
                                        </div>
                                        <a href="PitchDisplay.php?PID=<?php echo $PIID ?>" class="fPitchName">
                                                <p><?php echo  $Pname ?></p>
                                        </a>
                                    </div>

                                    <div class="featureCard">
                                        <img src="<?php echo $PFeatureImg2 ?>" alt="Feature Image">
                                        <div class="featureTextGrp">
                                            <h3><?php echo $PFeature2 ?></h3>
                                            <p><?php echo $PFeatureDetails2 ?> <br> 
                                            Available at</p>
                                        </div>
                                        <a href="PitchDisplay.php?PID=<?php echo $PIID ?>" class="fPitchName">
                                                    <p><?php echo  $Pname ?></p>
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
<!-- Site 5 -->
            <div class="featureContainer"> 
                <?php
                    $querySite = "SELECT * FROM sites WHERE SiteID = 5";
                    $retSite=mysqli_query($connectDB,$querySite);
                    $countSite=mysqli_num_rows($retSite);

                    if($countSite==0) {
                        echo "<p>Information cannot be available.</p>";
                    }
                    else {
                                $dataSite=mysqli_fetch_array($retSite); //query ko swal htoke
                                $SiteID=$dataSite['SiteID'];
                                $SiteName=$dataSite['SiteName'];
                                $SiteLocation=$dataSite['Location'];
                            ?> 
                                <!-- Site display -->
                            <div class="siteTextGrp">
                                <h2><?php echo $SiteName ?></h2>
                                <p><?php echo $SiteLocation ?></p>
                            </div>
                        <?php
                            }
                ?>
                <!-- container flex card -->
                    <div class="featureCardContainer">
                <?php
                    $query = "SELECT * FROM pitches p, sites s WHERE p.SiteID = s.SiteID AND s.SiteID = 5";
                    $ret=mysqli_query($connectDB,$query);
                    $count=mysqli_num_rows($ret);

                    if($count==0) {
                        echo "<p>Information cannot be available.</p>";
                    }
                    else {
                        for ($i=0; $i < $count; $i+=2) { //for row, 1row mhr 2pon paw chin loc ,, p, pitchtypes pt WHERE pt.PitchTypeID = p.PitchTypeID
                            $query1="SELECT * FROM pitches p, sites s WHERE p.SiteID = s.SiteID AND s.SiteID = 5 LIMIT $i,2"; //apaw query nk name ma tuu ag, $i, anouk mhr apaw ka limit loke htr dk hr htae
                            $ret1=mysqli_query($connectDB,$query1);
                            $count1=mysqli_num_rows($ret1);

                            for ($j=0; $j < $count1 ; $j++) { //for col, 1khu p 1khu swal htoke
                                $data=mysqli_fetch_array($ret1); //query ko swal htoke
                                $PID=$data['PitchID'];
                                $SiteID=$data['SiteID'];
                                $SiteName=$data['SiteName'];
                                $SiteLocation=$data['Location'];
                                $Pname = $data['PitchName'];
                                $PFeature1=$data['Feature1'];
                                $PFeature2=$data['Feature2'];
                                $PFeatureDetails1=$data['FeatureDetails1'];
                                $PFeatureDetails2=$data['FeatureDetails2'];
                                $PFeatureImg1=$data['FeatureImg1'];
                                $PFeatureImg2=$data['FeatureImg2'];
                            ?>  
                                
                                    <div class="featureCard">
                                        <img src="<?php echo $PFeatureImg1 ?>" alt="Feature Image">
                                        <div class="featureTextGrp">
                                            <h3><?php echo $PFeature1 ?></h3>
                                            <p><?php echo $PFeatureDetails1 ?> <br>
                                            Available at</p>
                                        </div>
                                        <a href="PitchDisplay.php?PID=<?php echo $PIID ?>" class="fPitchName">
                                                <p><?php echo  $Pname ?></p>
                                        </a>
                                    </div>

                                    <div class="featureCard">
                                        <img src="<?php echo $PFeatureImg2 ?>" alt="Feature Image">
                                        <div class="featureTextGrp">
                                            <h3><?php echo $PFeature2 ?></h3>
                                            <p><?php echo $PFeatureDetails2 ?> <br> 
                                            Available at</p>
                                        </div>
                                        <a href="PitchDisplay.php?PID=<?php echo $PIID ?>" class="fPitchName">
                                                    <p><?php echo  $Pname ?></p>
                                        </a>
                                    </div>
                            
                        <?php
                            }
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <aside class="sideSection">
                <h2>Wearable Technology Categories</h2>
                <p>At GWSC camping and swimming, we're all about enhancing your outdoor experience. That's why we've curated a selection of wearable technologies designed to make your camping adventures safer, more enjoyable, and better connected. 
                    Explore these exciting wearable tech categories tailored for campers like you:</p>
                    <div class="sideFGrp">
                        <div class="wearableCard">
                            <img src="./images/activityTracker.jpg" alt="">
                            <div class="textFGrp">
                                <h3>Activity Tracker</h3>
                                <p> A device that monitors and records physical activities, 
                                    providing valuable data for campers to optimize their outdoor experiences</p>
                            </div>
                        </div>
                        <div class="wearableCard">
                            <img src="./images/SmartFitnessBand.jpg" alt="">
                            <div class="textFGrp">
                                <h3>Smart Fitness Band</h3>
                                <p> Fitness bands are lightweight and comfortable, ideal for tracking your 
                                    physical activity, sleep quality, and overall health while camping.</p>
                            </div>
                        </div>
                        <div class="wearableCard">
                            <img src="./images/SmartInsectRepellent.jpg" alt="">
                            <div class="textFGrp">
                                <h3>Smart Insect Repellent Wearable</h3>
                                <p> Insect repellent wearables, such as bracelets and clips, 
                                    help keep pesky bugs at bay while you enjoy the great outdoors.</p>
                            </div>
                        </div>
                        <div class="wearableCard">
                            <img src="./images/smartWatch.jpg" alt="">
                            <div class="textFGrp">
                                <h3>Smart Watch</h3>
                                <p>Offers camping enthusiasts a multifunctional wearable 
                                    with features like GPS, weather updates, and communication capabilities</p>
                            </div>
                        </div>
                        <div class="wearableCard">
                            <img src="./images/GPSWatch.jpg" alt="">
                            <div class="textFGrp">
                                <h3>GPS Watch</h3>
                                <p> GPS watches provide accurate location tracking and navigation features, 
                                    helping you explore unfamiliar terrain with confidence and precision.</p>
                            </div>
                        </div>
                        <div class="wearableCard">
                            <img src="./images/OutdoorSmartGlasses.jpg" alt="">
                            <div class="textFGrp">
                                <h3>Smart Wearable Glasses</h3>
                                <p>Outdoor smart glasses offer heads-up displays and augmented reality features, enhancing your camping experience by 
                                    providing useful information about your surroundings.</p>
                            </div>
                        </div>
                        <div class="wearableCard">
                            <img src="./images/smartHeadlamp.jpg" alt="">
                            <div class="textFGrp">
                                <h3>Smart Wearable Headlamp</h3>
                                <p>Wearable headlamps keep your hands free for tasks like setting up camp or cooking, 
                                    making them a vital tool for nighttime camping activities.</p>
                            </div>
                        </div>
                        <div class="wearableCard">
                            <img src="./images/wearableCamera.jpg" alt="">
                            <div class="textFGrp">
                                <h3>Wearable Camera</h3>
                                <p>Captures memorable moments, enhancing the camping experience through comfort, 
                                    entertainment, and documentation.</p>
                            </div>
                        </div>
                        <div class="wearableCard">
                            <img src="./images/coolingDevice.jpg" alt="">
                            <div class="textFGrp">
                                <h3>Wearable Cooling Fan</h3>
                                <p>Provides campers with portable 
                                    and hands-free relief from heat during outdoor adventures</p>
                            </div>
                        </div>
                        <div class="wearableCard">
                            <img src="./images/bluetoothEarphone.jpg" alt="">
                            <div class="textFGrp">
                                <h3>Bluetooth Earphone</h3>
                                <p>Bluetooth earphones offer wireless audio entertainment, enhancing the camping
                                    experiences.
                                </p>
                            </div>
                        </div>
                        <div class="wearableCard">
                            <img src="./images/WearableUSB.jpeg" alt="">
                            <div class="textFGrp">
                                <h3>Wearable USB</h3>
                                <p>Ensures convenient and accessible charging for electronic devices, keeping campers 
                                    powered up while exploring the wilderness.
                                </p>
                            </div>
                        </div>
                        <div class="wearableCard">
                            <img src="./images/OutdoorSmartDevice.jpg" alt="">
                            <div class="textFGrp">
                                <h3>Outdoor Smart Safety Device</h3>
                                <p>Invest in smart safety wearables like SOS beacons and satellite communication devices for peace of mind, 
                                    enabling you to call for help in remote areas and ensuring your safety during camping.</p>
                            </div>
                        </div>
                    </div>
        </aside>
    </div>
    </section>
        <script src="./GWSC.js"></script>
        <script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</body>
<footer>
        <div class="footerRow">
            <div class="footerCol">
                You are at 
                <a href="Features.php">Features Page</a>
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
