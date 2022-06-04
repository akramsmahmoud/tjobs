<?php
ob_start();
include("../inc/db_connect.php");

session_start();

if (isset($_SESSION['username'])) {
  header("location: index.php");
  exit();
}

if (isset($_POST['submit'])) {

  $realusername = mysqli_real_escape_string($db_connect, $_POST['username']);
  $password = mysqli_real_escape_string($db_connect, $_POST['password']);

  $check_details = mysqli_query($db_connect, "SELECT username FROM users WHERE username = '$realusername' ");


  $check_details_row = mysqli_num_rows($check_details);
  if ($check_details_row == 1) {

    while ($row = mysqli_fetch_array($check_details)) {
      $usernamenew = $row['username'];
    }

    $loginpassword = md5(md5($password) . md5($usernamenew));

    $sql = mysqli_query($db_connect, "SELECT * FROM users WHERE username = '$usernamenew' AND password = '$loginpassword' LIMIT 1 ");
    $sqlcount = mysqli_num_rows($sql);
    ob_end_clean();
    if ($sqlcount == 1) {
      echo json_encode(array("response" => "Success"));
      $_SESSION["username"] = $realusername;
      header("location: login.php");
    } else {
      echo json_encode(array("response" => "password"));
      header("location: login.php?error=1");
    }
  } else {
    echo json_encode(array("response" => "username"));
    header("location: login.php?error=1");
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="index2.html"><b>Admin</b>LTE</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <?php if (isset($_GET['error'])) { ?>
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-ban"></i> Alert!</h5>
            Wrong username or password!
          </div>
        <?php } ?>
        <form action="" method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Username" name="username">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                  Remember Me
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <input type="submit" name="submit" class="btn btn-primary btn-block" value="Sign In">
            </div>
            <!-- /.col -->
          </div>
        </form>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
</body>

</html>