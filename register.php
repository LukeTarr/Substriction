<?php

require 'db.php';
require 'util.php';

$conn = connect_to_db();

if($_POST){

    if(isset($_POST['name'])){
        $name = $_POST['name'];
    }

    if(isset($_POST['email'])){
        $email = $_POST['email'];
    }

    if(isset($_POST['password'])){
        $password1 = $_POST['password'];
    }

    if(isset($_POST['password2'])){
        $password2 = $_POST['password2'];
    }

    $error_array = [];

    $q = 'SELECT * FROM lrt22.finalUsers WHERE email="' . $email . '";';
    $result = mysqli_query($conn, $q);

    $found = false;

    $row = mysqli_fetch_array($result);


    if($email == $row['email']){
        include 'nav.php';
        show_error("Email is already signed up.");
    } else {

    if($password1 == $password2){

        $hash = password_hash($password1, PASSWORD_DEFAULT);

        $q = "INSERT INTO lrt22.finalUsers(email, password, name) VALUES ('$email', '$hash', '$name')";

        $result = mysqli_query($conn, $q);
    } else {
        array_push($error_array, "Passwords don't match");
    }

    $q = 'SELECT * FROM lrt22.finalUsers WHERE email="' . $email . '";';
    $result = mysqli_query($conn, $q);

    $found = false;

    $row = mysqli_fetch_array($result);


    if($email == $row['email']){
        $found = true;
            
        if(password_verify($password1, $row['password'])){
            session_start();
            $_SESSION['user'] = $row;
            include 'nav.php';
            echo('<div class="container" style="text-align:center; margin-top:20px">');
            welcome_prompt();
                
            } else {
                array_push($error_array, "Wrong password for $email");
            }
    }

if(!empty($error_array)){
    include 'nav.php';
    echo('<div class="container" style="text-align:center;">');
}

foreach($error_array as $err){
    show_error($err);
}
    }
} else {
    session_start();
    $_SESSION['user'] = NULL;

    include 'nav.php';

    register_prompt();

}
