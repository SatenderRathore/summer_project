<?php
    include('db.php');
//echo "hello";
    if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash']))
    {
       // Verify data
          $email = mysqli_escape_string($conn,$_GET['email']); // Set email variable
          $hash = mysqli_escape_string($conn,$_GET['hash']); // Set hash variable

          $search = mysqli_query($conn,"SELECT email, hash, active_email FROM user_details WHERE email='".$email."' AND hash='".$hash."' AND active_email='0'") or die(mysql_error());
          $match  = mysqli_num_rows($search);

          if($match > 0)
          {
              // We have a match, activate the account
                 mysqli_query($conn,"UPDATE user_details SET active_email='1' WHERE email='".$email."' AND hash='".$hash."' AND active_email='0'") or die(mysql_error());
              //echo '<div class="statusmsg">Your account has been activated, you can now login</div>';
                 header("Location:email_v_display/displays.php");
              //give a link to login page
          }

          else
          {
              // No match -> invalid url or account has already been activated.
              echo '<div class="statusmsg">The url is either invalid or you already have activated your account.</div>';
          }

    }

    else
    {
        // Invalid approach
           echo '<div class="statusmsg">Invalid approach, please use the link that has been send to your email.</div>';
    }

?>
