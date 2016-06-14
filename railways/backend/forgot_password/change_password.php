<?php
    include("db.php");

    $password = $_POST['password'];
    $password = md5($password);

    $re_password = $_POST['re_password'];
    $re_password = md5($re_password);

    if(isset($_POST['submit']))
    {
        if($password == $re_password)
        {
            session_start();
            $email = $_SESSION['email'];

            $query = "UPDATE user_details SET password = '$password' WHERE email = '$email'";
            $result = mysqli_query($conn,$query);

            if($result)
            {
?>
                <script> alert('Your password has been changed successfully.'); window.location.href = "../../frontend/main.php";
                </script>';

<?php
            }



        }

        else
        {
            //both passwords don not match
?>

            <script> alert('Passwords do not match, Please try again.');
            window.location.href = "../../frontend/new_password.php";
            </script>';

<?php
        }
    }

    else
{
    header("Location:../../frontend/main.php");
}



?>