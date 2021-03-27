<?php

/**
 * Entrypoint for MVC application.
 */

require 'view/load.php';
require 'model/model.php';
require 'controller/controller.php';

/**
 * Find the endpoint which has been requested by the user.
 * 
 * If they have accessed the site via index.php, the endpoint
 * will be everything in the url that follows that i.e.
 * 
 * index.php/aboutView -> aboutView
 * 
 * If they have accessed without index.php it will just be
 * everything that follows the base url i.e.
 * 
 * /aboutView -> aboutView
 */
$pageURI = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$pageURI = substr($pageURI, strrpos($pageURI, 'index.php') + 10);

if(substr($pageURI, 0, strlen('index.php')) === 'index.php') {
  $pageURI = substr($pageURI, strrpos($pageURI, 'index.php') + 10);
}

/**
 * Invoke the controller with the appropriate endpoint.
 * 
 * If the endpoint is undefined then invoke the default
 * 'home' endpoint.
 */
if(!$pageURI) {
  new Controller('home');
} else {
  new Controller($pageURI);
}

?>