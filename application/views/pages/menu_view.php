<div id="menu" class="container">
    <div class="row">
        <div class="col"><h1 class="pageTitle">Our Menu</h1></div>
    </div>
    <div class="d-flex justify-content-between flex-wrap">
        <?php foreach($get_meals as $get_meals_row): ?>
            <div class="card">
                <img class="card-img-top" src="<?=$get_meals_row->meal_img_name?>" alt="<?=$get_meals_row->meal_title?>">
                <div class="card-body">
                    <h4 class="card-title"><?=$get_meals_row->meal_title?></h4>
                    <p class="card-text">
                        <?=$get_meals_row->meal_desc?>
                    </p>
                    <a class="btn btn-primary" href="/order">Order</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
