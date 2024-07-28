<?php
include('connection.php');

if (isset($_POST['btnRegister'])) { 
	$name=$_POST['txtAName'];
	$email=$_POST['txtAEmail'];
	$password=$_POST['txtAPassword'];
	$address=$_POST['txtAAddress'];
	$phone=$_POST['txtAPhone'];

// Password Check
    $num = preg_match('@[0-9]@', $password);
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $specialChar = preg_match('@[^\w]@', $password);

	$checkEmail="SELECT * FROM admins
	WHERE Email='$email'";//same email condition database email, form email

	$result=mysqli_query($connectDB,$checkEmail);
	$count=mysqli_num_rows($result); //database htal ka email htae htr dk rows dwe, run lite dk q statement swal htoke pe count

//data Insert
	if ($count>0) {
		echo "<script>window.alert('Your email has already existed.')</script>"; //alert box
		echo "<script>window.location='adminRegister.php'</script>"; //aloke loke pee pyan poc form c 
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
            $insert="INSERT INTO admins(AdminName,Email,Password,PhoneNo,Address) VALUES('$name', '$email', '$password', '$address', '$phone')";
		    $inserted=mysqli_query($connectDB,$insert);

            if ($inserted) {
                echo "<script>window.alert('Successful in Admin Registration')</script>";
                echo "<script>window.location='adminRegister.php'</script>";
            }
        }
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="GWSC.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet">
    <title>GWSC - Global Wild Swimming and Camping</title>
</head>
<body class="admBody">
        <nav class="nav">
            <div class="logoContainer">
                <img src="./images/campimgLogo.png" alt="Logo">
                <h1 class="logo-text">GWSC</h1>
            </div>
            <div class="navContainer">
                <ul class="navList">
                    <li class="navLink active" ><a href="./adminRegister.php">Register Here</a></li>
                    <li class="navLink"><a href="./adminLogin.php" >Log In</a></li>
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
       

        <div class="admSideDash">
            <form action="adminRegister.php" method="POST" class="frmRegister">
            <h1>Please Register Here</h1>
            
                <label for="">Full Name</label> <br>
                <input type="text" name="txtAName" placeholder="Enter your name">
                <br><br>

                <label for="">Email Address</label> <br>
                <input type="email" name="txtAEmail" placeholder="Enter your email">
                <br><br>

                <label for="">Password</label> <br>
                <input type="password" name="txtAPassword" min="8" max="16">
                <br>
                <small class="smallText smallTextColor">Password must have at least one Uppercase, one Lowercase, one Number and one Special Character.</small>
                <br><br>
                

                <label for="">Phone Number</label> <br>
                <input type="number" name="txtAPhone" placeholder="Enter your phone">
                <br><br>

                <label for="">Address</label> <br>
                <textarea name="txtAAddress"  cols="30" rows="10"></textarea>
                <br><br>

                <input type="submit" value="Register" name="btnRegister">
            </form>
            <p class="signInLink">Already have an account ? <a href="adminLogin.php">Log In Here</a></p>
        </div>
    <script src="./GWSC.js"></script>
</body>
</html>