<?php

  require_once 'classes/Cookies.php';

  Cookie::delete('user');

?>
<div class="main-all">
  <div class="description">
    <h3>Welcome on my website !<h3>
    <h4> I am Daniel and this time I prepared backend side register / login page with PHP</h4>
  </div>

  <div class="elephant">
    <pre>
      _    _
     / \__/ \_____
    /  /  \  \    `\
    )  \''/  (     |\
    `\__)/__/'_\  / `
      //_|_|~|_|_|
      ^""'"' ""'"'
    </pre>
    <h5> BIG STEP with OOP </h5>
  </div>

  <div class="redirecting">
    <p>Go to <a href="http://localhost:8000/login.php">login</a>.
       You don't have an account? <a href="http://localhost:8000/register.php">Register</a> now!</p>
  </div>
</div>

<link rel="stylesheet" href="styles/index.css">
