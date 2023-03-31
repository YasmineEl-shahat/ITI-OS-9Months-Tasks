<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    include 'connection/connect_to_db.php';
    include 'validation/validation.php';
    
    // call validation and extract needed data
    $validations = validate();
    $formerrors = $validations["errors"];
    $oldvalues = $validations["formvalues"];
    $profile_name = $validations["profile_name"];
    $profile_tmp = $validations["profile_tmp"];
    
    
    // redirect to add form with errors and old data
    if($formerrors !== "[]"){
       
        $redirect_url = "Location:add-userForm.php?errors={$formerrors}";
        if ($oldvalues !== "[]"){
            $oldvalues = json_encode($oldvalues);
            $redirect_url .="&old={$oldvalues}";
        }
        header($redirect_url);
    }
    else {
        // uploading image
        sys_get_temp_dir();
        move_uploaded_file($profile_tmp,"images/{$profile_name}");
        $imagespath = "images/{$profile_name}";

        // save data 
        try {
            // connect to database 
            $db = connect_pdo();
            $insert_query =  "insert into phplab4.users(name, email, password,room, `profile-pic`) 
            values (?,?,?,?,?)";
            $inst_stmt = $db->prepare($insert_query);
            $res=$inst_stmt->execute([$_POST['name'], $_POST['email'], $_POST['password'],
                                      $_POST['room'], $imagespath]);
            header("Location:users-table.php");
        } catch (Exception $e) {
            var_dump( $inst_stmt->errorInfo());
            var_dump($e);
        }
    }
?>