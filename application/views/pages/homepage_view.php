<div class="container">
  <div id="showCase" class="row">
    <div class="col-sm-4 d-flex">
        <div class="card">
            <img class="card-img-top" src="/img/belly_full_logo_mid.jpg" alt="BellyFullFoods.com">
            <div class="card-body">
                <h3 class="card-title cursive">Healthy Meals Delivered</h3>
                <p class="card-text">Get your meals delivered to you all at once in just two days!</p>
                <a href="/order" class="btn btn-primary w-100">Order Now</a>
            </div>
      </div>
    </div>
    <div class="col-sm-8">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <!-- <?php $i = 0;?>
                <?php foreach($get_meals as $get_meals_row): ?>
                    <?php if($i == 0 ):?>
                        <li data-target="#carouselExampleIndicators" data-slide-to="<?=$get_meals_row->id - 1?>" class="active"></li>
                    <?php elseif($i > 0 && $i < 3):?>
                        <li data-target="#carouselExampleIndicators" data-slide-to="<?=$get_meals_row->id - 1?>"></li>
                    <?php endif; ?>
                    <?php $i++; ?>
                <?php endforeach; ?> -->
            </ol>
            <div class="carousel-inner">
                <?php $c = 0;?>
                <?php foreach($get_meals as $get_meals_row): ?>
                    <?php if($c == 0 ):?>
                        <div class="carousel-item active">
                            <img src="<?=$get_meals_row->meal_img_name?>" alt="<?=$get_meals_row->meal_title?>">
                            <div class="imageCaption cursive"><?=$get_meals_row->meal_title?></div>
                        </div>
                    <?php elseif($c > 0 && $c < 3):?>
                        <div class="carousel-item">
                            <img src="<?=$get_meals_row->meal_img_name?>" alt="<?=$get_meals_row->meal_title?>">
                            <div class="imageCaption cursive"><?=$get_meals_row->meal_title?></div>
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
  <!-- <div id="offers" class="row">
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
  </div> -->
  <div id="bottomShowCase" class="row">
    <div class="col-sm-4">
      <p class="d-flex align-items-center justify-content-center">Organic/Non-GMO</p>
    </div>
    <div class="col-sm-4">
      <p class="d-flex align-items-center justify-content-center">Free Delivery</p>
    </div>
    <div class="col-sm-4">
      <p class="d-flex align-items-center justify-content-center">Only the Freshest Ingredients</p>
    </div>
  </div>
</div>
