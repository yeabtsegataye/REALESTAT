<?php

  session_start();
  session_unset();
  session_destroy();

  header('Location: http://localhost/RealEstate/index.php')
?>