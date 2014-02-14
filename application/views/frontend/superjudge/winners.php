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
                window.print();
                $(".printable").hide();
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
        <li><a href="<?= base_url(); ?>judgeshead/home" tab="#admins" >Projects</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/home/judges" tab="#judges">Judges</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/home/schedule" tab="#judges">Judging Schedule</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/home/groups" tab="#judges">Groups</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/categories/home" tab="#judges">Categories</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/home/scores" tab="#judges">Scores</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/home/finalwinners" class="active" tab="#judges">Finals</a></li>
    </ul>
    <hr class="intel-tab-divider">
</div>
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
                                        P-<?= $p->id ?>
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
                                        echo $p->category->group->name_ar;
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