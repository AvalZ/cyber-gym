<html>
<body>

<?php
if (isset($_COOKIE["user"]))
  echo "Welcome " . $_COOKIE["user"] . "!<br />";
?>

<?php
if (!isset($_COOKIE["user"])) { ?>

<form method="POST" action="cookies_welcome_process.php">
  Name:<br>
  <input type="text" name="user" value="Alessandro"><br>
  <input type="hidden" name="nonce" value="199yay27e6"><br>
 <input type="submit" value="Submit">
</form>

<?php } ?>



</body>
</html>

