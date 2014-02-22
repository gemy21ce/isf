<script src="<?php echo base_url(); ?>assets/backend/js/jquery/table/jquery.dataTables.min.js" language="javascript" type="text/javascript"></script>
<script type="text/javascript">
    $('#tableData').ready(function() {
        $('#tableData').dataTable();
    });
    $(function(){
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
                window.setTimeout(function() {
                    window.print();
                    $("body").children().show();
                    $("article").css("margin-top", marginTop);
                    $("button").show();
                }, 100);
            });
        };
        createPrint();
    });
</script>
<?= $this->load->view("frontend/judge/includes/menu") ?>
<script type="text/javascript">
    $(function() {
        $("a.active").removeClass("active");
        $("a[tab='#sched']").addClass('active');
    });
</script>
<article class="intel-tab-content">
    <section class="active" id="teams">
        <span class="Content-body">
            <h2 id="Admin">Evaluation Schedule</h2>

            <hr/>
            <div class="contant-contaner">
                <table cellpadding="0" cellspacing="0" border="0" class="intel-table" id="tableData">
                    <thead>
                        <tr class="">
                            <th style="cursor: pointer;" class="">Project</th>
                            <th style="cursor: pointer;" class="">Code</th>
                            <th style="cursor: pointer;" class="">Slot Number</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        foreach ($schedule as $sched) { ?>
                            <tr>
                                <td>
                                    <?php
                                    $sched->project->get();
                                    echo $sched->project->name ?>
                                </td>
                                <td>
                                    <?php
                                    echo $sched->project->code ?>
                                </td>
                                <td>
                                    <?php
                                    echo $sched->slotnumber ?>
                                </td>
                            </tr>
                            <?php } ?>
                    </tbody>
                    <tfoot></tfoot>

                </table>
            </div>
        </span>
    </section>
</article>