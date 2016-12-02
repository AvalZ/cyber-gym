<form method='POST'>
    <input type='textarea' name='encode'/>
    <input type='submit'/>
</form>

<?php

if (isset($_POST['encode'])) {
    echo "<code>";
    echo urlencode($_POST['encode']);
    echo "</code>";
}

?>
