<?php
  require_once 'classes/Cookies.php';
  require_once 'classes/DB.php';
  require_once 'classes/Input.php';
  require_once 'classes/Validation.php';
  require_once 'classes/Blog.php';

  if(isset($_COOKIE['user'])){

    $blogRepository = new Blog();
    $data = $blogRepository->getPosts();


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

  <a href="http://localhost:8000/index.php">Logout</a>
  <h3> This is your blog ! </h3>

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

  <div class="table-main">
    <table class="table">
      <tbody>
        <?php

          $increment = 1;

          foreach($data as $val){

        ?>
        <tr>
          <td><p><?php echo "Post nr. " . $increment++; ?></p></td>
        </tr>
        <tr>
          <td><h3><?php echo $val['title']; ?></h3></td>
        </tr>
        <tr>
          <td><h4><?php echo $val['body']; ?><h4></td>
        </tr>
        <tr>
          <td><h5><?php echo $val['date_created']; ?><h5></td>
        </tr>
        <tr>
            <td><a href="blog-update.php?id=<?php echo $val['id']; ?>" class="edit">Edit</a></td>
            <td><a href="blog-delete.php?id=<?php echo $val['id']; ?>" class="delete">Delete</a></td>
        </tr>
        <?php

          }
        ?>
      </tbody>
    </table>
  </div>


<?php



}else{

?>

  <p>There is your blog. Go to <a href="http://localhost:8000/login.php">login</a> for browse. </p>
  <p>If you don't have an account <a href="http://localhost:8000/register.php">register</a> now!</p>

<?php

}

?>
