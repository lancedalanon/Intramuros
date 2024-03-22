<?php
@include 'config.php';

session_start();

if(isset($_POST['submit'])) {

    $email = mysqli_real_escape_string($conn, $_GET['email']);
    $verification_code = mysqli_real_escape_string($conn, $_POST['verification_code']);
    
    $select = $conn->prepare("UPDATE login SET isEmailVerified = 'yes' WHERE email = ? AND verification_code = ? AND isEmailVerified = 'no'");
    $select->bind_param('ss', $email, $verification_code);
    $select->execute();

    if (mysqli_affected_rows($conn) == 0) {
        $error[] = 'Verification failed.';

    } else {
        header('location:login_form.php');
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
        <title>Verification</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.png" />
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" crossorigin="anonymous"></script>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <style>
        .login, .image{
            min-height: 100vh
        }
        .bg-image{
            background-image: url('assets/img/intramuros-verify.jpg');
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
                                <h3 class="display-4">VERIFICATION</h3>
                                    <br> 
                                    <form id="form" action="" method="POST"> 
                                        <div class="form-group mb-3"> 
                                            <input type="hidden" name="email" value="<?php echo $_GET['email'];?>" required>
                                            <input type="text" name="verification_code" placeholder="Enter code recieved via email" required class="form-control rounded-pill border-0 shadow-sm px-4">
                                        </div>
                                        <?php
                                            if(isset($error)) {
                                                foreach($error as $error) {
                                                    echo "<p style=color:red>".$error."</p>";
                                                };
                                            };
                                        ?> 
                                        <input type="submit" name="submit" value="Verify" class="btn btn-danger btn-block text-uppercase mb-2 rounded-pill shadow-sm">
                                        <div class="text-center d-flex justify-content-between mt-4"><p> Haven't recieved your code yet?<a href="register_form.php" class="font-italic text-muted"> <u>Click to register again!</u></a></p>
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