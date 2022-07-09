<?php

  require_once 'classes/Validation.php';

  use PHPUnit\Framework\TestCase;


  class getInstanceReflect {

    private static $_instance = null;

    private function __construct() {
      self::$_instance = new getReflect();
      return self::$_instance;
    }

    public static function setMethod($method) {
      $getMethod = new ReflectionMethod('Validation', $method);
      return $getMethod;
    }

    public static function getResultBy($method, $args) {
      $invokeArgs = self::setMethod($method)->invokeArgs(new Validation(), array($args));
      return $invokeArgs;
    }

  }


  final class ValidationTest extends TestCase {


    public function testRequireValues() {

      $data = array(
        "username" => '',
        "password" => '',
        "password_again" => '',
        "name" => ''
      );

      $result = getInstanceReflect::getResultBy('checkRequire', $data);

      $expect = array(
        0 => 'username required! <br>',
        1 => 'password required! <br>',
        2 => 'password_again required! <br>',
        3 => 'name required! <br>'
      );

      $this->assertEquals($expect, $result);

    }

    public function testLengthOfValues() {

      $data = array(
        0 => 'length of username must be greatest than 4 <br>',
        1 => 'length of password must be greatest than 5 <br>',
        2 => 'length of password_again must be greatest than 5 <br>',
        3 => 'length of name must be greateatest than 2 <br>'

      );

      $result = getInstanceReflect::getResultBy('checkLength', $data);

      $expect = array();

      $this->assertEquals($expect, $result);

    }


  }


?>
