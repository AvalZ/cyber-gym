<?php

include('../db/mysql_credentials.php');

if (isset($_POST['email'])) {

    $con = new mysqli( $mysql_server, $mysql_user, $mysql_pass, $mysql_db );

    if ($con->connect_error) die ("Connection failed");

    $email = $con->real_escape_string($_POST['email']);
    $pass = $_POST['pass'];

    $query = "SELECT * FROM accounts WHERE email='$email' AND password=SHA('$pass')";

    $result = $con->query($query);

    if($result->num_rows == 1) {
      $row = $result->fetch_assoc();
      $first_name = $row["first_name"];
      $last_name = $row["last_name"];
      echo "Login successful. Welcome $first_name $last_name!";
    } else {
      echo "Wrong username or password";
    }

    $con->close();

} else {

    echo "<form action='' method='POST'>";
    echo "  <input type='text' name='email'/><br/>";
    echo "  <input type='password' name='pass'/><br/>";
    echo "  <input type='submit'/>";
    echo "</form>";

}
