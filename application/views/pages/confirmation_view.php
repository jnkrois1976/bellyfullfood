<div id="confirmation" class="container">
    <div class="row">
        <div class="col">
            <h1 class="pageTitle">Thank You</h1>
            <h4>Your order has been submitted succesfully</h4>
        </div>
    </div>
    <div class="row d-flex">
        <div class="col-8">
            <div class="card bg-light mb-3">
                <div class="card-header"><h1>Order number: <?=$order_details['order_number']?></h1></div>
                <div class="card-body">
                    <h4 class="card-title">Order Details</h4>
                    <table class="table table-bordered table-sm">
                        <colgroup>
                            <col width="10%" />
                            <col width="60%" />
                            <col width="30%" />
                        </colgroup>
                        <thead>
                            <tr>
                                <th class="text-center">Qty</th>
                                <th>Item</th>
                                <th class="text-right">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $meals = explode(',', $order_details['order_meals']);
                                array_pop($meals);
                            ?>
                            <?php for ($i=0; $i < count($meals) ; $i++): ?>
                                <tr>
                                    <?php $break_meal = explode('-', $meals[$i]); ?>
                                    <td class="text-center"><?=$break_meal[0]?></td>
                                    <td class="text-left"><?=$break_meal[1]?></td>
                                    <?php if($i == 0): ?>
                                        <td rowspan="<?=count($meals)?>" class="currency">$<?=money_format('%i', $order_details['order_dollar_amount'])?></td>
                                    <?php endif; ?>
                                </tr>
                            <?php endfor; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card text-white bg-info mb-3" style="max-width: 20rem;">
                <div class="card-header">We're Cooking</div>
                <div class="card-body">
                    <h4 class="card-title">Need anything else?</h4>
                    <p class="card-text">Please email us at info@bellyfullfoods.com if you have any questions.</p>
                    <p>
                        Also, we have sent an email to <?=$order_details['cust_email']?> with the order details.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div  class="col">
            <div class="card mb-3">
                <div class="card-body">
                    <small>
                        * At Belly Full Foods, we do our best to make sure the majority of our menu consists of the highest quality organic and/or non-GMO ingredients, although some of these ingredients may not be available in their organic or non-GMO varieties at certain times.
                        For more information, please email us at info@bellyfullfoods.com.
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>
