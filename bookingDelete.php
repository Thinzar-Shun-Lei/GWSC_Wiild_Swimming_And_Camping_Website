<?php
include('connection.php');

$BID=$_REQUEST['BID'];
$delete="DELETE FROM Booking WHERE BookingID = '$BID'";
$ret = mysqli_query($connectDB,$delete);

if($ret) {
    echo "<script>window.alert('Booking is successfully deleted.')</script>";
    echo "<script>window.location='Report.php'</script>";
}
else {
    echo "<script>window.alert(Booking cannot be deleted.)</script>";
}
?>