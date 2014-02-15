<script type="text/javascript">
    
    $(function(){
        $("#addStudent").click(function(){
            $.fancybox({
                    href: "<?php echo base_url(); ?>admin/projectcontroller/edit_project_student?project_id=<?= $project->id?>",
                    type: "ajax",
                    scrolling: "no",
                    onClosed: function() {
                       $("#studentsDetails").load("<?= base_url(); ?>admin/projectcontroller/load_project_students/<?= $project->id?>");
                    }
                });
        });
    });
    function delete_item(element)
    {
        projectId =  $(element).attr("project_id");
        $.fancybox('<div id="popupMessage">Are you sure you want to delete student: ' + $(element).attr("item-name") + '</div>',
                {
                    'autoDimensions': true,
                    'transitionIn': 'none',
                    'transitionOut': 'none',
                    'onComplete': function() {
                        var deleteButton = $('<button/>',
                                {
                                    text: 'Delete',
                                    click: function() {
                                        $.fancybox.close();
                                        $.ajax({
                                            url: "<?php echo base_url(); ?>admin/projectcontroller/delete_project_student",
                                            data: {
                                                'project_id': $(element).attr("project_id"),
                                                'student_id': $(element).attr("item-id")
                                            },
                                            success: function($ret) {
                                                if ($ret === "TRUE") {
                                                    $("#studentsDetails").load("<?= base_url(); ?>admin/projectcontroller/load_project_students/"+projectId);
                                                    $.fancybox('Student delete successfully',
                                                            {
                                                                'autoDimensions': true,
                                                                'transitionIn': 'none',
                                                                'transitionOut': 'none',
                                                                'onComplete': function() {
                                                                    setTimeout(function() {
                                                                    }, 3000);

                                                                }
                                                            }
                                                    );
                                                } else {
//                        alert("thank you.");
                                                    $.fancybox('Sorry can\'t delete this student at the moment, please try again later',
                                                            {
                                                                'autoDimensions': true,
                                                                'transitionIn': 'none',
                                                                'transitionOut': 'none'
                                                            }
                                                    );
                                                }
                                            }
                                        });
                                    }
                                });
                            var cancelButton = $('<button/>',
                                {
                                    text: 'Cancel',
                                    click: function() {
                                        $.fancybox.close();
                                    }
                                });
                        $('#popupMessage').append(deleteButton).append(cancelButton);
                    }
                });
    }
    
    
     function edit_item(element)
            {
                $.fancybox({
                    href: "<?php echo base_url(); ?>admin/projectcontroller/edit_project_student?student_id=" + $(element).attr("item-id") + "&project_id=" + $(element).attr("project_id"),
                    type: "ajax",
                    scrolling: "no",
                    onClosed: function() {
                       $("#studentsDetails").load("<?= base_url(); ?>admin/projectcontroller/load_project_students/"+$(element).attr("project_id"));
                    }
                });
            }
</script>

<table class="intel-table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Name ar</th>
            <th>Email</th>
            <th>Phone</th>
            <th>School</th>
            <th>School_ar</th>
            <th>Grade</th>
            <th>Birthday</th>
            <th>Gender</th>
            <th>Gov</th>
            <th>edu admin</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
</thead>
<?php 
$count = 0 ;
foreach ($students as $student) { $count++;?>
    <tr>
        <td><?= $student->name ?></td>
        <td><?= $student->name_ar ?></td>
        <td><?= $student->email ?></td>
        <td><?= $student->phone ?></td>
        <td><?= $student->school ?></td>
        <td><?= $student->school_ar ?></td>
        <td><?= $student->grade->get()->name ?></td>
        <td><?= $student->birthday ?></td>
        <td><?= $student->gender ?></td>
        <td><?= $student->gov ?></td>
        <td><?= $student->educational_administration ?></td>
        <td>
            <a class="deleteProjectStudent" project_id="<?= $project->id?>" onclick="edit_item(this)" item-name="<?= $student->name ?>" item-id="<?= $student->id ?>" style="cursor: pointer">
                Edit
            </a>
        </td>
        <td>
            <a class="deleteProjectStudent" project_id="<?= $project->id?>" onclick="delete_item(this)" item-name="<?= $student->name ?>" item-id="<?= $student->id ?>" style="cursor: pointer">
                <img src="<?= base_url() ?>assets/backend/image/delete_small.png"/>                
            </a>
        </td>
    </tr>
<?php } ?>

</table>
<?php if($count<3) {?>
<a class="intel-btn intel-btn-action" id="addStudent" style="cursor: pointer">add Student</a>
<?php } ?>