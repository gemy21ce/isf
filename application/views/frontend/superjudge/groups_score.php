<div class="intel-tab" id="tabs" init="true">
    <ul style="margin-top: 10px;">
        <li><a href="<?= base_url(); ?>judgeshead/home" tab="#admins" >المشاريع</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/home/judges" tab="#judges">المحكمين</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/home/schedule" tab="#judges">جدول التحكيم</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/home/groups" tab="#judges">المجموعات</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/categories/home" tab="#judges">القوائم</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/home/scores" tab="#judges" class="active">النتائج</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/home/finalwinners" tab="#judges">النهائي</a></li>
    </ul>
    <hr class="intel-tab-divider">
</div>
<article class="intel-tab-content">
    <section class="active" id="teams">
        <span class="Content-body">
            <h2 id="Admin">نتائج التحكيم</h2>

            <hr/>
            <div class="contant-contaner">
                <table cellpadding="0" cellspacing="0" border="0" class="intel-table intel-table-zebra intel-sortable" id="tableData">
                    <thead>
                        <tr class="">
                            <th style="cursor: pointer;" class="">المجموعة</th>
                            <th style="cursor: pointer;" class="">عرض النتيجة</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($error)) {
                            ?>
                            <tr>
                                <td colspan="2"><p>لم يتم التحكيم علي أي مشاريع بعد</p></td>
                            </tr>
                            <?php
                        } else {
                            foreach ($groups as $group) {
                                ?>
                                <tr>
                                    <td>
                                        <?= $group->name_ar ?>
                                    </td>
                                    <td>
                                        <?php
//                                        $group->schedule->get();
//                                        if ($cat->schedule) {
                                            echo anchor(base_url() . "judgeshead/home/groupscore/" . $group->id, "عرض نتيجة المجموعة");
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