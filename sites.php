<?php
session_start();
include('connection.php');

if (!isset($_SESSION['AID'])) {
	echo "<script>window.alert('Please Login again')</script>";
	echo "<script>window.location=('adminLogin.php')</script>";
}
if(isset($_POST['btnAdd'])) {
	$siteName = $_POST['txtSName'];
    $siteLocation = $_POST['txtSLocation'];
	$siteDescription = $_POST['txtSDescription'];
    $siteReview = $_POST['txtSReview'];
    $txtImage1=$_FILES['fileImage1']['name'];
	$folder="fileImages/";
	$fileName1= $folder."_".$txtImage1;

	$copy=copy($_FILES['fileImage1']['tmp_name'], $fileName1);

	if (!$copy) {
		echo "<p>Cannot Upload Image</p>";
		exit();
	}

    $txtImage2=$_FILES['fileImage2']['name'];
	$folder="fileImages/";
	$fileName2= $folder."_".$txtImage2;

	$copy=copy($_FILES['fileImage2']['tmp_name'], $fileName2);

	if (!$copy) {
		echo "<p>Cannot Upload Image</p>";
		exit();
	}

	$checkSiteName="SELECT * FROM sites
	WHERE SiteName='$siteName'";

	$result=mysqli_query($connectDB,$checkSiteName);
	$count=mysqli_num_rows($result); 

	if($count>0) {
		echo "<script>window.alert('The Site has already existed.')</script>";
		echo "<script>window.location=('sites.php')</script>";
	}
	else {
		$insert="INSERT INTO sites(SiteName,Location, Description, SiteImg1, SiteImg2, Reviews) VALUES ('$siteName','$siteLocation','$siteDescription','$fileName1','$fileName2', '$siteReview')";
		$inserted=mysqli_query($connectDB,$insert);

		if ($inserted) {
			echo "<script>window.alert('Successful in add new Pitch Type')</script>";
			echo "<script>window.location='sites.php'</script>";
			
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
<body class="">
        <nav class="nav">
            <div class="logoContainer">
                <img src="./images/campimgLogo.png" alt="Logo">
                <h1 class="logo-text">GWSC</h1>
            </div>
            <div class="navContainer">
                <ul class="navList">
                    <li class="navItem" ><a href="adminDashboard.php">Dashboard</a></li>
                    <li class="navItem" ><a href="pitchTypes.php">Pitch Types</a></li>
                    <li class="navItem "><a href="sites.php" class="navItemActive">Sites</a></li>
                    <li class="navItem"><a href="pitches.php" >Pitches</a></li>
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
                <li class="navLink" ><a href="pitchTypes.php">Pitch Types</a></li>
                <li class="navLink active"><a href="sites.php" >Sites</a></li>
                <li class="navLink"><a href="pitches.php" >Pitches</a></li>
                <li class="navLink"><a href="Report.php" >Report</a></li>
                <li class="navLink"><a href="./adminRegister.php" >Log Out</a></li>
             </ul>
        </nav>
       
        
    <div class="container">
        <div class="admSideDash">
            <form action="sites.php" method="POST" class="frmLogin frmsites frmPitchType" enctype="multipart/form-data">
                <h2>Add New Sites</h2>
                <br>
                <label for="">Site Name</label><br>
                <input type="text" name="txtSName" required>
                <br><br>

                <label for="">Location</label><br>
                <input type="text" name="txtSLocation" required></input>
                <br><br>

                <label>Description</label><br>
                <textarea name="txtSDescription" id="" cols="30" rows="10"></textarea>
                <br><br>

                <label>Review</label><br>
                <input type="number" min="0" max="5" name="txtSReview"></input>
                <br><br>

                <label>Site Image 1</label><br>
		        <input type="file" name="fileImage1" required>
                <br><br>

                <label>Site Image 2</label><br>
		        <input type="file" name="fileImage2" required>
                <br><br>

                <input type="submit" name="btnAdd" value="Add">
            </form>
        </div>
        <div class="displayList">
            <table border="1px" class="tblScroll">
                <legend>Sites Info List</legend>
                <?php
                    $select="SELECT * FROM sites";
                    $ret=mysqli_query($connectDB,$select);
                    $count=mysqli_num_rows($ret);

                    if($count==0)
                    {
                        echo "<p>Pitch Types Info not found</p>";
                    }
                ?>
                <table border="1px" class="tblInfo">
                    <tr class="thContainer">
                        <th>Site ID</th>
                        <th>Site Name</th>
                        <th>Location</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>

                    <?php
                        for ($i=0; $i <$count ; $i++) { 
                            $row=mysqli_fetch_array($ret);
                            $SID=$row['SiteID'];
                            $SName=$row['SiteName'];
                            $SLocation=$row['Location'];
                            $SDescription=$row['Description'];

                            echo "<tr>";

                            echo "<td>$SID</td>";
                            echo "<td>$SName</td>";
                            echo "<td>$SLocation</td>";
                            echo "<td>$SDescription</td>";

                            echo "<td>
                                <a href='siteUpdate.php?SID=$SID'>Update</a> |
                                <a href='siteDelete.php?SID=$SID'>Delete</a>
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