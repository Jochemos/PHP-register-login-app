<?php
  require_once 'classes/Cookies.php';
  require_once 'classes/DB.php';
  require_once 'classes/Input.php';
  require_once 'classes/Validation.php';
  require_once 'classes/Blog.php';

  if(isset($_COOKIE['user'])){

    $blogRepository = new Blog();
    $data = $blogRepository->getPosts();
?>

<a href="http://localhost:8000/index.php">Logout</a>
<h3> This is your blog ! </h3>

<?php

  $increment = 1;

  foreach($data as $val){

    echo "Post nr. {$increment}";
    echo '<p><a href="http://localhost:8000/blog-delete.php">Delete</a>
             <a href="http://localhost:8000/blog-update.php">Update</a>
    </p>';

    echo "<h4>" . $val['title'] . "</h4>" . " <h5>" . $val['body'] . "</h5><h6>" . $val['date_created'] . "</h6><br>";

    $increment++;

  }

  if(Input::exist()) {

    $validation = new Validation();

    $inputPost = array(
      "title" => $_POST['title'],
      "body" => $_POST['body']
    );

    $validation->checkPost($inputPost);

    if($validation->passed()){


      try {

        $add = $blogRepository->addPost($inputPost);

        ?><script> window.location.replace("http://localhost:8000/blog.php") </script>;<?php

      }catch(Exception $e) {

        echo "Something went wrong. Try again...";

      }

    }
  }
?>
  <form action="" method="post">

    <h3>
    <label for="post">add new post:</label>
    </h3>

    <label for="title">Title</label>
    <br>
    <input type="text" name="title" id="title">
    <br>
    <br>
    <label for="post">What's new?</label>
    <br>
    <textarea name="body">Enter your text</textarea>
    <br>
    <br>
    <input type="submit" value="add">

  </form>

<?php



}else{

?>

<p>There is your blog. Go to <a href="http://localhost:8000/login.php">login</a> for browse. If you don't have an account <a href="http://localhost:8000/register.php">register</a> now!</p>

<?php

}

?>
