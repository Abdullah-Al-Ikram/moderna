<?php
require_once "../db.php";

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

require_once('service.view.php');