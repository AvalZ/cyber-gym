# exploit #1: <script><script>alert(1)</script>
# exploit #2: <a onmouseover="alert(1)" href="#">read this!</a>

<?php

if (!isset($_GET['name'])) {
  echo "<h1>Hi! What's your name?</h1>";
  echo "<form action='' method='GET'>";
  echo "<input type='text' name='name'>";
  echo "</form>";

} else {
  $name = preg_replace("/script/","blocked",$_GET['name'],1);
  echo "<h1>Hi $name!";
}
