<?php
session_start();
include('connection.php');

if(!isset($_SESSION['CID'])) {
    	echo "<script>window.alert('Please Login first')</script>";
    	echo "<script>window.location='customerLogin.php'</script>";
}
$cUName=$_SESSION['CUsername'];


if (isset($_POST['btnRate'])) {
    $cUName = $_POST['txtUName'];
    $site = $_POST['cboSite'];
    $date = $_POST['txtDate'];
    $rating = $_POST['rdoRate'];
    $feedback = $_POST['txtFeedback'];
    $CID = $_POST['txtCID'];

    $insert = "INSERT into reviews (Username, Date, Rating, Feedback, CustomerID, SiteID) 
    VALUES('$cUName','$date','$rating', '$feedback', '$CID','$site')";
    $query = mysqli_query($connectDB, $insert);

    if($query) {
        echo "<script>window.alert('Success in Reviewing Sites')</script>";
    	echo "<script>window.location='Reviews.php'</script>";
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
    <title>GWSC - Reviews | Global Wild Swimming and Camping</title>
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
            <div class="navMainContainer homeNav">
                <div class="navContents">
                    <ul class="navUl">
                        <li >
                            <a href="HomePage.php" >Home</a>
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
                            <a href="Reviews.php" class="navActive">Reviews</a>
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
                            <a href="PitchTypeAvailability.php">Available Pitches</a>
                        </li>
                        <li>
                            <a href="LocalAttractions.php">Local Attractions</a>
                        </li>
                        <li>
                            <a href="Features.php">Features</a>
                        </li>
                        <li>
                            <a href="Reviews.php" class="navActive">Reviews</a>
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
        <div>
            <h1 class="rTitle">Campsite Reviews</h1>
            <?php
                    $query = "SELECT * FROM reviews r, sites s WHERE r.SiteID = s.SiteID";
                    $ret=mysqli_query($connectDB,$query);
                    $count=mysqli_num_rows($ret);

                    if($count==0) {
                        echo "<p>Review cannot be available.</p>";
                    }
                    else {
                        for ($i=0; $i < $count; $i+=4) { 
                            $query1="SELECT * FROM reviews r, sites s WHERE r.SiteID = s.SiteID ORDER BY ReviewID LIMIT $i,4"; 
                            $ret1=mysqli_query($connectDB,$query1);
                            $count1=mysqli_num_rows($ret1);

                            for ($j=0; $j < $count1 ; $j++) { //for col, 1khu p 1khu swal htoke
                                $data=mysqli_fetch_array($ret1); //query ko swal htoke
                                $RID=$data['ReviewID'];
                                $siteName=$data['SiteName'];
                                $siteImg=$data['SiteImg2'];
                                $RDate=$data['Date'];
                                $Username=$data['Username'];
                                $rating=$data['Rating'];
                                $feedback=$data['Feedback'];
                            ?>  
                            <div class="rParent">
                                <div class="wholeRFlex">
                                    <img src="<?php echo $siteImg; ?>" alt="Campsite Image">
                                    <div class="textGrp">
                                        <h3><?php echo $siteName; ?></h3>
                                        <div class="rInnerFlex">
                                            <div class="rContentGrp">
                                                <i class="fa fa-light fa-calendar"></i>
                                                <p><?php echo $RDate; ?></p>
                                            </div>
                                            <div class="rContentGrp">
                                                <i class="fa fa-light fa-user"></i>
                                                <p><?php echo $Username; ?></p>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="rContentGrp">
                                            <p>Rating :</p>
                                            <i class="fa fa-solid fa-star starRate" >
                                                <span class="rateNo."><?php echo $rating; ?></span>
                                            </i> 
                                        </div>
                                        <br>
                                        <p><?php echo $feedback; ?></p>
                                    </div>
                                </div>
                            </div>
                        
                        <?php
                            }
                        }
                    }
                    ?>
        </div>
    </section>
<hr class="hr">
<br>
<section>
    <div class="rFrmTitleGrp">
        <h2>We value your Reviews</h2>
        <div>
            <i class="fa fa-solid fa-star starRate" ></i>
            <i class="fa fa-solid fa-star starRate" ></i>
            <i class="fa fa-solid fa-star starRate" ></i>
            <i class="fa fa-solid fa-star starRate" ></i>
            <i class="fa fa-solid fa-star starRate" ></i>
        </div>
    </div>
    <div class="frmParent">
        <div class="frmContainer">
            <form class="contactFrm frmReview" action="Reviews.php" method="POST">
                <h3>Review Here</h3>
                
                <div class="frmContent">
                    <label for="">Username</label>
                    <input type="text" name="txtUName" value="<?php echo $cUName; ?>" readonly>
                </div><br>

                <div class="frmContent">
                    <label for="">Review Date</label>
                    <input type="date" name="txtDate"  >
                </div><br>

                <div class="frmContent">
                    <label>Choose Site</label>
                    <select name="cboSite" class="selectRBox">
                        <?php
                            $select="SELECT * from sites";
                            $run=mysqli_query($connectDB,$select); 
                            $count=mysqli_num_rows($run);
                            for ($i=0; $i < $count; $i++) {
                                $row=mysqli_fetch_array($run); 
                                $SID=$row['SiteID'];
                                $Sname=$row['SiteName'];
                                echo "<option value='$SID'>$Sname</option>"; //display Name and Store as ID in database
                            }
                        ?>
                    </select>
                </div><br>
        <!-- rating stars -->
                <div class="ratingContaier">
                    <label>Ratings : </label>
                    <div class="rating">
                        <input type="radio" name="rdoRate" value="5" id="star5">
                        <label class="lblStar" for="star5"></label>

                        <input type="radio" name="rdoRate" value="4" id="star4">
                        <label class="lblStar" for="star4"></label>

                        <input type="radio" name="rdoRate" value="3" id="star3">
                        <label class="lblStar" for="star3"></label>

                        <input type="radio" name="rdoRate" value="2" id="star2">
                        <label class="lblStar" for="star2"></label>

                        <input type="radio" name="rdoRate" value="1" id="star1">
                        <label class="lblStar" for="star1"></label>
                    </div>
                </div><br>

                <div class="frmContent">
                    <label for="">Feedback</label>
                    <textarea name="txtFeedback" ></textarea>
                </div><br>
                <input type="hidden" name="txtCID" value="<?php echo $_SESSION['CID']; ?>">

                <div class="frmContent submitContainer">
                    <input type="submit" name="btnRate" value="SUBMIT">
                    <img src="./images/HomePageSuscribe.png" class="submitVector" alt="Submit Arrow Vector">
                </div>
            </form> 
        </div>
            <div>
                <img src="./images/reviewVector.png" class="reviewVector" alt="Review Vector">
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
                <a href="Reviews.php">Reviews Page</a>
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