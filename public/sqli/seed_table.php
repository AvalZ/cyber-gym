<?php
include('mysql_credentials.php');

$con = new mysqli( $mysql_server, $mysql_user, $mysql_pass, $mysql_db );

if ($con->connect_error) die ("Connection failed: " .$con->connect_error);

$records = array();

$records[0] = array( "Arthur", "Dent", "arthur@guide.com", "Bathrobe");
$records[1] = array( "Ford", "Prefect", "ford@guide.com", "Betelgeuse");
$records[2] = array( "Tricia", "McMillan", "tricia@guide.com", "Trillian");
$records[3] = array( "Zaphod", "Beeblebrox", "zaphod@guide.com", "Pan-GalacticGargleBlaster");

foreach ($records as $rec) {
  $query = "INSERT INTO accounts (first_name, last_name, email, password) 
    VALUE ('$rec[0]', '$rec[1]', '$rec[2]', SHA1('$rec[3]'))";

  if($con->query($query)) {
    echo "Records inserted\n";
  } else {
    echo "Error: " . $query . "<br>" . $con->error;
  }
}

$con->close();
