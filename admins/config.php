<?php
require_once "google-api/vendor/autoload.php";
$gClient = new Google_Client();
$gClient->setClientId("389210830237-os4fkh2rola7k27fe1rrosu38a4avset.apps.googleusercontent.com");
$gClient->setClientSecret("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");
$gClient->setApplicationName("HayluRealEstate");
$gClient->setRedirectUri("http://localhost/RealEstate/index.php");
$gClient->addScope("profile email");

// login URL
$signup = $gClient->createAuthUrl();

header('Location: ' . filter_var($signup, FILTER_SANITIZE_URL));
?>