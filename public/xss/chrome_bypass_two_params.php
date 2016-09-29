<?php

if (!isset($_GET['first_name']) && !isset($_GET['last_name'])) {
  echo "<h1>Hi! What's your name?</h1>";
  echo "<form action='' method='GET'>";
  echo "<input type='text' name='name'>";
  echo "</form>";

} else {
  $first_name = $_GET['first_name'];
  $last_name = $_GET['last_name'];
  echo "<h1>Hi $first_name $last_name!</h1>";
  //   "<h1>Hi <strong>Boh</strong>!</h1>"
}
