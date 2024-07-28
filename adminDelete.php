<?php
include('connection.php');
session_start();


$AID=$_REQUEST['AID'];
$delete="DELETE FROM admins WHERE AdminID = '$AID'";
$ret = mysqli_query($connectDB,$delete);

if($ret) {
    echo "<script>window.alert('Admin is successfully deleted.')</script>";
    echo "<script>window.location='adminDashboard.php'</script>";
}
else {
    echo "<script>window.alert(Admin cannot be deleted.)</script>";
}
?>