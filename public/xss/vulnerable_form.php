<?php

if (!isset($_GET['name'])) {
  echo "<h1>Hi! What's your name?</h1>";
  echo "<form action='' method='GET'>";
  echo "<input type='text' name='name'>";
  echo "</form>";

} else {
  header("X-XSS-Protection: 0");
  // header("X-XSS-Protection: 1");
  $name = $_GET['name'];
  echo "<h1>Hi $name!</h1>";
}
