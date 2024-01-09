
<?php require "config/config.php"; ?>
<?php
session_start();

if (isset($_POST['submit'])) {
    if (empty($_POST['US_EMAIL']) || empty($_POST['US_PASSWORD'])) {
        echo "<script>alert('Some inputs are empty');</script>";
    } else {
        $US_EMAIL = $_POST['US_EMAIL'];
        $US_PASSWORD = $_POST['US_PASSWORD'];

        // Prepare and execute the SQL statement
        $login = mysqli_prepare($conn, "SELECT * FROM users WHERE US_EMAIL=?");
        mysqli_stmt_bind_param($login, 's', $US_EMAIL);
        mysqli_stmt_execute($login);

        // Get the result
        $result = mysqli_stmt_get_result($login);
        $fetch = mysqli_fetch_assoc($result);

        if ($fetch) {
            // Debugging: Print out the hashed password from the database
            $hashed_password_from_db = $fetch['US_PASSWORD'];
            echo "Hashed Password from Database: $hashed_password_from_db";

            echo "Password Verify Result: " . (password_verify($US_PASSWORD, $hashed_password_from_db) ? 'true' : 'false');


            if (password_verify($US_PASSWORD, $hashed_password_from_db)) {
                $_SESSION['US_FNAME'] = $fetch['US_FNAME'];
                $_SESSION['US_LNAME'] = $fetch['US_LNAME'];
                $_SESSION['US_EMAIL'] = $fetch['US_EMAIL'];
                $_SESSION['US_ID'] = $fetch['US_ID'];

                header("location: index.php");
                exit;
            } else {
                echo "<script>alert('Password is not correct');</script>";
            }
        } else {
            echo "<script>alert('Email does not exist');</script>";
        }

        // Close the statement and connection
        mysqli_stmt_close($login);
        mysqli_close($conn);
    }
}
?>




<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>User - Login</title>

    <!-- Custom fonts for this template-->
    <link href="admins/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="admins/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block">
                                <img src="images/realestatelogin.jpg" alt="" style='width:500px; height: 465px;'>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form action="login.php" method="POST" class="user">
                                        <div class="form-group">
                                            <input type="email" name='US_EMAIL' class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name='US_PASSWORD' class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <a href=""> 
                                          <input type='submit' name='submit' class="btn btn-primary btn-user btn-block"
                                            value='Login' />
                                        </a>
                                        <hr>
                                        <!-- <a href="index.html" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a> -->
                                    </form>
                                    <!-- <hr> -->
                                    <!-- <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div> -->
                                    <div class="text-center">
                                        <a class="small" href="signup.php">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>