<?php

include('../db/mysql_credentials.php');

$badAgents = array('sqlmap','sql', 'map');
foreach($badAgents as $agent) {
    if(strpos($_SERVER['HTTP_USER_AGENT'],$agent) !== false) {
        die("Sqlmap is not allowed");
    }
}

if (!isset($_GET['email'])) {
  echo "<form action=''>";
  echo "<label for='email'>Recover password for your email: </label><input name='email'>";
  echo "</form>";
} else {

  $email = $_GET['email'];
  
  $con = new mysqli( $mysql_server, $mysql_user, $mysql_pass, $mysql_db );
  $query = "SELECT * FROM accounts WHERE email='$email'";
  //    SELECT * FROM accounts WHERE email='' UNION SELECT 1,User(),(SELECT user FROM mysql.user LIMIT 0,1),4,'5 ';

  $result = $con->query($query);

  echo "Password sent to your email address";
}
