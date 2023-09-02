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
        $sealtype = $_POST['sealtype'];
        $factorys = $_POST['factorys'];
        $naturec = $_POST['naturec'];
        $totalpac = $_POST['totalpac'];
        $loosepac = $_POST['loosepac'];
        $contano = $_POST['contano'];
        $grosswei = $_POST['grosswei'];
        $netwei = $_POST['netwei'];
        $unit = $_POST['unit'];

        $sql = "select * from ann1";
        $result = mysqli_query($conn,$sql);
        $num = mysqli_num_rows($result);

        if($conn->connect_errno){
            die('connection Failed : '.$conn->connect_errno);
            //echo " ";
        }else{
            $stmt = $conn->prepare("insert into ann1(jobno, sealtype, factorys, naturec, totalpac, loosepac, contano, grosswei, netwei, unit) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("isssisisss", $jobno, $sealtype, $factorys, $naturec, $totalpac, $loosepac, $contano, $grosswei, $netwei, $unit);
            $stmt->execute();
            echo " ";
            $stmt->close();
            header('location:Annexure2.php');
        }
    }
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

            /* padding: 1px; */
            padding-right: 15px;
            /* padding-left: 5px; */
            font-size: 14px;

        }

        #padd1{
            padding-right: 113px;
        }
        #padd2{
            padding-right: 85px;
        }
        #padd3{
            padding-right: 54px;
        }
        #padd4{
            padding-right: 41px;
        }
        /* #padd5{
            padding-right: 0px;
        }
        #padd6{
            padding-right: 0px;
        } */
        #padd7{
            padding-right: 41px;
        }
        #padd8{
            padding-right: 57px;
        }
        #padd9{
            padding-right: 81px;
        }
        #padd10{
            padding-right: 5px;
        }

    </style>   
</head>
<body class="form-body">

    <div class="container">
        <div class="head">Annexure-c(SEA)</div>
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
                        <span class="detail" id="padd2">Seal type </span>
                        <select class="option" name="sealtype">
                            <option>Select Option</option>
                            <option>Agency</option>
                            <option>Self</option>
                            <option>Warehouse</option>
                        </select>
                    </div>
                    <div class="input-box">
                        <span class="detail" id="padd3">Factory staffed</span>
                        <select class="option" name="factorys">
                            <option>Select Option</option>
                            <option>Y</option>
                            <option>N</option>
                        </select>
                    </div>
                    <div class="input-box">
                        <span class="detail" id="padd4">Nature of cargo</span>
                        <select class="option" name="naturec">
                            <option>Select Option</option>
                            <option>C Containerized</option>
                            <option>LB Liquid AND Bulk</option>
                        </select>
                    </div>
                    <div class="input-box">
                        <span class="detail" id="padd5">Total no.of packages</span>
                        <input type="text" placeholder="Enter total no packages" required name="totalpac"> 
                    </div>
                    <div class="input-box">
                        <span class="detail" id="padd6">No.of loose packets</span>
                        <input type="text" placeholder="Enter loose packets" required name="loosepac">
                    </div>
                    <div class="input-box">
                        <span class="detail" id="padd7">No.of containers</span>
                        <input type="text" placeholder="Enter no.of containers " required name="contano">
                    </div>
                    <div class="input-box">
                        <span class="detail" id="padd8">Gross weight</span>
                        <input type="text" placeholder="Enter gross weight" required name="grosswei">
                    </div>  
                    <div class="input-box">
                        <span class="detail" id="padd9">Net weight</span>
                        <input type="text" placeholder="Enter net weight" required name="netwei">
                    </div>  
                    <div class="input-box">
                        <span class="detail" id="padd10">Unit of measurement</span>
                        <select  class="option" name="unit">
                            <option value="">select value</option>
                               <?php
                                   while($row = mysqli_fetch_assoc($unitcode_qry)){
                                       echo "<option>".$row['unitcode']."</option>";
                                 }
                               ?>
                        </select>
                    </div>  
                </div>
                <div class="button">
                    <input type="submit" name="submit" value="NEXT">
                </div>
            </form>
    </div>

</body>
</html>