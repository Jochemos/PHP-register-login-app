<?php

  require_once 'core/init.php';
  require_once 'classes/ValidatePassword.php';

  if(Input::exist()){

    $validate = new Validate();

    echo $validate->check(array(
      "username" => $_POST['username'],
      "password" => $_POST['password'],
      "password_again" => $_POST['password_again'],
      "name" => $_POST['name']
    ));
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
