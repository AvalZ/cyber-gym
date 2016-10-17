<?php

if (isset($_GET['page']) && !empty($_GET['page'])) {

    $page = $_GET['page'];
    echo file_get_contents();
    echo __DIR__;

} else {
    echo "Select a page";
}

