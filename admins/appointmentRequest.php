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

<a class="nav-link" href="addAdmin.php">
    <i class="fas fa-fw fa-table"></i>
    <span>Add Admin</span></a>
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
        <form class="form-inline">
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
        </form>

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
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tables</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
              DataTables Example
            </h6>
          </div>
          <div class="card-body">
          <?php
                include '../config/config.php';
                ?>
      <?php
// Fetch appointment data from the database
$sql = "SELECT AP_PUROPSE, AP_TIME, AP_DATE, AP_SUGESSTION, US_ID FROM appointment";
$result = mysqli_query($conn, $sql);

// Check if the query was successful
if ($result === false) {
  // Handle the error, log it, or display an error message
  die("Error fetching data from the database: " . mysqli_error($conn));
}

// Store the fetched data in an array
$appointments = [];
while ($row = mysqli_fetch_assoc($result)) {
  $appointments[] = $row;
}

// Close the database connection
mysqli_close($conn);
?>


<div class="table-responsive">
  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
      <tr>
        <th>Purpose</th>
        <th>Time</th>
        <th>Date</th>
        <th>Suggestion</th>
        <th>User ID</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($appointments as $appointment): ?>
        <tr>
          <td><?= $appointment['AP_PUROPSE']; ?></td>
          <td><?= $appointment['AP_TIME']; ?></td>
          <td><?= $appointment['AP_DATE']; ?></td>
          <td><?= $appointment['AP_SUGESSTION']; ?></td>
          <td><?= $appointment['US_ID']; ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>



          </div>
        </div>
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
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>
</body>

</html>