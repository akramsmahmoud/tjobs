<?php
ob_start();
include("../inc/db_connect.php");


if (isset($_POST['submit'])) {

    $firstName = mysqli_real_escape_string($db_connect, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($db_connect, $_POST['lastName']);
    $about = mysqli_real_escape_string($db_connect, $_POST['about']);
    $email = mysqli_real_escape_string($db_connect, $_POST['email']);
    $gender = mysqli_real_escape_string($db_connect, $_POST['gender']);
    $country = mysqli_real_escape_string($db_connect, $_POST['country']);
    $career = mysqli_real_escape_string($db_connect, $_POST['career']);
    $education = mysqli_real_escape_string($db_connect, $_POST['education']);
    $email = mysqli_real_escape_string($db_connect, $_POST['email']);
    $linkedIn = mysqli_real_escape_string($db_connect, $_POST['linkedIn']);
    $cv = mysqli_real_escape_string($db_connect, $_POST['cv']);

    if (!empty($email)) {

        $employee_check =  mysqli_query($db_connect, "SELECT email FROM employees WHERE email = '$email' ");

        //Count the amount of rows where username = $username
        $check_employee = mysqli_num_rows($employee_check);
        ob_end_clean();
        if ($check_employee > 0) {
            echo json_encode(array("status" => "exists"));
            exit();
        }


        $profPic = uploadImage($_FILES['profpic'], 'employees_photos');
        $cv = uploadImage($_FILES['cv'], 'cv');

        if (!$profPic || !$cv) {
            echo json_encode(array("status" => "failed"));
            exit();
        }


        $query = mysqli_query(
            $db_connect,
            "INSERT INTO employees 
        (`id`, `first_name`, `last_name`, `about`, `gender`, `country`, `career`, `education`, `email`, `linkedin_url`, `cv`, `img`) 
        VALUES 
        (NULL, '$firstName', '$lastName', '$about', '$gender', '$country', '$career', '$education', '$email', '$linkedIn', '$cv', '$profPic')"
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
