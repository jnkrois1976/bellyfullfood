<div id="order" class="container">
    <div class="row">
        <div class="col">
            <h1 class="pageTitle">Place Your Order</h1>
            <h4>Choose your meals and the quantity below</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form id="addToCartForm" class="row" method="post" action="/cart">
                <div class="col-8">
                    <table class="table table-bordered table-striped">
                        <colgroup>
                            <col width="15%">
                            <col width="65%">
                            <col width="15%">
                        </colgroup>
                        <thead>
                            <tr>
                                <th colspan="2">Meal </th>
                                <th>Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($get_meals as $get_meals_row): ?>
                                <tr>
                                    <td><img src="<?=$get_meals_row->meal_img_name?>" alt="<?=$get_meals_row->meal_title?>"></td>
                                    <td class="align-middle"><h5><?=$get_meals_row->meal_title?></h5></td>
                                    <td class="align-middle text-center">
                                        <input name="meals[]" data-mealname="<?=$get_meals_row->meal_title?>" class="mealQty" <?=(!$get_meals_row->meal_enable)? 'disabled': null?> type="number" data-mealid="<?=$get_meals_row->meal_id?>" min="0" max="9" value="0" />
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-header">
                            Your Selections
                        </div>
                        <div class="card-body">
                            <h6>Please select a minimun of 6 meals</h6>
                            <table class="table table-bordered table-striped">
                                <colgroup>
                                    <col width="80%">
                                    <col width="20%">
                                </colgroup>
                                <thead>
                                    <tr>
                                        <th>Meal</th>
                                        <th>Qty</th>
                                    </tr>
                                </thead>
                                <tbody id="selections">
                                </tbody>
                            </table>
                            <h6>Choose your delivery date and time</h6>
                            <div id="pickUpDate">
                                <?=$generate_calendar?>
                                <div id="errorMessage" class="d-none alert alert-danger" role="alert"></div>
                            </div>
                            <div class="form-group">
                                <input type="time" class="form-control" value="08:00" name="deliveryTime" min="08:00" max="18:00" required />
                            </div>
                            <input type="hidden" value="" id="rawDate" name="rawDate" />
                            <input type="hidden" value="" id="formattedDate" name="formattedDate" />
                            <button disabled id="addToCartBtn" type="submit" class="btn btn-primary btn-block">Add to Cart</button>
                            <!-- <a routerLink="/cart" class="btn btn-primary btn-lg btn-block">Place order</a> -->
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
