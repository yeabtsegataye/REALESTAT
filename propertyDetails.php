<?php require "header&footer/head_sub_page.php"; ?>
<?php
include './config/config.php';
?>
<?php
// Get property ID from URL or set a default
$pr_id = isset($_GET['pr_id']) ? $_GET['pr_id'] : 1; // Replace 1 with a default ID if needed

// Fetch property data and join rooms
$sql = "SELECT 
            property.PR_ID, property.PR_PRICE, property.PR_PIC, property.PR_YEAROFBUILD, property.PR_DESCRIPTION, property.PR_FEATURES, property.PR_SQFT, property.PR_TYPE, property.PR_STATUS, property.PR_LOCATION, property.PR_CITY,
            room_num.RN_BEDROOM, room_num.RN_KITCHEN, room_num.RN_BATHROOM
        FROM property
        LEFT JOIN room_num ON property.PR_ID = room_num.PR_ID
        WHERE property.PR_ID = $pr_id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  mysqli_data_seek($result, 0);

  $propertyData = mysqli_fetch_assoc($result);

  ?>

  <div class="site-section site-section-sm mt-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div>
            <div class="slide-one-item home-slider owl-carousel">

              <div>
                <img src="images/3.jpg" alt="Image" class="img-fluid" />
              </div>
            </div>
          </div>
          <div class="bg-white border-bottom border-left border-right pt-4">
            <div class="row mb-5 mt-2">
              <div class="col-md-6">
                <strong class="text-success h1 mb-3 p-3 ">
                  <?php echo number_format($propertyData['PR_PRICE']); ?> ETB
                </strong>
              </div>
              <div class="col-md-6">
                <ul class="list-unstyled property-specs-wrap mb-3 mb-lg-0 float-lg-right">
                  <li class="list-inline-item d-line-block mr-3">
                    <span class="property-specs beds">Beds</span><br>
                    <span class="property-specs-number number"><strong>
                        <?php echo $propertyData['RN_BEDROOM']; ?>
                      </strong></span>
                  </li>
                  <li class="list-inline-item d-line-block mr-3">
                    <span class="property-specs beds">kitchen</span><br>
                    <span class="property-specs-number number"><strong>
                        <?php echo $propertyData['RN_KITCHEN']; ?>
                      </strong></span>
                  </li>
                  <li class="list-inline-item d-line-block mr-3">
                    <span class="property-specs baths">Baths</span><br>
                    <span class="property-specs-number number"><strong>
                        <?php echo $propertyData['RN_BATHROOM']; ?>
                      </strong></span>
                  </li>
                  <li class="list-inline-item d-line-block mr-3">
                    <span class="property-specs sqft">SQ FT</span><br>
                    <span class="property-specs-number number"><strong>
                        <?php echo $propertyData['PR_SQFT']; ?>
                      </strong></span>
                  </li>
                </ul>
              </div>
            </div>
            <div class="row mb-5">
              <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
                <span class="d-inline-block text-black mb-0 caption-text">Home Type</span>
                <strong class="d-block">
                  <?php echo $propertyData['PR_TYPE']; ?>
                </strong>
              </div>
              <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
                <span class="d-inline-block text-black mb-0 caption-text">Year Built</span>
                <strong class="d-block">
                  <?php echo $propertyData['PR_YEAROFBUILD']; ?>
                </strong>
              </div>
              <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
                <span class="d-inline-block text-black mb-0 caption-text">sqr meter</span>
                <strong class="d-block">
                  <?php echo $propertyData['PR_SQFT']; ?>
                </strong>
              </div>
              <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
                <span class="d-inline-block text-black mb-0 caption-text">Status</span>
                <strong class="d-block">
                  <?php echo $propertyData['PR_STATUS']; ?>
                </strong>
              </div>
              <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
                <span class="d-inline-block text-black mb-0 caption-text">location</span>
                <strong class="d-block">
                  <?php echo $propertyData['PR_LOCATION']; ?>
                </strong>
              </div>
              <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
                <span class="d-inline-block text-black mb-0 caption-text">city</span>
                <strong class="d-block">
                  <?php echo $propertyData['PR_CITY']; ?>
                </strong>
              </div>
            </div>
            <h2 class="h4 text-black px-3">More Info</h2>
            <p class="px-3">
              <?php echo $propertyData['PR_DESCRIPTION']; ?>
            </p>
            <p class="px-3">
              <?php echo $propertyData['PR_FEATURES']; ?>
            </p>
            <?php
} else {
  echo "Property not found.";
}
// mysqli_close($conn);
?>
          <!-- Gallery -->
          <div class="row no-gutters mt-5 ">

            <div class="col-sm-6 col-md-4 col-lg-3 p-1">
              <a href="images/3.jpg" class="image-popup gal-item"><img src="images/3.jpg" alt="Image"
                  class="img-fluid" /></a>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 p-1">
              <a href="images/3.jpg" class="image-popup gal-item"><img src="images/3.jpg" alt="Image"
                  class="img-fluid" /></a>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 p-1">
              <a href="images/3.jpg" class="image-popup gal-item"><img src="images/3.jpg" alt="Image"
                  class="img-fluid" /></a>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 p-1">
              <a href="images/3.jpg" class="image-popup gal-item"><img src="images/3.jpg" alt="Image"
                  class="img-fluid" /></a>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 p-1">
              <a href="images/3.jpg" class="image-popup gal-item"><img src="images/3.jpg" alt="Image"
                  class="img-fluid" /></a>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 p-1">
              <a href="images/3.jpg" class="image-popup gal-item"><img src="images/3.jpg" alt="Image"
                  class="img-fluid" /></a>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 p-1">
              <a href="images/3.jpg" class="image-popup gal-item"><img src="images/3.jpg" alt="Image"
                  class="img-fluid" /></a>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 p-1">
              <a href="images/3.jpg" class="image-popup gal-item"><img src="images/3.jpg" alt="Image"
                  class="img-fluid" /></a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="bg-white widget border rounded p-3">
          <h3 class="h4 text-black widget-title mb-3"> Appointment </h3>
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="form-contact-agent">
            <div class="form-group">
              <label for="AP_PUROPSE">PUROPSE</label>
              <input type="text" id="naAP_PUROPSEme" name="AP_PUROPSE" class="form-control" />
            </div>
            <div class="form-group">
              <label for="AP_TIME">TIME</label>
              <input type="time" id="AP_TIME" name="AP_TIME" class="form-control" />
            </div>
            <div class="form-group">
              <label for="AP_DATE">DATE</label>
              <input type="date" id="AP_DATE" name="AP_DATE" class="form-control" />
            </div>
            <div class="form-group">
              <label for="AP_SUGESSTION">SUGESSTION</label>
              <textarea type="text" name="AP_SUGESSTION" id="AP_SUGESSTION" class="form-control"></textarea>
            </div>
            <div class="form-group">
              <input type="submit" id="phone" class="btn btn-primary" value="send Appointment" />
            </div>

          </form>
          <?php
          // Assuming you have a session started on every page
          session_start();

          // Check if the form is submitted
          if ($_SERVER["REQUEST_METHOD"] == "POST") {

            // Check if the user is logged in
            if (isset($_SESSION['user_id'])) {
              // User is logged in, retrieve user ID
              $user_id = $_SESSION['user_id'];

              // Sanitize and retrieve form data
              $purpose = mysqli_real_escape_string($conn, $_POST['AP_PUROPSE']);
              $time = mysqli_real_escape_string($conn, $_POST['AP_TIME']);
              $date = mysqli_real_escape_string($conn, $_POST['AP_DATE']);
              $suggestion = mysqli_real_escape_string($conn, $_POST['AP_SUGESSTION']);

              // Use prepared statements to prevent SQL injection
              $stmt = $conn->prepare("INSERT INTO appointment(AP_PUROPSE, AP_TIME, AP_DATE, AP_SUGESSTION, AP_APPROVED, US_ID) VALUES (?, ?, ?, ?, 0, ?)");
              $stmt->bind_param("ssssi", $purpose, $time, $date, $suggestion, $user_id);

              if ($stmt->execute()) {
                echo "Appointment added successfully!";
              } else {
                echo "Error: " . $stmt->error;
              }

              // Close the prepared statement and database connection
              $stmt->close();
              mysqli_close($conn);

            } else {
              // User is not logged in, redirect to login page
              header("Location: login.php");
              exit();
            }
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require "header&footer/footer.php"; ?>