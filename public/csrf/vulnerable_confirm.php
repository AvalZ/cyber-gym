<?php

session_start();

// Transfer action

echo '<p> '. $_GET['amount'] .' € successfully transfered to account: '. $_GET['account'];
