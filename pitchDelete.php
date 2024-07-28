<?php
include('connection.php');

$PID=$_REQUEST['PID'];
$delete="DELETE FROM pitchtypes WHERE PitchID = '$PID'";
$ret = mysqli_query($connectDB,$delete);

if($ret) {
    echo "<script>window.alert('Pitch is successfully deleted.')</script>";
    echo "<script>window.location='pitches.php'</script>";
}
else {
    echo "<script>window.alert(Pitch cannot be deleted.)</script>";
}
?>