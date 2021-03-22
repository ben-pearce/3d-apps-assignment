<?php

class Model {

  public $dbhandle;

  public function __construct() {
    $dsn = 'sqlite:./application/storage/database.db';

    try {
      $this->dbhandle = new PDO($dsn, 'user', 'password', array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false
      ));
    } catch(PDOException $e) {
      echo "Failed to connect to database";
      print new Exception($e->getMessage());
    }
  }

}

?>