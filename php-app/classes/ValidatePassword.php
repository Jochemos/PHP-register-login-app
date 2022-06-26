<?php

  class Validate {
    private $_passed = false;
    public $_errors = array();
    private $_db = null;

    public function __constructor(){
      $this->_db = DB::getInstance();
    }

    public function check($data){

      $keys = array_keys($data);
      $increment = 0;

      $dataLength = array(
        "username" => [4, 15],
        "password" => [5, 20],
        "password_again" => [5, 20],
        "name" => [2, 15]
      );

      foreach($data as $val){

        $position = $keys[$increment];

        if(empty($data["{$position}"])){
          array_push($this->_errors, "{$position} required! <br>");
          $this->_passed = false;
        }

        $increment++;

      }

      $increment = 0;


      foreach($dataLength as $len){

        $v = $data["{$keys[$increment]}"];

        if(strlen($v) < $len[0]){
          $error = "length of {$keys[$increment]} must be greater than {$len[0]} <br>";
          array_push($this->_errors, $error);
        }

        if(!strlen($v) > $len[1]){
          $error = "length of {$keys[$increment]} must be less than {$len[1]} <br>";
          array_push($this->_errors, $error);
        }

        $increment++;

      }

      if($data["password"] !== $data["password_again"]){
        $this->_passed = false;
        array_push($this->_errors, "Password must be equal <br>");
      }else{
        $this->_passed = true;
      }


      if($this->_errors){
        echo implode("", $this->_errors);
      }else{
        echo $this->_passed;
      }

    }


  }


?>
