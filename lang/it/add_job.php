<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Basic Bootstrap Template</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
  <link href="css/form.css">
  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
  <link rel="manifest" href="/site.webmanifest">
</head>

<body>
  <form method="post" action="#" id="addJobForm">
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
                    <h3 class="mb-5 text-uppercase">Job offer</h3>

                    <div class="row">
                      <div class="col-md-6 mb-4">
                        <div class="form-outline">
                          <input type="text" id="company_name" required name="company_name" class="form-control form-control-lg" />
                          <label class="form-label" for="company_name">Company's name</label>
                        </div>
                      </div>

                    </div>


                    <div class="form-outline mb-4">
                      <input type="text" id="address" name="address" required class="form-control form-control-lg" />
                      <label class="form-label" for="address">Address</label>
                    </div>

                    <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">

                      <h6 class="mb-0 me-4">Employee's gender required: </h6>

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

                        <select class="select" name="career" id="career" required>
                          <option value="career" selected>Career</option>
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
                      <div class="col-md-6 mb-4">

                        <select class="select" required id="country" name="country">
                          <option value="country" selected disabled>Country</option>
                          <option value="UnitedArabEmirates">United Arab Emirates</option>
                          <option value="Italy">Italy</option>
                          <option value="Germany">Germany</option>
                          <option value="France">France</option>
                          <option value="UnitedKingdom">United Kingdom</option>
                          <option value="UnitedStates">United States</option>
                          <option value="Other">Other</option>
                        </select>

                      </div>
                    </div>
                    <div class="form-outline mb-4">
                      <textarea class="form-control" id="job_description" rows="3" required name="job_description"></textarea>
                      <label class="form-label" for="job_description">Job description</label>
                    </div>

                    <div class="form-outline mb-4">
                      <textarea class="form-control" id="skills" rows="3" name="skills" required></textarea>
                      <label class="form-label" for="skills">Skills required for the job</label>
                    </div>

                    <div class="form-outline mb-4">
                      <input type="email" id="email" name="email" class="form-control form-control-lg" />
                      <label class="form-label" for="email">Email</label>
                    </div>
                    <div class="mb-3">
                      <label for="company_pic" class="form-label">Insert Company picture</label>
                      <input class="form-control" type="file" id="company_pic" required name="company_pic">
                    </div>


                    <div class="d-flex justify-content-end pt-3">
                      <input type="reset" class="btn btn-light btn-lg" value="Reset all">
                      <button type="submit" class="btn btn-danger btn-lg ms-2">Save job</button>
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
  <script type="text/javascript" src="<?= $_SERVER['cdn'] ?>/js/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <scriptsrc="<?= $_SERVER['cdn'] ?> /js/pages/jobs.js">
    </script>
</body>

</html>