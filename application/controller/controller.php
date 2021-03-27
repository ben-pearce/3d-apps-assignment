<?php

class Controller {

  public $load;
  public $model;

  function __construct($pageURI = null) {
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

  }
}