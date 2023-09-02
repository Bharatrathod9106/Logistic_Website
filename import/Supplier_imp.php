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
        
        $sql = "select * from supplier WHERE name='$name'";
        $result = mysqli_query($conn,$sql);
        $num = mysqli_num_rows($result);

        if($num > 0){
            ?>
                <script>
                    alert('Supplier added already..');
                </script>    
            <?php
            
        }else{

            if($conn->connect_errno){  
                die('connection Failed : '.$conn->connect_errno);
                //echo " ";
            }else{
                $stmt = $conn->prepare("insert into supplier(name, phone, add1, city, email, country) values(?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("sissss",$name, $phone, $add1, $city, $email, $country);
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
    <title>Consignee Master</title>
    <link type="text/css" rel="stylesheet" href="Importmaster.css">
    <style>

        #padd1{
            padding-right: 26px;
        }
        #padd2{
            padding-right: 20px;
        }
        /* #padd3{
            padding-right: 0px;
        } */
        #padd4{
            padding-right: 38px;
        }
        #padd5{
            padding-right: 23px;
        }
        /* #padd6{
            padding-right: 0px;
        } */

    </style>

</head>
<body class="form-body"> 

    <div class="container">
        <div class="head">Supplier Master</div>
            <form action="" method="post">

                <div class="user-detail">

                    <div class="input-box">
                        <span class="detail" id="padd1">Name</span>
                        <input type="text" placeholder="Enter Name" required name="name">
                    </div>
                    <div class="input-box">
                        <span class="detail" id="padd2">Phone</span>
                        <input type="text" placeholder="Enter Phone number" required name="phone">
                    </div>
                    <div class="input-box">
                        <span class="detail" id="padd3">Address</span>
                        <input type="text" placeholder="Enter the Address" required name="add1">
                    </div>
                    <div class="input-box">
                        <span class="detail" id="padd4">City</span>
                        <input type="text" placeholder="Enter the City" required name="city">
                    </div>
                    <div class="input-box">
                        <span class="detail" id="padd5">E-mail </span>
                        <input type="text" placeholder="Enter the E-mail" required name="email">
                    </div>
                    <div class="input-box">
                        <span class="detail" id="padd6">Country</span>
                        <input type="text" placeholder="Country" required name="country">
                    </div>

                </div>
                <div class="button">   
                    <input type="submit" name="submit" value="SAVE">
                    <!-- <input type="submit" value="Consignee List"></a> -->
                </div>
            </form>
    </div>

</body>
</html>