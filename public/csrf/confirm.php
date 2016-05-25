<?php

session_start();

if( (!empty($_SESSION['antiCsrf'])) && (!empty($_GET['antiCsrf'])) ) {
  
// Imagine sanitization code here...
 
  // check anti-CSRF token
  if( ($_SESSION['antiCsrf'] == $_GET['antiCsrf']) ) {
    echo '<p> '. $_GET['amount'] .' € successfully transfered to account: '. $_GET['account'] .' </p>';
  } else {
    echo '<p>Transfer KO</p>';
  }
} else {
  echo '<p>Transfer KO</p>';
}
