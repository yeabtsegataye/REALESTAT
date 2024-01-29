<?php
  // require_once('../config/config.php');
  require '';
  if(isset($_POST['submit'])){
    if(empty($_POST['firstName']) OR empty($_POST['lastName']) OR empty($_POST['email']) OR empty($_POST['password']) OR empty($_POST['confirmPassword'])){
      echo "<script>alert('some inputs are empty'); </script>";
    } else{
      $firstName = $_POST['firstName'];
      $middleName = $_POST['middleName'];
      $lastName = $_POST['lastName'];
      $email = $_POST['email'];
      $password = ($_POST['password']);
      $confirm_password = ($_POST['confirmPassword']);
      //RegEx for checking email address
      // checking if the password is atleast 8 characters long
      if(strlen($password) < 8){
        echo "<script>alert('passwordmust be atleast 8 characters');</script>";
      }else{
          //Checking password and confirmation password fields to match each other.
        if (strcmp($password, $confirm_password) == 0) {
          header("location: login.php");
        }else{
          echo "<script>alert('password and confirm password are not equal');</script>";
        }
      }
    }
  }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Admin - Register</title>

    <!-- Custom fonts for this template-->
    <link
      href="vendor/fontawesome-free/css/all.min.css"
      rel="stylesheet"
      type="text/css"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
      rel="stylesheet"
    />

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet"/>
  </head>

  <body class="bg-gradient-primary">
    <div class="container">
      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg-6 d-none d-lg-block">
                                <img src="../images/realestatelogin.jpg" alt="" style='width:550px; height: 490px;'>
            </div>
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                </div>
                <form action="" method="POST" class="user">
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input
                        type="text"
                        name="firstName"
                        class="form-control form-control-user"
                        id="exampleFirstName"
                        placeholder="First Name"
                      />
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input
                        type="text"
                        name="MName"
                        class="form-control form-control-user"
                        id="exampleFirstName"
                        placeholder="Middle Name"
                      />
                    </div>
                    <div class="col-sm-6">
                      <input
                        type="text"
                        name="lastName"
                        class="form-control form-control-user"
                        id="exampleLastName"
                        placeholder="Last Name"
                      />
                    </div>
                  </div>
                  <div class="form-group">
                    <input
                      type="email"
                      name="email"
                      class="form-control form-control-user"
                      id="exampleInputEmail"
                      placeholder="Email Address"
                    />
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input
                        type="password"
                        name="password"
                        class="form-control form-control-user"
                        id="exampleInputPassword"
                        placeholder="Password"
                      />
                    </div>
                    <div class="col-sm-6">
                      <input
                        type="password"
                        name="confirmPassword"
                        class="form-control form-control-user"
                        id="confirmPassword"
                        placeholder="Confirm Password"
                      />
                    </div>
                  </div>
                  <a href="login.php">
                    <input
                      type="submit"
                      name="submit"
                      class="btn btn-primary btn-user btn-block"
                      value="Register Account "
                    />
                  </a>
                  <hr />
                  <!-- <button type='submit' class="btn btn-google btn-user btn-block"
                    onclick="window.location = ''"><i class="fab fa-google fa-fw"></i> Register with Google</button> -->
                  <!-- <a
                    href="index.php"
                    class="btn btn-google btn-user btn-block"
                    onclick="window.location = ''"
                  >
                    <i class="fab fa-google fa-fw"></i> Register with Google
                  </a> -->
                  <!-- <a
                    href="index.html"
                    class="btn btn-facebook btn-user btn-block"
                  >
                    <i class="fab fa-facebook-f fa-fw"></i> Register with
                    Facebook
                  </a> -->
                </form>
                <hr />
                <div class="text-center">
                  <a class="small" href="forgot-password.php"
                    >Forgot Password?</a>
                </div>
                <div class="text-center">
                  Already have an account?
                  <a class="small" href="login.php">Login!</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
  </body>
</html>
