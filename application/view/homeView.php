<div>
  <div class="row mb-3">
    <div class="col-xs-12 col-sm-12">
      <div class='main-image'>
        <div class="main-image-text col-xs-12 col-sm-4">
          <!-- Title, subtitle and description will be loaded by AJAX -->
          <h2 id='title'></h2>
          <h3 id='subtitle'></h3>
          <p id='description'></p>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <!-- Load all brand names into the home page -->
    <?php foreach($data['brands'] as $brandId => $brand): ?>
      <div class="col-xs-12 col-sm-6 col-md-4 mb-4">
        <div class="brand card">
          <a 
            id="brand-thumbnail-<?= $brandId ?>" 
            class="thumbnail" 
            data-fancybox>
            <img 
              id="brand-img-<?= $brandId ?>" 
              class="card-img-top" 
              alt="">
          </a>
          
          <div class="card-body">
            <h5 id="brand-title-<?= $brandId ?>" class="card-title mb-3"></h5>
            <h6
              id="brand-subtitle-<?= $brandId ?>" 
              class="card-subtitle mb-2"></h6>
            <p 
              id="brand-description-<?= $brandId ?>" 
              class="card-text mb-2"></p>
            <div class="text-center">
              <a 
                data-page-link="model" 
                data-page-attrs='{"brand":"<?= $brandId ?>"}' 
                href="#" 
                class="btn btn-dark rounded-pill">Find out more...</a>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>