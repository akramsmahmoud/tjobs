$(document).ready(function () {
  $("#main-contact-form").submit(function (event) {
    event.preventDefault();

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

    $.ajax({
      type: "post",
      url: "./functions/addContact.php",
      dataType: "json",
      data: {
        name: $(".name").val(),
        email: $(".email").val(),
        subject: $(".subject").val(),
        message: $(".message").val(),
        submit: "submit",
      },
      success: function (data) {
        var status = data.status;
        $(".displaySuccess").html("");

        if (status == "Success") {
          $(".displaySuccess").html(
            '<span class="spinicon"><i class="fa fa-check fa-1x"></i></span> Contact sent successfully'
          );
          $("#main-contact-form").html("");
        } else if (status == "failed") {
          $(".displaySuccess").css("background", "#ff0000");
          $(".displaySuccess").html(
            '<span class="spinicon"><i class="fa fa-exclamation-circle fa-1x"></i></span> Error adding new user'
          );
          setTimeout(function () {
            $(".displaySuccess").css({
              "margin-top": "",
              opacity: "",
              background: "",
            });
            $(".displaySuccess").html("");
          }, 5000);
        } else if (status == "exists") {
          $(".displaySuccess").css("background", "#ff0000");
          $(".displaySuccess").html(
            '<span class="spinicon"><i class="fa fa-exclamation-circle fa-1x"></i></span> Username already exists'
          );
          setTimeout(function () {
            $(".displaySuccess").css({
              "margin-top": "",
              opacity: "",
              background: "",
            });
            $(".displaySuccess").html("");
          }, 5000);
        }
      },
      error: function (e) {
        console.log(e);
      },
    });
  });
});
