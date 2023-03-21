<?php

require_once("../db.php");


$query = "SELECT * FROM whyus";
$select_result = mysqli_query($connect, $query);
if(mysqli_num_rows($select_result) > 0)
{
    $whyus = mysqli_fetch_assoc($select_result);
}


$id = $whyus['id'];

$errors = [];
if(isset($_POST['submit']))
{
    $video_link = trim(htmlentities($_POST['video_link']));
    $title_one = trim(htmlentities($_POST['title_one']));
    $description_one = trim(htmlentities($_POST['description_one']));
    $icon_one = trim(htmlentities($_POST['icon_one']));
    $title_two = trim(htmlentities($_POST['title_two']));
    $description_two = trim(htmlentities($_POST['description_two']));
    $icon_two = trim(htmlentities($_POST['icon_two']));
    $banner = $_FILES['banner'];

    if(empty($video_link))
    {
        $errors['video_linkError'] = 'Video Link is Required!';
    }

    if(empty($title_one))
    {
        $errors['title_oneError'] = 'Title One is Required!';
    }

    if(empty($description_one))
    {
        $errors['description_oneError'] = 'Description One is Required!';
    }

    if(empty($icon_one))
    {
        $errors['icon_oneError'] = 'Icon One is Required!';
    }

    if(empty($title_two))
    {
        $errors['title_twoError'] = 'Title Two is Required!';
    }

    if(empty($description_two))
    {
        $errors['description_twoError'] = 'Description Two is Required!';
    }

    if(empty($icon_two))
    {
        $errors['icon_twoError'] = 'Icon Two is Required!';
    }

    $photoType = ['jpg', 'jpeg', 'png'];
    if($banner['name'])
    {
        $imgExplode = explode('.', $banner['name']);
        $imgExtension = end($imgExplode);
    }

    if($banner['name'])
    {
        if(!in_array($imgExtension, $photoType))
        {
            $errors['bannerError'] = "Upload valid photo!"; 
        }
        else if($banner['size'] > 3000000)
        {
            $errors['bannerError'] = "Photo Max Size 3MB!"; 
        }
        else 
        {
            $path = '../../uploads/whyus/'.$banner['banner'];
            if(file_exists($path))
            {
                unlink($path);
            }
            $imgName = 'whyus'.'.'.$imgExtension;
            move_uploaded_file($banner['tmp_name'],'../../uploads/whyus/'.$imgName);
        }
    }
    else
    {
        $imgName = $whyus['banner'];
    }
    if(empty($errors))
    {
        $update = "UPDATE whyus SET video_link = '$video_link', title_one = '$title_one', description_one = '$description_one', icon_one ='$icon_one',title_two = '$title_two', description_two = '$description_two', icon_two ='$icon_two', banner = '$imgName' WHERE id = $id";
        $result = mysqli_query($connect, $update);
        if($result)
        {
            $success = [
                'message_type' => "success",
                'message' => "Updated Successfully!",
            ];  
            $_SESSION['success'] = $success;
            header('Location:index.php');
        }
        else
        {
            $message_type = "error";
            $message = "update Fail!";
        }
    }

}

require_once('edit.view.php');