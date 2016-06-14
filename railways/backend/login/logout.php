<?php
session_start();
unset($_SESSION['userid']);
if(session_destroy())
{

?>
    <script> alert('logOut Successfully'); window.location.href = "../../frontend/main.php";</script>';
<?php
//header("Location: index.php");
}
?>