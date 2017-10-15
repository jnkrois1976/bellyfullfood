<div class="container-fluid">
    <div class="row">
        <div class="col-6">
            <h1>Orders submitted</h1>
        </div>
        <div class="col-6" id="pagination">
            <?php echo $this->pagination->create_links(); ?>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-striped table-bordered">
                <tr>
                    <th>Order #</th>
                    <th>Status</th>
                    <th>Transaction ID</th>
                    <th>Order date</th>
                    <th>Delivery date</th>
                    <th>Delivery time</th>
                    <th>Meals</th>
                    <th>Coupon</th>
                    <th>Taxes</th>
                    <th>Total</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Delivery address</th>
                </tr>
                <?php foreach($get_orders as $get_orders_row): ?>
                    <tr>
                        <td><?=$get_orders_row->order_number?></td>
                        <td><?=$get_orders_row->transaction_status?></td>
                        <td><?=$get_orders_row->transaction_id?></td>
                        <td><?=$get_orders_row->order_date?></td>
                        <td><?=$get_orders_row->delivery_date?></td>
                        <td>
                            <?php $date = date_create($get_orders_row->delivery_time); ?>
                            <?=date_format($date, 'g:i A')?></td>
                        <td>
                            <?php
                                $meals = explode(',', $get_orders_row->order_meals);
                                array_pop($meals);
                            ?>
                            <?php for ($i=0; $i < count($meals); $i++): ?>
                                <?php $break_meal = explode('-', $meals[$i]); ?>
                                <?=$break_meal[1]?> - Qty:<?=$break_meal[0]."<br />"?>
                            <?php endfor; ?>
                        </td>
                        <td>
                            <?=$get_orders_row->coupon_applied?>
                        </td>
                        <td>$<?=money_format('%i', $get_orders_row->order_taxes_amount)?></td>
                        <td>$<?=money_format('%i', $get_orders_row->order_dollar_amount)?></td>
                        <td><?=$get_orders_row->cust_name?></td>
                        <td><?=$get_orders_row->cust_email?></td>
                        <td><?=$get_orders_row->cust_phone?></td>
                        <td>
                            <?=$get_orders_row->delivery_street_number.' '.$get_orders_row->delivery_street_name?>.<br />
                            <?=($get_orders_row->delivery_apt_number != '')? $get_orders_row->delivery_apt_number."<br />": null?>
                            <?=$get_orders_row->delivery_city.', '.$get_orders_row->delivery_state.' '.$get_orders_row->delivery_zip?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>
