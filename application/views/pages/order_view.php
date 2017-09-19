<div id="order" class="container">
    <div class="row">
        <div class="col">
            <h1 class="pageTitle">Place Your Order</h1>
            <h4>Choose your meals and the quantity below</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form class="row" method="post" action="/cart">
                <div class="col-8">
                    <table class="table table-bordered table-striped">
                        <colgroup>
                            <col width="5%">
                            <col width="15%">
                            <col width="60%">
                            <col width="15%">
                        </colgroup>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th colspan="2">Meal </th>
                                <th>Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($get_meals as $get_meals_row): ?>
                                <tr>
                                    <th scope="row" class="align-middle text-center"><?=$get_meals_row->id?></th>
                                    <td><img src="<?=$get_meals_row->meal_img_name?>" alt="<?=$get_meals_row->meal_title?>"></td>
                                    <td class="align-middle"><h5><?=$get_meals_row->meal_title?></h5></td>
                                    <td class="align-middle text-center">
                                        <input name="<?=$get_meals_row->meal_id?>" data-mealname="<?=$get_meals_row->meal_title?>" class="mealQty" <?=(!$get_meals_row->meal_enable)? 'disabled': null?> type="number" data-mealid="<?=$get_meals_row->meal_id?>" min="0" max="9" value="0" />
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
                            <button disabled id="placeOrder" type="submit" class="btn btn-primary btn-block">Place Order</button>
                            <!-- <a routerLink="/cart" class="btn btn-primary btn-lg btn-block">Place order</a> -->
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
