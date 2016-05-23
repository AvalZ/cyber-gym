<?php

session_start();

if( (!empty($_SESSION['antiCsrf'])) && (!empty($_POST['antiCsrf'])) ) {
  
// Imagine sanitization code here...
 
  // check anti-CSRF token
  if( ($_SESSION['antiCsrf'] == $_POST['antiCsrf']) ) {
    echo '<p> '. $_POST['amount'] .' € successfully transfered to account: '. $_POST['account'] .' </p>';
  }
} else {
  echo '<p>Transfer KO</p>';
}
