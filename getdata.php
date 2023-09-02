<?php

require 'connection.php';

$ieccode=$_POST['ieccode'];

$sql = "SELECT * FROM exporter WHERE iec='$ieccode'";

$res = mysqli_query($conn,$sql);

while($row = mysqli_fetch_assoc($res)){ 

    $arr = $row; 
    
}

echo json_encode($arr);

?>