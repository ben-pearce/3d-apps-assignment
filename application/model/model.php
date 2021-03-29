<?php

/**
 * Data model which provides a controller
 * access to the underlying datastore via an API.
 */
class Model {

  /**
   * Instance of PDO object which is used to execute
   * statements against the SQLite datastore.
   */
  public $db;

  /**
   * Model constructor.
   * 
   * Responsible for opening SQLite datastore file and 
   * assigning the PDO instance to this class.
   */
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
        'main_strings.sql',
        'main_texture.sql'];
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

  /**
   * Selects a string from the string table and returns
   * the value.
   */
  public function getString($key) {
    try {
      $stmt = $this->db->prepare('SELECT value FROM strings WHERE key = :key');
      $stmt->execute(['key' => $key]);
      return $stmt->fetch()['value'];
    } catch(PDOException $e) {
      print new Exception($e->getMessage());
    }
  }

  /**
   * Selects strings from the string table based on a prefix
   * supplied via an argument. Prefix means that the string's key
   * must start with the string supplied.
   * 
   * For example.
   *  > getStrings('home')
   * 
   * Will return all strings with a key that begins with home such as
   *  home.title, home.subtitle
   */
  public function getStrings($prefix = '') {
    try {
      $prefix = "$prefix%";
      $stmt = $this->db->prepare('SELECT key, value FROM 
        strings WHERE key LIKE ?');
      $stmt->execute([$prefix]);
      return $stmt->fetchAll(PDO::FETCH_KEY_PAIR);
    } catch(PDOException $e) {
      print new Exception($e->getMessage());
    }
  }

  /**
   * Inserts a new string into the datastore based on key
   * and value passed in as arguments.
   */
  public function createString($key, $value) {
    try {
      $stmt = $this->db->prepare('INSERT OR REPLACE INTO strings (key, value) VALUES (:key, :value)');
      $stmt->execute(['key' => $key, 'value' => $value]);
    } catch(PDOException $e) {
      print new Exception($e->getMessage());
    }
  }

  /**
   * Deletes a string by key.
   */
  public function deleteString($key) {
    try {
      $stmt = $this->db->prepare('DELETE FROM strings WHERE key = :key');
      $stmt->execute(['key' => $key]);
    } catch(PDOException $e) {
      print new Exception($e->getMessage());
    }
  }

  /**
   * Selects a brand from the brand table by ID and returns it.
   */
  public function getBrand($brand) {
    try {
      $stmt = $this->db->prepare('SELECT * FROM brand WHERE id = :brand');
      $stmt->execute(['brand' => $brand]);
      return $stmt->fetch();
    } catch(PDOException $e) {
      print new Exception($e->getMessage());
    }
  }

  /**
   * Selects all brands from the brand table and returns them
   * as an indexed array.
   */
  public function getBrands() {
    try {
      $stmt = $this->db->prepare('SELECT * FROM brand');
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_UNIQUE);
    } catch(PDOException $e) {
      print new Exception($e->getMessage());
    }
  }

  /**
   * Creates a new brand in the datastore.
   */
  public function createBrand($id, $name, $description, $note, $imgPath) {
    try {
      $stmt = $this->db->prepare('INSERT INTO brand 
        (id, long_name, short_name, description, note, img_src_path) 
        VALUES (:id, :name, :name, :description, :note, :imgPath)');
      $stmt->execute([
        'id' => $id, 
        'name' => $name, 
        'description' => $description, 
        'note' => $note, 
        'imgPath' => $imgPath
      ]);
    } catch(PDOException $e) {
      print new Exception($e->getMessage());
    }
  }

  /**
   * Deletes a brand by ID.
   */
  public function deleteBrand($id) {
    try {
      $stmt = $this->db->prepare('DELETE FROM brand WHERE id = :id');
      $stmt->execute(['id' => $id]);
    } catch(PDOException $e) {
      print new Exception($e->getMessage());
    }
  }

  /**
   * Gets a model from the datastore by brand.
   */
  public function getModel($brand) {
    try {
      $stmt = $this->db->prepare('SELECT * FROM model WHERE brand = :brand');
      $stmt->execute(['brand' => $brand]);
      return $stmt->fetch();
    } catch(PDOException $e) {
      print new Exception($e->getMessage());
    }
  }

  /**
   * Selects all models from the datastore.
   */
  public function getModels() {
    try {
      $stmt = $this->db->prepare('SELECT * FROM model');
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_UNIQUE);
    } catch(PDOException $e) {
      print new Exception($e->getMessage());
    }
  }

  /**
   * Creates a new model in the data store.
   */
  public function createModel(
    $brand, 
    $title, 
    $subtitle, 
    $description, 
    $creationMethod, 
    $modelPath, 
    $modelTitle, 
    $pageUrl) {
    try {
      $stmt = $this->db->prepare('INSERT INTO model 
        (brand, title, subtitle, description, 
        creation_method, model_x3d_path, model_x3d_title, 
        info_page_url)
        VALUES (:brand, :title, :subtitle, :description, 
        :creationMethod, :modelPath, :modelTitle, 
        :pageUrl)');
      $stmt->execute([
        'brand' => $brand,
        'title' => $title,
        'subtitle' => $subtitle,
        'description' => $description,
        'creationMethod' => $creationMethod,
        'modelPath' => $modelPath,
        'modelTitle' => $modelTitle,
        'pageUrl' => $pageUrl
      ]);
    } catch(PDOException $e) {
      print new Exception($e->getMessage());
    }
  }

  /**
   * Deletes a model from the datastore.
   */
  public function deleteModel($id) {
    try {
      $stmt = $this->db->prepare('DELETE FROM model WHERE id = :id');
      $stmt->execute(['id' => $id]);
    } catch(PDOException $e) {
      print new Exception($e->getMessage());
    }
  }

  /**
   * Gets textures from the datastore by model.
   */
  public function getTextures($model) {
    try {
      $stmt = $this->db->prepare('SELECT * FROM texture WHERE model = :model');
      $stmt->execute(['model' => $model]);
      return $stmt->fetchAll();
    } catch(PDOException $e) {
      print new Exception($e->getMessage());
    }
  }

  /**
   * Creates a new texture in the datastore.
   */
  public function createTexture($model, $name, $textureSrcPath) {
    try {
      $stmt = $this->db->prepare('INSERT INTO texture 
        (model, name, texture_src_path)
        VALUES (:model, :name, :textureSrcPath)');
      $stmt->execute([
        'model' => $model,
        'name' => $name,
        'textureSrcPath' => $textureSrcPath
      ]);
    } catch(PDOException $e) {
      print new Exception($e->getMessage());
    }
  }

  /**
   * Deletes a texture from the datastore.
   */
  public function deleteTexture($id) {
    try {
      $stmt = $this->db->prepare('DELETE FROM texture WHERE id = :id');
      $stmt->execute(['id' => $id]);
    } catch(PDOException $e) {
      print new Exception($e->getMessage());
    }
  }

  /**
   * Selects images for a brand by brand.
   */
  public function getImages($brand) {
    $stmt = $this->db->prepare('SELECT * FROM image WHERE brand = :brand');
    $stmt->execute(['brand' => $brand]);
    return $stmt->fetchAll(PDO::FETCH_UNIQUE);
  }

}

?>