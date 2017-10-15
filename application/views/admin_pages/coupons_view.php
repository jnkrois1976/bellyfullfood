
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <h1>Create new coupon</h1>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Amount</th>
                        <th>Expires</th>
                        <th>Enable/Disable</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                    <tr>
                        <form method="post" action="/admin/create_coupon">
                            <td>
                                <div class="form-group">
                                    <input class="form-control" name="coupon_name" type="text" value=""/>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input class="form-control" name="coupon_amount" type="text" value=""/>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input class="form-control" name="coupon_expires" type="date" value=""/>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <label class="switch">
                                        <input type="checkbox" checked name="coupon_enable">
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input name="submit" type="submit" value="Create coupon" class="form-control btn btn-primary" />
                                </div>
                            </td>
                        </form>
                    </tr>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h1>Update coupons</h1>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Amount</th>
                        <th>Expires</th>
                        <th>Enable/Disable</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <?php foreach($coupons as $coupons_row): ?>
                    <tr>
                        <form method="post" action="/admin/update_coupon">
                            <td>
                                <div class="form-group">
                                    <input type="hidden" value="<?=$coupons_row->coupon_id?>" name="coupon_id" />
                                    <input class="form-control" name="coupon_name" type="text" onchange="APP.events.enableSubmit(event)" onblur="APP.events.disableInput(event)" ondblclick="APP.events.editInputEvent(event)" readonly value="<?=$coupons_row->coupon_name?>">
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input class="form-control" name="coupon_amount" onchange="APP.events.enableSubmit(event)" onblur="APP.events.disableInput(event)" ondblclick="APP.events.editInputEvent(event)" readonly value="<?=$coupons_row->coupon_amount?>">
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input class="form-control" name="coupon_expires" type="date" onchange="APP.events.enableSubmit(event)" onblur="APP.events.disableInput(event)" ondblclick="APP.events.editInputEvent(event)" readonly value="<?=$coupons_row->coupon_expires?>">
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <label class="switch">
                                        <?php if($coupons_row->coupon_enable): ?>
                                            <input type="checkbox" checked name="coupon_enable" onchange="APP.events.enableSubmit(event)">
                                        <?php elseif(!$coupons_row->coupon_enable): ?>
                                            <input type="checkbox" name="coupon_enable" onchange="APP.events.enableSubmit(event)">
                                        <?php endif; ?>
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input name="submit" disabled type="submit" value="Update" class="form-control btn btn-primary" />
                                </div>
                            </td>
                        </form>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>
