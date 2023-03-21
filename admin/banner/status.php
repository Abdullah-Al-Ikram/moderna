<?php

require_once "../db.php";

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    if((int)$id)
    {
        $query = "SELECT id, status FROM banners WHERE id = $id";
        $result = mysqli_query($connect, $query);
        if(mysqli_num_rows($result) > 0)
        {
            $user = mysqli_fetch_assoc($result);
        }

        if($user['status'] == 1)
        {
            $update = "UPDATE banners SET status = 2 WHERE id = $id";
            $result = mysqli_query($connect, $update);
        }  
        else
        {
            $update = "UPDATE banners SET status = 1 WHERE id = $id";
            $result = mysqli_query($connect, $update);
        }  
    
        header('location:index.php');
    }
}