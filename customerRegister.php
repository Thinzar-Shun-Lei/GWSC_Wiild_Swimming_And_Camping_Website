<?php
session_start();
include('connection.php');

$randomCode = rand(1000, 9999);

if (!isset($_SESSION['captcha_code'])) 
{
  $_SESSION['captcha_code'] = $randomCode;
}

if (isset($_POST['btnRegister'])) { 
	$firstName=$_POST['txtCFirstName'];
	$surname=$_POST['txtCSurname'];
	$username=$_POST['txtCUsername'];
	$email=$_POST['txtCEmail'];
	$password=$_POST['txtCPassword'];
	$address=$_POST['txtCAddress'];
	$phone=$_POST['txtCPhone'];

// password checking
    $num = preg_match('@[0-9]@', $password);
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $specialChar = preg_match('@[^\w]@', $password);

//captcha
    $userInput = $_POST['captcha'];
    $actualCode = $_SESSION['captcha_code'];

	$checkEmail="SELECT * FROM customers
	WHERE EmailAddress='$email'";

	$result=mysqli_query($connectDB,$checkEmail);
	$count=mysqli_num_rows($result); 
    
if ($userInput == $actualCode) {
//data Insert
	if ($count>0) {
		echo "<script>window.alert('Your email has already existed.')</script>"; 
		echo "<script>window.location='customerRegister.php'</script>"; 
	}
    else {
        // Password Check Condition
        if(strlen($password) < 8 || strlen($password) > 16 ) {
			echo "<script>window.alert('The password must have between 8 and 16 characters.')</script>";
        } 
        elseif(!$num) {
			echo "<script>window.alert('The password must have at least one number')</script>";
        }
        elseif(!$uppercase) {
			echo "<script>window.alert('The password must have at least one uppercase')</script>";
        }
        elseif(!$lowercase) {
			echo "<script>window.alert('The password must have at least one lowercase')</script>";
        }
        elseif(!$specialChar) {
			echo "<script>window.alert('The password must have at least one special character')</script>";
        }
        else {
		$insert="INSERT INTO customers(FirstName,Surname,Username,PhoneNo,EmailAddress,Password,Address,Viewcount) VALUES('$firstName','$surname','$username', '$phone','$email', '$password', '$address', 1)";
		$inserted=mysqli_query($connectDB,$insert);

		if ($inserted) {
			echo "<script>window.alert('Successful in Customer Registration')</script>";
			echo "<script>window.location='customerLogin.php'</script>";
		}
    }
	}
}
else
    {
       echo "<script>window.alert('You are a robot')</script>";
        echo "<script>window.location='customerRegister.php'</script>";
    }
    unset($_SESSION['captcha_code']);
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
    <title>GWSC - Customer Register | Global Wild Swimming and Camping</title>
</head>
<body class="cusRegisterBody">
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
                        <a href="customerLogin.php">Log In</a>
                    </button>
                </div>
            </div>
        </nav>
    </header>
    <div class="cusSideDash">
        <form action="customerRegister.php" method="POST" class="frmCusRegister">
            <h1>Please Register Here
                <i class="fa fa-light fa-pen-to-square cusLogInIcon"></i>
            </h1>
            
            <label for="">First Name</label> <br>
            <input type="text" name="txtCFirstName" placeholder="Enter your first name">
            <br><br>

            <label for="">Surname</label> <br>
            <input type="text" name="txtCSurname" placeholder="Enter your Surname">
            <br><br>

            <label for="">Username</label> <br>
            <input type="text" name="txtCUsername" placeholder="Enter your Username">
            <br><br>

            <label for="">Email Address</label> <br>
            <input type="email" name="txtCEmail" placeholder="Enter your email">
            <br><br>

            <label for="">Password</label>
            <br>
            <input type="password" name="txtCPassword" >
            <br>
            <small class="smallText">Password must have at least one Uppercase, one Lowercase, one Number and one Special Character.</small>
            <br><br>
            <label for="">Phone Number</label> <br>
            <input type="number" name="txtCPhone" placeholder="Enter your phone">
            <br><br>

            <label for="">Address</label> <br>
            <textarea name="txtCAddress"></textarea>
            <br><br>

            <div class="cusLoginLinkGrp">
                <a href="customerLogin.php">Already registered ? Log in Here</a>
            </div>
            <br><br>
            <!-- Captcha verification -->
                <h4>CAPTCHA Code: <?php echo $randomCode; ?></h4>
                <br>
                <label for="captcha">Enter CAPTCHA code:</label>
                <input type="text" id="captcha" name="captcha" required>
                <br><br>

            <div class="recaptchContainer">
                <div class="recaptchaBox">
                    <div>
                        <input type="checkbox" required> I am not a robot
                    </div>
                    <img src="./images/Recaptha.png" alt="" class="recaptcha" alt="Recaptcha Image">
                </div>
            </div>

            <input type="submit" value="Register" name="btnRegister">
        </form>
    </div>
</body>
</html>