<?php

    include('db.php');

    if(isset($_POST["submit"]))
    {
        session_start();

        $userid = mysqli_escape_string($conn, $_POST['userid']);
        $password = mysqli_escape_string($conn, $_POST['password']);
        $password = md5($password);

    }

    $is_numeric = is_numeric($userid);                   //to check userid is either emailid or contact no....

    if(!$is_numeric)
    {
        //
        $query = "SELECT email ,active_email FROM user_details WHERE email = '$userid' AND password = '$password'";
        $exec = mysqli_query($conn, $query);
        //$count = mysqli_num_rows($exec);
        $output = mysqli_fetch_array($exec, MYSQLI_ASSOC);

        //check if account is made
        if($output['email'] === $email)//check if email is registered
        {
            //check if email id is verified
            if($output['active_email'] === 1)//email id is verified
            {
                $_SESSION['userid'] = $userid;
                header("Location:../../frontend/user_account.php");
            }

            else//email id is not verified
            {
                header("Location:../../frontend/email_not_verified.php");
            }
        }

        else//email is not registered yet
        {
            ?>
             <script> alert('Email is not registered, please signup first.'); window.location.href = "../../frontend/main.php";</script>';
      <?php
        }

    }

    if($is_numeric)
    {
        $query = "SELECT contact FROM user_details WHERE contact = '$userid' AND password = '$password' AND active_contact= '1'";
        $exec = mysqli_query($conn, $query);
        $count = mysqli_num_rows($exec);

        if($count != 0)//correct details
        {
            $_SESSION['userid'] = $userid;
            header("Location:../../frontend/user_account.php");
        }

        else                            //wrong details
        {
            ?>
        <script> alert('Wrong Details'); window.location.href = "../../frontend/main.php";</script>';
            <?php
        }

    }
?>