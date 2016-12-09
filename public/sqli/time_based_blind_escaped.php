<?php
include('../db/mysql_credentials.php');

if (!isset($_POST['to']) || !isset($_POST['msg'])) {
    echo <<<EOT
<form action='' method='POST'>

    <label for='to'>To:</label>
    <select name='to'>
      <option value="1">First User</option>
      <option value="2">Second User</option>
    </select>

    <label for='msg'>Message:</label>
    <input type='text' name='msg'>

    <input type='submit' value='Send'>

</form>
EOT;

} else {

    $con = new mysqli( $mysql_server, $mysql_user, $mysql_pass, $mysql_db );

    $to = $con->real_escape_string($_POST['to']);
    $msg = $con->real_escape_string($_POST['msg']);


    $query = "INSERT INTO messages (dest_id, content) VALUES ($to, '$msg')";
    $result = $con->query($query);

    echo "Message sent.";
}
