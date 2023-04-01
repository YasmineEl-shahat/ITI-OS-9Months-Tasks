<?php
 echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>';

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
   
    include 'connection/connect_to_db.php';

    echo "<div class='container' >  ";

    echo 
    "<table class='table'>
      <tr><th>id</th>
          <th>name</th>
          <th>email</th>
          <th>room no.</th> 
          <th>Image</th>
      </tr>";


    // connect to database and select all users
    $db = connect_pdo();
    $query = 'select * from `phplab4`.`users`;';
    $stmt = $db->prepare($query);

    $res = $stmt->execute();
   
    $users = $stmt->fetchAll(PDO::FETCH_OBJ);
    
    // free result set
    $stmt->closeCursor();
      
    foreach ($users as $user) {
      $image = 'profile-pic';
      $image = $user->$image;
      
        echo "<tr><td>{$user->id}</td>
                  <td>{$user->name}</td>
                  <td>{$user->email}</td>
                  <td>{$user->room}</td>
                  <td><img src={$image} width='50px' height='50px' alt='image'></td>";
   
        $edit_url="edit-form.php?id={$user->id}";
        echo "<td> <a href='"."{$edit_url}". "' class='btn btn-info'> Edit</a> </td>";
        
        $delete_url="delete-user.php?id={$user->id}";
        echo "<td> <a href='"."{$delete_url}". "' class='btn btn-danger'> Delete</a> </td>";
        
        echo "</tr>";
    }
?>