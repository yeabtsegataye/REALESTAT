<!DOCTYPE html>
<html lang="en">
<?php
session_start();

?>

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
          <span> Favorite</span></a>
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
          <a href="../logout.php" class="btn btn-primary">Loug out</a>

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
                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                      Scadule Table
                    </h6>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">




                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                          <tr>
                            <th>Emp_Name</th>
                            <th>Emp_phone</th>
                            <th>Emp_email</th>
                            <th>Date</th>
                            <th>Time</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th>Emp_Name</th>
                            <th>Emp_phone</th>
                            <th>Emp_email</th>
                            <th>Date</th>
                            <th>Time</th>
                          </tr>
                        </tfoot>
                        <tbody>
                          <?php
                          include '../config/config.php';

                          // Assuming session has already started
                          $id = $_SESSION['US_ID'];

                          if ($id) {
                            // Assuming $conn is defined and is a valid mysqli connection
                            $qry = "SELECT * FROM assign_appointment WHERE US_ID = $id";
                            $result = mysqli_query($conn, $qry);

                            if ($result) {
                              while ($row = mysqli_fetch_assoc($result)) {
                                $AP_ID = $row['AP_ID'];
                                $EM_ID = $row['EM_ID'];

                                // Fetch employee details
                                $qry_emp = "SELECT EM_EMAIL, EM_CELLPHONE1, EM_FNAME FROM employee WHERE EM_ID = $EM_ID";
                                $emp_result = mysqli_query($conn, $qry_emp);
                                $employee = mysqli_fetch_assoc($emp_result);

                                // Fetch appointment details
                                $qry_appoint = "SELECT AP_DATE, AP_TIME FROM appointment WHERE AP_ID = $AP_ID";
                                $appoint_result = mysqli_query($conn, $qry_appoint);
                                $appointment = mysqli_fetch_assoc($appoint_result);

                                echo "<tr>";
                                echo "<td>" . $employee['EM_FNAME'] . "</td>";
                                echo "<td>" . $employee['EM_CELLPHONE1'] . "</td>";
                                echo "<td>" . $employee['EM_EMAIL'] . "</td>";
                                echo "<td>" . $appointment['AP_DATE'] . "</td>";
                                echo "<td>" . $appointment['AP_TIME'] . "</td>";
                                echo "</tr>";
                              }
                            } else {
                              echo "<tr><td colspan='5'>" . mysqli_error($conn) . "</td></tr>";
                            }
                          } else {
                            echo "<tr><td colspan='5'>Session ID not set.</td></tr>";
                          }
                          ?>
                        </tbody>
                      </table>

                    </div>
                  </div>
                </div>
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