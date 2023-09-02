Ann 2 Extraa 

<table border='2px' cellspacing='1' cellpadding='30'>
                    <tr bgcolor='87cefa'>
                        <th>CONTAINER NO</th>
                        <th>SIZE</th>
                        <th>TYPE</th>
                        <th>EXCISE SEAL NO</th>
                        <th>SEAL DATE</th>
                        <th>SEAL TYPE indicator</th>
                        <!-- <input type="submit" name="add" value="ADD"></a> -->
                    </tr>

                    <?php
                        while($rows = mysqli_fetch_array($resultt,MYSQLI_ASSOC))
                        {
                    ?> 
                    <tr>
                        <td><?php echo $rows['contno']; ?></td>
                        <td><?php echo $rows['size']; ?></td>
                        <td><?php echo $rows['type']; ?></td>
                        <td><?php echo $rows['sealno']; ?></td>
                        <td><?php echo $rows['sealdate']; ?></td>
                        <td><?php echo $rows['sealindi']; ?></td>                    
                    </tr>
                    <?php 
                        }
                    ?>

                </table>
                <div class="button">   
                    <input type="submit" name="submit" value="NEXT">
                    <!-- <input type="submit" value="Exporter List"> -->
                </div>
            </form>



            <td><?php echo $rows['contno']; ?></td>
                        <td><?php echo $rows['size']; ?></td>
                        <td><?php echo $rows['type']; ?></td>
                        <td><?php echo $rows['sealno']; ?></td>
                        <td><?php echo $rows['sealdate']; ?></td>
                        <td><?php echo $rows['sealindi']; ?>
            </td>

Ann3 Extraa

<table border='2px' cellspacing='3' cellpadding="30">
                    <tr bgcolor='87cefa'>
                        <th>Group</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Package Type</th>
                        <!-- <input type="button" name="button" value="ADD"></a> -->
                    </tr>

                    <?php
                        while($rows=mysqli_fetch_assoc($resultt))
                        {
                    ?> 
                    <tr>
                        <td><?php echo $rows['grp']; ?></td>
                        <td><?php echo $rows['from1']; ?></td>
                        <td><?php echo $rows['to1']; ?></td>
                        <td><?php echo $rows['unit']; ?></td>
                    </tr>
                    <?php 
                        }
                    ?>

</table>

checklist

<?php

    include 'connection.php';

    // $jobno = "SELECT * FROM checklist";
    // $job_qry = mysqli_query($conn, $jobno);

    // $query = "SELECT * FROM newdoc1 n1, newdoc2 n2 where n1.jobno=n2.jobno";
        
    // $result = mysqli_query($conn,$query);

    // $rows = mysqli_fetch_assoc($result);

    // $estate = "SELECT * FROM newdoc1";
        
    // $resultt = mysqli_query($conn,$estate);

    // $rowss = mysqli_fetch_assoc($resultt);


?>


<!DOCTYPE html>
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
                    <li class="pp"> KRISHNA IMPEX PVT LTD.<br>(shiping bill Checklist)</li>
                </ul>
                
            </div>
            <br>

                <form action="">
                    <div class="user-detail">
                        <div class="input-box">
                            <span class="detail">Ice gate job no : </span>            
                        </div>

                        <div class="input-box">
                            <span class="detail">Date :</span>
                        </div>

                        <div class="input-box">
                            <span class="detail">CHA :</span>
                        </div>

            <!-- <form action="">
                <div class="user-detail">
                    <div class="input-box">
                            <span class="detail">Ice gate job no : </span>
                    </div>

                    <div class="input-box">
                        <span class="detail">Date :</span>
                    </div>

                    <div class="input-box">
                        <span class="detail">CHA :</span>
                    </div>

                    <div class="input-box">
                        <span class="detail">Name :</span>
                    </div>
                    <div class="input-box">
                        <span class="detail">Port of loading : </span>

                    <div class="input-box">
                        <span class="detail">State of export :</span>
                    </div>
                </div> -->
                    

                        <div class="input-box">
                            <span class="detail">Name :</span>
                        </div>
                        <div class="input-box">
                            <span class="detail">Port of loading : </span>
                            <!-- <?php echo $rows['loadport']; ?> -->
                        </div>

                        <div class="input-box">
                            <span class="detail">State of export :</span>
                            <!-- <?php echo $rowss['estate']; ?> -->
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
                            <span class="detail">IEC :</span>
                        </div>

                        <div class="input-box">
                            <span class="detail">Name :</span>
                        </div>
                        <div class="input-box">
                            <span class="detail">Name :</span>
                        </div>

                        <div class="input-box">
                            <span class="detail">Address :</span>
                        </div>

                        <div class="input-box">
                            <span class="detail">Address :</span>
                        </div>
                        <div class="input-box">
                            <span class="detail">City :</span>
                        </div>
                        <div class="input-box">
                            <span class="detail">City :</span>
                        </div>
                        <div class="input-box">
                            <span class="detail">Country :</span>
                        </div>       
                    </div>

                        <div class="inputt-box">
                            <span class="detail">State :</span>
                        </div>
                        <div class="inputt-box">
                            <span class="detail">GSTN No :</span>
                        </div>

                        <br>
                    
                    <div class="user-detail">

                        <div class="input-box">
                                <span class="detail">Type of Exporter :</span>          
                        </div>

                        <div class="input-box">
                            <span class="detail">Manufacture/Merchant :</span>
                        </div>

                        <div class="input-box">
                            <span class="detail">Poat of Dischange :</span>
                        </div>

                        <div class="input-box">
                            <span class="detail">Marks/Nos :</span>
                        </div>
                        <div class="input-box">
                            <span class="detail">Port of final Destination :</span>
                        </div>

                        <div class="input-box">
                            <span class="detail">Country of final Destination :</span>
                        </div>

                        <div class="input-box">
                            <span class="detail">Total packages :</span>
                        </div>
                        <div class="input-box">
                            <span class="detail">Loos packates :</span>
                        </div>
                        <div class="input-box">
                            <span class="detail">Gross Weight :</span>
                        </div>
                        <div class="input-box">
                            <span class="detail">Net Weight :</span>
                        </div>
                        <div class="input-box">
                            <span class="detail">Number of Containers :</span>
                        </div>
                        <div class="input-box">
                            <span class="detail">Nature of Cargo :</span>
                        </div>
                        <div class="input-box">
                            <span class="detail">Unit of Measurement :</span>
                        </div>
                        <div class="input-box">
                            <span class="detail">Seal Type :</span>
                        </div>
                        <div class="input-box">
                            <span class="detail">AD Code :</span>
                        </div>
                        <div class="input-box">
                            <span class="detail">Bank A/C Number :</span>
                        </div>
                        <span class="detail">----------------------------------------------------------------
                             ---------------------------------------------------------------------------</span>  
                    </div>
                    
                        <div class="inputt-box">
                                <b><span class="detail">Invoice Details--</span></b>
                        </div>

                    <div class="user-detail">

                        <div class="input-box">
                                <span class="detail">File-Refference No :</span>          
                        </div>

                        <div class="input-box">
                            <span class="detail">Date :</span>
                        </div>

                        <div class="input-box">
                            <span class="detail">Invoice No :</span>
                        </div>

                        <div class="input-box">
                            <span class="detail">Invpoice Date :</span>
                        </div>
                        <div class="input-box">
                            <span class="detail">Nature of Contract :</span>
                        </div>

                        <div class="input-box">
                            <span class="detail">Nature of Payment :</span>
                        </div>
                    </div>
                        
                        <div class="inputt-box">
                            <span class="detail">Period of Agreement :</span>
                        </div>

                    <div class="user-detail">

                        <div class="input-box">
                            <span class="detail">Currency Code :</span>
                        </div>

                        <div class="input-box">
                            <span class="detail">Exchange Rate :</span>
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
                                <span class="detaill">Invoice Value  :</span>
                                <!-- <?php echo $rows['loadport']; ?> -->
                                <!-- <span class="option-in"><?php echo $rows['loadport']; ?></span> -->
                            
                            </div>
                            <div class="inputt-box">
                                <span class="detaill1">Freight :</span>
                                <!-- <?php echo $rows['loadport']; ?> -->
                                <!-- <span class="option-in"><?php echo $rows['loadport']; ?></span> -->
                            
                            </div>
                            <div class="inputt-box">
                                <span class="detaill2">Insurance :</span>
                                <!-- <?php echo $rows['loadport']; ?> -->
                                <!-- <span class="option-in"><?php echo $rows['loadport']; ?></span> -->
                                
                            </div>
                            
                            <div class="inputt-box">
                                <span id="demo" class="detaill3">Total value :</span>
                                <!-- <?php echo $rows['loadport']; ?> -->
                                <!-- <span class="option-in"><?php echo $rows['loadport']; ?></span> -->
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
                                <span class="detail">RITC Code :</span>          
                            </div>
                            <div class="input-box">
                                <span class="detail">Product :</span>          
                            </div>
                        </div>

                            <div class="inputt-box">
                                <span class="detail">Scheme Code :</span>          
                            </div>
                            <div class="inputt-box">
                                <span class="detail">End use of item :</span>          
                            </div>

                        <div class="user-detail">

                            <div class="input-box">
                                <span class="detail">Rate :</span>          
                            </div>
                            <div class="input-box">
                                <span class="detail">Per :</span>          
                            </div>
                            <div class="input-box">
                                <span class="detail">QTY :</span>          
                            </div>
                            <div class="input-box">
                                <span class="detail">Unit :</span>          
                            </div>
                        </div>

                            <div class="inputt-box">
                                <span class="detail">Total Value :</span>          
                            </div>
                            <span class="detail">----------------------------------------------------------------
                             ---------------------------------------------------------------------------</span>
                            <div class="inputt-box">
                                <b><span class="detail">Container Details--</span></b>
                            </div>

                        <div class="user-detail">

                            <div class="input-box">
                                <span class="detail">Container No :</span>          
                            </div>
                            <div class="input-box">
                                <span class="detail">Size :</span>          
                            </div>
                            <div class="input-box">
                                <span class="detail">Type :</span>          
                            </div>
                            <div class="input-box">
                                <span class="detail">Seal Number :</span>          
                            </div>
                            <div class="input-box">
                                <span class="detail">Seal Date :</span>          
                            </div>
                            <div class="input-box">
                                <span class="detail">Seal Indicator :</span>          
                            </div>
                        </div>

                            <div class="inputt-box">
                                <span class="detail">Factory Stuffed :</span>          
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
                               <td>1</td>
                               <td>10</td>
                               <td>1000</td>
                               <td>Bag</td>
                            </tr>
                        </table>
                </form>
        </div> 
    </div>
</body>
</html>


checklist


 if(mysqli_num_rows($job_run) > 0){

     foreach($job_run as $jobnoo){
       echo $jobnoo['jobno'];
        ?> 
            <div class="input-box">
                  <span class="detail">Ice gate job no : <?php echo $rows['jobno'];?> 
             </div> 
          <?php  
    }    
}


<div class="input-box">
                        <span class="detail">Job No:</span>
                        <select class="option" name="jobno" /*id="selectBox"*/>
                                <option value="<?php if(isset($_GET['jobno'])){echo $_GET['jobno'];} ?>">Select Job</option>
                                <?php
                                    while($row = mysqli_fetch_assoc($job_qry)){
                                        echo "<option>".$row['jobno']."</option>";
                                    }
                                ?>
                        </select>
                    </div>