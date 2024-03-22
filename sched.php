<?php
@include 'config.php';

session_start();

function generateRandomString($conn, $length = 24) {

  while(True) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $length > $i ; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    $checkRandom = "SELECT * FROM booking WHERE codeid = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $checkRandom)) {
        echo "SQL connection failed";
    } else {
      mysqli_stmt_bind_param($stmt, 's', $randomString);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      if(mysqli_num_rows($result) > 0) {
        continue;
      }
      else {
        return $randomString;
        break;
      }
    }
  }
}

if(isset($_SESSION['admin_name'])) {
  if(isset($_POST['submit'])) {

    $destination = mysqli_real_escape_string($conn, $_POST['destination']);
    $expected_date = date('Y-m-d', strtotime($_POST['expected_date']));
    $time_in_time_out = mysqli_real_escape_string($conn, $_POST['time_in_time_out']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $password = md5($_POST['password']);
    $password2 = md5($_POST['cpassword']);
    $admin_id = $_SESSION['admin_id'];
    $admin_phone = $_SESSION['admin_phone'];
    $admin_email = $_SESSION['admin_email'];
    $admin_password = $_SESSION['admin_password'];
    $codeid = generateRandomString($conn);
    
    if(($password != $password2) || ($admin_email != $email) || ($admin_phone != $phone) || ($admin_password != $password)) {

      $error[] = 'There was an error trying to submit!';

    } else {
        $insert = "INSERT INTO booking (user_id, destination, expected_date, time_in_time_out,
        price, codeid) VALUES (?,?,?,?,?,?)";

        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $insert)){
            echo "SQL connection error";
        } else {
            mysqli_stmt_bind_param($stmt, 'ssssss', $admin_id, $destination, $expected_date, $time_in_time_out, $price, $codeid);
            mysqli_stmt_execute($stmt);
        }
        header('location:admin_page.php');
    }
  };
} 

else if (isset($_SESSION['user_name'])) {
  if(isset($_POST['submit'])) {

    $destination = mysqli_real_escape_string($conn, $_POST['destination']);
    $expected_date = date('Y-m-d', strtotime($_POST['expected_date']));
    $time_in_time_out = mysqli_real_escape_string($conn, $_POST['time_in_time_out']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $password = md5($_POST['password']);
    $password2 = md5($_POST['cpassword']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $pasword = mysqli_real_escape_string($conn, $_POST['password']);
    $user_id = $_SESSION['user_id'];
    $user_email = $_SESSION['user_email'];
    $user_phone = $_SESSION['user_phone'];
    $user_password = $_SESSION['user_password'];
    $codeid = generateRandomString($conn);
    
    if(($password != $password2) || ($user_email != $email) || ($user_phone != $phone) || ($user_password != $password)) {

        $error[] = 'There was an error trying to submit!';

    } else {
      $insert = "INSERT INTO booking (user_id, destination, expected_date, time_in_time_out,
      price, codeid) VALUES (?,?,?,?,?,?)";

      $stmt = mysqli_stmt_init($conn);
      if(!mysqli_stmt_prepare($stmt, $insert)){
          echo "SQL connection error";
      } else {
          mysqli_stmt_bind_param($stmt, 'ssssss', $user_id, $destination, $expected_date, $time_in_time_out, $price, $codeid);
          mysqli_stmt_execute($stmt);
      }
      header('location:user_page.php');
    }
  };
}  

else {

  header('location:login_form.php');

}
?>
<!DOCTYPE html>
<html>
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
  <!--Favicon-->
  <link rel="icon" type="image/x-icon" href="assets/favicon.png">
  <title>Book Now</title>
  <style>
  body{
      min-height: 100vh;
      width: 100%;
      background-image: linear-gradient(rgba(4,9,30,0.7),rgba(4,9,30,0.7)),url(assets/img/bottom-image.jpg);
      background-size: cover;
      font-family: "Poppins", sans-serif;
  }
  </style>
</head>
<br>
<br>
<br>
<br>
<body class="container bg-light">
  <!-- Start Card -->
  <div class="card">
    <!-- Start Card Body -->
    <div class="card-body">
      <!-- Start Header form -->
      <div class="text-center pt-5">
        <img src="assets/img/intramuros-symbol.png" alt="intramuros-logo" width="72" height="72" />
        <h2>Intramuros Booking Form</h2>
        <p>
          Please enter your credentials rightfully in the form to book.
        </p>
      </div>
      <!-- End Header form -->

      <!-- Start Form -->
      <form id="bookingForm" action="#" method="POST" class="needs-validation" novalidate autocomplete="off">

        <!-- Start Input Email -->
        <div class="form-group">
          <label for="inputEmail">Email</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required />
          <small class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <!-- End Input Email -->

        <!-- Start Input Telephone -->
        <div class="form-group">
          <label for="inputPhone">Phone</label>
          <input type="phone" class="form-control" id="text" name="phone" pattern="[0-9]{11}" placeholder="099xxxxxxx" required />
          <small class="form-text text-muted">We'll never share your phone number with anyone else.</small>
        </div>
        <!-- End Input Telephone -->

        <!-- Start Date -->
        <div class="form-group">
            <label for="inputDate">Date</label>
            <input type="date" class="form-control" id="expected_date" name="expected_date" required />
            <small class="form-text text-muted">Please choose date and time for the booking.</small>
        </div>
        <!-- End Date -->

        <div class="form-row">
          <!-- Start Destination and Destination -->
          <div class="form-group col-md-4">
            <label>Location</label>
            <div class="d-flex flex-row justify-content-between align-items-center">
                <select class="form-control mr-1" name="destination" required>
                    <option value="">Select Location</option>
                    <option value="Casa Manila">Casa Manila</option>
                    <option value="Baluarte">Baluarte</option>
                    <option value="Fort Santiago">Fort Santiago</option>
                    <option value="Manila Cathedral">Manila Cathedral</option>
                    <option value="Barbaras Restaurant">Barbaras Restaurant</option>
                    <option value="Museo de Intramuros">Museo de Intramuros</option>
                </select>
            </div>
          </div>
          <!-- End Destination -->

          <!-- Start Input Time In and Time Out -->
          <div class="form-group col-md-4">
            <label>Time In and Out</label>
            <div class="d-flex flex-row justify-content-between align-items-center">
                <select class="form-control mr-1" name="time_in_time_out" required>
                    <option value="">Select Time In and Time Out</option>
                    <option value="7:30 AM to 12:30 PM">Morning: 7:30 AM to 12:30 PM</option>
                    <option value="12:30 PM to 6:30 PM">Afternoon: 12:30 PM to 6:30 PM</option>
                </select>
            </div>
          </div>
          <!-- End Input Time In and Time Out -->

          <div class="form-group col-md-4">
            <label>Time In and Out</label>
            <div class="d-flex flex-row justify-content-between align-items-center">
                <select class="form-control mr-1" name="price" required>
                    <option value="">Select Price</option>
                <option value="500.00">P 500.00</option>
                </select>
            </div>
          </div>

        </div>
        <!-- End Date and Destination -->

        <!-- Start Input Password -->
        <div class="form-group">
          <label for="inputName">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Your password" required />
          <small class="form-text text-muted">Please fill your password</small>
        </div>
        <!-- End Input Password -->

        <!-- Start Input Confirm Password -->
        <div class="form-group">
          <label for="inputName">Confirm Password</label>
          <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Re-type your password" required />
          <small class="form-text text-muted">Please re-type your password</small>
        </div>
        <!-- End Input Confirm Password -->
        <?php
          if(isset($error)) {
            foreach($error as $error) {
                echo "<p style=color:red>".$error."</p>";
            };
        };
        ?>
        <br>
        <!-- Start Submit Button -->
        <button class="btn btn-primary btn-lg btn-block" name="submit" type="submit">Submit</button>
        <!-- End Submit Button -->
        <br>
      </form>
      <!-- End Form -->
    </div>
    <!-- End Card Body -->
  </div>
  <!-- End Card -->
  <footer>
    <div class="my-4 text-muted text-center">
      <p>Copyright © Intramuros 2022</p>
    </div>
  </footer>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  <!-- Start Scritp for Form -->
  <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
      'use strict';
      window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();
  </script>
  <!-- End Scritp for Form -->
</body>
</html>