<div class="card-header"><h1>Order number: <?=$last_order['order_number']?></h1></div>
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
                $meals = explode(',', $last_order['order_meals']);
                array_pop($meals);
            ?>
            <?php for ($i=0; $i < count($meals) ; $i++): ?>
                <tr>
                    <?php $break_meal = explode('-', $meals[$i]); ?>
                    <td class="text-center"><?=$break_meal[0]?></td>
                    <td class="text-left"><?=$break_meal[1]?></td>
                    <?php if($i == 0): ?>
                        <td rowspan="<?=count($meals)?>" class="currency">$<?=money_format('%i', $last_order['order_dollar_amount']+$last_order['order_taxes_amount'])?></td>
                    <?php endif; ?>
                </tr>
            <?php endfor; ?>
        </tbody>
    </table>
    <h4>Your aproximate delivery date and time:</h4>
    <p>
        <?php $date = date_create($last_order['delivery_time']); ?>
        <?=$last_order['delivery_date']." around ".date_format($date, 'g:i A')?>
    </p>
</div>
