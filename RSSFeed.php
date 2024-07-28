<?php 
include('connection.php'); 
header('Content-Type: text/xml');

echo "<?xml version='1.0' encoding='UTF-8' ?>
<rss version='2.0'>
<channel>
<title>GWSC - Global Wild Swimming and Camping</title>
<description>Global Wild Swimming and Camping provides camping and swimming information for visitors</description>";
// <url>http://localhost:8080/GWSC/HomePage.php</url>;


    $sql = "SELECT * from rssfeed order by RssfeedID desc";        

    $result = mysqli_query($connectDB,$sql);    

    $num_rows=mysqli_num_rows($result);
    for($i=0; $i<$num_rows; $i++)
    {
        $row=mysqli_fetch_array($result);
        echo "<item>";
        echo "<title>".htmlspecialchars($row['Title'])."</title>";
        echo "<description>".htmlspecialchars($row['Description'])."</description>";
        echo "<url>".htmlspecialchars($row['Url'])."</url>";
        echo "</item>";
    }
    echo "</channel>
</rss>";
?>