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

  }
}