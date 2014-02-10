<div class="intel-tab" id="tabs" init="true">
    <ul style="margin-top: 10px;">
        <li><a href="<?= base_url(); ?>judgeshead/home" tab="#admins" class="active">المشاريع</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/home/judges" tab="#judges">المحكمين</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/home/schedule" tab="#judges">جدول التحكيم</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/home/groups" tab="#judges">المجموعات</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/categories/home" tab="#judges">القوائم</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/home/scores" tab="#judges">النتائج</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/home/finalwinners" tab="#judges">النهائي</a></li>
    </ul>
    <hr class="intel-tab-divider">
</div>
<article class="intel-tab-content">
    <section class="active" id="teams">
        <span class="Content-body">
            <h2 id="Admin"><?= $project->name ?></h2>
            <hr/>
            <div class="contant-contaner">
                p
            </div>
        </span>
    </section>
</article>