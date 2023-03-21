<?php
require_once "../db.php";

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

require_once('banner.view.php');