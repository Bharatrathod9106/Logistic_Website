<?php

    session_start();
    require 'connection.php';
    if(isset($_SESSION['username'])){

        $portname = "SELECT * FROM port";
        $portname_qry = mysqli_query($conn, $portname);

        $portcode = "SELECT * FROM port";
        $portcode_qry = mysqli_query($conn, $portcode);

        $portname = "SELECT * FROM port";
        $port_qry = mysqli_query($conn, $portname);

        $country = "SELECT * FROM supplier";
        $country_qry = mysqli_query($conn, $country);

       
        if(isset($_POST['submit'])){

        $disportname = $_POST['disportname'];
        $disportcode = $_POST['disportcode'];
        $loadport = $_POST['loadport'];
        $loadcountry = $_POST['loadcountry'];
        $hwx = $_POST['hwx'];
        $gp = $_POST['gp'];
        $npa = $_POST['npa'];
        $greenchannel = $_POST['greenchannel'];
        $firstcheck = $_POST['firstcheck'];
       
        // $sql = "select * from newdoc1";
        // $result = mysqli_query($conn,$sql);
        // $num = mysqli_num_rows($result);

        if($conn->connect_errno){
            die('connection Failed : '.$conn->connect_errno);
            //echo " ";
        }else{
            $stmt = $conn->prepare("insert into impnewdoc2(disportname, disportcode, loadport, loadcountry, hwx, gp, npa, greenchannel, firstcheck) values(?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssssss", $disportname, $disportcode, $loadport, $loadcountry, $hwx, $gp, $npa, $greenchannel, $firstcheck);
            $stmt->execute();
            echo " ";
            $stmt->close();
            header('location:Import.php');
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
    <title>Import New Document</title>
    <link type="text/css" rel="stylesheet" href="transactionimp.css">
    <style>
        .deff{
            padding-left: 10px;
            padding-bottom: 20px;
            font-family: sans-serif;
        }
        .deff .input-box{

            line-height: 50px;
        }
        .option{

            /* padding: 1px; */
            padding-right: 15px;
            /* padding-left: 5px; */
            font-size: 14px;
        }
        
        /* #padd1{
            padding-right: 0px;
        } */
        /* #padd2{
            padding-right: 0px;
        } */
        #padd3{
            padding-right: 13px;
        }
        #padd4{
            padding-right: 26px;
        }
        /* #padd5{
            padding-right: 0px;
        } */
        #padd6{
            padding-right: 144px;
        }
        #padd7{
            padding-right: 57px;
        }
        #padd8{
            padding-right: 172px;
        }
        #padd9{
            padding-right: 200px;
        }

    </style>   
</head>
<body  class="form-body">

    <div class="container">
        <!-- <div class="head">New Document</div> -->
            <form action="" method="post">

                <div class="user-detail">
                    <div class="input-box">
                        <span class="detail" id="padd1">Port of B.E. filling</span>
                            <select  class="option" name="disportname">
                                <option value="">select value</option>
                                <?php
                                    while($row = mysqli_fetch_assoc($portname_qry)){
                                        echo "<option>".$row['portname']."</option>";
                                    }
                                ?>
                            </select>
                    </div> 
                    <div class="input-box">
                        <span class="detail" id="padd2">Port code of B.E. filling</span>
                            <select  class="option" name="disportcode">
                                <option value="">select value</option>
                                <?php
                                    while($row = mysqli_fetch_assoc($portcode_qry)){
                                        echo "<option>".$row['portcode']."</option>";
                                    }
                                ?>
                            </select>
                    </div>
                    <div class="input-box">
                        <span class="detail" id="padd3">Port of Shipment</span>
                            <select  class="option" name="loadport">
                                <option value="">select value</option>
                                <?php
                                    while($row = mysqli_fetch_assoc($port_qry)){
                                        echo "<option>".$row['portname']."</option>";
                                    }
                                ?>
                            </select>
                    </div>   
                    <div class="input-box">
                        <span class="detail" id="padd4">Country of Shipment</span>
                            <select  class="option" name="loadcountry">
                                <option value="">select value</option>
                                <?php
                                    while($row = mysqli_fetch_assoc($country_qry)){
                                        echo "<option>".$row['country']."</option>";
                                    }
                                ?>
                            </select>
                    </div> 
                        
                </div>

                <div class="deff">
                    <div class="input-box">
                        <span class="detail" id="padd5">HomeConspin(H)/WareHouse(W)/ExBond(X)</span>
                            <select class="option" name="hwx">
                                <option>select value</option>
                                <option>H</option>
                                <option>W</option>
                                <option>X</option>               
                            </select>                     
                    </div>
                    <div class="input-box">
                        <span class="detail" id="padd6">Goverment(G)/Others(P)</span>
                            <select class="option" name="gp">
                                <option>select value</option>
                                <option>G</option>
                                <option>P</option>
                            </select>                     
                    </div>
                    <div class="input-box">
                        <span class="detail" id="padd7">Normal(N)/Prior(P)/Advanced B.E.[A]</span>
                            <select class="option" name="npa">
                                <option value="">select value</option>
                                <option>N</option>
                                <option>Y</option>
                                <option>A</option>           
                            </select>                     
                    </div>
                    <div class="input-box">
                        <span class="detail" id="padd8">Green Channel [Y/N]</span>
                            <select class="option" name="greenchannel">
                                <option value="">select value</option>
                                <option>Y</option>
                                <option>N</option>
                            </select>                     
                    </div>
                    <div class="input-box">
                        <span class="detail" id="padd9">First Check [Y/N]</span>
                            <select class="option" name="firstcheck">
                                <option value="">select value</option>
                                <option>Y</option>
                                <option>N</option>
                            </select>                     
                    </div>
                </div>
                
                <div class="button">
                    <input type="submit" name="submit" value="SAVE">
                </div>
            </form>
    </div>

</body>
</html>