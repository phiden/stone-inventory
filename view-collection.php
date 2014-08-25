<?php 

	session_start();
	if(isset($_SESSION['loggedIn'])) { ?>

		<? include ("header.php"); ?>
		<? include ("nav.php"); ?>
		
		<div id="database-data">
		
			<? include("query_db.php"); ?>
			
		</div>
		
		<? include ("footer.php"); ?>
		
		<?php } else {
			
			header('Location: login.php');
			die();
		}
		
?>