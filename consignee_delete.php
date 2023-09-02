<?php

session_start();
require 'connection.php';
if(isset($_SESSION['username'])){

    $id = $_GET['id'];

    $deletequery = "delete from consignee where id=$id";

    $query = mysqli_query($conn, $deletequery);

    header('location:Consignee_list.php');
}else{
    header("location:newkrishna.html");
}

?>