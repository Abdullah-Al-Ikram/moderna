<?php

require_once "../db.php";

$id = $_GET['id'];
if((int)$id)
{
    $query = "SELECT * FROM banners where id = $id";
    $result = mysqli_query($connect, $query);
    if(mysqli_num_rows($result) > 0)
    {
        $user = mysqli_fetch_assoc($result);
    }
    $delete = "DELETE FROM banners WHERE `banners`.`id` = $id";
    $result = mysqli_query($connect, $delete);
    header('location:index.php');
}