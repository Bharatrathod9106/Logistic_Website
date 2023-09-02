<?php
    
    session_start();
    require 'connection.php';
    if(isset($_SESSION['username'])){
        
        $iec = "SELECT * FROM exporter";
        $iec_qry = mysqli_query($conn, $iec); 

        $id = $_GET['id'];

        $query = "SELECT * FROM adcode where id=$id";
        
        $result = mysqli_query($conn,$query);

        $rows = mysqli_fetch_assoc($result);

        if(isset($_POST['submit'])){

            $id = $_GET['id'];

            $iec = $_POST['iec'];
            $branch = $_POST['branch'];
            $bankcode = $_POST['bankcode'];
            $acno = $_POST['acno'];
            $bankname = $_POST['bankname'];
            $add1 = $_POST['add1'];
            $add2 = $_POST['add2'];
            $pincode = $_POST['pincode'];
            $city = $_POST['city'];
            $state = $_POST['state'];
            
            // $sql = "select * from exporter";
            // $result = mysqli_query($conn,$sql);
            // $num = mysqli_num_rows($result);

            if($conn->connect_errno){
                die('connection Failed : '.$conn->connect_errno);
                //echo " ";
            }else{

                $stmt = $conn->prepare("UPDATE `adcode` SET `iec`='$iec',`branch`='$branch',`bankcode`='$bankcode',`acno`='$acno',`bankname`='$bankname',`add1`='$add1', `add2`='$add2', `pincode`='$pincode',`city`='$city',`state`='$state' WHERE id=$id");
                $stmt->bind_param("isissssiss",$iec, $branch, $bankcode, $acno, $bankname, $add1, $add2, $pincode, $city, $state);
                $stmt->execute();
                echo " ";
                $stmt->close();
                header('location:ADcode_list.php');
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
    <title>ADcode Master</title>
    <link type="text/css" rel="stylesheet" href="Importmaster.css">
</head>
<style>
        .option{

            padding: 2px;
            padding-right: 60px;
            /* padding-left: 5px; */
            font-size: 14px;

        }
        #padd1{
            padding-right: 27px;
        }
        /* #padd2{
            padding-right: 0px;
        } */
        #padd3{
            padding-right: 15px;
        }
        #padd4{
            padding-right:  35px;
        }
        /* #padd5{
            padding-right: 0px;
        } */
        #padd6{
            padding-right:  43px;
        }
        #padd7{
            padding-right: 50px;
        }
        #padd8{
            padding-right: 23px;
        }
        #padd9{
            padding-right: 65px;
        }
        #padd10{
            padding-right: 48px;
        }

    </style>   
<body class="form-body">

    <div class="container">
        <div class="head">ADcode Master</div>
            <form action="" method="post">

                <div class="user-detail">
                <div class="input-box">
                        <span class="detail" id="padd1">IEC Code</span>
                            <select class="option" name="iec" value="<?php echo $rows['iec'];?>"> 
                                <option value="<?php echo $rows['iec'];?>">select value</option>
                                <?php
                                    while($row = mysqli_fetch_assoc($iec_qry)){
                                        echo "<option>".$row['iec']."</option>";
                                    }
                                ?>
                            </select>
                    </div>

                    <div class="input-box">
                        <span class="detail" id="padd2">Branch No</span>
                        <input type="text" placeholder="Enter Bank code" required name="branch" value="<?php echo $rows['branch'];?>">
                    </div>

                    <div class="input-box">
                        <span class="detail" id="padd3">Bank Code</span>
                        <input type="text" placeholder="Enter Bank code" required name="bankcode" value="<?php echo $rows['bankcode'];?>">
                    </div>

                    <div class="input-box">
                        <span class="detail" id="padd4">AC NO</span>
                        <input type="text" placeholder="Enter AC no" required name="acno" value="<?php echo $rows['acno'];?>">
                    </div>

                    <div class="input-box">
                        <span class="detail" id="padd5">Bank Name </span>
                        <input type="text" placeholder="Enter Bank Name" required name="bankname" value="<?php echo $rows['bankname'];?>">
                    </div>

                    <div class="input-box">
                        <span class="detail" id="padd6">Add-1</span>
                        <input type="text" placeholder="Enter Address-1" required name="add1" value="<?php echo $rows['add1'];?>">
                    </div>
                    
                    <div class="input-box">
                        <span class="detail" id="padd7">Add-2</span>
                        <input type="text" placeholder="Enter Address-2" required name="add2" value="<?php echo $rows['add2'];?>">
                    </div>

                    <div class="input-box">
                        <span class="detail" id="padd8">Pin code</span>
                        <input type="text" placeholder="Enter Bank code" required name="pincode" value="<?php echo $rows['pincode'];?>">
                    </div>

                    <div class="input-box">
                        <span class="detail" id="padd9">City</span>
                        <input type="text" placeholder="Enter your City" required name="city" value="<?php echo $rows['city'];?>"> 
                    </div>

                    <div class="input-box">
                        <span class="detail" id="padd10">State</span>
                        <input type="text" placeholder="Enter your State" required name="state" value="<?php echo $rows['state'];?>">
                    </div>  
                </div>

                <div class="button">   
                    <input type="submit" name="submit" value="UPDATE">
                    <!-- <input type="submit" value="ADcode List"> -->
                </div>
            </form>
    </div>

</body>
</html>