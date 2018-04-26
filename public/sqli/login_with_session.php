<?php

session_start();

if (isset($_POST['user']) && isset($_POST['pass'])) {

    $user = $_POST['user'];
    $pass = $_POST['pass'];

    echo "Tried to log in as $user";

    if ($user === 'admin' && $pass === 'hAt9fvxxiagGDKqUblbV') {
        $_SESSION['user'] = 'admin';
    } else {
        $_SESSION['user'] = 'guest';
    }

} else {

    echo '<form action="" method="POST">
        <input type="text" name="user" placeholder="user"/>
        <input type="password" name="pass" placeholder="password"/>
        <input type="submit" value="Submit"/>
        </form>';
}
