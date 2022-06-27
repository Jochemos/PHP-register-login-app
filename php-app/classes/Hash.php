<?php

  class Hash {
    private $_password = null;
    public $_hashed_password = null;

    public function __construct($password){
      $this_password = $password;
    }

    private function hashing() {

      $this->_hashed_password = password_hash($this->_password, PASSWORD_DEFAULT);

    }

    public function getHashPassword() {

      self::hashing();

      if($this->_hashed_password){
        return $this->_hashed_password;
      }

    }

  }


?>
