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
                window.print();
                $("body").children().show();
                $("article").css("margin-top", marginTop);
                $(this).show();
            });
        };
        createPrint();
    });
</script>
<div class="intel-tab" id="tabs" init="true">
    <ul style="margin-top: 10px;">
        <li><a href="<?= base_url(); ?>judge/home" tab="#admins">Projects</a></li>
        <li><a href="<?= base_url(); ?>judge/home/schedule" class="active" tab="#sched">Evaluation Schedule</a></li>
        <li><a href="<?= base_url(); ?>judge/home/evalresults" tab="#results">Evaluation Results</a></li>
        <!--<li><a href="javascript:void(0);" tab="#tab5">More...</a></li>-->
    </ul>
    <hr class="intel-tab-divider">
</div>
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