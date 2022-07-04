<?php

  class Cookie {

    public $userId = null;

    public static function new(string $cookie_name, string $identify, int $expire): void {
      $prefix = '%' . $identify . '%s\r\n';
      $unique = uniqid($prefix, true);
      setcookie($cookie_name, $unique, time() + $expire);
    }

    public static function delete(string $cookie_name): void {
      setcookie($cookie_name, '', time() - 1);
    }

    private function tearOutId(): void {
      $extractCookie =  explode('%', $_COOKIE['user']);
      $this->userId = $extractCookie[1];
    }

    public function getId(): string {
      $this->tearOutId();
      return $this->userId;
    }

  }



?>
