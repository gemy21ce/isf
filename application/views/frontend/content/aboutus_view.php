<div class="body-contact-contaner">
<div class="inner-contact-contaner">
<div class="inner-title"><?php echo $content->name; ?></div>
<div class="inner-img">
     <?php foreach ($files as $file): ?>
                                   <img src="<?php
                            echo base_url() . $file->path . $file->name;
                                ?>" width="902" height="324" />
                                <?php endforeach; ?>
</div>
<div class="inner-text">
    <?php echo $content->body; ?>
</div>
</div>
</div>