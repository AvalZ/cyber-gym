<?php

if (!isset($_GET['input']) || empty($_GET['input'])) {
    echo "Can you make this page print the word \"script\"? (Lowercase or uppercase)";
    echo '<form action="" method="GET">
        <input type="text" name="input"/>
        <input type="submit" value="Submit"/>
        </form>';
} else {
    $flag = $_GET['input'];

    $flag = preg_replace('/script/i', '', $flag);

    echo "The page printed this:<br/>";
    echo "<pre> $flag</pre><br/><br/>";

    if (preg_match('/^script$/i', $flag)) {
        echo "<pre>flag{blacklists_are_hard}</pre>";
    } else {
        echo "Try again<br>";
        echo '<form action="" method="GET">
        <input type="text" name="input"/>
        <input type="submit" value="Submit"/>
        </form>';
    }
}
