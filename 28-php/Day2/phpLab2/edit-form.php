<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    if($_GET){ 
        $id = $_GET['id'];
        $users = file('users.txt');
        $keys = $_GET['keys'];
        $edit_url="edit-user.php?id={$id}&keys={$keys}";
        foreach ($users as $user){
            $user_info= explode(':', $user);
            if ($user_info[0] == $id){
                $oldValues = $user_info;
                break;
            }
        }
        if(array_key_exists("errors", $_GET))
        {
            $errors = json_decode($_GET['errors']);
            $errors = (array) $errors;
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lab1</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
  </head>
  <body>
    <div class="container">
      <form method="post" action="<?php echo $edit_url; ?>">
        <div class="mb-3" hidden>
          <label class="form-label" >id</label>
          <input type="text" name="id" class="form-control" value="<?php echo $id ?>" disabled  />
        </div>
        <div class="mb-3">
          <label class="form-label">First Name</label>
          <input type="text" name="fname" class="form-control" value="<?php echo $oldValues[1] ?>"/>
           <div class="text-danger"> <?php  if(isset($errors['fname']))  echo $errors['fname']; ?></div>
        </div>
        <div class="mb-3">
          <label class="form-label">Last Name</label>
          <input type="text" name="lname" class="form-control" value="<?php echo $oldValues[2] ?>" />
          <div class="text-danger"> <?php  if(isset($errors['lname']))  echo $errors['lname']; ?></div>
        </div>
        <div class="mb-3">
          <label class="form-label">Address </label>
          <textarea name="address" class="form-control"><?php echo $oldValues[3] ?></textarea>
           <div class="text-danger"> <?php  if(isset($errors['address']))  echo $errors['address']; ?></div>
        </div>
        <div class="mb-3">
          <label class="form-label">Country </label>
          <select name="country" class="form-control">
            <option value="" disabled>select country</option>
            <option <?= $oldValues[4] == 'Egypt' ? ' selected="selected"' : '';?> value="Egypt">Egypt</option>
            <option <?= $oldValues[4] == 'London' ? ' selected="selected"' : '';?> value="London">London</option>
            <option <?= $oldValues[4] == 'USA' ? ' selected="selected"' : '';?> value="USA">USA</option>
          </select>
           <div class="text-danger"> <?php  if(isset($errors['country']))  echo $errors['country']; ?></div>
        </div>

        <label class="form-label">Gender: </label>
        <div class="mb-3 form-check-inline">
          <input
            type="radio"
            name="gender"
            value="male"
            class="form-check-input"
            id="male"
            <?php if($oldValues[5] == "male"): ?>
               checked="checked"
            <?php endif ?>
          />

          <label class="form-check-label" for="male">male</label>
        </div>
        <div class="mb-3 form-check-inline">
          <input
            type="radio"
            name="gender"
            value="female"
            class="form-check-input"
            id="female"
            <?php if($oldValues[5] == "female"): ?>
               checked="checked"
            <?php endif ?>
          />
          <label class="form-check-label" for="female">female</label>
        </div>
        <br />
        <div class="text-danger"> <?php  if(isset($errors['gender']))  echo $errors['gender']; ?></div>
        <br />
        <label class="form-label">Skills:</label>
        <br />
        <div class="mb-3 form-check-inline">
          <input
            type="checkbox"
            name="skills[]"
            value="php"
            class="form-check-input"
            id="php"
            <?php if(strpos($oldValues[6], "php") !== false): ?>
               checked="checked"
            <?php endif ?>
          />
          <label class="form-check-label" for="php">php</label>
        </div>
        <div class="mb-3 form-check-inline">
          <input
            type="checkbox"
            name="skills[]"
            value="mysql"
            class="form-check-input"
            id="mysql"
            <?php if(strpos($oldValues[6], "mysql") !== false): ?>
               checked="checked"
            <?php endif ?>
          />
          <label class="form-check-label" for="mysql">mysql</label>
        </div>
        <div class="mb-3 form-check-inline">
          <input
            type="checkbox"
            name="skills[]"
            value="postgreesql"
            class="form-check-input"
            id="postgreesql"
             <?php if(strpos($oldValues[6], "postgreesql") !== false): ?>
               checked="checked"
            <?php endif ?>
          />
          <label class="form-check-label" for="postgreesql">postgreesql</label>
        </div>
        <div class="mb-3">
          <label class="form-label">username</label>
          <input type="text" name="username" class="form-control" value="<?php echo $oldValues[7] ?>" />
           <div class="text-danger"> <?php  if(isset($errors['username']))  echo $errors['username']; ?></div>
        </div>
        <div class="mb-3">
          <label class="form-label">password</label>
          <input type="password" name="password" class="form-control" value="<?php echo $oldValues[8] ?>" />
           <div class="text-danger"> <?php  if(isset($errors['password']))  echo $errors['password']; ?></div>
        </div>
        <div class="mb-3">
          <label class="form-label">department </label>
          <select name="department" class="form-control">
            <option value="" disabled>select department</option>
            <option <?= strpos($oldValues[9], "os") !== false ? ' selected="selected"' : '';?> value="os">os</option>
            <option <?= strpos($oldValues[9], "pd") !== false ? ' selected="selected"' : '';?> value="pd">pd</option>
            <option <?= strpos($oldValues[9], "ai") !== false ? ' selected="selected"' : '';?> value="ai">ai</option>
          </select>
           <div class="text-danger"> <?php  if(isset($errors['department']))  echo $errors['department']; ?></div>
        </div>
        <button type="submit" class="btn btn-primary">submit</button>
        <button type="reset" class="btn btn-danger">reset</button>
      </form>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
