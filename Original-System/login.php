<?php 
include_once 'config/config.php';
include_once 'classes/user-class.php';

$user = new User();
if($user->get_session()){
	header("location: index.php");
}
if(isset($_REQUEST['submit'])){
	extract($_REQUEST);
	$login = $user->check_login($UserId,md5($UserPass));
	// $login = $user->check_login($UserId,$UserPass);
	if($login){
		header("location: index.php");
	}else{
		?>
			<div class="error-notif">Invalid UserId or Password!</div>
		<?php
	}
}
?>
<!DOCTYPE html>
<html>
	<head>
    	<meta charset="UTF-8">
        <title>Neneng's Sizzling Eatery</title>
        <link rel="stylesheet" href="css/login.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&family=Sofia+Sans&display=swap" rel="stylesheet">
    </head>
    <body>
            <div class="loginCon">
                <form method="POST" action="" name="login">
					<h1>RNC</h1> 
					<p>Sizzling and Steakhouse</p>
					<label for="UserId"><a>UserId</a></label>
					<input type="text" class="input" required name="UserId" placeholder="Enter User Id">

					<label for="UserPass"><a>Password</a></label>
					<input type="password" class="input" required name="UserPass" placeholder="Enter Password"/>

					<button type="submit" class="field "name="submit" value="Submit">Login
                </form>    
            </div>  
    </body>
</html>
