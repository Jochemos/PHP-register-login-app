<?php

  class Cookie {

    public static function new(string $cookie_name, string $identify, int $expire): void {
      $prefix = '%' . $identify . '%s\r\n';
      $unique = uniqid($prefix, true);
      setcookie($cookie_name, $unique, time() + $expire);
    }

    public static function delete(string $cookie_name): void {
      setcookie($cookie_name, '', time() - 1);
    }

  }



?>
