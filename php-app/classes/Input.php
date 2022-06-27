<?php

  class Input {
    public static function exist($type = 'post'){

      return (!empty($_POST)) ? true : false;

    }
  }


?>
