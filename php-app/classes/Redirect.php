<?php

  class Redirect {

    public static function go($location) {

      try {

        header("Location: http://localhost:8000/" . $location . ".php");

      }catch(Exception $e) {

        header("Location: http://localhost:8000/index.php");

      }

    }

  }



?>
