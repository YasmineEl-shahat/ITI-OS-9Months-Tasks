<?php

    echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>';

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    echo "<div class='container' >  ";


    # validate data
    $errors = [];
    $formvalues = [];
    foreach ($_POST as $k=>$value){
        if(!isset($k) or empty($value))
            $errors[$k] = $k." is required";
        else $formvalues[$k] = $value;    
    }
    if (!isset($_POST["gender"])) $errors["gender"] = "gender is required";

    $formerrors=json_encode($errors);
    if($errors){
        $redirect_url = "Location:register-form.php?errors={$formerrors}";
        if ($formvalues){
            $oldvalues = json_encode($formvalues);
            $redirect_url .="&old={$oldvalues}";
        }
        header($redirect_url);
    }
    else{
        $date = date_create();
        $id = date_timestamp_get($date);
        $user_info = "{$id}";

        foreach ($_POST as $k=>$value){
            $user_info.=":";
            if($k == "skills"){
                foreach($value as $skill)
                    $user_info.=$skill.=" ";
            }
            else $user_info.=$value;    
        }
       ## save the data to file
       try {
            $filehandler = fopen("users.txt", 'a');
            fwrite($filehandler, $user_info.PHP_EOL);
            fclose($filehandler);
            ############################read file content ###############################
            $keys = json_encode($_POST);
            header("Location:user-table.php?keys={$keys}");
            
       } catch (Exception $e) {
            var_dump($e);
        }
    }

   