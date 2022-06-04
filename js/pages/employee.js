$(document).ready(function () {
  $("#addEmployeeForm").submit(function (event) {
    event.preventDefault();
    event.stopImmediatePropagation();

    $(".displaySuccess").css({
      "margin-top": "0px",
      opacity: "1",
    });
    $(".displaySuccess").html(
      '<div id="preloader">' +
        ' <div id="pre-status">' +
        '  <div class="preload-placeholder"></div>' +
        "</div>" +
        "</div>"
    );

    var myFormData = new FormData();
    myFormData.append("profpic", $("#profpic").prop("files")[0]);
    myFormData.append("cv", $("#cv").prop("files")[0]);

    var formInputs = {
      firstName: $("#firstName").val(),
      lastName: $("#lastName").val(),
      about: $("#about").val(),
      email: $("#email").val(),
      gender: $("input[name='gender']:checked").val(),
      country: $("#country").val(),
      career: $("#career").val(),
      education: $("#education").val(),
      email: $("#email").val(),
      linkedIn: $("#linkedIn").val(),
      submit: "submit",
    };

    Object.keys(formInputs).map((inputKey) => {
      myFormData.append(inputKey, formInputs[inputKey]);
    });

    let img = $("#profpic");
    var sel_files = img.val();
    var file_size = img[0].files[0].size;
    var ext = img.val().split(".").pop().toLowerCase();

    if (sel_files == "") {
      showErrorMsg("Error! please select photo!");
      return;
    }

    if ($.inArray(ext, ["png", "jpg", "jpeg"]) == -1) {
      showErrorMsg("Error! file extension is not supported!");
      return;
    }
    if (file_size > 22428888880) {
      showErrorMsg("Error! file size is bigger than expected!");
      return;
    }

    let cvPdf = $("#cv");
    var sel_cv = cvPdf.val();
    var pdfExt = cvPdf.val().split(".").pop().toLowerCase();

    if ($.inArray(pdfExt, ["pdf"]) == -1) {
      showErrorMsg("Error! file should be in pdf!");
      return;
    }

    // Remove c:\fake at beginning from localhost chrome
    if (sel_files.substring(3, 11) == "fakepath") {
      sel_files = sel_files.substring(12);
    }

    if (sel_cv.substring(3, 11) == "fakepath") {
      sel_cv = sel_cv.substring(12);
    }

    $(".displaySuccess").html("uploading...");

    $.ajax({
      type: "POST",
      url: "./functions/addEmployee.php",
      processData: false, // important
      contentType: false, // important
      dataType: "JSON",
      data: myFormData,
      success: function (data) {
        var status = data.status;
        $(".displaySuccess").html("");

        if (status == "Success") {
          $(".displaySuccess").css("background", "green");
          $(".displaySuccess").html(
            '<span class="spinicon"><i class="fa fa-check fa-1x"></i></span>Registred Successfully! Thanks for using our services, wait an email from us'
          );
          setTimeout(function () {
            document.location.href = "./index.php";
          }, 5000);
        } else if (status == "failed") {
          showErrorMsg("Error! something went wrong, please try again!");
        } else if (status == "exists") {
          showErrorMsg("Employee already exists");
        }
      },
      error: function (e) {
        console.log(e);
      },
    });
  });

  const showErrorMsg = (msg) => {
    $(".displaySuccess").css("background", "#ff0000");
    $(".displaySuccess").html(
      '<span class="spinicon"><i class="fa fa-exclamation-circle fa-1x"></i></span> ' +
        msg
    );
    setTimeout(function () {
      $(".displaySuccess").css({
        "margin-top": "",
        opacity: "",
        background: "",
      });
      $(".displaySuccess").html("");
    }, 5000);
  };
});
