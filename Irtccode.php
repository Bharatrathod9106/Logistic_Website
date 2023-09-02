<?php

session_start();
require 'connection.php';
if(isset($_SESSION['username'])){
    if(isset($_POST['submit'])){

        $irtccode = $_POST['irtccode'];
        $name = $_POST['name'];
    
        $sql = "select * from irtccode WHERE irtccode = '$irtccode'";
        $result = mysqli_query($conn,$sql);
        $num = mysqli_num_rows($result);

        if($num > 0){
            ?>
                <script>
                    alert('IRTC added already..');
                </script>    
            <?php
            
        }else{
    
            if($conn->connect_errno){  
                die('connection Failed : '.$conn->connect_errno);
            }else{
            
                $stmt = $conn->prepare("insert into irtccode(irtccode, name) values(?, ?)");
                $stmt->bind_param("is",$irtccode, $name);
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
    <title>Port Master</title>
    <link type="text/css" rel="stylesheet" href="allform.css">  

    <style>
    .val{

        font-size: 10px;
        color: red;
        /* padding-left: 20px; */
    }
    </style>
</head>
<body class="form-body">

    <div class="container">
        <div class="head">IRTC Master</div>
        <form action="" method="post" onsubmit="return validation()">
            
            <div class="user-detail">

                <div class="input-box">
                    <span class="detail">IRTC Code</span>
                    <input type="text" placeholder="Enter Port Name" name="irtccode" id="irtccode">
                    <span id = "irtc" class="val"> </span>
                </div>
                <div class="input-box">
                    <span class="detail">Product Name</span>
                    <input type="text" placeholder="Enter Port Code" name="name" id="name">
                    <span id = "nam" class="val"> </span>
                </div>

            </div>
            <div class="button">   
                <input type="submit" name="submit" value="SAVE">
            </div>
            

        </form>
    </div>

    <script type = "text/javascript">

        function validation(){

            var irtccode = document.getElementById('irtccode').value;
            var name = document.getElementById('name').value;
           
            if (irtccode.length != 8){  
                document.getElementById("irtc").innerHTML="Enter Valid Detail";  
                return false;  
            }else{
                document.getElementById("irtc").innerHTML="";  

            }
            if (!isNaN(name)){  
                document.getElementById("nam").innerHTML="Character only";  
                return false;  
            }else{
                document.getElementById("nam").innerHTML="";  

            }
        }

    </script>
    
</body>
</html> 