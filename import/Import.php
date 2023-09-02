<?php

    session_start();
    require 'connection.php';
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
    <title>Import</title>
    <link type="text/css" rel="stylesheet" href="Import.css">
</head>
<body class ="body">
    
    <div class="manu-bar">
    <ul>
        
        <li class="li-list"><b><a href="#">Importer Master</a></b>
        <div class="sub-manu-1">
            <ul class="ul-list">
                <li class="li-list-1"><a class="a-list" href="Importer_imp.php">Importer master</a></li>
                <li class="li-list-1"><a class="a-list" href="ADcode_imp.php">ADcode master</a></li> 
                <li class="li-list-1"><a class="a-list" href="Supplier_imp.php">Supplier master</a></li>
                <li class="li-list-1"><a class="a-list" href="Exchange_imp.php">Exchange master</a></li>
                <li class="li-list-1"><a class="a-list" href="Currency_imp.php">Currency master</a></li>
                <li class="li-list-1"><a class="a-list" href="Unit_imp.php">Unit master</a></li> 
                <li class="li-list-1"><a class="a-list" href="Port_imp.php">Port master</a></li>
                <li class="li-list-1"><a class="a-list" href="Irtccode.php">IRTC master</a></li>
            </ul>       
        </div>
        </li>
        <li class="li-list"><b><a href="#">Transactions</a></b>
        <div class="sub-manu-1">
            <ul class="ul-list">
                <li class="li-list-1"><a class="a-list" href="Newdoc_imp1.php">New Document</a></li>
                <li class="li-list-1"><a class="a-list" href="Igm_imp1.php">IGM Details</a></li>
                <li class="li-list-1"><a class="a-list" href="job.php">Job Delete</a></li>
            </ul>       
        </div>
        </li>
        <li class="li-list"><b><a href="#">Generation</a></b>
        <div class="sub-manu-1">
            <ul class="ul-list">
                <li class="li-list-1"><a class="a-list" href="Checklist_imp.php">Checklist Generation</a></li>
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
        <li class="li-list"><b><a href="#">Lists</a></b>
        <div class="sub-manu-1">
            <ul class="ul-list">
                <li class="li-list-1"><a class="a-list" href="Importer_list.php">Importer List</a></li>
                <li class="li-list-1"><a class="a-list" href="ADcode_list.php">ADcode List</a></li> 
                <li class="li-list-1"><a class="a-list" href="Supplier_list.php">Supplier List</a></li>
                <li class="li-list-1"><a class="a-list" href="Exchange_list.php">Exchange List</a></li>
                <li class="li-list-1"><a class="a-list" href="Currency_list.php">Currency List</a></li>
                <li class="li-list-1"><a class="a-list" href="Unit_list.php">Unit List</a></li> 
                <li class="li-list-1"><a class="a-list" href="Port_list.php">Port List</a></li>
                <li class="li-list-1"><a class="a-list" href="irtc_list.php">IRTC List</a></li>
            </ul>       
        </div>
        </li>
        
        <li class="li-list"><b><a href="logout.php">Logout</a></b></li>
        
    </ul>
    </div>

    <div class="center">
        <!-- <p>WELCOME TO OUR WEBSITE </p> -->
        <a href=""></a><img src="logo/llogo.png"></a>
    </div> 
</body>
</html>