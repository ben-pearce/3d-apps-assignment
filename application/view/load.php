<?php

/**
 * Load class responsible for loading and rendering views.
 */
class Load {

  /**
   * Renders a view by name, which will invoke the
   * php view file under that name (e.g. 'aboutView').
   */
  function view($fileName, $data = null) {
    if(is_array($data)) {
      extract($data);
    }

    include $fileName . '.php';
  }

  /**
   * Renders some raw data.
   * 
   * Mostly used for rendering JSON responses.
   */
  function raw($data) {
    print($data);
  }

}

?>