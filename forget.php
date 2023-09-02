<?php

session_start();
require 'connection.php';
    if(isset($_POST['reset'])){
        
    $newpassword = $_POST['newpassword'];
    $newwpassword = $_POST['newwpassword'];
        
    if($newpassword==$newwpassword){
            
        $hash_pass = password_hash($newpassword, PASSWORD_DEFAULT);
        $reset_query = "UPDATE `login` SET `password`='".$hash_pass."'";
        $reset_reset = mysqli_query($conn, $reset_query);
        
        if($reset_reset){
            
            if(mysqli_affected_rows($conn)>0){
                
                header("location:login.php");    
            }
            else{
                ?>
                <script>
                    alert('Same Password..');
                </script>    
                <?php
            }
        }
        else{
            
            echo "no result from query...";
        }
    }
    else{
        ?>
        <script>
           alert('Password Dont Match');
        </script>    
        <?php
    }
}




?>

<html>
    <link rel="stylesheet" href="style.css">
    <section class="header">
     <div class="login-wrap">
	   <div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Forget Password</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab"></label>
		<div class="login-form">
			<div class="sign-in-htm">
                <form method="POST">
				<div class="group">
					<label for="newpass" class="label">Password</label>
					<input id="newpass" type="password" class="input" data-type="password" name="newpassword">
				</div>
    			<div class="group">
					<label for="newpass" class="label">Re - Password</label>
					<input id="newwpass" type="password" class="input" data-type="password"  name="newwpassword">
				</div>
				<div class="group">
					<input type="submit" class="button" name="reset" value="Reset">
				</div>
				<div class="hr"></div>
                </form>
			</div>
		</div>
	   </div>
    </div>
    </section> 
</html>