<?php
session_start();
require_once 'db.php';

if(isset($_POST['submit']))
{
    $email = trim(htmlentities($_POST['email']));
    $password = trim(htmlentities($_POST['password']));

    // Email validation
    $user_error = array();
    if(empty($email)) {
        $user_error['emailError'] = "Required email";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $user_error['emailError'] = "Please Enter Valid Email";
    }

    //Password validation
    if(empty($password)) {
        $user_error['passError'] = "Required User Password!";
    }

    if(empty($user_error))
    {
        $query = "SELECT * FROM users WHERE email = '$email'";

        $result = mysqli_query($connect, $query);
        if(mysqli_num_rows( $result) > 0)
        {
            $user =mysqli_fetch_assoc($result);
            if(password_verify($password, $user['password']))
            {
                unset($user['password']);
                $_SESSION['signedin_user'] = $user;
                header('location: index.php');
            }
            else
            {
                $user_error['passError'] = "Wrong Password!";
            }
        }
        else
        {
            $user_error['emailError'] = "User Not Found!";
        }
    }
}

require_once 'auth/signin.view.php';
unset($_SESSION['success']);