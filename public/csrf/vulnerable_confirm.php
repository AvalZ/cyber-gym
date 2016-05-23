<?php

session_start();

echo '<p> '. $_GET['amount'] .' € successfully transfered to account: '. $_GET['account'];
