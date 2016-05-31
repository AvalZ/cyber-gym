<?php
include('../db/mysql_credentials.php');

if (!isset($_GET['email'])) {
  echo "<form action=''>";
  echo "<label for='email'>Search by email</label><input name='email'>";
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


  echo "<table>";
  echo "<tr><th>First Name</th><th>Last Name</th><th>Email</th></tr>";

  while( $row = $result->fetch_assoc() ) {
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $email = $row['email'];

    echo "<tr><td>$first_name</td><td>$last_name</td><td>$email</td></tr>";
  }

  echo "</table>";

}
