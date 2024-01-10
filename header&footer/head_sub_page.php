<?php
 session_start();
//  var_dump($_SESSION['firstName']);
?>
<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Haylu</title>


  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700|Raleway:400,700&display=swap" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
</head>

<body class="sub_page">
<div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container">
        <a href='../index.php'>
          <h2><strong?>Haylu</strong></h2>
        </a>          
          </a>
          <div class="navbar-collapse" id="">
            <ul class="navbar-nav justify-content-between ">
              <div class="User_option">
              <li class="" id="home_nav">
                  <?php if(isset($_SESSION['US_FNAME'])) :  ?>
                  <li class='dropdown'>
                    <a class="" href="./user_Profile/profile.php" role='button' id='userDropdown' data-toggle='dropdown' aria-haspopup='true' area-expanded='false'>
                      <?php echo $_SESSION['US_FNAME']; ?>
                    </a>
                    <!-- <div class="dropdown-menu" aria-labelledby="userDropdown">
                      <a class="dropdown-item" href="./user_Profile/profile.php">Profile</a>
                    </div> -->
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
                <!-- <li class="">
                  <a class="mr-4" href="./admins/login.php">
                    Login
                  </a>
                  <a class="" href="./admins/register.php">
                    Sign up
                  </a>
                </li>
              </div>
            </ul> -->

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
  </div>