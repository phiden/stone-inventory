<?php

//use the same connection structure as manage_db.php
$con = mysql_connect("localhost","root","root");
//$con = mysql_connect("mysql.sophiadengo.com","*","*");

  // The statement above has just tried to connect to the database.
  // If the connection failed for any reason (such as wrong username
  // and or password, we will print the error below and stop execution
  // of the rest of this php script
  if (!$con)
  {
    die('Could not connect: ' . mysql_error());
  }
  
//pick your database
mysql_select_db("stone_inventory", $con) or die ("Unable to select database");

//set up your query from a particular table
$query="SELECT * FROM stones";$result=mysql_query($query);

//get number of rows of results.
$num=mysql_numrows($result);

//close the connection
mysql_close($con);

//print this sucker to the screen
echo "<h1>Your Stone Inventory</h1>";

$i=0;while ($i < $num) {

	$id = mysql_result($result,$i,"id");
	$images = mysql_result($result,$i,"images");
	$name = mysql_result($result,$i,"name");
	$quantity = mysql_result($result,$i,"quantity");
	$shape = mysql_result($result,$i,"shape");
	$color = mysql_result($result,$i,"color");
	$size = mysql_result($result,$i,"size");
	$mohs = mysql_result($result,$i,"mohs");
	$notes = mysql_result($result,$i,"notes");
	
	echo 
	
	"
	<div class='stone-article'>
	<div class='stone-image' id='$id'>
		<img src='$images'/>
	</div>
	
	<div class='stone-info'>
		
		<h3>$name</h3>
		<p><span class='bold'>In stock:</span> $quantity</p>
		<p><span class='bold'>Shape:</span> $shape</p>
		<p><span class='bold'>Color:</span> $color | <span class='bold'>Size:</span> $size | <span class='bold'>Mohs:</span> $mohs</p>
		<div class='notes'><span class='bold'>Remember: </span></br>$notes</div>
	</div>
	
	</div>
	";
	
	$i++;
	
}

?>