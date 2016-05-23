<?php 
session_start();

//generate random anti CSRF token
$csrfToken = md5(uniqid(rand(), TRUE));
//
////set the token as in the session data
$_SESSION['antiCsrf'] = $csrfToken;

//Transfer form with the hidden field
$form = '
<form name="transferForm" action="confirm.php" method="POST">
  <div class="box">
<h1>BANK XYZ - Confirm Transfer</h1>
<p>
Do You want to confirm a transfer of <b>'. $_REQUEST['amount'] .' €</b> to account: <b>'. $_REQUEST['account'] .'</b> ?
</p>
<label>
<input type="hidden" name="amount" value="' . $_REQUEST['amount'] . '" />
<input type="hidden" name="account" value="' . $_REQUEST['account'] . '" />
<input type="hidden" name="antiCsrf" value="' . $csrfToken . '" />
<input type="submit" class="button" value="Transfer Money" />
</label>

 </div>
</form>';

echo $form;
