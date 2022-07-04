<?php
  require_once 'classes/Cookies.php';


  if(isset($_COOKIE['user'])){
?>

<a href="http://localhost:8000/index.php" onclick="logout()">Logout</a>
<h3> This is your blog ! </h3>
<?php

}else{

?>

<p>There is your blog. Go to <a href="http://localhost:8000/login.php">login</a> for browse. If you don't have an account <a href="http://localhost:8000/register.php">register</a> now!</p>

<?php

}

?>
