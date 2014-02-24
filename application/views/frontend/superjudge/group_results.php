<?= $this->load->view("frontend/superjudge/includes/menu") ?>
<script type="text/javascript">
    $(function() {
        $("a.active").removeClass("active");
        $("a[tab='#scores']").addClass('active');

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
                $(".Footer").addClass('forcedHidden');
                //
                window.setTimeout(function() {
                    window.print();
                    $(".Footer").removeClass('forcedHidden');
                    $("body").children().show();
                    $("article").css("margin-top", marginTop);
                    $("button").show();
                }, 100);
            });
        };
        createPrint();

    });
</script>
<article class="intel-tab-content">
    <section class="active" id="teams">
        <span class="Content-body">
            <h2 id="Admin" style="">Group "<span style="font-weight: bold;"><?= $group->name ?></span>" Results</h2>

            <hr/>
            <div class="contant-contaner">

                <table cellpadding="0" cellspacing="0" border="0" class="intel-table intel-table-zebra" id="tableData">
                    <thead>
                        <tr class="">
                            <th style="cursor: pointer;" class="">Project Code</th>
                            <th style="cursor: pointer;" class="">Project Name</th>
                            <th style="width:10%">Evaluation Average Score</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($results as $res) { ?>
                            <tr>
                                <td><?= $res->code ?></td>
                                <td><?= $res->name ?></td>
                                <td><?= number_format($res->score,2) ?></td>
                            </tr>
                        <? } ?>
                    </tbody>
                </table>
                <div style="clear: both;">
                    <hr/>
                </div>
            </div>
        </span>
    </section>
</article>