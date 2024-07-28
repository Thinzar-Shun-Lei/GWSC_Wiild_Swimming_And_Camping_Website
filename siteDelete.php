<?php
include('connection.php');

$SID=$_REQUEST['SID'];
$delete="DELETE FROM sites WHERE SiteID = '$SID'";
$ret = mysqli_query($connectDB,$delete);

if($ret) {
    echo "<script>window.alert('Site is successfully deleted.')</script>";
    echo "<script>window.location='sites.php'</script>";
}
else {
    echo "<script>window.alert(Site cannot be deleted.)</script>";
}
?>