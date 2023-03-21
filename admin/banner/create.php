<?php
require_once '../db.php';

$errors = [];
if(isset($_POST['submit']))
{
    $title = trim(htmlentities($_POST['title']));
    $description = trim(htmlentities($_POST['description']));
    $btn_text = trim(htmlentities($_POST['btn_text']));
    $btn_url = trim(htmlentities($_POST['btn_url']));

    if(empty($title))
    {
        $errors['titleError'] = 'Title is Required!';
    }

    if(empty($description))
    {
        $errors['descriptionError'] = 'Description is Required!';
    }

    if(empty($btn_text))
    {
        $errors['btn_textError'] = 'Button is Required!';
    }

    if(empty($btn_url))
    {
        $errors['btn_urlError'] = 'Button URl is Required!';
    }

    if(empty($errors))
    {
        $insert = "INSERT INTO banners(title, description, btn_text,btn_url) VALUES ('$title','$description','$btn_text','$btn_url')";
        $result = mysqli_query($connect, $insert);
        if($result)
        {
            $success = [
                'message_type' => "success",
                'message' => "Banner Inserted Successfully!",
            ];  
            $_SESSION['success'] = $success;
            header('Location:index.php');
        }
        else
        {
            $message_type = "error";
            $message = "Banner Inserted Fail!";
        }
    }

}

require_once 'create.view.php';
