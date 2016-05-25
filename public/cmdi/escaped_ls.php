<?php

if(!isset($_GET['folder'])) {
  echo "<form action=''>";
  echo "<label for='folder'>List the content of a folder: </label><input name='folder'>";
  echo "</form>";
} else {
  $folder = escapeshellarg($_GET['folder']);
  $output = shell_exec("ls -l $folder");
  echo str_replace("\n", "<br/>", $output);
}
