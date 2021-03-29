<div>
  <div class="row">
    <!-- 3D model view -->
    <div class="col-md-12 col-lg-9 mb-3">
      <div class="card text-left">
        <div class="card-header">
          Model
        </div>
        <div class="card-body">
          <div id="coke">
            <h3 id="model-x3d-title" class="card-title"></h3>

            <div class="model-x3d">
              <x3d id="model">
                <scene>
                  <inline 
                    id="model-x3d-asset" 
                    nameSpaceName="model" 
                    mapDEFToID="true">
                  </inline>
                </scene>
              </x3d>
            </div>
            <p id="model-creation-method" class="card-text"></p>
          </div>
        </div>
      </div>  
    </div>

    <!-- Image gallery -->
    <div class="col-md-12 col-lg-3 mb-3">
      <div class="card text-left">
        <div class="card-header gallery-header">
          Gallery
        </div>
        <div class="card-body">
          <h3 id="gallery-title" class="card-title"></h3>
          <p id="gallery-description" class="card-text"></p>

          <div id="gallery" class="gallery" ></div>
        </div>
      </div>
    </div>
  </div>

  <!-- Interaction menu -->
  <div id="interaction" class="row">
    <!-- Cameras -->
    <div class="col-sm-12 col-md-4 mb-3">
      <div class="card text-left">
        <div class="card-header">
          Cameras
        </div>

        <div class="card-body">
          <h3 id="camera-title" class="card-title"></h3>
          <p id="camera-subtitle" class="card-text"></p>

          <hr/>

          <div class="camera-btns">
            <div class="btn-group">
              <button 
                type="button" 
                class="btn btn-primary dropdown-toggle" 
                data-bs-toggle="dropdown" 
                aria-expanded="false">
                Camera
              </button>
              <ul class="dropdown-menu">
                <li><button 
                  id="camera-front-btn"
                  class="dropdown-item">
                  Front
                </button></li>
                <li><button 
                  id="camera-back-btn"
                  class="dropdown-item">
                  Back
                </button></li>
                <li><button 
                  id="camera-left-btn"
                  class="dropdown-item">
                  Left
                </button></li>
                <li><button 
                  id="camera-right-btn"
                  class="dropdown-item">
                  Right
                </button></li>
                <li><button 
                  id="camera-bottom-btn" 
                  class="dropdown-item">
                  Bottom
                </button></li>
                <li><button 
                  id="camera-top-btn" 
                  class="dropdown-item">
                  Top
                </button></li>
              </ul>
            </div>

            <button 
              id="camera-reset-btn"
              class="btn btn-outline-danger btn-responsive float-end">
              Reset
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Animation -->
    <div class="col-sm-12 col-md-4 mb-3">
      <div class="card text-left">
        <div class="card-header">
          Animation
        </div>

        <div class="card-body">
          <h3 id="animation-title" class="card-title"></h3>
          <p id="animation-subtitle" class="card-text"></p>

          <hr/>

          <div class="animation-btns">
            <div class="btn-group">
              <button 
                type="button" 
                class="btn btn-primary dropdown-toggle" 
                data-bs-toggle="dropdown" 
                aria-expanded="false">
                Rotate
              </button>
              <ul class="dropdown-menu">
                <li><button 
                  id="rotate-x-btn"
                  class="dropdown-item">
                  X Axis
                </button></li>
                <li><button 
                  id="rotate-y-btn" 
                  class="dropdown-item">
                  Y Axis
                </button></li>
                <li><button 
                  id="rotate-z-btn" 
                  class="dropdown-item">
                  Z Axis
                </button></li>
              </ul>
            </div>

            <button 
              id="rotate-stop-btn"
              class="btn btn-outline-danger btn-responsive float-end">
              Stop
            </button>
          </div>

        </div>
      </div>  
    </div>

    <!-- Lighting & Render -->
    <div class="col-sm-12 col-md-4 mb-3">
      <div class="card text-left">
        <div class="card-header">
          Render
        </div>

        <div class="card-body">
          <h3 id="render-title" class="card-title"></h3>
          <p id="render-subtitle" class="card-text"></p>

          <hr/>

          <div class="render-btns">
            <div class="btn-group" role="group">
              <input 
                type="radio" 
                class="btn-check" 
                name="btnradio"
                id="render-fill-btn" 
                autocomplete="off" 
                checked>
              <label class="btn btn-outline-primary" for="render-fill-btn">
                Fill
              </label>
              <input 
                type="radio" 
                class="btn-check" 
                name="btnradio"
                id="render-points-btn" 
                autocomplete="off">
              <label class="btn btn-outline-primary" for="render-points-btn">
                Points
              </label>
              <input 
                type="radio" 
                class="btn-check" 
                name="btnradio" 
                id="render-wire-btn" 
                autocomplete="off">
              <label class="btn btn-outline-primary" for="render-wire-btn">
                Wire
              </label>
            </div>

            <span class="animation-btns">
              <div class="btn-group">
                <button 
                  type="button" 
                  class="btn btn-primary dropdown-toggle" 
                  data-bs-toggle="dropdown" 
                  aria-expanded="false">
                  Lighting
                </button>
                <ul class="dropdown-menu">
                  <li><button 
                    id="light-headlight-btn"
                    class="dropdown-item active">
                    Headlight
                  </button></li>
                  <li><button 
                    id="light-front-btn"
                    class="dropdown-item active">
                    PointFront
                  </button></li>
                  <li><button 
                    id="light-back-btn"
                    class="dropdown-item active">
                    PointBack
                  </button></li>
                  <li><button 
                    id="light-left-btn"
                    class="dropdown-item active">
                    PointLeft
                  </button></li>
                  <li><button 
                    id="light-right-btn"
                    class="dropdown-item active">
                    PointRight
                  </button></li>
                  <li><button 
                    id="light-bottom-btn"
                    class="dropdown-item active">
                    PointBottom
                  </button></li>
                  <li><button 
                    id="light-top-btn"
                    class="dropdown-item active">
                    PointTop
                  </button></li>
                </ul>
              </div>
              <button 
                id="light-reset-btn"
                class="btn btn-outline-danger btn-responsive float-end">
                Reset
              </button>
            </span>
          </div>
        </div>
      </div>  
    </div>
  </div>

  <!-- Model details -->
  <div id="description" class="row mb-3">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-body">
          <h3 id="model-description-title" class="card-title"></h3>
          <h5 id="model-description-subtitle" class="card-subtitle mb-2"></h5>
          <p id="model-description-text" class="card-text"></p>
          <a id="model-info-url" class="btn btn-primary" target="_blank">
            Find out more...
          </a>
        </div>
      </div>
    </div>
  </div>
</div>