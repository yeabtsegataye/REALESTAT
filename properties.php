<?php require "header&footer/head_sub_page.php"; 
      require "./config/config.php";
?>
<?php

    $result = mysqli_query($conn, "SELECT * FROM PROPERTY");

    $PROPERTY = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $PROPERTY[] = (object) $row;
    }

    // mysqli_free_result($result);
    // mysqli_close($conn);
?>

  

  <!-- sale section -->

  <section class="sale_section layout_padding">
    <div class="container-fluid">
      <div class="heading_container">
        <h2>
          Our Properties
        </h2>
        <p>
          We have many variations of Properties with different Type and Price for you!
        </p>
      </div>
      <div class="sale_container">
        <div class="box">
          <a href=''>  
            <div class="img-box">
              <img src="images/s-1.jpg" alt="">
            </div>
            <div class="detail-box">
              <h6>
                apertments house
              </h6>
              <p>
                There are many variations of passages of Lorem Ipsum available, but
              </p>
            </div>
          </a>
        </div>
        <div class="box">
          <a href=''>
              <div class="img-box">
                <img src="images/s-2.jpg" alt="">
              </div>
              <div class="detail-box">
                <h6>
                  apertments house
                </h6>
                <p>
                  There are many variations of passages of Lorem Ipsum available, but
                </p>
              </div>
              <div class="row mb-5">
                <div
                  class="col-md-6 col-lg-4 text-center border-bottom border-top py-3"
                >
                  <span class="d-inline-block text-black mb-0 caption-text"
                    >Home Type</span
                  >
                  <strong class="d-block">Villa</strong>
                </div>
                <div
                  class="col-md-6 col-lg-4 text-center border-bottom border-top py-3"
                >
                  <span class="d-inline-block text-black mb-0 caption-text"
                    >Year Built</span
                  >
                  <strong class="d-block">2023</strong>
                </div>
                <div
                  class="col-md-6 col-lg-4 text-center border-bottom border-top py-3"
                >
                  <span class="d-inline-block text-black mb-0 caption-text"
                    >Price/Sqft</span
                  >
                  <strong class="d-block">90,000ETB</strong>
                </div>
              </div>
            </a>
        </div>
        <div class="box">
          <a href=''>
              <div class="img-box">
                <img src="images/s-3.jpg" alt="">
              </div>
              <div class="detail-box">
                <h6>
                  apertments house
                </h6>
                <p>
                  There are many variations of passages of Lorem Ipsum available, but
                </p>
              </div>
              <div class="row mb-5">
                <div
                  class="col-md-6 col-lg-4 text-center border-bottom border-top py-3"
                >
                  <span class="d-inline-block text-black mb-0 caption-text"
                    >Home Type</span
                  >
                  <strong class="d-block">Villa</strong>
                </div>
                <div
                  class="col-md-6 col-lg-4 text-center border-bottom border-top py-3"
                >
                  <span class="d-inline-block text-black mb-0 caption-text"
                    >Year Built</span
                  >
                  <strong class="d-block">2023</strong>
                </div>
                <div
                  class="col-md-6 col-lg-4 text-center border-bottom border-top py-3"
                >
                  <span class="d-inline-block text-black mb-0 caption-text"
                    >Price/Sqft</span
                  >
                  <strong class="d-block">90,000ETB</strong>
                </div>
              </div>
</a>
        </div>
        <div class="box">
          <a href=''>
              <div class="img-box">
                <img src="images/s-4.jpg" alt="">
              </div>
              <div class="detail-box">
                <h6>
                  apertments house
                </h6>
                <p>
                  There are many variations of passages of Lorem Ipsum available, but
                </p>
              </div>
              <div class="row mb-5">
                <div
                  class="col-md-6 col-lg-4 text-center border-bottom border-top py-3"
                >
                  <span class="d-inline-block text-black mb-0 caption-text"
                    >Home Type</span
                  >
                  <strong class="d-block">Villa</strong>
                </div>
                <div
                  class="col-md-6 col-lg-4 text-center border-bottom border-top py-3"
                >
                  <span class="d-inline-block text-black mb-0 caption-text"
                    >Year Built</span
                  >
                  <strong class="d-block">2023</strong>
                </div>
                <div
                  class="col-md-6 col-lg-4 text-center border-bottom border-top py-3"
                >
                  <span class="d-inline-block text-black mb-0 caption-text"
                    >Price/Sqft</span
                  >
                  <strong class="d-block">90,000ETB</strong>
                </div>
              </div>
</a>
        </div>
        <div class="box">
          <div class="img-box">
            <img src="images/s-5.jpg" alt="">
          </div>
          <div class="detail-box">
            <h6>
              apertments house
            </h6>
            <p>
              There are many variations of passages of Lorem Ipsum available, but
            </p>
          </div>
        </div>
        <div class="box">
          <div class="img-box">
            <img src="images/s-6.jpg" alt="">
          </div>
          <div class="detail-box">
            <h6>
              apertments house
            </h6>
            <p>
              There are many variations of passages of Lorem Ipsum available, but
            </p>
          </div>
        </div>
      </div>
      <!-- <div class="btn-box">
        <a href="">
          Find More
        </a>
      </div> -->
    </div>
    <?php require "header&footer/footer.php"; ?>
