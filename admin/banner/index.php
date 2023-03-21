<?php

require_once "../db.php";

$query = "SELECT id, title, description, status FROM banners";
$result = mysqli_query($connect, $query);

if(mysqli_num_rows($result)>0)
{
    $banners = mysqli_fetch_all($result,true);
}

require_once "index.view.php";

