<?php

  require_once 'classes/User.php';
  require_once 'classes/Input.php';
  //require_once 'classes/DB.php';
  //require_once 'classes/Redirect.php';

  if(Input::exist()) {

    $users = new User();

    $users->findUser(array(
      "username" => $_POST["username"],
      "password" => $_POST["password"]
    ));


  }


?>


<form action="" method="post">
  <div class="field">
    <label for="username">Username</label>
    <input type="text" name="username" id="username" value="" autocomplete="off">
  </div>

  <div class="field">
    <label for="password">Password</label>
    <input type="password" name="password" id="password">
  </div>

  <input type="submit" value="Login">
</form>
