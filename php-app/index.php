<?php

  require_once 'classes/Cookies.php';

  Cookie::delete("user");

?>


<p>Go to <a href="http://localhost:8000/login.php">login</a>. You don't have an account? <a href="http://localhost:8000/register.php">Register</a> now!</p>
