<?php
include 'nav.php';
include 'db.php';
require 'util.php';

    if ($_SESSION['user']) {
        $conn = connect_to_db();

        $id = $_SESSION['user']['idfinalUsers'];
        $q = "SELECT * from lrt22.finalSubscription WHERE user_id = {$id} ORDER BY creation_date DESC";
        $result = mysqli_query($conn, $q);

        echo("<div class='container'>
        <div class='card' style='margin-top: 20px;'>
                        <div class='card-header'>By the Numbers</div>
                    <div class='card-body'>");

        $count = 0;
        while ($row = mysqli_fetch_array($result)) {

            $name = $row['name'];
            $cost = $row['cost'];
            $billed = $row['billed'];
            $sub_date = $row['subscription_date'];
            $id = $row['idfinalSubscription'];

            $date_now = date("Y-m-d");

            $ts1 = strtotime($sub_date);
            $ts2 = strtotime($date_now);

            $year1 = date('Y', $ts1);
            $year2 = date('Y', $ts2);

            $month1 = date('m', $ts1);
            $month2 = date('m', $ts2);

            $diff = (($year2 - $year1) * 12) + ($month2 - $month1);

            $years = $diff / 12;
            $total = $years * $billed * $cost;
            $count += $total;
            echo("You've spent \$$total on $name since you've been subscribed.<br><hr>");
        }
        echo("In total, you've spent \$$count on subscriptions.</div></div>");
    } else {

        show_error("Log in to view this page");
    }

?>

