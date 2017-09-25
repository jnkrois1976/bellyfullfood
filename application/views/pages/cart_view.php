<?php
    setlocale(LC_MONETARY, 'en_US');
    $meal_cookie = $this->input->cookie('mealInCart');
    $parse_cookie = ($meal_cookie != null)? json_decode($meal_cookie): null;
    if($this->input->post('meals') != null){
        $post_data = $this->input->post('meals');
    }elseif ($meal_cookie) {
        $post_data  = $parse_cookie->meals;
    }else{
        $post_data = FALSE;
    }
    $meal_names = array_values($meal_names);
    $total_price = 0;
    $total_meals = 0;
?>
<div id="cart" class="container">
    <?php if($post_data): ?>
        <div class="row">
            <div class="col">
                <h1 class="pageTitle">Order Review</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8">
                <form id="cartForm" method="post" action="/place_order">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-header">Your selections are</div>
                                <div class="card-body">
                                    <table class="table table-sm table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Qty</th>
                                                <th>Meal</th>
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
                                                                <?=$meal_names[$key]?>
                                                                <input type="hidden" value="<?=$meal_names[$key]."-".$value?>" name="name[]"/>
                                                            </td>
                                                        </tr>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            <?php elseif(!$post_data): ?>
                                                <tr>
                                                    <td colspan="2">
                                                        There is nothing in the cart yet.
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-header">Your delivery date</div>
                                <div class="card-body">
                                    <h3><?=($this->input->post('formattedDate') != null)? $this->input->post('formattedDate'): $parse_cookie->formattedDate?></h3>
                                    <p>
                                        <?php $date = date_create(($this->input->post('deliveryTime') != null)? $this->input->post('deliveryTime'): $parse_cookie->deliveryTime); ?>
                                        at around <?=date_format($date, 'g:i A')?>
                                    </p>
                                    <p>
                                        Please review our <a href="/faq">deliveries policy</a> for more information.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr />
                    <fieldset>
                        <input type="hidden" value="<?=$this->input->post('deliveryTime')?>" name="deliveryTime" />
                        <input type="hidden" value="<?=$this->input->post('rawDate')?>" name="rawDate" />
                        <input type="hidden" value="<?=$this->input->post('formattedDate')?>" name="formattedDate" />
                        <input type="hidden" name="order_total" value="<?=money_format('%i', $total_price)?>"/>
                        <input id="serviceTotal" type="hidden" value="<?=$total_price?>" name="serviceTotal" />
                        <legend><h4>Contact and Payment Information</h4></legend>
                        <div class="row">
                            <div class="col">
                                <div class="form-row">
                                    <div class="col-sm-4">
                                        <label>Name</label>
                                        <input value="Juan Rois" type="text" class="form-control" name="customerName" placeholder="full name" required/>
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Email address</label>
                                        <input value="jnkrois@gmail.com" type="email" class="form-control" name="customerEmail" placeholder="name@example.com" required/>
                                    </div>
                                    <div class="col-sm-4">
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
                                    <div class="col-sm-4">
                                        <label >Delivery Address</label>
                                        <input value="9045" class="form-control" id="street_number" name="street_number" required placeholder="Street number" />
                                    </div>
                                    <div class="col-sm-4 d-flex align-items-end">
                                        <input value="Watercrest Cir W" class="form-control" id="route" name="route" required placeholder="Street name"/>
                                    </div>
                                    <div class="col-sm-4 d-flex align-items-end">
                                        <input class="form-control" id="shippingAptNumber" name="shippingAptNumber" placeholder="Apt number"/>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-4">
                                        <input value="Parkland" class="form-control" name="locality" required placeholder="City" />
                                    </div>
                                    <div class="col-sm-4">
                                        <input value="FL" class="form-control"name="administrative_area_level_1" required placeholder="State" />
                                    </div>
                                    <div class="col-sm-4">
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
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <input value="" class="form-control" id="sq-card-number" name="cardNumber" type="text" placeholder="Credit Card Number" required="required"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
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
                                        <input value="" id="sq-expiration-date" class="form-control" name="sq-expiration-date" type="text" placeholder="MM/YY" required="required" />
                                    </div>
                                    <div class="col-sm-4">
                                        <input value="" class="form-control" id="sq-cvv" name="cardCvv" type="text" placeholder="CVV..." required="required"/>
                                    </div>
                                    <div class="col-sm-4">
                                        <input value="" type="text" id="sq-postal-code" name="sq-postal-code" class="form-control" placeholder="Zip Code" required="required" />
                                        <input type="hidden" id="card-nonce" name="nonce_value">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header">Your order</div>
                    <div class="card-body">
                        <table class="table table-sm table-bordered table-striped">
                            <colgroup>
                                <col width="10%">
                                <col width="60%">
                                <col width="30%">
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
                                    <td class="text-right">$8.50 <sup>each</sup></td>
                                </tr>
                                <tr>
                                    <td>-</td>
                                    <td>Delivery</td>
                                    <td class="text-right">$<?=money_format('%i',0)?></td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="currency">Total</td>
                                    <td class="currency text-right">
                                        $<?=money_format('%i', $total_price)?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div id="errors" style="display:none;"></div>
                        <?php if($post_data): ?>
                            <!-- <button type="submit" form="cartForm" class="btn btn-primary btn-lg btn-block">Place order</button> -->
                            <button onclick="requestCardNonce(event)" type="submit" class="btn btn-primary btn-lg btn-block">Place order</button>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php elseif(!$post_data): ?>
        <div class="row empty">
            <div class="col text-center">
                <h3>Your cart is empty</h3>
            </div>
        </div>
    <?php endif; ?>
</div>
