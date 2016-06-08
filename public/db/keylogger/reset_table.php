<?php
include('../mysql_credentials.php');

$con = new mysqli( $mysql_server, $mysql_user, $mysql_pass, $mysql_db );

if ($con->connect_error) die ("Connection failed: " .$con->connect_error);

$query = 'DELETE FROM keylogger';

if($con->query($query)) {
  echo "All records from table 'keylogger' deleted successfully<br>";
} else {
  echo "Error: " . $query . "<br>" . $con->error;
}

$con->close();
