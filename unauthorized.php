<?php

$page_title = "Dashboard";
$return_url = $_SERVER['REQUEST_URI'];

ob_start();

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if session token is empty
if (empty($_SESSION['user']['token'])) {
  // Redirect to login page
  header("Location: ./account/login.php?return_url=" . urlencode($return_url));
  exit();
}


?>

<div class="pagetitle">
  <h1>Unauthorized</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="./../">Home</a></li>
      <li class="breadcrumb-item active">Unauthorized</li>
    </ol>
  </nav>
</div>

<div class="container">

      <section class="section error-404 min-vh-100 d-flex flex-column align-items-center justify-content-center">
        <h1 class="text-danger">401</h1>
        <h2 class="">Unauthorized to access this page.</h2>
        <a class="btn" href="blank.php">Back to home</a>
        <img src="../assets/img/maintenance.svg" class="img-fluid py-5" alt="Page Not Found">
      </section>

</div>



<?php
$content = ob_get_contents();

ob_end_clean();

include('./template/default.php');
?>