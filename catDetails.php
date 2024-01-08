<?php
// Connect to database
include './config/config.php';

// Get category ID from URL
$cat_id = $_GET['cat_id'];
echo $cat_id;
// Fetch category and property data
$sql = "SELECT 
    category.CAT_NAME, category.CAT_TYPE, category.CAT_DESCRIPTION,
    property.PR_TYPE, property.PR_PIC, property.PR_DESCRIPTION,property.PR_ID
FROM category
LEFT JOIN property ON property.CAT_ID = category.CAT_ID
WHERE category.CAT_ID = $cat_id";
$result = mysqli_query($conn, $sql);

// Check for category data
if (mysqli_num_rows($result) > 0) {
    $categoryData = mysqli_fetch_assoc($result); // Fetch category data
?>

<?php require "header&footer/head_sub_page.php"; ?>

<section class="sale_section layout_padding">
    <div class="container-fluid">
        <div class="heading_container">
            <h2><?php echo $categoryData['CAT_NAME']; ?> For Sale</h2>
            <p><?php echo $categoryData['CAT_DESCRIPTION']; ?></p>
        </div>
        <div class="sale_container">
            <?php while ($propertyData = mysqli_fetch_assoc($result)) { ?>
                <div class="box m-1 p-3"  style="box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.15);">
                <a href="propertyDetails.php?pr_id=<?php echo $propertyData['PR_ID']; ?>" class="">

                <div class="img-box">
                    <img src="images/s-1.jpg" alt="">
                        <!-- <img src="images/<?php echo $propertyData['PR_PIC']; ?>" alt=""> -->
                    </div>
                    <div class="detail-box">
                        <h6><?php echo $propertyData['PR_TYPE']; ?></h6>
                        <p><?php echo $propertyData['PR_DESCRIPTION']; ?></p>
                        <a href="propertyDetails.php?pr_id=<?php echo $propertyData['PR_ID']; ?>" class="btn btn-primary">See more</a>
                    </div>
                    </a>
                </div>
            <?php } ?>
        </div>
        <div class="btn-box">
            <a href="">Find More</a>
        </div>
    </div>
    <?php require "header&footer/footer.php"; ?>
<?php
} else {
    echo "Category not found.";
}

// Close database connection
mysqli_close($conn);
?>


