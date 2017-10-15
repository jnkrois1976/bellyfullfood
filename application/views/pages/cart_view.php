<?php
setlocale(LC_MONETARY, 'en_US');
$meal_cookie = $this->input->cookie('mealInCart');
$parse_cookie = ($meal_cookie != null)? json_decode($meal_cookie): null;
if($this->input->post('meals') != null){
    $meals_data = $this->input->post('meals');
    $prices_data = $this->input->post('prices');
}elseif ($meal_cookie) {
    $meals_data  = $parse_cookie->meals;
    $prices_data = $parse_cookie->prices;
}else{
    $meals_data = FALSE;
    $prices_data = FALSE;
}
$meal_names = array_values($meal_names);
$total_price = 0;
$total_meals = 0;
?>
<div id="loading" class="loading">
    <figure>
        <img src="/img/loading.svg" alt="Processing. Please wait..." />
        <figcaption>Processing. Please wait...</figcaption>
    </figure>
</div>
<div id="cart" class="container">
    <?php if($meals_data): ?>
        <form id="cartForm" method="post" action="/place_order">
            <div class="row">
                <div class="col">
                    <h1 class="pageTitle">Order Review</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-7">
                    <div class="card mb-3">
                        <div class="card-header">Contact and Payment Information</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="form-row">
                                        <div class="col-sm-12">
                                            <label>Your Contact Information</label>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-sm-4">
                                            <input value="" type="text" class="form-control" name="customerName" placeholder="full name" required/>
                                        </div>
                                        <div class="col-sm-4">
                                            <input value="" type="email" class="form-control" name="customerEmail" placeholder="name@example.com" required/>
                                        </div>
                                        <div class="col-sm-4">
                                            <input value="" type="phone" class="form-control" name="customerPhone" placeholder="Phone number" required/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <hr />
                                    <div class="form-row">
                                        <div class="col-sm-12">
                                            <label>Your Delivery Address</label>
                                        </div>
                                    </div>
                                    <div class="form-row deliveryAddress">
                                        <div class="col-sm-4">
                                            <input value="" class="form-control" name="delivery_street_number" placeholder="Street number" required/>
                                        </div>
                                        <div class="col-sm-4 d-flex align-items-end">
                                            <input value="" class="form-control" name="delivery_route" placeholder="Street name" required/>
                                        </div>
                                        <div class="col-sm-4 d-flex align-items-end">
                                            <input class="form-control" name="delivery_shippingAptNumber" placeholder="Apt number"/>
                                        </div>
                                    </div>
                                    <div class="form-row deliveryAddress">
                                        <div class="col-sm-4">
                                            <select id="selectedCity" class="custom-select w-100 form-control" onchange="APP.events.updateZipCode(event)" name="delivery_locality" placeholder="Select your city" required>
                                                <option value=""></option>
                                                <option value="Boca Raton">Boca Raton</option>
                                                <option value="Delray Beach">Delray Beach</option>
                                                <option value="Coral Springs">Coral Springs</option>
                                                <option value="Parkland">Parkland</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <input value="FL" readonly class="form-control" name="delivery_administrative_area_level_1" required/>
                                        </div>
                                        <div class="col-sm-4">
                                            <select id="deliveryZip" class="custom-select w-100 form-control" name="delivery_postal_code" required>
                                                <option>Zip Code</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" checked class="custom-control-input" onclick="APP.events.toggleDeliveryFields(event)">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">My delivery address is the same as my billing address</span>
                                        </label>
                                    </div>
                                    <div class="form-row billingAddress">
                                        <div class="col-sm-12">
                                            <label>Billing Address</label>
                                        </div>
                                    </div>
                                    <div class="form-row billingAddress">
                                        <div class="col-sm-4">
                                            <input value="" class="form-control billingField" name="street_number" placeholder="Street number" />
                                        </div>
                                        <div class="col-sm-4 d-flex align-items-end">
                                            <input value="" class="form-control billingField" name="route" placeholder="Street name"/>
                                        </div>
                                        <div class="col-sm-4 d-flex align-items-end">
                                            <input class="form-control" name="shippingAptNumber" placeholder="Apt number"/>
                                        </div>
                                    </div>
                                    <div class="form-row billingAddress">
                                        <div class="col-sm-4">
                                            <input value="" class="form-control billingField" name="locality" placeholder="City" />
                                        </div>
                                        <div class="col-sm-4">
                                            <input value="" class="form-control billingField" name="administrative_area_level_1" placeholder="State" />
                                        </div>
                                        <div class="col-sm-4">
                                            <input value="" class="form-control billingField" name="postal_code" placeholder="Zip code"/>
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="form-row">
                                        <div class="col-sm-6">
                                            <label>Your Credit Card Information</label>&nbsp;
                                        </div>
                                        <div class="col-sm-6 text-right">
                                            <div class="card-logos">
                                                <img src="/img/visa.png" alt="Visa"/>
                                                <img src="/img/master-card.png" alt="Master Card"/>
                                                <img src="/img/amex.png" alt="American Express"/>
                                                <img src="/img/discover.png" alt="Discover"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <input value="" class="form-control" id="sq-card-number" name="cardNumber" type="text" placeholder="Credit Card Number" required/>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <input value="" id="sq-expiration-date" class="form-control" name="sq-expiration-date" type="text" placeholder="MM/YY" required />
                                        </div>
                                        <div class="col-sm-2">
                                            <input value="" class="form-control" id="sq-cvv" name="cardCvv" type="text" placeholder="CVV..." required/>
                                        </div>
                                        <div class="col-sm-3">
                                            <input value="" type="text" id="sq-postal-code" name="sq-postal-code" class="form-control" placeholder="Zip Code" required/>
                                            <input type="hidden" id="card-nonce" name="nonce_value">
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="form-row">
                                        <div class="col-sm-12">
                                            <label>Comments</label><br />
                                            <small>Plese type below any special request regarding ingredients.<br />
                                            Or specific instructions to deliver your order, such as gate codes.</small>
                                            <textarea class="form-control" name="comments" rows="4" cols=""></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="card mb-3">
                        <div class="card-header">Order Sumary</div>
                        <div class="card-body">
                            <table class="table table-sm table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Qty</th>
                                        <th>Description</th>
                                        <th>Cost</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($meals_data as $key => $value): ?>
                                        <?php if($value > 0): ?>
                                            <?php
                                            $total_price += $prices_data[$key] * $value;
                                            $total_meals += $value;
                                            ?>
                                            <tr>
                                                <td class="text-center" >
                                                    <?=$value?>
                                                </td>
                                                <td>
                                                    <?=$meal_names[$key]?>
                                                    <input type="hidden" value="<?=$meal_names[$key]."-".$value?>" name="name[]"/>
                                                </td>
                                                <td class="text-right" >
                                                    $<?=money_format('%i', $prices_data[$key]*$value)?>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                    <?php if($this->config->item('enable_coupons')): ?>
                                    <tr>
                                        <td class="text-center">-</td>
                                        <td id="couponInputDisplay">
                                            <div class="form-group mb-0">
                                                <input class="form-control form-control-sm mb-0" type="text" value="" placeholder="Coupon Code" name="couponCode" id="couponCode" />
                                            </div>
                                            <div class="alert alert-danger mt-1 mb-1 p-1" id="couponError">test</div>
                                        </td>
                                        <td class="text-right" id="couponAmountDisplay">- $0.00</td>
                                    </tr>
                                    <?php elseif(!$this->config->item('enable_coupons')):?>
                                        <input type="hidden" value="" name="couponCode" id="couponCode" />
                                    <?php endif; ?>
                                    <tr>
                                        <td class="text-center">-</td>
                                        <td>Taxes</td>
                                        <td class="text-right" id="taxesDisplay">$<?=money_format('%i',0)?></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">-</td>
                                        <td>Delivery</td>
                                        <td class="text-right" id="taxesDisplay">$0.00</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="currency">Total</td>
                                        <td class="currency text-right" id="totalDisplay">
                                            $<?=money_format('%i', $total_price)?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <hr />
                            <h4>Your <sup>*</sup>requested delivery date is:</h4>
                            <p>
                                <?php $date = date_create(($this->input->post('deliveryTime') != null)? $this->input->post('deliveryTime'): $parse_cookie->deliveryTime); ?>
                                <?=($this->input->post('formattedDate') != null)? $this->input->post('formattedDate'): $parse_cookie->formattedDate?> at around <?=date_format($date, 'g:i A')?>
                            </p>
                            <p>
                                <sup>*</sup>Please review our <a href="/faq">deliveries policy</a> for more information.
                            </p>
                            <div id="errors" style="display:none;" class="alert alert-danger" role="alert"></div>
                            <div id="formFailedMsg" class="alert alert-danger">
                                Please check the fields! I think you missed something.
                            </div>
                            <input type="hidden" value="<?=date_format($date, 'g:i A')?>" name="deliveryTime" />
                            <input type="hidden" value="<?=$this->input->post('rawDate')?>" name="rawDate" />
                            <input type="hidden" value="<?=($this->input->post('formattedDate') != null)? $this->input->post('formattedDate'): $parse_cookie->formattedDate?>" name="formattedDate" />
                            <input type="hidden" value="<?=money_format('%i', $total_price)?>" name="orderTotal" id="orderTotal" />
                            <input type="hidden" value="" name="taxesTotal" id="taxesTotal">
                            <input type="hidden" value="<?=$total_price?>" name="serviceTotal" id="serviceTotal" />
                            <input type="hidden" name="transactionStatus" id="transactionStatus" value="">
                            <input type="hidden" name="transactionId" id="transactionId" value="">
                            <input type="hidden" id="couponApplied" name="couponApplied" value="">
                            <!-- <button type="submit" form="cartForm" class="btn btn-primary btn-lg btn-block">Place order</button> -->
                            <button onclick="requestCardNonce(event)" type="submit" class="btn btn-primary btn-lg btn-block">Place order</button>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-6 text-center">
                            <div style="width: 164px; height: 98px;">
                                <a href="#" onclick="window.open('https://www.sitelock.com/verify.php?site=www.bellyfullfoods.com','SiteLock','width=600,height=600,left=160,top=170');" >
                                    <img class="img-responsive" alt="SiteLock" title="SiteLock" src="//shield.sitelock.com/shield/www.bellyfullfoods.com" />
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-6 text-center">
                            <img src="/img/pay-with-square.png" alt="Powered by Square" style="height:80px; width: auto;" />
                        </div>
                    </div>
                </div>
            </div>
        </form>

    <?php elseif(!$meals_data): ?>
        <div class="row empty">
            <div class="col text-center">
                <h3>Your cart is empty</h3>
            </div>
        </div>
    <?php endif; ?>
</div>
