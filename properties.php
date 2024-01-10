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
