<?php
require_once '../db.php';

$id = $_GET['id'];
if((int)$id)
{
    $query = "SELECT * FROM banners where id=$id";
    $result = mysqli_query($connect, $query);
    if(mysqli_num_rows($result) > 0)
    {
        $banner = mysqli_fetch_assoc($result);
    }
}


//update query

if (isset($_POST['submit'])) {
    $title = trim(htmlentities($_POST['title']));
    $description = trim(htmlentities($_POST['description']));
    $btn_text = trim(htmlentities($_POST['btn_text']));
    $btn_url = trim(htmlentities($_POST['btn_url']));

    $errors = array();
    if (empty($title)) {
        $errors['titleError'] = "Title required!";
    }
    if (empty($description)) {
        $errors['descriptionError'] = "Description required!";
    }
    if (empty($btn_text)) {
        $errors['btn_textError'] = "Button text required!";
    }
    if (empty($btn_url)) {
        $errors['btn_urlError'] = "Button URL required!";
    }

    if (empty($errors)) {
        $update = "UPDATE banners SET title = '$title', description = '$description',btn_text = '$btn_text',btn_url = '$btn_url' WHERE id = $id";
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