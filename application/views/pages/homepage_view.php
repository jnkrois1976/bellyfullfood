<div class="container">
  <div id="showCase" class="row">
    <div class="col-4">
      <h1>Belly Full</h1>
      <hr />
      <h3>Healthy Meal Delivery Service</h3>
      <hr />
      <p>Get your meals delivered to you all at once in just two days!</p>
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Limited time offer</h4>
          <p class="card-text">Order NOW and get free delivery on all orders.</p>
          <a href="/order" class="btn btn-primary">Order Now For Free Delivery</a>
        </div>
      </div>
    </div>
    <div class="col-8">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <?php $i = 0;?>
                <?php foreach($get_meals as $get_meals_row): ?>
                    <?php if($i == 0 ):?>
                        <li data-target="#carouselExampleIndicators" data-slide-to="<?=$get_meals_row->id - 1?>" class="active"></li>
                    <?php elseif($i > 0):?>
                        <li data-target="#carouselExampleIndicators" data-slide-to="<?=$get_meals_row->id - 1?>"></li>
                    <?php endif; ?>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </ol>
            <div class="carousel-inner">
                <?php $c = 0;?>
                <?php foreach($get_meals as $get_meals_row): ?>
                    <?php if($c == 0 ):?>
                        <div class="carousel-item active">
                            <img src="<?=$get_meals_row->meal_img_name?>" alt="<?=$get_meals_row->meal_title?>">
                        </div>
                    <?php elseif($c > 0):?>
                        <div class="carousel-item">
                            <img src="<?=$get_meals_row->meal_img_name?>" alt="<?=$get_meals_row->meal_title?>">
                        </div>
                    <?php endif; ?>
                    <?php $c++; ?>
                <?php endforeach; ?>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
  </div>
  <div id="offers" class="row">
    <div class="col">
      <div class="d-flex flex-column align-items-center justify-content-center">
        <div>
          Get 6 meals for $50
        </div>
        <a class="btn btn-primary" href="/order">Choose your 6 meals</a>
      </div>
    </div>
    <div class="col">
      <div class="d-flex flex-column align-items-center justify-content-center">
        <div>
          Get 10 meals for $75
        </div>
        <a class="btn btn-primary" href="/order">Choose your 10 meals now</a>
      </div>
    </div>
  </div>
  <div id="bottomShowCase" class="row">
    <div class="col">
      <p class="d-flex align-items-center justify-content-center">Non-GMO</p>
    </div>
    <div class="col">
      <p class="d-flex align-items-center justify-content-center">Organic</p>
    </div>
    <div class="col">
      <p class="d-flex align-items-center justify-content-center">Fresh Ingredients</p>
    </div>
    <div class="col">
      <p class="d-flex align-items-center justify-content-center">No subscription</p>
    </div>
  </div>
</div>
