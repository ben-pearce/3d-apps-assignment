<?php

class Model {

  /**
   * Instance of PDO object which is used to execute
   * statements against the SQLite datastore.
   */
  public $db;

  public function __construct() {
    $dsn = 'sqlite:./application/storage/database.sqlite';

    try {
      $this->db = new PDO($dsn, 'user', 'password', array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false
      ));
    } catch(PDOException $e) {
      echo "Failed to connect to database";
      print new Exception($e->getMessage());
    }
  }

  /**
   * Iterates each install script and executes 
   * inside the datastore.
   */
  public function install() {
    try {
      $scripts = [
        'install.sql',
        'main_brand.sql', 
        'main_image.sql', 
        'main_model.sql', 
        'main_strings.sql'];
      foreach($scripts as $script) {
        $path = "./application/storage/$script";
        $f = fopen($path, 'r');
        $stmt = fread($f, filesize($path));
        $this->db->exec($stmt);
        fclose($f);
      }
    } catch(PDOException $e) {
      print new Exception($e->getMessage());
    }
  }

}

?>