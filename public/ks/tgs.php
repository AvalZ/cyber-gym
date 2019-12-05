<?php

if(isset($_GET['AuthTicket']) && isset($_GET['Authenticator'])) {
    $AuthTicket=$_GET['AuthTicket'];
    $Authenticator=$_GET['Authenticator'];

    // $KeyMessage="K_{A,TGS}=K_a_tgs TGS=tgs1 Timestamp=$timestamp";
    // $AuthMessage="$Client tgs1 $K_a_tgs $timestamp";
    // echo "KAS says: $KeyMessage </br>";
    $iv = "InitInitInitInit";
    $cipher = 'aes-128-cbc';
    if (in_array($cipher, openssl_get_cipher_methods())) {
        $KeyMessage = openssl_decrypt(base64_decode($AuthTicket), $cipher, "K_{KAS,TGS}",$options=0,$iv);
        // echo "Key Message = ".$KeyMessage."</br>";
        $res=preg_match('/K_A_TGS=((\d)+)/', $KeyMessage, $matches);
        if($res) {
            $SessionKey=$matches[1];
            // echo "SessionkKey=$SessionKey";
            $DecryptedAuthenticator = openssl_decrypt(base64_decode($Authenticator), $cipher, $SessionKey,$options=0,$iv);
        // echo $DecryptedAuthenticator;
            if(preg_match('/Alice/', $DecryptedAuthenticator, $matches)) {
                // var_dump($matches);
                echo "flag{Welc0m3_2_L3v31_2}";
            }
            else {
                echo "Invalid Authenticator. Please Retry!";
            }
        }
        else {
                echo "Invalid Authentication Ticket. Please Retry!";
        }
    }
}


