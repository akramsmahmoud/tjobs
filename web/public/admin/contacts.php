<?php
ob_start();
session_start();
if (!isset($_SESSION['username'])) {
  header("location: login.php");
}

ob_start();
include("../inc/db_connect.php");

$contacts =  mysqli_query($db_connect, "SELECT * FROM contacts ORDER BY created_at DESC");
$contacts_num = mysqli_num_rows($contacts);
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
          <h1 class="m-0">Contacts Page</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Contacts Page</li>
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
          <?php if ($contacts_num === 0) { ?>
            <div class="callout callout-warning">
              <h5>Contacts!</h5>
              <p>No contacts to show.</p>
            </div>
          <?php } else { ?>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">View all contacts</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>name</th>
                      <th>email</th>
                      <th>subject</th>
                      <th>message</th>
                      <th style="width: 100px">created at</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php while ($contact = mysqli_fetch_assoc($contacts)) { ?>
                      <tr>
                        <td><?= $contact['id'] ?></td>
                        <td><?= $contact['name'] ?></td>
                        <td><?= $contact['email'] ?></td>
                        <td><?= $contact['subject'] ?></td>
                        <td><?= $contact['message'] ?></td>
                        <td><span class="badge bg-danger"><?= $contact['created_at'] ?></span></td>
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
