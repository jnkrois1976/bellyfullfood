<div id="menu" class="container">
    <div class="row">
        <div class="col"><h1 class="pageTitle">Our Menu</h1></div>
    </div>
    <div class="d-flex justify-content-between flex-wrap">
        <?php foreach($get_meals as $get_meals_row): ?>
            <div class="card">
                <img class="card-img-top" src="<?=$get_meals_row->meal_img_name?>" alt="<?=$get_meals_row->meal_title?>">
                <div class="card-body d-flex flex-column justify-content-between">
                    <h4 class="card-title"><?=$get_meals_row->meal_title?></h4>
                    <p class="card-text">
                        <?=$get_meals_row->meal_desc?>
                    </p>
                    <a class="btn btn-primary" href="/order">Order</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="row">
        <div class="col">
            <small>
                * At Belly Full Foods, we do our best to make sure the majority of our menu consists of the highest quality organic and/or non-GMO ingredients,
                although some of these ingredients may not be available in their organic or non-GMO varieties at certain times. <br />
                For more information, please email us at info@bellyfullfoods.com.
            </small>
        </div>
    </div>
</div>
