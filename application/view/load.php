<?php

class Load {

  function view($file_name, $data = null) {
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