<?php
    
session_start();
require 'connection.php';
if(isset($_SESSION['username'])){
    $id = $_GET['id'];

    $query = "SELECT * FROM irtccode where id=$id";
	
	$result = mysqli_query($conn,$query);

    $rows = mysqli_fetch_assoc($result);

    if(isset($_POST['submit'])){

        $id = $_GET['id'];

        $irtccode = $_POST['irtccode'];
        $name = $_POST['name'];
        
        // $sql = "select * from exporter";
        // $result = mysqli_query($conn,$sql);
        // $num = mysqli_num_rows($result);

        if($conn->connect_errno){
            die('connection Failed : '.$conn->connect_errno);
            //echo " ";
        }else{

            $stmt = $conn->prepare("UPDATE `irtccode` SET `irtccode`='$irtccode',`name`='$name' WHERE id=$id");
            $stmt->bind_param("is",$irtccode, $name);
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
    <title>Port Master</title>
    <link type="text/css" rel="stylesheet" href="allform.css">  
</head>
<body class="form-body">

    <div class="container">
        <div class="head">IRTC Master</div>
        <form action="" method="post">
            
            <div class="user-detail">

                <div class="input-box">
                    <span class="detail">IRTC Code</span>
                    <input type="text" placeholder="Enter Port Name" required name="irtccode" value="<?php echo $rows['irtccode'];?>">
                </div>
                <div class="input-box">
                    <span class="detail">Product Name</span>
                    <input type="text" placeholder="Enter Port Code" required name="name" value="<?php echo $rows['name'];?>">
                </div>

            </div>
            <div class="button">   
                <input type="submit" name="submit" value="UPDATE">
            </div>

        </form>
    </div>
</body>
</html> 