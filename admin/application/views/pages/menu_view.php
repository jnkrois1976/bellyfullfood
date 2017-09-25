
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <h1>Create new menu item</h1>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Ingredients</th>
                        <th>Heating instructions</th>
                        <th>Nutrition info</th>
                        <th colspan="2">Available</th>
                    </tr>
                </thead>
                    <tr>
                        <form method="post" action="/site/create_menu_item">
                            <td>
                                <div class="form-group">
                                    <input class="form-control" name="meal_title" type="text" value=""/>
                                    <input type="hidden" name="meal_id" value="<?=$last_id+1?>" />
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <textarea class="form-control" name="meal_desc"></textarea>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input class="form-control" name="meal_img_name" type="text" value=""/>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <textarea class="form-control" name="meal_ingredients"></textarea>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <textarea class="form-control" name="meal_heating_inst"></textarea>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <textarea class="form-control" name="meal_nutrition_info"></textarea>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <label class="switch">
                                        <input type="checkbox" checked name="meal_enable">
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input name="submit" type="submit" value="Create new" class="form-control btn btn-primary" />
                                </div>
                            </td>
                        </form>
                    </tr>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h1>Update menu items</h1>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Ingredients</th>
                        <th>Heating instructions</th>
                        <th>Nutrition info</th>
                        <th colspan="2">Available</th>
                    </tr>
                </thead>
                <?php foreach($get_meals as $get_meals_row): ?>
                    <tr>
                        <form method="post" action="/site/update_menu_item">
                            <td>
                                <?=$get_meals_row->id?>
                                <input type="hidden" name="meal_id" value="<?=$get_meals_row->meal_id?>" />
                            </td>
                            <td>
                                <div class="form-group">
                                    <input class="form-control" name="meal_title" type="text" onchange="APP.events.enableSubmit(event)" onblur="APP.events.disableInput(event)" ondblclick="APP.events.editInputEvent(event)" readonly value="<?=$get_meals_row->meal_title?>">
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <textarea class="form-control" name="meal_desc" onchange="APP.events.enableSubmit(event)" onblur="APP.events.disableInput(event)" ondblclick="APP.events.editInputEvent(event)" readonly><?=$get_meals_row->meal_desc?></textarea>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input class="form-control" name="meal_img_name" type="text" onchange="APP.events.enableSubmit(event)" onblur="APP.events.disableInput(event)" ondblclick="APP.events.editInputEvent(event)" readonly value="<?=$get_meals_row->meal_img_name?>">
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <textarea class="form-control" name="meal_ingredients" onchange="APP.events.enableSubmit(event)" readonly onblur="APP.events.disableInput(event)" ondblclick="APP.events.editInputEvent(event)"><?=$get_meals_row->meal_ingredients?></textarea>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <textarea class="form-control" name="meal_heating_inst" onchange="APP.events.enableSubmit(event)" onblur="APP.events.disableInput(event)" ondblclick="APP.events.editInputEvent(event)" readonly><?=$get_meals_row->meal_heating_inst?></textarea>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <textarea class="form-control" name="meal_nutrition_info" onchange="APP.events.enableSubmit(event)" onblur="APP.events.disableInput(event)" ondblclick="APP.events.editInputEvent(event)" readonly><?=$get_meals_row->meal_nutrition_info?></textarea>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <label class="switch">
                                        <?php if($get_meals_row->meal_enable): ?>
                                            <input type="checkbox" checked name="meal_enable" onchange="APP.events.enableSubmit(event)">
                                        <?php elseif(!$get_meals_row->meal_enable): ?>
                                            <input type="checkbox" name="meal_enable" onchange="APP.events.enableSubmit(event)">
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
