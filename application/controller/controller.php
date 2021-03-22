<?php

class Controller {

  public $load;
  public $model;

  function __construct($pageURI = null) {
    $this->load = new Load();
    $this->model = new Model();

    $this->$pageURI();
  }
  
  function home() {
    // $data = $this->model->something();
    $this->load->view('homeView', []);
  }
}