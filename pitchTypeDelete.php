<?php
include('connection.php');

$PTID=$_REQUEST['PTID'];
$delete="DELETE FROM pitchtypes WHERE PitchTypeID = '$PTID'";
$ret = mysqli_query($connectDB,$delete);

if($ret) {
    echo "<script>window.alert('Pitch Types is successfully deleted.')</script>";
    echo "<script>window.location='pitchTypes.php'</script>";
}
else {
    echo "<script>window.alert(Pitch Type cannot be deleted.)</script>";
}
?>