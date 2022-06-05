<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Basic Bootstrap Template</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" disabled media="all"type="text/css" href="<?= $_SERVER['cdn'] ?>/css/font-awesome.css">
  <link href="<?= $_SERVER['cdn'] ?>/css/form.css">
  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
  <link rel="manifest" href="/site.webmanifest">
</head>

<body>
  <form method="post" action="#" id="addEmployeeForm">
    <section class="h-100 bg-dark">
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col">
            <div class="card card-registration my-4">
              <div class="row g-0">
                <div class="col-xl-6 d-none d-xl-block">
                  <img src="<?= $_SERVER['cdn'] ?>/images/form.jpeg" alt="Sample photo" class="img-fluid" style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" />
                </div>
                <div class="col-xl-6">
                  <div class="card-body p-md-5 text-black">
                    <h3 class="mb-5 text-uppercase">Employee registration form</h3>

                    <div class="row">
                      <div class="col-md-6 mb-4">
                        <div class="form-outline">
                          <input type="text" id="firstName" class="form-control form-control-lg" name="firstName" required="required" />
                          <label class="form-label" for="firstName">First name</label>
                        </div>
                      </div>
                      <div class="col-md-6 mb-4">
                        <div class="form-outline">
                          <input type="text" id="lastName" class="form-control form-control-lg" name="lastName" required="required" />
                          <label class="form-label" for="lastName">Last name</label>
                        </div>
                      </div>
                    </div>



                    <div class="form-outline mb-4">
                      <textarea class="form-control" id="about" rows="3" name="about"></textarea>
                      <label class="form-label" for="about">About the Employee</label>
                    </div>

                    <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">

                      <h6 class="mb-0 me-4">Gender: </h6>

                      <div class="form-check form-check-inline mb-0 me-4">
                        <input class="form-check-input" type="radio" name="gender" id="femaleGender" value="female" />
                        <label class="form-check-label" for="femaleGender">Female</label>
                      </div>

                      <div class="form-check form-check-inline mb-0 me-4">
                        <input class="form-check-input" type="radio" name="gender" id="maleGender" value="male" checked="checked" />
                        <label class="form-check-label" for="maleGender">Male</label>
                      </div>

                    </div>

                    <div class="row">
                      <div class="col-md-6 mb-4">
                        <?php include 'components/selectCountries.php' ?>
                      </div>
                      <div class="col-md-6 mb-4">
                        <select class="select" name="career" id="career">
                          <option value="career" selected disabled>Career</option>
                          <option value="RoomServiceSupervisor">Room Service Supervisor</option>
                          <option value="Receptionist">Receptionist</option>
                          <option value="EventPlanner">Event Planner</option>
                          <option value="Waiter/Waitress">Waiter/Waitress</option>
                          <option value="TourGuide">Tour Guide</option>
                          <option value="HotelManager">Hotel Manager</option>
                          <option value="Lifeguard">Life guard</option>
                          <option value="Other">Other</option>
                        </select>
                      </div>
                    </div>


                    <div class="form-outline mb-4">
                      <input type="text" id="education" class="form-control form-control-lg" name="education" required="required" />
                      <label class="form-label" for="education">Education</label>
                    </div>

                    <div class="form-outline mb-4">
                      <input type="email" id="email" class="form-control form-control-lg" name="email" required="required" />
                      <label class="form-label" for="email">Email</label>
                    </div>
                    <div class="form-outline mb-4">
                      <input type="url" id="linkedIn" class="form-control form-control-lg" name="linkedIn" required="required" pattern="https://.*" placeholder="url should contain https://" />
                      <label class="form-label" for="linkedIn">Linked in profile</label>
                    </div>
                    <div class="mb-3">
                      <label for="cv" class="form-label">Insert your CV file</label>
                      <input class="form-control" type="file" id="cv" name="cv" required="required">
                    </div>
                    <div class="mb-3">
                      <label for="profpic" class="form-label">Insert your profile pic</label>
                      <input class="form-control" type="file" id="profpic" name="profpic" required="required">
                    </div>

                    <div class="d-flex justify-content-end pt-3">
                      <input type="reset" class="btn btn-light btn-lg" onClick="(function(){confirm('that will reset all the form, are you sure?.')})()" value="Reset All" />
                      <button type="submit" class="btn btn-danger btn-lg ms-2">Submit form</button>
                    </div>
                    <div class="col-md-12">
                      <div class="displaySuccess"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </form>
  <!-- Bootstrap JS Bundle with Popper -->
  <script type="text/javascript" async src="<?= $_SERVER['cdn'] ?>/js/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <scriptsrc="<?= $_SERVER['cdn'] ?> /js/pages/employee.js">
    </script>
</body>

</html>