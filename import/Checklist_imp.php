<?php
    session_start();
    require 'connection.php';
    if(isset($_SESSION['username'])){
        
        $jobno = "SELECT * FROM impnewdoc1";
        $job_qry = mysqli_query($conn, $jobno);

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
    <title>Checklist Generation</title>
    <link type="text/css" rel="stylesheet" href="Importmaster.css">
</head>

<body class="form-body">

    <div class="container">
        <div class="head">Checklist Generation</div>
            <form action="Checklist1_imp.php" method="post">

                <div class="user-detail">
                    <div class="input-box">
                        <span class="detail">Job No:</span>
                        <select class="option" name="jobno">
                                <option value="">Select Job</option>
                                <?php
                                    while($row = mysqli_fetch_assoc($job_qry)){
                                        echo "<option>".$row['jobno']."</option>";
                                    }
                                ?>
                        </select>
                    </div>
                </div>

                <div class="button">   
                    <input type="submit" value="View">
                    <!-- <input type="button" name="pdf" value="PDF"> -->
                    <input type="button" name="back" value="BACK">
                </div>
        </form>
    </div>

</body>
</html>