<?php
ob_start();
session_start();
if (!isset($_SESSION['username']) || $_SESSION['username'] !== 'admin') {
  header("location: login.php");
}

ob_start();
include("../inc/db_connect.php");

$users =  mysqli_query($db_connect, "SELECT * FROM users");
$users_num = mysqli_num_rows($users);

if (isset($_GET['action']) && $_GET['action'] == 'delete') {
  $update_employee =  mysqli_query($db_connect, "DELETE FROM users WHERE id=" . $_GET['id']) or die(mysqli_error($db_connect));
  if (mysqli_affected_rows($db_connect) > 0) {
    header('location: users.php');
    exit();
  }
}

if (isset($_POST['update_pass'])) {

  $loginpassword = md5(md5($_POST['password']) . md5($_POST['username']));
  $update_user =  mysqli_query($db_connect, "UPDATE users SET password = '" . $loginpassword . "' WHERE id=" . $_POST['id']) or die(mysqli_error($db_connect));
  if (mysqli_affected_rows($db_connect) > 0) {
    header('location: users.php');
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
          <h1 class="m-0">Users Page</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Users Page</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row" style="margin-bottom: 10px">
        <div class="col-md-12">
          <button class="btn btn-primary float-right" data-toggle="modal" data-target="#modal-default"><i class="fas fa-plus"></i> Add user </button>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <?php if ($users_num === 0) { ?>
            <div class="callout callout-warning">
              <h5>Users!</h5>
              <p>No users to show.</p>
            </div>
          <?php } else { ?>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">View all users</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>username</th>
                      <th>email</th>
                      <th style="width: 300px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php while ($user = mysqli_fetch_assoc($users)) { ?>
                      <tr>
                        <td><?= $user['id'] ?></td>
                        <td><?= $user['username'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td>
                          <button class="btn btn-warning changePass" data-id="<?= $user['id'] ?>" data-username="<?= $user['username'] ?>" data-toggle="modal" data-target="#modal-password">Change Password</button>
                          <?php if ($user['username'] != 'admin') { ?><a href="users.php?action=delete&id=<?= $user['id'] ?>" class="btn btn-danger">Delete</a><?php } ?>
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

<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <form method="post" action="#" id="addNewUser">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add new user</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Enter Username" required>
          </div>
          <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" name="name" id="email" placeholder="Enter email" required>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
          </div>
          <div class="form-group">
            <label for="password2">Confirm Password</label>
            <input type="password" class="form-control" name="password2" id="password2" placeholder="Password">
          </div>
        </div>

        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary swalDefaultSuccess">Save user</button>
        </div>
      </div>
    </form>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<!-- modal password -->
<div class="modal fade" id="modal-password">
  <div class="modal-dialog">
    <form method="post" action="users.php">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Change Password</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <input type="hidden" name="username" id="input_username">
        <input type="hidden" name="id" id="input_id">
        <div class="modal-body">
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
          </div>
          <div class="form-group">
            <label for="password2">Confirm Password</label>
            <input type="password" class="form-control" name="password2" id="password2" placeholder="Password" required>
          </div>
        </div>

        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <input type="submit" name="update_pass" value="Update" class="btn btn-primary" />
        </div>
      </div>
    </form>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<?php include 'inc/footer.php'; ?>
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="plugins/toastr/toastr.min.js"></script>

<script>
  $(function() {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    $('.changePass').click((e) => {
      e.preventDefault();

      const username = e.currentTarget.dataset.username;
      const id = e.currentTarget.dataset.id;
      console.log(e)
      $('#input_username').val(username);
      $('#input_id').val(id);
    });


    $("#addNewUser").submit(function(event) {
      event.preventDefault();

      $.ajax({
        type: "post",
        url: "../functions/addUser.php",
        dataType: "json",
        data: {
          username: $("#username").val(),
          email: $("#email").val(),
          password: $("#password").val(),
          password2: $("#password2").val(),
          submit: "submit",
        },
        success: function(data) {
          var status = data.status;
          $(".displaySuccess").html("");

          if (status == "Success") {
            Toast.fire({
              icon: 'success',
              title: 'User added successfully.'
            })
            setTimeout(function() {
              window.location.href = "users.php";
            }, 3000)
          } else if (status == "failed") {
            Toast.fire({
              icon: 'error',
              title: 'Error adding new use.'
            })
          } else if (status == "exists") {
            Toast.fire({
              icon: 'error',
              title: 'Username already exists.'
            })
          } else if (status == "exists_password") {
            Toast.fire({
              icon: 'error',
              title: 'Password not match.'
            })
          }
        },
        error: function(e) {
          console.log(e);
        },
      });
    });
  });
</script>