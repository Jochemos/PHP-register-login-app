<?php

  require_once 'core/init.php';

  class Validation {
    private $_passed = false;
    public $_errors = array();
    private $_db = null;
    private $_data = null;

    private function getDBInstance() {
      $this->_db = DB::getInstance();
    }

    public function check($data) {

      $this->getDBInstance();
      $this->_data = $data;

      $this->checkRequire();
      $this->checkAvailable();
      $this->checkLength();
      $this->checkPassword();

    }

    public function passed() {

      if(!empty($this->_errors)){
        echo implode("", $this->_errors);
      }else{
        return true;
      }

    }

    private function checkRequire() {

      $data = $this->_data;

      $keys = array_keys($data);
      $increment = 0;

      foreach($data as $val){

        $position = $keys[$increment];

        if(empty($data["{$position}"])){
          array_push($this->_errors, "{$position} required! <br>");
          $this->_passed = false;
        }

        $increment++;

      }
    }

    private function checkLength() {

      $data = $this->_data;

      $keys = array_keys($data);
      $increment = 0;


      $dataLength = array(
        "username" => [4, 15],
        "password" => [5, 30],
        "password_again" => [5, 20],
        "name" => [2, 30]
      );

      foreach($dataLength as $len){

        $dataInput = $data["{$keys[$increment]}"];

        if(strlen($dataInput) < $len[0]){
          $error = "length of {$keys[$increment]} must be greater than {$len[0]} <br>";
          array_push($this->_errors, $error);
        }

        if(!strlen($dataInput) > $len[1]){
          $error = "length of {$keys[$increment]} must be less than {$len[1]} <br>";
          array_push($this->_errors, $error);
        }

        $increment++;

      }

    }

    private function checkAvailable() {

      $data = $this->_data;

      $check = $this->_db->getData("username", "users", array("username", "=", "'{$data["username"]}'"));

      if($check){
        $error = "username already exist";
        array_push($this->_errors, $error);
      }else{
        $this->_passed = true;
      }
    }

    private function checkPassword() {

      $data = $this->_data;

      if($data["password"] !== $data["password_again"]){
        $this->_passed = false;
        array_push($this->_errors, "Password must be equal <br>");
      }else{
        $this->_passed = true;
      }

    }


  }


?>
