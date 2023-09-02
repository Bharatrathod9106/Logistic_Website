<?php
    
session_start();
require 'connection.php';
if(isset($_SESSION['username'])){
    $id = $_GET['id'];

    $query = "SELECT * FROM consignee where id=$id";
	
	$result = mysqli_query($conn,$query);

    $rows = mysqli_fetch_assoc($result);

    if(isset($_POST['submit'])){

        $id = $_GET['id'];

        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $add1 = $_POST['add1'];
        $city = $_POST['city'];
        $email = $_POST['email'];
        $country = $_POST['country'];
        
        // $sql = "select * from exporter";
        // $result = mysqli_query($conn,$sql);
        // $num = mysqli_num_rows($result);

        if($conn->connect_errno){
            die('connection Failed : '.$conn->connect_errno);
            //echo " ";
        }else{

            $stmt = $conn->prepare("UPDATE `consignee` SET `name`='$name',`phone`='$phone',`add1`='$add1',`city`='$city',`email`='$email',`country`='$country' WHERE id=$id");
            $stmt->bind_param("sissss",$name, $phone, $add1, $city, $email, $country);
            $stmt->execute();
            echo " ";
            $stmt->close();
            header('location:Export.php');
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
            <form action="" method="post">

                <div class="user-detail">

                    <div class="input-box">
                        <span class="detail" id="padd1">Name</span>
                        <input type="text" placeholder="Enter Name" required name="name" value="<?php echo $rows['name'];?>">
                    </div>
                    <div class="input-box">
                        <span class="detail" id="padd2">Phone</span>
                        <input type="text" placeholder="Enter Phone number" required name="phone" value="<?php echo $rows['phone'];?>">
                    </div>
                    <div class="input-box">
                        <span class="detail" id="padd3">Add 1</span>
                        <input type="text" placeholder="Enter the Address" required name="add1" value="<?php echo $rows['add1'];?>">
                    </div>
                    <div class="input-box">
                        <span class="detail" id="padd4">City</span>
                        <input type="text" placeholder="Enter the City" required name="city" value="<?php echo $rows['city'];?>">
                    </div>
                    <div class="input-box">
                        <span class="detail" id="padd5">E-mail </span>
                        <input type="text" placeholder="Enter the E-mail" required name="email" value="<?php echo $rows['email'];?>">
                    </div>
                    <div class="input-box">
                        <span class="detail"id="padd6">Country</span>
                        <input type="text" placeholder="Country" required name="country" value="<?php echo $rows['country'];?>">
                    </div>
                </div>
                <div class="button">   
                    <input type="submit" name="submit" value="UPDATE">
                </div>
            </form>
    </div>

</body>
</html>