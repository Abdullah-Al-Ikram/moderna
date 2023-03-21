<?php
require_once '../db.php';

$id = $_GET['id'];
if((int)$id)
{
    $query = "SELECT * FROM services where id=$id";
    $result = mysqli_query($connect, $query);
    if(mysqli_num_rows($result) > 0)
    {
        $service = mysqli_fetch_assoc($result);
    }
}


//update query

if (isset($_POST['submit'])) {
    $title = trim(htmlentities($_POST['title']));
    $description = trim(htmlentities($_POST['description']));
    $icon = trim(htmlentities($_POST['icon']));
    $box_color = trim(htmlentities($_POST['box_color']));

    $errors = array();
    if (empty($title)) {
        $errors['titleError'] = "Title required!";
    }
    if (empty($description)) {
        $errors['descriptionError'] = "Description required!";
    }
    if (empty($icon)) {
        $errors['iconError'] = "Button text required!";
    }
    if (empty($box_color)) {
        $errors['box_colorError'] = "Button URL required!";
    }

    if (empty($errors)) {
        $update = "UPDATE services SET title = '$title', description = '$description',icon = '$icon',box_color = '$box_color' WHERE id = $id";
        $result = mysqli_query($connect, $update);
        
        if ($result) {
            $message = [
                'message_type' => "success",
                'message' => "Successfully Update!"
            ];
            $_SESSION['success'] = $message;
            header('location: index.php');
        } else {
            $message_type = 'error';
            $message = "Update failed!";
        }
    }
}



require_once 'edit.view.php';