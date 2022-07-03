<?php

  echo "This is forum page";

  if(isset($_COOKIE['user'])){
?>

<h1> Hello user ! </h2><a href="http://localhost:8000/index.php">Logout</a>

<?php

}

?>
