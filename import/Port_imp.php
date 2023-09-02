<?php

session_start();
require 'connection.php';
if(isset($_SESSION['username'])){
    
    if(isset($_POST['submit'])){

        $portname = $_POST['portname'];
        $portcode = $_POST['portcode'];

        $sql = "select * from port WHERE portname='$portname'";
        $result = mysqli_query($conn,$sql);
        $num = mysqli_num_rows($result);
    
        if($num > 0){
            ?>
                <script>
                    alert('Port added already..');
                </script>    
            <?php

        }else{

            if($conn->connect_errno){  
                die('connection Failed : '.$conn->connect_errno);
                //echo " ";
            }else{
                $stmt = $conn->prepare("insert into port(portname, portcode) values(?, ?)");
                $stmt->bind_param("ss",$portname, $portcode);
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
    <title>Port Master</title>
    <link type="text/css" rel="stylesheet" href="Importmaster.css">  
</head>
<body class="form-body">

    <div class="container">
        <div class="head">Port Master</div>
        <form action="" method="post">
            
            <div class="user-detail">

                <div class="input-box">
                    <span class="detail">Port Name</span>
                    <input type="text" placeholder="Enter Port Name" required name="portname">
                </div>
                <div class="input-box">
                    <span class="detail">Port Code</span>
                    <input type="text" placeholder="Enter Port Code" required name="portcode">
                </div>

            </div>
            <div class="button">   
                <input type="submit" name="submit" value="SAVE">
                <!-- <input type="submit" value="Port List"></a> -->
            </div>

        </form>
    </div>
</body>
</html> 