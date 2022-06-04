<?php
ob_start();
session_start();
if (!isset($_SESSION['username'])) {
  header("location: login.php");
}

include("../inc/db_connect.php");

$jobs =  mysqli_query($db_connect, "SELECT * FROM jobs ORDER BY created_at DESC");
$jobs_num = mysqli_num_rows($jobs);


if (isset($_GET['approved'])) {
  $update_job =  mysqli_query($db_connect, "UPDATE jobs SET approved = '" . $_GET['approved'] . "' WHERE id=" . $_GET['id']) or die(mysqli_error($db_connect));
  if (mysqli_affected_rows($db_connect) > 0) {
    header('location: jobs.php');
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
          <h1 class="m-0">Job offers Page</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Job offers Page</li>
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
          <?php if ($jobs_num === 0) { ?>
            <div class="callout callout-warning">
              <h5>Job offers!</h5>
              <p>No job offers to show.</p>
            </div>
          <?php } else { ?>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">View all offers</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Image</th>
                      <th>company name</th>
                      <th>email</th>
                      <th>career</th>
                      <th>country</th>
                      <th style="width: 100px">Approved</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php while ($job = mysqli_fetch_assoc($jobs)) { ?>
                      <tr>
                        <td><?= $job['id'] ?></td>
                        <td><img src="<?= $_SERVER['cdn'] ?>/uploads/company_photos/<?= $job['pic'] ?>" alt="<?= $job['company_name'] ?>" class="img-responsive" style="max-width:70px"></td>
                        <td><?= $job['company_name'] ?></td>
                        <td><?= $job['email'] ?></td>
                        <td><?= $job['career'] ?></td>
                        <td><?= $job['country'] ?></td>
                        <td>
                          <?php if ($job['approved'] == 0) { ?>
                            <a href="jobs.php?approved=1&id=<?= $job['id'] ?>"><i class="fas fa-check-circle" style="color: green; margin-right: 10px"></i></a>
                            <a href="jobs.php?approved=2&id=<?= $job['id'] ?>"><i class="fas fa-times-circle" style="color: red"></i></a>
                          <?php } ?>
                          <?php if ($job['approved'] == 1) { ?>
                            <span class="badge bg-success">Approved</span>
                          <?php } ?>
                          <?php if ($job['approved'] == 2) { ?>
                            <span class="badge bg-danger">Unapproved</span>
                          <?php } ?>
                        </td>
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