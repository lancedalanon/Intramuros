<?php
@include 'config.php';

session_start();

if(isset($_POST['submit'])) {

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = md5($_POST['password']);
    
    $select = "SELECT * FROM login WHERE username = ? && password = ? && isEmailVerified = 'yes';";

    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $select)) {
        echo "SQL connection failed";

    } else {
        mysqli_stmt_bind_param($stmt, "ss", $username, $password);

        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        if(mysqli_num_rows($result) > 0) {
        
            $row = mysqli_fetch_array($result);
    
            if($row['user_type'] == 'admin') {

                $_SESSION['admin_name'] = $row['username'];
                $_SESSION['admin_id'] = $row['id'];
                $_SESSION['admin_email'] = $row['email'];
                $_SESSION['admin_phone'] = $row['phone'];
                $_SESSION['admin_password'] = $row['password'];
                header('location:index.php');
    
            } else if($row['user_type'] == 'user') {
    
                $_SESSION['user_name'] = $row['username'];
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['user_email'] = $row['email'];
                $_SESSION['user_phone'] = $row['phone'];
                $_SESSION['user_password'] = $row['password'];
                header('location:index.php');
            }
        } else {
            $error[] = 'Incorrect username or password or the account is not verified!
            Please re-register your credentials to get verified';
        }
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
        <title>Login</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.png" />
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" crossorigin="anonymous"></script>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <style>
        .login, .image{
            min-height: 100vh
        }
        .bg-image{
            background-image: url('assets/img/intramuros-login.jpg');
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
                                <h3 class="display-4">LOGIN</h3>
                                    <br> 
                                    <form id="form" action="" method="POST"> 
                                        <div class="form-group mb-3"> 
                                            <input type="text" name="username" placeholder="Username" required class="form-control rounded-pill border-0 shadow-sm px-4">
                                        </div>
                                        <div class="form-group mb-3">
                                            <input type="password" name="password" placeholder="Password" required class="form-control rounded-pill border-0 shadow-sm px-4 text-danger">
                                        <br>
                                        </div>
                                        <?php
                                            if(isset($error)) {
                                                foreach($error as $error) {
                                                    echo "<p style=color:red>".$error."</p>";
                                                };
                                            };
                                        ?> 
                                        <input type="submit" name="submit" value="Login" class="btn btn-danger btn-block text-uppercase mb-2 rounded-pill shadow-sm">
                                        <div class="text-center d-flex justify-content-between mt-4"><p> Don't have an account yet?<a href="register_form.php" class="font-italic text-muted"> <u>Sign Up</u></a></p>
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