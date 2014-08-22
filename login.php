<?php 
$username = null;
$password = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    require_once('database-connect.php');
    
    if(!empty($_POST["username"]) && !empty($_POST["password"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
    
        $query = $connection->prepare("SELECT `user_id` FROM `users` WHERE `username` = ? and `password` = PASSWORD(?)");
        $query->bind_param("ss", $username, $password);
        $query->execute();
        $query->bind_result($userid);
        $query->fetch();
        $query->close();
        
        if(!empty($userid)) {
                	
            session_start();
            $session_key = session_id();
            
            $query = $connection->prepare("INSERT INTO `sessions` ( `user_id`, `session_key`, `session_address`, `session_useragent`, `session_expires`) VALUES ( ?, ?, ?, ?, DATE_ADD(NOW(),INTERVAL 1 HOUR) );");
            $query->bind_param("ssss", $userid, $session_key, $_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_USER_AGENT'] );
            $query->execute();
            $query->close();
            
            header('Location: logged-in.php');
            
       }
        
        else {
        
        	
            header('Location: login.php');
            echo "<br>Failed miserably<br>";
        	echo $userid;
        	echo "<br>";
        }
        
    } else {
        
        echo "<br>This is still executing.</br>";
        header('Location: login.php');
    }
    
} else {

echo 
	'<html>
	 <head>
	
		<title>The Stone Inventory</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		
		<link href="css/screen.css" media="screen" rel="stylesheet" type="text/css" />

		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="js/vendor/jquery.ui.widget.js"></script>
		<script src="js/jquery.iframe-transport.js"></script>
		<script src="js/jquery.fileupload.js"></script>
		<script src="js/stone-inventory.js"></script>
		
	</head>
	
	<body>
	<div id="global-wrapper">
		<header>
			<img src="diamond.png" id="logo"/>
		    <h3>Oh, hello!<br>   
		    Please log in.</h3>   
	    </header>
    
	    <section id="content">
	        <form id="login" method="post">
	            <label for="username">Username:</label>
	            <input id="username" name="username" type="text" required>
	            <br>
	            <label for="password">Password:</label>
	            <input id="password" name="password" type="password" required>                    
	            <br />
	            <input id="login-submit" type="submit" value="Login">
	        </form>
	    </section>'
	    ;
    
  } ?>