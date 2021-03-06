<article class="intel-tab-content">
    <section class="active" id="tab1">
        <span class="Content-body">
            <h2 id="Admin"><?= $text ?></h2>
            <hr/>
            <div class="contant-contaner">

                <!--<link type="text/css"  rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/js/jquery/table/table.css" />-->

                <script src="<?php echo base_url(); ?>assets/backend/js/jquery/table/jquery.dataTables.min.js" language="javascript" type="text/javascript"></script>

                <script language="javascript" type="text/javascript">
                    $(function() {
                        $('#tableData').dataTable();
                        $("#tabs").find("a.active").removeClass("active");
                        $("a[tab='#<?= $active ?>']").addClass("active");
                    });
                </script>
                <!--<span class="creat-botton-contaner"><span class="creat-user-icon"></span><span class="creat-botton"></span></span>-->
                <?php 
                $user = $this->session->all_userdata();
                if (sizeof($query) > 0){ //count?>
                    <table cellpadding="0" cellspacing="0" border="0" class="intel-table intel-table-zebra intel-sortable" id="tableData">
                        <thead>
                            <tr class="">
                                <th style="cursor: pointer;" class="">Name</th>
                                <th style="cursor: pointer;" class="">User Type</th>
                                <th style="cursor: pointer;" class="">Last Login</th>
                                <?php
                                if ($user['usertype'] == 'super_admin') {
                                    ?>
                                    <th class="">Edit</th>
                                    <th >Delete</th>
                                <?php } ?>
                            </tr>

                        </thead>

                        <tbody>

                            <?php foreach ($query as $item){ ?>
                                <tr class="intel-right">
                                    <td class="">
                                        <?= $item->name ?>
                                    </td>
                                    <td class="intel-right">
                                        <?php $item->role->get(); ?>
                                        <?= str_replace("_", " ", $item->role->role) ?>
                                    </td>

                                    <td class="intel-right">
                                        <?= $item->last_login ?>
                                    </td>
                                    <?php if ($user['usertype'] == 'super_admin') { ?>
                                        <td class="intel-right">
                                            <?= anchor('admin/usermanager/userform/' . $item->id, 'edit'); ?>
                                        </td>
                                        <td class="intel-right">
                                            <?= anchor('admin/usermanager/delete/' . $item->id, 'delete'); ?>
                                        </td>
                                    <?php } ?>
                                </tr>

                            <?php } ?>

                        </tbody>
                        <tfoot></tfoot>

                    </table>

                <?php } ?>
                <?php
                if ($user['usertype'] == 'super_admin') {
                    echo anchor('admin/usermanager/adminform', 'Add New Admin', 'class="intel-btn intel-btn-action"');
                }
                ?>
            </div>
        </span>
    </section>
</article>
