<?php

require 'util.php';
require 'db.php';

if ($_POST) {
    $error_array = [];

    if (isset($_POST['email'])) {
        $email = $_POST['email'];
    }

    if (isset($_POST['password'])) {
        $pass = $_POST['password'];
    }

    $conn = connect_to_db();

    $q = 'SELECT * FROM lrt22.finalUsers WHERE email="' . $email . '";';
    $result = mysqli_query($conn, $q);

    $found = false;

    $row = mysqli_fetch_array($result);

    if ($email == $row['email']) {
        $found = true;

        if (password_verify($pass,  $row['password'])) {

            session_start();
            $_SESSION['user'] = $row;

            require 'nav.php';

            echo ('<div class="container" style="text-align:center; margin-top:20px">');
            welcome_prompt();
        } else {
            array_push($error_array, "Wrong password for $email");
        }
    }

    if (!$found) {
        array_push($error_array, "No user with the email $email");
    }

    if (!empty($error_array)) {
        require 'nav.php';
        echo ('<div class="container" style="text-align:center;">');
    }

    foreach ($error_array as $err) {
        show_error($err);
    }
} else {
    session_start();
    if ($_SESSION['user']) {
        unset($_SESSION);
        session_destroy();
        header('index.php');
        $loggedOut = true;
    }

    require 'nav.php';

    echo ('<div class="container">');

    if ($loggedOut) {
        show_success("Succesfully Logged Out!");
    }

    login_prompt();
}
