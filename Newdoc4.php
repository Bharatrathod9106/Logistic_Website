<?php
session_start();
require 'connection.php';
if(isset($_SESSION['username'])){

        $unit = "SELECT * FROM unit";
        $unit_qry = mysqli_query($conn, $unit);

        $irtccode = "SELECT * FROM irtccode";
        $irtc_qry = mysqli_query($conn, $irtccode);

        $name = "SELECT * FROM irtccode";
        $name_qry = mysqli_query($conn, $name);

        $rate = "SELECT * FROM exchange";
        $rate_qry = mysqli_query($conn, $rate);

        if(isset($_POST['submit'])){

            $scode = $_POST['scode'];
            $ritccode = $_POST['ritccode'];
            $proname = $_POST['proname'];
            $unit = $_POST['unitt'];
            $rate = $_POST['ratee'];
            $per = $_POST['per'];
            $qty = $_POST['qty'];
            $totalval = $_POST['totalval'];
            $enduse = $_POST['enduse'];
            
            $sql = "select * from newdoc4";
            $result = mysqli_query($conn,$sql);
            $num = mysqli_num_rows($result);
    
            if($conn->connect_errno){
                die('connection Failed : '.$conn->connect_errno);
                //echo " ";
            }else{
                $stmt = $conn->prepare("insert into newdoc4(scode, ritccode, proname, unit, rate, per, qty, totalval, enduse) values(?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("sissiiiis", $scode, $ritccode, $proname, $unit, $rate, $per, $qty, $totalval, $enduse);
                $stmt->execute();
                echo " ";
                $stmt->close();
                header('location:Export.php');
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
    <title>New Document</title>
    <link type="text/css" rel="stylesheet" href="transaction.css">
    <style>
        .option{

            padding: 2px;
            padding-right: 15px;
            /* padding-left: 5px; */
            font-size: 14px;
        }
        .inputtt-box{
            padding-left: 10px;
            padding-bottom: 20px;
            font-family: sans-serif;
        }

        #padd1{
            padding-right: 15px;    
        }
        #padd2{
            padding-right: 13px;   
        }
        /* #padd3{
            padding-right: 0px;    
        } */
        #padd4{
            padding-right:  60px;    
        }
        #padd5{
            padding-right: 78px;    
        }
        #padd6{
            padding-right: 63px;    
        }
        #padd7{
            padding-right: 79px;   
        }
        /* #padd8{
            padding-right: 0px;    
        } */
        #padd9{
            padding-right: 0px;    
        }
    </style>       
</head>
<body  class="form-body">

    <div class="container">
            <form action="" method="post">

                <div class="user-detail">

                    <div class="input-box">
                        <span class="detail" id="padd1">Scheme code</span>
                            <select class="option" name="scode">
                                <option>Select Option</option>
                                <option>OO--Free Shipping Bill</option>
                            </select>
                    </div>
                    <div class="input-box">
                        <span class="detail" id="padd2">RITC code</span>
                            <select class="option" name="ritccode">
                                <option value="">select value</option> 
                                <?php
                                    while($row = mysqli_fetch_assoc($name_qry)){
                                        echo "<option>".$row['irtccode']."</option>" ;
                                    }
                                ?>  
                            </select>
                    </div>
                    <div class="input-box">
                        <span class="detail" id="padd3">Product Name</span>
                            <select class="option" name="proname">
                                <option value="">select value</option>
                                <?php
                                    while($row = mysqli_fetch_assoc($irtc_qry)){
                                        echo "<option>".$row['name']."</option>" ;
                                    }
                                ?>
                            </select>
                    </div>   
                    <div class="input-box">
                        <span class="detail" id="padd4">Unit</span>
                            <select class="option" name="unitt">
                                <option value="">select value</option> 
                                <?php
                                    while($row = mysqli_fetch_assoc($unit_qry)){
                                        echo "<option>".$row['unit']."</option>" ;
                                    }
                                ?>  
                            </select>
                    </div>
                    <div class="input-box">
                        <span class="detail" id="padd5">Rate</span>
                        <select class="option" name="ratee">
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
                        <input type="text" placeholder="Enter total value" required name="totalval">
                    </div>
                </div>

                <div class="inputtt-box">
                    <span class="detail" id="padd9">End use of item</span>
                    <select class="option" name="enduse">
                        <option>SELECT</option>
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