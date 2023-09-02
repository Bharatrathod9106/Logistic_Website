<?php
    
session_start();
require 'connection.php';
if(isset($_SESSION['username'])){

    $id = $_GET['id'];

    $query = "SELECT * FROM currency where id=$id";
	
	$result = mysqli_query($conn,$query);

    $rows = mysqli_fetch_assoc($result);

    if(isset($_POST['submit'])){

        $id = $_GET['id'];

        $currencyname = $_POST['currencyname'];
        $currencycode = $_POST['currencycode'];
        
        // $sql = "select * from exporter";
        // $result = mysqli_query($conn,$sql);
        // $num = mysqli_num_rows($result);

        if($conn->connect_errno){
            die('connection Failed : '.$conn->connect_errno);
            //echo " ";
        }else{

            $stmt = $conn->prepare("UPDATE `currency` SET `currencyname`='$currencyname',`currencycode`='$currencycode' WHERE id=$id");
            $stmt->bind_param("ss",$currencyname, $currencycode);
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
    <title>Currency Master</title>
    <link type="text/css" rel="stylesheet" href="allform.css">
</head>
<body class="form-body">

    <div class="container">
        <div class="head">Currency Master</div>
            <form action="" method="post">

                 <div class="user-detail">

                    <div class="input-box">
                        <span class="detail">Currency Name</span>
                        <input type="text" placeholder="Enter Currency Name" required name="currencyname" value="<?php echo $rows['currencyname'];?>">
                    </div>
                    <div class="input-box">
                        <span class="detail">Currency Code</span>
                        <input type="text" placeholder="Enter Currency Code" required name="currencycode" value="<?php echo $rows['currencycode'];?>">
                    </div>
                </div>

                <div class="button">   
                    <input type="submit" name="submit" value="UPDATE">
                </div>
        </form>
    </div>

</body>
</html>