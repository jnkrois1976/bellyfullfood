
<div class="container-fluid">
    <div class="row">
        <div class="col">
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
                        <th>Available</th>
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
                                    <input class="form-control" name="meal_title" type="text" readonly value="<?=$get_meals_row->meal_title?>">
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <textarea class="form-control" name="meal_desc" readonly><?=$get_meals_row->meal_desc?></textarea>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input class="form-control" name="meal_img_name" type="text" readonly value="<?=$get_meals_row->meal_img_name?>">
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <textarea class="form-control" name="meal_ingredients" readonly><?=$get_meals_row->meal_ingredients?></textarea>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <textarea class="form-control" name="meal_heating_inst" readonly><?=$get_meals_row->meal_heating_inst?></textarea>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <textarea class="form-control" name="meal_nutrition_info" readonly><?=$get_meals_row->meal_nutrition_info?></textarea>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <label class="switch">
                                        <input type="checkbox">
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </td>
                        </form>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>
