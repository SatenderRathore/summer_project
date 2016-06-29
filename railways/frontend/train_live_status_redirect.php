<?php

session_start();
if(isset($_POST['submit']))
{
    $_SESSION['submit'] = $_POST['submit'];
    header("Location:train_live_status.php");
}
?>