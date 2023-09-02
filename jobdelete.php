<?php

session_start();
require 'connection.php';
if(isset($_SESSION['username'])){

    @$jobno = $_POST['jobno'];

    $query1 = "DELETE FROM newdoc1 WHERE jobno=$_POST[jobno]";
    $query2 = "DELETE FROM newdoc2 WHERE jobno=$_POST[jobno]";
    $query3 = "DELETE FROM newdoc3 WHERE jobno=$_POST[jobno]";
    $query4 = "DELETE FROM newdoc4 WHERE jobno=$_POST[jobno]";
    $query5 = "DELETE FROM ann1 WHERE jobno=$_POST[jobno]";
    $query6 = "DELETE FROM ann2 WHERE jobno=$_POST[jobno]";
    $query7 = "DELETE FROM ann3 WHERE jobno=$_POST[jobno]";
        
    $result1 = mysqli_query($conn,$query1);
    $result2 = mysqli_query($conn,$query2);
    $result3 = mysqli_query($conn,$query3);
    $result4 = mysqli_query($conn,$query4);
    $result5 = mysqli_query($conn,$query5);
    $result6 = mysqli_query($conn,$query6);
    $result7 = mysqli_query($conn,$query7);


    header("location:Export.php");

}else{
    header("location:newkrishna.html");
}
   
?>