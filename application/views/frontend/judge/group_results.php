<?= $this->load->view("frontend/judge/includes/menu") ?>
<script type="text/javascript">
    $(function() {
        $("a.active").removeClass("active");
        $("a[tab='#scoretable']").addClass('active');
    });
</script>
<article class="intel-tab-content">
    <section class="active" id="teams">
        <span class="Content-body">
            <?php if (!isset($error)) { ?>
                <h2 id="Admin" style="">Group "<span style="font-weight: bold;"><?= $group->name ?></span>" Results</h2>
            <?php } else { ?>
                <h2 id="Admin" style="">Group Results</h2>
            <?php } ?>
            <hr/>
            <div class="contant-contaner">
                <?php if (!isset($error)) { ?>
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
                                    <td><?= number_format($res->score, 2) ?></td>
                                </tr>
                            <? } ?>
                        </tbody>
                    </table>
                    <div style="clear: both;">
                        <hr/>
                    </div>
                <?php } else { ?>
                    <div> Evaluation Is Still In Process! </div>
                <?php } ?>
            </div>
        </span>
    </section>
</article>