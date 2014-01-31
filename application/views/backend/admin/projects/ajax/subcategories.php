<select id="sub_category_id" name="sub_category_id">
    <?php foreach ($subcategories as $subcategory) { ?>
        <option value="<?= $subcategory->id ?>" ><?= $subcategory->name ?></option>
    <?php } ?>
</select>