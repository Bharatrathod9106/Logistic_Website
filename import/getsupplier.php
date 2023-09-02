<?php

require 'connection.php';

$arr='';

$supplier=$_POST['supplier'];


$sql="SELECT * FROM supplier WHERE name='$supplier'";

$res = mysqli_query($conn,$sql);

while($row = mysqli_fetch_assoc($res)){

    $arr = $row; 

}

echo json_encode($arr);

?>