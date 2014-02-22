<?= $this->load->view("frontend/superjudge/includes/menu") ?>
<script type="text/javascript">
    $(function() {
        $("a.active").removeClass("active");
        $("a[tab='#scores']").addClass('active');

        $("#announceResults").click(function() {
            var announce = ($(this).is(":checked") ? 1 : 0);
            $.ajax({
                url: '<?= base_url() . 'judgeshead/scores/announce_results' ?>',
                data: {
                    announce: announce
                },
                type: 'POST'
            });
        });

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
                            <th style="cursor: pointer;" class="">Show Results Chart</th>
                            <th style="width:10%">Show Results</th>
                            <th style="width:10%">Export Group Results</th>
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
                                        echo anchor(base_url() . "judgeshead/scores/groupscore/" . $group->id, "Show Results Chart");
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        echo anchor(base_url() . "judgeshead/scores/groupresult/" . $group->id, "Show Results");
                                        ?>
                                    </td>
                                    <td>
                                        <a href="<?= base_url() . "judgeshead/scores/exportGroupResults?group=" . $group->id ?>">Export </a>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </tbody>
                    <tfoot></tfoot>
                </table>
                <?php if (!isset($error)) { ?>
                    <hr />
                    <div class="intel-indent intel-u-fixed-mobile">
                        <label for="announceResults">Announce Results To Judges:</label>
                        <div class="intel-switch">
                            <input type="checkbox" name="announceResults" id="announceResults" <?= $config->announce_results == 1 ? 'checked' : '' ?>>
                            <label for="announceResults">
                                <span>OK</span>
                                <span> </span>
                                <span>NO</span>
                            </label>
                        </div>			
                    </div>		
                <?php } ?>
            </div>
        </span>
    </section>
</article>