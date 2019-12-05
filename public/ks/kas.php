<?php

if(isset($_GET['Client']) && isset($_GET['TGS'])) {
    if($_GET['TGS']=="tgs1") {
        $Client=$_GET['Client'];
        $K_a_tgs=random_int(0,1000000);
        $now = getdate();
        $timestamp=$now['year'].":".$now['mon'].":".$now['mday'].":".$now['hours'].":".$now['minutes'].":".$now['seconds'];
        $KeyMessage="{K_A_TGS=$K_a_tgs, TGS=tgs1, Timestamp=$timestamp}";
        $AuthMessage="{Client=$Client, TGS=tgs1, K_A_TGS=$K_a_tgs, Timestamp=$timestamp}";
        echo "The Authentication Server says: </br>";
        // $encryption_key = openssl_random_pseudo_bytes(32);
        // $iv = openssl_random_pseudo_bytes(16);
        $iv = "InitInitInitInit";
        $cipher = 'aes-128-cbc';
        if (in_array($cipher, openssl_get_cipher_methods())) {
            $EncryptedKeyMessage = openssl_encrypt($KeyMessage, $cipher, "192883939",$options=0,$iv);
            echo "Encrypted Key Message = ".base64_encode($EncryptedKeyMessage)."</br>";
            $AuthTicket = openssl_encrypt($KeyMessage, $cipher, "K_{KAS,TGS}",$options=0,$iv);
            $base64_AuthTicket=base64_encode($AuthTicket);
            echo "Authentication Ticket = ".$base64_AuthTicket."</br>";
        // $DecryptedAuthTicket = openssl_decrypt(base64_decode($base64_AuthTicket), $cipher, "K_{KAS,TGS}",$options=0,$iv);
        //     echo "DecryptedAuthTicket = ".$DecryptedAuthTicket."</br>";

        //     $Authenticator = openssl_encrypt("Alice,T1", $cipher, $K_a_tgs,$options=0,$iv);
        //     $base64_Authenticator=base64_encode($Authenticator);
        //     echo "Base64 Authenticator = ".$base64_Authenticator."</br>";
        // $DecryptedAuthenticator = openssl_decrypt(base64_decode($base64_Authenticator), $cipher, $K_a_tgs,$options=0,$iv);
        //     echo "DecryptedAuthenticator = ".$DecryptedAuthenticator."</br>";
            
            $form = '<form name="actionForm" action="tgs.php" method="GET">
             Authentication Ticket: <input type="text" name="AuthTicket"></br>
             Authenticator <input type="text" name="Authenticator"></br>
             <input type="submit" class="button" value="Send to the TGS"/>';
                  echo "</br></br></br>Now you can issue a request to the TGS</br>";
                  echo $form;
            
        }
    }
}


