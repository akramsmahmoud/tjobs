<?php
ob_start();
include("../inc/db_connect.php");


if (isset($_POST['submit'])) {

    $name = mysqli_real_escape_string($db_connect, $_POST['name']);
    $email = mysqli_real_escape_string($db_connect, $_POST['email']);
    $subject = mysqli_real_escape_string($db_connect, $_POST['subject']);
    $message = mysqli_real_escape_string($db_connect, $_POST['message']);

    if ($name && $email && $subject && $message) {

        $query = mysqli_query($db_connect, "INSERT INTO contacts (`id`, `name`, `email`, `subject`, `message`) VALUES (NULL, '$name', '$email', '$subject', '$message')");

        ob_end_clean();
        if ($query) {

            echo json_encode(array("status" => "Success"));
            exit();
        } else {
            mysqli_error($db_connect);
            echo json_encode(array("status" => "failed", "error" =>  mysqli_error($db_connect)));
            exit();
        }
    }
}
