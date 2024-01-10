<?php require "header.php"; ?>
<!-- Page Wrapper -->
<div id="wrapper">

  <!-- Sidebar -->
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
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
        <h2> Property Adding Section</h2>
        <hr style="border: solid 1px rgb(137, 137, 228);">

        <body>
          <div class="formbold-main-wrapper">
            <!-- Author: FormBold Team -->
            <!-- Learn More: https://formbold.com -->
            <div class="formbold-form-wrapper">
              <!-- <img src="your-image-here.jpg"> -->
              <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" >
                <div class="formbold-input-flex">
                  <div>
                    <label for="PR_TYPE" class="formbold-form-label"> Property Type </label>
                    <input type="text" name="PR_TYPE" id="PR_TYPE" placeholder="property type"
                      class="formbold-form-input" />
                  </div>

                  <div>
                    <label for="PR_LOCATION" class="formbold-form-label">Catagoray Location </label>
                    <input type="text" name="PR_LOCATION" id="PR_LOCATION" placeholder=" catagoray name"
                      class="formbold-form-input" />
                  </div>
                </div>
                <div class="formbold-input-flex">
                  <div>
                    <label for="PR_CITY" class="formbold-form-label"> CITY </label>
                    <input type="text" name="PR_CITY" id="PR_CITY" placeholder="CITY" class="formbold-form-input" />
                  </div>
                  <div>
                    <label for="PR_NAME" class="formbold-form-label"> NAME </label>
                    <input type="text" name="PR_NAME" id="PR_NAME" placeholder="NAME" class="formbold-form-input" />
                  </div>

                </div>
                <div class="formbold-input-flex">
                  <div>
                    <label for="PR_PRICE" class="formbold-form-label"> price </label>
                    <input type="text" name="PR_PRICE" id="PR_PRICE" placeholder="price" class="formbold-form-input" />
                  </div>

                  <div>
                    <?php
                    include '../config/config.php';
                    $sql = "SELECT CAT_ID, CAT_NAME FROM category";
                    $result = $conn->query($sql);


                    echo '<label class="formbold-form-label">select catagoray</label>';

                    echo ' <select class="formbold-form-input" name="CAT_ID" id="CAT_ID">';

                    if ($result->num_rows > 0) {
                      while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row["CAT_ID"] . '">' . $row["CAT_NAME"] . '</option>';
                      }
                    } else {
                      echo '<option value="">No categories found</option>';
                    }
                    ?>
                    </select>

                  </div>
                </div>
                <div class="formbold-input-flex">
                  <div>
                    <label for="PR_SQFT" class="formbold-form-label"> SQFT </label>
                    <input type="text" name="PR_SQFT" id="PR_SQFT" placeholder="FEATURES" class="formbold-form-input" />
                  </div>
                  <div>
                    <label for="PR_FEATURES" class="formbold-form-label"> FEATURES </label>
                    <input type="text" name="PR_FEATURES" id="PR_FEATURES" placeholder="FEATURES"
                      class="formbold-form-input" />
                  </div>

                  <div>
                    <label for="PR_YEAROFBUILD" class="formbold-form-label"> YEAROFBUILD </label>
                    <input type="date" name="PR_YEAROFBUILD" id="PR_YEAROFBUILD" placeholder="PR_YEAROFBUILD"
                      class="formbold-form-input" />
                  </div>
                </div>
                <div class="formbold-input-flex">
                  <div>
                    <label for="PR_DESCRIPTION" class="formbold-form-label"> DESCRIPTION </label>
                    <input type="text" name="PR_DESCRIPTION" id="PR_DESCRIPTION" placeholder="DESCRIPTION"
                      class="formbold-form-input" />
                  </div>

                  <div>
                    <label for="PR_STATUS" class="formbold-form-label"> STATUS </label>
                    <input type="text" name="PR_STATUS" id="PR_STATUS" placeholder="STATUS"
                      class="formbold-form-input" />
                  </div>
                </div>
                <div class="formbold-input-flex">
                  <div>
                    <label for="RN_SALON" class="formbold-form-label"> SALON </label>
                    <input type="text" name="RN_SALON" id="RN_SALON" placeholder="SALON" class="formbold-form-input" />
                  </div>

                  <div>
                    <label for="RN_BATHROOM" class="formbold-form-label"> BATHROOM </label>
                    <input type="text" name="RN_BATHROOM" id="RN_BATHROOM" placeholder="BATHROOM"
                      class="formbold-form-input" />
                  </div>
                  <div>
                    <label for="RN_BEDROOM" class="formbold-form-label"> BEDROOM </label>
                    <input type="text" name="RN_BEDROOM" id="RN_BEDROOM" placeholder="BEDROOM"
                      class="formbold-form-input" />
                  </div>
                  <div>
                    <label for="RN_KITCHEN" class="formbold-form-label"> KITCHEN </label>
                    <input type="text" name="RN_KITCHEN" id="RN_KITCHEN" placeholder="KITCHEN"
                      class="formbold-form-input" />
                  </div>
                  <div>
                    <label for="RN_SERVICE" class="formbold-form-label"> SERVICE </label>
                    <input type="text" name="RN_SERVICE" id="RN_SERVICE" placeholder="SERVICE"
                      class="formbold-form-input" />
                  </div>

                </div>
                <hr>
                <div class="formbold-form-file-flex">
                  <label for="upload" class="formbold-form-label">
                    Upload Picture
                  </label>
                  <input type="file" name="upload" id="upload" class="formbold-form-file" />
                </div>
                    <hr>
                    <div class="formbold-form-file-flex">
                  <label for="uploadG" class="formbold-form-label">
                    Upload Gallery Pictures
                  </label>
                  <input type="file" name="uploadG" id="uploadG" class="formbold-form-file" multiple/>
                </div>
                <button class="formbold-btn" type="submit">Add Item</button>
              </form>
            </div>
          </div>

        </body>
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST" $$ isset($_POST)) {
    if (!empty($_POST)) {
        $RN_SALON = $_POST['RN_SALON'];
        $RN_BEDROOM = $_POST['RN_BEDROOM'];
        $RN_KITCHEN = $_POST['RN_KITCHEN'];
        $RN_SERVICE = $_POST['RN_SERVICE'];
        $RN_BATHROOM = $_POST['RN_BATHROOM'];

        $pr_pic = $_FILES["PR_PIC"];
        $pr_type = $_POST["PR_TYPE"];
        $pr_location = $_POST["PR_LOCATION"];
        $pr_price = $_POST["PR_PRICE"];
        $pr_description = $_POST["PR_DESCRIPTION"];
        $pr_sqft = $_POST["PR_SQFT"];
        $pr_yearofbuild = $_POST["PR_YEAROFBUILD"];
        $pr_features = $_POST["PR_FEATURES"];
        $pr_status = $_POST["PR_STATUS"];
        $rn_id = $_POST["RN_ID"];
        $cat_id = $_POST["CAT_ID"];
        $created_at = $_POST["CREATED_AT"];
        $pr_city = $_POST["PR_CITY"];
        $pr_name = $_POST["PR_NAME"];

        $dir = 'thumbnail/' . basename($pr_pic);
        $sql = "INSERT INTO property (PR_PIC, PR_TYPE, PR_LOCATION, PR_PRICE, PR_DESCRIPTION, PR_SQFT, PR_YEAROFBUILD, PR_FEATURES, PR_STATUS, RN_ID, CAT_ID, CREATED_AT, PR_CITY, PR_NAME) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        





//         try {
//           if ($_FILES["upload"]["error"] == 4) {
//               echo "<script> alert('Image Does Not Exist'); </script>";
//           } else {
//               $fileName = $_FILES["upload"]["name"];
//               $fileSize = $_FILES["upload"]["size"];
//               $tmpName = $_FILES["upload"]["tmp_name"];
  
//               $validImageExtension = ['jpg', 'jpeg', 'png'];
//               $imageExtension = explode('.', $fileName);
//               $imageExtension = strtolower(end($imageExtension));
  
//               if (!in_array($imageExtension, $validImageExtension)) {
//                   echo "<script>alert('Invalid Image Extension');</script>";
//               } else if ($fileSize > 1000000) {
//                   echo "<script>alert('Image Size Is Too Large');</script>";
//               } else {
//                   $newImageName = uniqid() . '.' . $imageExtension;
  
//                   // Check if the upload directory exists, create it if not
//                   $uploadDirectory = 'Pimg/';
//                   if (!is_dir($uploadDirectory)) {
//                       mkdir($uploadDirectory, 0777, true);
//                   }
  
//                   $destination = $uploadDirectory . $newImageName;
  
//                   if (move_uploaded_file($tmpName, $destination)) {
//                       $sql = "INSERT INTO property (PR_PIC, PR_TYPE, PR_LOCATION, PR_PRICE, PR_DESCRIPTION, PR_SQFT, PR_YEAROFBUILD, PR_FEATURES, PR_STATUS, RN_ID, CAT_ID, CREATED_AT, PR_CITY, PR_NAME) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

//                       $stmt = mysqli_prepare($conn, $sql);
              
//                       mysqli_stmt_bind_param($stmt, "sssssssssiisss", $pr_pic, $pr_type, $pr_location, $pr_price, $pr_description, $pr_sqft, $pr_yearofbuild, $pr_features, $pr_status, $rn_id, $cat_id, $created_at, $pr_city, $pr_name);
              
//                       if (mysqli_stmt_execute($stmt)) {
//                           // Retrieve the last inserted property id
//                           $PR_ID = mysqli_insert_id($conn);
//                           echo "Property record inserted successfully";
//                            // Assuming you have a foreign key column in the room table named 'PR_ID'
//                           $sql = "INSERT INTO room_num (PR_ID, RN_SALON, RN_BEDROOM, RN_KITCHEN, RN_SERVICE, RN_BATHROOM) VALUES (?, ?, ?, ?, ?, ?)";

//                           $stmt = mysqli_prepare($conn, $sql);
//                           mysqli_stmt_bind_param($stmt, 'isssss', $PR_ID, $RN_SALON, $RN_BEDROOM, $RN_KITCHEN, $RN_SERVICE, $RN_BATHROOM);

//                           if (mysqli_stmt_execute($stmt)) {
//                               echo "Room record inserted successfully";
//                           } else {
//                               echo "Error: " . $sql . "<br>" . mysqli_error($conn);
//                           }
//                       } else {
//                           echo "<script>alert('Error moving file to destination');</script>";
//                       }
//               }
//           }
//         } catch (Exception $e) {
//             echo "Error: " . $e->getMessage();
//         }

//             ////////////////////
//             try {
//                 $uploadDirectory = 'Gimg/';
//                 $uploadedImageNames = [];

//                 for ($i = 1; $i <= 8; $i++) {
//                     $inputName = "upload" . $i;

//                     if ($_FILES[$inputName]["error"] == 4) {
//                         continue; // Image does not exist, move to the next one
//                     }

//                     $fileName = $_FILES[$inputName]["name"];
//                     $fileSize = $_FILES[$inputName]["size"];
//                     $tmpName = $_FILES[$inputName]["tmp_name"];

//                     $validImageExtension = ['jpg', 'jpeg', 'png'];
//                     $imageExtension = explode('.', $fileName);
//                     $imageExtension = strtolower(end($imageExtension));

//                     if (!in_array($imageExtension, $validImageExtension)) {
//                         echo "<script>alert('Invalid Image Extension');</script>";
//                     } elseif ($fileSize > 1000000) {
//                         echo "<script>alert('Image Size Is Too Large');</script>";
//                     } else {
//                         $newImageName = uniqid() . '.' . $imageExtension;
//                         $destination = $uploadDirectory . $newImageName;

//                         if (move_uploaded_file($tmpName, $destination)) {
//                             $uploadedImageNames[] = $newImageName;
//                         } else {
//                             echo "<script>alert('Error moving file to destination');</script>";
//                         }
//                     }
//                 }

//                 // Insert uploaded image names into the database
//                 $query = "INSERT INTO property_pic (PP_PIC_1, PP_PIC_2, PP_PIC_3, PP_PIC_4, PP_PIC_5, PP_PIC_6, PP_PIC_7, PP_PIC_8, PR_ID) 
//                         VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

//                 $stmt = mysqli_prepare($conn, $query);
//                 $params = array_merge($uploadedImageNames, array_fill(0, 9 - count($uploadedImageNames), null), [$PR_ID]);

//                 mysqli_stmt_bind_param($stmt, 'ssssssssi', ...$params);

//                 if (mysqli_stmt_execute($stmt)) {
//                     echo "<script>alert('Successfully Added');</script>";
//                 } else {
//                     echo "Error: " . $query . "<br>" . mysqli_error($conn);
//                 }

//                 mysqli_stmt_close($stmt);
//             } catch (Exception $e) {
//                 echo "Error: " . $e->getMessage();
//             }
//         } else {
//             echo "Error: " . $sql . "<br>" . mysqli_error($conn);
//         }

//         mysqli_stmt_close($stmt);
//     } else {
//         echo "Form data is empty. Please submit the form.";
     }
}

// mysqli_close($conn);

?>

  
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