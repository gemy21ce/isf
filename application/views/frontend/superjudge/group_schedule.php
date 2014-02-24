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
            $(".contant-contaner").children("div").last().append(printbtn);
            $(printbtn).click(function() {
                $("body").children().hide();
                $("article").show();
                $("button").hide();
                var marginTop = $("article").css("margin-top");
                $("article").css("margin-top", "2em");
                //table
                $("#tableData").children("thead").children("tr").children("th").last().hide();
                $("#tableData").children("tbody").children("tr").each(function() {
                    $(this).children("td").last().hide();
                });
                $("#tableData").css("width", "99%");
                $(".Footer").addClass('forcedHidden');
                //
                window.setTimeout(function() {
                    window.print();
                    $(".Footer").removeClass('forcedHidden');
                    $("#tableData").children("thead").children("tr").children("th").last().show();
                    $("#tableData").children("tbody").children("tr").each(function() {
                        $(this).children("td").last().show();
                    });
                    table.fnAdjustColumnSizing();
                    $("body").children().show();
                    $("article").css("margin-top", marginTop);
                    $("button").show();
                }, 100);
            });
        };
        createPrint();
        $("#assign").click(function() {
            showAssign();
        });
        $("#back").click(function() {
            window.location.href = "<?= base_url() ?>judgeshead/schedules/schedule";
        });
        $("#deleteAll").click(function() {
            $("input[type='checkbox']:checked").each(function (){
                var el = this;
                $.ajax({
                    url: '<?= base_url() ?>judgeshead/schedules/removeinterview/'+$(el).val(),
                    type: "post",
                    success: function() {
                        table.fnDeleteRow(table.fnGetPosition($(el).parent("td")[0])[0]);
                    }
                });
            });
        });
        var showAssign = function() {
            jui.jconfirm($("#assiging").html(), function() {

                var project = $("select#project:visible option:selected").val();
                var judge = $("select#judge:visible option:selected").val();
                jui.jloading("Saving New Interview");
                $.ajax({
                    url: '<?= base_url() . "judgeshead/schedules/assignProjectToJudge" ?>',
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
        $("a.active").removeClass("active");
        $("a[tab='#schedule']").addClass('active');
    });
</script>
<?= $this->load->view("frontend/superjudge/includes/menu") ?>
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
                            <option value="<?= $p->id ?>"><?= $p->code ?></option>
                        <? } ?>
                    </select>
                </p>
            </div>
            <div class="contant-contaner">
                <table cellpadding="0" cellspacing="0" border="0" class="intel-table intel-table-zebra intel-sortable" id="tableData">
                    <thead>
                        <tr class="">
                            <!--<th style="cursor: pointer;" class=""></th>-->
                            <th style="cursor: pointer;" class="">Judge</th>
                            <th style="cursor: pointer;" class="">Judge Category</th>
                            <th style="cursor: pointer;" class="">Project Code</th>
                            <th style="cursor: pointer;" class="">Project Name</th>
                            <th style="cursor: pointer;" class="">Slot/Interview Number</th>
                            <th style="cursor: pointer;" class="">Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $categories = $group->category->get();
                        foreach ($categories as $category) {
                            $category->schedule->get();
                            foreach ($category->schedule as $sched) {
                                ?>
                                <tr>
<!--                                    <td>
                                        <input type="checkbox" name="id" value="<?= $sched->id ?>"/>
                                    </td>-->
                                    <td>
                                        <?php
                                        $sched->judge->get();
                                        echo $sched->judge->name
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        $sched->judge->get();
                                        $sched->judge->category->get();
                                        echo $sched->judge->category->code
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        $sched->project->get();
                                        $sched->project->category->get();
                                        echo $sched->project->code;
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
                                <?php
                            }
                        }
                        ?>
                    </tbody>
                    <tfoot></tfoot>

                </table>
                <div style="clear: both;">
                    <hr/>
                    <!--<button class="" id="deleteAll">delete selected</button>-->
                    <button class="" id="back">Back</button>
                    <button class="" id="assign">Assign judge to Project</button>
                </div>

            </div>
        </span>
    </section>
</article>