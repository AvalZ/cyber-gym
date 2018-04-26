<?php

if (isset($_GET['page']) && !empty($_GET['page'])) {

    $page = $_GET['page'];
    echo file_get_contents(__DIR__.'/pages/'.$page.'.txt');

} else {
    echo "Select a page<br/>";

    echo "<form action'' method='GET'>";
    echo "<select name='page'>";
    foreach ( scandir(__DIR__.'/pages/') as $file ) {
        $exploded = explode(".", $file);
        $filename = join(array_slice($exploded, 0, -1));
        $ext = end($exploded);
        if ( $ext === "txt" ) {
            echo "<option value='$filename'>$filename<br/>";
        }
    }
    echo "</select>";
    echo "<input type='submit' value='submit'/>";
    echo "</form>";
}

