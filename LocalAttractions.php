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
    <title>GWSC - Local Attractions | Global Wild Swimming and Camping</title>
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
                            <a href="LocalAttractions.php" class="navActive">Local Attractions</a>
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
                            <a href="HomePage.php" >Home</a>
                        </li>
                        <li>
                            <a href="Information.php">Information</a>
                        </li>
                        <li>
                            <a href="PitchTypeAvailability.php">Available Pitches</a>
                        </li>
                        <li>
                            <a href="LocalAttractions.php" class="navActive">Local Attractions</a>
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
            <h2 class="infoHeading featureHeading">Available Local Attractions and Sites
                <img src="./images/Location.png" alt="Location Map Vector" >
            </h2>
            <p>
                GWSC suggests two local attractive places in each pitch package. The available features in each site can be viewed in details.  
            </p>
        </div>
    </section>

    <!-- Feature display -->
    <section>
<!-- Site 1 -->
            <div class="featureContainer"> 
                <?php
                    $querySite = "SELECT * FROM sites WHERE SiteID = 1";
                    $retSite=mysqli_query($connectDB,$querySite);
                    $countSite=mysqli_num_rows($retSite);

                    if($countSite==0) {
                        echo "<p>Information cannot be available.</p>";
                    }
                    else {
                                $dataSite=mysqli_fetch_array($retSite); 
                                $SiteID=$dataSite['SiteID'];
                                $SiteName=$dataSite['SiteName'];
                                $SiteLocation=$dataSite['Location'];
                            ?> 
                                <!-- Site display -->
                            <div class="siteTextGrp LASite">
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
                                $PLAttractionN1=$data['LocalAttractionName1'];
                                $PLAttractionImg1=$data['LocalAttractionImg1'];
                                $PLAttractionN2=$data['LocalAttractionName2'];
                                $PLAttractionImg2=$data['LocalAttractionImg2'];
                                $PLAttractionDetails1=$data['LocalAttractionDetails1'];
                                $PLAttractionDetails2=$data['LocalAttractionDetails2'];
                            ?>  
                                
                                    <div class="featureCard LACard">
                                        <img src="<?php echo $PLAttractionImg1 ?>" alt="Local Attraction Image">
                                        <div class="featureTextGrp">
                                            <h3><?php echo $PLAttractionN1 ?></h3>
                                            <p><?php echo $PLAttractionDetails1 ?> <br>
                                            Available at</p>
                                        </div>
                                        <a href="PitchDisplay.php?PID=<?php echo $PIID ?>" class="fPitchName">
                                                <p><?php echo  $Pname ?></p>
                                        </a>
                                    </div>

                                    <div class="featureCard LACard">
                                        <img src="<?php echo $PLAttractionImg2 ?>" alt="Local Attraction Image">
                                        <div class="featureTextGrp">
                                            <h3><?php echo $PLAttractionN2 ?></h3>
                                            <p><?php echo $PLAttractionDetails2 ?> <br>
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
                            <div class="siteTextGrp LASite">
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
                                $PLAttractionN1=$data['LocalAttractionName1'];
                                $PLAttractionImg1=$data['LocalAttractionImg1'];
                                $PLAttractionN2=$data['LocalAttractionName2'];
                                $PLAttractionImg2=$data['LocalAttractionImg2'];
                                $PLAttractionDetails1=$data['LocalAttractionDetails1'];
                                $PLAttractionDetails2=$data['LocalAttractionDetails2'];
                            ?>  
                                
                                    <div class="featureCard LACard">
                                        <img src="<?php echo $PLAttractionImg1 ?>" alt="Local Attraction Image">
                                        <div class="featureTextGrp">
                                            <h3><?php echo $PLAttractionN1 ?></h3>
                                            <p><?php echo $PLAttractionDetails1 ?> <br>
                                            Available at</p>
                                        </div>
                                        <a href="PitchDisplay.php?PID=<?php echo $PIID ?>" class="fPitchName">
                                                <p><?php echo  $Pname ?></p>
                                        </a>
                                    </div>

                                    <div class="featureCard LACard">
                                        <img src="<?php echo $PLAttractionImg2 ?>" alt="Local Attraction Image">
                                        <div class="featureTextGrp">
                                            <h3><?php echo $PLAttractionN2 ?></h3>
                                            <p><?php echo $PLAttractionDetails2 ?> <br>
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

<!-- Site 2 -->
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
                            <div class="siteTextGrp LASite">
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
                                $PLAttractionN1=$data['LocalAttractionName1'];
                                $PLAttractionImg1=$data['LocalAttractionImg1'];
                                $PLAttractionN2=$data['LocalAttractionName2'];
                                $PLAttractionImg2=$data['LocalAttractionImg2'];
                                $PLAttractionDetails1=$data['LocalAttractionDetails1'];
                                $PLAttractionDetails2=$data['LocalAttractionDetails2'];
                            ?>  
                                
                                    <div class="featureCard LACard">
                                        <img src="<?php echo $PLAttractionImg1 ?>" alt="Local Attraction Image">
                                        <div class="featureTextGrp">
                                            <h3><?php echo $PLAttractionN1 ?></h3>
                                            <p><?php echo $PLAttractionDetails1 ?> <br>
                                            Available at</p>
                                        </div>
                                        <a href="PitchDisplay.php?PID=<?php echo $PIID ?>" class="fPitchName">
                                                <p><?php echo  $Pname ?></p>
                                        </a>
                                    </div>

                                    <div class="featureCard LACard">
                                        <img src="<?php echo $PLAttractionImg2 ?>" alt="Local Attraction Image">
                                        <div class="featureTextGrp">
                                            <h3><?php echo $PLAttractionN2 ?></h3>
                                            <p><?php echo $PLAttractionDetails2 ?> <br>
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
                            <div class="siteTextGrp LASite">
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
                                $PLAttractionN1=$data['LocalAttractionName1'];
                                $PLAttractionImg1=$data['LocalAttractionImg1'];
                                $PLAttractionN2=$data['LocalAttractionName2'];
                                $PLAttractionImg2=$data['LocalAttractionImg2'];
                                $PLAttractionDetails1=$data['LocalAttractionDetails1'];
                                $PLAttractionDetails2=$data['LocalAttractionDetails2'];
                            ?>  
                                
                                    <div class="featureCard LACard">
                                        <img src="<?php echo $PLAttractionImg1 ?>" alt="Local Attraction Image">
                                        <div class="featureTextGrp">
                                            <h3><?php echo $PLAttractionN1 ?></h3>
                                            <p><?php echo $PLAttractionDetails1 ?> <br>
                                            Available at</p>
                                        </div>
                                        <a href="PitchDisplay.php?PID=<?php echo $PIID ?>" class="fPitchName">
                                                <p><?php echo  $Pname ?></p>
                                        </a>
                                    </div>

                                    <div class="featureCard LACard">
                                        <img src="<?php echo $PLAttractionImg2 ?>" alt="Local Attraction Image">
                                        <div class="featureTextGrp">
                                            <h3><?php echo $PLAttractionN2 ?></h3>
                                            <p><?php echo $PLAttractionDetails2 ?> <br>
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
                            <div class="siteTextGrp LASite">
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
                                $PLAttractionN1=$data['LocalAttractionName1'];
                                $PLAttractionImg1=$data['LocalAttractionImg1'];
                                $PLAttractionN2=$data['LocalAttractionName2'];
                                $PLAttractionImg2=$data['LocalAttractionImg2'];
                                $PLAttractionDetails1=$data['LocalAttractionDetails1'];
                                $PLAttractionDetails2=$data['LocalAttractionDetails2'];
                            ?>  
                                
                                    <div class="featureCard LACard">
                                        <img src="<?php echo $PLAttractionImg1 ?>" alt="Local Attraction Image">
                                        <div class="featureTextGrp">
                                            <h3><?php echo $PLAttractionN1 ?></h3>
                                            <p><?php echo $PLAttractionDetails1 ?> <br>
                                            Available at</p>
                                        </div>
                                        <a href="PitchDisplay.php?PID=<?php echo $PIID ?>" class="fPitchName">
                                                <p><?php echo  $Pname ?></p>
                                        </a>
                                    </div>

                                    <div class="featureCard LACard">
                                        <img src="<?php echo $PLAttractionImg2 ?>" alt="Local Attraction Image">
                                        <div class="featureTextGrp">
                                            <h3><?php echo $PLAttractionN2 ?></h3>
                                            <p><?php echo $PLAttractionDetails2 ?> <br>
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


            <br>
    </section>

    <script src="./GWSC.js"></script>
    <script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</body>
<footer>
        <div class="footerRow">
            <div class="footerCol">
                You are at 
                <a href="LocalAttractions.php">Local Attractions Page</a>
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