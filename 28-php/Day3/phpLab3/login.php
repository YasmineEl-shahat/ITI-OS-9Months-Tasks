<?php

echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo "<div class='container fs-5' >  ";


$email = $_POST["email"];
$password = $_POST["password"];

$users = file('users.txt');

foreach ($users as $index=>$user){
    $user_info= explode(':', $user);
    if ($user_info[2] == $email && $user_info[3] == $password){
        session_start();
        $_SESSION["username"]=$email;
        header("Location:homepage.php");
        break;
    }
}



# validate data 
$error = "invalid username or password";
$error=json_encode($error);
$redirect_url = "Location:login-form.php?error={$error}";
header($redirect_url);