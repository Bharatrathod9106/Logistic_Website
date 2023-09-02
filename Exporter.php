<?php

session_start();
require 'connection.php';
if(isset($_SESSION['username'])){
    if(isset($_POST['submit'])){

        $iec = $_POST['iec'];
        $branch = $_POST['branch'];
        $gstn = $_POST['gstn'];
        $company_name = $_POST['company_name'];
        $add1 = $_POST['add1'];
        $email = $_POST['email'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $pincode = $_POST['pincode'];
        $phone = $_POST['phone'];

        $sql = "select * from exporter WHERE iec='$iec' ";
        $result = mysqli_query($conn,$sql);
        $num = mysqli_num_rows($result);

        if($num > 0){
            ?>
                <script>
                    alert('Exporter added already..');
                </script>    
            <?php
            
        }else{

            if($conn->connect_errno){
                die('connection Failed : '.$conn->connect_errno);
                //echo " ";
            }else{
                    $stmt = $conn->prepare("insert into exporter(iec, branch, gstn, company_name, add1, email, city, state, pincode, phone) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                    $stmt->bind_param("isssssssii",$iec, $branch, $gstn, $company_name, $add1, $email, $city, $state, $pincode, $phone);
                    $stmt->execute();
                    echo " ";
                    $stmt->close();
                    header('location:Export.php');
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
    <title>Exporter master</title>
    <link type="text/css" rel="stylesheet" href="allform.css">
    <style>

        .val{

            font-size: 10px;
            color: red;
            /* padding-left: 20px; */
        }

        
        #padd1{
            padding-right: 62px
        }
        #padd2{
            padding-right:  46px;
        }
        #padd3{
            
            padding-right:  52px;
        }
        /* #padd4{

            padding-right:  46px;
        } */
        #padd5{
            
            padding-right: 54px;
        }

        #padd6{
            padding-right: 83px
        }
        #padd7{
            padding-right: 85px
        }
        #padd8{
            padding-right:  85px
        }
        #padd9{
            padding-right:  46px;
        }
        #padd10{
            padding-right:  76px
        }
    </style>
</head>
<body class="form-body">

    <div class="container">
        <div class="head">Exporter Master</div>
            <form action="" method="post"  name="myForm" onsubmit="return validation()">

                 <div class="user-detail">

                     <div class="input-box">
                        <span class="detail" id="padd1">IEC No</span>
                        <input type="text" placeholder="Enter 8 Digit Iec number" name="iec" id="iec">
                        <span id = "ieccode" class="val"> </span>
                    </div>
                    <div class="input-box">
                        <span class="detail" id="padd2">Branch No</span>
                        <input type="text"  placeholder="Enter Branch number" name="branch" id="branch">
                        <span id = "branchname" class="val"> <span>
                    </div>
                    <div class="input-box">
                        <span class="detail"  id="padd3">GSTN id</span>
                        <input type="text" placeholder="Enter GSTN id" name="gstn" id="gstn">
                        <span id = "gstnno" class="val"> </span>
                    </div>
                    <div class="input-box">
                        <span class="detail"  id="padd4">Company name</span>
                        <input type="text" placeholder="Enter Name" name="company_name" id="companyname">
                        <span id="company" class="val"> </span>
                    </div>
                    <div class="input-box">
                        <span class="detail"  id="padd5">Address</span>
                        <input type="text" placeholder="Enter Address" name="add1" id="add1">
                        <span id="add" class="val"> </span>
                    </div>
                    <div class="input-box">
                        <span class="detail"  id="padd6">Email</span>
                        <input type="email" placeholder="Enter Email" name="email" id="mail">
                        <span id="email" class="val"> </span>
                    </div>
                    <div class="input-box">
                        <span class="detail"  id="padd7">City</span>
                        <input type="text" placeholder="Enter your City" name="city" id="cityname">
                        <span id="city" class="val"> </span>
                    </div>
                    <div class="input-box">
                        <span class="detail"  id="padd8">State</span>
                        <input type="text" placeholder="Enter your State" name="state" id="statename">
                        <span id="state" class="val"> </span>
                    </div>  
                    <div class="input-box">
                        <span class="detail"  id="padd9">Pin Code</span>
                        <input type="text" placeholder="Enter Pin Code" name="pincode" id="pincode">
                        <span id="pin" class="val"> </span>
                    </div>  
                    <div class="input-box">
                        <span class="detail"  id="padd10">Phone</span>
                        <input type="text" placeholder="Enter Phone number" name="phone" id="phone">
                        <span id = "phoneno" class="val"> </span>
                    </div>  
                </div>

            <div class="button">
                <input type="submit" name="submit" value="SAVE">

            </div>
        </form>
    </div>

    <script type = "text/javascript">

        function validation(){

            var iec = document.getElementById('iec').value;
            var branch = document.getElementById('branch').value;
            var gstn = document.getElementById('gstn').value;
            var companyname = document.getElementById('companyname').value;
            var add1 = document.getElementById('add1').value;
            var mail = document.getElementById('mail').value;
            var cityname = document.getElementById('cityname').value;
            var statename = document.getElementById('statename').value;
            var pincode = document.getElementById('pincode').value;
            var phone = document.getElementById('phone').value;

            if (isNaN(iec)){  
                document.getElementById("ieccode").innerHTML="Enter Numeric value only";  
                return false;  
            }else{
                document.getElementById("ieccode").innerHTML="";  

            }

            if(iec.length != 8){
                document.getElementById('ieccode').innerHTML = "Enter 8 Digit Number";
                return false;
            }else{
                document.getElementById("ieccode").innerHTML="";  

            }

            if (branch == 0){  
                document.getElementById("branchname").innerHTML="*";  
                return false;  
            }else{
                document.getElementById("branchname").innerHTML="";  

            }

            if (gstn.length != 15){  
                document.getElementById("gstnno").innerHTML="Valid Length";  
                return false;  
            }else{
                document.getElementById("gstnno").innerHTML="";  

            }

            if (!isNaN(companyname)){  
                document.getElementById("company").innerHTML="Charater Only";  
                return false;  
            }else{
                document.getElementById("company").innerHTML="";  

            }

            if (add1 == 0){  
                document.getElementById("add").innerHTML="*";  
                return false;  
            }else{
                document.getElementById("add").innerHTML="";  

            }

            if (mail == 0){  
                document.getElementById("email").innerHTML="*";  
                return false;  
            }else{
                document.getElementById("email").innerHTML="";  

            }

            if (!isNaN(cityname)){  
                document.getElementById("city").innerHTML="Character Only";  
                return false;  
            }else{
                document.getElementById("city").innerHTML="";  

            }

            if (!isNaN(statename)){  
                document.getElementById("state").innerHTML="Character Only";  
                return false;  
            }else{
                document.getElementById("state").innerHTML="";  

            }

            if (isNaN(pincode)){  
                document.getElementById("pin").innerHTML="Enter Number Only";  
                return false;  
            }else{
                document.getElementById("pin").innerHTML="";  

            }
            
            if (isNaN(phone)){  
                document.getElementById("phoneno").innerHTML="Numeric value only";  
                return false;  
            }else{
                document.getElementById("phoneno").innerHTML="";  

            }

            if(phone.length != 10){
                document.getElementById('phoneno').innerHTML = "Please Fill Valid Mobile Number";
                return false;
            }else{
                document.getElementById("phoneno").innerHTML="";  

            }
             
        }


    </script>

</body>
</html>