<div class="contant-contaner">
      <link type="text/css"  rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/js/jquery/table/table.css" />
    <script src="<?php echo base_url(); ?>assets/backend/js/jquery/table/jquery.dataTables.min.js" language="javascript" type="text/javascript"></script>
    <script language="javascript" type="text/javascript">
        $(document).ready(function() {
        $('#tableData').dataTable();
       } );
    </script>
<span class="creat-botton-contaner"><span class="creat-user-icon"></span><span class="creat-botton"><?= anchor('backend/usermanager/userform', 'create user') ?></span></span>
<?php if (sizeof($query) > 0): //count?>
<table cellpadding="0" cellspacing="0" border="0" class="display"  id="tableData">
    <thead>
        <tr class="title-table">
            <th class="table-border-inheader">Name</th>
            <th class="table-border-inheader">Edit</th>

            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
          <?php foreach ($query as $item): ?>
         <tr class="gradeC">
            <td class="table-border">
                <?= $item->name ?>
            </td>
            <td class="table-border">
           <?= anchor('backend/usermanager/userform/'.$item->id, 'edit'); ?>
            </td>
            <td>
            <?= anchor('backend/usermanager/delete/'.$item->id, 'delete'); ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<?php endif; ?>
</div>