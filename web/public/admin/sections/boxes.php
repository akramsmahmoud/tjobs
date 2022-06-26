<?php
ob_start();
include("../inc/db_connect.php");

$employee_check =  mysqli_query($db_connect, "SELECT id FROM employees");
$employees_num = mysqli_num_rows($employee_check);

$contacts =  mysqli_query($db_connect, "SELECT id FROM contacts");
$contacts_num = mysqli_num_rows($contacts);

$jobs =  mysqli_query($db_connect, "SELECT id FROM jobs");
$jobs_num = mysqli_num_rows($jobs);


$users =  mysqli_query($db_connect, "SELECT id FROM users");
$users_num = mysqli_num_rows($users);
ob_end_clean();
?>
<div class="row">
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
      <div class="inner">
        <h3><?= $jobs_num ?></h3>

        <p>Job offers</p>
      </div>
      <div class="icon">
        <i class="ion ion-bag"></i>
      </div>
      <a href="jobs.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
      <div class="inner">
        <h3><?= $employees_num ?></h3>

        <p>Employees Profile</p>
      </div>
      <div class="icon">
        <i class="ion ion-stats-bars"></i>
      </div>
      <a href="employees.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-warning">
      <div class="inner">
        <h3><?= $contacts_num ?></h3>

        <p>Contacts Sent</p>
      </div>
      <div class="icon">
        <i class="ion ion-person-add"></i>
      </div>
      <a href="contacts.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-danger">
      <div class="inner">
        <h3><?= $users_num ?></h3>

        <p>User Registered</p>
      </div>
      <div class="icon">
        <i class="ion ion-pie-graph"></i>
      </div>
      <?php if ($_SESSION["username"] === "admin") { ?><a href="users.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a><?php } ?>
    </div>
  </div>
  <!-- ./col -->
</div>