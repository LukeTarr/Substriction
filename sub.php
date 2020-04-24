<?php
require 'nav.php';
require 'db.php';
require 'util.php';

function show_subscriptions()
{
    if ($_SESSION['user']) {
        $conn = connect_to_db();

        $id = $_SESSION['user']['idfinalUsers'];
        $q = "SELECT * from lrt22.finalSubscription WHERE user_id = {$id} ORDER BY creation_date DESC";

        $result = mysqli_query($conn, $q);

        echo ('<div class="container"><div class="card-deck">');
        $count = 0;
        while ($row = mysqli_fetch_array($result)) {
            $count++;

            $name = $row['name'];
            $cost = $row['cost'];
            $billed = $row['billed'];
            $sub_date = $row['subscription_date'];
            $id = $row['idfinalSubscription'];

            echo ("
            <div class='card' style='margin-top: 20px;'>
                <div class='card-header'>{$name}</div>
            <div class='card-body'>
    
            <p>Cost: {$cost}</p>
            <hr>
            <p>Bills / Year: {$billed}</p>
            <hr>
            <p>Subscribed on: {$sub_date}</p>
            <hr>
            <form action='sub.php' method='POST' style='float:left;'>
                <input type='hidden' name='id' value={$id}>
                <input type='submit' class='btn btn-danger' value='Delete'>
            </form>
            </div>
    
            </div>");

            if($count % 2 == 0){
                echo("</div><div class='card-deck'>");
            }
        }

        echo ('</div>');
    } else {

        show_error("Log in to view this page.");
    }
}


if ($_POST) {

    if (isset($_POST['id'])) {
        $sub_id = $_POST['id'];
    }

    $conn = connect_to_db();
    $q = "DELETE FROM lrt22.finalSubscription WHERE idfinalSubscription={$sub_id};";
    $result = mysqli_query($conn, $q);

    show_subscriptions();

} else {

    show_subscriptions();
}
