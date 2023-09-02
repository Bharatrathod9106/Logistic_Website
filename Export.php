<?php

session_start();

if(isset($_SESSION['username'])){

    // echo $_SESSION['username'];
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
    <title>Export</title>
    <link type="text/css" rel="stylesheet" href="exportt.css">
</head>
<body class ="body">
    
    <div class="manu-bar">
    <ul>
        
        <li class="li-list"><b><a href="#">Export Master</a></b>
        <div class="sub-manu-1">
            <ul class="ul-list">
                <li class="li-list-1"><a class="a-list" href="Exporter.php">Exporter master</a></li>
                <li class="li-list-1"><a class="a-list" href="ADcode.php">ADcode master</a></li> 
                <li class="li-list-1"><a class="a-list" href="Consignee.php">Consignee master</a></li>
                <li class="li-list-1"><a class="a-list" href="Exchange.php">Exchange master</a></li>
                <li class="li-list-1"><a class="a-list" href="Currency.php">Currency master</a></li>
                <li class="li-list-1"><a class="a-list" href="Unit.php">Unit master</a></li> 
                <li class="li-list-1"><a class="a-list" href="Port.php">Port master</a></li>
                <li class="li-list-1"><a class="a-list" href="Irtccode.php">IRTC master</a></li>
            </ul>       
        </div>
        </li>
        <li class="li-list"><b><a href="#">Transactions</a></b>
        <div class="sub-manu-1">
            <ul class="ul-list">
                <li class="li-list-1"><a class="a-list" href="Newdoc1.php">New Document</a></li>
                <li class="li-list-1"><a class="a-list" href="job.php">Job delete</a></li>
                <li class="li-list-1"><a class="a-list" href="Annexure1.php">Annexure-c(SEA)</a></li>
            </ul>       
        </div>
        </li>
        <li class="li-list"><b><a href="#">Generation</a></b>
        <div class="sub-manu-1">
            <ul class="ul-list">
                <li class="li-list-1"><a class="a-list" href="Checklist.php">Checklist Generation</a></li>
            </ul>       
        </div>
        </li>
        <!-- <li class="li-list"><a href="#">Job Search</a></li> -->
        <li class="li-list"><b><a href="#">Admin</a></b>
        <div class="sub-manu-1">
            <ul class="ul-list">
                <li class="li-list-1"><a class="a-list" href="forget.php">Loggin Password Setting</a></li>
                <!-- <li class="li-list-1"><a class="a-list" href="#">All jobs delete</a></li> -->
            </ul>       
        </div>  
        </li>
        <li class="li-list"><b><a href="#">Manage List</a></b>
        <div class="sub-manu-1">
            <ul class="ul-list">
                <li class="li-list-1"><a class="a-list" href="Exporter_list.php">Exporterer List</a></li>
                <li class="li-list-1"><a class="a-list" href="ADcode_list.php">ADcode List</a></li> 
                <li class="li-list-1"><a class="a-list" href="Consignee_list.php">Consignee List</a></li>
                <li class="li-list-1"><a class="a-list" href="Exchange_list.php">Exchange List</a></li>
                <li class="li-list-1"><a class="a-list" href="Currency_list.php">Currency List</a></li>
                <li class="li-list-1"><a class="a-list" href="Unit_list.php">Unit List</a></li> 
                <li class="li-list-1"><a class="a-list" href="Port_list.php">Port List</a></li>
                <li class="li-list-1"><a class="a-list" href="irtc_list.php">IRTC master</a></li>
            </ul>       
        </div>
        </li>
        
        <li class="li-list"><b><a href="logout.php">Logout</a></b></li>
        
    </ul>
    </div>

    <div class="center">
        <a href=""></a><img src="logo/llogo.png"></a>
    </div> 
</body>
</html>