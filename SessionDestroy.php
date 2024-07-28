<?php
session_start();
include('connection.php');

$sessionDestroy = session_destroy();

if($sessionDestroy) {
    echo "<script>window.location='customerLogin.php'</script>";
}
else {
    echo "<script>window.alert('Please Reload the page')</script>";
}
?>