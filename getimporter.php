<?php

require 'connection.php';
$importer=$_POST['importer'];


$sql="SELECT * FROM consignee WHERE name='$importer'";

$res = mysqli_query($conn,$sql);

while($row = mysqli_fetch_assoc($res)){

    $arr = $row; 

}

echo json_encode($arr);

?>