<?php

include('../db/mysql_credentials.php');

$con = new mysqli($mysql_server, $mysql_user, $mysql_pass, $mysql_db);

if($con->connect_error) die ("Error connecting to DB");


if (!empty(array_filter($_GET))) {
  $stmt = $con->prepare("INSERT INTO datacapture (datakey, datavalue, timestamp) VALUES (?,?, Now())");

  foreach( $_GET as $key => $value ) {
    $stmt->bind_param("ss", $key, $value);
    $stmt->execute();
  }
} else {
  echo '<html>
    <head><link rel="stylesheet" href="../css/bootstrap.min.css"></head><body><div class="container">
<h1 class="text-center">Captured Data</h1><br>';

  $query = "SELECT * FROM datacapture ORDER BY timestamp DESC";
  $result = $con->query($query);

  echo "<table class='table table-striped'>";

  echo "<tr><th>Key</th><th>Value</th><th>Timestamp</th></tr>";

  while($row = $result->fetch_assoc()) {

    $datakey = $row['datakey'];
    $datavalue = $row['datavalue'];
    $timestamp = $row['timestamp'];

    echo "<tr>";
    echo "<td>$datakey</td>";
    echo "<td>$datavalue</td>";
    echo "<td>$timestamp</td>";

    echo "</tr>";
  }

  echo "</table>";

  echo "</div></html>";
}

$con->close();
