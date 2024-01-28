<?php
session_start();
include("../config.php");

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
  header("Location: ../auth/login.php"); // Redirect to the login page
  exit();
}
?>
<?php include_once('includes/header.php'); ?>
<?php include_once('includes/admin_header.php'); ?>

<div class="main padding-lr-100 mt-5 pt-5">
  <div class="row">
    <div class="col-3" style="padding-left: 0; margin-left: 0;">
      <div class="card" style="background-color: #17A2B8; min-height: 135px;">
        <div class="card-body">
          <h3 class="card-title" style="color: white;">Number of visitors</h3>
          <p class="card-text" style="color: white;">10,000 in a week</p>
        </div>
      </div>
    </div>
    <div class="col-3">
      <div class="card" style="background-color: #28A745; min-height: 135px;">
        <div class="card-body">
          <h3 class="card-title" style="color: white;">Users registered</h3>
          <p class="card-text" style="color: white; ">999+</p>
        </div>
      </div>
    </div>
    <div class="col-3" style="padding-left: 0; margin-left: 0;">
      <div class="card" style="background-color: #E5AD06; min-height: 135px;">
        <div class="card-body">
          <h3 class="card-title" style="color: white;">Number of properties</h3>
          <p class="card-text" style="color: white;">28,558</p>
        </div>
      </div>
    </div>
    <div class="col-3">
      <div class="card" style="background-color: #DC3545; min-height: 135px;">
        <div class="card-body">
          <h3 class="card-title" style="color: white;">Rating</h3>
          <p class="card-text" style="color: white; ">⭐⭐⭐⭐⭐</p>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include_once('includes/footer.php'); ?>