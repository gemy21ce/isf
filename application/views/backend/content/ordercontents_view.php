<link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/js/jquery/ui/css/ui-lightness/jquery-ui-1.8.21.custom.css">

<script src="<?php echo base_url(); ?>assets/backend/js/jquery/ui/js/jquery-1.7.2.min.js"></script>

<script src="<?php echo base_url(); ?>assets/backend/js/jquery/ui/js/jquery-ui-1.8.21.custom.min.js"></script>

<style>

    #sortable { list-style-type: none; margin: 0; padding: 0; width: 60%; }

    #sortable li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; font-size: 1.4em; height: 18px; line-height:18px; cursor:move;}

    #sortable li span { position: absolute; margin-left: -1.3em; }

</style>

<script>

    $(function() {

        $( "#sortable" ).sortable();

        $( "#sortable" ).disableSelection();

    });

</script>

<div class="contant-contaner">

    <span class="creat-botton-contaner">

        <span class="creat-content-icon"></span><span class="creat-botton"><?= anchor('admin/contentcontroller/contentform', 'create content') ?></span>

        <span class="creat-content-icon"></span><span class="creat-botton"><a href="<?php echo base_url(); ?>backend/contentcontroller/home">Contents</a></span>

    </span>

    <div class="creat-botton-contaner">

        <form action="<?php echo base_url().'admin/contentcontroller/saveordercontents'.$parent; ?>" method="post">

            <ul id="sortable">            

                <?php foreach ($contents as $content) { ?>

                    <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span><input type="hidden" id="contents<?php echo $content->id; ?>" name="contents<?php echo $content->id; ?>" value="<?php echo $content->id; ?>" /><?php echo $content->name; ?></li>

                    <?php } ?>

            </ul>

            <input type="submit" value="Submit" />

        </form>

    </div>

</div>