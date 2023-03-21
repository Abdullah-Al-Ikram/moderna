<?php

require_once "../db.php";

$query = "SELECT id, title, description, status FROM services";
$result = mysqli_query($connect, $query);

if(mysqli_num_rows($result)>0)
{
    $services = mysqli_fetch_all($result,true);
}

require_once "index.view.php";

