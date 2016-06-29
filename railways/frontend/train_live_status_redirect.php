<?php

session_start();
if(isset($_POST['submit']))
{
    $_SESSION['submit'] = $_POST['submit'];
    $_SESSION['train_num'] = $_POST['train_num'];
    header("Location:train_live_status.php");
}
?>