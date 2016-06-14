<?php
include("db.php");
session_start();

$avail_source = $_SESSION['avail_source'];
$avail_dest = $_SESSION['avail_dest'];

for ($k = 0; $k < count($avail_source); $k++)
    {
        echo $avail_source[$k];
        echo " to ";
        echo $avail_dest[$k];
        echo '<br>';
    }

?>