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
                    min: "min evaluation is 0",
                    max: "max evaluation is 10",
                    digits: "only digits accepted here"
                },
                eval_q_2: {
                    min: "min evaluation is 0",
                    max: "max evaluation is 15",
                    digits: "only digits accepted here"
                },
                eval_q_3: {
                    min: "min evaluation is 0",
                    max: "max evaluation is 20",
                    digits: "only digits accepted here"
                },
                eval_q_4: {
                    min: "min evaluation is 0",
                    max: "max evaluation is 20",
                    digits: "only digits accepted here"
                },
                eval_q_5: {
                    min: "min evaluation is 0",
                    max: "max evaluation is 10",
                    digits: "only digits accepted here"
                },
                eval_q_6: {
                    min: "min evaluation is 0",
                    max: "max evaluation is 25",
                    digits: "only digits accepted here"
                },
                eval_total: {
                    required: "must edit the total evaluation",
                    min: "min evaluation is 0",
                    max: "max evaluation is 100",
                    digits: "only digits accepted here"
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
                            <th>Number of student: </th> 
                            <td><?= $project->num_of_students ?></td>
                        </tr>
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