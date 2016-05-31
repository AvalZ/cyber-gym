<?php

if(isset($_GET['id']) && !empty($_GET['id'])) {
  include('../db/mysql_credentials.php');

  $con = new mysqli( $mysql_server, $mysql_user, $mysql_pass, $mysql_db );

  if ($con->connect_error) die ("Connection failed: " .$con->connect_error);

  $id = $con->real_escape_string($_GET['id']);
  //    escapes NUL(0x00) \n \r \ ' " CTRL-Z(0x1A)
  //    NOT something like - % ( ) | & etc...

  $query = "SELECT * FROM accounts WHERE id=$id";
         // SELECT * FROM accounts WHERE id=1
         // NOT => SELECT * FROM accounts WHERE id='1'
         //   mysql_real_escape_string ONLY works on string literals

  $result = $con->query($query);

  if($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $first_name = $row["first_name"];
    $last_name = $row["last_name"];
    echo "User exists: $first_name $last_name.";
  } else {
    echo "No user with this index";
  }

  $con->close();
} else {
  echo "<form action=''>";
  echo "<label for='id'>Search user by id: </label>";
  echo "<input name='id'>";
  echo "</form>";
}
