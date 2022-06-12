<?php
ob_start();
include("inc/db_connect.php");
session_start();
$RoomServiceSupervisors =  mysqli_query($db_connect, "SELECT * FROM jobs WHERE career='RoomServiceSupervisor' AND approved = 1 AND approved = 1 ORDER BY created_at DESC");
$RoomServiceSupervisors_num = mysqli_num_rows($RoomServiceSupervisors);

$Receptionist =  mysqli_query($db_connect, "SELECT * FROM jobs WHERE career='Receptionist' AND approved = 1 ORDER BY created_at DESC");
$Receptionist_num = mysqli_num_rows($Receptionist);

$EventPlanner =  mysqli_query($db_connect, "SELECT * FROM jobs WHERE career='EventPlanner' AND approved = 1 ORDER BY created_at DESC");
$EventPlanner_num  = mysqli_num_rows($EventPlanner);

$WaiterWaitress =  mysqli_query($db_connect, "SELECT * FROM jobs WHERE career='Waiter/Waitress' AND approved = 1 ORDER BY created_at DESC");
$WaiterWaitress_num  = mysqli_num_rows($WaiterWaitress);

$TourGuide =  mysqli_query($db_connect, "SELECT * FROM jobs WHERE career='TourGuide' AND approved = 1 ORDER BY created_at DESC");
$TourGuide_num = mysqli_num_rows($TourGuide);

$HotelManager =  mysqli_query($db_connect, "SELECT * FROM jobs WHERE career='HotelManager' AND approved = 1 ORDER BY created_at DESC");
$HotelManager_num = mysqli_num_rows($HotelManager);

$Lifeguard =  mysqli_query($db_connect, "SELECT * FROM jobs WHERE career='Lifeguard' AND approved = 1 ORDER BY created_at DESC");
$Lifeguard_num = mysqli_num_rows($Lifeguard);

$Other =  mysqli_query($db_connect, "SELECT * FROM jobs WHERE career='Other' AND approved = 1 ORDER BY created_at DESC");
$Other_num = mysqli_num_rows($Other);
?>
<?php include("lang/{$_SESSION['lang']}/inc/header.php") ?>

<section id="projects">
  <div class="container">
    <div class="col-md-12">
      <ul class="nav nav-pills" id="pills-tab" role="tablist" style="margin-top:15px;">
        <li class="nav-item active">
          <a class="nav-link" id="pills-RoomServiceSupervisor-tab" data-toggle="pill" href="#pills-RoomServiceSupervisor" role="tab" aria-controls="pills-RoomServiceSupervisor" aria-selected="true">Room Service Supervisor</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pills-Receptionist-tab" data-toggle="pill" href="#pills-Receptionist" role="tab" aria-controls="pills-Receptionist" aria-selected="false">Receptionist</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pills-EventPlanner-tab" data-toggle="pill" href="#pills-EventPlanner" role="tab" aria-controls="pills-EventPlanner" aria-selected="false"> Event Planner</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pills-WaiterWaitress-tab" data-toggle="pill" href="#pills-WaiterWaitress" role="tab" aria-controls="pills-WaiterWaitress" aria-selected="false">Waiter/Waitress</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" id="pills-TourGuide-tab" data-toggle="pill" href="#pills-TourGuide" role="tab" aria-controls="pills-TourGuide" aria-selected="false">Tour Guide</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" id="pills-HotelManager-tab" data-toggle="pill" href="#pills-HotelManager" role="tab" aria-controls="pills-HotelManager" aria-selected="false">Hotel Manager</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" id="pills-Lifeguard-tab" data-toggle="pill" href="#pills-Lifeguard" role="tab" aria-controls="pills-Lifeguard" aria-selected="false">Life guard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pills-other-tab" data-toggle="pill" href="#pills-other" role="tab" aria-controls="pills-other" aria-selected="false">Other</a>
        </li>
      </ul>
    </div>
    <div class="tab-content" id="pills-tabContent">
      <div class="tab-pane fade active in" id="pills-RoomServiceSupervisor" role="tabpanel" aria-labelledby="pills-RoomServiceSupervisor-tab">
        <div class="container">
          <div class="row no-gutters">
            <?php if ($RoomServiceSupervisors_num == 0) { ?>
              <div class="col-md-12 alert alert-warning team-main-sec" role="alert">
                <strong>Sorry!</strong> No job offer are currently found in this career for the moment.
              </div>
            <?php } ?>
            <?php while ($data = mysqli_fetch_assoc($RoomServiceSupervisors)) { ?>
              <div class="col-md-3 col-sm-6 col-xs-12 team-main-sec">
                <div class="team-sec">
                  <div class="team-img"> <img src="uploads/company_photos/<?= $data['pic'] ?>" class="img-responsive" alt="">
                    <div class="team-desc">
                      <h5><?= $data['company_name'] ?></h5>
                      <p><?= $data['job_description'] ?></p>
                      <ul class="team-social-icon">
                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook-f"></i></a></li>
                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="Pinterest"><i class="fa fa-pinterest-p"></i></a></li>
                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fa fa-instagram"></i></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>

      <div class="tab-pane fade" id="pills-Receptionist" role="tabpanel" aria-labelledby="pills-Receptionist-tab">
        <div class="container">
          <div class="row no-gutters">
            <?php if ($Receptionist_num == 0) { ?>
              <div class="col-md-12 alert alert-warning team-main-sec" role="alert">
                <strong>Sorry!</strong> No job offer are currently found in this career for the moment.
              </div>
            <?php } ?>
            <?php while ($data = mysqli_fetch_assoc($Receptionist)) { ?>
              <div class="col-md-3 col-sm-6 col-xs-12 team-main-sec">
                <div class="team-sec">
                  <div class="team-img"> <img src="uploads/company_photos/<?= $data['pic'] ?>" class="img-responsive" alt="">
                    <div class="team-desc">
                      <h5><?= $data['company_name'] ?></h5>
                      <p><?= $data['job_description'] ?></p>
                      <ul class="team-social-icon">
                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook-f"></i></a></li>
                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="Pinterest"><i class="fa fa-pinterest-p"></i></a></li>
                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fa fa-instagram"></i></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>

      <div class="tab-pane fade" id="pills-EventPlanner" role="tabpanel" aria-labelledby="pills-EventPlanner-tab">
        <div class="container">
          <div class="row no-gutters">
            <?php if ($EventPlanner_num == 0) { ?>
              <div class="col-md-12 alert alert-warning team-main-sec" role="alert">
                <strong>Sorry!</strong> No job offer are currently found in this career for the moment.
              </div>
            <?php } ?>
            <?php while ($data = mysqli_fetch_assoc($EventPlanner)) { ?>
              <div class="col-md-3 col-sm-6 col-xs-12 team-main-sec">
                <div class="team-sec">
                  <div class="team-img"> <img src="uploads/company_photos/<?= $data['pic'] ?>" class="img-responsive" alt="">
                    <div class="team-desc">
                      <h5><?= $data['company_name'] ?></h5>
                      <p><?= $data['job_description'] ?></p>
                      <ul class="team-social-icon">
                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook-f"></i></a></li>
                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="Pinterest"><i class="fa fa-pinterest-p"></i></a></li>
                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fa fa-instagram"></i></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>

      <div class="tab-pane fade" id="pills-WaiterWaitress" role="tabpanel" aria-labelledby="pills-WaiterWaitress-tab">
        <div class="container">
          <div class="row no-gutters">
            <?php if ($WaiterWaitress_num == 0) { ?>
              <div class="col-md-12 alert alert-warning team-main-sec" role="alert">
                <strong>Sorry!</strong> No job offer are currently found in this career for the moment.
              </div>
            <?php } ?>
            <?php while ($data = mysqli_fetch_assoc($WaiterWaitress)) { ?>
              <div class="col-md-3 col-sm-6 col-xs-12 team-main-sec">
                <div class="team-sec">
                  <div class="team-img"> <img src="uploads/company_photos/<?= $data['pic'] ?>" class="img-responsive" alt="">
                    <div class="team-desc">
                      <h5><?= $data['company_name'] ?></h5>
                      <p><?= $data['job_description'] ?></p>
                      <ul class="team-social-icon">
                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook-f"></i></a></li>
                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="Pinterest"><i class="fa fa-pinterest-p"></i></a></li>
                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fa fa-instagram"></i></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>

      <div class="tab-pane fade" id="pills-TourGuide" role="tabpanel" aria-labelledby="pills-TourGuide-tab">
        <div class="container">
          <div class="row no-gutters">
            <?php if ($TourGuide_num == 0) { ?>
              <div class="col-md-12 alert alert-warning team-main-sec" role="alert">
                <strong>Sorry!</strong> No job offer are currently found in this career for the moment.
              </div>
            <?php } ?>
            <?php while ($data = mysqli_fetch_assoc($TourGuide)) { ?>
              <div class="col-md-3 col-sm-6 col-xs-12 team-main-sec">
                <div class="team-sec">
                  <div class="team-img"> <img src="uploads/company_photos/<?= $data['pic'] ?>" class="img-responsive" alt="">
                    <div class="team-desc">
                      <h5><?= $data['company_name'] ?></h5>
                      <p><?= $data['job_description'] ?></p>
                      <ul class="team-social-icon">
                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook-f"></i></a></li>
                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="Pinterest"><i class="fa fa-pinterest-p"></i></a></li>
                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fa fa-instagram"></i></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>

      <div class="tab-pane fade" id="pills-HotelManager" role="tabpanel" aria-labelledby="pills-HotelManager-tab">
        <div class="container">
          <div class="row no-gutters">
            <?php if ($HotelManager_num == 0) { ?>
              <div class="col-md-12 alert alert-warning team-main-sec" role="alert">
                <strong>Sorry!</strong> No job offer are currently found in this career for the moment.
              </div>
            <?php } ?>
            <?php while ($data = mysqli_fetch_assoc($HotelManager)) { ?>
              <div class="col-md-3 col-sm-6 col-xs-12 team-main-sec">
                <div class="team-sec">
                  <div class="team-img"> <img src="uploads/company_photos/<?= $data['pic'] ?>" class="img-responsive" alt="">
                    <div class="team-desc">
                      <h5><?= $data['company_name'] ?></h5>
                      <p><?= $data['job_description'] ?></p>
                      <ul class="team-social-icon">
                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook-f"></i></a></li>
                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="Pinterest"><i class="fa fa-pinterest-p"></i></a></li>
                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fa fa-instagram"></i></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>

      <div class="tab-pane fade" id="pills-Lifeguard" role="tabpanel" aria-labelledby="pills-Lifeguard-tab">
        <div class="container">
          <div class="row no-gutters">
            <?php if ($Lifeguard_num == 0) { ?>
              <div class="col-md-12 alert alert-warning team-main-sec" role="alert">
                <strong>Sorry!</strong> No job offer are currently found in this career for the moment.
              </div>
            <?php } ?>
            <?php while ($data = mysqli_fetch_assoc($Lifeguard)) { ?>
              <div class="col-md-3 col-sm-6 col-xs-12 team-main-sec">
                <div class="team-sec">
                  <div class="team-img"> <img src="uploads/company_photos/<?= $data['pic'] ?>" class="img-responsive" alt="">
                    <div class="team-desc">
                      <h5><?= $data['company_name'] ?></h5>
                      <p><?= $data['job_description'] ?></p>
                      <ul class="team-social-icon">
                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook-f"></i></a></li>
                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="Pinterest"><i class="fa fa-pinterest-p"></i></a></li>
                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fa fa-instagram"></i></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>

      <div class="tab-pane fade" id="pills-other" role="tabpanel" aria-labelledby="pills-other-tab">
        <div class="container">
          <div class="row no-gutters">
            <?php if ($Other_num == 0) { ?>
              <div class="col-md-12 alert alert-warning team-main-sec" role="alert">
                <strong>Sorry!</strong> No job offer are currently found in this career for the moment.
              </div>
            <?php } ?>
            <?php while ($data = mysqli_fetch_assoc($Other)) { ?>
              <div class="col-md-3 col-sm-6 col-xs-12 team-main-sec">
                <div class="team-sec">
                  <div class="team-img"> <img src="uploads/company_photos/<?= $data['pic'] ?>" class="img-responsive" alt="">
                    <div class="team-desc">
                      <h5><?= $data['company_name'] ?></h5>
                      <p><?= $data['job_description'] ?></p>
                      <ul class="team-social-icon">
                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook-f"></i></a></li>
                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="Pinterest"><i class="fa fa-pinterest-p"></i></a></li>
                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fa fa-instagram"></i></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include('inc/footer.php') ?>