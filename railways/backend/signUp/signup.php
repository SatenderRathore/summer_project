<?php
    include('db.php');

    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $password = $_POST['password'];

    if(isset($_POST['submit']))
    {
        if(isset($_POST['email']) && !empty($_POST['email']) AND isset($_POST['contact']) && !empty($_POST['contact']) AND isset($_POST['password']) && !empty($_POST['password']))
        {
            $email = mysqli_escape_string($conn, $_POST['email']);//turn post veriable to local veriable
            $email = strtolower($email);
            $contact = mysqli_escape_string($conn, $_POST['contact']);

                //check if user already has an account
                $query = "SELECT email,contact FROM user_details";
                $query_exec = mysqli_query($conn, $query);
                while($output = mysqli_fetch_array($query_exec,MYSQLI_ASSOC))
                {
                    if($email===$output['email'])//if email already registered
                    {
                        //email already exists
                        ?>
                        <script>
                        var message = "Email id is already registered please signup using diffrent email id";
                        alert(message);window.location.href = "../../frontend/main.php";
                        </script>
                        <?php
                        //break;
                    }
                    if($contact === $output['contact'])
                    {
                        //contact already exists
                        ?>
                        <script>
                        var message = "Contact no is alerady registered please signup using diffrent contact no";
                        alert(message);window.location.href = "../../forntend/main.php";
                        </script>
                        <?php
                        //break;
                    }
                }

                //send one time password

                $otp = rand(0,1000000);

                require "/opt/lampp/htdocs/summer_project/railways/backend/signUp/otp/twilio-php-master/Services/Twilio.php";

                $AccountSid = "AC0ec90fb788db699871cdde4d39fa3001"; // Your Account SID from www.twilio.com/console
                $AuthToken = "f30345f6ec37380ad2ea5fd4914e1bad";   // Your Auth Token from www.twilio.com/console

                $client = new Services_Twilio($AccountSid, $AuthToken);

                $message = $client->account->messages->create(array(
                "From" => "+14242816416", // From a valid Twilio number
                "To" => "+91" . $contact,   // Text this number
                "Body" => "Your OTP(One Time Password) is:" . $otp,
                ));


                // Display a confirmation message on the screen
                echo "Sent message {$message->sid}";

                $password = md5($password);
                $otp = md5($otp);

                //send otp to server
                $insert_query = "INSERT INTO otp (contact, otp)VALUES('$contact','$otp')";
                mysqli_query($conn, $insert_query);

                //redirect to otp page
                session_start();
                $_SESSION['contact'] = $contact;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                header("Location:../../frontend/otp/");
            
        }
    }
?>








