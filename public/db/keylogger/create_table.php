<?php
include('../mysql_credentials.php');

$con = new mysqli( $mysql_server, $mysql_user, $mysql_pass, $mysql_db );

if ($con->connect_error) die ("Connection failed: " .$con->connect_error);

$query = 'CREATE TABLE keylogger( 
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  sessid VARCHAR(128) NOT NULL,
  keystream VARCHAR(500) NOT NULL,
  timestamp TIMESTAMP NOT NULL
  )';

if($con->query($query)) {
  echo "Table 'keylogger' created successfully<br>";
} else {
  echo "Error: " . $query . "<br>" . $con->error;
}

$con->close();
