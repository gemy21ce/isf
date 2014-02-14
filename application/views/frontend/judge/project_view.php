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
            <div class="contant-contaner">
                <table class="intel-table intel-table-zebra intel-sortable">
                    <tr>
                        <th>Project Name: </th> 
                        <td><?= $project->name ?></td>
                    </tr>
                    <tr>
                        <th>Project category: </th> 
                        <td><?= $project->category->get()->name?></td>
                    </tr>
                    <tr>
                        <th>Project plan: </th> 
                        <td><?= $project->plan?></td>
                    </tr>
                    <tr>
                        <th>Project assumptions: </th> 
                        <td><?= $project->assumptions?></td>
                    </tr>
                    <tr>
                        <th>Project description: </th> 
                        <td><?= $project->description?></td>
                    </tr>
                    <tr>
                        <th>Project per-researches results: </th> 
                        <td><?= $project->per_researchs_results?></td>
                    </tr>
                    <tr>
                        <th>Project research resources: </th> 
                        <td><?= $project->research_resources?></td>
                    </tr>
                    <tr>
                        <th>Is continuous project: </th> 
                        <td><?= $project->continuation_project!=0?"Yes":"No"?></td>
                    </tr>

                    <tr>
                        <th>Number of students: </th> 
                        <td><?= $project->num_of_students?></td>
                    </tr>
                </table>

            </div>
        </span>
    </section>
</article>