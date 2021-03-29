<div>
  <div class="card">
    <div class="card-body">
      <h2 class="card-title">About</h2>
      <p>
        This application was built to demonstrate how x3dom can be used
        to embed interactive 3D models into a MVC style web application
        with a back-end in PHP. Content is loaded from the back-end in
        the form of a JSON packet which contains the page content that is
        then displayed to the user.

        Below are additional resources which were used or produced during
        the creation of this application.
      </p>
      <h3>Related Links</h3>
      <ul>
        <li>
          <a 
            href="https://github.com/ketnipz/3d-apps-assignment"
            target="_blank">
            GitHub Repository</a>
        </li>
        <li>
          <a 
            href="models.zip"
            target="_blank">3D Models Download (x3d & vrml)</a> (.zip)
        </li>
        <li>
          <a 
            href="archives.zip"
            target="_blank">3DS Max Model Archives Download</a> (.zip)
        </li>
      </ul>

      <h3>Site Map</h3>
      <ul>
        <li><a href='#' data-page-link="home" >Home</a></li>
        <li><a href='#' data-page-link="about">About</a></li>
        <li>
          Drinks
          <ul>
            <li><a href='#' 
              data-page-link="model" 
              data-page-attrs='{"brand":"coke"}'>Coca Cola</a></li>
            <li><a href='#' 
              data-page-link="model" 
              data-page-attrs='{"brand":"sprite"}'>Sprite</a></li>
            <li><a href='#' 
              data-page-link="model" 
              data-page-attrs='{"brand":"pepper"}'>Dr. Pepper</a></li>
            <li><a href='#' 
              data-page-link="model" 
              data-page-attrs='{"brand":"costa"}'>Costa Coffee</a></li>
            <li><a href='#' 
              data-page-link="model" 
              data-page-attrs='{"brand":"fanta"}'>Fanta</a></li>
            <li><a href='#' 
              data-page-link="model" 
              data-page-attrs='{"brand":"appletizer"}'>Appletizer</a></li>
          </ul>
        </li>
        <li><a href='statement-of-originality.html' target='_blank'>
          Statement of Originality
        </a></li>
        <li><a href='references.html' target='_blank'>
          References
        </a></li>
      </ul>

      <h3>Going Beyond Mark Scheme Requirements</h3>
      <p>
        A few elements have been implemented into this application which are
        not essential requirements of the markscheme, they are highlighted
        below.
      </p>
      <ul>
        <li>
          Use of <b>prepared PDO statements</b> and 
          <b>PDO parameter binding</b> for submitting SQL statements 
          against the data store. 
          
          <br><br>
          In production this would be hugely important in securing the 
          application against SQL injection vulnerabilities.
        </li>
        <li>
          Instead of utilising jQuery show/hide functions to switch pages,
          <b>AJAX requests</b> are submitted to the backend and content 
          is loaded in this way when the user requests it. In production 
          this would be considerably more efficient in terms of saving 
          bandwidth since only 
          the page the user wants to visit is loaded from the back-end.
          <br><br>
          It also means that only one 3D model is being rendered by the browser
          at any given time, resulting in much less resource consumption on the
          client.
        </li>
        <li>
          <b>CSS variables</b> have been used to create two completely 
          different color themes for the page styling. JavaScript then 
          applies the appropriate data attribute to activate the two 
          different themes.
          <br><br>
          Two themes are available and can be switched between using the 
          button in the footer.
          <button 
            id="about-theme-btn"
            class="btn btn-outline-secondary btn-sm">Or here</button>
        </li>
        <li>
          Support in the API for <b>CRUD</b> (<b>C</b>reate, <b>R</b>ead, 
          <b>U</b>pdate, <b>D</b>elete). There are several endpoints in the API
          which support additional functionality for actions which can be taken
          against the data store. 
          <br><br>
          They are as follows:
          <ul>
          <li>
              <code>/dbInstall</code> - Creates tables and populates records.
            </li>
            <li>
              <code>/dbCreateModel</code> - Create a new 3D model record.
            </li>
            <li>
              <code>/dbDeleteModel</code> - Delete a 3D model record.
            </li>
            <li>
              <code>/dbCreateBrand</code> - Create a new brand record.
            </li>
            <li>
              <code>/dbDeleteBrand</code> - Delete a brand record.
            </li>
            <li>
              <code>/dbCreateString</code> - Creates or updates an existing 
              string value.
            </li>
            <li>
              <code>/dbDeleteString</code> - Deletes a string record.
            </li>
            <li>
              <code>/dbCreateTexture</code> - Creates a new texture record.
            </li>
            <li>
              <code>/dbDeleteTexture</code> - Deletes a texture record.
            </li>
          </ul>
          <br>
          Although the UI does not have any use for these, they can be tested
          below (check dev tools to see the requests in real-time!):
          <br>
          <button 
            id="about-brand-create-btn"
            class="btn btn-outline-secondary btn-sm">Create test brand</button>
          <button 
            id="about-brand-delete-btn"
            class="btn btn-outline-secondary btn-sm">Delete test brand</button>
          <br><br>
          <button 
            id="about-model-create-btn"
            class="btn btn-outline-secondary btn-sm">Create test model</button>
          <button 
            id="about-model-delete-btn"
            class="btn btn-outline-secondary btn-sm">Delete test model</button>
          <br><br>
          <button 
            id="about-string-create-btn"
            class="btn btn-outline-secondary btn-sm">Create test string</button>
          <button 
            id="about-string-delete-btn"
            class="btn btn-outline-secondary btn-sm">Delete test string</button>
          <br><br>
          <button 
            id="about-texture-create-btn"
            class="btn btn-outline-secondary btn-sm">Create test texture</button>
          <button 
            id="about-texture-delete-btn"
            class="btn btn-outline-secondary btn-sm">Delete test texture</button>
          <br><br>
        </li>
        <li>
          An advanced renderer (<b>Arnold</b>) has been used to 
          render photorealistic images of each model
          (the last two renderings in each image gallery).
        </li>
        <li>
          Some brands support a texture panel (accessible via the "Flavours"
          drop-down above the 3D model). This allows user to apply a new
          texture to the model dynamically after it has been loaded.
        </li>
      </ul>

      <h3>
        References
        <small>[<a href="references.html" target="_blank">raw</a>]</small>
      </h3>
      <ul>
        <li>
          jQuery AJAX 
          <a href="https://api.jquery.com/jquery.ajax/">
            https://api.jquery.com/jquery.ajax/</a> 
          [accessed: 23.03.21]
        </li>
        <li>
          jQuery JSON 
          <a href="https://api.jquery.com/jquery.getjson/">
            https://api.jquery.com/jquery.getjson/</a> 
          [accessed: 23.03.21]
        </li>
        <li>
          fancyBox
          <a href="https://github.com/fancyapps/fancybox">
          https://github.com/fancyapps/fancybox</a> 
          [accessed: 25.03.21]
        </li>
        <li>
          PDO::query
          <a href="https://www.php.net/manual/en/pdo.query.php">
            https://www.php.net/manual/en/pdo.query.php</a>
          [accessed: 26.03.21]
        </li>
        <li>
          PDO::prepare
          <a href="https://www.php.net/manual/en/pdo.prepare.php">
            https://www.php.net/manual/en/pdo.prepare.php</a>
          [accessed: 26.03.21]
        </li>
        <li>
          PDOStatement::bindparam
          <a href="https://www.php.net/manual/en/pdostatement.bindparam.php">
            https://www.php.net/manual/en/pdostatement.bindparam.php</a>
          [accessed: 26.03.21]
        </li>
        <li>
          PDOStatement::fetchAll
          <a href="https://www.php.net/manual/en/pdostatement.fetchall.php">
            https://www.php.net/manual/en/pdostatement.fetchall.php</a>
          [accessed: 26.03.21]
        </li>
        <li>
          x3dom
          <a href="https://doc.x3dom.org/tutorials/index.html">
            https://doc.x3dom.org/tutorials/index.html</a>
          [accessed: 26.03.21]
        </li>
        <li>
          Bootstrap 5.0
          <a href="https://getbootstrap.com/docs/5.0/components">
            https://getbootstrap.com/docs/5.0/components</a>
          [accessed: 26.03.21]
        </li>
        <li>
          Creating dark/light theme support
          <a href="https://dev.to/ananyaneogi/create-a-dark-light-mode-switch-with-css-variables-34l8">
            https://dev.to/ananyaneogi/create-a-dark-light-mode-switch-with-css-variables-34l8
          </a>
          [accessed: 25.03.21]
        </li>
      </ul>

      <h3>
        Statement of Originality
        <small>
          [<a href="statement-of-originality.html" target="_blank">raw</a>]
        </small>
      </h3>
      <p>
        These web pages are submitted as part requirement for the degree of 
        Computer Science & Artificial Intelligence at the University of Sussex.
        They are the product of my own labour except where indicated in the web 
        page content. 
        
        These web pages or contents may be freely copied and distributed 
        provided the source is acknowledged.
      </p>
    </div>
  </div>
</div>