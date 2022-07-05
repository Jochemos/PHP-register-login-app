<?php

  require_once 'classes/Blog.php';
  require_once 'classes/Input.php';
  require_once 'classes/Validation.php';

  $blogRepository = new Blog();
  $currentState = $blogRepository->getCurrentPost($_REQUEST['id']);

  if(Input::exist()){

    $validation = new Validation();

    $postData = array(
      "title" => $_POST['title'],
      "body" => $_POST['body']
    );

    $validation->checkPost($postData);

    if($validation->passed()){

      try{

        $blogRepository->updatePost($postData, $_REQUEST['id']);
        $currentState['title'] = $_POST['title'];
        $currentState['body'] = $_POST['body'];

        echo "Data update successfully !" . ' <a href="http://localhost:8000/blog.php">Back</a> to blog.'; 

      }catch(Exception $e) {

        echo "Something went wrong. Try again...";

      }

    }

  }


?>

<form action="" method="post">

  <h3>
  <label for="post">edit post nr <?php echo $_REQUEST['post'] ?></label>
  </h3>

  <label for="title">Title</label>
  <br>
  <input type="text" name="title" value="<?php echo $currentState["title"] ?>">
  <br>
  <br>
  <label for="post">Body of your thought</label>
  <br>
  <textarea name="body"><?php echo $currentState["body"] ?></textarea>
  <br>
  <br>
  <input type="submit" value="add">

</form>
