<?php
session_start();
include('connection.php');

if (isset($_POST['btnLogin'])) {
	$email=$_POST['txtAEmail'];
	$password=$_POST['txtAPassword'];

	$check="SELECT * from admins WHERE Email='$email' AND Password='$password'";//check email and pw
	$query=mysqli_query($connectDB,$check);

	$count=mysqli_num_rows($query);

	if ($count>0) {
		$data=mysqli_fetch_array($query); //table is array, data fetched from array
		$aid=$data['AdminID'];
		$aname=$data['AdminName'];

		$_SESSION['AID']=$aid;
		$_SESSION['Aname']=$aname;
			

		echo "<script>window.alert('Admin Log-In is successful')</script>";
		echo "<script>window.location=('adminDashboard.php')</script>";
	}
	else 
	{
		if(isset($_SESSION['loginError'])) { //loginError mhr value shi ma shi sik
			
			$countError=$_SESSION['loginError'];
			if($countError==1) {
				echo "<script>window.alert('Login failed! Attempt 2')</script>";
				$_SESSION['loginError']=2;
			}
			else if ($countError==2) {
				echo "<script>window.alert('Login failed! Attempt 3')</script>";
				echo "<script>window.location='admLoginTimer.php'</script>";
			}
		}
		else {
			echo "<script>window.alert('Login failed! Attempt 1')</script>"; //start 
			$_SESSION['loginError']=1; 
		}
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="GWSC.css">
    <title>GWSC - Global Wild Swimming and Camping</title>
</head>
<body id="loginBody">
        <nav class="nav">
            <div class="logoContainer">
                <img src="./images/campimgLogo.png" alt="Logo">
                <h1 class="logo-text">GWSC</h1>
            </div>
            <div class="navContainer">
                <ul class="navList">
                    <li class="navLink "><a href="./adminRegister.php">Register</a></li>
                    <li class="navLink active"><a href="./adminLogin.php" >Log In</a></li>
                </ul>
            </div>
            <div class="hamburger" >
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </div>
            <ul class="dropdown-menu">
                <li class="navLink active" ><a href="./adminRegister.php">Register Here</a></li>
                <li class="navLink"><a href="./adminLogin.php" >Log In</a></li>
            </ul>
        </nav>
       
    <div>
    <div class="formContainer">
            <form action="" method="POST" class="frmRegister frmLogin frmSide">
            <h1>Please Log in Here</h1>

                <label for="">Email Address</label> <br>
                <input type="email" name="txtAEmail" placeholder="Enter your email">
                <br><br>

                <label for="">Password</label> <br>
                <input type="password" name="txtAPassword" >
                <br><br>

                <input type="submit" value="Log In" name="btnLogin"> <br/>
                <label class="registerLink">Do not have an account ? <a href="adminRegister.php">Register Here</a></label>
            </form>
    </div>
    
    </div>
    
    <script src="./GWSC.js"></script>
</body>
</html>