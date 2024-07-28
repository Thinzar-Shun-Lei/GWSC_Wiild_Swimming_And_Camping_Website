<?php
session_start();
include('connection.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./GWSC.css">
	<title>GWSC - Global Wild Swimming and Camping</title>
	<style type="text/css">
		
	</style>
</head>
<body>
    <div class="LoginParent">
        <div class="loginContainer">
            <h3>You have attempted log-in three times.</h3>
            <h4>Please wait 10 minutes to log in again.</h4>
            <div class="countdownContainer">
                <p id="countdown"></p>
            </div>
        </div>
        <img src="./images/accessDenied.png" alt="">
    </div>

    <script type="text/javascript">
        const startingTime = 1;
        let totalTime = startingTime*600;

        const countdown = document.querySelector("#countdown");

        setInterval(updateCountdown,1000);
        function updateCountdown() {
            const minutes = Math.floor(totalTime/60);
            let seconds = totalTime%60;

            seconds = seconds<10 ? "0"+seconds : seconds;
            countdown.innerHTML = `${minutes} : ${seconds}`;

            totalTime--;

            if(totalTime<0) {
                window.location='adminLogin.php';
            }
        }
    </script>

</body>
</html>