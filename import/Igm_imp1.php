<?php

    session_start();
    require 'connection.php';
    if(isset($_SESSION['username'])){

        $unitcode = "SELECT * FROM unit";
        $unitcode_qry = mysqli_query($conn, $unitcode);

        $unitc = "SELECT * FROM unit";
        $unit_qry = mysqli_query($conn, $unitc);

        if(isset($_POST['submit'])){

        $igmno = $_POST['igmno'];
        $igmdate = $_POST['igmdate'];
        $mblno = $_POST['mblno'];
        $mbldate = $_POST['mbldate'];
        $hblno = $_POST['hblno'];
        $hbldate = $_POST['hbldate'];
        $totalpac = $_POST['totalpac'];
        $packcode = $_POST['packcode'];
        $grossweight = $_POST['grossweight'];
        $unit = $_POST['unit'];
        $marksnos = $_POST['marksnos'];

        // $sql = "select * from igm1";
        // $result = mysqli_query($conn,$sql);
        // $num = mysqli_num_rows($result);

        if($conn->connect_errno){
            die('connection Failed : '.$conn->connect_errno);
            //echo " ";
        }else{
            $stmt = $conn->prepare("insert into igm1(igmno, igmdate, mblno, mbldate, hblno, hbldate, totalpac, packcode, grossweight, unit, marksnos) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssssssss", $igmno, $igmdate, $mblno, $mbldate, $hblno, $hbldate, $totalpac, $packcode, $grossweight, $unit, $marksnos);
            $stmt->execute();
            echo " ";
            $stmt->close();
            header('location:Igm_imp2.php');
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
    <title>IGM details </title>
    <link type="text/css" rel="stylesheet" href="transactionimp.css">
</head>
<style>
        .deff{
            padding-left: 10px;
            padding-bottom: 20px;
            font-family: sans-serif;
        }
        .option{

            /* padding: 1px; */
            padding-right: 15px;
            /* padding-left: 5px; */
            font-size: 14px;

        }
        #padd1{
            padding-right: 63px;
        }
        #padd2{
            padding-right: 47px;
        }
        #padd3{
            padding-right: 61px;
        }
        #padd4{
            padding-right: 45px;
        }
        #padd5{
            padding-right: 62px;
        }
        #padd6{
            padding-right: 46px;
        }
        /* #padd7{
            padding-right: 0px;
        } */
        /* #padd8{
            padding-right: 0px;
        } */
        #padd9{
            padding-right: 20px;
        }
        #padd10{
            padding-right: 83px;
        }
        #padd11{
            padding-right: 0px;
        }


    </style>   
<body class="form-body">

    <div class="container">
        <div class="head">IGM details</div>
            <form action="" method="post">

                <div class="user-detail">      

                    <div class="input-box">
                        <span class="detail" id="padd1">IGM No</span>
                        <input type="text" placeholder="Enter Igm no" required name="igmno">
                    </div>

                    <div class="input-box">
                        <span class="detail" id="padd2">IGM date</span>
                        <input type="date" placeholder="Enter invoice date" required name="igmdate">
                    </div>

                    <div class="input-box">
                        <span class="detail" id="padd3">MBL No</span>
                        <input type="text" placeholder="Enter MBL no" required name="mblno">
                    </div>

                    <div class="input-box">
                        <span class="detail" id="padd4">MBL date</span>
                        <input type="date" placeholder="Enter invoice date" required name="mbldate">
                    </div>

                    <div class="input-box"> 
                        <span class="detail" id="padd5">HBL No</span>
                        <input type="text" placeholder="Enter HBL no" required name="hblno">
                    </div>
                    
                    <div class="input-box">
                        <span class="detail" id="padd6">HBL date</span>
                        <input type="date" placeholder="Enter Date" required name="hbldate">
                    </div>

                    <div class="input-box">
                        <span class="detail" id="padd7">Total packages</span>
                        <input type="text" placeholder="Enter Total package" required name="totalpac">
                    </div>

                    <div class="input-box">
                        <span class="detail" id="padd8">Package code</span>
                            <select  class="option" name="packcode">
                                <option value="">select value</option>
                                <?php
                                    while($row = mysqli_fetch_assoc($unit_qry)){
                                        echo "<option>".$row['unitcode']."</option>";
                                    }
                                ?>
                            </select>
                    </div>

                    <div class="input-box">
                        <span class="detail" id="padd9">Gross Weight</span>
                        <input type="text" placeholder="Enter gross weight" required name="grossweight">
                    </div>
                    <div class="input-box">
                        <span class="detail" id="padd10">Unit</span>
                            <select  class="option" name="unit">
                            <option value="">select value</option>
                                <?php
                                    while($row = mysqli_fetch_assoc($unitcode_qry)){
                                        echo "<option>".$row['unitcode']."</option>";
                                    }
                                ?>
                            </select>
                    </div> 
                    <div class="input-box">
                        <span class="detail" id="padd11">Marks & Nos</span>
                        <input type="text" placeholder="Enter marks & nos" required name="marksnos">
                    </div> 
                    
                </div>
                <div class="button">
                    <input type="submit" name="submit" value="SAVE">
                </div>
            </form>
    </div>

</body>
</html>