<script src="<?php echo base_url(); ?>assets/jquery.validate.min.js"></script>
<script type="text/javascript">
    $(function() {
        $("#projectEvaluation").css("marginLeft", Math.max(0, (($("#contant-contaner").width() - $("#projectEvaluation").outerWidth()) / 2)));
        $(".scoreDiv input").change(function() {
            adjustTotal();
        }).keyup(function() {
            adjustTotal();
        });
        var adjustTotal = function() {
            var eval_q_1 = isNaN(parseInt($("input[name='eval_q_1']").val())) ? 0 : parseInt($("input[name='eval_q_1']").val());
            var eval_q_2 = isNaN(parseInt($("input[name='eval_q_2']").val())) ? 0 : parseInt($("input[name='eval_q_2']").val());
            var eval_q_3 = isNaN(parseInt($("input[name='eval_q_3']").val())) ? 0 : parseInt($("input[name='eval_q_3']").val());
            var eval_q_4 = isNaN(parseInt($("input[name='eval_q_4']").val())) ? 0 : parseInt($("input[name='eval_q_4']").val());
            var eval_q_5 = isNaN(parseInt($("input[name='eval_q_5']").val())) ? 0 : parseInt($("input[name='eval_q_5']").val());
            var eval_q_6 = isNaN(parseInt($("input[name='eval_q_6']").val())) ? 0 : parseInt($("input[name='eval_q_6']").val());
            $("input[name='eval_total']").val(eval_q_1 + eval_q_2 + eval_q_3 + eval_q_4 + eval_q_5 + eval_q_6);
        };
        $("form").validate({
            rules: {
                eval_q_1: {
                    min: 0,
                    max: 10,
                    digits: true
                },
                eval_q_2: {
                    min: 0,
                    max: 15,
                    digits: true
                },
                eval_q_3: {
                    min: 0,
                    max: 20,
                    digits: true
                },
                eval_q_4: {
                    min: 0,
                    max: 20,
                    digits: true
                },
                eval_q_5: {
                    min: 0,
                    max: 10,
                    digits: true
                },
                eval_q_6: {
                    min: 0,
                    max: 25,
                    digits: true
                },
                eval_total: {
                    required: true,
                    min: 0,
                    max: 100,
                    digits: true
                }
            },
            messages: {
                eval_q_1: {
                    min: "يجب ألا يقل عن 0",
                    max: "يجب ألا يزيد عن 10",
                    digits: "هذا الحقل يتطلب أرقام فقط"
                },
                eval_q_2: {
                    min: "يجب ألا يقل عن 0",
                    max: "يجب ألا يزيد عن 15",
                    digits: "هذا الحقل يتطلب أرقام فقط"
                },
                eval_q_3: {
                    min: "يجب ألا يقل عن 0",
                    max: "يجب ألا يزيد عن 20",
                    digits: "هذا الحقل يتطلب أرقام فقط"
                },
                eval_q_4: {
                    min: "يجب ألا يقل عن 0",
                    max: "يجب ألا يزيد عن 20",
                    digits: "هذا الحقل يتطلب أرقام فقط"
                },
                eval_q_5: {
                    min: "يجب ألا يقل عن 0",
                    max: "يجب ألا يزيد عن 10",
                    digits: "هذا الحقل يتطلب أرقام فقط"
                },
                eval_q_6: {
                    min: "يجب ألا يقل عن 0",
                    max: "يجب ألا يزيد عن 25",
                    digits: "هذا الحقل يتطلب أرقام فقط"
                },
                eval_total: {
                    required: "يجب ادخال الدرجة الكلية",
                    min: "يجب ألا يقل عن 0",
                    max: "يجب ألا يزيد عن 100",
                    digits: "هذا الحقل يتطلب أرقام فقط"
                }
            }
        });
    });
</script>
<style>
    .disspan{
        font-weight: normal;
        float: left;
        margin-left: 15px;
        margin-top: -10px;
        width: 20em;
    }
    .scoreDiv{
        margin-right: 5em;
        margin-bottom: 1em;
        min-height: 5em;
    }
</style>
<div class="intel-tab" id="tabs" init="true">
    <ul style="margin-top: 10px;">
        <li><a href="<?= base_url(); ?>judge/home" tab="#admins" class="active">المشاريع</a></li>
        <li><a href="<?= base_url(); ?>judge/home/schedule" tab="#sched">جدول التحكيم</a></li>
        <li><a href="<?= base_url(); ?>judge/home/evalresults" tab="#results">نتائج التحكيم</a></li>
        <!--<li><a href="javascript:void(0);" tab="#tab5">More...</a></li>-->
    </ul>
    <hr class="intel-tab-divider">
</div>
<article class="intel-tab-content">
    <section class="active" id="teams">
        <span class="Content-body">
            <h2 id="Admin"><?= $project->name ?></h2>
            <hr/>
            <div id="contant-contaner" class="contant-contaner">
                <div>
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
                <hr class="intel-tab-divider">
                <div id="projectEvaluation" style="direction: rtl;width: 48em;">
                    <fieldset>
                        <?php 
                        $project->category->get();
                        $project->category->group->get();
                        if($project->category->group->type == 'engineering'){
                            $this->load->view('frontend/judge/includes/engineering_evaluation');
                        }else{
                            $this->load->view('frontend/judge/includes/scientific_evaluation');
                        }
                        ?>
                    </fieldset>
                </div>
            </div>
        </span>
    </section>
</article>