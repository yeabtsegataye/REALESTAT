<?php require "header.php"; ?>

<?php
include '../config/config.php';
?>
<?php
if (isset($_POST['submit'])) {
    // Check if required fields are empty
    if (empty($_POST['AD_FNAME']) || empty($_POST['AD_LNAME']) || empty($_POST['AD_EMAIL']) || empty($_POST['AD_PASSWORD'])) {
        echo "<script>alert('Name, email, and password fields are required');</script>";
    } else {
        // Assign values to variables
        $firstName = $_POST['AD_FNAME'];
        $lastName = $_POST['AD_LNAME'];
        $country = $_POST['AD_COUNTRY'];
        $city = $_POST['AD_CITY'];
        $subCity = $_POST['AD_SUBCITY'];
        $qualification = $_POST['AD_QULAIFICATION'];
        $salary = $_POST['AD_SALARY'];
        $position = $_POST['AD_POSITION'];
        $email = $_POST['AD_EMAIL'];
        $password = password_hash($_POST['AD_PASSWORD'], PASSWORD_DEFAULT);
        $gender = $_POST['AD_SEX'];
        $cellphone1 = $_POST['AD_CELLPHONE1'];
        $cellphone2 = $_POST['AD_CELLPHONE2'];
        $emergencyContact = $_POST['AD_EMERGENCY_CONTACT'];
        $status = $_POST['AD_STATUS'];
        $dateOfBirth = $_POST['AD_DATEOFBIRTH'];
        $houseNumber = $_POST['AD_HOUSENUMBER'];

        // // Validate phone numbers using regex
        $phoneRegex = '/^\+[0-9]{3}\-[0-9]{3}\-[0-9]{3}\-[0-9]{4}$/';
        if (!preg_match($phoneRegex, $cellphone1) || !preg_match($phoneRegex, $cellphone2)) {
            echo "<script>alert('Invalid phone number format');</script>";
            exit(); // Stop execution if phone number format is invalid
        }

        // Prepare the SQL statement
        $stmt = mysqli_prepare($conn, "INSERT INTO admin(AD_FNAME, AD_LNAME, AD_COUNTRY, AD_CITY, AD_SUBCITY, AD_QULAIFICATION, AD_SALARY, AD_POSITION, AD_EMAIL, AD_PASSWORD, AD_SEX, AD_CELLPHONE1, AD_CELLPHONE2, AD_EMERGENCY_CONTACT, AD_STATUS, AD_DATEOFBIRTH, AD_HOUSENUMBER) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        // Check if the prepare statement was successful
        if ($stmt) {
            try {
                // Bind parameters
                mysqli_stmt_bind_param(
                    $stmt,
                    'sssssssssssssssss',
                    $firstName,
                    $lastName,
                    $country,
                    $city,
                    $subCity,
                    $qualification,
                    $salary,
                    $position,
                    $email,
                    $password,
                    $gender,
                    $cellphone1,
                    $cellphone2,
                    $emergencyContact,
                    $status,
                    $dateOfBirth,
                    $houseNumber
                );

                // Execute the statement
                mysqli_stmt_execute($stmt);

                // Check for successful insertion
                if (mysqli_affected_rows($conn) > 0) {
                    echo "<script>alert('Admin added successfully!');</script>";
                    header("location: index.php");
                } else {
                    echo "<script>alert('Error adding admin');</script>";
                }
            } catch (Exception $e) {
                echo "<script>alert('Error: " . $e->getMessage() . "');</script>";
            } finally {
                // Close the statement
                mysqli_stmt_close($stmt);
            }
        } else {
            echo "Error in preparing statement: " . mysqli_error($conn);
        }
    }
}
?>



<!-- Page Wrapper -->
<div id="wrapper">
    <style>
        .error {
            color: red;
            font-size: 14px;
            margin-top: 6px;
        }
    </style>
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
                            <h2> Admin Adding Section</h2>
                            <hr style="border: solid 1px rgb(137, 137, 228);">
                            <!-- <img src="your-image-here.jpg"> -->
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id="myForm">
                                <div class="formbold-input-flex">
                                    <div>
                                        <label for="AD_FNAME" class="formbold-form-label">First Name</label>
                                        <input type="text" name="AD_FNAME" id="AD_FNAME" placeholder="First Name"
                                            class="formbold-form-input" />
                                        <p id="firstnameError" class="error"></p>

                                    </div>

                                    <div>
                                        <label for="AD_LNAME" class="formbold-form-label">Last Name</label>
                                        <input type="text" name="AD_LNAME" id="AD_LNAME" placeholder="Last Name"
                                            class="formbold-form-input" />
                                        <p id="lastnameError" class="error"></p>

                                    </div>
                                </div>
                                <div class="formbold-input-flex">
                                    <div>
                                        <label for="AD_COUNTRY" class="formbold-form-label">Country</label>
                                        <input type="text" name="AD_COUNTRY" id="AD_COUNTRY" placeholder="Country"
                                            class="formbold-form-input" />
                                        <p id="countryError" class="error"></p>

                                    </div>
                                    <div>
                                        <label for="AD_CITY" class="formbold-form-label">City</label>
                                        <input type="text" name="AD_CITY" id="AD_CITY" placeholder="City"
                                            class="formbold-form-input" />
                                        <p id="cityError" class="error"></p>

                                    </div>
                                    <div>
                                        <label for="AD_SUBCITY" class="formbold-form-label">sub City</label>
                                        <input type="text" name="AD_SUBCITY" id="AD_SUBCITY" placeholder="City"
                                            class="formbold-form-input" />
                                        <p id="cityError" class="error"></p>

                                    </div>
                                </div>
                                <div class="formbold-input-flex">
                                    <div>
                                        <label for="AD_QULAIFICATION" class="formbold-form-label">Qualification</label>
                                        <input type="text" name="AD_QULAIFICATION" id="AD_QULAIFICATION"
                                            placeholder="Qualification" class="formbold-form-input" />
                                        <p id="qualificationError" class="error"></p>

                                    </div>
                                    <div>
                                        <label for="AD_SALARY" class="formbold-form-label">Salary</label>
                                        <input type="text" name="AD_SALARY" id="AD_SALARY" placeholder="Salary"
                                            class="formbold-form-input" />
                                        <p id="salaryError" class="error"></p>
                                    </div>
                                    <div>
                                        <label for="position" class="formbold-form-label">Position</label>
                                        <input type="text" name="AD_POSITION" id="position" placeholder="Position"
                                            class="formbold-form-input" />
                                        <p id="positionError" class="error"></p>
                                    </div>
                                </div>
                                <div class="formbold-input-flex">
                                    <div>
                                        <label for="EM_EMAIL" class="formbold-form-label">Email</label>
                                        <input type="email" name="AD_EMAIL" id="EM_EMAIL"
                                            placeholder="example@email.com" class="formbold-form-input" />
                                        <p id="emailError" class="error"></p>
                                    </div>
                                    <div>
                                        <label for="EM_PASSWORD" class="formbold-form-label">Password</label>
                                        <input type="password" name="AD_PASSWORD" id="EM_PASSWORD"
                                            placeholder="Enter Password" class="formbold-form-input" />
                                        <p id=""></p>
                                    </div>
                                </div>
                                <div>
                                    <label class="formbold-form-label">Gender</label>
                                    <select class="formbold-form-input" name="AD_SEX" id="EM_SEX">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                                <div class="formbold-mb-3 formbold-input-wrapp">
                                    <label for="phone1" class="formbold-form-label">Phone 1</label>
                                    <div>
                                        <!-- <input type="text" name="areacode1" id="areacode1" placeholder="Area code"
                                            class="formbold-form-input formbold-w-45" /> -->
                                        <input type="text" name="AD_CELLPHONE1" id="ad_CELLPHONE1"
                                            placeholder="Phone number" class="formbold-form-input" />
                                    </div>
                                </div>
                                <div class="formbold-mb-3 formbold-input-wrapp">
                                    <label for="phone2" class="formbold-form-label">Phone 2</label>
                                    <div>
                                        <!-- <input type="text" name="areacode2" id="areacode2" placeholder="Area code"
                                            class="formbold-form-input formbold-w-45" /> -->
                                        <input type="text" name="AD_CELLPHONE2" id="EM_CELLPHONE2"
                                            placeholder="Phone number" class="formbold-form-input" />
                                    </div>
                                </div>
                                <div class="formbold-mb-3 formbold-input-wrapp">
                                    <label for="emergencyContact" class="formbold-form-label">Emergency Contact</label>
                                    <div>
                                        <!-- <input type="text" name="emergencyareacode" id="emergencyContact1"
                                            placeholder="Area code" class="formbold-form-input formbold-w-45" /> -->
                                        <input type="text" name="AD_EMERGENCY_CONTACT" id="emergencyContact"
                                            placeholder="Phone number" class="formbold-form-input" />
                                    </div>
                                </div>
                                <div class="formbold-mb-3">
                                    <label for="status" class="formbold-form-label">Status</label>
                                    <input type="text" name="AD_STATUS" id="status" placeholder="admin Status"
                                        class="formbold-form-input" />
                                </div>
                                <div class="formbold-mb-3">
                                    <label for="EM_DATEOFBIRTH" class="formbold-form-label">Age</label>
                                    <input type="date" name="AD_DATEOFBIRTH" id="EM_DATEOFBIRTH"
                                        placeholder="Employee Age" class="formbold-form-input" />
                                </div>
                                <div class="formbold-mb-3">
                                    <label for="address" class="formbold-form-label">Address</label>
                                    <input type="text" name="AD_HOUSENUMBER" id="EM_HOUSENUMBER"
                                        placeholder="house number" class="formbold-form-input formbold-mb-3" />

                                </div>
                                <div class="formbold-form-file-flex">
                                    <label for="uploadEmployeePic" class="formbold-form-label">Upload Picture</label>
                                    <input type="file" name="AD_PICTURE" id="uploadEmployeePic"
                                        class="formbold-form-file" />
                                </div>
                                <input class="formbold-btn" name='submit' type="submit">
                            </form>
                        </div>
                    </div> <!-- Include your footer or additional scripts here -->
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