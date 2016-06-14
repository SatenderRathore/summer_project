<?php

    include("db.php");



    if(isset($_POST['submit']))
    {
        $email = $_POST['email'];

        $query = "SELECT email,hash FROM user_details WHERE email = '$email' ";
        $result = mysqli_query($conn,$query);
        $rows = mysqli_num_rows($result);
        $output = mysqli_fetch_array($result,MYSQLI_ASSOC);

        if($rows != 0)
        {
            $hash = $output['hash'];



            $message_to_send =
            '
            You recently requested for change password.

            Please click this link to change your password:
            https://192.168.1.100/summer_project/railways/backend/forgot_password/check_link.php?email='.$email.'&hash='.$hash.'

            '; // Our message above including the link

            //$headers = 'From:noreply@yourwebsite.com' . "\r\n"; // Set from headers
            //mail($to, $subject, $message, $headers); // Send our email

            //send a mail with phpmailer
            include("email/sendmail.php"); //include sendmail.php file
            $to       =   $email;//user's email id
            $subject  =   "CHANGE PASSWORD"   ;
            $message  =   $message_to_send;
            $name     =   "Svnit Surat";
            $mailsend =   sendmail($to,$subject,$message,$name);


            if($mailsend==1)
            {
?>
                <script>
                var message = "An email sent to your email address, You can change your password by clicking the link";
                alert(message); window.location.href = "../../frontend/main.php";
                </script>;
<?php

            }

            else
            {
                echo '<h2>There are some issue.</h2>';
            }

        }

        else
        {
?>
            <script>
            var message = "You are not a registered user, please register first";
            alert(message); window.location.href = "../../frontend/main.php";
            </script>;
<?php
        }

    }

    else
    {
        header("Location:../.../frontend/main.php");
    }

?>