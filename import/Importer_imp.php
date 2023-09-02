<?php
    
session_start();
require 'connection.php';
if(isset($_SESSION['username'])){
    
    if(isset($_POST['submit'])){

        $iec = $_POST['iec'];
        $branch = $_POST['branch'];
        $company_name = $_POST['company_name'];
        $add1 = $_POST['add1'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $pincode = $_POST['pincode'];
        $phone = $_POST['phone'];
        $gstn = $_POST['gstn'];
        $email = $_POST['email'];

        $sql = "select * from importer WHERE iec='$iec' ";
        $result = mysqli_query($conn,$sql);
        $num = mysqli_num_rows($result);

        if($num > 0){
            ?>
                <script>
                    alert('Importer added already..');
                </script>    
            <?php
            
        }else{

            if($conn->connect_errno){
                die('connection Failed : '.$conn->connect_errno);
                //echo " ";
            }else{
                $stmt = $conn->prepare("insert into importer(iec, branch, company_name, add1, city, state, pincode, phone, gstn, email) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("isssssisss",$iec, $branch, $company_name, $add1, $city, $state, $pincode, $phone, $gstn, $email);
                $stmt->execute();
                echo " ";
                $stmt->close();
                header('location:Import.php');
            }
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
    <title>Importer master</title>
    <link type="text/css" rel="stylesheet" href="Importmaster.css">
    <style>
        #padd1{
            padding-right:  27px;
        }
        /* #padd2{
            padding-right: 0px;
        } */
        /* #padd3{
            padding-right: 0px;
        } */
        #padd4{
            padding-right: 28px;
        }
        #padd5{
            padding-right: 51px;
        }
        #padd6{
            padding-right: 49px;
        }
        #padd7{
            padding-right: 13px;
        }
        #padd8{
            padding-right: 41px;
        }
        #padd9{
            padding-right: 18px;
        }
        #padd10{
            padding-right: 47px;
        }
    </style>
</head>
<body class="form-body">

    <div class="container">
        <div class="head">Importer Master</div>
            <form action="" method="post">

                <div class="user-detail">

                    <div class="input-box">
                        <span class="detail" id="padd1">IEC No</span>
                        <input type="text" min="8" max="8" placeholder="Enter 8 Digit Iec number" required name="iec">
                    </div>
                    <div class="input-box">
                        <span class="detail" id="padd2">Branch No</span>
                        <input type="text" placeholder="Enter Branch number" required name="branch">
                    </div>
                    <div class="input-box">
                        <span class="detail" id="padd3">Company</span>
                        <input type="text" placeholder="Enter company" required name="company_name">
                    </div>
                    <div class="input-box">
                        <span class="detail" id="padd4">Address</span>
                        <input type="text" placeholder="Enter Address" required name="add1">
                    </div>
                    <div class="input-box">
                        <span class="detail" id="padd5">City</span>
                        <input type="text" placeholder="Enter your City" required name="city">
                    </div>
                    <div class="input-box">
                        <span class="detail" id="padd6">State</span>
                        <input type="text" placeholder="Enter your State" required name="state">
                    </div>  
                    <div class="input-box">
                        <span class="detail" id="padd7">Pin Code</span>
                        <input type="text" placeholder="Enter Pin Code" required name="pincode">
                    </div>  
                    <div class="input-box">
                        <span class="detail" id="padd8">Phone</span>
                        <input type="text" placeholder="Enter Phone number" required name="phone">
                    </div>  
                    <div class="input-box">
                        <span class="detail" id="padd9">GSTN id</span>
                        <input type="text" placeholder="Enter GSTN id" required name="gstn">
                    </div>
                    <div class="input-box">
                        <span class="detail" id="padd10">Email</span>
                        <input type="text" placeholder="Enter Email" required name="email">
                    </div>
                </div>

                <div class="button">
                    <input type="submit" name="submit" value="SAVE">  
                    <!-- <input type="submit" value="Exporter List"> -->
                </div>
        </form>
    </div>

</body>
</html>