
<article class="intel-tab-content">
    <section id="teams" class="active">
        <span class="Content-body">
            <h2>Import Project</h2>

            <?php
            echo form_open_multipart('admin/projectcontroller/import', array("class" => "intel-form pure-form-stacked", "id" => "project_form", "style" => "padding-left: 25px;"));
            ?>
                <label>CSV file</label>
                <input type="file" id="projectFile" name="projectFile"  class="required"/>
            <?php
            echo form_submit('submit', 'save');

            echo form_close();
            ?>

        </span>
    </section>
</article>