<?php require "header&footer/head_sub_page.php"; 
      require "./config/config.php";
?> 

<?php

// Fetch all properties
$select = mysqli_query($conn, "SELECT * FROM PROPERTY");
// mysqli_stmt_execute($select);
// $result = mysqli_stmt_get_result($select);
$property = mysqli_fetch_all($select, MYSQLI_ASSOC);

if (isset($_POST['submit'])) {
    // Sanitize input to prevent SQL injection
    $types = mysqli_real_escape_string($conn, $_POST['types']);
    $cities = mysqli_real_escape_string($conn, $_POST['cities']);

    // Search properties
    $search = mysqli_query($conn, "SELECT * FROM PROPERTY WHERE PR_TYPE LIKE '%$types%' OR PR_LOCATION LIKE '%$cities%'");
    $listings = mysqli_fetch_all($search, MYSQLI_ASSOC);
}else{
    header("location: index.php");
}

// Close connection
mysqli_close($conn);
?>

<style>
    .property-entry:hover {
        transform: scale(1.05);
    }

    .property-entry {
    position: relative;
}

.property-thumbnail {
    position: relative;
}

.offer-type-wrap,
.property-favorite {
    position: absolute;
    top: 0;
    left: 0;
    z-index: 1;
}

.property-favorite {
    top: 10px;
    left: 10px;
}
</style>

  <!-- sale section -->

  <section class="sale_section layout_padding">
    <div class="container-fluid">
      <div class="sale_container">
      <div class="row mb-5">
      <?php if (count($listings) > 0) : ?>
            <?php foreach($listings as $listing) : ?>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="property-entry h-100">
                <a href="property-details.html" class="property-thumbnail">
                    <div class="offer-type-wrap">
                    <span class="offer-type bg-success"><?php echo $listing['PR_TYPE']; ?></span>
                    </div>
                    <img src="images/<?php echo $listing['PR_PIC']; ?>" alt="Image" class="img-fluid">
                </a>
                <div class="p-4 property-body">
                    <a href="#" class="property-favorite"><span class="icon-heart-o"></span></a>
                    <h2 class="property-title"><a href="propertyDetails.php"><?php echo $listing['PR_NAME']; ?></a></h2>
                    <span class="property-location d-block mb-3"><span class="property-icon icon-room"></span> <?php echo $listing['PR_LOCATION']; ?></span>
                    <strong class="property-price text-primary mb-3 d-block" style="font-size: 20px;"><?php echo '$' . $listing['PR_PRICE']; ?></strong>
                    <ul class="property-specs-wrap mb-3 mb-lg-0" style="list-style: none; padding: 0; margin: 0">
                    <li class='display-inline' style="display: inline-block; margin-right: 10px;">
                        <span class="property-specs">Beds</span>
                        <span class="property-specs-number">2 <sup>+</sup></span>
                        
                    </li>
                    <li style="display: inline-block; margin-right: 10px;">
                        <span class="property-specs">Baths</span>
                        <span class="property-specs-number">2</span>
                        
                    </li>
                    <li style="display: inline-block; margin-right: 10px;">
                        <span class="property-specs">SQ FT</span>
                        <span class="property-specs-number"><?php echo $listing['PR_SQFT']; ?></span>
                        
                    </li>
                    </ul>

                </div>
                </div>
            </div>

            </div>
            <?php endforeach; ?>
        <?php else: ?>
                    <div class="bg-sucess text-white"> Sorry, No records!</div>
        <?php endif; ?>
        </div> 
       </div>     
   </div>
<?php require "header&footer/footer.php"; ?>
