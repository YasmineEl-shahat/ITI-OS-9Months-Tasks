<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    # validate data 
    $errors = [];
    $formvalues = [];
    foreach ($_POST as $k=>$value){
        if(!isset($k) or empty($value))
            $errors[$k] = $k." is required";
        else $formvalues[$k] = $value;    
    }
    $profile_name = $_FILES['profile-pic']['name'];
    $profile_tmp = $_FILES['profile-pic']['tmp_name'];
    $extension = explode('.',basename($profile_name));
    $allowed_extenstions=["png", 'jpg', 'jpeg'];
    if($profile_name == "")  $errors["profile-pic"] = "profile picture is required";
    if(!in_array(end($extension), $allowed_extenstions))  
    $errors["profile-pic"] = "invalid image";
    $mail_pattern = "/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix";
    $pass_pattern = "/^(?=.*\d)(?=.*[a-z])[0-9a-z]{8}$/";
    // if(!preg_match($mail_pattern, $_POST["email"])) $errors["email"] = "invalid mail";
    if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) $errors["email"] = "invalid mail format";
    if(!preg_match($pass_pattern, $_POST["password"])) 
        $errors["password"] = "password should be only 8 chars, nums";
    if($_POST["password"] !== $_POST["confirm-password"])
        $errors["confirm-password"] = "passwords should match";
    $formerrors=json_encode($errors);
    // redirect to add form with errors
    if($errors){
        $redirect_url = "Location:add-userForm.php?errors={$formerrors}";
        if ($formvalues){
            $oldvalues = json_encode($formvalues);
            $redirect_url .="&old={$oldvalues}";
        }
        header($redirect_url);
    }
    else {
        // uploading image
        sys_get_temp_dir();
        move_uploaded_file($profile_tmp,"images/{$profile_name}");
       

        // preparing data to be saved into users file
        $date = date_create();
        $id = date_timestamp_get($date);
        $user_info = "{$id}";

        foreach ($_POST as $k=>$value){
            $user_info.=":".$value;    
        }
        $imagespath = "images/{$profile_name}";
        $user_info.=":".$imagespath;
        ## save the data to file
        try {
            $filehandler = fopen("users.txt", 'a');
            fwrite($filehandler, $user_info.PHP_EOL);
            fclose($filehandler);
            header("Location:login-form.php");
            
        } catch (Exception $e) {
            var_dump($e);
        }
    }
?>