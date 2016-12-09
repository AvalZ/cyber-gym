<?php
include('mysql_credentials.php');

$con = new mysqli( $mysql_server, $mysql_user, $mysql_pass, $mysql_db );

if ($con->connect_error) die ("Connection failed: " .$con->connect_error);

$query = 'CREATE TABLE messages( 
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  dest_id int(11) NOT NULL,
  content VARCHAR(140) NOT NULL
  )';

if($con->query($query)) {
  echo "Table 'messages' created successfully<br>";
} else {
  echo "Error: " . $query . "<br>" . $con->error;
}

$con->close();
