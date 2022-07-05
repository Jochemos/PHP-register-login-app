<?php

  require_once 'classes/Blog.php';

  $blogRepository = new Blog();

  $blogRepository->deletePost($_REQUEST['id']);

?>

<h3> Post was deleted ! <h3>
<h2> <a href="http://localhost:8000/blog.php">EXIT<a> </h2>
