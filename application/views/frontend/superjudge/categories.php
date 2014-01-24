<?php foreach ($categories as $cat) { ?>
<?php echo $cat->name ?><br/>
<div style="color: #2b66c9">
    <?php 
    $subs = $cat->subcategory->get();
    foreach ($subs as $sub){
        echo $sub->name.'<br/>';
    }
    ?>
</div>
<?php } ?>
<?php if(isset($next)){
echo 'next '.$next;
 } ?>
&nbsp;&nbsp;&nbsp;
<?php if(isset($prev)){
echo 'prev '.$prev;
 } ?>
