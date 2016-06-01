<?php
include('db.php');
session_start();
$email = $_SESSION['email'];
$contact = $_SESSION['contact'];
$password = $_SESSION['password'];

$user_otp = $_POST['otp'];
$user_otp = md5($user_otp);

$query = "SELECT otp FROM otp WHERE contact = '$contact'";
$exec = mysqli_query($conn, $query);
$output = mysqli_fetch_array($exec,MYSQLI_ASSOC);
//echo $output['otp'];
$otp = $output['otp'] ;

//echo $otp;
//echo $user_otp;
if($otp === $user_otp)
{
    //otp matched
    echo "otp matched";

    //send verification link to email id
    $hash = md5( rand(0,1000) ); // Generate random 32 character hash and assign it to a local variable.
                        // Example output: f4552671f8909587cf485ea990207f3b
    //insert user details in user_details table
    $insert_query = "INSERT INTO user_details (email, contact, password, hash, active_contact)
                    VALUES ('$email', '$contact', '$password','$hash','1')";
    mysqli_query($conn, $insert_query) or die(mysqli_error());

//////////////////////////////////////////// send email
    $message_to_send =
            '
            Thanks for signing up!
            Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.

            Please click this link to activate your account:
            https://192.168.1.100/summer_project/railways/backend/signUp/email_verify.php?email='.$email.'&hash='.$hash.'

            '; // Our message above including the link

            //$headers = 'From:noreply@yourwebsite.com' . "\r\n"; // Set from headers
            //mail($to, $subject, $message, $headers); // Send our email

            //send a mail with phpmailer
      include("email/sendmail.php"); //include sendmail.php file
      $to       =   $email;//user's email id
      $subject  =   "SignUp | Verification";
      $message  =   $message_to_send;
      $name     =   $email;
      $mailsend =   sendmail($to,$subject,$message,$name);
////////////////////////////////send email
      if($mailsend === 1)
      {
        //
      }

?>



    <script>
       var message = "contact no verified successfully, please verify your email id by clicking the link send to you";
       alert(message);window.location.href = "../../frontend/main.php";
    </script>
<?php
}
?>