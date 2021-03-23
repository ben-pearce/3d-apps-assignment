<?php

require 'view/load.php';
require 'model/model.php';
require 'controller/controller.php';

$pageURI = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$pageURI = trim($pageURI, '/');
if(substr($pageURI, 0, strlen('index.php')) === 'index.php') {
  $pageURI = substr($pageURI, strrpos($pageURI, 'index.php') + 10);
}

if(!$pageURI) {
  new Controller('home');
} else {
  new Controller($pageURI);
}

?>