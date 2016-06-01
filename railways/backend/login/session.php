<?php
    include('db.php');
    session_start();
    //$check=$_SESSION['login_adm_no'];
    $userid = $_SESSION['userid'];
    $session=mysqli_query($conn,"SELECT contact FROM user_details WHERE contact = '$userid' ");

    $row=mysqli_fetch_array($session,MYSQLI_ASSOC);

    $login_session=$row['contact'];

    if(!isset($login_session))
    {
        header("Location:../../frontend/main.php");
    }
?>

