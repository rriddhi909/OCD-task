<?php

require_once ("config.php");

if ((isset($_POST['first_name']) && $_POST['first_name'] != '') &&
        (isset($_POST['last_name']) && $_POST['last_name'] != '') &&
        (isset($_POST['gender']) && $_POST['gender'] != '') &&
        (isset($_POST['phone']) && $_POST['phone'] != '') &&
        (isset($_POST['country']) && $_POST['country'] != '') &&
        (isset($_POST['city']) && $_POST['city'] != '')) {

    $first_name = $conn->real_escape_string($_POST['first_name']);
    $last_name = $conn->real_escape_string($_POST['last_name']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $gender = $conn->real_escape_string($_POST['gender']);
    $country = $conn->real_escape_string($_POST['country']);
    $city = $conn->real_escape_string($_POST['city']);
// User Image logic starts
    // Create directory if it does not exist
    if (!is_dir("uploaded_files/")) {
        mkdir("uploaded_files");
    }

    $target_dir = "uploaded_files/";
    $target_file = $target_dir . basename($_FILES["user_image"]["name"]);

    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "File is not an image.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["user_image"]["tmp_name"], $target_file)) {
            $sql = "INSERT INTO user (first_name, last_name, phone, gender, country, city, image) VALUES 
('" . $first_name . "','" . $last_name . "', '" . $phone . "', '" . $gender . "', '" . $country . "', '" . $city . "', '" . $target_file . "')";

            if (!$result = $conn->query($sql)) {

                die('There was an error running the query [' . $conn->error . ']');
            } else {
                echo "<b>The details are submitted :</b><br>First name : " . $first_name . "<br>Last name : " . $last_name . "<br>Gender : " . $gender . "<br>Phone number : " . $phone . "<br> Country : " . $country . "<br>City : " . $city . "<br>Image : <img height='100px' width='100px' src='" . $target_file . "'><br><br><a href='index.php'>Back to Form</a>";
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
} else {
    echo "Something went wrong.";
}
?>
