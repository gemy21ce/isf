<script src="<?php echo base_url(); ?>assets/backend/js/jquery/table/jquery.dataTables.min.js" language="javascript" type="text/javascript"></script>
<?php if (!isset($error)) { ?>
    <script type="text/javascript">
        $('#tableData').ready(function() {
            //            $('#tableData').dataTable();
        });
    </script>
<?php } ?>
<script src="<?php echo base_url(); ?>assets/jquery.validate.min.js"></script>
<script type="text/javascript" >
    $(function() {
        $(".gener").click(function(e) {
            e.preventDefault();
            $("#table").hide();
            $("#createGroupForm").show();
            return false;
        });
        $("form").validate({
            rules: {
                name: {
                    required: true
                },
                name_ar: {
                    required: true
                }
            },
            messages: {
                name: {
                    required: "Group name is Required"
                },
                name_ar: {
                    required: "Group name is Required"
                }
            }
        });
        $(".edit").click(function(event) {
            event.preventDefault();
            var el = this;
            var id = $(el).attr("href");
            $.ajax({
                url: "getGroup",
                type: "get",
                data: {
                    id: id
                },
                success: function(res) {
                    var group = JSON.parse(res);
                    $("#editForm input[name='id']").val(group.id);
                    $("#editForm input[name='name_ar']").val(group.name_ar);
                    $("#editForm input[name='name']").val(group.name);
                    $("#editForm select[name='type']").val(group.type);
                    $("#table").hide();
                    $("#createGroupForm").show();
                    $("#saveGroup").unbind("click").click(function() {
                        if ($("form").valid()) {
                            jui.jloading("Saving Group");
                            $.ajax({
                                url: '<?= base_url() . "judgeshead/home/updategroup" ?>',
                                type: "post",
                                data: $("form").serialize(),
                                success: function() {
                                    window.location.reload();
                                }
                            });
                        }
                    });
                }
            });
        });
        $(".delete").click(function(event) {
            event.preventDefault();
            var el = this;
            var id = $(el).attr("href");
            if (id === "1") {
                jui.jalert("You cannot delete Default Group", function() {
                }, "Ok");
                return;
            }
            jui.jconfirm("Are you sure you want to delete this group? all categories in this group will be moved to Default Group!", function() {
                $.ajax({
                    url: "deletegroup",
                    type: "post",
                    data: {
                        id: id
                    },
                    success: function() {
                        $(el).parent("td").parent("tr").remove();
                    }
                });
            }, function() {
            }, "Ok", "Cancel");
        });
        $("#saveGroup").click(function() {
            if ($("form").valid()) {
                jui.jloading("Saving Group");
                $.ajax({
                    url: '<?= base_url() . "judgeshead/home/savegroup" ?>',
                    type: "post",
                    data: $("form").serialize(),
                    success: function() {
                        window.location.reload();
                    }
                });
            }
        });
        $("#cancel").click(function() {
            $("#table").show();
            $("#createGroupForm").hide();
        });

    });
</script>
<div class="intel-tab" id="tabs" init="true">
    <ul style="margin-top: 10px;">
        <li><a href="<?= base_url(); ?>judgeshead/home" tab="#admins" >Projects</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/home/judges" tab="#judges">Judges</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/schedules/schedule" tab="#judges">Judging Schedule </a></li>
        <li><a href="<?= base_url(); ?>judgeshead/home/groups" class="active" tab="#judges">Groups</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/categories/home" tab="#judges">Categories</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/home/scores" tab="#judges">Scores</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/home/finalwinners" tab="#judges">Finals</a></li>
    </ul>
    <hr class="intel-tab-divider">
</div>
<article class="intel-tab-content">
    <section class="active" id="teams">
        <span class="Content-body">
            <h2 id="Admin">Groups </h2>

            <hr/>
            <div class="contant-contaner">
                <div id="table">
                    <table cellpadding="0" cellspacing="0" border="0" class="intel-table" id="tableData">
                        <thead>
                            <tr class="">
                                <th style="cursor: pointer;" class="">Type</th>
                                <th style="cursor: pointer;" class="">Name</th>
                                <th style="cursor: pointer;" class="">Categories</th>
                                <th style="" class="">Edit</th>
                                <th style="" class="">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($error)) {
                                ?>
                                <tr>
                                    <td colspan="5"><p>No Groups Created</p></td>
                                </tr>
                                <?php
                            } else {
                                foreach ($groups as $g) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?= $g->type == 'engineering' ? "Engineering" : "Scientific" ?>
                                        </td>
                                        <td>
                                            <?= $g->name ?>
                                        </td>
                                        <td>
                                            <?php
                                            $g->category->get();
                                            foreach ($g->category as $cat) {
                                                ?>
                                                <?= $cat->name ?><br/>
                                            <? } ?>
                                        </td>
                                        <td>
                                            <a class="edit" href="<?= $g->id ?>">Edit</a>
                                        </td>
                                        <td>
                                            <a class="delete" href="<?= $g->id ?>">Delete</a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </tbody>
                        <tfoot></tfoot>
                    </table>
                    <!--                    <div style="direction: rtl">
                                            <a class="gener intel-btn intel-btn-action">حفظ قوائم المجموعات</a>
                                        </div>-->
                    <hr/>
                    <?php
                    echo anchor('', 'Create new Group', 'class="gener intel-btn intel-btn-action"');
                    ?>
                </div>
                <div style="display: none;" id="createGroupForm">
                    <form id="editForm" class="intel-form pure-form-aligned">
                        <fieldset>
                            <input type="hidden" name="id" value=""/>
                            <div class="pure-control-group">
                                <label>Name</label>
                                <input type="text" name="name" placeholder="Name">
                            </div>
                            <div class="pure-control-group">
                                <label>Arabic name</label>
                                <input type="text" name="name_ar" placeholder="Name">
                            </div>
                            <div class="pure-control-group">
                                <label>Type </label>
                                <div class="intel-select">													
                                    <select name="type">
                                        <option value="engineering">Engineering</option>
                                        <option value="scientific">Scientific</option>
                                    </select>
                                </div>
                            </div>
                            <button type="button" id="saveGroup" class="intel-btn intel-btn-action">
                                Save
                            </button>
                            <button type="button" id="cancel" class="intel-btn intel-btn-action">
                                Cancel
                            </button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </span>
    </section>
</article>