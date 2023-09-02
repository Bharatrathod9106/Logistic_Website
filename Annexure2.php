<?php

session_start();
require 'connection.php';
if(isset($_SESSION['username'])){

    $jobno = "SELECT * FROM newdoc1";
    $job_qry = mysqli_query($conn, $jobno); 
    
    if(isset($_POST['submit'])){

        $jobno = $_POST['jobno'];
        $contno = $_POST['contno'];
        $size = $_POST['size'];
        $type = $_POST['type'];
        $sealno = $_POST['sealno'];
        $sealdate = $_POST['sealdate'];
        $sealindi = $_POST['sealindi'];
 
        $sql = "select * from ann2";
        $result = mysqli_query($conn,$sql);
        $num = mysqli_num_rows($result);

        if($conn->connect_errno){
            die('connection Failed : '.$conn->connect_errno);
            //echo " ";
        }else{
            $stmt = $conn->prepare("insert into ann2(jobno, contno, size, type, sealno, sealdate, sealindi) values(?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("isissss", $jobno, $contno, $size, $type, $sealno, $sealdate, $sealindi);
            $stmt->execute();
            echo " ";
            $stmt->close();
            header('location:Annexure3.php');
        }
    }

    // if(isset($_POST['submit'])){

    //     if($conn->connect_errno){
    //         die('connection Failed : '.$conn->connect_errno);
    //         //echo " ";
    //     }else{
    //         header('location:Annexure3.php');
    //     }
    // }
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
    <title>Annexure-c</title>
    <link type="text/css" rel="stylesheet" href="transaction.css">
    <style>
        .option{

            /* padding: 1px; */
            padding-right: 15px;
            /* padding-left: 5px; */
            font-size: 14px;

        }
    </style>   
</head>
<body class="form-body">

    <div class="container">
        <!-- <div class="head">Annexure-c(SEA)</div> -->
            <form action="" method="post">

                <div class="user-detail">
                    <div class="input-box">
                        <span class="detail">Job no </span>
                            <select class="option" name="jobno">
                                <option value="">select value</option>
                                <?php
                                    while($row = mysqli_fetch_assoc($job_qry)){
                                        echo "<option>".$row['jobno']."</option>";
                                    }
                                ?>
                            </select>
                    </div>
                    <div class="input-box">
                        <span class="detail">Container no</span>
                        <input type="text" placeholder="Enter container no" name="contno">
                    </div>
                    <div class="input-box">
                        <span class="detail">Size</span>
                        <select class="option" name="size">
                            <option>Select Option</option>
                            <option>20</option>
                            <option>40</option>
                        </select>
                    </div>
                    <div class="input-box">
                        <span class="detail">Type</span>
                        <select class="option" name="type">
                            <option>Select Option</option>
                            <option>G</option>
                            <option>P</option>
                        </select>
                    </div>
                    <div class="input-box">
                        <span class="detail">Excise seal no</span>
                        <input type="text" placeholder="Enter excise no" name="sealno">
                    </div>
                    <div class="input-box">
                        <span class="detail">Seal date</span>
                        <input type="date" placeholder="Enter the Number" name="sealdate">
                    </div>
                    <div class="input-box">
                        <span class="detail">Seal type indicator</span>
                        <select class="option" name="sealindi">
                            <option>Select Option</option>
                            <option>BTSL</option>
                            <option>ESEAL</option>
                            <option>RFID</option>
                        </select>
                    </div>

                    <!-- <div class="button">
                        <input type="submit" name="add1" value="ADD">
                    </div> -->
                    <!-- <table border='2px' cellspacing='1' cellpadding='30'>
                    <tr bgcolor='87cefa'>

                        <th>JOB NO</th>
                        <th>CONTAINER NO</th>
                        <th>SIZE</th>
                        <th>TYPE</th>
                        <th>EXCISE SEAL NO</th>
                        <th>SEAL DATE</th>
                        <th>SEAL TYPE indicator</th>
                        <!-- <input type="submit" name="add" value="ADD"></a> -->
                    </tr>

                    <!-- <?php
                        while($rows = mysqli_fetch_array($resultt,MYSQLI_ASSOC))
                        {
                    ?>  -->
                    <tr>
                        <td><?php echo $rows['jobno']; ?></td>
                        <td><?php echo $rows['contno']; ?></td>
                        <td><?php echo $rows['size']; ?></td>
                        <td><?php echo $rows['type']; ?></td>
                        <td><?php echo $rows['sealno']; ?></td>
                        <td><?php echo $rows['sealdate']; ?></td>
                        <td><?php echo $rows['sealindi']; ?></td>                    
                    </tr>
                    <?php 
                        }
                    ?>

                </table> -->

                <div class="button">   
                    <input type="submit" name="submit" value="NEXT">
                </div>
            </form>
    </div>

</body>
</html>