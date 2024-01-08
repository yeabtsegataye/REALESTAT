<?php require "header&footer/head_sub_page.php"; ?>
<?php
// Connect to database
include './config/config.php';

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
    $propertyData = mysqli_fetch_assoc($result);
?>
  
    <div class="site-section site-section-sm mt-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div>
              <div class="slide-one-item home-slider owl-carousel">
            
                <div>
                  <img
                    src="images/3.jpg"
                    alt="Image"
                    class="img-fluid"
                  />
                </div>
              </div>
            </div>
            <div
              class="bg-white border-bottom border-left border-right pt-4"
            >
              <div class="row mb-5 mt-2">
                <div class="col-md-6">
                  <strong class="text-success h1 mb-3 p-3 "><?php echo number_format($propertyData['PR_PRICE']); ?> ETB</strong>
                </div>
                <div class="col-md-6">
                  <ul class="list-unstyled property-specs-wrap mb-3 mb-lg-0 float-lg-right">
                    <li class="list-inline-item d-line-block mr-3">
                      <span class="property-specs beds">Beds</span><br>
                      <span class="property-specs-number number"><strong><?php echo $propertyData['RN_BEDROOM']; ?></strong></span>
                    </li>
                    <li class="list-inline-item d-line-block mr-3">
                      <span class="property-specs beds">kitchen</span><br>
                      <span class="property-specs-number number"><strong><?php echo $propertyData['RN_KITCHEN']; ?></strong></span>
                    </li>
                    <li class="list-inline-item d-line-block mr-3">
                      <span class="property-specs baths">Baths</span><br>
                      <span class="property-specs-number number"><strong><?php echo $propertyData['RN_BATHROOM']; ?></strong></span>
                    </li>
                    <li class="list-inline-item d-line-block mr-3">
                      <span class="property-specs sqft">SQ FT</span><br>
                      <span class="property-specs-number number"><strong><?php echo $propertyData['PR_SQFT']; ?></strong></span>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="row mb-5">
                <div
                  class="col-md-6 col-lg-4 text-center border-bottom border-top py-3"
                >
                  <span class="d-inline-block text-black mb-0 caption-text"
                    >Home Type</span
                  >
                  <strong class="d-block"><?php echo$propertyData['PR_TYPE']; ?></strong>
                </div>
                <div
                  class="col-md-6 col-lg-4 text-center border-bottom border-top py-3"
                >
                  <span class="d-inline-block text-black mb-0 caption-text"
                    >Year Built</span
                  >
                  <strong class="d-block"><?php echo$propertyData['PR_YEAROFBUILD']; ?></strong>
                </div>
                <div
                  class="col-md-6 col-lg-4 text-center border-bottom border-top py-3"
                >
                  <span class="d-inline-block text-black mb-0 caption-text"
                    >sqr meter</span
                  >
                  <strong class="d-block"><?php echo$propertyData['PR_SQFT']; ?></strong>
                </div>
                <div
                  class="col-md-6 col-lg-4 text-center border-bottom border-top py-3"
                >
                  <span class="d-inline-block text-black mb-0 caption-text"
                    >Status</span
                  >
                  <strong class="d-block"><?php echo$propertyData['PR_STATUS']; ?></strong>
                </div>
                <div
                  class="col-md-6 col-lg-4 text-center border-bottom border-top py-3"
                >
                  <span class="d-inline-block text-black mb-0 caption-text"
                    >location</span
                  >
                  <strong class="d-block"><?php echo$propertyData['PR_LOCATION']; ?></strong>
                </div>
                <div
                  class="col-md-6 col-lg-4 text-center border-bottom border-top py-3"
                >
                  <span class="d-inline-block text-black mb-0 caption-text"
                    >city</span
                  >
                  <strong class="d-block"><?php echo$propertyData['PR_CITY']; ?></strong>
                </div>
               
              
              </div>
              <h2 class="h4 text-black px-3">More Info</h2>
              <p class="px-3">
              <?php echo$propertyData['PR_DESCRIPTION']; ?>
              </p>
              <p class="px-3">
              <?php echo $propertyData['PR_FEATURES']; ?>
              </p>

<!-- Gallery -->

              <div class="row no-gutters mt-5 ">
                
                <div class="col-sm-6 col-md-4 col-lg-3 p-1">
                  <a href="images/3.jpg" class="image-popup gal-item"
                    ><img src="images/3.jpg" alt="Image" class="img-fluid"
                  /></a>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 p-1">
                  <a href="images/3.jpg" class="image-popup gal-item"
                    ><img src="images/3.jpg" alt="Image" class="img-fluid"
                  /></a>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 p-1">
                  <a href="images/3.jpg" class="image-popup gal-item"
                    ><img src="images/3.jpg" alt="Image" class="img-fluid"
                  /></a>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 p-1">
                  <a href="images/3.jpg" class="image-popup gal-item"
                    ><img src="images/3.jpg" alt="Image" class="img-fluid"
                  /></a>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 p-1">
                  <a href="images/3.jpg" class="image-popup gal-item"
                    ><img src="images/3.jpg" alt="Image" class="img-fluid"
                  /></a>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 p-1">
                  <a href="images/3.jpg" class="image-popup gal-item"
                    ><img src="images/3.jpg" alt="Image" class="img-fluid"
                  /></a>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 p-1">
                  <a href="images/3.jpg" class="image-popup gal-item"
                    ><img src="images/3.jpg" alt="Image" class="img-fluid"
                  /></a>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 p-1">
                  <a href="images/3.jpg" class="image-popup gal-item"
                    ><img src="images/3.jpg" alt="Image" class="img-fluid"
                  /></a>
                </div>
              </div> 
            </div>
          </div>
          <div class="col-lg-4">
            <div class="bg-white widget border rounded p-3">
              <h3 class="h4 text-black widget-title mb-3">Contact Admin</h3>
              <form action="" class="form-contact-agent">
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" id="name" class="form-control" />
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" id="email" class="form-control" />
                </div>
                <div class="form-group">
                  <label for="phone">Phone</label>
                  <input type="text" id="phone" class="form-control" />
                </div>
                <div class="form-group">
                  <input
                    type="submit"
                    id="phone"
                    class="btn btn-primary"
                    value="Send Message"
                  />
                </div>
              </form>
            </div>

            <div class="bg-white widget border rounded mt-3 p-3">
              <h3 class="h4 text-black widget-title mb-3 ml-0">Share</h3>
              <div class="px-3" style="margin-left: -15px">
                <a
                  href="https://www.facebook.com/"
                  class="pt-3 pb-3 pr-3 pl-0"
                  ><span class="icon-facebook"></span
                ></a>
                <a
                  href="https://twitter.com/"
                  class="pt-3 pb-3 pr-3 pl-0"
                  ><span ></span
                ></a>
                <a
                  href="https://www.linkedin.com/"
                  class="pt-3 pb-3 pr-3 pl-0"
                  ><span class="icon-linkedin"></span
                ></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php
} else {
    echo "Property not found.";
}

mysqli_close($conn);
?>
<?php require "header&footer/footer.php"; ?>
