<?php
session_start();
include('connection.php');
if(!isset($_SESSION['AID'])) {
	echo "<script>window.alert('Please Login again')</script>";
	echo "<script>window.location='adminLogin.php'</script>";
}
$adminName=$_SESSION['Aname'];

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="./GWSC.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&display=swap" rel="stylesheet">
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
                    <li class="navLink"><a href="./adminMain.php">Logout</a></li>
                </ul>
            </div>
            <div class="hamburger" >
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </div>
			<ul class="dropdown-menu">
                <li class="navLink" ><a href="pitchTypes.php">Pitch Types</a></li>
                <li class="navLink"><a href="sites.php" >Sites</a></li>
                <li class="navLink"><a href="pitches.php" >Pitches</a></li>
                <li class="navLink"><a href="Report.php">Report</a></li>
                <li class="navLink"><a href="adminMain.php" >Log Out</a></li>
        	</ul>
        </nav>
		
		

	<div class="container">
		<div class="admSideDash">
			<div class="wclText">
				<h3>Hello, 
					<b class="admName">
						<?php
							echo $adminName; 
						?>	
					</b>
					<span class="iconContainer"><img src="./images/wclIcon.png" alt="Welcome Icon"></span>
				</h3>
				<br>
				<div class="animatedText">
					<h2>   Welcome from GWSC, </h2>
					<h2>Global Wild Swimming and Camping</h2>
				</div>
			</div>
			<br>
			<br>
			<hr>
			<h2 class="heading">Manage Admin Processes in Here</h2>
			<br>

			<h3>First Step : add new pitch types and sites</h3>
			<button class="navLink btnLink">
				<span><img src="./images/icon2.png" class="iconImg" alt="Pitch Type Vector"></span>
				<a href="pitchTypes.php">Pitch Types</a>
			</button> <br>	
			
			
			<button class="navLink btnLink">
					<span><img src="./images/icon1.png" class="iconImg" alt="Site Vector"></span>
					<a href="sites.php">Sites</a>
			</button> 
			<br>
			<br><br>
			<h3>Second Step : add new pitches</h3>
			<button class="navLink btnLink">
				<span><img src="./images/icon3.png" class="iconImg" alt="Pitch Vector"></span>
				<a href="pitches.php">Pitches</a>
			</button> 
            <br><br><br>
            <h3>Manage Bookings/Reviews Here</h3>
			<button class="navLink btnLink">
				<span><img src="./images/ReportVector.png" class="iconImg" alt="Report Vector"></span>
				<a href="Report.php">Report</a>
			</button> 
		</div>

		<div class="displayList">
			<h2>Manage Admin Info Here</h2>
            <table border="1px" >
                <?php
                    $select="SELECT * FROM Admins";
                    $ret=mysqli_query($connectDB,$select);
                    $count=mysqli_num_rows($ret);

                    if($count==0)
                    {
                        echo "<p>Admin Info not found</p>";
                    }
                ?>
                <table border="1px" class="tblInfo">
                    <tr class="thContainer">
                        <th>Admin ID</th>
                        <th>Admin Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Phone Number</th>
                        <th>Action</th>
                    </tr>

                    <?php
                        for ($i=0; $i <$count ; $i++) { 
                            $row=mysqli_fetch_array($ret);
                            $AID=$row['AdminID'];
                            $AName=$row['AdminName'];
                            $AEmail=$row['Email'];
                            $APhone=$row['PhoneNo'];
                            $AAddress=$row['Address'];

                            echo "<tr>";

                            echo "<td>$AID</td>";
                            echo "<td>$AName</td>";
                            echo "<td>$AEmail</td>";
                            echo "<td>$APhone</td>";
                            echo "<td>$AAddress</td>";

                            echo "<td>
                                <a href='adminUpdate.php?AID=$AID'>Update</a> |
                                <a href='adminDelete.php?AID=$AID'>Delete</a>
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