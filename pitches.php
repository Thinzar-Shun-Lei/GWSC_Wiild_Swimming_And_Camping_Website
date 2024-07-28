<?php
session_start();
include('connection.php');

if (!isset($_SESSION['AID'])) {
	echo "<script>window.alert('Please Login again')</script>";
	echo "<script>window.location=('adminLogin.php')</script>";
}
if(isset($_POST['btnAdd'])) {
	$pitchName = $_POST['txtPName'];
    $pitchLocation = $_POST['txtPLocation'];
    $pitchDuration = $_POST['txtPDuration'];
    $pitchPrice = $_POST['txtPPrice'];
    $facility1 = $_POST['txtPFeature1'];
    $facility2 = $_POST['txtPFeature2'];
    $facilityDetails1 = $_POST['txtPFeatureDet1'];
    $facilityDetails2 = $_POST['txtPFeatureDet2'];
    $status = "available";
    // pending or available?
    $pitchCapacity = $_POST['txtPCapacity'];
	$pitchDescription = $_POST['txtPDescription'];
    $Site = $_POST['cboSite'];
	$PitchType = $_POST['cboPitchType'];

    $pitchLA1 = $_POST['txtPLa1'];
    $pitchLA2 = $_POST['txtPLa2'];
    $pitchLADet1 = $_POST['txtPLaDet1'];
    $pitchLADet2 = $_POST['txtPLaDet2'];
    $mapLocation = $_POST['mapURL'];

    $txtPImage1=$_FILES['fileImage1']['name'];
	$folder="fileImages/";
	$filePName1= $folder."_".$txtPImage1;

	$copy=copy($_FILES['fileImage1']['tmp_name'], $filePName1);

	if (!$copy) {
		echo "<p>Cannot Upload Image</p>";
		exit();
	}

    $txtPImage2=$_FILES['fileImage2']['name'];
	$folder="fileImages/";
	$filePName2= $folder."_".$txtPImage2;

	$copy=copy($_FILES['fileImage2']['tmp_name'], $filePName2);

	if (!$copy) {
		echo "<p>Cannot Upload Image</p>";
		exit();
	}

    $txtPImage3=$_FILES['fileImage3']['name'];
	$folder="fileImages/";
	$filePName3= $folder."_".$txtPImage3;

	$copy=copy($_FILES['fileImage3']['tmp_name'], $filePName3);

	if (!$copy) {
		echo "<p>Cannot Upload Image</p>";
		exit();
	}

    $txtFImage1=$_FILES['fileFImage1']['name'];
	$folder="fileImages/";
	$fileFName1= $folder."_".$txtFImage1;

	$copy=copy($_FILES['fileFImage1']['tmp_name'], $fileFName1);

	if (!$copy) {
		echo "<p>Cannot Upload Image</p>";
		exit();
	}

    $txtFImage2=$_FILES['fileFImage2']['name'];
	$folder="fileImages/";
	$fileFName2= $folder."_".$txtFImage2;

	$copy=copy($_FILES['fileFImage2']['tmp_name'], $fileFName2);

	if (!$copy) {
		echo "<p>Cannot Upload Image</p>";
		exit();
	}

    $txtLaImage1=$_FILES['fileLaImage1']['name'];
	$folder="fileImages/";
	$fileLaName1= $folder."_".$txtLaImage1;

	$copy=copy($_FILES['fileLaImage1']['tmp_name'], $fileLaName1);

	if (!$copy) {
		echo "<p>Cannot Upload Image</p>";
		exit();
	}

    $txtLaImage2=$_FILES['fileLaImage2']['name'];
	$folder="fileImages/";
	$fileLaName2= $folder."_".$txtLaImage2;

	$copy=copy($_FILES['fileLaImage2']['tmp_name'], $fileLaName2);

	if (!$copy) {
		echo "<p>Cannot Upload Image</p>";
		exit();
	}

	$checkSiteName="SELECT * FROM pitches
	WHERE PitchName='$pitchName'";

	$result=mysqli_query($connectDB,$checkSiteName);
	$count=mysqli_num_rows($result); 

	if($count>0) {
		echo "<script>window.alert('The Pitch has already existed.')</script>";
		echo "<script>window.location=('sites.php')</script>";
	}
	else {
		$insert="INSERT INTO pitches(PitchName,SiteID,PitchTypeID,PitchLocation,Duration,Price,
        PitchImg1,PitchImg2,PitchImg3,Feature1,Feature2,FeatureDetails1,FeatureDetails2,FeatureImg1,FeatureImg2,PitchStatus,Capacity,PitchDescription, 
        LocalAttractionName1,LocalAttractionName2,LocalAttractionDetails1,LocalAttractionDetails2,LocalAttractionImg1,LocalAttractionImg2,LocationMap)
        VALUES ('$pitchName','$Site','$PitchType','$pitchLocation','$pitchDuration','$pitchPrice',
        '$filePName1','$filePName2','$filePName3','$facility1','$facility2',
        '$facilityDetails1','$facilityDetails2','$fileFName1','$fileFName2','$status','$pitchCapacity','$pitchDescription',
        '$pitchLA1','$pitchLA2','$pitchLADet1','$pitchLADet2','$fileLaName1','$fileLaName2','$mapLocation')";
		$inserted=mysqli_query($connectDB,$insert);

		if ($inserted) {
			echo "<script>window.alert('Successful in adding new Pitches')</script>";
			echo "<script>window.location='pitches.php'</script>";
			
		}
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./GWSC.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <title>GWSC - Global Wild Swimming and Camping</title>
</head>
<body class="pitchBdy">
        <nav class="nav">
            <div class="logoContainer">
                <img src="./images/campimgLogo.png" alt="Logo">
                <h1 class="logo-text">GWSC</h1>
            </div>
            <div class="navContainer">
                <ul class="navList">
                    <li class="navItem" ><a href="adminDashboard.php">Dashboard</a></li>
                    <li class="navItem" ><a href="pitchTypes.php" >Pitch Types</a></li>
                    <li class="navItem "><a href="sites.php" >Sites</a></li>
                    <li class="navItem"><a href="pitches.php" class="navItemActive">Pitches</a></li>
                    <li class="navItem"><a href="Report.php" >Report</a></li>
                    <li class="navLink "><a href="./adminRegister.php">Logout</a></li>
                </ul>
            </div>
            <div class="hamburger" >
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </div>
            <ul class="dropdown-menu">
                <li class="navLink" ><a href="adminDashboard.php">Dashboard</a></li>
                <li class="navLink " ><a href="pitchTypes.php">Pitch Types</a></li>
                <li class="navLink"><a href="sites.php" >Sites</a></li>
                <li class="navLink active"><a href="pitches.php" >Pitches</a></li>
                <li class="navLink"><a href="Report.php" >Report</a></li>
                <li class="navLink"><a href="./adminRegister.php" >Log Out</a></li>
            </ul>
        </nav>
        
        
    <div>
        <form action="pitches.php" method="POST" class="frmPitch " enctype="multipart/form-data">
            <h2 class="pitchHeading">Add New Pitches</h2>
            <br>
        <div class="flexForm">
            <div class="flexContent">
                    <label for="">Pitch Name</label><br>
                    <input type="text" name="txtPName" required>
                    <br><br>

                    <label for="">Pitch Location</label><br>
                    <input type="text" name="txtPLocation" required></input>
                    <br><br>

                    <label>Choose Site</label><br><br>
                    <select name="cboSite">
                        <?php
                            $select="SELECT * from sites";
                            $run=mysqli_query($connectDB,$select); 
                            $count=mysqli_num_rows($run);
                            for ($i=0; $i < $count; $i++) {
                                $row=mysqli_fetch_array($run); 
                                $SID=$row['SiteID'];
                                $Sname=$row['SiteName'];
                                echo "<option value='$SID'>$Sname</option>"; 
                            }
                        ?>
                    </select>
                <br><br>

                    <label>Choose Pitch Type</label><br><br>
                    <select name="cboPitchType">
                        <?php
                            $select="SELECT * from pitchtypes";
                            $run=mysqli_query($connectDB,$select); 
                            $count=mysqli_num_rows($run);

                            for ($i=0; $i < $count; $i++) {
                                $row=mysqli_fetch_array($run); 
                                $PTID=$row['PitchTypeID'];
                                $PTname=$row['PitchTypeName'];
                                echo "<option value='$PTID'>$PTname</option>"; 
                            }
                        ?>
                    </select>
                    <br><br>

                    <label for="">Duration</label><br>
                    <input type="text" name="txtPDuration" required></input>
                    <br><br>

                    <label for="">Price</label><br>
                    <input type="number" name="txtPPrice" required></input>
                    <br><br>

                    <label>Pitch Image 1</label><br>
                    <input type="file" name="fileImage1" required>
                    <br><br>

                    <label>Pitch Image 2</label><br>
                    <input type="file" name="fileImage2" required>
                    <br><br>

                    <label>Pitch Image 3</label><br>
                    <input type="file" name="fileImage3" required>
                    <br><br>

            </div>

            <div class="flexContent">

                <label for="">Feature 1</label><br>
                <input type="text" name="txtPFeature1" required></input>
                <br><br>

                <label for="">Feature 2</label><br>
                <input type="text" name="txtPFeature2" required></input>
                <br><br>

                <label for="">Feature Details 1</label><br>
                <input type="text" name="txtPFeatureDet1" required></input>
                <br><br>

                <label for="">Feature Details 2</label><br>
                <input type="text" name="txtPFeatureDet2" required></input>
                <br><br>

                <label>Feature Image 1</label><br>
                <input type="file" name="fileFImage1" required>
                <br><br>

                <label>Feature Image 2</label><br>
                <input type="file" name="fileFImage2" required>
                <br><br>

                <label for="">Capacity</label><br>
                <input type="int" name="txtPCapacity" required></input>
                <br><br>

                <label>Description</label><br>
                <textarea name="txtPDescription" id="" cols="30" rows="10"></textarea>
                <br><br>
            </div>

            <div class="flexContent">

                <label>Local Attraction 1</label><br>
                <input type="text" name="txtPLa1" required></input>
                <br><br>

                <label>Local Attraction 2</label><br>
                <input type="text" name="txtPLa2" required></input>
                <br><br>

                <label>Local Attraction Details 1</label><br>
                <input type="text" name="txtPLaDet1" required></input>
                <br><br>

                <label>Local Attraction Details 2</label><br>
                <input type="text" name="txtPLaDet2" required></input>
                <br><br>

                <label>Local Attraction Image 1</label><br>
                <input type="file" name="fileLaImage1" required>
                <br><br>

                <label>Local Attraction Image 2</label><br>
                <input type="file" name="fileLaImage2" required>
                <br><br>

                <!-- location map link -->
                <label>Map Url</label><br>
                <input type="text" name="mapURL" required>
                <br><br>
            </div>
        </div>    
            <input type="submit" name="btnAdd" value="Add">
        </form>
</div>
<br><br>
<hr>
    <!-- </div> -->
    <br>
    <div class=" tableContainer">
        <div class="displayList">
            <table border="1px" class="tblPitch">
                <legend>Pitches Info List</legend>
                <?php
                    $select="SELECT * FROM pitches";
                    $ret=mysqli_query($connectDB,$select);
                    $count=mysqli_num_rows($ret);

                    if($count==0)
                    {
                        echo "<p>Pitches Info not found</p>";
                    }
                ?>
                <table border="1px" class="tblInfo">
                    <tr class="thContainer">
                        <th>Pitch ID</th>
                        <th>Pitch Name</th>
                        <th>Site ID</th>
                        <th>Pitch Type ID</th>
                        <th>Location</th>
                        <th>Duration</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Capacity</th>
                        <th>Action</th>
                    </tr>

                    <?php
                        for ($i=0; $i <$count ; $i++) { 
                            $row=mysqli_fetch_array($ret);
                            $PID=$row['PitchID'];
                            $PName=$row['PitchName'];
                            $SID=$row['SiteID'];
                            $PTID=$row['PitchTypeID'];
                            $PLocation=$row['PitchLocation'];
                            $PDuration=$row['Duration'];
                            $PPrice=$row['Price'];
                            $PDescription=$row['PitchDescription'];
                            $PStatus=$row['PitchStatus'];
                            $PCapacity=$row['Capacity'];


                            echo "<tr>";

                            echo "<td>$PID</td>";
                            echo "<td>$PName</td>";
                            echo "<td>$SID</td>";
                            echo "<td>$PTID</td>";
                            echo "<td>$PLocation</td>";
                            echo "<td>$PDuration</td>";
                            echo "<td>$PPrice</td>";
                            echo "<td>$PDescription</td>";
                            echo "<td>$PStatus</td>";
                            echo "<td>$PCapacity</td>";

                        // change or not?
                            echo "<td>
                                <a href='pitchUpdate.php?PID=$PID'>Update</a> |
                                <a href='pitchDelete.php?PID=$PID'>Delete</a>
                            </td>";

                            echo "<tr>";
                        }

                    ?>
                </table>
            </table>
        </div>

        <div class="displayList">
            <br><br>
            <table border="1px" class="tblPitch" >
                <legend>Pitches Features and Local Attractions Info List</legend>
                <?php
                    $select="SELECT * FROM pitches";
                    $ret=mysqli_query($connectDB,$select);
                    $count=mysqli_num_rows($ret);

                    if($count==0)
                    {
                        echo "<p>Pitches Info not found</p>";
                    }
                ?>
                <table border="1px" class="tblInfo">
                    <tr class="thContainer">
                        <th>Picth ID</th>
                        <th>Feature 1</th>
                        <th>Feature 1 details</th>
                        <th>Feature 2</th>
                        <th>Feature 2 details</th>
                        <th>Local Attraction 1</th>
                        <th>Local Attraction 1 details</th>
                        <th>Local Attraction 2</th>
                        <th>Local Attraction 2 details</th>
                        <th>Action</th>
                    </tr>

                    <?php
                        for ($i=0; $i <$count ; $i++) { 
                            $row=mysqli_fetch_array($ret);
                            $PID=$row['PitchID'];
                            $Feature1=$row['Feature1'];
                            $FeatureDetails1=$row['FeatureDetails1'];
                            $Feature2=$row['Feature2'];
                            $FeatureDetails2=$row['FeatureDetails2'];
                            $LAName1=$row['LocalAttractionName1'];
                            $LADetails1=$row['LocalAttractionDetails1'];
                            $LAName2=$row['LocalAttractionName2'];
                            $LADetails2=$row['LocalAttractionDetails2'];

                            echo "<tr>";

                            echo "<td>$PID</td>";
                            echo "<td>$Feature1</td>";
                            echo "<td>$FeatureDetails1</td>";
                            echo "<td>$Feature2</td>";
                            echo "<td>$FeatureDetails2</td>";
                            echo "<td>$LAName1</td>";
                            echo "<td>$LADetails1</td>";
                            echo "<td>$LAName2</td>";
                            echo "<td>$LADetails2</td>";

                            echo "<td>
                                <a href='pitchUpdate.php?PID=$PID'>Update</a> |
                                <a href='pitchDelete.php?PID=$PID'>Delete</a>
                            </td>";

                            echo "<tr>";
                        }

                    ?>
                </table>
            </table>
        </div>
        </div>

    <script src="./GWSC.js"></script>
</body>
</html>