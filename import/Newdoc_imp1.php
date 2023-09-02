<?php

session_start();
require 'connection.php';
if(isset($_SESSION['username'])){

        $iec = "SELECT * FROM importer";
        $iec_qry = mysqli_query($conn, $iec);

        $name = "SELECT * FROM supplier";
        $name_qry = mysqli_query($conn,$name);

        if(isset($_POST['submit'])){

            $fileref = $_POST['fileref'];
            $docdate = $_POST['docdate'];
            $ieccode = $_POST['ieccode'];
            $branchh = $_POST['branchh'];
            $adcode = $_POST['adcode'];
            $gstnno = $_POST['gstnno'];
            $importer = $_POST['importer'];
            $iadd1 = $_POST['iadd1'];
            $icity = $_POST['icity'];
            $istate = $_POST['istate'];
            $supplier = $_POST['supplier'];
            $sadd1 = $_POST['sadd1'];
            $scity = $_POST['scity'];
            $scountry = $_POST['scountry'];
            
            if($conn->connect_errno){
                die('connection Failed : '.$conn->connect_errno);
                //echo " ";
            }else{
                $stmt = $conn->prepare("insert into impnewdoc1(fileref, docdate, ieccode, branchh, adcode, gstnno, importer, iadd1, icity, istate, supplier, sadd1, scity, scountry) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("ssisisssssssss", $fileref, $docdate, $ieccode, $branchh, $adcode, $gstnno, $importer, $iadd1, $icity, $istate, $supplier, $sadd1, $scity, $scountry);
                $stmt->execute();
                echo " ";
                $stmt->close();
                header('location:Newdoc_imp2.php');
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> 
    <style>
        .option{

            padding: 2px;
            padding-right: 63px;
            /* padding-left: 5px; */
            font-size: 14px;
        }

        #padd1{
            padding-right: 0px;
        }
        #padd2{
            padding-right: 6px;
        }
        #padd3{
            padding-right: 61px;
        }
        #padd4{
            padding-right: 31px;
        }
        #padd5{
            padding-right: 66px;
        }
        /* #padd6{
            padding-right: 0px;
        } */
        #padd7{
            padding-right: 70px;
        }
        #padd8{
            padding-right:  20px;
        }
        #padd9{
            padding-right: 102px
        }
        #padd10{
            padding-right:  41px;
        }
        #padd11{
            padding-right: 70px;
        }
        #padd12{
            padding-right: 20px;
        }
        #padd13{
            padding-right: 101px;
        }
        #padd14{
            padding-right: 23px;
        }
    
    </style>    
</head>
<body  class="form-body">

    <div class="container">
        <div class="head">New Document</div>
            <form action="" method="post">

                <div class="user-detail">
                    <div class="input-box">
                        <span class="detail" id="padd1">File Reference No</span>
                        <input type="text" placeholder="Enter File Reference" required name="fileref">
                    </div>
                    <div class="input-box">
                        <span class="detail" id="padd2">DOC Date</span>
                        <input type="date" placeholder="Enter the Number" required name="docdate">
                    </div>
                    <div class="input-box">
                        <span class="detail" id="padd3">IEC Code</span>
                            <select  class="option" name="ieccode" id="ieccode" onchange="getimp(this.options[this.selectedIndex].value)"> 
                                <option value="">select value</option>
                                <?php
                                    while($row = mysqli_fetch_assoc($iec_qry)){
                                        echo "<option>".$row['iec']."</option>";
                                    }
                                ?>
                            </select>
                    </div>
                    <div class="input-box">
                        <span class="detail" id="padd4">Brs No</span>
                            <input type="text" placeholder="Branch" name="branchh" id="branch">
                    </div>   
                    <div class="input-box">
                        <span class="detail" id="padd5">AD Code</span>
                            <input type="text" placeholder="ADcode" name="adcode" id="adcode">
                    </div> 
                    <div class="input-box">
                        <span class="detail" id="padd6">GSTN No</span>
                            <input type="text" placeholder="GSTN Number" name="gstnno" id="gstnno">
                    </div>
                    <div class="input-box">
                        <span class="detail" id="padd7">Importer</span>
                            <input type="text" placeholder="Importer" name="importer" id="importer">
                    </div>
                    <div class="input-box">
                        <span class="detail" id="padd8">Address</span>
                            <input type="text" placeholder="Address" name="iadd1" id="iadd1">
                    </div>
                    <div class="input-box">
                        <span class="detail" id="padd9">City</span>
                            <input type="text" placeholder="City" name="icity" id="icity">
                    </div>
                    <div class="input-box">
                        <span class="detail" id="padd10">State</span>
                            <input type="text" placeholder="State" name="istate" id="istate">
                    </div>
                    <div class="input-box">
                        <span class="detail" id="padd11">Supplier</span>
                            <select  class="option" name="supplier" id="supplier" onchange="getsupplier(this.options[this.selectedIndex].value)">
                                <option value="">Select Value</option>
                                <?php
                                    while($row = mysqli_fetch_assoc($name_qry)){
                                        echo "<option>".$row['name']."</option>";
                                    }
                                ?>
                            </select>
                    </div> 
                    <div class="input-box">
                        <span class="detail" id="padd12">Address</span>
                            <input text="type" placeholder="Supplier Add" name="sadd1" id="sadd1">
                    </div>
                    <div class="input-box">
                        <span class="detail" id="padd13">City</span>
                            <input type="text" placeholder="Supplier City" name="scity" id="scity">
                    </div>
                    <div class="input-box">
                        <span class="detail" id="padd14">Country</span>
                            <input type="text" placeholder="Supplier Country" name="scountry" id="scountry">
                    </div>    
                </div>
                <div class="button">
                    <!-- <a href="Newdoc2.php">
                    <input type="button" name="submit" value="NEXT"></a>  -->
                    <input type="submit" name="submit" value="NEXT">
                </div>
            </form>
    </div>

    <script>

        function getimp(ieccode){

            function getimp2(ieccode1){
            if(ieccode=='-1'){

                jQuery('#adcode').val('');
         
            }else{
                jQuery.ajax({
                    url:'getimporteradcode.php',
                    type:'post',
                    data:'ieccode='+ieccode,
                    success:function(result){

                        var json_data = jQuery.parseJSON(result);


                        jQuery('#adcode').val(json_data.bankcode);
                        
                        }
                    })
                }
            }
            if(ieccode=='-1'){

                jQuery('#branch').val('');
                jQuery('#gstnno').val('');
                jQuery('#importer').val('');
                jQuery('#iadd1').val('');
                jQuery('#icity').val('');
                jQuery('#istate').val('');

            }else{
                jQuery.ajax({
                    url:'getimporterdata.php',
                    type:'post',
                    data:'ieccode='+ieccode,
                    success:function(result){

                        var json_data = jQuery.parseJSON(result);
                        
                        jQuery('#branch').val(json_data.branch);
                        jQuery('#gstnno').val(json_data.gstn);
                        jQuery('#importer').val(json_data.company_name);
                        jQuery('#iadd1').val(json_data.add1);
                        jQuery('#icity').val(json_data.city);
                        jQuery('#istate').val(json_data.state);
                        
                    }

                })
            }
            getimp2(ieccode);
        }

        function getsupplier(supplier){
            
            if(supplier=='-1'){

                jQuery('#sadd1').val('');
                jQuery('#scity').val('');
                jQuery('#scountry').val('');

            }else{
                jQuery.ajax({
                    url:'getsupplier.php',
                    type:'post',
                    data:'&supplier='+supplier,
                    success:function(result){

                        var json_data = jQuery.parseJSON(result);

                       jQuery('#sadd1').val(json_data.add1);
                       jQuery('#scity').val(json_data.city);
                       jQuery('#scountry').val(json_data.country);

                        
                    }

                })
            }
        }
        
        </script>

</body>
</html> 