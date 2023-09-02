<?php


session_start();
require 'connection.php';
// echo $_SESSION['username'];

if(isset($_SESSION['username'])){

    if(isset($_POST['export'])){
        
        $code = $_POST['Export'];
        if($code == $_POST['Export']){
            
            header('location:Export.php');
            
        }
        else{
            
            echo "location:login.php"; 
        }
        
    }

    if(isset($_POST['import'])){
        
        $code = $_POST['Import'];
        if($code == $_POST['Import']){
            
            header('location:Import/Import.php');
            
        }
        else{
            
            echo "location:newkrishna.html"; 
        }
        
    }
}else{

    // echo "login First";
	header("location:login.php");
    
    
}


?>

<html>
    <link rel="stylesheet" href="style.css">
    <section class="header">
     <div class="login-wrap">
	   <div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Choice</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab"></label>
		<div class="login-form">
			<div class="sign-in-htm">
                <form method="POST">
				<div class="group">
                    <input type="submit" class="button" name="export" value="Export">
				</div>
				<div class="group">
                    <input type="submit" class="button" name="import" value="Import">
				</div>
                </form>
			</div>
		</div>
	   </div>
    </div>
    </section> 
</html>