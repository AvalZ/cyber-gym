<?php
// import credentials
include('../db/mysql_credentials.php');

// Open SQL Server connection
$con = new mysqli( $mysql_server, $mysql_user, $mysql_pass, $mysql_db );

// Check for SQL error
if ($con->connect_error) die ("Connection failed: " .$con->connect_error);

$email = $_POST['email'];
$pass = $_POST['pass'];

$query = "SELECT * FROM accounts WHERE email='$email' AND password=SHA('$pass')";
    // $email = "adhsaodhsadoshad"
    // $password = " asdsadas') OR ('1'='1";
//
// $user = $_POST['user'];
// $pass = $_POST['pass'];
// SELECT * FROM users WHERE username='$user' AND password=SHA(CONCAT($pass, salt))
// | username | password                 | salt        |
// | io       | hdshdbhhahd0u4haho4has0h | sa89964y9ad |

$result = $con->query($query);

if($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $first_name = $row["first_name"];
  $last_name = $row["last_name"];
  echo "Login successful. Welcome $first_name $last_name!";
} else {
  echo "Wrong username or password";
}

$con->close();
