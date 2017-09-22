<?php
setlocale(LC_MONETARY, 'en_US');
$post_data = $this->input->post();
$meal_data = array(
    '1001' => 'Buffalo Chicken',
    '1002' => 'Chicken Fajitas',
    '1003' => 'Chicken Kabobs',
    '1004' => 'Chicken Parmesan',
    '1005' => 'Chicken Teriyaki',
    '1006' => 'Mojo Pork',
    '1007' => 'Pesto Chicken',
    '1008' => 'Pesto Shrimp',
    '1009' => 'Steak Fajitas',
    '1010' => 'Surf & Turf',
    '1011' => 'Spring Mix Salad ~VEGAN~',
    '1012' => 'Turkey-Quinoa Meatballs',
    '1013' => 'Grilled Pork Tenderloin',
    '1014' => 'Grilled Chicken Breast',
    '1015' => 'BBQ Chicken Breast',
    '1016' => 'Wild-Caught Atlantic Salmon',
    '1017' => 'Skirt Steak'
);
$total_price = 0;
$total_meals = 0;
?>
<div id="cart" class="container">
    <div class="row">
        <div class="col">
            <h1 class="pageTitle">Order Review</h1>
            <h4>Your selections are:</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-8">
            <form id="cartForm" method="post" action="/thank_you">
                <table class="table table-sm table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Qty</th>
                            <th>Meal</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($post_data): ?>
                            <?php foreach($post_data as $key => $value): ?>
                                <?php if($value > 0): ?>
                                    <?php
                                    $total_price += 8.50 * $value;
                                    $total_meals += $value;
                                    ?>
                                    <tr>
                                        <td>
                                            <?=$value?>
                                        </td>
                                        <td>
                                            <?=$meal_data[$key]?>
                                            <input type="hidden" value="<?=$key."-".$value?>" name="name[]"/>
                                        </td>
                                        <td>
                                            $8.50
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php elseif(!$post_data): ?>
                            <tr>
                                <td colspan="2">
                                    There is nothing in the cart yet.
                                </td>
                                <td>&nbsp;</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
                <hr />
                <fieldset>
                    <input type="hidden" name="order_total" value="<?=money_format('%i', $total_price)?>"/>
                    <input id="serviceTotal" type="hidden" value="<?=$total_price?>" name="serviceTotal" />
                    <legend><h4>Contact and Payment Information</h4></legend>
                    <div class="row">
                        <div class="col">
                            <div class="form-row">
                                <div class="col">
                                    <label>Name</label>
                                    <input value="Juan Rois" type="text" class="form-control" name="customerName" placeholder="full name" required/>
                                </div>
                                <div class="col">
                                    <label>Email address</label>
                                    <input value="jnkrois@gmail.com" type="email" class="form-control" name="customerEmail" placeholder="name@example.com" required/>
                                </div>
                                <div class="col">
                                    <label>Phone Number</label>
                                    <input value="305-496-1989" type="phone" class="form-control" name="customerPhone" placeholder="phone number" required/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <hr />
                            <div id="address" class="form-row">
                                <div class="col ">
                                    <label >Delivery Address</label>
                                    <input value="9045" class="form-control" id="street_number" name="street_number" required placeholder="Street number" />
                                </div>
                                <div class="col d-flex align-items-end">
                                    <input value="Watercrest Cir W" class="form-control" id="route" name="route" required placeholder="Street name"/>
                                </div>
                                <div class="col d-flex align-items-end">
                                    <input class="form-control" id="shippingAptNumber" name="shippingAptNumber" placeholder="Apt number"/>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <input value="Parkland" class="form-control" name="locality" required placeholder="City" />
                                </div>
                                <div class="col">
                                    <input value="FL" class="form-control"name="administrative_area_level_1" required placeholder="State" />
                                </div>
                                <div class="col">
                                    <input value="33076" class="form-control" name="postal_code" required placeholder="Zip code"/>
                                </div>
                            </div>
                            <hr />
                            <div class="form-row">
                                <div class="col">
                                    <label>Credit Card Information</label>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <input value="" class="form-control" id="sq-card-number" name="cardNumber" type="text" placeholder="Credit Card Number" required="required"/>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card-logos">
                                        <img src="/img/visa.png" alt="Visa"/>
                                        <img src="/img/master-card.png" alt="Master Card"/>
                                        <img src="/img/amex.png" alt="American Express"/>
                                        <img src="/img/discover.png" alt="Discover"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <input value="" id="sq-expiration-date" class="form-control" name="sq-expiration-date" type="text" placeholder="MM/YY" required="required" />
                                </div>
                                <div class="col">
                                    <input value="" class="form-control" id="sq-cvv" name="cardCvv" type="text" placeholder="CVV..." required="required"/>
                                </div>
                                <div class="col">
                                    <input value="" type="text" id="sq-postal-code" name="sq-postal-code" class="form-control" placeholder="Zip Code" required="required" />
                                    <input type="hidden" id="card-nonce" name="nonce">
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-header">Your meal package</div>
                <div class="card-body">
                    <table class="table table-sm table-bordered table-striped">
                        <colgroup>
                            <col width="20%">
                            <col width="60%">
                            <col width="20%">
                        </colgroup>
                        <thead>
                            <tr>
                                <th>Qty</th>
                                <th>Description</th>
                                <th>Cost</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?=$total_meals?></td>
                                <td>Meals</td>
                                <td>$<?=money_format('%i', $total_price)?></td>
                            </tr>
                            <tr>
                                <td>-</td>
                                <td>Delivery</td>
                                <td>$<?=money_format('%i',0)?></td>
                            </tr>
                            <tr>
                                <td class="currency">Total</td>
                                <td colspan="2" class="currency">
                                    $<?=money_format('%i', $total_price)?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <?php if($post_data): ?>
                        <button onclick="submitButtonClick()" type="submit" class="btn btn-primary btn-lg btn-block">Place order</button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
