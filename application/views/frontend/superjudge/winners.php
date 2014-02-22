<script src="<?php echo base_url(); ?>assets/jquery.validate.min.js"></script>
<script type="text/javascript">
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
                $(".printable").show();
                //
                window.setTimeout(function() {
                    window.print();
                    $(".printable").hide();
                    $("body").children().show();
                    $("article").css("margin-top", marginTop);
                    $(this).show();
                }, 100);
            });
        };
        createPrint();
    });
</script>
<?= $this->load->view("frontend/superjudge/includes/menu") ?>
<script type="text/javascript">
    $(function() {
        $("a.active").removeClass("active");
        $("a[tab='#finals']").addClass('active');
    });
</script>
<article class="intel-tab-content">
    <section class="active" id="teams">
        <span class="Content-body">
            <h2 id="Admin">Finals</h2>

            <hr/>
            <div class="contant-contaner">
                <div style="display: none;" class="printable">
                    <p>Comments:
                        <br/>
                        <br/>
                    </p>
                </div>
                <table cellpadding="0" cellspacing="0" border="0" class="intel-table" id="tableData">
                    <thead>
                        <tr class="">
                            <th style="cursor: pointer;" class="">Project Code</th>
                            <th style="cursor: pointer;" class="">Project Name</th>
                            <th style="cursor: pointer;" class="">Category</th>
                            <th style="cursor: pointer;" class="">Group</th>
                            <th style="cursor: pointer;" class="">Final Winner</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($error)) {
                            ?>
                            <tr>
                                <td colspan="5"><p>No Projects Elected Yet</p></td>
                            </tr>
                            <?php
                        } else {
                            foreach ($winners as $p) {
                                ?>
                                <tr>
                                    <td>
                                        <?= $p->code ?>
                                    </td>
                                    <td>
                                        <?= $p->name ?>
                                    </td>
                                    <td>
                                        <?php
                                        $p->category->get();
                                        echo $p->category->name;
                                        ?><br/>
                                    </td>
                                    <td>
                                        <?php
                                        $p->category->group->get();
                                        echo $p->category->group->name;
                                        ?>
                                    </td>
                                    <td>

                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </tbody>
                    <tfoot></tfoot>
                </table>
                <div style="display: none;" class="printable">
                    <p>
                        Name:<br/>
                        Signature:
                    </p>
                </div>
            </div>
        </span>
    </section>
</article>