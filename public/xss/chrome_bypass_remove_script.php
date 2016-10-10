<?php

if (!isset($_GET['name'])) {
  echo "<h1>Hi! What's your name?</h1>";
  echo "<form action='' method='GET'>";
  echo "<input type='text' name='name'>";
  echo "<input type='submit'/>";
  echo "</form>";

} else {
  $name = preg_replace("/script/i", "", $_GET['name']);
  echo "<h1>Hi $name!</h1>";
}
