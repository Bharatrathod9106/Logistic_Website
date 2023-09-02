<?php
     
session_start();
require 'connection.php';
if(isset($_SESSION['username'])){
    $iec = "SELECT * FROM exporter";
    $iec_qry = mysqli_query($conn, $iec); 
    
    if(isset($_POST['submit'])){

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

        $sql = "select * from adcode WHERE branch='$branch'";
        $result = mysqli_query($conn,$sql);
        $num = mysqli_num_rows($result);

        if($num > 0){
            ?>
                <script>
                    alert('ADcode added already..');
                </script>    
            <?php
            
        }else{

            if($conn->connect_errno){
                die('connection Failed : '.$conn->connect_errno);
                //echo " ";
            }else{
                $stmt = $conn->prepare("insert into adcode(iec, branch, bankcode, acno, bankname, add1, add2, pincode, city, state) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("isissssiss",$iec, $branch, $bankcode, $acno, $bankname, $add1, $add2, $pincode, $city, $state);
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
    <title>ADcode Master</title>
    <link type="text/css" rel="stylesheet" href="allform.css">
</head>
<style>
        .option{

            padding: 2px;
            padding-right: 62px;
            /* padding-left: 5px; */
            font-size: 14px;

        }
        .val{

            font-size: 10px;
            color: red;
            /* padding-left: 20px; */
        }


        #padd1{
            padding-right: 26px;
        }
        /* #padd2{
            padding-right: 0px;
        } */
        #padd3{
            padding-right:  15px;
        }
        #padd4{
            padding-right: 35px;
        }
        /* #padd5{
            padding-right: 0px;
        } */
        #padd6{
            padding-right: 43px;
        }
        #padd7{
            padding-right: 50px;
        }
        #padd8{
            padding-right: 24px;
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
            <form action="" method="post" onsubmit="return validation()">

                <div class="user-detail">
                <div class="input-box">
                        <span class="detail" id="padd1"> IEC Code</span>
                            <select class="option" name="iec">
                                <option value="">select value</option>
                                <?php
                                    while($row = mysqli_fetch_assoc($iec_qry)){
                                        echo "<option>".$row['iec']."</option>";
                                    }
                                ?>
                            </select>
                    </div>

                    <div class="input-box">
                        <span class="detail" id="padd2">Branch No</span>
                        <input type="text" placeholder="Enter Bank code" name="branch" id="branch">
                        <span id = "branchname" class="val"> </span>
                    </div>

                    <div class="input-box">
                        <span class="detail" id="padd3">Bank Code</span>
                        <input type="text" placeholder="Enter Bank code" name="bankcode" id="bankcode">
                        <span id = "bank" class="val"> </span>
                    </div>

                    <div class="input-box">
                        <span class="detail" id="padd4">AC NO</span>
                        <input type="text" placeholder="Enter AC no" name="acno" id="acno">
                        <span id = "ano" class="val"> </span>
                    </div>

                    <div class="input-box">
                        <span class="detail" id="padd5">Bank Name </span>
                        <input type="text" placeholder="Enter Bank Name" name="bankname" id="bankname">
                        <span id = "bankn" class="val"> </span>
                    </div>

                    <div class="input-box">
                        <span class="detail" id="padd6">Add-1</span>
                        <input type="text" placeholder="Enter Address-1" name="add1" id="add1">
                        <span id = "ad1" class="val"> </span>
                    </div>
                    
                    <div class="input-box">
                        <span class="detail" id="padd7">Add-2</span>
                        <input type="text" placeholder="Enter Address-2" name="add2" id="add2">
                        <span id = "ad2" class="val"> </span>
                    </div>

                    <div class="input-box">
                        <span class="detail" id="padd8">Pin code</span>
                        <input type="text" placeholder="Enter Pin code" name="pincode" id="pincode">
                        <span id = "pin" class="val"> </span>
                    </div>

                    <div class="input-box">
                        <span class="detail" id="padd9">City</span>
                        <input type="text" placeholder="Enter your City" name="city" id="cityname">
                        <span id = "city" class="val"> </span>
                    </div>

                    <div class="input-box">
                        <span class="detail" id="padd10">State</span>
                        <input type="text" placeholder="Enter your State" name="state" id="statename">
                        <span id = "state" class="val"> </span>
                    </div>  
                </div>

                <div class="button">   
                    <input type="submit" name="submit" value="SAVE">
                    <!-- <input type="button" name="back" value="BACK" a href="Export.php"></a> -->
                </div>
            </form>
    </div>

    <script type = "text/javascript">

        function validation(){

            var branch = document.getElementById('branch').value;
            var bankcode = document.getElementById('bankcode').value;
            var acno = document.getElementById('acno').value;
            var bankname = document.getElementById('bankname').value;
            var add1 = document.getElementById('add1').value;
            var add2 = document.getElementById('add2').value;
            var pincode = document.getElementById('pincode').value;
            var cityname = document.getElementById('cityname').value;
            var statename = document.getElementById('statename').value;

            if (branch == 0){  
                document.getElementById("branchname").innerHTML="*";  
                return false;  
            }else{
                document.getElementById("branchname").innerHTML="";  

            }

            if (bankcode == 0){  
                document.getElementById("bank").innerHTML="*";  
                return false;  
            }else{
                document.getElementById("bank").innerHTML="";  

            }

            if (acno.length != 14){  
                document.getElementById("ano").innerHTML="Enter Valid Length";  
                return false;  
            }else{
                document.getElementById("ano").innerHTML="";  

            }

            if (bankname == 0){  
                document.getElementById("bankn").innerHTML="*";  
                return false;  
            }else{
                document.getElementById("bankn").innerHTML="";  

            }

            if (add1 == 0){  
                document.getElementById("ad1").innerHTML="*";  
                return false;  
            }else{
                document.getElementById("ad1").innerHTML="";  

            }

            if (add2 == 0){  
                document.getElementById("ad2").innerHTML="*";  
                return false;  
            }else{
                document.getElementById("ad2").innerHTML="";  

            }

            if (isNaN(pincode)){  
                document.getElementById("pin").innerHTML="Number Only";  
                return false;  
            }else{
                document.getElementById("pin").innerHTML="";  

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
  
        }

    </script>

</body>
</html>