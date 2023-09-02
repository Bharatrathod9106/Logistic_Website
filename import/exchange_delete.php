<?php

session_start();
require 'connection.php';
if(isset($_SESSION['username'])){

    $id = $_GET['id'];

    $deletequery = "delete from exchange where id=$id";

    $query = mysqli_query($conn, $deletequery);

    header('location:Exchange_list.php');

}else{
        
    header("location:newkrishna.html");
}

?>