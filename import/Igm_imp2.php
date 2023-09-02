<?php
    session_start();
    require 'connection.php';
    if(isset($_SESSION['username'])){

        $currencycode = "SELECT * FROM exchange";
        $code_qry = mysqli_query($conn, $currencycode);

        $currencycode = "SELECT * FROM exchange";
        $ccode_qry = mysqli_query($conn, $currencycode);

        $currencycode = "SELECT * FROM exchange";
        $cccode_qry = mysqli_query($conn, $currencycode);

        $currencycode = "SELECT * FROM exchange";
        $ccccode_qry = mysqli_query($conn, $currencycode);

        if(isset($_POST['submit'])){

            $igmvalue = $_POST['igmvalue'];
            $igmc = $_POST['igmc'];
            $freight = $_POST['freight'];
            $frec = $_POST['frec'];
            $insuar = $_POST['insuar'];
            $insuarc = $_POST['insuarc'];
            $totalv = $_POST['totalv'];
            $totalc = $_POST['totalc'];
            $contno = $_POST['contno'];
            $sealno = $_POST['sealno'];
            $fl = $_POST['fl'];
            $type = $_POST['type'];

            // $sql = "select * from newdoc3";
            // $result = mysqli_query($conn,$sql);
            // $num = mysqli_num_rows($result);

            if($conn->connect_errno){
                die('connection Failed : '.$conn->connect_errno);
                //echo " ";
            }else{
                $stmt = $conn->prepare("insert into igm2(igmvalue, igmc, freight, frec, insuar, insuarc, totalv, totalc, contno, sealno, fl, type) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("isisisisssss", $igmvalue, $igmc, $freight, $frec, $insuar, $insuarc, $totalv, $totalc, $contno, $sealno, $fl, $type);
                $stmt->execute();
                echo " ";
                $stmt->close();
                header('location:Igm_imp3.php');
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
    <link type="text/css" rel="stylesheet" href="transactionimp.css"> 
    <style>
       
        .option{

            padding: 2px;
            padding-right: 53px;
            padding-left: 6px;
            font-size: 15px;
        }
        #padd1{
            padding-right: 42px;
        }
        #padd2{
            padding-right: 34px;
        }
        
    </style>

</head>

<body  class="form-body">

    <div class="container">
        <!-- <div class="head">Invoice Details</div> -->

            <form action="" method="post">
                <div class="charges">
                
                    <div class="heading">
                        <h3>Amount</h3>
                        <h3>Currency</h3>
                    </div>

                    <div class="user-detaill">
                        
                        <div class="inputt-box">
                            <span class="detaill">IGM Value</span>
                            <input type="text" placeholder="Enter IGM Value" required name="igmvalue">

                            <select class="option-in" name="igmc">
                                <option value="">select velue</option>
                                <?php
                                    while($row = mysqli_fetch_assoc($code_qry)){
                                        echo "<option>".$row['currencycode']."</option>" ;
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="inputt-box">
                            <span class="detaill1">Freight</span>
                            <input type="text" placeholder="Enter Freight" required name="freight">

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
                            <input type="text" placeholder="Enter Insurance" required name="insuar">
 
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
                            <input type="text" class="demo" placeholder="Enter Total Value" required name="totalv">
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

                <hr>

                <div class="user-detail">
                    <div class="input-box">
                        <span class="detail">Container No</span>
                        <input type="text" placeholder="Enter container no" required name="contno">
                    </div>
                    <div class="input-box">
                        <span class="detail">Seal No</span>
                        <input type="text" placeholder="Enter seal no" required name="sealno">
                    </div>
                    <div class="input-box">
                        <span class="detail" id="padd1">FCL/LCL</span>
                            <select class="option" name="fl">
                                <option value="">select value</option>
                                <option>FCL</option>
                                <option>LCL</option>
                            </select>
                    </div>
                    <div class="input-box">
                        <span class="detail" id="padd2">Type</span>
                            <select class="option" name="type">
                                <option value="">select value</option>
                                <option>20</option>
                                <option>40</option>
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