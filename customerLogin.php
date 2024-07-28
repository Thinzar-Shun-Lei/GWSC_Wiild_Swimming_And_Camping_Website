<?php
session_start();
include('connection.php');

if (isset($_POST['btnLogin'])) {
    $username=$_POST['txtCUsername'];
	$email=$_POST['txtCEmail'];
	$password=$_POST['txtCPassword'];

	$check="SELECT * from customers WHERE Username='$username' AND EmailAddress='$email' AND Password='$password'";//check email and pw
	$query=mysqli_query($connectDB,$check);

	$count=mysqli_num_rows($query);

	if ($count>0) {

		$update="UPDATE customers set Viewcount = Viewcount+1 WHERE Username='$username' AND EmailAddress='$email' AND Password='$password'";//check email and pw for update
		mysqli_query($connectDB,$update);

		$data=mysqli_fetch_array($query); 
		$cid=$data['CustomerID'];
		$cname=$data['Username'];
		$cFName=$data['FirstName'];
		$cSName=$data['Surname'];
		$cUname=$data['Username'];
		$cPhone=$data['PhoneNo'];
		$cEmail=$data['EmailAddress'];
		$cAddress=$data['Address'];

		$_SESSION['CID']=$cid;
		$_SESSION['Cname']=$cname;
		$_SESSION['CFName']=$cFName;
		$_SESSION['CSName']=$cSName;
		$_SESSION['CUsername']=$cUname;
		$_SESSION['CPhone']=$cPhone;
		$_SESSION['CEmail']=$cEmail;
		$_SESSION['CAddress']=$cAddress;

		echo "<script>window.alert('Customer Log-In is successful')</script>";
		echo "<script>window.location=('HomePage.php')</script>";
	}
	else 
	{
		if(isset($_SESSION['loginError'])) { 
			$countError=$_SESSION['loginError'];
			if($countError==1) {
				echo "<script>window.alert('Login failed! Attempt 2')</script>";
				$_SESSION['loginError']=2;
			}
			else if ($countError==2) {
				echo "<script>window.alert('Login failed! Attempt 3')</script>";
				echo "<script>window.location='CusLoginTimer.php'</script>";
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="GWSC.css">
    <title>GWSC - Customer Login | Global Wild Swimming and Camping</title>
</head>
<body class="cusLoginBody">
	<header>
        <nav class="navWholeContainer">
            <div class="logoLoginContainer">
                <a href="HomePage.php" class="logoContainer">
                    <img src="./images/campimgLogo.png" alt="Logo">
                    <h1 class="logo-text">GWSC</h1>
                </a>
                <div>
                    <button class="cusLogInBtn">
                        <i class="fa fa-regular fa-user loginIcon"></i>
                        <a href="customerRegister.php">Register</a>
                    </button>
                </div>
            </div>
        </nav>
    </header>
	<div class="cusSideDash">
        <form action="" method="POST" class="frmCusRegister">
			<h1>Please Log in Here 
			<i class="fa fa-light fa-right-to-bracket cusLogInIcon"></i>
			</h1>

            <label for="">Username</label> <br>
            <input type="text" name="txtCUsername" placeholder="Enter your usrname">
            <br><br>

            <label for="">Email Address</label> <br>
            <input type="email" name="txtCEmail" placeholder="Enter your email">
            <br><br>

			<div class="pwGrp">
            	<label for="">Password</label> <br>
            	<input type="password" name="txtCPassword" ><br>
				<div class="cusLoginLinkGrp">
					<a href="customerRegister.php">Haven't Registered ?</a>
					<a href="#">Forgot Password ?</a>
				</div>
			</div>
            <br>
			
			<br><br>

            <input type="submit" value="Log In" name="btnLogin">

        </form>
	</div>

	<script src="./GWSC.js"></script>
</body>
</html>