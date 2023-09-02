<?php
    
session_start();
require 'connection.php';
if(isset($_SESSION['username'])){
    $id = $_GET['id'];

    $query = "SELECT * FROM exporter where id=$id";
	
	$result = mysqli_query($conn,$query);

    $rows = mysqli_fetch_assoc($result);

    if(isset($_POST['submit'])){

        $id = $_GET['id'];

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

        // $sql = "select * from exporter";
        // $result = mysqli_query($conn,$sql);
        // $num = mysqli_num_rows($result);

        if($conn->connect_errno){
            die('connection Failed : '.$conn->connect_errno);
            //echo " ";
        }else{

            $stmt = $conn->prepare("UPDATE `exporter` SET `iec`='$iec',`branch`='$branch',`gstn`='$gstn',`company_name`='$company_name',`add1`='$add1',`email`='$email',`city`='$city',`state`='$state',`pincode`='$pincode',`phone`='$phone' WHERE id=$id");
            $stmt->bind_param("isssssssii",$iec, $branch, $gstn, $company_name, $add1, $email, $city, $state, $pincode, $phone);
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
            <form action="" method="post">

                 <div class="user-detail">

                     <div class="input-box">
                        <span class="detail" id="padd1">IEC No</span>
                        <input type="text" min="8" max="8" placeholder="Enter 8 Digit Iec number" required name="iec" value="<?php echo $rows['iec'];?>">
                    </div>
                    <div class="input-box">
                        <span class="detail" id="padd2">Branch No</span>
                        <input type="text" placeholder="Enter Branch number" required name="branch" value="<?php echo $rows['branch']; ?>">
                    </div>
                    <div class="input-box">
                        <span class="detail" id="padd3">GSTN id</span>
                        <input type="text" placeholder="Enter GSTN id" required name="gstn" value="<?php echo $rows['gstn']; ?>">
                    </div>
                    <div class="input-box">
                        <span class="detail" id="padd4">Company name</span>
                        <input type="text" placeholder="Enter Name" required name="company_name" value="<?php echo $rows['company_name']; ?>">
                    </div>
                    <div class="input-box">
                        <span class="detail" id="padd5">Address</span>
                        <input type="text" placeholder="Enter Address-1" required name="add1" value="<?php echo $rows['add1']; ?>">
                    </div>
                    <div class="input-box">
                        <span class="detail" id="padd6">Email</span>
                        <input type="text" placeholder="Enter Email" required name="email" value="<?php echo $rows['email']; ?>">
                    </div>
                    <div class="input-box">
                        <span class="detail" id="padd7">City</span>
                        <input type="text" placeholder="Enter your City" required name="city" value="<?php echo $rows['city']; ?>">
                    </div>
                    <div class="input-box">
                        <span class="detail" id="padd8">State</span>
                        <input type="text" placeholder="Enter your State" required name="state" value="<?php echo $rows['state']; ?>">
                    </div>  
                    <div class="input-box">
                        <span class="detail" id="padd9">Pin Code</span>
                        <input type="text" placeholder="Enter Pin Code" required name="pincode" value="<?php echo $rows['pincode']; ?>">
                    </div>  
                    <div class="input-box">
                        <span class="detail" id="padd10">Phone</span>
                        <input type="text" placeholder="Enter Phone number" required name="phone" value="<?php echo $rows['phone']; ?>">
                    </div>  
                </div>

            <div class="button">
                <input type="submit" name="submit" value="UPDATE">
            </div>
        </form>
    </div>

</body>
</html>