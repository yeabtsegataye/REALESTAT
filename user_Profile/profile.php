<?php
require "../config/config.php";
session_start();

// Fetch existing user data
$US_ID = $_SESSION['US_ID'];
$sql = "SELECT * FROM users WHERE US_ID = '$US_ID'";
$select_query = mysqli_query($conn, $sql);

if (!$select_query) {
    // Handle the case where the query fails
    die("Error querying user data: " . mysqli_error($conn));
}

$existing_user_data = mysqli_fetch_assoc($select_query);

if (!$existing_user_data) {
    // Handle the case where no user data is found
    die("No user data found for ID: $US_ID");
}

if (isset($_POST['submit'])) {
    // Validate and sanitize input values
    $fname = isset($_POST['US_FNAME']) ? htmlspecialchars(trim($_POST['US_FNAME'])) : $existing_user_data['US_FNAME'];
    $lname = isset($_POST['US_LNAME']) ? htmlspecialchars(trim($_POST['US_LNAME'])) : $existing_user_data['US_LNAME'];
    $age = isset($_POST['US_AGE']) ? intval($_POST['US_AGE']) : $existing_user_data['US_AGE'];
    $sex = isset($_POST['US_SEX']) ? htmlspecialchars(trim($_POST['US_SEX'])) : $existing_user_data['US_SEX'];
    $cellphone1 = isset($_POST['US_CELLPHONE1']) ? htmlspecialchars(trim($_POST['US_CELLPHONE1'])) : $existing_user_data['US_CELLPHONE1'];
    $cellphone2 = isset($_POST['US_CELLPHONE2']) ? htmlspecialchars(trim($_POST['US_CELLPHONE2'])) : $existing_user_data['US_CELLPHONE2'];
    $country = isset($_POST['US_COUNTRY']) ? htmlspecialchars(trim($_POST['US_COUNTRY'])) : $existing_user_data['US_COUNTRY'];
    $city = isset($_POST['US_CITY']) ? htmlspecialchars(trim($_POST['US_CITY'])) : $existing_user_data['US_CITY'];
    $subcity = isset($_POST['US_SUBCITY']) ? htmlspecialchars(trim($_POST['US_SUBCITY'])) : $existing_user_data['US_SUBCITY'];
    $housenumber = isset($_POST['US_HOUSENUMBER']) ? htmlspecialchars(trim($_POST['US_HOUSENUMBER'])) : $existing_user_data['US_HOUSENUMBER'];
    $email = isset($_POST['US_EMAIL']) ? htmlspecialchars(trim($_POST['US_EMAIL'])) : $existing_user_data['US_EMAIL'];
    $password = isset($_POST['US_PASSWORD']) ? password_hash($_POST['US_PASSWORD'], PASSWORD_DEFAULT) : $existing_user_data['US_PASSWORD'];

    // Update data in the database
    $stmt = mysqli_prepare($conn, "UPDATE users SET US_FNAME = ?, US_LNAME = ?, US_AGE = ?, US_SEX = ?, US_CELLPHONE1 = ?, US_CELLPHONE2 = ?, US_COUNTRY = ?, US_CITY = ?, US_SUBCITY = ?, US_HOUSENUMBER = ?, US_EMAIL = ?, US_PASSWORD = ? WHERE US_ID = ?");

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'ssisssssssssi', $fname, $lname, $age, $sex, $cellphone1, $cellphone2, $country, $city, $subcity, $housenumber, $email, $password, $US_ID);

        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            echo "<script>alert('User data updated successfully!');</script>";
        } else {
            echo "<script>alert('Error updating user data: " . mysqli_error($conn) . "')</script>";
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    }
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Haylu</title>

  <!-- Custom fonts for this template-->
  <link href="../admins/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="../css/emp.css" />
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet" />

  <!-- Custom styles for this template-->
  <link href="../admins/css/sb-admin-2.min.css" rel="stylesheet" />
</head>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      <!-- Sidebar - Brand -->
      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Haylu real state</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0" />

      <!-- Nav Item - Dashboard -->

      <!-- Divider -->
      <hr class="sidebar-divider" />
      <div class="sidebar-heading">Profile Tools</div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="../index.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Back to Home</span></a>
      </li>
      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="./profile.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Edit Profile</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="./favorite.php">
          <i class="fas fa-fw fa-table"></i>
          <span> Favourite</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./myScadule.php">
          <i class="fas fa-fw fa-table"></i>
          <span>My Scadule</span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block" />

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
          </form>
          <a href="../logout.php" class="btn btn-primary">Log out</a>

          <!-- Topbar Navbar -->

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <body>
            <div class="formbold-main-wrapper">
              <!-- Author: FormBold Team -->
              <!-- Learn More: https://formbold.com -->
              <div class="formbold-form-wrapper">
                <!-- <img src="your-image-here.jpg"> -->
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"
                    rel="stylesheet">
                  <div class="container">
                    <div class="row flex-lg-nowrap">
                      <div class="col">
                        <div class="row">
                          <div class="col mb-3">
                            <div class="card">
                              <div class="card-body">
                                <div class="e-profile">
                                  <div class="row">
                                    <div class="col-12 col-sm-auto mb-3">
                                      <div class="mx-auto" style="width: 140px;">
                                        <div class="d-flex justify-content-center align-items-center rounded"
                                          style="height: 140px; background-color: rgb(233, 236, 239);">
                                          <span style="color: rgb(166, 168, 170); font: bold 8pt Arial;">140x140</span>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                      <div class="text-center text-sm-left mb-2 mb-sm-0">
                                        <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">Beti </h4>
                                        <div class="mt-2">
                                          <button class="btn btn-primary" type="button">
                                            <i class="fa fa-fw fa-camera"></i>
                                            <span>Change Photo</span>
                                          </button>
                                        </div>
                                      </div>

                                    </div>

                                  </div>
                                  <ul class="nav nav-tabs">
                                    <li class="nav-item"><a href="" class="active nav-link">Settings</a></li>
                                  </ul>
                                  <div class="tab-content pt-3">
                                    <div class="tab-pane active">
                                      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id="myForm">
                                      <div class="formbold-input-flex">
                                          <div>
                                            <label for="country" class="formbold-form-label">First Name</label>
                                            <input type="text" name="US_FNAME" id="country" value="<?php echo $existing_user_data['US_FNAME']; ?>" 
                                              class="formbold-form-input" />
                                            <p id="fameerror" class="error"></p>

                                          </div>
                                          <div>
                                            <label for="city" class="formbold-form-label">Last Name</label>
                                            <input type="text" name="US_LNAME" id="city" value="<?php echo $existing_user_data['US_LNAME']; ?>" 
                                              class="formbold-form-input" />
                                            <p id="lnameerror" class="error"></p>

                                          </div>
                                        </div>
                                        <div class="formbold-input-flex">
                                          <div>
                                            <label for="country" class="formbold-form-label">Country</label>
                                            <input type="text" name="US_COUNTRY" id="country" value="<?php echo $existing_user_data['US_COUNTRY']; ?>" 
                                              class="formbold-form-input" />
                                            <p id="countryError" class="error"></p>

                                          </div>
                                          <div>
                                            <label for="city" class="formbold-form-label">City</label>
                                            <input type="text" name="US_CITY" id="city" value="<?php echo $existing_user_data['US_CITY']; ?>"
                                              class="formbold-form-input" />
                                            <p id="cityError" class="error"></p>

                                          </div>
                                        </div>

                                        <div class="formbold-input-flex">
                                          <div>
                                            <label for="email" class="formbold-form-label">Email</label>
                                            <input type="email" name="US_EMAIL" id="email" value="<?php echo $existing_user_data['US_EMAIL']; ?>"
                                              class="formbold-form-input" />
                                            <p id="emailError" class="error"></p>
                                          </div>
                                          <div>
                                            <label for="password" class="formbold-form-label">Password</label>
                                            <input type="password" name="US_PASSWORD" id="password"
                                              placeholder="Enter Password"value="<?php echo $existing_user_data['US_PASSWORD']; ?>" class="formbold-form-input" />
                                            <p id=""></p>
                                          </div>
                                          <!-- <div>
                                            <label for="password" class="formbold-form-label">New Password</label>
                                            <input type="password" name="newPassword" id="password"
                                              placeholder="Enter Password" class="formbold-form-input" />
                                            <p id=""></p>
                                          </div> -->
                                        </div>
                                        <div>
                                          <label class="formbold-form-label">Gender</label>
                                          <select class="formbold-form-input" name="US_SEX" id="gender">
                                            <option value="<?php echo $existing_user_data['US_SEX']; ?>">Male</option>
                                            <option value="<?php echo $existing_user_data['US_SEX']; ?>">Female</option>
                                          </select>
                                        </div>
                                        <div class="formbold-mb-3 formbold-input-wrapp">
                                          <label for="phone1" class="formbold-form-label">Phone 1</label>
                                          <div>
                                            <!-- <input type="text" name="US_AREACODE1" id="areacode1" placeholder="Area code"
                                              class="formbold-form-input formbold-w-45" /> -->
                                            <input type="text" name="US_CELLPHONE1" id="phone1" value="<?php echo $existing_user_data['US_CELLPHONE1']; ?>"
                                              class="formbold-form-input" />
                                          </div>
                                        </div>
                                        <div class="formbold-mb-3 formbold-input-wrapp">
                                          <label for="phone2" class="formbold-form-label">Phone 2</label>
                                          <div>
                                            <!-- <input type="text" name="US_AREACODE1" id="areacode2" placeholder="Area code"
                                              class="formbold-form-input formbold-w-45" /> -->
                                            <input type="text" name="US_CELLPHONE2" id="phone2" value="<?php echo $existing_user_data['US_CELLPHONE2']; ?>"
                                              class="formbold-form-input" />
                                          </div>
                                        </div>
                                        <div class="formbold-mb-3">
                                          <label for="address" class="formbold-form-label">Sub city</label>
                                          <input type="text" name="US_SUBCITY" id="address" placeholder="Sub city"
                                            class="formbold-form-input formbold-mb-3" />
                                          <input type="text" name="US_HOUSENUMBER" id="address2"
                                            placeholder="House Number" class="formbold-form-input" />
                                        </div>

                                        <input class="formbold-btn" name='submit' type="submit">
                                      </form>

                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>

          </body>




        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->
    </div>
    <!-- End of Content Wrapper -->
  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->

  <!-- Bootstrap core JavaScript-->
  <script src="../admins/vendor/jquery/jquery.min.js"></script>
  <script src="../admins/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../admins/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../admins/js/sb-admin-2.min.js"></script>

</body>

</html>