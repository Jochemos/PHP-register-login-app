<?php

  class Cookie {

    public static function new(string $cookie_name, int $expire): void {
      $unique = uniqid('%s\r\n', true);
      setcookie($cookie_name, $unique, time() + $expire);
    }

    public static function delete(string $cookie_name): void {
      setcookie($cookie_name, '', time() - 1);
    }

  }



?>
