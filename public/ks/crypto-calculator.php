<?php

if(isset($_GET['Action'])) {
    if($_GET['Action']=="Encrypt") {
        if(isset($_GET['Plaintext']) && isset($_GET['Key'])) {
            $plaintext=$_GET['Plaintext'];
            $key=$_GET['Key'];
            $iv = "InitInitInitInit";
            $cipher = 'aes-128-cbc';
            $ciphertext = openssl_encrypt($plaintext, $cipher, "$key",$options=0,$iv);
            echo "Ciphertext = ".base64_encode($ciphertext)."</br>";
        }
    }
    if($_GET['Action']=="Decrypt") {
        if(isset($_GET['Ciphertext']) && isset($_GET['Key'])) {
            $ciphertext=$_GET['Ciphertext'];
            $key=$_GET['Key'];
            $iv = "InitInitInitInit";
            $cipher = 'aes-128-cbc';
            // echo "Ciphertext (base64) = $ciphertext</br>";
            $decoded_ciphertext = base64_decode($ciphertext);
            // echo "Ciphertext = $ciphertext</br>";
            $plaintext = openssl_decrypt($decoded_ciphertext, $cipher, "$key",$options=0,$iv);
            echo "<b>Plaintext</b><br/>$plaintext</br>";
        }
    }
}

$form = '<form name="actionForm" action="crypto-calculator.html" method="GET">
   <input type="submit" class="button" value="Return"/>
</form>';
echo $form;
