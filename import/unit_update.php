<?php
    
session_start();
require 'connection.php';
if(isset($_SESSION['username'])){

    $id = $_GET['id'];

    $query = "SELECT * FROM unit where id=$id";
	
	$result = mysqli_query($conn,$query);

    $rows = mysqli_fetch_assoc($result);

    if(isset($_POST['submit'])){

        $id = $_GET['id'];

        $unit = $_POST['unit'];
        $unitcode = $_POST['unitcode'];
        
        // $sql = "select * from exporter";
        // $result = mysqli_query($conn,$sql);
        // $num = mysqli_num_rows($result);

        if($conn->connect_errno){
            die('connection Failed : '.$conn->connect_errno);
            //echo " ";
        }else{

            $stmt = $conn->prepare("UPDATE `unit` SET `unit`='$unit',`unitcode`='$unitcode' WHERE id=$id");
            $stmt->bind_param("ss",$unit, $unitcode);
            $stmt->execute();
            echo " ";
            $stmt->close();
            header('location:Unit_list.php');
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
    <link type="text/css" rel="stylesheet" href="allform.css">
</head>
<body class="form-body">

    <div class="container">
        <div class="head">Unite Master</div>
            <form action="" method="post">

                 <div class="user-detail">

                    <div class="input-box">
                        <span class="detail">Unit</span>
                        <input type="text" placeholder="Enter Unit" required name="unit" value="<?php echo $rows['unit'];?>">
                    </div>
                    <div class="input-box">
                        <span class="detail">Unit Code</span>
                        <input type="text" placeholder="Enter Code" required name="unitcode" value="<?php echo $rows['unitcode'];?>">
                    </div>
                    
                </div>
                <div class="button">   
                    <input type="submit" name="submit" value="UPDATE">
                    <!-- <input type="submit" value="Unite List"></a> -->
                </div>
            </form>
    </div>

</body>
</html>