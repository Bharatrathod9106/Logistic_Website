<?php
session_start();
require 'connection.php';
if(isset($_SESSION['username'])){

        $port = "SELECT * FROM port";
        $port_qry = mysqli_query($conn, $port);

        $port = "SELECT * FROM port";
        $portt_qry = mysqli_query($conn, $port);

        $port = "SELECT * FROM port";
        $porttt_qry = mysqli_query($conn, $port);

        $country = "SELECT * FROM consignee";
        $con_country_qry = mysqli_query($conn,$country);

        if(isset($_POST['submit'])){

            $etype = $_POST['etype'];
            $mm = $_POST['mm'];
            $loadport = $_POST['loadport'];
            $disport = $_POST['disport'];
            $finalport = $_POST['finalport'];
            $finalcon = $_POST['finalcon'];
            $description = $_POST['description'];

            $sql = "select * from newdoc2";
            $result = mysqli_query($conn,$sql);
            $num = mysqli_num_rows($result);
    
            if($conn->connect_errno){
                die('connection Failed : '.$conn->connect_errno);
                //echo " ";
            }else{
                $stmt = $conn->prepare("insert into newdoc2(etype, mm, loadport, disport, finalport, finalcon, description) values(?, ?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("sssssss", $etype, $mm, $loadport, $disport, $finalport, $finalcon, $description);
                $stmt->execute();
                echo " ";
                $stmt->close();
                header('location:Newdoc3.php');
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

            padding: 1px;
            padding-right: 15px;
            /* padding-left: 5px; */
            font-size: 14px;
        }


        #padd1{
            padding-right: 24px;    
        }
        /* #padd2{
            padding-right: 0px;
        } */
        /* #padd3{
            padding-right: 0px;
        } */
        #padd4{
            padding-right:  46px;
        }
        /* #padd5{
            padding-right: 0px;
        } */
        /* #padd6{
            padding-right: 0px;
        } */
        
    </style>   
</head>
<body  class="form-body">

    <div class="container">
            <form action="" method="post">

                <div class="user-detail">
                    <div class="input-box">
                        <span class="detail" id="padd1">Exporter type</span>
                            <select class="option" name="etype">
                                <option>Select Option</option>
                                <option>Government</option>
                                <option>Private</option>
                            </select>
                    </div> 
                    <div class="input-box">
                        <span class="detail" id="padd2">Merchant/Manufacture</span>
                            <select class="option" name="mm">
                                <option>Select Option</option>
                                <option>Merchant</option>
                                <option>Manufacture</option>

                            </select>
                    </div>
                    <div class="input-box">
                        <span class="detail" id="padd3">Port of Loading</span>
                            <select class="option" name="loadport">
                                <option value="">select value</option>
                                <?php
                                    while($row = mysqli_fetch_assoc($port_qry)){
                                        echo "<option>".$row['portname']."</option>" ;
                                    }
                                ?>
                            </select>
                    </div>   
                    <div class="input-box">
                        <span class="detail" id="padd4">Port of Discharge</span>
                            <select class="option" name="disport">
                                <option value="">select value</option>
                                <?php
                                    while($row = mysqli_fetch_assoc($portt_qry)){
                                        echo "<option>".$row['portname']."</option>" ;
                                    }
                                ?>
                            </select>
                    </div> 
                    <div class="input-box">
                        <span class="detail" id="padd5">Port of final Destination</span>
                            <select class="option" name="finalport">
                                <option value="">select value</option>
                                <?php
                                    while($row = mysqli_fetch_assoc($porttt_qry)){
                                        echo "<option>".$row['portname']."</option>" ;
                                    }
                                ?>
                            </select>
                    </div>
                    <div class="input-box">
                        <span class="detail" id="padd6">Country of final Destination </span>
                            <select class="option" name="finalcon">
                                <option value="">select value</option>
                                <?php
                                    while($row = mysqli_fetch_assoc($con_country_qry)){
                                        echo "<option>".$row['country']."</option>" ;
                                    }
                                ?>
                            </select>                     
                    </div>
                    <div class="input-box">
                        <span class="detail">Marks/Nos</span>
                        <input type="text" placeholder="Enter marks/nos" required name="description">
                    </div>   
                </div>

                <div class="button">
                        <input type="submit" name="submit" value="NEXT">
                </div>
            </form>
    </div>

</body>
</html>