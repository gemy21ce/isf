<script src="<?php echo base_url(); ?>assets/backend/js/jquery/table/jquery.dataTables.min.js" language="javascript" type="text/javascript"></script>
<link type="text/css"  rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/js/jquery/table/table.css" />
<script type="text/javascript">
    $('#tableData').ready(function() {
        $('#tableData').dataTable({
        });
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
<?= $this->load->view("frontend/superjudge/includes/menu") ?>
<script type="text/javascript">
    $(function(){
        $("a.active").removeClass("active");
        $("a[tab='#projects']").addClass('active');
    });
</script>
<article class="intel-tab-content">
    <section class="active" id="teams">
        <span class="Content-body">
            <h2 id="Admin">Projects</h2>

            <hr/>
            <div class="contant-contaner">
                <table cellpadding="0" cellspacing="0" border="0" class="intel-table intel-sortable" id="tableData">
                    <thead>
                        <tr class="">
                            <th style="cursor: pointer;" class="">Project Group</th>
                            <th style="cursor: pointer;" class="">Project Category</th>
                            <th style="cursor: pointer;" class="">Project Name</th>
                            <th style="cursor: pointer;" class="">Project Code</th>
                            <th style="cursor: pointer;" class="">Show Project</th>
                            <!--<th style="cursor: pointer;" class="">تحكيم</th>-->
                        </tr>
                    </thead>
                    <tbody>
                         <?php foreach ($projects as $project) { ?>
                            <tr>
                                <td><?php $project->category->get(); $project->category->group->get(); echo $project->category->group->name; ?></td>
                                <td><?= $project->category->name ?></td>
                                <td><?= $project->name ?></td>
                                <td><?= $project->category->code. " - ".$project->id ?></td>
                                <td>
                                    <a href="<?= base_url() ?>judgeshead/home/showproject/<?= $project->id ?>">Show Project</a>
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