<?php

  require_once 'classes/Validation.php';
  require_once 'classes/User.php';
  require_once 'classes/Input.php';
  require_once 'classes/DB.php';
  require_once 'classes/Redirect.php';

  if(Input::exist()){

    $validation = new Validation();

    $validation->checkRegistration(array(
      "username" => $_POST['username'],
      "password" => $_POST['password'],
      "password_again" => $_POST['password_again'],
      "name" => $_POST['name']
    ));

    if($validation->passed() === true){

      try {

        $user = new User();

        $user->createUser(array(
          "username" => $_POST['username'],
          "password" => $_POST['password'],
          "name" => $_POST['name']
        ));

        if($user){
          Redirect::go("login");
        }

      }catch(Exception $e) {
        echo "Something went wrong.";
      }

    }
  }

?>

<form action="" method="post">
  <div class="field">
    <label for="username">Username</label>
    <input type="text" name="username" id="username" value="" autocomplete="off">
  </div>

  <div class="field">
    <label for="password">Choose a password</label>
    <input type="password" name="password" id="password">
  </div>

  <div class="field">
    <label for="password">Enter your password again</label>
    <input type="password" name="password_again" id="password_again">
  </div>

  <div class="field">
    <label for="name">Enter your name</label>
    <input type="text" name="name" id="name">
  </div>

  <input type="submit" value="Register">
</form>
