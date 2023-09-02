<?php
    
session_start();
require 'connection.php';
if(isset($_SESSION['username'])){

    $id = $_GET['id'];

    $query = "SELECT * FROM exchange where id=$id";
	
	$result = mysqli_query($conn,$query);

    $rows = mysqli_fetch_assoc($result);

    if(isset($_POST['submit'])){

        $id = $_GET['id'];

        $currencycode = $_POST['currencycode'];
        $unitinrs = $_POST['unitinrs'];
        $rate = $_POST['rate'];

        // $sql = "select * from exporter";
        // $result = mysqli_query($conn,$sql);
        // $num = mysqli_num_rows($result);

        if($conn->connect_errno){
            die('connection Failed : '.$conn->connect_errno);
            //echo " ";
        }else{

            $stmt = $conn->prepare("UPDATE `exchange` SET `currencycode`='$currencycode',`unitinrs`='$unitinrs',`rate`='$rate' WHERE id=$id");
            $stmt->bind_param("sii",$currencycode, $unitinrs, $rate);
            $stmt->execute();
            echo " ";
            $stmt->close();
            header('location:Exchange_list.php');
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
    <title>Exchange Master</title>
    <link type="text/css" rel="stylesheet" href="Importmaster.css">
</head>
<body class="form-body">
    <div class="container">
        <div class="head">Exchange Master</div>
            <form action="" method="post">

                 <div class="user-detail">

                    <div class="input-box">
                        <span class="detail">Currency Code</span>
                        <input type="text" placeholder="Enter Currency Coce" required name="currencycode" value="<?php echo $rows['currencycode'];?>">
                    </div>
                    <div class="input-box">
                        <span class="detail">Unit in Rs</span>
                        <input type="text" placeholder="Enter Unit Rs" required name="unitinrs" value="<?php echo $rows['unitinrs'];?>">
                    </div>
                    <div class="input-box">
                        <span class="detail">Rate</span>
                        <input type="text" placeholder="Enter Rate" required name="rate" value="<?php echo $rows['rate'];?>">
                    </div>
                </div>

                <div class="button">   
                    <input type="submit" name="submit" value="UPDATE">
                    <!-- <input type="submit" value="Exchange List"> -->
                </div>
            </form>
    </div>

</body>
</html>