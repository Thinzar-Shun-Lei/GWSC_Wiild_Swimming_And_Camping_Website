<?php 
session_start();
include('connection.php');

if (!isset($_SESSION['AID'])) {
	echo "<script>window.alert('Please Login again')</script>";
	echo "<script>window.location=('adminLogin.php')</script>";
}
if(isset($_POST['btnAdd'])) {
	$pitchName = $_POST['txtPTName'];
	$pitchDescription = $_POST['txtPTDescription'];

    $txtImage=$_FILES['fileImage']['name'];
	$folder="fileImages/";
	$fileName= $folder."_".$txtImage; //filename 2khu sak

	$copy=copy($_FILES['fileImage']['tmp_name'], $fileName);//default name ma win chin loc tmp_name change, $fileName1 anay nak copy paste chin loc

	if (!$copy) {
		echo "<p>Cannot Upload Image</p>";
		exit();
	}

	$checkPitchName="SELECT * FROM pitchtypes
	WHERE PitchTypeName='$pitchName'";

	$result=mysqli_query($connectDB,$checkPitchName);
	$count=mysqli_num_rows($result); 

	if($count>0) {
		echo "<script>window.alert('Pitch Type has already existed.')</script>";
		echo "<script>window.location=('pitchTypes.php')</script>";
	}
	else {
		$insert="INSERT INTO pitchtypes(PitchTypeName, Description, PitchTypeImg) VALUES ('$pitchName','$pitchDescription','$fileName')";
		$inserted=mysqli_query($connectDB,$insert);

		if ($inserted) {
			echo "<script>window.alert('Successful in add new Pitch Type')</script>";
			echo "<script>window.location='pitchTypes.php'</script>";
			
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
<body>
        <nav class="nav">
            <div class="logoContainer">
                <img src="./images/campimgLogo.png" alt="Logo">
                <h1 class="logo-text">GWSC</h1>
            </div>
            <div class="navContainer">
                <ul class="navList">
                    <li class="navItem" ><a href="adminDashboard.php">Dashboard</a></li>
                    <li class="navItem" ><a href="pitchTypes.php" class="navItemActive">Pitch Types</a></li>
                    <li class="navItem "><a href="sites.php" >Sites</a></li>
                    <li class="navItem"><a href="pitches.php" >Pitches</a></li>
                    <li class="navItem"><a href="Report.php">Report</a></li>
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
                <li class="navLink active" ><a href="pitchTypes.php">Pitch Types</a></li>
                <li class="navLink"><a href="sites.php" >Sites</a></li>
                <li class="navLink"><a href="pitches.php" >Pitches</a></li>
                <li class="navLink"><a href="Report.php">Report</a></li>
                <li class="navLink"><a href="./adminRegister.php" >Log Out</a></li>
            </ul>
        </nav>
        
        
    <div class="container">
        <div class="admSideDash">
            <form action="pitchTypes.php" method="POST" class="frmLogin frmPitchType" enctype="multipart/form-data">
                <h2>Add New Pitch Types</h2>
                <br>
                <label for="">Pitch Type Name</label><br>
                <input type="text" name="txtPTName" required>
                <br><br>

                <label for="">Pitch Type Description</label><br>
                <textarea name="txtPTDescription" id="" cols="30" rows="10"></textarea>
                <br><br>

                <label>Pitch Type Image</label><br>
		        <input type="file" name="fileImage" required>
                <br><br>

                <input type="submit" name="btnAdd" value="Add">
            </form>
        </div>
        <div class="displayList">
            <table border="1px" >
                <legend>Pitch Types Info List</legend>
                <?php
                    $select="SELECT * FROM pitchtypes";
                    $ret=mysqli_query($connectDB,$select);
                    $count=mysqli_num_rows($ret);

                    if($count==0)
                    {
                        echo "<p>Pitch Types Info not found</p>";
                    }
                ?>
                <table border="1px" class="tblInfo">
                    <tr class="thContainer">
                        <th>Pitch Type ID</th>
                        <th>Type Name</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>

                    <?php
                        for ($i=0; $i <$count ; $i++) { 
                            $row=mysqli_fetch_array($ret);
                            $PTID=$row['PitchTypeID'];
                            $PTName=$row['PitchTypeName'];
                            $PTDescription=$row['Description'];

                            echo "<tr>";

                            echo "<td>$PTID</td>";
                            echo "<td>$PTName</td>";
                            echo "<td>$PTDescription</td>";
                            echo "<td>
                                <a href='pitchTypeUpdate.php?PTID=$PTID'>Update</a> |
                                <a href='pitchTypeDelete.php?PTID=$PTID'>Delete</a>
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