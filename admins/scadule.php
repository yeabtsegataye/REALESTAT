<?php require "header.php"; ?>


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
    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
      <a class="nav-link" href="index.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Admin Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider" />
    <div class="sidebar-heading">Managment Tools</div>

    <!-- Nav Item - Pages Collapse Menu -->

    <!-- Nav Item - Charts -->
    <li class="nav-item">
      <a class="nav-link" href="charts.php">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Charts</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
      <a class="nav-link" href="tables.php">
        <i class="fas fa-fw fa-table"></i>
        <span>Employee Tables</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="addEmp.php">
        <i class="fas fa-fw fa-table"></i>
        <span>Add Employee</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="addCategory.php">
        <i class="fas fa-fw fa-table"></i>
        <span>Manage Catagoray</span></a>
    <li class="nav-item">
      <a class="nav-link" href="addProperty.php">
        <i class="fas fa-fw fa-table"></i>
        <span>Manage Property</span></a>
    </li>
    </li>

    <li class="nav-item">

      <a class="nav-link" href="scadule.php">
        <i class="fas fa-fw fa-table"></i>
        <span>Assign Scadule</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../index.php">
        <i class="fas fa-fw fa-table"></i>
        <span>Back to Home</span></a>
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
          <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
              aria-label="Search" aria-describedby="basic-addon2" />
            <div class="input-group-append">
              <button class="btn btn-primary" type="button">
                <i class="fas fa-search fa-sm"></i>
              </button>
            </div>
          </div>
        </form>

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
              <h2> Assign user Section</h2>
              <hr style="border: solid 1px rgb(137, 137, 228);">
              <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
                <div class="formbold-input-flex">
                  <?php
                  // Connect to your database (assuming you have a config file)
                  include '../config/config.php';

                  // Prepare and execute the query to fetch employee data
                  $sql = "SELECT EM_ID, EM_FNAME FROM employee";
                  $result = mysqli_query($conn, $sql);

                  // Check for errors
                  if (!$result) {
                    die("Error fetching employees: " . mysqli_error($conn));
                  }

                  // Generate select options
                  $options = "";
                  while ($row = mysqli_fetch_assoc($result)) {
                    $options .= '<option value="' . $row['EM_ID'] . '">' . $row['EM_FNAME'] . '</option>';
                  }

                  // Close the database connection
                  mysqli_close($conn);
                  ?>

                  <div>
                    <label class="formbold-form-label">Employee</label>

                    <select class="formbold-form-input" name="employee" id="occupation">
                      <?php echo $options; ?>
                    </select>
                  </div>

                  <?php
                  // Connect to your database (assuming you have a config file)
                  include '../config/config.php';

                  // Prepare and execute the query to fetch customer data
                  $sql = "SELECT users.US_ID, users.US_FNAME, appointment.AP_ID FROM users INNER JOIN appointment ON users.US_ID = appointment.US_ID";
                  $result = mysqli_query($conn, $sql);

                  // Check for errors
                  if (!$result) {
                    die("Error fetching customers: " . mysqli_error($conn));
                  }

                  // Generate select options
                  $options1 = "";
                 $ap_id = '';
                  while ($row = mysqli_fetch_assoc($result)) {
                    $options1 .= '<option value="' . $row['US_ID'] . '">' . $row['US_FNAME'] . '</option>'; 
                    $ap_id = $row['AP_ID'];
                  }

                  // Close the database connection
                  mysqli_close($conn);
                  ?>

                  <div>
                    <label class="formbold-form-label">Customer</label>

                    <select class="formbold-form-input" name="customer" id="occupation">
                      <?php echo $options1; ?>
                    </select>
                  </div>

                </div>

                <?php
                // Connect to your database (assuming you have a config file)
                include '../config/config.php';

                // Prepare and execute the query to fetch customer data
                $sql = "SELECT users.US_ID, users.US_FNAME, users.US_CELLPHONE1 FROM users INNER JOIN appointment ON users.US_ID = appointment.US_ID";
                $result = mysqli_query($conn, $sql);

                // Check for errors
                if (!$result) {
                  die("Error fetching customers: " . mysqli_error($conn));
                }

                // Fetch the first customer's phone number (modify if you need multiple)
                $row = mysqli_fetch_assoc($result);
                $phone = $row['US_CELLPHONE1'];

                // Close the database connection
                mysqli_close($conn);
                ?>

                <div class="formbold-mb-3 formbold-input-wrapp">
                  <label for="phone" class="formbold-form-label">
                    Customer Phone
                  </label>

                  <div>
                    <input type="text" value="<?php echo $phone; ?>" name="phone" id="phone"
                      class="formbold-form-input" />
                  </div>
                </div>



                <?php
                // Connect to your database (assuming you have a config file)
                include '../config/config.php';

                // Prepare and execute the query to fetch appointment data
                $sql = "SELECT AP_DATE, AP_TIME FROM appointment"; // Adjust the WHERE clause if needed
                $result = mysqli_query($conn, $sql);

                // Check for errors
                if (!$result) {
                  die("Error fetching appointment data: " . mysqli_error($conn));
                }

                // Fetch the first appointment's date and time (modify if you need multiple)
                $row = mysqli_fetch_assoc($result);
                $appointmentDate = $row['AP_DATE'];
                $appointmentTime = $row['AP_TIME'];

                // Close the database connection
                mysqli_close($conn);
                ?>

                <div class="formbold-mb-3">
                  <label for="apdate" class="formbold-form-label">
                    Apointment Date
                  </label>
                  <input type="date" name="apdate" id="apdate" class="formbold-form-input"
                    value="<?php echo $appointmentDate; ?>" />
                </div>

                <div class="formbold-mb-3">
                  <label for="aptime" class="formbold-form-label">
                    Apointment Time
                  </label>
                  <input type="time" name="aptime" id="aptime" class="formbold-form-input"
                    value="<?php echo $appointmentTime; ?>" />
                </div>



                <button class="formbold-btn" name='submit'>Assign date</button>
              </form>
              <?php
// Assuming the form action is the current script
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
  // Connect to your database (assuming you have a config file)
    include '../config/config.php';

    // Get form data
    $employeeID = $_POST['employee'];
    $customerID = $_POST['customer'];
    $ap_ids = $ap_id;
   
    // Insert data into assign_appointment table
    $insertSQL = "INSERT INTO assign_appointment (US_ID, AP_ID, EM_ID) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $insertSQL);
    mysqli_stmt_bind_param($stmt, 'iii', $customerID, $ap_ids, $employeeID);

    // Execute the insert statement
    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Data inserted successfully');</script>";
    } else {
        echo "<script>alert('Error inserting data: " . mysqli_error($conn) . "');</script>";
    }

    // Close the statement
    mysqli_stmt_close($stmt);
    
    // Close the database connection
    mysqli_close($conn);
}
?>
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
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>
<script src="js/demo/chart-bar-demo.js"></script>
</body>

</html>
