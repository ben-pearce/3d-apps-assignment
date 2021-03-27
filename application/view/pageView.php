<!DOCTYPE html>
<html lang="en">  
  <head>
    <meta charset="utf-8">
    <meta 
      name="viewport" 
      content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link 
      rel="icon" 
      type="image/png" sizes="32x32" href="asssets/icons/favicon-32x32.png">
    <link 
      rel="icon" 
      type="image/png" sizes="16x16" href="assets/icons/favicon-16x16.png">

    <!-- CSS libraries -->
    <link rel="stylesheet" href="assets/css/libs/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/libs/jquery.fancybox.min.css">
    <link rel="stylesheet" href="assets/css/libs/x3dom.css">
    <link rel="stylesheet" href="assets/css/libs/fontawesome.min.css">
    <link rel="stylesheet" href="assets/css/libs/brands.min.css">

    <!-- Custom CSS for 3D app -->
    <link rel="stylesheet" href="assets/css/app.css">

    <title><?php 
      printf('%s - %s', 
        $data['strings']['site.title'], 
        $data['strings']['site.tagline']
      ) ?></title>
  </head>
  <body id="body">

    <!-- Contact modal -->
    <div 
      class="modal fade" 
      id="contactModal" 
      tabindex="-1" 
      role="dialog" 
      aria-labelledby="contactModalTitle" 
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="contactModalTitle">Contact</h5>
            <button 
              type="button" 
              class="btn-close" 
              data-bs-dismiss="modal" 
              aria-label="Close">
            </button>
          </div>
          <div class="modal-body">
            <p><strong>Name:</strong> Ben Pearce</p>
            <hr/>
            <p><strong>Email: </strong> bp228@sussex.ac.uk</p>
            <hr/>
            <p><strong>Candidate No: </strong> 184517</p>
          </div>
          <div class="modal-footer">
            <button 
              type="button" 
              class="btn btn-secondary" 
              data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Page navigation bar -->
    <nav id="header" class="navbar navbar-expand-sm sticky-top navbar-dark navbar-coke">
      <div class="container">
        <div class="logo">
          <a class="navbar-brand" data-page-link="home" href="#">
            <h1>1</h1>
            <h1>oca</h1>
            <h2>Cola</h2>
            <h3>Journey</h3>
            <p><?= $data['strings']['site.tagline'] ?></p>
          </a>
        </div>

        <button 
          class="navbar-toggler" 
          type="button" 
          data-bs-toggle="collapse" 
          data-bs-target="#navbarSupportedContent" 
          aria-controls="navbarNavDropdown" 
          aria-expanded="false" 
          aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div 
          class="collapse navbar-collapse justify-content-end" 
          id="navbarSupportedContent">

          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" data-page-link="home" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-page-link="about" href="#">About</a>
            </li>

            <li class="nav-item dropdown">
              <a 
                class="nav-link dropdown-toggle" 
                href="#" 
                id="navbardrop" 
                role="button" 
                data-bs-toggle="dropdown" 
                aria-expanded="false">
                Drinks
              </a>
              <div class="dropdown-menu">
                <!-- Brands dropdown -->
                <?php foreach($data['brands'] as $brandId => $brand): ?>
                <button
                  class="dropdown-item" 
                  data-page-link="model" 
                  data-page-attrs='{"brand":"<?= $brandId ?>"}'
                ><?= $brand['long_name'] ?></button>
                <?php endforeach; ?>
              </div>
            </li>

            <li class="nav-item">
              <a 
                class="nav-link" 
                data-bs-toggle="modal" 
                data-bs-target="#contactModal"
                href="#">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page content will be loaded in by AJAX -->
    <div class="container" id="content"></div>

    <!-- Page footer -->
    <nav id="footer" class="navbar navbar-expand-sm footer">
      <div class="container">
        <div class="navbar-text float-left copyright">
          <p>
            &copy; 2021 Mobile Web 3D Applications | 
            <a 
              href="/statement-of-originality.html"
              target="_blank">
              Statement of Originality</a> |
            <a 
              href="/references.html" 
              target="_blank">References</a> |
            <button 
              id="theme-btn" 
              class="btn btn-light btn-sm">Day Theme</button>
          </p>
        </div>
        <div class="navbar-text float-right social">
          <a 
            href="https://www.facebook.com/Coca-Cola/"
            target="_blank"
            class="me-2"><i class="fab fa-facebook-square fa-2x"></i></a>
          <a 
            href="https://twitter.com/CocaCola" 
            target="_blank"
            class="me-2"><i class="fab fa-twitter fa-2x"></i></a>
          <a 
            href="https://github.com/ketnipz/3d-apps-assignment" 
            target="_blank"><i class="fab fa-github-square fa-2x"></i></a>
        </div>
      </div>
    </nav>

    <!-- JavaScript libraries -->
    <script src="assets/js/libs/jquery.min.js"></script>
    <script src="assets/js/libs/jquery.fancybox.min.js"></script>
    <script src="assets/js/libs/popper.min.js"></script>
    <script src="assets/js/libs/bootstrap.min.js"></script>
    <script src="assets/js/libs/x3dom.js"></script>

    <!-- Custom JavaScript for 3D app -->
    <script src="assets/js/app.js"></script>
  </body>
</html>