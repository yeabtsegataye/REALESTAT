<?php
require "config/config.php";
session_start();

// ...

function loginUser($conn, $table, $email, $password, $fnameField, $lnameField, $emailField, $idField, $roleField, $PASS)
{
    $login = mysqli_prepare($conn, "SELECT * FROM $table WHERE $emailField=?");
    mysqli_stmt_bind_param($login, 's', $email);
    mysqli_stmt_execute($login);

    $result = mysqli_stmt_get_result($login);
    $fetch = mysqli_fetch_assoc($result);

    // ... (previous code)

if ($fetch) {
    $hashed_password_from_db = $fetch[$PASS];
    if (password_verify($password, $hashed_password_from_db)) {
        // Regenerate session ID
        session_regenerate_id(true);

        // Set session variables
        $_SESSION['ROLE'] = $fetch[$roleField];
        if ($_SESSION['ROLE'] == 'admin') {
            $_SESSION['AD_FNAME'] = $fetch[$fnameField];
            $_SESSION['AD_LNAME'] = $fetch[$lnameField];
            $_SESSION['AD_EMAIL'] = $fetch[$emailField];
            $_SESSION['AD_ID'] = $fetch[$idField];
            header("location: admins/index.php");  
        } 
        elseif ($_SESSION['ROLE'] == 'employee') {
            $_SESSION['EM_FNAME'] = $fetch[$fnameField];
            $_SESSION['EM_LNAME'] = $fetch[$lnameField];
            $_SESSION['EM_EMAIL'] = $fetch[$emailField];
            $_SESSION['EM_ID'] = $fetch[$idField];
            header("location: Employee/assignedCustomers.html"); 
        } 
        else {
            $_SESSION['US_FNAME'] = $fetch[$fnameField];
            $_SESSION['US_LNAME'] = $fetch[$lnameField];
            $_SESSION['US_EMAIL'] = $fetch[$emailField];
            $_SESSION['US_ID'] = $fetch[$idField];
            header("location: index.php");  
        }
        exit;
    } else {
        echo "<script>alert('Password is not correct');</script>";
    }
} else {
    echo "<script>alert('Email does not exist');</script>";
}
    mysqli_stmt_close($login);
}


if (isset($_POST['submit'])) {
    if (empty($_POST['EMAIL']) || empty($_POST['PASSWORD'])) {
        echo "<script>alert('Some inputs are empty');</script>";
    } else {
        $EMAIL = $_POST['EMAIL'];
        $PASSWORD = $_POST['PASSWORD'];
        $loginAs = $_POST['loginAs'];

        switch ($loginAs) {
            case 'users':
                loginUser($conn, 'users', $EMAIL, $PASSWORD, 'US_FNAME', 'US_LNAME', 'US_EMAIL', 'US_ID', 'role','US_PASSWORD');
                break;
            case 'employee':
                loginUser($conn, 'employee', $EMAIL, $PASSWORD, 'EM_FNAME', 'EM_LNAME', 'EM_EMAIL', 'EM_ID', 'role','EM_PASSWORD');
                break;
            case 'admin':
                loginUser($conn, 'admin', $EMAIL, $PASSWORD, 'AD_FNAME', 'AD_LNAME', 'AD_EMAIL', 'AD_ID', 'role','AD_PASSWORD');
                break;
        }

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
                                            <input type="email" name='EMAIL' class="form-control form-control-user"
                                                id="exampleInputEmail"
                                                placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name='PASSWORD'
                                                class="form-control form-control-user" id="exampleInputPassword"
                                                placeholder="Password">
                                        </div>
                                        <!-- <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="radio" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div> -->
                                        <label>Login As:</label>
                                        <div class="form-group">
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="adminRadio" name="loginAs"
                                                    class="custom-control-input" value="admin">
                                                <label class="custom-control-label" for="adminRadio">Admin</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="employeeRadio" name="loginAs"
                                                    class="custom-control-input" value="employee">
                                                <label class="custom-control-label" for="employeeRadio">Employee</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="userRadio" name="loginAs"
                                                    class="custom-control-input" value="users" checked>
                                                <label class="custom-control-label" for="userRadio">User</label>
                                            </div>
                                        </div>
                                        <a href="">
                                            <input type='submit' name='submit'
                                                class="btn btn-primary btn-user btn-block" value='Login' />
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