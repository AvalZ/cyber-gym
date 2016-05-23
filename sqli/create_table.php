<?php
include('mysql_credentials.php');

$con = new mysqli( $mysql_server, $mysql_user, $mysql_pass, $mysql_db );

if ($con->connect_error) die ("Connection failed: " .$con->connect_error);

$query = 'CREATE TABLE accounts( 
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  first_name VARCHAR(30) NOT NULL,
  last_name VARCHAR(30) NOT NULL,
  email VARCHAR(50),
  password VARCHAR(50)
  )';

if($con->query($query)) {
  echo "Table 'accounts' created successfully";
} else {
  echo "Error: " . $query . "<br>" . $con->error;
}

$con->close();
