<?php

  require_once 'core/init.php';
  require_once 'classes/Hash.php';

  class User {

    private $_data = null;
    private $_hash_password = null;
    private $_db = null;

    public function __construct() {
      $this->_db = DB::getInstance();
    }

    public function createUser($data) {

      $this->_data = $data;

      $hash = new Hash($data["password"]);
      $this->_hash_password = $hash->getHashPassword();

      $this->_db->addData("users", array(
        "username" => $this->_data["username"],
        "password" => $this->_hash_password,
        "name" => $this->_data["name"]
      ));

    }

  }


?>
