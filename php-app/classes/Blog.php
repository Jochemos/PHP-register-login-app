<?php

  require_once 'classes/DB.php';
  require_once 'classes/Cookies.php';


  class Blog {

    private $_db = null;

    public function __construct(){
      $this->_db = DB::getInstance();
    }

    public function getPosts() {

      $user = new Cookie();
      $data = $this->_db->getData("*", "blog", array("user_id", "=", $user->getId()));
      return $data;

    }

    public function addPost($data) {

      $user = new Cookie();
      $user->getId();

      $this->_db->addData("blog", array(
        "user_id" => $user->getId(),
        "title" => $data["title"],
        "body" => $data["body"]
      ));

    }

    public function deletePost() {
      
    }


  }


?>
