<!DOCTYPE html>
<html lang="en">  
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="assets/css/libs/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/libs/jquery.fancybox.min.css">
    <link rel="stylesheet" href="assets/css/libs/x3dom.css">
    <link rel="stylesheet" href="assets/css/libs/fontawesome.min.css">
    <link rel="stylesheet" href="assets/css/libs/brands.min.css">

    <link rel="stylesheet" href="assets/css/app.css">

    <title>Coca Cola Journey - Refreshing the world, one story at a time</title>
  </head>
  <body id="body">

    <nav id="header" class="navbar navbar-expand-sm navbar_coca_cola">
      <div class="container">
        <div class="logo">
          <a class="navbar-brand" onclick="swap('home')" href="#">
            <h1>1</h1>
            <h1>oca</h1>
            <h2>Cola</h2>
            <h3>Journey</h3>
            <p>Refreshing the world, one story at a time</p>
          </a>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">

          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" onclick="swap('home')" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" onclick="swap('about')" href='#'>About</a>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbardrop" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Drinks
              </a>
              <div class="dropdown-menu">
                <a class="dropdown-item" onclick="swap('coke')" href="#">Coca Cola</a>
                <a class="dropdown-item" onclick="swap('sprite')" href="#">Sprite</a>
                <a class="dropdown-item" onclick="swap('pepper')" href="#">Dr Pepper</a>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
          </ul>
        </div>

      </div>
    </nav>

    <div class="container">
      <div id="home" class="main_contents">
        <div class="row">
          <div class="col-xs-12 col-sm-12">
            <div id="main_3d_image">
              <div id="main_text" class="col-xs-12 col-sm-4">
                <div id='title_home'></div>
                <div id='subTitle_home'></div>
                <div id='description_home'></div>
              </div>
            </div>
          </div>
        </div>
  
        <br>
  
        <div class="row">
          <div class="col-xs-12 col-sm-4">
            <div class="card">
              <a id="renderAsset_left" data-fancybox data-caption="My 3D Coke Can Render" class="thumbnail">
                <img id="asset_left" class="card-img-top" alt="Coca Cola">
              </a>
              
              <div class="card-body">
                <div id="title_left" class="card-title homeText"></div>
                <div id="subTitle_left" class="card-subtitle homeText"></div>
                <div id="description_left" class="card-text homeText" ></div>
                <a href="coke.html" class="btn btn-primary">Find out more...</a>
              </div>
            </div>
          </div>
          <div class="col-xs-12 col-sm-4">
            <div class="card">
              <a id="renderAsset_centre" data-fancybox data-caption="My 3D Sprite Bottle Render" class="thumbnail">
                <img id="asset_centre"  class="card-img-top" alt="Sprite">
              </a>
              <div class="card-body">
                <div id="title_centre" class="card-title homeText"></div>
                <div id="subTitle_centre" class="card-subtitle homeText"></div>
                <div id="description_centre" class="card-text homeText" ></div>
                <a href="sprite.html" class="btn btn-primary">Find out more...</a>
              </div>
            </div>
          </div>
          <div class="col-xs-12 col-sm-4">
            <div class="card">
              <a id="renderAsset_right" data-fancybox data-caption="My 3D Dr Pepper Cup Render" class="thumbnail">
                <img id="asset_right"  class="card-img-top" alt="Dr Pepper">
              </a>
              <div class="card-body">
                <div id="title_right" class="card-title homeText"></div>
                <div id="subTitle_right" class="card-subtitle homeText"></div>
                <div id="description_right" class="card-text homeText" ></div>
                <a href="pepper.html" class="btn btn-primary">Find out more...</a>
              </div>
            </div>
          </div>
        </div>
      </div>
  
      <div id="about">
        Insert About Contents
      </div>
  
      <div id="models" class="main_contents">
        <div class="row">
  
          <div class="col-sm-9">
            <div class="card text-left">
              <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                  <li class="nav-item">
                    <a class="nav-link active" href="javascript:swap('coke')">Coke</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" href="javascript:swap('sprite')">Sprite</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" href="javascript:swap('pepper')">Pepper</a>
                  </li>
                </ul>
              </div>
  
              <div class="card-body">
                <div id="coke">
                  <div id="x3dModelTitle_coke" class="card-title drinksText"></div>
  
                  <div class="model3D">
                    <x3d>
                      <scene>
                        <inline 
                          id="x3dModelAsset_coke" 
                          nameSpaceName="model" 
                          mapDEFToID="true" 
                          url="/assets/models/coke.x3d" 
                          onclick="animateModel();"> </inline>
                      </scene>
                    </x3d>
                  </div>
  
                  <div id="x3dCreationMethod_coke" class="card-text drinksText"></div>
                </div>
  
                <div id="sprite">
                  <div id="x3dModelTitle_sprite" class="card-title drinksText"></div>
  
                  <div class="model3D">
                    <x3d>
                      <scene>
                        <inline 
                          id="x3dModelAsset_sprite" 
                          nameSpaceName="model" 
                          mapDEFToID="true" 
                          url="/assets/models/sprite.x3d" 
                          onclick="animateModel();"> </inline>
                      </scene>
                    </x3d>
                  </div>
                  
                  <div id="x3dCreationMethod_sprite" class="card-text drinksText"></div>
                </div>
  
                <div id="pepper">
                  <div id="x3dModelTitle_pepper" class="card-title drinksText"></div>
  
                  <div class="model3D">
                    <x3d>
                      <scene>
                        <inline 
                          id="x3dModelAsset_pepper" 
                          nameSpaceName="model" 
                          mapDEFToID="true" 
                          url="/assets/models/pepper.x3d" 
                          onclick="animateModel();"> </inline>
                      </scene>
                    </x3d>
                  </div>
                  
                  <div id="x3dCreationMethod_pepper" class="card-text drinksText"></div>
                </div>
              </div>
            </div>  
          </div>
  
          <div class="col-sm-3">
            <div class="card text-left">
              <div class="card-header gallery-header">
                Gallery
              </div>
              <div class="card-body">
                <div class="card-title galleryTitle drinksText"></div>
                <div class="gallery" id="gallery"></div>
                <div class="card-text galleryDescription drinksText"></div>
              </div>
  
            </div>
          </div>
        </div>
  
      </div>
  
      <div id="interaction" class="row">
        <div class="col-sm-4">
          <div class="card text-left">
            <div class="card-header">
              Cameras
            </div>
  
            <div class="card-body">
              <div class="card-title x3dCameraTitle drinksText"></div>
              <div class="camera-btns">
                <div class="btn-toolbar">
                  <a href="#" class="btn btn-success btn-responsive camera-font">Default</a>
                  <a href="#" class="btn btn-primary btn-responsive camera-font">Back</a>
                  <a href="#" class="btn btn-secondary btn-responsive camera-font">Left</a>
                  <a href="#" class="btn btn-secondary btn-responsive camera-font">Right</a>
                  <a href="#" class="btn btn-outline-dark btn-responsive camera-font">Off</a>
                </div>
              </div>
              <div class="card-text x3dCameraSubtitle drinksText"></div>
            </div>
          </div>  
        </div>
  
        <div class="col-sm-4">
          <div class="card text-left">
            <div class="card-header">
              Animation
            </div>
  
            <div class="card-body">
              <h3 class="card-title">Animation Options</h3>
              <div class="camera-btns">
                <div class="btn-toolbar">
                  <a href="#" class="btn btn-outline-light btn-responsive camera-font" onclick="spin();">RotX</a>
                  <a href="#" class="btn btn-outline-light btn-responsive camera-font">RotY</a>
                  <a href="#" class="btn btn-outline-light btn-responsive camera-font">RotZ</a>
                  <a href="#" class="btn btn-outline-dark btn-responsive camera-font" onclick="stopRotation();">Stop</a>
                </div>
              </div>
              <p class="card-text drinksText">These buttons select a range of X3D animation options</p>
            </div>
          </div>  
        </div>
  
        <div class="col-sm-4">
          <div class="card text-left">
            <div class="card-header">
              Render
            </div>
  
            <div class="card-body">
              <h3 class="card-title">Render and Lighting Options</h3>
              <div class="camera-btns">
                <div class="btn-toolbar">
                  <a href="#" class="btn btn-primary btn-responsive camera-font">Poly</a>
                  <a href="#" class="btn btn-secondary btn-responsive camera-font">Wire</a>
                  <a href="#" class="btn btn-primary btn-responsive camera-font">Headlight</a>
                  <a href="#" class="btn btn-outline-dark btn-responsive camera-font">Default</a>
                </div>
              </div>
              <p class="card-text drinksText">These buttons select a range of X3D animation options</p>
            </div>
          </div>  
        </div>
      </div>
  
      <div id="cokeDescription" class="row">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-body">
              <div id="title_coke" class="card-title drinksText"></div>
              <div id="subTitle_coke" class="card-subtitle drinksText"></div>
              <div id="description_coke" class="card-text drinksText"></div>
              <a href="https://www.coca-cola.co.uk/brands/coca-cola-original-taste" class="btn btn-primary">Find out more...</a>
            </div>
          </div>
        </div>
      </div>
  
      <div id="spriteDescription" class="row">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-body">
              <div id="title_sprite" class="card-title drinksText"></div>
              <div id="subTitle_sprite" class="card-subtitle drinksText"></div>
              <div id="description_sprite" class="card-text drinksText"></div>
              <a href="https://www.coca-cola.co.uk/brands/sprite" class="btn btn-primary">Find out more...</a>
            </div>
          </div>
        </div>
      </div>
  
      <div id="pepperDescription" class="row">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-body">
              <div id="title_pepper" class="card-title drinksText"></div>
              <div id="subTitle_pepper" class="card-subtitle drinksText"></div>
              <div id="description_pepper" class="card-text drinksText"></div>
              <a href="https://www.coca-cola.co.uk/brands/pepper" class="btn btn-primary">Find out more...</a>
            </div>
          </div>
        </div>
      </div>
    </div>


    <nav id="footer" class="navbar navbar-expand-sm footer">
      <div class="container">
        <div class="navbar-text float-left copyright">
          <p>
            <span class="align-baseline">
              &copy; 2021 Mobile Web 3D Applications | 
              <a href="#" onclick="changeLook()">Restyle</a> | 
              <a href="#" onclick="changeBack()">Reset</a> 
            </span>

          </p>
        </div>
        <div class="navbar-text float-right social">
          <a href=""><i class="fab fa-facebook-square fa-2x"></i></a>
          <a href=""><i class="fab fa-twitter fa-2x"></i></a>
          <a href=""><i class="fab fa-google-plus fa-2x"></i></a>
          <a href=""><i class="fab fa-github-square fa-2x"></i></a>
        </div>
      </div>
    </nav>

    
    <script src="assets/js/libs/jquery.min.js"></script>
    <script src="assets/js/libs/jquery.fancybox.min.js"></script>
    <script src="assets/js/libs/popper.min.js"></script>
    <script src="assets/js/libs/bootstrap.min.js"></script>
    <script src="assets/js/libs/x3dom.js"></script>

    <script src="assets/js/app.js"></script>
  </body>
</html>