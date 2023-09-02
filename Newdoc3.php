<?php
session_start();
require 'connection.php';
if(isset($_SESSION['username'])){
        $currencyname = "SELECT * FROM currency";
        $currency_qry = mysqli_query($conn, $currencyname);

        $rate = "SELECT * FROM exchange";
        $rate_qry = mysqli_query($conn, $rate);

        $currencycode = "SELECT * FROM exchange";
        $code_qry = mysqli_query($conn, $currencycode);

        $currencycode = "SELECT * FROM exchange";
        $ccode_qry = mysqli_query($conn, $currencycode);

        $currencycode = "SELECT * FROM exchange";
        $cccode_qry = mysqli_query($conn, $currencycode);

        $currencycode = "SELECT * FROM exchange";
        $ccccode_qry = mysqli_query($conn, $currencycode);

        if(isset($_POST['submit'])){

            $invno = $_POST['invno'];
            $invdate = $_POST['invdate'];
            $invcur = $_POST['invcur'];
            $exrate = $_POST['exrate'];
            $payment = $_POST['payment'];
            $periodof = $_POST['periodof'];
            $contract = $_POST['contract'];
            $invvalue = $_POST['invvalue'];
            $invc = $_POST['invc'];
            $freight = $_POST['freight'];
            $frec = $_POST['frec'];
            $insuar = $_POST['insuar'];
            $insuarc = $_POST['insuarc'];
            $totalv = $_POST['totalv'];
            $totalc = $_POST['totalc'];

            $sql = "select * from newdoc3";
            $result = mysqli_query($conn,$sql);
            $num = mysqli_num_rows($result);
    
            if($conn->connect_errno){
                die('connection Failed : '.$conn->connect_errno);
                //echo " ";
            }else{
                $stmt = $conn->prepare("insert into newdoc3(invno, invdate, invcur, exrate, payment, periodof, contract, invvalue, invc, freight, frec, insuar, insuarc, totalv, totalc) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("sssisssisisisis", $invno, $invdate, $invcur, $exrate, $payment, $periodof, $contract, $invvalue, $invc, $freight, $frec, $insuar, $insuarc, $totalv, $totalc);
                $stmt->execute();
                echo " ";
                $stmt->close();
                header('location:Newdoc4.php');
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
        .deff{
            padding-left: 10px;
            padding-bottom: 20px;
            font-family: sans-serif;
        }
        .option{

            padding: 2px;
            padding-right: 20px;
            padding-left: 6px;
            font-size: 15px;
        }

        /* #padd1{
            padding-right: 0px;    
        } */
        #padd2{
            padding-right: 0px;    
        }
        #padd3{
            padding-right: 24px;    
        }
        #padd4{
            padding-right: 32px;   
        }
        /* #padd5{
            padding-right: 0px;    
        } */
        /* #padd6{
            padding-right: 0px;    
        } */
        #padd7{
            padding-right: 13px;    
        }
        
    </style>

</head>

<body  class="form-body">

    <div class="container">
        <div class="head">Invoice Details</div>

            <form action="" method="post">

                <div class="user-detail">
                    <div class="input-box">
                        <span class="detail" id="padd1">Invoice No</span>
                        <input type="text" placeholder="Enter invoice no" required name="invno">
                    </div>
                    <div class="input-box">
                        <span class="detail" id="padd2">Invoice Date</span>
                        <input type="date" placeholder="Enter invoice date" required name="invdate">
                    </div>
                    <div class="input-box">
                        <span class="detail" id="padd3">Invoice Currency</span>
                            <select class="option" name="invcur">
                                <option value="">select value</option>
                                <?php
                                    while($row = mysqli_fetch_assoc($currency_qry)){
                                        echo "<option>".$row['currencyname']."</option>" ;
                                    }
                                ?>
                            </select>
                    </div>
                    <div class="input-box">
                        <span class="detail" id="padd4">Ex.Rate</span>
                            <select class="option" name="exrate">
                                <option value="">select value</option>
                                <?php
                                    while($row = mysqli_fetch_assoc($rate_qry)){
                                        echo "<option>".$row['rate']."</option>" ;
                                    }
                                ?>
                            </select>
                    </div>   
                    <div class="input-box">
                        <span class="detail" id="padd5">Nature of Payment</span>
                            <select class="option" name="payment">
                                <option>Select Option</option>
                                <option>AP</option>
                                <option>DP</option>
                                <option>NA</option>
                                <option>DA</option>
                                <option>LC</option>
                            </select>
                    </div> 
                    <div class="input-box">
                        <span class="detail" id="padd6">Period of Payment</span>
                        <input type="text" placeholder="Enter period payment" required name="periodof">   
                    </div>
                </div>

                <div class="deff">
                    <span class="detail" id="padd7">Nature of Contract</span>
                        <select class="option" name="contract">
                            <option>Select Option</option>
                            <option>CF</option>
                            <option>CI</option>
                            <option>CIF</option>
                            <option>FOB</option>
                        </select>
                </div>  
                
                <div class="charges">
                    
                    <hr>
                    <div class="heading">
                        <h3>Amount</h3>
                        <h3>Currency</h3>
                    </div>

                    <div class="user-detaill">
                        
                        <div class="inputt-box">
                            <span class="detaill">Invoice Value</span>
                            <input type="text" placeholder="Enter" required name="invvalue">
                            <!-- <input type="text" placeholder="Enter" required> -->
                            <select class="option-in" name="invc">
                                <option value="" >select velue</option>
                                <?php
                                    while($row = mysqli_fetch_assoc($code_qry)){
                                        echo "<option>".$row['currencycode']."</option>" ;
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="inputt-box">
                            <span class="detaill1">Freight</span>
                            <input type="text" placeholder="Enter" required name="freight">
                            <!-- <input type="text" placeholder="Enter" required> -->
                            <select class="option-in" name="frec">
                                <option value="">select velue</option>
                                <?php
                                    while($row = mysqli_fetch_assoc($ccode_qry)){
                                        echo "<option>".$row['currencycode']."</option>" ;
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="inputt-box">
                            <span class="detaill2">Insurance</span>
                            <input type="text" placeholder="Enter" required name="insuar">
                            <select class="option-in" name="insuarc">
                                <option value="">select velue</option>
                                <?php
                                    while($row = mysqli_fetch_assoc($cccode_qry)){
                                        echo "<option>".$row['currencycode']."</option>" ;
                                    }
                                ?>
                            </select>
                        </div>
                        <!-- <div>
                            <input type="button" name="calculate" value="Calculate">
                        </div> -->
                        <div class="inputt-box">
                            <span id="demo" class="detaill3">Total value</span>
                            <input type="text" class="demo" placeholder="Enter" required name="totalv">
                            <select class="option-in" name="totalc">
                                <option  value="">select velue</option>
                                <?php
                                    while($row = mysqli_fetch_assoc($ccccode_qry)){
                                        echo "<option>".$row['currencycode']."</option>" ;
                                    }
                                ?>
                            </select>
                        </div>

                    </div>
                </div>

                <div class="button">
                    <input type="submit" name="submit" value="NEXT">
                </div>
            </form>
    </div>

</body>
</html>