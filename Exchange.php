<?php
session_start();
require 'connection.php';
if(isset($_SESSION['username'])){
    if(isset($_POST['submit'])){

        $currencycode = $_POST['currencycode']; 
        $unitinrs = $_POST['unitinrs'];
        $rate = $_POST['rate'];

        $sql = "select * from exchange WHERE currencycode ='$currencycode'";
        $result = mysqli_query($conn,$sql);
        $num = mysqli_num_rows($result);

        if($num > 0){
            ?>
                <script>
                    alert('Exchange added already..');
                </script>    
            <?php
            
        }else{
        
            if($conn->connect_errno){  
                die('connection Failed : '.$conn->connect_errno);
                //echo " ";
            }else{
                $stmt = $conn->prepare("insert into exchange(currencycode, unitinrs, rate) values(?, ?, ?)");
                $stmt->bind_param("sii",$currencycode, $unitinrs, $rate);
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
    <title>Exchange Master</title>
    <link type="text/css" rel="stylesheet" href="allform.css">
</head>
<body class="form-body">
    <div class="container">
        <div class="head">Exchange Master</div>
            <form action="" method="post">

                 <div class="user-detail">

                    <div class="input-box">
                        <span class="detail">Currency Code</span>
                        <input type="text" placeholder="Enter Currency Coce" required name="currencycode">
                    </div>
                    <div class="input-box">
                        <span class="detail">Unit in Rs</span>
                        <input type="text" placeholder="Enter Unit Rs" required name="unitinrs">
                    </div>
                    <div class="input-box">
                        <span class="detail">Rate</span>
                        <input type="text" placeholder="Enter Rate" required name="rate">
                    </div>
                </div>

                <div class="button">   
                    <input type="submit" name="submit" value="SAVE">
                </div>
            </form>
    </div>

</body>
</html>