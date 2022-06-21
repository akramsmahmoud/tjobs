<?php
ob_start();
include("../inc/db_connect.php");


if (isset($_POST['submit'])) {

    $company_name = mysqli_real_escape_string($db_connect, $_POST['company_name']);
    $address = mysqli_real_escape_string($db_connect, $_POST['address']);
    $email = mysqli_real_escape_string($db_connect, $_POST['email']);
    $gender = mysqli_real_escape_string($db_connect, $_POST['gender']);
    $country = mysqli_real_escape_string($db_connect, $_POST['country']);
    $career = mysqli_real_escape_string($db_connect, $_POST['career']);
    $job_description = mysqli_real_escape_string($db_connect, $_POST['job_description']);
    $skills = mysqli_real_escape_string($db_connect, $_POST['skills']);

    if (!empty($email)) {

        $profPic = uploadImage($_FILES['company_pic'], 'company_photos');

        if (!$profPic) {
            echo json_encode(array("status" => "failed"));
            exit();
        }


        $query = mysqli_query(
            $db_connect,
            "INSERT INTO jobs 
        (`id`, `company_name`, `address`, `emp_gender`, `career`, `country`, `job_description`, `skills`, `email`, `pic`) 
        VALUES 
        (NULL, '$company_name', '$address', '$gender', '$career', '$country', '$job_description', '$skills', '$email', '$profPic')"
        );
        echo json_encode(array("status" => "Success", "error" => $query));
        exit();
        ob_end_clean();
        if ($query) {

            echo json_encode(array("status" => "Success"));
            exit();
        } else {
            mysqli_error($db_connect);
            echo json_encode(array("status" => "failed", "error" =>  mysqli_error($db_connect)));
            exit();
        }
    } else {
        echo json_encode(array("status" => "failed"));
        exit();
    }
}

function uploadImage($file, $dir)
{
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $rand_dir_name = substr(str_shuffle($chars), 0, 15);

    $file_photo = $file;
    $file_photo_name = $file_photo["name"];
    $newFileName = $rand_dir_name . "_" . str_replace(array(" ", "(", ")", "--", "-(", ")-", "-",), "-", $file_photo_name);

    $uploaded = move_uploaded_file($file_photo["tmp_name"], "../uploads/" . $dir . "/" . $newFileName);

    if ($uploaded) {
        return $newFileName;
    }

    return false;
}
