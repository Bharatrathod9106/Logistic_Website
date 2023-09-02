<?php

session_start();
require 'connection.php';
if(isset($_SESSION['username'])){

    $jobno = "SELECT * FROM newdoc1";
    $job_qry = mysqli_query($conn, $jobno);

    $unitcode = "SELECT * FROM unit";
    $unitcode_qry = mysqli_query($conn, $unitcode);

    if(isset($_POST['submit'])){

        $jobno = $_POST['jobno'];
        $grp = $_POST['grp'];
        $from1 = $_POST['from1'];
        $to1 = $_POST['to1'];
        $unit = $_POST['unit'];

        // $sql = "select * from ann3";
        // $result = mysqli_query($conn,$sql);
        // $num = mysqli_num_rows($result);

        if($conn->connect_errno){
            die('connection Failed : '.$conn->connect_errno);
            //echo " ";
        }else{
            $stmt = $conn->prepare("insert into ann3(jobno, grp, from1, to1, unit) values(?, ?, ?, ?, ?)");
            $stmt->bind_param("issss", $jobno, $grp, $from1, $to1, $unit);
            $stmt->execute();
            echo " ";
            $stmt->close();
            header('location:Export.php');
        }

    }

    // if(isset($_POST['submit'])){

    //     if($conn->connect_errno){
    //         die('connection Failed : '.$conn->connect_errno);
    //         //echo " ";
    //     }else{
    //         header('location:Export.php');
    //     }
    // }
}else{
    header("location:newkrishna.html");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Annexure-c</title>
    <link type="text/css" rel="stylesheet" href="transaction.css">
    <style>
        .option{

            padding: 2px;
            padding-right:  60px;
            /* padding-left: 5px; */
            font-size: 14px;

        }

        #padd1{
            padding-right: 1px;
        }
        /* #padd2{
            padding-right: 1px;
        } */
        /* #padd3{
            padding-right: 1px;
        } */
        #padd4{
            padding-right: 38px;
        }
        #padd5{
            padding-right: 1px;
        }
    </style>   
</head>
<body class="form-body">  

    <div class="container">
        <!-- <div class="head">Annexure-c(SEA)</div> -->
            <form action="" method="post">

                <div class="user-detail">
                    <div class="input-box">
                        <span class="detail" id="padd1">Job no </span>
                           <select class="option" name="jobno">
                               <option value="">select value</option>
                               <?php
                                   while($row = mysqli_fetch_assoc($job_qry)){
                                    echo "<option>".$row['jobno']."</option>";
                                 }
                                ?>
                            </select>
                    </div>
                    <div class="input-box">
                        <span class="detail" id="padd2">Group</span>
                        <input type="text" placeholder="Enter group" name="grp">
                    </div>
                    <div class="input-box">
                        <span class="detail" id="padd3">From</span>
                        <input type="text" placeholder="Enter from" name="from1">
                    </div>
                    <div class="input-box">
                        <span class="detail" id="padd4">To</span>
                        <input type="text" placeholder="Enter To" name="to1">
                    </div>
                    <div class="input-box">
                        <span class="detail" id="padd5">Package type</span>
                        <select class="option" name="unit">
                            <option value="">select value</option>
                               <?php
                                   while($row = mysqli_fetch_assoc($unitcode_qry)){
                                       echo "<option>".$row['unitcode']."</option>";
                                 }
                               ?>
                        </select>
                    </div>
                    <!-- <div class="button">
                        <input type="submit" name="add1" value="ADD">
                    </div> -->
                </div>
                
                <div class="button">   
                    <input type="submit" name="submit" value="SAVE">
                </div>
        </form>
    </div>

</body>
</html>