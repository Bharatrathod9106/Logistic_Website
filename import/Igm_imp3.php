<?php
    session_start();
    require 'connection.php';
    if(isset($_SESSION['username'])){
        
        $rate = "SELECT * FROM exchange";
        $rate_qry = mysqli_query($conn, $rate);

        $currencycode = "SELECT * FROM exchange";
        $code_qry = mysqli_query($conn, $currencycode);

        if(isset($_POST['submit'])){

            $invno = $_POST['invno'];
            $invdate = $_POST['invdate'];
            $naturet = $_POST['naturet'];
            $currency = $_POST['currency'];
            $exrate = $_POST['exrate'];
            $invvalue = $_POST['invvalue'];
            $terms = $_POST['terms'];
            $conditionatt = $_POST['conditionatt'];
            $valuemethod = $_POST['valuemethod'];

            // $sql = "select * from newdoc3";
            // $result = mysqli_query($conn,$sql);
            // $num = mysqli_num_rows($result);

            if($conn->connect_errno){
                die('connection Failed : '.$conn->connect_errno);
                //echo " ";
            }else{
                $stmt = $conn->prepare("insert into igm3(invno, invdate, naturet, currency, exrate, invvalue, terms, conditionatt, valuemethod) values(?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("sssssisss", $invno, $invdate, $naturet, $currency, $exrate, $invvalue, $terms, $conditionatt, $valuemethod);
                $stmt->execute();
                echo " ";
                $stmt->close();
                header('location:Igm_imp4.php');
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
        #padd1{
            padding-right: 83px;
        }
        #padd2{
            padding-right: 71px;
        }
        /* #padd3{
            padding-right: 0px;
        } */
        #padd4{
            padding-right: 40px;
        }
        #padd5{
            padding-right: 109px;
        }
        /* #padd6{
            padding-right: 0px;
        } */
        #padd7{
            padding-right: 116px;
        }
        /* #padd8{
            padding-right: 0px;
        }
        #padd9{
            padding-right: 0px;
        } */

       
        
    </style>   
</head>
<body  class="form-body">

    <div class="container">
        <div class="head">Invoice details</div>
            <form action="" method="post">

                <div class="user-detail">
                    <div class="input-box">
                        <span class="detail" id="padd1">Invoice No</span>
                        <input type="text" placeholder="Enter invoice no" required name="invno">
                    </div> 
                    <div class="input-box">
                        <span class="detail" id="padd2">Date</span>
                        <input type="date" placeholder="Enter date" required name="invdate">
                    </div>
                    <div class="input-box">
                        <span class="detail" id="padd3">Nature of transaction</span>
                            <select class="option" name="naturet">
                                <option value="">select velue</option>
                                <option>S sale</option>
                                <option>M Manafacture</option>
                            </select>
                    </div>   
                    <div class="input-box">
                        <span class="detail" id="padd4">Currency</span>
                            <select class="option" name="currency">
                                <option value="">select velue</option>
                                    <?php
                                        while($row = mysqli_fetch_assoc($code_qry)){
                                            echo "<option>".$row['currencycode']."</option>" ;
                                        }
                                    ?>
                            </select>
                    </div> 
                    <div class="input-box">
                        <span class="detail" id="padd5">Ex.rate</span>
                            <select class="option" name="exrate">
                                <option value="">select velue</option>
                                    <?php
                                        while($row = mysqli_fetch_assoc($rate_qry)){
                                            echo "<option>".$row['rate']."</option>" ;
                                        }
                                    ?>
                            </select>
                    </div>
                    <div class="input-box">
                        <span class="detail" id="padd6">Invoice value</span>
                        <input type="text"  placeholder="Enter invoice value" required name="invvalue">               
                    </div> 
                                        
                </div>
                <div class="deff">
                    <div class="input-box">
                        <span class="detail" id="padd7">Terms</span>
                            <select class="option" name="terms">
                                <option value="">select velue</option>
                                <option>FOB</option> 
                                <option>CF</option>
                                <option>CI</option>
                                <option>CIF</option>  
                            </select>
                    </div>   
                    <div class="input-box">
                        <span class="detail" id="padd8">Condition attached with sale </span>
                        <input type="text" placeholder="Enter condition" required name="conditionatt">                       
                    </div>
                    <div class="input-box">
                        <span class="detail" id="padd9">Valuation method applicable</span>
                            <select class="option" name="valuemethod">
                                <option value="">SELECT VALUE</option>
                                <option>RULE 4 - Transaction value</option>
                                <option>RULE 5 - Identical good</option>
                                <option>RULE 6 - Similar goods</option>
                                <option>Others</option>    
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