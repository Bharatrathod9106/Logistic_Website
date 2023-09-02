<?php
session_start();
require 'connection.php';
if(isset($_SESSION['username'])){

        $iec = "SELECT * FROM exporter";
        $iec_qry = mysqli_query($conn, $iec);

        $consignee = "SELECT * FROM consignee";
        $consignee_qry = mysqli_query($conn, $consignee);

        if(isset($_POST['submit'])){

            $fileref = $_POST['fileref'];
            $docdate = $_POST['docdate'];
            $ieccode = $_POST['ieccode'];
            $branchh = $_POST['branchh'];
            $adcode = $_POST['adcode'];
            $gstnno = $_POST['gstnno'];
            $exporter = $_POST['exporter'];
            $eadd1 = $_POST['eadd1'];
            $ecity = $_POST['ecity'];
            $estate = $_POST['estate'];
            $importer = $_POST['importer'];
            $iadd1 = $_POST['iadd1'];
            $icity = $_POST['icity'];
            $icountry = $_POST['icountry'];
            
            // $sql = "select * from newdoc1";
            // $result = mysqli_query($conn,$sql);
            // $num = mysqli_num_rows($result);
    
            if($conn->connect_errno){
                die('connection Failed : '.$conn->connect_errno);
                //echo " ";
            }else{
                $stmt = $conn->prepare("insert into newdoc1(fileref, docdate, ieccode, branchh, adcode, gstnno, exporter, eadd1, ecity, estate, importer, iadd1, icity, icountry) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("ssisisssssssss", $fileref, $docdate, $ieccode, $branchh, $adcode, $gstnno, $exporter, $eadd1, $ecity, $estate, $importer, $iadd1, $icity, $icountry);
                $stmt->execute();
                echo " ";
                $stmt->close();
                header('location:Newdoc2.php');
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <!-- <script type="text/javascript" src="jquery-3.3.1.js"></script> -->

    <style>
        .option{

            /* padding: 1px; */
            padding-right: 15px;
            /* padding-left: 5px; */
            font-size: 14px;

        }

        /* #padd1{
            padding-right: 0px;
        } */
        #padd2{
            padding-right: 6px;
        }
        #padd3{
            padding-right: 70px
        }
        #padd4{
            padding-right: 31px;
        }
        #padd5{
            padding-right: 73px;
        }
        /* #padd6{
            padding-right: 0px;
        } */
        #padd7{
            padding-right: 77px;
        }
        #padd8{
            padding-right: 21px;
        }
        #padd9{
            padding-right:  110px;
        }
        #padd10{
            padding-right:  41px;
        }
        #padd11{
            padding-right: 78px;
        }
        #padd12{
            padding-right: 21px;
        }
        #padd13{
            padding-right: 110px;
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
                        <span class="detail" id="padd3"> IEC Code</span>
                            <select  class="option" name="ieccode" id="ieccode" onchange="getdata(this.options[this.selectedIndex].value)">
                                <option value="-1">Select IEC Code</option>
                                <?php
                                    while($row = mysqli_fetch_assoc($iec_qry)){
                                        echo "<option>".$row['iec']."</option>";
                                    }
                                ?>
                            </select>
                    </div>
                    <div class="input-box">
                        <span class="detail"id="padd4">Brs No</span>
                        <input type="text" placeholder="Branch Number" name="branchh" id="branch">
                    </div>   
                    <div class="input-box">
                        <span class="detail" id="padd5">AD Code</span>
                        <input type="text" placeholder="ADcode" name="adcode" id="adcode">

                    </div> 
                    <div class="input-box">
                        <span class="detail" id="padd6" >GSTN No</span>
                        <input type="text" placeholder="GSTN Number" name="gstnno" id="gstnno">

                    </div>
                    <div class="input-box">
                        <span class="detail" id="padd7">Exporter</span>
                        <input type="text" placeholder="Exporter" name="exporter" id="exporter">
                                
                    </div>
                    <div class="input-box">
                        <span class="detail" id="padd8">Address</span>
                        <input type="text" placeholder="Address" name="eadd1" id="eadd1">

                    </div>
                    <div class="input-box">
                        <span class="detail" id="padd9">City</span>
                        <input type="text" placeholder="City" name="ecity" id="ecity">

                    </div>
                    <div class="input-box">
                        <span class="detail" id="padd10">State</span>
                        <input type="text" placeholder="State" name="estate" id="estate">

                    </div>
                    <div class="input-box">
                        <span class="detail" id="padd11">Importer</span>
                            <select  class="option" name="importer" id="importer" onchange="getimporter(this.options[this.selectedIndex].value)">
                                <option value="-1">Select Value</option>
                                <?php
                                    while($row = mysqli_fetch_assoc($consignee_qry)){
                                        echo "<option>".$row['name']."</option>";
                                    }
                                ?>
                            </select>
                    </div> 
                    <div class="input-box">
                        <span class="detail" id="padd12">Address</span>
                        <input type="text" placeholder="Address" name="iadd1" id="iadd1">

                    </div>
                    <div class="input-box">
                        <span class="detail" id="padd13">City</span>
                        <input type="text" placeholder="City" name="icity" id="icity">

                    </div>
                    <div class="input-box">
                        <span class="detail" id="padd14">Country</span>
                        <input type="text" placeholder="Country" name="icountry" id="icountry">

                    </div>    
                </div>
                <div class="button">
                    <input type="submit" name="submit" value="NEXT">
                </div>
            </form>
    </div>

    <script>
        function getdata(ieccode){

            function getdata2(ieccode1){
            if(ieccode=='-1'){

                jQuery('#adcode').val('');
         
            }else{
                jQuery.ajax({
                    url:'getadcode.php',
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
                jQuery('#exporter').val('');
                jQuery('#eadd1').val('');
                jQuery('#ecity').val('');
                jQuery('#estate').val('');

            }else{
                jQuery.ajax({
                    url:'getdata.php',
                    type:'post',
                    data:'ieccode='+ieccode,
                    success:function(result){

                        var json_data = jQuery.parseJSON(result);
                        
                        jQuery('#branch').val(json_data.branch);
                        jQuery('#gstnno').val(json_data.gstn);
                        jQuery('#exporter').val(json_data.company_name);
                        jQuery('#eadd1').val(json_data.add1);
                        jQuery('#ecity').val(json_data.city);
                        jQuery('#estate').val(json_data.state);
                        
                    }

                })
            }
            getdata2(ieccode);
        }


        function getimporter(importer){
            if(importer=='-1'){

                jQuery('#iadd1').val('');
                jQuery('#icity').val('');
                jQuery('#icountry').val('');

            }else{
                jQuery.ajax({
                    url:'getimporter.php',
                    type:'post',
                    data:'&importer='+importer,
                    success:function(result){

                        var json_data = jQuery.parseJSON(result);

                       jQuery('#iadd1').val(json_data.add1);
                       jQuery('#icity').val(json_data.city);
                       jQuery('#icountry').val(json_data.country);

                        
                    }

                })
            }
        }

    </script>

</body>
</html> 