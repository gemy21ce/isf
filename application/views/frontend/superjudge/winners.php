<script src="<?php echo base_url(); ?>assets/jquery.validate.min.js"></script>
<div class="intel-tab" id="tabs" init="true">
    <ul style="margin-top: 10px;">
        <li><a href="<?= base_url(); ?>judgeshead/home" tab="#admins" >المشاريع</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/home/judges" tab="#judges">المحكمين</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/home/schedule" tab="#judges">جدول التحكيم</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/home/groups" tab="#judges">المجموعات</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/categories/home" tab="#judges">القوائم</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/home/scores" tab="#judges">النتائج</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/home/finalwinners" class="active" tab="#judges">النهائي</a></li>
    </ul>
    <hr class="intel-tab-divider">
</div>
<article class="intel-tab-content">
    <section class="active" id="teams">
        <span class="Content-body">
            <h2 id="Admin"> نهائي التحكيم</h2>

            <hr/>
            <div class="contant-contaner">
                <table cellpadding="0" cellspacing="0" border="0" class="intel-table" id="tableData">
                    <thead>
                        <tr class="">
                            <th style="cursor: pointer;" class="">الكود</th>
                            <th style="cursor: pointer;" class="">الاسم</th>
                            <th style="cursor: pointer;" class="">القائمة</th>
                            <th style="cursor: pointer;" class="">المجموعة</th>
                            <th style="cursor: pointer;" class="">رابح نهائي</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        if (isset($error)) {
                        ?>
                        <tr>
                            <td colspan="5"><p>لم يتم انتخاب أي مشاريع بعد</p></td>
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
                            <?php }
                        }
                        ?>
                    </tbody>
                    <tfoot></tfoot>
                </table>
            </div>
        </span>
    </section>
</article>