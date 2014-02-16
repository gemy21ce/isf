<?php $user = $this->session->all_userdata(); ?>
<div class="intel-tab" id="tabs" init="true">
    <ul style="margin-top: 10px;">
        <?php if ($user['usertype'] == 'super_judge') { ?>
            <li><a href="<?= base_url(); ?>judgeshead/home" tab="#projects" >Projects</a></li>
            <li><a href="<?= base_url(); ?>judgeshead/home/judges" tab="#judges">Judges</a></li>
        <?php } ?>
        <?php if ($user['usertype'] == 'super_admin' || $user['usertype'] == 'admin') { ?>
            <li><a href="<?= base_url(); ?>admin/usermanager/home" tab="#admins" class="active">Admin</a></li>
            <li><a href="<?= base_url(); ?>judge/managejudge/home" tab="#judges">Judges</a></li>
            <li><a href="<?= base_url(); ?>admin/projectcontroller/home" tab="#teams">Projects</a></li>
            <li><a href="<?= base_url(); ?>admin/categorycontroller/home" tab="#category">Categories</a></li>
        <?php } ?>
        <li><a href="<?= base_url(); ?>judgeshead/schedules/schedule" tab="#schedule">Judging Schedule</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/groups" tab="#groups">Groups</a></li>
        <?php if ($user['usertype'] == 'super_judge') { ?>
            <li><a href="<?= base_url(); ?>judgeshead/categories/home" tab="#categories">Categories</a></li>
            <li><a href="<?= base_url(); ?>judgeshead/home/scores" tab="#scores">Scores</a></li>
            <li><a href="<?= base_url(); ?>judgeshead/home/finalwinners" tab="#finals">Finals</a></li>
        <?php } ?>
    </ul>
    <hr class="intel-tab-divider">
</div>
