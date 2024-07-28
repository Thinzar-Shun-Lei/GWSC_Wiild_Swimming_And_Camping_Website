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
    <title>GWSC - Available Pitches | Global Wild Swimming and Camping</title>
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
            <div class="navMainContainer homeNav">
                <div class="navContents">
                    <ul class="navUl">
                        <li >
                            <a href="HomePage.php">Home</a>
                        </li>
                        <li>
                            <a href="Information.php?">Information</a>
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
    <section>
        <form action="PitchTypeAvailability.php" method="POST">
            <div class="wclDiv">
                <h1>Available Pitches and its Pitch Types</h1>
                <p>The info details of available Pitches and Pitch Types can be searched below.</p>
                <div class="ptySearchParent">
                    <input class="searchContainer ptySearch" type="text" name="txtSearch" placeholder="Search for Available Pitches..." />
                    
                    <input type="submit" name="btnSearch" value="Search" class="ptySearchBtn"> 
                </div>                   
            </div>
        </form>
        <div  class='infoCardContainer'> 
            <?php
                if(isset($_POST['btnSearch'])) {
                    $pitchName=$_POST['txtSearch'];
                    $query="SELECT * FROM pitches p, pitchtypes pt WHERE p.PitchTypeID = pt.PitchTypeID AND p.PitchStatus = 'available' AND p.PitchName LIKE '%$pitchName%'";//kyike dk nay yar ka shr mhr moz % ko shayt nouk nyak 3 ya
                    
                    $result=mysqli_query($connectDB,$query);
                    $count = mysqli_num_rows($result);
                    if($count>0) {
                    
                        for ($i=0; $i < $count; $i+=10) { 
                            $query1 = "SELECT * FROM pitches p, pitchtypes pt WHERE p.PitchTypeID = pt.PitchTypeID AND p.PitchStatus = 'available' AND p.PitchName LIKE '%$pitchName%' LIMIT $i,10";// col 3 hti pl moz
                            
                            $result1=mysqli_query($connectDB,$query1);
                            $count1 = mysqli_num_rows($result1);

                            for ($j=0; $j < $count1; $j++) { 
                                $data=mysqli_fetch_array($result1);
                                $PIID=$data['PitchID'];
                                $Pname=$data['PitchName'];
                                $PTypeID=$data['PitchTypeID'];
                                $PType=$data['PitchTypeName'];
                                $PTypeImg=$data['PitchTypeImg'];
                                $PImg=$data['PitchImg2'];
                                $PStatus=$data['PitchStatus'];
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
                                                <div class="statusGrp">
                                                    <h4>Status :</h4>
                                                    <p><?php echo $PStatus ?></p>
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
                        ?>
                    </div> 
                        
                        <?php }
                         ?>  
                         <?php
                    }
                    else { ?>
                            <div class="notFoundContainer">
                                <img src="./images/SearchNotFound.png" alt="Search Not Found Vector">
                                <h2>Sorry...  Your Search is not Found.</h2>
                            </div>
            <?php
                    }
                }
                    else {
                        ?>
                <div  class='infoCardContainer'> 
                    <?php
                        $query = "SELECT * FROM pitches";
                        $ret=mysqli_query($connectDB,$query);
                        $count=mysqli_num_rows($ret);

                        if($count==0) {
                            echo "<p>Information cannot be available.</p>";
                        }
                        else {
                            for ($i=0; $i < $count; $i+=2) { //for row, 1row mhr 2pon paw chin loc ,, p, pitchtypes pt WHERE pt.PitchTypeID = p.PitchTypeID
                                $query1="SELECT * FROM pitches p, pitchtypes pt WHERE p.PitchTypeID = pt.PitchTypeID ORDER BY PitchID LIMIT $i,2"; //apaw query nk name ma tuu ag, $i, anouk mhr apaw ka limit loke htr dk hr htae
                                $ret1=mysqli_query($connectDB,$query1);
                                $count1=mysqli_num_rows($ret1);

                                for ($j=0; $j < $count1 ; $j++) { //for col, 1khu p 1khu swal htoke
                                    $data=mysqli_fetch_array($ret1); //query ko swal htoke
                                    $PIID=$data['PitchID'];
                                    $Pname=$data['PitchName'];
                                    $PStatus=$data['PitchStatus'];
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
                                            <div class="statusGrp">
                                                    <h4>Status :</h4>
                                                    <p><?php echo $PStatus ?></p>
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
                            
                    <?php }
                ?> 
            
    </section>
    
    <script src="./GWSC.js"></script>
    <script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</body>
<footer>
        <div class="footerRow">
            <div class="footerCol">
                You are at 
                <a href="PitchTypeAvailability.php">Available Pitches</a>
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