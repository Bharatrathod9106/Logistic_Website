<?php
session_start();
require 'connection.php';

    if(isset($_POST['sendcode'])){

        $username = $_POST['username'];
        $user = "krishnaimpex20222@gmail.com";
        
        if($user == $username){
        
            $username = $_POST['username'];
            $randomcode = mt_rand(0,999999);
            $_SESSION['random'] = $randomcode;
            $message = "Your reset code is ".$randomcode;
            $subject = "Reset Code";
            $to = "krishnaimpex20222@gmail.com";
            $result = mail($to,$subject,$message);
            echo ("The code has benn send to ".$to);
            $_SESSION['username'] = $username;

        }else{
            ?>
                <script>
                    alert('Enter Valid Email ..!');
                </script>    
            <?php
        }
        
    }

    if(isset($_POST['verify'])){
        
        $code = $_POST['verifycode'];
        if($code == $_SESSION['random']){
            
            header('location:forget.php');
            
        }
        else{
            
            echo "Wrong Code"; 
        }
        
    }


?>

<html>
    <link rel="stylesheet" href="style.css">

    <section class="header">
     <div class="login-wrap">
	   <div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Request</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab"></label>
		<div class="login-form">
			<div class="sign-in-htm">
                <form method="POST">
				<div class="group">
					<label for="username" class="label">Email</label>
					<input id="username" type="email" class="input" placeholder="abc@gamil.com" name="username">
				</div> 
    			<div class="group">
					<input type="submit" class="button" name="sendcode" value="Send">
				</div>
				<div class="group">
					<label for="username" class="label">Enter OTP</label>
					<input id="otp" type="text" name="verifycode" class="input" placeholder="123456"  name="otp">
				</div>
				<div class="group">
                    <input type="submit" class="button" name="verify" value="Verify Code">
				</div>
				<div class="hr"></div>
                </form>
			</div>
		</div>
	   </div>
    </div>
    </section> 
</html>