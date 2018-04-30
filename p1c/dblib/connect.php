<?php
define('DBHOST', 'localhost');
define('DBUSER', 'root');
define('DBPW', 'root');
define('DBNAME', 'TEST');

$db = new mysqli('localhost', 'cs143', '', 'TEST');
if($db->connect_errno > 0){
  die('Error connecting to the database [' . $db->connect_error . ']');
}
?>