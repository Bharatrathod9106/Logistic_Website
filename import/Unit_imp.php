<?php
session_start();
require 'connection.php';
if(isset($_SESSION['username'])){
    
    if(isset($_POST['submit'])){

        $unit = $_POST['unit']; 
        $unitcode = $_POST['unitcode'];

        $sql = "select * from unit WHERE unit ='$unit'";
        $result = mysqli_query($conn,$sql);
        $num = mysqli_num_rows($result);
 
        if($num > 0){
            ?>
                <script>
                    alert('Unit added already..');
                </script>    
            <?php
            
        }else{

            if($conn->connect_errno){  
                die('connection Failed : '.$conn->connect_errno);
                //echo " ";
            }else{
                $stmt = $conn->prepare("insert into unit(unit, unitcode) values(?, ?)");
                $stmt->bind_param("ss",$unit, $unitcode);
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
    <title>Unite Master</title>
    <link type="text/css" rel="stylesheet" href="Importmaster.css">
</head>
<body class="form-body">

    <div class="container">
        <div class="head">Unite Master</div>
            <form action="" method="post">

                 <div class="user-detail">

                    <div class="input-box">
                        <span class="detail">Unit</span>
                        <input type="text" placeholder="Enter Unit" required name="unit">
                    </div>
                    <div class="input-box">
                        <span class="detail">Unit Code</span>
                        <input type="text" placeholder="Enter Code" required name="unitcode">
                    </div>
                    
                </div>
                <div class="button">   
                    <input type="submit" name="submit" value="SAVE">
                    <!-- <input type="submit" value="Unite List"></a> -->
                </div>
            </form>
    </div>

</body>
</html>