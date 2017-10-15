<div id="order" class="container">
    <div class="row">
        <div class="col">
            <h1 class="pageTitle">Place Your Order</h1>
            <h4>Choose your meals and the quantity below</h4>
            <small style="color: #cc0000">(Minimum of 2 per menu item, and 6 meals per order)</small>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <form id="addToCartForm" class="row" method="post" action="/cart">
                <div class="col-sm-8">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th colspan="2">Meal </th>
                                <th>Price</th>
                                <th>Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($get_meals as $get_meals_row): ?>
                                <tr>
                                    <td><img src="<?=$get_meals_row->meal_img_name?>" alt="<?=$get_meals_row->meal_title?>"></td>
                                    <td class="align-middle"><h5><?=$get_meals_row->meal_title?></h5></td>
                                    <td class="align-right">
                                        $<?=money_format('%i', $get_meals_row->meal_price)?>
                                        <input type="hidden" name="prices[]" value="<?=$get_meals_row->meal_price?>" />
                                    </td>
                                    <td class="align-middle text-center">
                                        <input onfocus="this.select()" name="meals[]" data-mealname="<?=$get_meals_row->meal_title?>" class="mealQty" <?=(!$get_meals_row->meal_enable)? 'disabled': null?> type="number" data-mealid="<?=$get_meals_row->meal_id?>" min="2" max="10" value="0" />
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-header">
                            Your Selections
                        </div>
                        <div class="card-body">
                            <h6 id="mealCount">Please select a minimun of 6 meals</h6>
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Meal</th>
                                        <th>Qty</th>
                                    </tr>
                                </thead>
                                <tbody id="selections">
                                </tbody>
                            </table>
                            <h6>Choose your desired delivery date and time*</h6>
                            <small class="alert alert-warning" style="display: block;">
                                *The date you choose below is subject to availability.<br />
                                An estimated delivery date will be provided once you add your order to the shopping cart.
                            </small>
                            <div id="pickUpDate">
                                <?=$generate_calendar?>
                                <div id="errorMessage" class="d-none alert alert-danger" role="alert"></div>
                            </div>
                            <div class="form-group">
                                <!-- <input type="time" class="form-control" value="08:00" name="deliveryTime" min="08:00" max="18:00" required /> -->
                                <select class="form-control" name="deliveryTime">
                                    <?php for($i = 8; $i < 19; $i++):?>
                                        <?php $date = date_create($i.':00'); ?>
                                        <?php $formattedDate = date_format($date, 'g:i');?>
                                        <?php $displayDate = date_format($date, 'g:i A');?>
                                        <option value="<?=$i?>:00"><?=$displayDate?></option>
                                    <?php endfor; ?>
                                </select>
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
