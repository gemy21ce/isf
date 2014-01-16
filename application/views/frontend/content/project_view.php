<script type="text/javascript">

    crrentPage='<?php echo $parent->name; ?>';

        $(window).load(function() {

        $('#slider').nivoSlider();

    });

</script>









<div class="container">

    <div class="service-title">

        <?= $parent->name; ?> <div class="backtoproject"><a href="<?php echo base_url() . $this->lang->lang() . '/' . $parent->url . $parent->id; ?>"><?= lang('home.Back'); ?> <?= $parent->name; ?></a></div>

    </div>

    <div class="news-inner-container">



        <div class="project-inner-text">

            <div class="project-inner-title"><?php echo $content->name; ?></div>

            <!--  ♦ slider ♦  -->

            <div id="wrapper" class="project-slider-inner">

                <div class="slider-wrapper  theme-default">

                    <div id="slider" class="nivoSlider project-slider">

                        <?php foreach ($files as $file): ?>



                            <a href="#">  <img src="<?php

                        echo base_url() . $file->path . $file->name;

                            ?>" width="414" height="243"/></a>



                        <?php endforeach; ?>

                    </div>

                </div>

            </div>

            <?php echo $content->body; ?>



        </div>

    </div>

</div>