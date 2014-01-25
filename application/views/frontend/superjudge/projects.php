<?php foreach ($projects as $pro) { ?>
<?php echo $pro->name ?><br/>

<?php } ?>
<?php if(isset($next)){
echo 'next '.$next;
 } ?>
&nbsp;&nbsp;&nbsp;
<?php if(isset($prev)){
echo 'prev '.$prev;
 } ?>
