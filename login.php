<?php

    session_start();
    require 'connection.php';
    if(isset($_POST['submit']))
    {
        
        $username = $_POST['username'];
        $password = $_POST['password'];
        $_SESSION['username'] = $username;

        $sql = "select * from login where username='$username'";
        $result = mysqli_query($conn,$sql);
        $num = mysqli_num_rows($result);
        
        if($num == 1){
            
            $row = mysqli_fetch_assoc($result);
            
            $verify = password_verify($password,$row['password']);
            
            if($verify == 1){
                header('location:choice.php');
            }else{
                ?>
                <script>
                    alert('incorrect pass..');
                </script>    
                <?php
            }
        }
        else{
            ?>
                <script>
                    alert('incorrect Username..');
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
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab"></label>
		<div class="login-form">
			<div class="sign-in-htm">
                <form method="POST">
				<div class="group">
					<label for="user" class="label">Username</label>
					<input id="user" type="email" class="input" autocomplete="off" required name="username">
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input id="pass" type="password" class="input" data-type="password" required name="password">
                    
				</div>
				<div class="group">
					<input type="submit" class="button" name="submit" value="Sign In"><a href="choice.php"></a>
				</div>
				<div class="hr"></div>
				<div class="foot-lnk">
					<a href="request.php">Forgot Password?</a>
				</div>
                </form>
			</div>
		</div>
	   </div>
    </div>
    </section> 
</html>