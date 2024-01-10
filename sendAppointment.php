<?php
require "config/config.php";
session_start();
// Check if the user is logged in
if (isset($_POST['submit'])) {
    if (empty($_POST['AP_PUROPSE']) || empty($_POST['AP_TIME']) || empty($_POST['AP_DATE']) || empty($_POST['AP_SUGESSTION'])) {
        echo "<script>alert('Some inputs are empty');</script>";
    } else {
    // Sanitize and retrieve form data
    $us_id = $_SESSION['US_ID'];
    $purpose = mysqli_real_escape_string($conn, $_POST['AP_PUROPSE']);
    $time = mysqli_real_escape_string($conn, $_POST['AP_TIME']);
    $date = mysqli_real_escape_string($conn, $_POST['AP_DATE']);
    $suggestion = mysqli_real_escape_string($conn, $_POST['AP_SUGESSTION']);

    // Use prepared statements to prevent SQL injection
    $stmt = mysqli_prepare($conn, "INSERT INTO appointment(AP_PUROPSE, AP_TIME, AP_DATE, AP_SUGESSTION, US_ID) VALUES (?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "ssssi", $purpose, $time, $date, $suggestion, $us_id);

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Appointment request sent successfully!');</script>";
        // echo "<script>window.location.href=http://localhost/RealEstate/propertyDetails.php";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Close the prepared statement
    mysqli_stmt_close($stmt);

    // Close the database connection
    mysqli_close($conn);
    }
}
?>
