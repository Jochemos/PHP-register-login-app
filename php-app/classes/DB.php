<?php

  require_once 'core/init.php';
  require_once 'classes/Config.php';

  class DB {

    private static $_instance = null;
    private $_pdo;
    private $_result;

    private function __construct() {
      try {
        $this->_pdo = new PDO('mysql:host=' . Config::get('mysql/host') . ';dbname=' . Config::get('mysql/db'), Config::get('mysql/username'), Config::get('mysql/password'));
      } catch(PDOException $e) {
          die($e->getMessage());
      }
    }

    public static function getInstance() {
      if(!isset(self::$_instance)){
        self::$_instance = new DB();
      }
      return self::$_instance;
    }

    public function getData(string $column, string $table, array $detail = null): array {
      $sql = "SELECT {$column} FROM {$table}";

      if($detail != null){
        $detail = implode(" ", $detail);
        $sql = $sql . " WHERE " . $detail;
      }

      $giveOrder = $this->_pdo->prepare($sql);
      $giveOrder->execute();

      return $giveOrder->fetchAll();

    }

    public function deleteData(string $id): array {

      $sql = "DELETE FROM posts WHERE id = ?";

      $giveOrder = $this->_pdo->prepare($sql);
      $giveOrder->execute([$id]);
    }

    public function addData(string $table, array $data): bool{

      $indexKeys = implode(', ', array_keys($data));

      $indexValues = array_keys($data);

      $increment = 0;
      $amountValues = array();
      $executePath = array();

      foreach($indexValues as $val){
        $increment++;
        $amountValues[$increment] = "?";
      };

      $amountValues = implode(", ", $amountValues);

      $sql = "INSERT INTO {$table}(" . "{$indexKeys}" . ") VALUES (" . "{$amountValues}" . ")";

      if($giveOrder = $this->_pdo->prepare($sql)){
        $increment = 0;
        $values = array_values($data);

        foreach($values as $val){
          $giveOrder->bindParam($increment+1, $values[$increment]);
          $increment++;
        };

        $giveOrder->execute();

        return true;

      }else{

        return false;

      }
    }

    public function updateData(string $table, array $newData, string $id): bool {

      $dataKeys = array_keys($newData);

      $queryData = array();

      foreach($dataKeys as $key){
        array_push($queryData, $key . " = ?");
      };

      $queryData = implode(', ', $queryData);

      $sql = "UPDATE {$table} SET {$queryData} WHERE id = {$id}";

      if($giveOrder = $this->_pdo->prepare($sql)) {

        $dataValues = array_values($newData);

        $increment = 0;

        foreach($dataValues as $val){
          $giveOrder->bindParam($increment+1, $dataValues[$increment]);
          $increment++;
        }

        $giveOrder->execute();

        return true;

      }else{

        return false;

      }

    }


  }


?>
