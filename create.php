<link rel="stylesheet" href="final.css">
<?php
require 'nav.php';
require 'db.php';
require 'util.php';

if ($_SESSION['user']) {
    if ($_POST) {

        if (isset($_POST['name'])) {
            $name = $_POST['name'];
        }

        if (isset($_POST['cost'])) {
            $cost = $_POST['cost'];
        }

        if (isset($_POST['billed'])) {
            $billed = $_POST['billed'];
        }

        if (isset($_POST['sub_date'])) {
            $sub_date = $_POST['sub_date'];
        }

        $id = $_SESSION['user']['idfinalUsers'];

        $conn = connect_to_db();
        $q = "INSERT INTO lrt22.finalSubscription(cost, billed, creation_date, subscription_date, name, user_id)
        VALUES({$cost}, {$billed}, NOW(), '{$sub_date}', '{$name}', {$id}); 
        ";

        $result = mysqli_query($conn, $q);

        header('Location: sub.php');
    } else {

        show_create();
    }
} else {
    show_error("Log in to view this page");
}

?>