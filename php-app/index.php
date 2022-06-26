<?php

  require_once 'core/init.php';

  // get data from db
  echo DB::getInstance()->getData("*", "posts", array("id", ">", 0));

  // delete data from db
  echo DB::getInstance()->deleteData(9);

  // add data to db
  echo DB::getInstance()->addData("posts", array(
    "title" => "Animals food",
    "body" => "Cat like sausages, but Dogs too",
    "author" => "AnimalPlanet_345"
  ));

  // update data from db by id
  echo DB::getInstance()->updateData("posts", array(
    "title" => "Planets",
    "body" => "New planet is Pluton.. again!",
    "author" => "AnimalPlanet_345"
  ), "10");




?>
