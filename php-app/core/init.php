<?php

  session_start();

  $GLOBALS['config'] = array(
    'mysql' => array(
      'host' => 'db',
      'username' => 'jochemos',
      'password' => 'Password123#@!',
      'db' => 'php_db'
    ),
    'remember' => array(
      'cookie_name' => 'hash',
      'cookie_expiry' => 604800
    ),
    'session' => array(
      'session_name' => 'user',
    )
  );


?>
