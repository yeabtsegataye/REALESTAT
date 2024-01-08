<?php require "header&footer/header.php"; 
  // session_start();
?>
<?php
?>
  

<!-- header section strats -->
<header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container">
          <a href='index.php'>
          <h2><strong>Haylu</strong></h2>
          </a>
          <div class="navbar-collapse" id="">
            <ul class="navbar-nav justify-content-between ">
              <div class="User_option">
                <li class="" id="home_nav">
                  <?php if(isset($_SESSION['US_FNAME'])) :  ?>
                  <li class='dropdown'>
                    <a class=" dropdown-toggle" href="./user_Profile/profile.php" role='button' id='userDropdown' data-toggle='dropdown' aria-haspopup='true' area-expanded='false'>
                      <?php echo $_SESSION['US_FNAME']; ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="userDropdown">
                      <a class="dropdown-item" href="./user_Profile/profile.php">Profile</a>
                    </div> 
                    <!-- <ul class='dropdown arrow-top'>
                      <li><a href='#'>logout</li>
                    </ul> -->
                  </li>
                  <?php else : ?>
                    <a class="mr-4" href="login.php">
                      Login
                    </a>
                    <a class="mr-4" href="signup.php">
                      Sign up
                    </a>
                  <?php endif; ?>
                  </li>
                  
                </li>
              </div>
            </ul>
            

            <div class="custom_menu-btn">
              <button onclick="openNav()">
                <span class="s-1">

                </span>
                <span class="s-2">

                </span>
                <span class="s-3">

                </span>
              </button>
            </div>
            <div id="myNav" class="overlay">
              <div class="overlay-content">
                <a href="index.php">HOME</a>
                <a href="about.php">ABOUT</a>
                <a href="properties.php">PROPERTIES</a>
                <a href="buy.php">BUY</a>
                <a href="rent.php">RENT</a>
                <a href="price.php">PRICING</a>
                <a href="contact.php">CONTACT US</a>
                <a href="./admins/index.php">Admin</a>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->

    <!-- slider section -->
    <section class="slider_section ">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4 offset-md-1">
            <div class="detail-box">
              <h1>
                <span> Modern</span> <br>
                Real <br>
                Estate <br>
              </h1>
              <p>
              Welcome to Haylu Real Estate, where we transform spaces into sanctuaries and aspirations into addresses.
              </p>
              <div class="btn-box">
                <a href="about.php" class="">
                  Read More
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end slider section -->
  </div>

  <!-- find section -->
  <section class="find_section ">
    <div class="container">
      <form action="search.php" method='POST'>
        <div class=" form-row">
          <div class="col-md-5">
          <!-- <span class="icon icon-arrow_drop_down"></span> -->
                  <select name='types' class="form-control form-control-sm d-block rounded-0">
                    <option value="">Categories</option>
                    <option value="apartments">Apartments</option>
                    <option value="commercial buildings">Commercial Buildings</option>
                    <option value="villa">Villa</option>
                  </select>
            <!-- <input type="text" class="form-control" placeholder="Serach Your Categories "> -->
          </div>
          <div class="col-md-5">
            <!-- <input type="text" class="form-control" placeholder="Location "> -->
                  <select name='cities' class="form-control form-control-sm d-block rounded-0">
                    <option value="">City</option>
                    <option value="addis ababa">Addis Ababa</option>
                    <option value="bahirdar">Bahir Dar</option>
                    <option value="hawassa">Hawassa</option>
                  </select>
          </div>
          <div class="col-md-2">
            <button type="submit" name='submit' class="">
              search
            </button>
          </div>
        </div>
      </form>
    </div>
    <div class="row">
  
        </div>
  </section>

  <!-- end find section -->


<?php
  if(isset($_POST['submitt']))
?>
  <!-- about section -->

  <section class="about_section layout_padding-bottom">
    <div class="square-box">
      <img src="images/square.png" alt="">
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="img-box">
            <img src="images/about-img.jpg" alt="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                About Our Properties
              </h2>
            </div>
            <p>
            Welcome to Haylu Real Estate, where luxury and comfort unite. Our stylish spaces redefine modern living, offering a perfect blend of sophistication and convenience. Experience a lifestyle of elegance and practicality. Welcome home.
            </p>
            <a href="about.php">
              Read More
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end about section -->

  <!-- sale section -->

  <section class="sale_section layout_padding-bottom">
    <div class="container-fluid">
      <div class="heading_container">
        <h2>
        Categories
        </h2>
        <p>
          We have many properties in different categories, Choose based on your interest!!
        </p>
      </div>
      <div class="sale_container">
      <?php
// Connect to your database
include './config/config.php';


// Fetch data from the category table
$sql = "SELECT CAT_ID, CAT_NAME, CAT_TYPE, CAT_DESCRIPTION FROM category";
$result = mysqli_query($conn, $sql);

// Display the fetched data within the HTML structure
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
?>
        <div class="box m-1 p-3"  style="box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.15);">
            <a href="catDetails.php?cat_id=<?php echo $row['CAT_ID']; ?>" class="">
                <div class="img-box">
                    <img src="images/s-1.jpg" alt=""> </div>
                <div class="detail-box">
                    <h6><?php echo $row['CAT_NAME']; ?></h6>
                    <p><?php echo $row['CAT_DESCRIPTION']; ?></p> 
                    <a href="catDetails.php?cat_id=<?php echo $row['CAT_ID']; ?>" class="btn btn-primary">See more</a>

                </div>
            </a>
        </div>
<?php
    }
} else {
    echo "No categories found.";
}

// Close the database connection
mysqli_close($conn);
?>

        
        </div>
      </div>
      <div class="btn-box">
        <a href="properties.php">
          Find More
        </a>
      </div>
    </div>
  </section>

  <!-- end sale section -->

  <!-- price section -->

  <section class="price_section layout_padding-bottom">
    <div class="container">
      <div class="heading_container">
        <h2>
          Our Pricing
        </h2>
        <p>
          There are many variations of passages of Lorem Ipsum available, but the
        </p>
      </div>
      <div class="price_container">
        <div class="box">
          <div class="detail-box">
            <div class="heading-box">
              <h4>
                01
              </h4>
              <h6>
                Basic
              </h6>
            </div>
            <div class="text-box">
              <h2>
                $1000.00
              </h2>
              <ul>
                <li>
                  variations of
                </li>
                <li>
                  passages of Lorem
                </li>
                <li>
                  Ipsum available,
                </li>
                <li>
                  but the majority
                </li>
                <li>
                  have suffered
                </li>
                <li>
                  alteration in
                </li>
              </ul>
            </div>
          </div>
          <div class="btn-box">
            <a href="">
              Buy Now
            </a>
          </div>
        </div>
        <div class="box">
          <div class="detail-box">
            <div class="heading-box">
              <h4>
                02
              </h4>
              <h6>
                Standard
              </h6>
            </div>
            <div class="text-box">
              <h2>
                $2000.00
              </h2>
              <ul>
                <li>
                  variations of
                </li>
                <li>
                  passages of Lorem
                </li>
                <li>
                  Ipsum available,
                </li>
                <li>
                  but the majority
                </li>
                <li>
                  have suffered
                </li>
                <li>
                  alteration in
                </li>
              </ul>
            </div>
          </div>
          <div class="btn-box">
            <a href="">
              Buy Now
            </a>
          </div>
        </div>
        <div class="box">
          <div class="detail-box">
            <div class="heading-box">
              <h4>
                03
              </h4>
              <h6>
                Premium
              </h6>
            </div>
            <div class="text-box">
              <h2>
                $3000.00
              </h2>
              <ul>
                <li>
                  variations of
                </li>
                <li>
                  passages of Lorem
                </li>
                <li>
                  Ipsum available,
                </li>
                <li>
                  but the majority
                </li>
                <li>
                  have suffered
                </li>
                <li>
                  alteration in
                </li>
              </ul>
            </div>
          </div>
          <div class="btn-box">
            <a href="">
              Buy Now
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end price section -->

  <!-- deal section -->

  <section class="deal_section layout_padding-bottom">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                Very Good Deal For House
              </h2>
            </div>
            <p>
            Seize the opportunity of a lifetime! Your dream home awaits with an unbeatable offer. A home so perfect, it's not just a house; it's a steal of a deal waiting for you to call it home. Don't miss out on the chance to make memories in your new haven. It's not just a good deal; it's the key to a brighter future.  
            </p>
            <a href="">
              Get A Quote
            </a>
          </div>
        </div>
        <div class="col-md-6">
          <div class="img-box">
            <div class="box b1">
              <img src="images/d-1.jpg" alt="">
            </div>
            <div class="box b1">
              <img src="images/d-2.jpg" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end deal section -->


  <!-- us section -->
  <section class="us_section layout_padding2">

    <div class="container">
      <div class="heading_container">
        <h2>
          Why Choose Us
        </h2>
      </div>
      <div class="row">
        <div class="col-md-3 col-sm-6">
          <div class="box">
            <div class="img-box">
              <img src="images/u-1.png" alt="">
            </div>
            <div class="detail-box">
              <h3 class="price">
                1000+
              </h3>
              <h5>
                Years of House
              </h5>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="box">
            <div class="img-box">
              <img src="images/u-2.png" alt="">
            </div>
            <div class="detail-box">
              <h3>
                20000+
              </h3>
              <h5>
                Projects Delivered
              </h5>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="box">
            <div class="img-box">
              <img src="images/u-3.png" alt="">
            </div>
            <div class="detail-box">
              <h3>
                10000+
              </h3>
              <h5>
                Satisfied Customers
              </h5>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="box">
            <div class="img-box">
              <img src="images/u-4.png" alt="">
            </div>
            <div class="detail-box">
              <h3>
                1500+
              </h3>
              <h5>
                Cheap Rates
              </h5>
            </div>
          </div>
        </div>
      </div>
      <div class="btn-box">
        <a href="">
          Get A Quote
        </a>
      </div>
    </div>
  </section>

  <!-- end us section -->

  <!-- client secction -->

  <section class="client_section layout_padding">
    <div class="container-fluid">
      <div class="heading_container">
        <h2>
          What is Says Our Customer
        </h2>
      </div>
      <div class="client_container">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="box">
                <div class="img-box">
                  <img src="images/client.jpg" alt="">
                </div>
                <div class="detail-box">
                  <h5>
                    <span>Majority</span>
                    <hr>
                  </h5>
                  <p>
                    There are many variations of passages of Lorem Ipsum available, but the majority have suffered
                    alteration
                    in some form, by injected humour, or randomised words which don't look even slightly believable.
                  </p>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="box">
                <div class="img-box">
                  <img src="images/client.jpg" alt="">
                </div>
                <div class="detail-box">
                  <h5>
                    <span>Majority</span>
                    <hr>
                  </h5>
                  <p>
                    There are many variations of passages of Lorem Ipsum available, but the majority have suffered
                    alteration
                    in some form, by injected humour, or randomised words which don't look even slightly believable.
                  </p>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="box">
                <div class="img-box">
                  <img src="images/client.jpg" alt="">
                </div>
                <div class="detail-box">
                  <h5>
                    <span>Majority</span>
                    <hr>
                  </h5>
                  <p>
                    There are many variations of passages of Lorem Ipsum available, but the majority have suffered
                    alteration
                    in some form, by injected humour, or randomised words which don't look even slightly believable.
                  </p>
                </div>
              </div>
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="sr-only">Next</span>
          </a>
        </div>

      </div>
    </div>
  </section>

  <!-- end client section -->

  <!-- contact section -->

  <section class="contact_section ">
    <div class="container">
      <div class="heading_container">
        <h2>
          Get In Touch
        </h2>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
      <div class="col-md-6 px-0">
          <div class="map_container">
            <div class="map-responsive">
              <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAoSJEs6ztIcy4DhKa3AXvpreEdH3pC3Eg&q=Ethiopian+AddisAbaba+BOLE" width="600" height="300" frameborder="0" style="border:0; width: 100%; height:100%" allowfullscreen></iframe>
              <!-- <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&q=Eiffel+Tower+Paris+France" width="600" height="300" frameborder="0" style="border:0; width: 100%; height:100%" allowfullscreen></iframe> -->
                <!-- <iframe
                  width="600"
                  height="600"
                  frameborder="0" style="border:0"
                  src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAoSJEs6ztIcy4DhKa3AXvpreEdH3pC3Eg&q=Ethiopian+AddisAbaba" allowfullscreen>
                </iframe> -->
              </div>
            

          </div>
        </div>
        <div class="col-lg-6 col-md-5 ">
          <div class="form_container">
            <form action="">
              <div>
                <input type="text" placeholder="Name" />
              </div>
              <div>
                <input type="email" placeholder="Email" />
              </div>
              <div>
                <input type="text" placeholder="Phone Number" />
              </div>
              <div>
                <input type="text" class="message-box" placeholder="Message" />
              </div>
              <div class="d-flex ">
                <button class='btn btn-block'>
                  Send
                </button>
              </div>
            </form>
          </div>
        </div>

      </div>
    </div>
<?php require "header&footer/footer.php"; ?>