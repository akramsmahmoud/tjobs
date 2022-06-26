<?php
ob_start();
include("../inc/db_connect.php");


if (isset($_POST['submit'])) {

    $username = mysqli_real_escape_string($db_connect, $_POST['username']);
    $email = mysqli_real_escape_string($db_connect, $_POST['email']);
    $password = mysqli_real_escape_string($db_connect, $_POST['password']);
    $password2 = mysqli_real_escape_string($db_connect, $_POST['password2']);



    if (!empty($username)) {

        $user_check =  mysqli_query($db_connect, "SELECT username FROM users WHERE username = '$username' ");

        //Count the amount of rows where username = $username
        $check_user = mysqli_num_rows($user_check);
        ob_end_clean();
        if ($check_user > 0) {
            echo json_encode(array("status" => "exists"));
            exit();
        }

        if ($password !== $password2) {
            echo json_encode(array("status" => "exists_password"));
            exit();
        }

        $loginpassword = md5(md5($password) . md5($username));

        $query = mysqli_query(
            $db_connect,
            "INSERT INTO users 
        (`id`, `username`, `email`, `password`) 
        VALUES 
        (NULL, '$username', '$email', '$loginpassword')"
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
