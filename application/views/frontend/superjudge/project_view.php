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
                <table class="intel-table intel-table-zebra intel-sortable">
                    <tr>
                        <th>Project Name: </th> 
                        <td><?= $project->name ?></td>
                    </tr>
                    <tr>
                        <th>Project category: </th> 
                        <td><?= $project->category->get()->name ?></td>
                    </tr>
                    <tr>
                        <th>Project plan: </th> 
                        <td><?= $project->plan ?></td>
                    </tr>
                    <tr>
                        <th>Project assumptions: </th> 
                        <td><?= $project->assumptions ?></td>
                    </tr>
                    <tr>
                        <th>Project description: </th> 
                        <td><?= $project->description ?></td>
                    </tr>
                    <tr>
                        <th>Project per-researches results: </th> 
                        <td><?= $project->per_researchs_results ?></td>
                    </tr>
                    <tr>
                        <th>Project research resources: </th> 
                        <td><?= $project->research_resources ?></td>
                    </tr>
                    <tr>
                        <th>Is continuous project: </th> 
                        <td><?= $project->continuation_project != 0 ? "Yes" : "No" ?></td>
                    </tr>
                    <tr>
                        <th>Exhibition: </th> 
                        <td><?= $project->exhibition->get()->name ?></td>
                    </tr>


                    <tr>
                        <th>Adult sponsor details</th> 
                        <td>
                            <span style="float: left;text-align: left;width: 100%;">Adult sponsor English name : <?= $project->adult_sponsor_name ?><br/></span>
                            <span style="float: left;text-align: left;width: 100%;">Adult sponsor Arabic name : <?= $project->adult_sponsor_name_ar ?><br/></span>
                            <span style="float: left;text-align: left;width: 100%;">Adult sponsor phone : <?= $project->adult_sponsor_phone ?><br/></span>
                            <span style="float: left;text-align: left;width: 100%;">Adult sponsor email : <?= $project->adult_sponsor_email ?><br/></span>
                            <span style="float: left;text-align: left;width: 100%;">Adult sponsor governorate : <?= $project->adult_sponsor_gov ?><br/></span>
                            <span style="float: left;text-align: left;width: 100%;">Adult sponsor profession : <?= $project->adult_sponsor_profession ?><br/></span>
                            <span style="float: left;text-align: left;width: 100%;">Adult sponsor specialist : <?= $project->adult_sponsor_specialist ?><br/></span>
                            <span style="float: left;text-align: left;width: 100%;">Adult sponsor work location : <?= $project->adult_sponsor_work_location ?><br/></span>
                            <span style="float: left;text-align: left;width: 100%;">Adult sponsor educational administration : <?= $project->adult_sponsor_educational_administration ?><br/></span>
                            <span style="float: left;text-align: left;width: 100%;">Adult sponsor birthday : <?= $project->adult_sponsor_birthday ?><br/></span>
                            <span style="float: left;text-align: left;width: 100%;">Adult sponsor gender : <?= $project->adult_sponsor_gender == 1 ? "ذكر" : "انثي" ?><br/></span>
                        </td>
                    </tr>

                    <tr>
                        <th>Number of student: </th> 
                        <td><?= $project->num_of_students ?></td>
                    </tr>
                    <?php
                    if ($project->student_1_id != null) {

                        $project->student_1->get();
                        ?>
                        <tr>
                            <td>First Student Details</td>
                            <td>
                                <span style="float: left;text-align: left;width: 100%;">Student english name : <?= $project->student_1->name ?><br/></span>
                                <span style="float: left;text-align: left;width: 100%;">Student arabic name :<?= $project->student_1->name_ar ?></span>
                                <span style="float: left;text-align: left;width: 100%;">Student phone : <?= $project->student_1->phone ?></span>
                                <span style="float: left;text-align: left;width: 100%;">Student school : <?= $project->student_1->school ?></span>
                                <span style="float: left;text-align: left;width: 100%;">Student arabic school : <?= $project->student_1->school_ar ?></span>
                                <span style="float: left;text-align: left;width: 100%;">Student grade : <?= $project->student_1->grade->get()->name ?></span>
                                <span style="float: left;text-align: left;width: 100%;">Student birthday : <?= $project->student_1->birthday ?></span>
                                <span style="float: left;text-align: left;width: 100%;">Student gender : <?= $project->student_1->gender == 1 ? "ذكر" : "انثي" ?></span>
                                <span style="float: left;text-align: left;width: 100%;">Student governorate : <?= $project->student_1->gov ?></span>
                                <span style="float: left;text-align: left;width: 100%;">Student educational administration : <?= $project->student_1->educational_administration ?></span>
                            </td>
                        </tr>     
                    <?php } ?>

                    <?php
                    if ($project->student_2_id != null) {

                        $project->student_2->get();
                        ?>
                        <tr>
                            <td>Second Student Details</td>
                            <td>
                                <span style="float: left;text-align: left;width: 100%;">Student english name : <?= $project->student_2->name ?><br/></span>
                                <span style="float: left;text-align: left;width: 100%;">Student arabic name : <?= $project->student_2->name_ar ?></span>
                                <span style="float: left;text-align: left;width: 100%;">Student phone : <?= $project->student_2->phone ?></span>
                                <span style="float: left;text-align: left;width: 100%;">Student school : <?= $project->student_2->school ?></span>
                                <span style="float: left;text-align: left;width: 100%;">Student arabic school : <?= $project->student_2->school_ar ?></span>
                                <span style="float: left;text-align: left;width: 100%;">Student grade : <?= $project->student_2->grade->get()->name ?></span>
                                <span style="float: left;text-align: left;width: 100%;">Student birthday : <?= $project->student_2->birthday ?></span>
                                <span style="float: left;text-align: left;width: 100%;">Student gender : <?= $project->student_2->gender == 1 ? "ذكر" : "انثي" ?></span>
                                <span style="float: left;text-align: left;width: 100%;">Student governorate : <?= $project->student_2->gov ?></span>
                                <span style="float: left;text-align: left;width: 100%;">Student educational administration : <?= $project->student_2->educational_administration ?></span>
                            </td>
                        </tr>     
                    <?php } ?>
                    <?php
                    if ($project->student_3_id != null) {

                        $project->student_3->get();
                        ?>
                        <tr>
                            <td>Third Student Details</td>
                            <td>
                                <span style="float: left;text-align: left;width: 100%;">Student english name : <?= $project->student_3->name ?><br/></span>
                                <span style="float: left;text-align: left;width: 100%;">Student arabic name : <?= $project->student_3->name_ar ?></span>
                                <span style="float: left;text-align: left;width: 100%;">Student phone : <?= $project->student_3->phone ?></span>
                                <span style="float: left;text-align: left;width: 100%;">Student school : <?= $project->student_3->school ?></span>
                                <span style="float: left;text-align: left;width: 100%;">Student arabic school : <?= $project->student_3->school_ar ?></span>
                                <span style="float: left;text-align: left;width: 100%;">Student grade : <?= $project->student_3->grade->get()->name ?></span>
                                <span style="float: left;text-align: left;width: 100%;">Student birthday : <?= $project->student_3->birthday ?></span>
                                <span style="float: left;text-align: left;width: 100%;">Student gender : <?= $project->student_3->gender == 1 ? "ذكر" : "انثي" ?></span>
                                <span style="float: left;text-align: left;width: 100%;">Student governorate : <?= $project->student_3->gov ?></span>
                                <span style="float: left;text-align: left;width: 100%;">Student educational administration : <?= $project->student_3->educational_administration ?></span>
                            </td>
                        </tr>     
                    <?php } ?>
                </table>

            </div>
        </span>
    </section>
</article>