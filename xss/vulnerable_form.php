<?php

if (!isset($_GET['name'])) {
  echo "<h1>Hi! What's your name?</h1>";
  echo "<form action='' method='GET'>";
  echo "<input type='text' name='name'>";
  echo "</form>";

} else {
  $name = $_GET['name'];
  echo "<h1>Hi $name!";
}
