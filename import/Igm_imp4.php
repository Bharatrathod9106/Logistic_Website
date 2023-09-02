<?php
    session_start();
    require 'connection.php';
    if(isset($_SESSION['username'])){

        $ritccodede = "SELECT * FROM irtccode";
        $ritc_qry = mysqli_query($conn, $ritccodede);

        $ritcname = "SELECT * FROM irtccode";
        $ritcname_qry = mysqli_query($conn, $ritcname);

        $cname = "SELECT * FROM currency";
        $cname_qry = mysqli_query($conn, $cname);

        $unit = "SELECT * FROM unit";
        $unit_qry = mysqli_query($conn, $unit);

        $rate = "SELECT * FROM exchange";
        $rate_qry = mysqli_query($conn, $rate);

        if(isset($_POST['submit'])){

            $ritccode = $_POST['ritccode'];
            $productname = $_POST['productname'];
            $currency = $_POST['currency'];
            $unit = $_POST['unit'];
            $rate = $_POST['rate'];
            $per = $_POST['per'];
            $qty = $_POST['qty'];
            $totalv = $_POST['totalv'];
            $enduse = $_POST['enduse'];

            // $sql = "select * from newdoc3";
            // $result = mysqli_query($conn,$sql);
            // $num = mysqli_num_rows($result);

            if($conn->connect_errno){
                die('connection Failed : '.$conn->connect_errno);
                //echo " ";
            }else{
                $stmt = $conn->prepare("insert into igm4(ritccode, productname, currency, unit, rate, per, qty, totalv, enduse) values(?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("issssiiis", $ritccode, $productname, $currency, $unit, $rate, $per, $qty, $totalv, $enduse);
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
    <title>Invoice detaila</title>
    <link type="text/css" rel="stylesheet" href="transactionimp.css">
    <style>
        .option{

            /* padding: 1px; */
            padding-right: 15px;
            /* padding-left: 5px; */
            font-size: 14px;
        }
        .inputtt-box{
            padding-left: 10px;
            padding-bottom: 20px;
            font-family: sans-serif;
        }
        /* #padd1{
            padding-right: 0px;
        } */
        /* #padd2{
            padding-right: 0px;
        } */
        #padd3{
            padding-right: 22px;;
        }
        #padd4{
            padding-right: 84px;
        }
        #padd5{
            padding-right: 53px;
        }
        #padd6{
            padding-right:  89px;
        }
        #padd7{
            padding-right: 53px;
        }
        #padd8{
            padding-right: 36px;
        }
        #padd9{
            padding-right: 0px;
        }

    </style>       
</head>
<body  class="form-body">

    <div class="container">
        <div class="head">Invoice details</div>
            <form action="" method="post">

                <div class="user-detail">

                    <div class="input-box">
                        <span class="detail" id="padd1">RITC code</span>
                        <select class="option" name="ritccode">
                                <option value="">select value</option>
                                    <?php
                                        while($row = mysqli_fetch_assoc($ritc_qry)){
                                            echo "<option>".$row['irtccode']."</option>" ;
                                        }
                                    ?>
                            </select>
                    </div>
                    <div class="input-box">
                        <span class="detail" id="padd2">Product Name</span>
                        <select class="option" name="productname">
                                <option value="">select value</option>
                                    <?php
                                        while($row = mysqli_fetch_assoc($ritcname_qry)){
                                            echo "<option>".$row['name']."</option>" ;
                                        }
                                    ?>
                            </select>
                    </div>
                    <div class="input-box">
                        <span class="detail" id="padd3">Currency</span>
                        <select class="option" name="currency">
                                <option value="">select value</option>
                                    <?php
                                        while($row = mysqli_fetch_assoc($cname_qry)){
                                            echo "<option>".$row['currencyname']."</option>" ;
                                        }
                                    ?>
                            </select>
                    </div>   
                    <div class="input-box">
                        <span class="detail" id="padd4">Unit</span>
                        <select class="option" name="unit">
                                <option value="">select value</option>
                                    <?php
                                        while($row = mysqli_fetch_assoc($unit_qry)){
                                            echo "<option>".$row['unitcode']."</option>" ;
                                        }
                                    ?>
                            </select>
                    </div>
                    <div class="input-box">
                        <span class="detail" id="padd5">Rate</span>
                        <select class="option" name="rate">
                                <option value="">select value</option>
                                    <?php
                                        while($row = mysqli_fetch_assoc($rate_qry)){
                                            echo "<option>".$row['rate']."</option>" ;
                                        }
                                    ?>
                            </select>
                    </div>
                    <div class="input-box">
                        <span class="detail" id="padd6">per</span>
                        <input type="text" placeholder="Enter per" required name="per">
                    </div>
                    <div class="input-box">
                        <span class="detail" id="padd7">QTY</span>
                        <input type="text" placeholder="Enter quantity" required name="qty">
                    </div> 
                    <div class="input-box">
                        <span class="detail" id="padd8">Total value</span>
                        <input type="text" placeholder="Enter total value" required name="totalv">
                    </div>
                </div>

                <div class="inputtt-box">
                    <span class="detail" id="padd9">End use of item</span>
                    <select class="option" name="enduse">
                        <option value="">SELECT VALUE</option>
                        <option>-GNX 100 For trading-whalesale OR Retail</option>
                        <option>-GNX 200 FOr Manufacturer/Actual use</option>
                    </select>
                </div>   

            <div class="button">
                <input type="submit" name="submit" value="SAVE">
            </div>
        </form>
    </div>

</body>
</html>