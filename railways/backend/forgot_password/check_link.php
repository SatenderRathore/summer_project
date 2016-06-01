<?php
    include('db.php');

    if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash']))
    {
        $email = mysqli_escape_string($conn,$_GET['email']); // Set email variable
        $hash = mysqli_escape_string($conn,$_GET['hash']); // Set hash variable

        $query = "SELECT email, hash FROM user_details WHERE email='".$email."' AND hash='".$hash."' ";
        $search = mysqli_query($conn, $query) or die(mysql_error());
        $match  = mysqli_num_rows($search);

        if($match > 0)
        {
            session_start();
            $_SESSION['email'] = $email;
            header("Location:../../frontend/new_password.php");
        }

        else
        {
?>

            <script> alert('The url is invalid'); window.location.href = "../../frontend/main.php";</script>';

<?php
        }
    }

    else
    {
?>

        <script> alert('Invalid approach, please use the link that has been send to your email.'); window.location.href = "../../frontend/main.php";</script>';

<?php
    }


?>