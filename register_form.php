<?php
@include 'config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'mail/Exception.php';
require 'mail/PHPMailer.php';
require 'mail/SMTP.php';

if(isset($_POST['submit'])) {

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $password = md5($_POST['password']);
    $password2 = md5($_POST['password2']);

    $mail = new PHPMailer(true);

    try {
        $mail->SMTPDebug = 0;

        $mail->isSMTP();

        $mail->Host = 'smtp.gmail.com';

        $mail->SMTPAuth = true;

        $mail->Username = 'intramurosbase@gmail.com';

        $mail->Password = 'abqkfnzbsghaahcn';

        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

        $mail->Port = 587; 

        $mail->setFrom('intramurosbase@gmail.com', 'Intramuros Base'); 

        $mail->addAddress($email, $username);

        $mail->isHTML(true);

        $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);

        $mail->Subject = 'Email verification';
        $mail->Body = '<center><p>Congratulations your account as been registered/re-registered successfully
        <br>
        Please this code on the verification bar to finally get verified!
        <br>
        Verification Code is:
        <br>
        <b style="font-size: 30px;">'.$verification_code.'</b></p></center>';

        $select = "SELECT * FROM login WHERE email = ? || username = ? || phone = ?";
        $stmt_init = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt_init, $select)){
            echo "SQL connection error";
        } else {
            mysqli_stmt_bind_param($stmt_init, 'sss', $email, $phone, $phone);
            mysqli_stmt_execute($stmt_init);
            $result = $stmt_init->get_result();

            if(mysqli_num_rows($result) > 0) {
                if($password != $password2) {
                    $error[] = 'Passwords did not match!';
                } else {
                    $select2 = "SELECT * FROM login WHERE email = ? && username = ? && phone = ? && password = ?";
                    $stmt_init2 = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt_init2, $select2)){
                        echo "SQL connection error";
                    } else {
                        mysqli_stmt_bind_param($stmt_init2, 'ssss', $email, $username, $phone, $password);
                        mysqli_stmt_execute($stmt_init2);
                        $result2 = $stmt_init2->get_result();

                        if(mysqli_num_rows($result2) > 0) {
                            $insert = "UPDATE login SET verification_code = ? WHERE email = ? && phone = ? && password = ?";
                            $stmt = mysqli_stmt_init($conn);
                            if(!mysqli_stmt_prepare($stmt, $insert)){
                                echo "SQL connection error";
                            } else {
                                mysqli_stmt_bind_param($stmt, 'ssss', $verification_code, $email, $phone, $password);
                                mysqli_stmt_execute($stmt);
                                $mail->send();
                                header('location:email_verification.php?email='.$email);
                            }
                        } else {
                            $error[] = 'This did not match with our records.';
                        }
                    }
                }
            } 
            else {
                if($password != $password2) {
                    $error[] = 'Passwords did not match!';
                } else {
                    $insert = "INSERT INTO login(username, email, phone, password, verification_code) VALUES(?, ?, ?, ?, ?)";
                    $stmt = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt, $insert)){
                        echo "SQL connection error";
                    } else {
                        mysqli_stmt_bind_param($stmt, 'sssss', $username, $email, $phone, $password, $verification_code);
                        mysqli_stmt_execute($stmt);
                        $mail->send();
                        header('location:email_verification.php?email='.$email);
                    }
                }
            }
        }
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
};
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.png" />
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" crossorigin="anonymous"></script>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <style>
        .login, .image{
            min-height: 100vh
        }
        .bg-image{
            background-image: url('assets/img/intramuros-register.jpg');
            background-size: cover;
            background-position: center center
        }
        </style>
    </head>
<body>
    <div class="container-fluid">
        <div class="row no-gutter"> 
            <div class="col-md-6 d-none d-md-flex bg-image">
            </div> 
            <div class="col-md-6 bg-light">
                <div class="login d-flex align-items-center py-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-7 col-xl-6 mx-auto">
                                <h3 class="display-4">REGISTER</h3>
                                    <br> 
                                    <form id="form" action="" method="POST"> 
                                        <div class="form-group mb-3"> 
                                            <input type="text" name="username" placeholder="Username" required class="form-control rounded-pill border-0 shadow-sm px-4">
                                        </div>
                                        <div class="form-group mb-3"> 
                                            <input id="email" type="email" name="email" placeholder="Email" required class="form-control rounded-pill border-0 shadow-sm px-4">
                                        </div>
                                        <div class="form-group mb-3"> 
                                            <input id="phone" type="text" name="phone" pattern="[0-9]{11}" placeholder="Phone" required class="form-control rounded-pill border-0 shadow-sm px-4">
                                        </div>
                                        <div class="form-group mb-3"> 
                                            <input type="password" name="password" placeholder="Password" required class="form-control rounded-pill border-0 shadow-sm px-4 text-danger">
                                        </div>
                                        <div class="form-group mb-3">
                                            <input type="password" name="password2" placeholder="Confirm Password" required class="form-control rounded-pill border-0 shadow-sm px-4 text-danger">
                                        <br>
                                        </div>
                                        <?php
                                            if(isset($error)) {
                                                foreach($error as $error) {
                                                    echo "<p style=color:red>".$error."</p>";
                                                };
                                            };
                                        ?> 
                                        <input type="submit" name="submit" value="Sign Up" class="btn btn-danger btn-block text-uppercase mb-2 rounded-pill shadow-sm">
                                        <div class="text-center d-flex justify-content-between mt-4"><p> Already have an account?<a href="login_form.php" class="font-italic text-muted"> <u>Login!</u></a></p>
                                        </div> 
                                    </form> 
                                </div> 
                            </div> 
                        </div> 
                    </div> 
                </div> 
            </div>
        </div>
    </div>
</body>