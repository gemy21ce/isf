<?php foreach ($judges as $judge) { ?>
<?php echo $judge->name ?><br/>

<?php } ?>
<?php if(isset($next)){
echo 'next '.$next;
 } ?>
&nbsp;&nbsp;&nbsp;
<?php if(isset($prev)){
echo 'prev '.$prev;
 } ?>
