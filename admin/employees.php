<?php
ob_start();
session_start();
if (!isset($_SESSION['username'])) {
  header("location: login.php");
}

include("../inc/db_connect.php");

$employees =  mysqli_query($db_connect, "SELECT * FROM employees ORDER BY created_at DESC");
$employees_num = mysqli_num_rows($employees);
$count = 0;

if (isset($_GET['approved'])) {
  $update_employee =  mysqli_query($db_connect, "UPDATE employees SET approved = '" . $_GET['approved'] . "' WHERE id=" . $_GET['id']) or die(mysqli_error($db_connect));
  if (mysqli_affected_rows($db_connect) > 0) {
    header('location: employees.php');
    exit();
  }
}

if (isset($_GET['action']) && $_GET['action'] == 'delete') {
  $update_employee =  mysqli_query($db_connect, "DELETE FROM employees WHERE id=" . $_GET['id']) or die(mysqli_error($db_connect));
  if (mysqli_affected_rows($db_connect) > 0) {
    header('location: employees.php');
    exit();
  }
}
?>
<?php include 'inc/head.php'; ?>

<!-- Main Sidebar Container -->
<?php include 'inc/sidebar.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Employees Page</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Employees Page</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">

      <div class="row">
        <div class="col-md-12">
          <?php if ($employees_num === 0) { ?>
            <div class="callout callout-warning">
              <h5>Employees profile!</h5>
              <p>No Employees found.</p>
            </div>
          <?php } else { ?>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">View all Employees</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th style="width: 70px">Image</th>
                      <th>Name</th>
                      <th>email</th>
                      <th>career</th>
                      <th>country</th>
                      <th style="width: 100px">Approved</th>
                      <th style="width: 100px">Action</th>
                      <th style="width: 150px">CV</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php while ($employee = mysqli_fetch_assoc($employees)) { ?>
                      <tr>
                        <td><?= ++$count ?></td>
                        <td><img src="<?= $_SERVER['cdn'] ?>/uploads/employees_photos/<?= $employee['img'] ?>" alt="<?= $employee['first_name'] ?>" class="img-responsive" style="max-width:70px"></td>
                        <td><?= $employee['first_name'] . " " .  $employee['last_name'] ?></td>
                        <td><?= $employee['email'] ?></td>
                        <td><?= $employee['career'] ?></td>
                        <td><?= $employee['country'] ?></td>
                        <td>
                          <?php if ($employee['approved'] == 0) { ?>
                            <a href="employees.php?approved=1&id=<?= $employee['id'] ?>"><i class="fas fa-check-circle" style="color: green; margin-right: 10px"></i></a>
                            <a href="employees.php?approved=2&id=<?= $employee['id'] ?>"><i class="fas fa-times-circle" style="color: red"></i></a>
                          <?php } ?>
                          <?php if ($employee['approved'] == 1) { ?>
                            <span class="badge bg-success">Approved</span>
                          <?php } ?>
                          <?php if ($employee['approved'] == 2) { ?>
                            <span class="badge bg-danger">Unapproved</span>
                          <?php } ?>
                        </td>
                        <td><a class="btn btn-danger" href="employees.php?action=delete&id=<?= $employee['id'] ?>">Delete</a></td>
                        <td><a class="btn btn-primary" target="_blank" href="../uploads/cv/<?= $employee['cv'] ?>">Download <i class="fa fa-download"></i></a></td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          <?php } ?>
        </div>
      </div>

    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include 'inc/footer.php'; ?>