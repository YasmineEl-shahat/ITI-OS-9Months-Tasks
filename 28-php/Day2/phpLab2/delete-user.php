<?php

echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if($_GET){ 
    $keys = $_GET['keys'];
}

$user_id = $_GET['id'];

$users = file('users.txt');

foreach ($users as $index=>$user){
    $user_info= explode(':', $user);
    if ($user_info[0] == $user_id){
        unset($users[$index]);
        break;
    }
}

var_dump($users);

$filehandler = fopen("users.txt", 'w');

foreach ($users as $user){
    fwrite($filehandler, $user);
}

fclose($filehandler);

readfile('users.txt');


header("Location:user-table.php?keys={$keys}");