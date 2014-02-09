<label>Sub-category</label>
<label>
    <img id="add_subcategory" onclick="loadAddPage()" src="<?=base_url()?>/assets/backend/image/add_small.png" style="cursor: pointer"/>
</label>
<table style="width: 100%" class="intel-table intel-table-zebra intel-sortable">
    <thead>
        <tr style="width: 100%">
            <th style="width: 30%">
                Name
            </th>
            <th style="width: 50%">
                Description
            </th>
            <th style="width: 10%">
                Code
            </th>
            <th style="width: 10%">
                Manage
            </th>
        </tr>
    </thead>
    <?php
    $i = 0;
    foreach ($subcategories as $subcategory) {
        $class = ($i++ % 2) == 0 ? "odd" : "even";
        echo '<tr class="' . $class . '" >';
        echo '<td>';
        echo $subcategory->name;
        echo '</td>';

        echo '<td>';
        echo $subcategory->description;
        echo '</td>';

        echo '<td>';
        echo $subcategory->code;
        echo '</td>';

        echo '<td>';
        echo "<img class='edit' onclick='edit_item(this)' cat_id='" . $subcategory->category_id . "' item_id='" . $subcategory->id . "' style='cursor: pointer; float:left' src='" . base_url() . "assets/backend/image/edit_small.png' />";
        echo "<img class='delete' onclick='delete_item(this)' cat_id='" . $subcategory->category_id . "' item_id='" . $subcategory->id . "' style='cursor: pointer; float:right' src='" . base_url() . "assets/backend/image/delete_small.png' />";
        echo '</td>';

        echo '</tr>';
    }
    ?>
</table>