<?php
global $connection;

if ( isset( $connection ) )
    return;

$connection = new mysqli("localhost", "root", "root", "stone_inventory");

if (mysqli_connect_errno()) {        
   
    die(sprintf("Connect failed: %s\n", mysqli_connect_error()));

}
?>