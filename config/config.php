<?php
try {
    // host
    define('HOSTNAME', 'localhost');

    // DBNAME
    define('DBNAME', 'haylu');

    // user
    define('USER', 'root');

    // pass
    define('PASS', '');
    $conn = mysqli_connect(HOSTNAME, USER, PASS, DBNAME);
    
    // Check if the connection is successful
    // if ($conn) {
    //     echo 'Database connected successfully';
    // } else {
    //     echo 'Database connection failed: ' . mysqli_connect_error();
    // }
} catch (Exception $e) {
    echo "Exception: " . $e->getMessage();
}
?>