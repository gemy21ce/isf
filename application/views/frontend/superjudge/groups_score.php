<?= $this->load->view("frontend/superjudge/includes/menu") ?>
<script type="text/javascript">
    $(function(){
        $("a.active").removeClass("active");
        $("a[tab='#scores']").addClass('active');
    });
</script>
<article class="intel-tab-content">
    <section class="active" id="teams">
        <span class="Content-body">
            <h2 id="Admin">Scores</h2>

            <hr/>
            <div class="contant-contaner">
                <table cellpadding="0" cellspacing="0" border="0" class="intel-table intel-table-zebra intel-sortable" id="tableData">
                    <thead>
                        <tr class="">
                            <th style="cursor: pointer;" class="">Group</th>
                            <th style="cursor: pointer;" class="">Show Results</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($error)) {
                            ?>
                            <tr>
                                <td colspan="2"><p>No Evaluation Done Yet!</p></td>
                            </tr>
                            <?php
                        } else {
                            foreach ($groups as $group) {
                                ?>
                                <tr>
                                    <td>
                                        <?= $group->name ?>
                                    </td>
                                    <td>
                                        <?php
//                                        $group->schedule->get();
//                                        if ($cat->schedule) {
                                            echo anchor(base_url() . "judgeshead/home/groupscore/" . $group->id, "Show Group Results");
//                                        }
                                        ?>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </tbody>
                    <tfoot></tfoot>
                </table>
            </div>
        </span>
    </section>
</article>