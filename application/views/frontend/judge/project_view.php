<?= $this->load->view("frontend/judge/includes/menu") ?>
<script type="text/javascript">
    $(function() {
        $("a.active").removeClass("active");
        $("a[tab='#projects']").addClass('active');
    });
</script>
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