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
        $id = $_GET['id'];
        $redirect_url = "Location:edit-form.php?id={$id}&errors={$formerrors}";
        if ($oldvalues !== "[]"){
            $oldvalues = json_encode($oldvalues);
            $redirect_url .="&old={$oldvalues}";
        }
        header($redirect_url);
    }
    else {
        // uploading image
        if($profile_name != ""){
            $imagespath = $_GET["imgPath"];
            unlink($imagespath);
            sys_get_temp_dir();
            move_uploaded_file($profile_tmp,"images/{$profile_name}");
            $imagespath = "images/{$profile_name}";
        }

        // update data 
        try {
            // connect to database 
            $db = connect_pdo();
            $id = $_GET['id'];
            $query= "update phplab4.users set name=:name, email=:email, password=:password,
            room=:room  WHERE id=:id ";
            if($imagespath)
                $query= "update phplab4.users set name=:name, email=:email, password=:password,
                room=:room, `profile-pic`=:imagespath WHERE id=:id ";
           
            $stmt = $db->prepare($query);

            if(!$imagespath)
                $stmt->execute(['name'=>$_POST['name'], 'email'=>$_POST['email'], 
                                    'password'=>$_POST['password'],'room'=>$_POST['room'], 'id'=>$id]);
            else 
                $stmt->execute(['name'=>$_POST['name'], 'email'=>$_POST['email'], 
                                    'password'=>$_POST['password'],'room'=>$_POST['room'],
                                    'imagespath'=>$imagespath,'id'=>$id]);

           
            header("Location:users-table.php");
        } catch (Exception $e) {
            var_dump( $stmt->errorInfo());
            var_dump($e);
        }
    }

?>