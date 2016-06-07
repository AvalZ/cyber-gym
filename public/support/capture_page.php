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
  echo ' 
    <html>
    <head>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <style>body { padding-top: 70px; }</style>
    </head>
    <body>
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="navbar-header">
            <a href="/" class="navbar-brand">WebSec Tutorial</a>
          </div>
          <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
              <li><a href="/">Home</a></li>
              <li class="active"><a href="/support/capture_page.php">Capture</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="/db">DB Setup</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </nav>

    <div class="container">
    <br>
    <div class="panel panel-default">
      <div class="panel-heading"><h2 class="text-center">Captured Data</h2></div>
      <div class="panel-body">You can capture more data by issuing a GET request to this page ('. $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] .'),
      passing any data you want in the query string <br><i>e.g. ' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . '?key=value</i></div>
';

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

  echo "</div></div></html>";
}

$con->close();
