<?php

session_start();
require 'connection.php';
if(isset($_SESSION['username'])){

    @$jobno = $_POST['jobno'];

        $query1 = "SELECT * FROM impnewdoc1 WHERE jobno=$_POST[jobno]";
        $query2 = "SELECT * FROM impnewdoc2 WHERE jobno=$_POST[jobno]";
        $query3 = "SELECT * FROM igm1 WHERE jobno=$_POST[jobno]";
        $query4 = "SELECT * FROM igm2 WHERE jobno=$_POST[jobno]";
        $query5 = "SELECT * FROM igm3 WHERE jobno=$_POST[jobno]";
        $query6 = "SELECT * FROM igm4 WHERE jobno=$_POST[jobno]";
        // $query7 = "SELECT * FROM ann3 WHERE jobno=$_POST[jobno]";
        // $query8 = "SELECT * FROM adcode";

            
        $result1 = mysqli_query($conn,$query1);
        $result2 = mysqli_query($conn,$query2);
        $result3 = mysqli_query($conn,$query3);
        $result4 = mysqli_query($conn,$query4);
        $result5 = mysqli_query($conn,$query5);
        $result6 = mysqli_query($conn,$query6);
        // $result7 = mysqli_query($conn,$query7);
        // $result8 = mysqli_query($conn,$query8);

        $rows1 = mysqli_fetch_assoc($result1);
        $rows2 = mysqli_fetch_assoc($result2);
        $rows3 = mysqli_fetch_assoc($result3);
        $rows4 = mysqli_fetch_assoc($result4);
        $rows5 = mysqli_fetch_assoc($result5);
        $rows6 = mysqli_fetch_assoc($result6);
        // $rows7 = mysqli_fetch_assoc($result7);
        // $rows8 = mysqli_fetch_assoc($result8);

}else{
        
    header("location:newkrishna.html");
}


?>

<html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <link type="text/css" rel="stylesheet" href="invoicebill_imp.css">
    <style>
        
        .deff{
            padding-left: 10px;
            padding-bottom: 20px;
            font-family: sans-serif;
        }
        .option-in{

            padding: 5px;
            padding-right: 20px;
            padding-left: 120px;
            font-size: 17px;
        }

        .heading{

            display: flex ;
            padding-left:86px;
            padding-bottom:10px;   
        }
        h4{

            padding: 5px 56px;
        } 
    </style>
</head> 
<body class="form-body">
    <div  class="page" size="A4">

        <div class="container">
            <div class="head">
                <ul>
                    <li class="logo"><img src="logo/llogo.png"></li>
                    <li class="pp"> KRISHNA IMPEX PVT LTD.<br>(shiping bill Checklist)</li>
                </ul>    
            </div>

            <br>

                <form action="">

                    <div class="user-detail">
                        <div class="input-box">
                            <span class="detail">Ice gate job no : <?php echo $_POST['jobno'];?></span>            
                        </div>
                        <div class="input-box">
                            <span class="detail">Date :<?php echo $rows1['docdate'];?></span>
                        </div>
                        <div class="input-box">
                            <span class="detail">CHA : Krishna Impex </span>
                        </div>
                        <div class="input-box">
                            <span class="detail">Name : Krishna </span>
                        </div>
                        <div class="input-box">
                            <span class="detail">Port of be Filling : <?php echo $rows2['disportname'];?></span>
                        </div>
                        <div class="input-box">
                            <span class="detail">Port Code of be Filling : <?php echo $rows2['disportcode'];?></span>
                        </div>

                        <span class="detail">----------------------------------------------------------------
                            ---------------------------------------------------------------------------</span>

                        <div class="input-box">
                                <span class="detail">File ref No : <?php echo $rows1['fileref'];?></span>          
                        </div>
                        <div class="input-box">
                            <span class="detail">Doc Dte : <?php echo $rows1['docdate'];?></span>
                        </div>
                        <div class="input-box">
                            <span class="detail">BE Type : <?php echo $rows2['hwx'];?></span>
                        </div>
                        <div class="input-box">
                            <span class="detail">Govt / Private : <?php echo $rows2['gp'];?></span>
                        </div>
                        <div class="input-box">
                            <span class="detail">Prior BE : <?php echo $rows2['npa'];?></span>
                        </div>
                        <div class="input-box">
                            <span class="detail">Green channel : <?php echo $rows2['greenchannel'];?></span>
                        </div>
                        <div class="input-box">
                            <span class="detail">First check : <?php echo $rows2['firstcheck'];?></span>
                        </div>
                        <div class="input-box">
                            <span class="detail">Br.SrNo : <?php echo $rows1['branchh'];?></span>
                        </div> 
                    </div> 

                    <br>

                    <div class="user-detail"> 
                        <div class="input-box">
                           <b><span class="detail">CHA Details :</span></b>
                        </div>
                        <div class="input-box">
                           <b><span class="detail">Importer Details :</span></b>
                        </div>   
                        <div class="input-box">
                            <span class="detail">GSTN NO : 97AWRTH5471521475</span>
                        </div>
                        <div class="input-box">
                            <span class="detail">IEC Code :<?php echo $rows1['ieccode'];?></span>
                        </div>  
                        <div class="input-box">
                            <span class="detail">Name : Krishna</span>
                        </div>
                        <div class="input-box">
                            <span class="detail">Name : <?php echo $rows1['importer'];?></span>
                        </div> 
                        <div class="input-box">
                            <span class="detail">Address : 08 Jubilee Circle Bhuj </span>
                        </div> 
                        <div class="input-box">
                            <span class="detail">Address : <?php echo $rows1['iadd1'];?></span>
                        </div>          
                    </div>

                        <span class="detail">----------------------------------------------------------------
                            ---------------------------------------------------------------------------</span>
                        <div class="inputt-box">
                            <b><span class="detail">IGM Details--</span></b>
                        </div>

                    <div class="user-detail">
                        <div class="input-box">
                            <span class="detail">IGM No : <?php echo $rows3['igmno'];?></span>
                        </div>
                        <div class="input-box">
                            <span class="detail">IGM Date : <?php echo $rows3['igmdate'];?></span>
                        </div>
                        <div class="input-box">
                            <span class="detail">MBL No : <?php echo $rows3['mblno'];?></span>
                        </div>
                        <div class="input-box">
                            <span class="detail">MBL Date : <?php echo $rows3['mbldate'];?></span>
                        </div>
                        <div class="input-box">
                            <span class="detail">HBL No : <?php echo $rows3['hblno'];?></span>
                        </div>
                        <div class="input-box">
                            <span class="detail">HBL Date : <?php echo $rows3['hbldate'];?></span>
                        </div>
                        <div class="input-box">
                            <span class="detail">No of Packages : <?php echo $rows3['totalpac'];?></span>
                        </div>
                        <div class="input-box">
                            <span class="detail">Package Code : <?php echo $rows3['packcode'];?></span>
                        </div>
                        <div class="input-box">
                            <span class="detail">Gross Weight : <?php echo $rows3['grossweight'];?></span>
                        </div>
                        <div class="input-box">
                            <span class="detail">Unit : <?php echo $rows3['unit'];?></span>
                        </div>
                        <div class="input-box">
                            <span class="detail">Port of Shipment : <?php echo $rows2['loadport'];?></span>
                        </div>
                        <div class="input-box">
                            <span class="detail">Country of Shipment : <?php echo $rows2['loadcountry'];?></span>
                        </div>
                    </div>

                        <div class="inputt-box">
                            <span class="detail">Marks & Nos : <?php echo $rows3['marksnos'];?></span>
                        </div>
                        <span class="detail">----------------------------------------------------------------
                            ---------------------------------------------------------------------------</span>
                        <div class="inputt-box">
                            <b><span class="detail">Invoice Details--</span></b>
                        </div>

                        <br>

                    <div class="user-detail">
                        <div class="input-box">
                            <span class="detail">Invoice No : <?php echo $rows5['invno'];?></span>            
                        </div>
                        
                        <div class="input-box">
                            <b><span class="detail">Supplier Details--</span></b>
                        </div>
                        <div class="input-box">
                            <span class="detail">Date : <?php echo $rows5['invdate'];?></span>
                        </div>
                        <div class="input-box">
                            <span class="detail">Name : <?php echo $rows1['supplier'];?> </span>
                        </div>
                        <div class="input-box">
                            <span class="detail">Invoice value : <?php echo $rows5['invvalue'];?></span>
                        </div>
                        <div class="input-box">
                            <span class="detail">Address : <?php echo $rows1['sadd1'];?></span>
                        </div>
                    </div>

                        <div class="inputt-box">
                            <span class="detail">Invoice Currency : <?php echo $rows5['currency'];?></span>
                        </div>
                        <div class="inputt-box">
                            <span class="detail">Invoice terms : <?php echo $rows5['terms'];?></span>
                        </div>
                        <div class="inputt-box">
                            <span class="detail">Ex.Rate : Nature of Transaction : <?php echo $rows5['naturet'];?></span>
                        </div>
                        <div class="inputt-box">
                            <span class="detail">Condition Attached with sale : <?php echo $rows5['conditionatt'];?></span>
                        </div>
                        <div class="inputt-box">
                            <span class="detail">Valuation method applicable : <?php echo $rows5['valuemethod'];?></span>
                        </div>
                            
                        <br>
                        <br>

                    <div class="charges">

                        <div class="heading">
                            <h4>Amount</h4>
                            <h4>Currency</h4>
                        </div>

                        <div class="user-detaill"> 
                            <div class="inputt-box">
                                <span class="detaill">IGM Value : </span>
                                <?php echo $rows4['igmvalue'];?>
                                <span class="option-in"></span><?php echo $rows4['igmc'];?>
                            </div>
                            <div class="inputt-box">
                                <span class="detaill1">Freight :</span>
                                <?php echo $rows4['freight'];?>
                                <span class="option-in"><?php echo $rows4['frec'];?></span>
                            </div>
                            <div class="inputt-box">
                                <span class="detaill2">Insurance :</span>
                                <?php echo $rows4['insuar'];?>
                                <span class="option-in"><?php echo $rows4['insuarc'];?></span>
                            </div>
                            <div class="inputt-box">
                                <span id="demo" class="detaill3">Total value : </span>
                                <?php echo $rows4['totalv'];?>
                                <span class="option-in"><?php echo $rows4['totalc'];?></span>
                            </div>
                        </div>
                    </div>

                        <span class="detail">----------------------------------------------------------------
                            ---------------------------------------------------------------------------</span>
                        <div class="inputt-box">
                            <b><span class="detail">Item of Export--</span></b>
                        </div>

                    <div class="user-detail">
                        <div class="input-box">
                            <span class="detail">RITC Code : <?php echo $rows6['ritccode'];?></span>            
                        </div>
                        
                        <div class="input-box">
                            <span class="detail">Product Name :  <?php echo $rows6['productname'];?></span>
                        </div>
                        <div class="input-box">
                            <span class="detail">Currency : <?php echo $rows6['currency'];?></span>
                        </div>
                        <div class="input-box">
                            <span class="detail">Unit : <?php echo $rows6['unit'];?></span>
                        </div>
                        <div class="input-box">
                            <span class="detail">Rate : <?php echo $rows6['rate'];?></span>
                        </div>
                        <div class="input-box">
                            <span class="detail">Per : <?php echo $rows6['per'];?></span>
                        </div>
                        <div class="input-box">
                            <span class="detail">Total Quantity : <?php echo $rows6['qty'];?></span>
                        </div>
                        <div class="input-box">
                            <span class="detail">Total value : <?php echo $rows6['totalv'];?></span>
                        </div>
                    </div>
                    
                        <div class="inputt-box">
                            <span class="detail">End use of item : <?php echo $rows6['enduse'];?></span>
                        </div>
                        <span class="detail">----------------------------------------------------------------
                            ---------------------------------------------------------------------------</span>

                    <div class="user-detail">
                        <div class="input-box">
                            <span class="detail">Container No : <?php echo $rows4['contno'];?></span>            
                        </div>
                        
                        <div class="input-box">
                            <span class="detail">Seal No : <?php echo $rows4['sealno'];?></span>
                        </div>
                        <div class="input-box">
                            <span class="detail">FCL/LCL : <?php echo $rows4['fl'];?></span>
                        </div>
                        <div class="input-box">
                            <span class="detail">Type : <?php echo $rows4['type'];?></span>
                        </div>
                    </div>

                </form>
        </div> 
    </div>
</body>
</html>