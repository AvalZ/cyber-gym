<?php
include('mysql_credentials.php');

$con = new mysqli( $mysql_server, $mysql_user, $mysql_pass, $mysql_db );

if ($con->connect_error) die ("Connection failed: " .$con->connect_error);

$query = 'CREATE TABLE datacapture( 
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  datakey VARCHAR(30) NOT NULL,
  datavalue VARCHAR(200) NOT NULL,
  timestamp VARCHAR(30) NOT NULL
  )';

if($con->query($query)) {
  echo "Table 'datacapture' created successfully<br>";
} else {
  echo "Error: " . $query . "<br>" . $con->error;
}

$con->close();
