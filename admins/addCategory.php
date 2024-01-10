<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Haylu</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="../css/emp.css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

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
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Admin Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Managment Tools
      </div>

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

      </li>
      <li class="nav-item">

        <a class="nav-link" href="addProperty.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Manage Property</span></a>
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
      <hr class="sidebar-divider d-none d-md-block">

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
                aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
</body>
<h2> Category Adding Section</h2>
<hr style="border: solid 1px rgb(137, 137, 228);">

<body>
  <div class="formbold-main-wrapper">
    <!-- Author: FormBold Team -->
    <!-- Learn More: https://formbold.com -->
    <div class="formbold-form-wrapper">
      <!-- <img src="your-image-here.jpg"> -->
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
        <div class="formbold-input-flex">
          <div>
            <label for="Catagoray_name" class="formbold-form-label"> Category Name </label>
            <input type="text" name="Catagoray_name" id="Catagoray_name" placeholder=" Catagoray name"
              class="formbold-form-input" />
          </div>

          <div>
            <label for="Catagoray_type" class="formbold-form-label"> Category Type </label>
            <input type="text" name="Catagoray_type" id="Catagoray_type" placeholder="Catagoray type"
              class="formbold-form-input" />
          </div>
        </div>

        <div class="formbold-mb-3">
          <label for="Category_Description" class="formbold-form-label">
            Category Description
          </label>
          <textarea rows="6" name="Category_Description" id="Category_Description"
            class="formbold-form-input"></textarea>
        </div>
        <div class="formbold-form-file-flex">
          <label for="upload" class="formbold-form-label">
            Upload Picture
          </label>
          <input type="file" name="upload" id="upload" class="formbold-form-file" />
        </div>

        <button class="formbold-btn" name="submit">Add Category</button>
      </form>
    </div>
  </div>

<?php
// Include database configuration file
include '../config/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $categoryName = $_POST['Catagoray_name'];
    $categoryType = $_POST['Catagoray_type'];
    $categoryDescription = $_POST['Category_Description'];

    try {
        if ($_FILES["upload"]["error"] == 4) {
            echo "<script> alert('Image Does Not Exist'); </script>";
        } else {
            $fileName = $_FILES["upload"]["name"];
            $fileSize = $_FILES["upload"]["size"];
            $tmpName = $_FILES["upload"]["tmp_name"];

            $validImageExtension = ['jpg', 'jpeg', 'png'];
            $imageExtension = explode('.', $fileName);
            $imageExtension = strtolower(end($imageExtension));

            if (!in_array($imageExtension, $validImageExtension)) {
                echo "<script>alert('Invalid Image Extension');</script>";
            } else if ($fileSize > 1000000) {
                echo "<script>alert('Image Size Is Too Large');</script>";
            } else {
                $newImageName = uniqid() . '.' . $imageExtension;

                // Check if the upload directory exists, create it if not
                $uploadDirectory = 'img/';
                if (!is_dir($uploadDirectory)) {
                    mkdir($uploadDirectory, 0777, true);
                }

                $destination = $uploadDirectory . $newImageName;

                if (move_uploaded_file($tmpName, $destination)) {
                    $query = "INSERT INTO category (CAT_NAME, CAT_TYPE, CAT_DESCRIPTION, CAT_PIC) VALUES ('$categoryName', '$categoryType', '$categoryDescription', '$newImageName')";
                    mysqli_query($conn, $query);
                    echo "<script>alert('Successfully Added');</script>";
                } else {
                    echo "<script>alert('Error moving file to destination');</script>";
                }
            }
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}

// Close database connection
mysqli_close($conn);
?>
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