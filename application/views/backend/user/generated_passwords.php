<article class="intel-tab-content">
    <section class="active" id="tab1">
        <span class="Content-body">
            <h2 id="Admin">Judges</h2>
            <hr/>
            <div class="contant-contaner">

                <script src="<?php echo base_url(); ?>assets/backend/js/jquery/table/jquery.dataTables.min.js" language="javascript" type="text/javascript"></script>

                <script language="javascript" type="text/javascript">
                    $(function() {
                        $('#tableData').dataTable();
                        $("#tabs").find("a.active").removeClass("active");
                        $("a[tab='#judges']").addClass("active");
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
                <table cellpadding="0" cellspacing="0" border="0" class="intel-table intel-table-zebra" id="tableData">
                    <thead>
                        <tr class="">
                            <th style="cursor: pointer;" class="">Name</th>
                            <th style="cursor: pointer;" class="">Email</th>
                            <th style="cursor: pointer;" class="">New Password</th>
                        </tr>

                    </thead>

                    <tbody>

                        <?php foreach ($newJudges as $item) { ?>
                            <tr class="intel-right">
                                <td class="">
                                    <?= $item->name ?>
                                </td>
                                <td class="intel-right">
                                    <?= $item->email ?>
                                </td>

                                <td class="intel-right">
                                    <?= $item->planPassword ?>
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
