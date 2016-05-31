<?php
include('../db/mysql_credentials.php');

if (!isset($_GET['email'])) {
  echo "<form action=''>";
  echo "<label for='email'>Validate email: does this email exist in the DB?</label><input name='email'>";
  echo "</form>";
} else {
  $email = $_GET['email'];
  
  $con = new mysqli( $mysql_server, $mysql_user, $mysql_pass, $mysql_db );
  $query = "SELECT * FROM accounts WHERE email='$email'";
  //    SELECT * FROM accounts WHERE email='' UNION SELECT 1,User(),(SELECT user FROM mysql.user LIMIT 0,1),4,'5 ';

  $result = $con->query($query);

  if ($con->error) {
    echo "Query error: " .$con->error;
  }


  if( $row = $result->num_rows > 0) {
    echo "YES";
  } else {
    echo "NO";
  }


}
