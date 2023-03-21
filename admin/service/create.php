<?php
require_once '../db.php';

$errors = [];
if(isset($_POST['submit']))
{
    $title = trim(htmlentities($_POST['title']));
    $description = trim(htmlentities($_POST['description']));
    $icon = trim(htmlentities($_POST['icon']));
    $box_color = trim(htmlentities($_POST['box_color']));

    if(empty($title))
    {
        $errors['titleError'] = 'Title is Required!';
    }

    if(empty($description))
    {
        $errors['descriptionError'] = 'Description is Required!';
    }

    if(empty($icon))
    {
        $errors['iconError'] = 'Icon is Required!';
    }

    if(empty($box_color))
    {
        $errors['box_colorError'] = 'Box Color is Required!';
    }

    if(empty($errors))
    {
        $insert = "INSERT INTO services (title, description, icon,box_color) VALUES ('$title','$description','$icon','$box_color')";
        $result = mysqli_query($connect, $insert);
        if($result)
        {
            $success = [
                'message_type' => "success",
                'message' => "Service Inserted Successfully!",
            ];  
            $_SESSION['success'] = $success;
            header('Location:index.php');
        }
        else
        {
            $message_type = "error";
            $message = "Service Inserted Fail!";
        }
    }

}

require_once 'create.view.php';
