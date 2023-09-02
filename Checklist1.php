<?php

session_start();
require 'connection.php';
if(isset($_SESSION['username'])){

    require('pdf/vendor/autoload.php');

    @$jobno = $_POST['jobno'];

    // $query = "SELECT * FROM  newdoc1, newdoc2, newdoc3, newdoc4, ann1, ann2, ann3 WHERE jobno=$_POST[jobno]";

    // // echo $query;

    // $result = mysqli_query($conn,$query);

    // $rows = mysqli_fetch_array($result);

    $query1 = "SELECT * FROM newdoc1 WHERE jobno=$_POST[jobno]";
    $query2 = "SELECT * FROM newdoc2 WHERE jobno=$_POST[jobno]";
    $query3 = "SELECT * FROM newdoc3 WHERE jobno=$_POST[jobno]";
    $query4 = "SELECT * FROM newdoc4 WHERE jobno=$_POST[jobno]";
    $query5 = "SELECT * FROM ann1 WHERE jobno=$_POST[jobno]";
    $query6 = "SELECT * FROM ann2 WHERE jobno=$_POST[jobno]";
    $query7 = "SELECT * FROM ann3 WHERE jobno=$_POST[jobno]";
    $query8 = "SELECT * FROM adcode";

        
    $result1 = mysqli_query($conn,$query1);
    $result2 = mysqli_query($conn,$query2);
    $result3 = mysqli_query($conn,$query3);
    $result4 = mysqli_query($conn,$query4);
    $result5 = mysqli_query($conn,$query5);
    $result6 = mysqli_query($conn,$query6);
    $result7 = mysqli_query($conn,$query7);
    $result8 = mysqli_query($conn,$query8);

    $rows1 = mysqli_fetch_assoc($result1);
    $rows2 = mysqli_fetch_assoc($result2);
    $rows3 = mysqli_fetch_assoc($result3);
    $rows4 = mysqli_fetch_assoc($result4);
    $rows5 = mysqli_fetch_assoc($result5);
    $rows6 = mysqli_fetch_assoc($result6);
    $rows7 = mysqli_fetch_assoc($result7);
    $rows8 = mysqli_fetch_assoc($result8);

    // $mpdf = new \Mpdf\Mpdf();
    // $html = "Hello World";
    // $mpdf->WriteHTML($html);
    // $file=time().'.pdf';
    // $mpdf->Output($file,'I');

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
    <link type="text/css" rel="stylesheet" href="invoicebill.css">
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
                    <li class="pp"> KRISHNA IMPEX PVT LTD.<br>(shipping bill Checklist)</li>
                </ul>
                
            </div>
            <br>

                <form action="">
                    <div class="user-detail">

                        <div class="input-box">
                            <span class="detail">Ice gate job no : <?php echo $_POST['jobno'];?> </span>            
                        </div>
                        
                        <div class="input-box">
                            <span class="detail">Date : <?php echo $rows1['docdate'];?></span>
                        </div>

                        <div class="input-box">
                            <span class="detail">CHA : KRISHNA IMPEX PVT LTD.</span>
                        </div>

                        <div class="input-box">
                            <span class="detail">Name :KRISHNA IMPEX</span>
                        </div>
                        <div class="input-box">
                            <span class="detail">Port of loading :  <?php echo $rows2['loadport'];?></span>
                        </div>

                        <div class="input-box">
                            <span class="detail">State of export :  <?php echo $rows1['estate'];?></span>
                        </div>
                        <span class="detail">----------------------------------------------------------------
                                ---------------------------------------------------------------------------</span>

                    
                        <div class="input-box">
                                <b><span class="detail">Exporter Details</span></b>           
                        </div>

                        <div class="input-box">
                            <b><span class="detail">Consignee Details</span></b>
                        </div>

                        <div class="input-box">
                            <span class="detail">IEC : <?php echo $rows1['ieccode'];?></span>
                        </div>

                        <div class="input-box">
                            <span class="detail">Name : <?php echo $rows1['importer'];?></span>
                        </div>
                        <div class="input-box">
                            <span class="detail">Name : <?php echo $rows1['exporter'];?></span>
                        </div>

                        <div class="input-box">
                            <span class="detail">Address : <?php echo $rows1['iadd1'];?></span>
                        </div>

                        <div class="input-box">
                            <span class="detail">Address : <?php echo $rows1['eadd1'];?></span>
                        </div>
                        <div class="input-box">
                            <span class="detail">City : <?php echo $rows1['icity'];?></span>
                        </div>
                        <div class="input-box">
                            <span class="detail">City : <?php echo $rows1['ecity'];?></span>
                        </div>
                        <div class="input-box">
                            <span class="detail">Country : <?php echo $rows1['icountry'];?></span>
                        </div>       
                    </div>

                        <div class="inputt-box">
                            <span class="detail">State : <?php echo $rows1['estate'];?></span>
                        </div>
                        <div class="inputt-box">
                            <span class="detail">GSTN No : <?php echo $rows1['gstnno'];?></span>
                        </div>

                        <br>
                    
                    <div class="user-detail">

                        <div class="input-box">
                                <span class="detail">Type of Exporter : <?php echo $rows2['etype'];?></span>          
                        </div>

                        <div class="input-box">
                            <span class="detail">Manufacture/Merchant : <?php echo $rows2['mm'];?></span>
                        </div>

                        <div class="input-box">
                            <span class="detail">Poat of Dischange : <?php echo $rows2['disport'];?></span>
                        </div>

                        <div class="input-box">
                            <span class="detail">Marks/Nos : <?php echo $rows2['description'];?></span>
                        </div>
                        <div class="input-box">
                            <span class="detail">Port of final Destination : <?php echo $rows2['finalport'];?></span>
                        </div>

                        <div class="input-box">
                            <span class="detail">Country of final Destination : <?php echo $rows2['finalcon'];?></span>
                        </div>

                        <div class="input-box">
                            <span class="detail">Total packages : <?php echo $rows5['totalpac'];?></span>
                        </div>
                        <div class="input-box">
                            <span class="detail">Loos packates : <?php echo $rows5['loosepac'];?></span>
                        </div>
                        <div class="input-box">
                            <span class="detail">Gross Weight : <?php echo $rows5['grosswei'];?></span>
                        </div>
                        <div class="input-box">
                            <span class="detail">Net Weight : <?php echo $rows5['netwei'];?></span>
                        </div>
                        <div class="input-box">
                            <span class="detail">Number of Containers : <?php echo $rows5['contano'];?></span>
                        </div>
                        <div class="input-box">
                            <span class="detail">Nature of Cargo : <?php echo $rows5['naturec'];?></span>
                        </div>
                        <div class="input-box">
                            <span class="detail">Unit of Measurement : <?php echo $rows5['unit'];?></span>
                        </div>
                        <div class="input-box">
                            <span class="detail">Seal Type : <?php echo $rows5['sealtype'];?></span>
                        </div>
                        <div class="input-box">
                            <span class="detail">AD Code : <?php echo $rows1['adcode'];?></span>
                        </div>
                        <div class="input-box">
                            <span class="detail">Bank A/C Number : <?php echo $rows8['acno'];?></span>
                        </div>
                        <span class="detail">----------------------------------------------------------------
                             ---------------------------------------------------------------------------</span>  
                    </div>
                    
                        <div class="inputt-box">
                                <b><span class="detail">Invoice Details--</span></b>
                        </div>

                    <div class="user-detail">

                        <div class="input-box">
                                <span class="detail">File-Refference No : <?php echo $rows1['fileref'];?></span>          
                        </div>

                        <div class="input-box">
                            <span class="detail">Date : <?php echo $rows1['docdate'];?></span>
                        </div>

                        <div class="input-box">
                            <span class="detail">Invoice No : <?php echo $rows3['invno'];?></span>
                        </div>

                        <div class="input-box">
                            <span class="detail">Invpoice Date : <?php echo $rows3['invdate'];?></span>
                        </div>
                        <div class="input-box">
                            <span class="detail">Nature of Contract : <?php echo $rows3['contract'];?></span>
                        </div>

                        <div class="input-box">
                            <span class="detail">Nature of Payment : <?php echo $rows3['payment'];?></span>
                        </div>
                    </div>
                        
                        <div class="inputt-box">
                            <span class="detail">Period of Agreement : <?php echo $rows3['periodof'];?></span>
                        </div>

                    <div class="user-detail">

                        <div class="input-box">
                            <span class="detail">Currency Code : <?php echo $rows3['invc'];?></span>
                        </div>

                        <div class="input-box">
                            <span class="detail">Exchange Rate : <?php echo $rows3['exrate'];?></span>
                        </div>
                        
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
                                <span class="detaill">Invoice Value :</span>
                                <?php echo $rows3['invvalue'];?>
                                <span class="option-in"><?php echo $rows3['invc'];?></span>
                            </div>
                            <div class="inputt-box">
                                <span class="detaill1">Freight :</span>
                                <?php echo $rows3['freight'];?>
                                <span class="option-in"><?php echo $rows3['frec'];?></span>
                            </div>
                            <div class="inputt-box">
                                <span class="detaill2">Insurance :</span>
                                <?php echo $rows3['insuar'];?>
                                <span class="option-in"><?php echo $rows3['insuarc'];?></span>
                            </div>
                            
                            <div class="inputt-box">
                                <span id="demo" class="detaill3">Total value : </span>
                                <?php echo $rows3['totalv'];?>
                                <span class="option-in"><?php echo $rows3['totalc'];?></span>
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
                                <span class="detail">RITC Code : <?php echo $rows4['ritccode'];?></span>          
                            </div>
                            <div class="input-box">
                                <span class="detail">Product : <?php echo $rows4['proname'];?></span>          
                            </div>
                        </div>

                            <div class="inputt-box">
                                <span class="detail">Scheme Code : <?php echo $rows4['scode'];?></span>          
                            </div>
                            <div class="inputt-box">
                                <span class="detail">End use of item : <?php echo $rows4['enduse'];?></span>          
                            </div>

                        <div class="user-detail">

                            <div class="input-box">
                                <span class="detail">Rate : <?php echo $rows4['rate'];?></span>          
                            </div>
                            <div class="input-box">
                                <span class="detail">Per : <?php echo $rows4['per'];?></span>          
                            </div>
                            <div class="input-box">
                                <span class="detail">QTY : <?php echo $rows4['qty'];?></span>          
                            </div>
                            <div class="input-box">
                                <span class="detail">Unit : <?php echo $rows4['unit'];?></span>          
                            </div>
                        </div>

                            <div class="inputt-box">
                                <span class="detail">Total Value : <?php echo $rows4['totalval'];?></span>          
                            </div>
                            <span class="detail">----------------------------------------------------------------
                             ---------------------------------------------------------------------------</span>
                            <div class="inputt-box">
                                <b><span class="detail">Container Details--</span></b>
                            </div>

                        <div class="user-detail">

                            <div class="input-box">
                                <span class="detail">Container No : <?php echo $rows6['contno'];?></span>          
                            </div>
                            <div class="input-box">
                                <span class="detail">Size : <?php echo $rows6['size'];?></span>          
                            </div>
                            <div class="input-box">
                                <span class="detail">Type : <?php echo $rows6['type'];?></span>          
                            </div>
                            <div class="input-box">
                                <span class="detail">Seal Number : <?php echo $rows6['sealno'];?></span>          
                            </div>
                            <div class="input-box">
                                <span class="detail">Seal Date : <?php echo $rows6['sealdate'];?></span>          
                            </div>
                            <div class="input-box">
                                <span class="detail">Seal Indicator : <?php echo $rows6['sealindi'];?></span>          
                            </div>
                        </div>

                            <div class="inputt-box">
                                <span class="detail">Factory Stuffed : <?php echo $rows5['factorys'];?></span>          
                            </div>
                            <span class="detail">----------------------------------------------------------------
                             ---------------------------------------------------------------------------</span>
                             <div class="inputt-box">
                                <b><span class="detail">Packing Details--</span></b>
                            </div>

                        
                        <table border="2px">
                            <tr>
                                <th>Group</th>
                                <th>Package From</th>
                                <th>Package To</th>
                                <th>Package Kind</th>
                            </tr>
                            <tr>
                               <td> <?php echo $rows7['grp'];?></td>
                               <td> <?php echo $rows7['from1'];?></td>
                               <td> <?php echo $rows7['to1'];?></td>
                               <td> <?php echo $rows7['unit'];?></td>
                            </tr>
                        </table>
                </form>
        </div> 
    </div>
</body>
</html>