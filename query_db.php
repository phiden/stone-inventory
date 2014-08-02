<?php

//use the same connection structure as manage_db.php
$con = mysql_connect("localhost","root","root");

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
echo "<b>
<center>Database Output</center>
</b>
<br>
<br>";

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
	
	"<b>$id</b><br>
	<img src='$images'/><br>
	$name<br>
	$quantity<br>
	$shape<br>
	$color<br>
	$size<br>
	$mohs<br>
	$notes<br>
	";
	
	$i++;
	
}

?>