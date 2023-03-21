<?php
session_start();

require_once 'db.php';
    $errors = [];
    if(isset($_POST['submit']))
    {
        $name = trim(htmlentities($_POST['name']));
        $email = trim(htmlentities($_POST['email']));
        $password = trim(htmlentities($_POST['password']));
        $password_hash = password_hash($password, PASSWORD_DEFAULT);    

        //Name validation
        if(empty($name))
        {
            $errors['nameError'] = 'Enter Your Name!';
        }else if(strlen($name)>30)
        {
            $errors['nameError'] = 'Your Name Is Too Long!';
        }
        else if(strlen($name)<4)
        {
            $errors['nameError'] = 'Your Name Is Too Short!';
        }

        //Email validation
        if(empty($email))
        {
            $errors['emailError'] = 'Enter Your Email Address!';
        }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $errors['emailError'] = 'Enter a Valid Email Address!';
        }
        
        //Password validation
        if(empty($password))
        {
            $errors['passError'] = 'Enter Your Password!';
        }

        //Data insert into the database
        if(empty($errors))
        {
            $insert = "INSERT INTO users(name, email, password) VALUES ('$name','$email','$password_hash')";
            $result = mysqli_query($connect, $insert);
            if($result)
            {
                $success = [
                    'message_type' => "success",
                    'message' => "User Insert Successfully!",
                ];  
                $_SESSION['success'] = $success;
                header('Location:signin.php');
            }
            else
            {
                $message_type = "error";
                $message = "User Insert Fail!";
            }
        }
    }
require_once 'auth/signup.view.php';