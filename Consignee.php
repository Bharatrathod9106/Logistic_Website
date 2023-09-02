<?php

session_start();
require 'connection.php';
if(isset($_SESSION['username'])){
    if(isset($_POST['submit'])){

        $name = $_POST['name']; 
        $phone = $_POST['phone'];
        $add1 = $_POST['add1'];
        $city = $_POST['city'];
        $email = $_POST['email'];
        $country = $_POST['country'];

        $sql = "select * from consignee WHERE name='$name'";
        $result = mysqli_query($conn,$sql);
        $num = mysqli_num_rows($result);

        if($num > 0){
            ?>
                <script>
                    alert('consignee added already..');
                </script>    
            <?php
            
        }else{
        
            if($conn->connect_errno){  
                die('connection Failed : '.$conn->connect_errno);
                //echo " ";
            }else{
                $stmt = $conn->prepare("insert into consignee(name, phone, add1, city, email, country) values(?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("sissss",$name, $phone, $add1, $city, $email, $country);
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
    <title>Consignee Master</title>
    <link type="text/css" rel="stylesheet" href="allform.css">

    <style>
        .val{

            font-size: 10px;
            color: red;
            /* padding-left: 20px; */
        }

        #padd1{
            padding-right:  14px;
        }
        #padd2{
            padding-right: 20px;
        }
        #padd3{
            padding-right: 14px;    
        }
        #padd4{
            padding-right: 38px;
        }
        /* #padd5{
            padding-right: 0px;
        } */
        /* #padd6{
            padding-right: 0px;
        } */
        
    </style>

</head>
<body class="form-body"> 

    <div class="container">
        <div class="head">Consignee Master</div>
            <form action="" method="post"  onsubmit="return validation()">

                <div class="user-detail">

                    <div class="input-box">
                        <span class="detail" id="padd1">Name</span>
                        <input type="text" placeholder="Enter Name" name="name" id="name">
                        <span id = "nam" class="val"> </span>
                    </div>
                    <div class="input-box">
                        <span class="detail" id="padd2">Phone</span>
                        <input type="text" placeholder="Enter Phone number" name="phone" id="phone">
                        <span id = "phon" class="val"> </span>
                    </div>
                    <div class="input-box">
                        <span class="detail" id="padd3">Add 1</span>
                        <input type="text" placeholder="Enter the Address" name="add1" id="add1"> 
                        <span id = "add" class="val"> </span>
                    </div>
                    <div class="input-box">
                        <span class="detail" id="padd4">City</span>
                        <input type="text" placeholder="Enter the City" name="city" id="cityname">
                        <span id = "city" class="val"> </span>
                    </div>
                    <div class="input-box">
                        <span class="detail" id="padd5">E-mail </span>
                        <input type="text" placeholder="Enter the E-mail" name="email" id="email">
                        <span id = "mail" class="val"> </span>
                    </div>
                    <div class="input-box">
                        <span class="detail" id="padd6">Country</span>
                        <input type="text" placeholder="Country" name="country" id="country">
                        <span id = "coun" class="val"> </span>
                    </div>
                </div>
                <div class="button">   
                    <input type="submit" name="submit" value="SAVE">
                </div>
            </form>
    </div>
    <script type = "text/javascript">

        function validation(){

            var name = document.getElementById('name').value;
            var phone = document.getElementById('phone').value;
            var add1 = document.getElementById('add1').value;
            var cityname = document.getElementById('cityname').value;
            var email = document.getElementById('email').value;
            var country = document.getElementById('country').value;
           

            if (name == 0){  
                document.getElementById("nam").innerHTML="*";  
                return false;  
            }else{
                document.getElementById("nam").innerHTML="";  

            }
            if (isNaN(phone)){  
                document.getElementById("phon").innerHTML="Numeric value only";  
                return false;  
            }else{
                document.getElementById("phon").innerHTML="";  

            }

            // if(phone.length != 10){
            //     document.getElementById('phon').innerHTML = "Enter Valid Mobile Number";
            //     return false;
            // }else{
            //     document.getElementById("phon").innerHTML="";  

            // }
            if (add1 == 0){  
                document.getElementById("add").innerHTML="*";  
                return false;  
            }else{
                document.getElementById("add").innerHTML="";  

            }
            if (!isNaN(cityname)){  
                document.getElementById("city").innerHTML="Character Only";  
                return false;  
            }else{
                document.getElementById("city").innerHTML="";  

            }
            if (email == 0){  
                document.getElementById("mail").innerHTML="*";  
                return false;  
            }else{
                document.getElementById("mail").innerHTML="";  

            }
            if (!isNaN(country)){  
                document.getElementById("coun").innerHTML="Character Only";  
                return false;  
            }else{
                document.getElementById("coun").innerHTML="";  

            }
           
  
        }

    </script>

</body>
</html>