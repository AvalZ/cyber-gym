<?php

// Imagine sanitization code here...
 
  // check anti-CSRF token
$ref = 'http://192.168.33.10/csrf/referer_form.html';

if (isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])) {
  if ( $ref == $_SERVER['HTTP_REFERER'] ) {
      echo '<p> '. $_GET['amount'] .' € successfully transfered to account: '. $_GET['account'] .' </p>';
  } else {
    echo '<p>Transfer KO</p>';
  }
} else {
  echo '<p>Transfer KO</p>';
}
