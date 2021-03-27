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
  }
}