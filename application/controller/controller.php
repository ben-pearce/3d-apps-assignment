<?php

/**
 * Controller class for back-end business logic. 
 */
class Controller {

  /**
   * Instance of view loader to allow controller  to
   * render a view to respond with.
   */
  public $load;

  /**
   * Instance of data model which provides access to the 
   * underlying datastore.
   */
  public $model;

  /**
   * Controller constructor.
   * 
   * Creates an instance of both the view loader and the
   * data model.
   * 
   * It then executes the appropriate method depending
   * on which endpoint has been requested.
   */
  public function __construct($pageURI = null) {
    $this->load = new Load();
    $this->model = new Model();

    $this->$pageURI();
  }
  
  /**
   * GET
   * Endpoint: /
   * 
   * Gets the required content for the homepage template
   * and renders the pageView. 
   * 
   * Additional content is loaded into this view using AJAX.
   * 
   * This only renders a navigation bar and footer.
   */
  public function home() {
    $data = [
      "strings" => $this->model->getStrings('site'),
      "brands" => $this->model->getBrands()
    ];
    $this->load->view('pageView', $data);
  }

  /**
   * GET
   * Endpoint: /apiGetHome
   * 
   * Renders the homeView which contains the home page
   * content.
   * 
   * Intended to be loaded into the pageView template
   * using AJAX.
   * 
   * Additional content will also be loaded using AJAX.
   */
  public function apiGetHome() {
    $data = $this->model->getBrands();
    $this->load->view('homeView', ["brands" => $data]);
  }

  /**
   * GET
   * Endpoint: /apiGetAbout
   * 
   * Renders the aboutView which contains the about 
   * page content.
   * 
   * Intended to be loaded into the pageView template
   * using AJAX.
   */
  public function apiGetAbout() {
    $this->load->view('aboutView', []);
  }

  /**
   * GET
   * Endpoint: /apiGetModel
   * 
   * Renders the modelView which tonains the model
   * (drinks) page content.
   * 
   * Intended to be loaded into the pageView template
   * using AJAX.
   * 
   * Additional content, such as 3D model, description
   * etc, will be loaded using AJAX.
   */
  public function apiGetModel() {
    $this->load->view('modelView', []);
  }

  /**
   * GET
   * Endpoint: /dbInstall
   * 
   * Used to install the database using the underlying 
   * data model which will invoke some SQL scripts.
   */
  public function dbInstall() {
    $this->model->install();
    $this->load->view('messageView', 'Database scripts executed');
  }

  /**
   * GET
   * Endpoint: /dbGetBrands
   * 
   * Used to get details of brands stored in the data
   * model.
   * 
   * Responds with JSON packet which will be called
   * by AJAX to load additional content into the various
   * pages.
   */
  public function dbGetBrands() {
    header('Content-Type: application/json');
    $data = $this->model->getBrands();
    $this->load->raw(json_encode($data));
  }

  /**
   * GET
   * Endpoint: /dbGetBrand
   * 
   * Params: 
   *  - brand: The brand to get details about.
   * 
   * Used to get details of a single brand.
   * 
   * Responds with JSON packet which will be called
   * by AJAX.
   */
  public function dbGetBrand() {
    header('Content-Type: application/json');
    $data = $this->model->getBrand($_GET['brand']);
    $this->load->raw(json_encode($data));
  }

  /**
   * POST
   * Endpoint: /dbCreateBrand
   * 
   * Params:
   *  - id: The ID of the new brand.
   *  - name: The name of the new brand.
   *  - description: The description of the new brand.
   *  - note: The note of the new brand.
   *  - imgPath: The path of the image asset for new brand.
   * 
   * Used to create a new brand inside the underlying 
   * datastore.
   * 
   * Reponds with a message to confirm success.
   */
  public function dbCreateBrand() {
    $this->model->createBrand(
      $_POST['id'], 
      $_POST['name'], 
      $_POST['description'], 
      $_POST['note'], 
      $_POST['imgPath']);
    $this->load->view('messageView', 'Created new brand ' . $_POST['id']);
  }

  /**
   * DELETE
   * Endpoint: /dbDeleteBrand
   * 
   * Params:
   *  - id: The ID of brand to delete.
   * 
   * Used to delete a brand from the underlying 
   * datastore.
   * 
   * Responds with a message to confirm success.
   */
  public function dbDeleteBrand() {
    $this->model->deleteBrand($_GET['id']);
    $this->load->view('messageView', 'Deleted brand ' . $_GET['id']);
  }

  /**
   * GET
   * Endpoint: /dbGetStrings
   * 
   * Params:
   *  - for: The prefix for strings to return (optional)
   * 
   * Used to get strings for pages from the underlying 
   * datastore.
   * 
   * Responds with JSON packet which will be called
   * by AJAX.
   */
  public function dbGetStrings() {
    header('Content-Type: application/json');
    $prefix = isset($_GET['for']) ? $_GET['for'] : '';
    $data = $this->model->getStrings($prefix);
    $this->load->raw(json_encode($data));
  }

  /**
   * GET
   * Endpoint: /dbGetString
   * 
   * Params:
   *  - key: The key of the string to return.
   * 
   * Used to get a single string from the underlying datastore.
   * 
   * Responds with a JSON packet which will be called by AJAX.
   */
  public function dbGetString() {
    header('Content-Type: application/json');
    $data = $this->model->getString($_GET['key']);
    $this->load->raw(json_encode($data));
  }

  /**
   * POST
   * Endpoint: /dbCreateString
   * 
   * Params:
   *  - key: The key of the new string.
   *  - value: The value of the new string.
   * 
   * Used to create a new string in the underlying datastore.
   * 
   * Reponds with a message to confirm success.
   */
  public function dbCreateString() {
    $this->model->createString($_POST['key'], $_POST['value']);
    $this->load->view('messageView', 'Created new string ' . $_POST['key']);
  }

  /**
   * DELETE
   * Endpoint: /dbDeleteString
   * 
   * Params:
   *  - key: The key of the string to delete.
   * 
   * Used to delete a string from the underlying datastore.
   * 
   * Responds with a message to confirm success.
   */
  public function dbDeleteString() {
    $this->model->deleteString($_GET['key']);
    $this->load->view('messageView', 'Deleted string ' . $_GET['key']);
  }
  
  /**
   * GET
   * Endpoint: /dbGetModel
   * 
   * Params:
   *  - brand: The brand of model to get.
   * 
   * Used for getting data about a 3D model from the underlying
   * datastore.
   * 
   * Responds with a JSON packet which will be called
   * by AJAX.
   */
  public function dbGetModel() {
    header('Content-Type: application/json');
    $data = $this->model->getModel($_GET['brand']);
    $this->load->raw(json_encode($data));
  }

  /**
   * GET
   * Endpoint: /dbGetModels
   * 
   * Used for getting data about all 3D models from the
   * underlying datastore.
   * 
   * Responds with a JSON packet which will be called
   * by AJAX.
   */
  public function dbGetModels() {
    header('Content-Type: application/json');
    $data = $this->model->getModels();
    $this->load->raw(json_encode($data));
  }

  /**
   * POST
   * Endpoint: /dbCreateModel
   * 
   * Params:
   *  - brand: The brand of the new model.
   *  - title: The title of the new model page.
   *  - subtitle: The subtitle of the new model page.
   *  - description: The description of the new model.
   *  - creationMethod: The creation method of the new model.
   *  - modelPath: The path to the 3D model asset.
   *  - modelTitle: The title of the new model.
   *  - pageUrl: The URL for the new model.
   * 
   * Used to create a new 3D model in the underlying
   * datastore.
   */
  public function dbCreateModel() {
    $this->model->createModel(
      $_POST['brand'],
      $_POST['title'],
      $_POST['subtitle'],
      $_POST['description'],
      $_POST['creationMethod'],
      $_POST['modelPath'],
      $_POST['modelTitle'],
      $_POST['pageUrl']
    );
    $this->load->view('messageView', 'Created new model ' . $_POST['title']);
  }

  /**
   * GET
   * Endpoint: /dbDeleteModel
   * 
   * Params:
   *  - id: The ID of the model to delete.
   * 
   * Used to delete a model from the underlying datastore.
   * 
   * Reponds with a message to confirm success.
   */
  public function dbDeleteModel() {
    $this->model->deleteModel($_GET['id']);
    $this->load->view('messageView', 'Deleted model ' . $_GET['id']);
  }

  /**
   * GET
   * Endpoint: /dbGetImages
   * 
   * Params:
   *  - brand: The brand to get images for.
   * 
   * Gets paths to the images for a particular brand
   * from the underlying datastore.
   * 
   * Responds with JSON packet 
   */
  public function dbGetImages() {
    header('Content-Type: application/json');
    $data = $this->model->getImages($_GET['brand']);
    $this->load->raw(json_encode($data));
  }

}