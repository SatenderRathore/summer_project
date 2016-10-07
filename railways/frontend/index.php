<?php
session_start();
if(isset($_SESSION['userid']))
{
  header('Location:user_account.php');
}
?>


<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Book</title>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<!--
        <script src="../js/jquery-2.1.1.js"></script>
        <script src="../js/bootstrap.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
-->
        <link rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="../css/main_page.css">

        <script>
            function resize(){
                if($(window).width() < 750)
                {
                    $('#newnavbar').addClass('navbar-fixed-top navbar-inverse');
                    console.log('hello');
                }
                else
                {
                    $('#newnavbar').removeClass('navbar-fixed-top');
                    console.log('bye');                    
                }
            }
            $(document).ready( function() {
                $(window).resize(resize);
                resize();
            });
        </script>


    </head>

    <body >
        <div class="top">
            <nav class="navbar" id="newnavbar" style="padding-top:10px;">
                <div class="container-fluid">
                    <div class=" navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar" >
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>                    
                        <div class="navbar-brand logo" style="width:auto;"><a href="index.php">Seat Jugaad</a></div>

                    </div>
                    <div class="collapse navbar-collapse" id="myNavbar" >
                        <ul class="nav navbar-nav menu" >

                            <li><a href="seat_availability/">SEAT AVAILABILITY</a></li>
                            <li><a href="">PNR STATUS</a></li>
                            <li><a href="#">FAIR ENQUIRY</a></li>
                            <li><a href="train_live_status/">LIVE TRAIN STATUS</a></li>
                            <li><a href="#">CANCELLED TRAINS</a></li>
                        </ul>

                    
                    
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#" class="login-link" role="button" data-toggle="modal" data-target="#loginbox">Login</a></li>

                        <div class="modal fade" id="loginbox" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                           <div class="modal-dialog">
                               <div class="loginmodal-container">
                                   <div class="modal-head">
                                        <h3>Signin with your Seat Jugaad account</h3>
                                        <h5>Welcome back! Enter your password to signin</h5>
                                        <button type="button" class="close modal-close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <form action="../backend/login/login.php" method="post">
                                        <input type="text" name="userid" placeholder="email id OR contact no...">
                                        <input type="password" name="password" placeholder="Password">
                                        <input type="submit" name="submit" class="login loginmodal-submit" value="Login">
                                    </form>

                                    <div class="login-help">
                                        <a href="#" role="button" onClick="$('#loginbox').modal('toggle');" data-toggle="modal" data-target="#signupbox">Register</a> - <a href="#" role="button" onClick="$('#loginbox').modal('toggle');" data-toggle="modal" data-target="#forgotpassbox">Forgot Password</a>
                                    </div>
                               </div>
                            </div>
                      </div>

                        <div class="modal fade" id="signupbox" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                           <div class="modal-dialog">
                               <div class="loginmodal-container">
                                   <div class="modal-head">
                                        <h3>Create a Seat Jugaad account</h3>
                                        <h5>Enter your details and we will create an account for you!</h5>
                                        <button type="button" class="close modal-close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <form action = "../backend/signUp/signup.php" method="post">
                                        <input type="email" name="email" placeholder="Enter your email address">
                                        <input type="text" name="contact" placeholder="Your contact no...">
                                        <input type="password" name="password" placeholder="Password">
                                        <input type="submit" name="submit" class="login loginmodal-submit" value="Create an account">
                                    </form>

                                    <div class="login-help">
                                        <a href="#" role="button" onClick="$('#signupbox').modal('toggle');" data-toggle="modal" data-target="#loginbox">Login</a>
                                    </div>
                               </div>
                            </div>
                      </div>

                        <div class="modal fade" id="forgotpassbox" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                           <div class="modal-dialog">
                               <div class="loginmodal-container">
                                   <div class="modal-head">
                                        <h5>Enter your E-Mail address and we will send you a confirmation code</h5>
                                        <button type="button" class="close modal-close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <form action="../backend/forgot_password/forgot_password.php" method="post">
                                        <input type="email" name="email" placeholder="Enter your email address">
                                        <input type="submit" name="submit" class="login loginmodal-submit" value="Send Confirmation Code">
                                    </form>

                                    <div class="login-help">
                                        <a href="#" role="button" onClick="$('#forgotpassbox').modal('toggle');" data-toggle="modal" data-target="#loginbox">Login</a>
                                    </div>
                               </div>
                            </div>
                      </div>
                    </ul>
                    </div>
                </div>
            </nav>
            

            <div class="middle ">
                <div class="mid-first">
                    <div class="mid-first-icon">

                    </div>

                </div>
                <div class="mid-second">
                    <!-- <div class="form-top">
                        <div class="steps"><b>1/4</b></div>
                    </div> -->
                    <form id="pnrcheckform" action="pnr_status/" method="POST">
                        <div class="mid-content">
                            <div class="details">
                                <fieldset data-form-name="pnrno" lass="current">
                                    <legend> Enter your pnr number</legend>
                                    <input class="" name='pnr' type="text" id="" maxlength="10" data-type="digits" data-required="true" data-error-container=".number-error">
                                    <label class="number-error error-msg"></label>

                                </fieldset>
                            </div>
                            <div class="submit">
                            <button type="submit" name="action" style="border:none;padding:0;background:0" ><img src="../images/next.png" alt="submit"></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
    
</html>