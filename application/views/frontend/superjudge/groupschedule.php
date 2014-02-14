<script src="<?php echo base_url(); ?>assets/backend/js/jquery/table/jquery.dataTables.min.js" language="javascript" type="text/javascript"></script>
<link type="text/css"  rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/js/jquery/table/table.css" />
<script type="text/javascript">
    var table = null;
    $('#tableData').ready(function() {
        $(".delete").click(function(event) {
            event.preventDefault();
            var el = this;
            var url = $(el).attr("href");
            jui.jconfirm("Are you sure you want to cancel this judging interview?", function() {
                $.ajax({
                    url: url,
                    type: "post",
                    success: function() {
                        table.fnDeleteRow(table.fnGetPosition($(el).parent("td")[0])[0]);
                    }
                });
            }, function() {
            }, "Ok", "Cancel");
        });
        table = $('#tableData').dataTable();
        $(window).bind('resize', function() {
            table.fnAdjustColumnSizing();
        });
    });
    $(function() {
        var createPrint = function() {
            var printbtn = document.createElement("button");
            printbtn.setAttribute("class", "intel-btn intel-btn-cancel");
            printbtn.setAttribute("style", "float:right");
            printbtn.innerHTML = "Print This Page";
            $(".contant-contaner").append(printbtn);
            $(printbtn).click(function() {
                $("body").children().hide();
                $("article").show();
                $(this).hide();
                var marginTop = $("article").css("margin-top");
                $("article").css("margin-top", "2em");
                //table
                $("#tableData").children("thead").children("tr").children("th").last().hide();
                $("#tableData").children("tbody").children("tr").each(function() {
                    $(this).children("td").last().hide();
                });
                $("#tableData").css("width", "99%");
                //
                window.print();
                //table
                $("#tableData").children("thead").children("tr").children("th").last().show();
                $("#tableData").children("tbody").children("tr").each(function() {
                    $(this).children("td").last().show();
                });
                table.fnAdjustColumnSizing();
                $("body").children().show();
                $("article").css("margin-top", marginTop);
                $(this).show();
            });
        };
        createPrint();
        $("#assign").click(function() {
            showAssign();
        });
        var showAssign = function() {
            jui.jconfirm($("#assiging").html(), function() {
                
                var project = $("select#project:visible option:selected").val();
                var judge = $("select#judge:visible option:selected").val();
                jui.jloading("Saving New Interview");
                $.ajax({
                    url: '<?= base_url() . "judgeshead/home/assignProjectToJudge" ?>',
                    data: {
                        project: project,
                        judge: judge
                    },
                    success: function(res) {
                        if (res === "exist") {
                            jui.jalert("Interview already exists!");
                        } else
                            window.location.reload();
                    }
                });
            }, null, "Assign", "Cancel");
        };
    });
</script>
<div class="intel-tab" id="tabs" init="true">
    <ul style="margin-top: 10px;">
        <li><a href="<?= base_url(); ?>judgeshead/home" tab="#admins" >Projects</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/home/judges" tab="#judges">Judges</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/home/schedule" class="active" tab="#judges">Judging Schedule</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/home/groups" tab="#judges">Groups</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/categories/home" tab="#judges">Categories</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/home/scores" tab="#judges">Scores</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/home/finalwinners" tab="#judges">Finals</a></li>
    </ul>
    <hr class="intel-tab-divider">
</div>
<article class="intel-tab-content">
    <section class="active" id="teams">
        <span class="Content-body">
            <h2 id="Admin">Judging Schedule</h2>
            <hr/>
            <div style="display: none;" id="assiging">
                <p id="ass">
                    <label> Assign </label>
                    <select id="judge">
                        <?php foreach ($judges as $j) { ?>
                            <option value="<?= $j->id ?>"><?= $j->name ?></option>
                        <? } ?>
                    </select>
                    <label> For </label>
                    <select id="project">
                        <?php foreach ($projects as $p) { ?>
                            <option value="<?= $p->id ?>"><?= $p->name ?></option>
                        <? } ?>
                    </select>
                </p>
            </div>
            <div class="contant-contaner">
                <table cellpadding="0" cellspacing="0" border="0" class="intel-table intel-table-zebra intel-sortable" id="tableData">
                    <thead>
                        <tr class="">
                            <th style="cursor: pointer;" class="">Judge</th>
                            <th style="cursor: pointer;" class="">Project Code</th>
                            <th style="cursor: pointer;" class="">Project Name</th>
                            <th style="cursor: pointer;" class="">Slot/Interview Number</th>
                            <th style="cursor: pointer;" class="">Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $category = $group->category->get();
                        $category->schedule->get();
                        foreach ($category->schedule as $sched) {
                            ?>
                            <tr>
                                <td>
                                    <?php
                                    $sched->judge->get();
                                    echo $sched->judge->name
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $sched->project->get();
                                    $sched->project->category->get();
                                    echo $sched->project->category->code . "-" . $sched->project->id
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $sched->project->get();
                                    echo $sched->project->name
                                    ?>
                                </td>
                                <td>
                                    <?php echo $sched->slotnumber ?>
                                </td>
                                <td>
                                    <a class="delete" href="<?= base_url() ?>judgeshead/schedules/removeinterview/<?= $sched->id ?>">remove</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot></tfoot>

                </table>
                <button class="" id="assign">Assign judge to Project</button>
            </div>
        </span>
    </section>
</article>