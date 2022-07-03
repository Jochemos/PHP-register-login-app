<?php

  require_once 'classes/User.php';
  require_once 'classes/Input.php';
  require_once 'classes/Redirect.php';
  require_once 'classes/Cookies.php';

/*  if(isset($_COOKIE['user'])){
    Redirect::go("blog");
  }
*/
  if(Input::exist()) {


    $users = new User();

    $user_input = array(
      "username" => $_POST["username"],
      "password" => $_POST["password"]
    );

    $findUser = $users->findUser($user_input);

    if($findUser === true){
      Cookie::new("user", 3600);
      Redirect::go("blog");
    }

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
