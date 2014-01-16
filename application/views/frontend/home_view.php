<div class="container">
    <!--  ♦ slider ♦  -->
    <div class="slider-contaner"></div>

    <!--slider start-->

    <div id="wrapper">

        <div class="slider-wrapper  theme-default home-slider">

            <div id="slider" class="nivoSlider"> 

                <?php
                $this->load->model('File');

                $file = new File();

                foreach ($sliders as $contentS):$file->where('content_id', $contentS->id);

                    $file->get(1);
                    ?>

                    <img src="<?php echo base_url() . $file->path . $file->name; ?>" alt="test" title="#sliderCaption<?php echo $contentS->id; ?>" />

                <?php endforeach; ?>



            </div>

            <?php foreach ($sliders as $contentS): ?>

                <div id="sliderCaption<?php echo $contentS->id; ?>" class="nivo-html-caption">
                    <div class="caption-border"></div>
                    <div class="caption-text"><a href="<?php echo $contentS->title; ?>"><?php echo $contentS->name; ?></a></br> <span class="cut" cut="250 "><?php echo $contentS->body; ?></span></div>

                </div>



            <?php endforeach; ?>

        </div>

    </div>

    <!--home container-->
    <div class="home-container">
        <!--  ♦ left-container ♦  --> 
        <div class="left-container">
            <div class="welcome">
                <div class="welcome-title"><?php echo $content->title; ?></div>
                <div class="welcome-text"><?php echo $content->body; ?> </div>
            </div>

            <div class="home-news">
                <?php
                $news = new Content();

                $news->where('contenttype_id', 4);

                $news->where('status', 'ACTIVE');

                $news->where('language_id', $laguageObject->id);

                $news->get(1);
                ?>
                <div class="home-news-title"><?= $news->name; ?></div>
                <div class="home-news-container">

                    <?php
                    $news_singles = new Content();

                    $news_singles->where('parent', $news->id);

                    $news_singles->where('status', 'ACTIVE');

                    $news_singles->order_by('content_order', 'asc');

                    $news_singles->get(3);

                    foreach ($news_singles as $news_single) {

                        $file = new File();

                        $file->where('content_id', $news_single->id);

                        $file->get(1);
                        ?>
                        <!--  ♦ single news ♦  --> 
                        <div class="home-news-container-one">
                            <div class="home-news-container-one-img"><a href="<?php echo base_url() . $this->lang->lang() . '/' . $news_single->url . $news_single->id; ?>"> 
                                    <img src="<?php
                    $image_name = $file->name;
                    $image_name = str_replace(".", "_small.", $image_name);
                    echo base_url() . $file->path . $image_name;
                        ?>" width="170"  height="99" /></a></div>
                            <div class="home-news-container-one-title">
                                <?php echo $news_single->name; ?> </div>
                            <div class="home-news-container-one-text">
                                <span class="cut" cut="95" show="true"> <?php echo $news_single->body; ?></span> <a style="display: none;" href="<?php echo base_url() . $this->lang->lang() . '/' . $news_single->url . $news_single->id; ?>"><?= lang('home.More'); ?> </a>
                            </div>
                        </div>

                        <!--  ♦ close single news ♦  -->
                    <?php } ?>
                </div>

                <script type="text/javascript">
                    $('.home-news-container-one:last').addClass("home-news-last");
                </script>

            </div>



        </div>
        <!--  ♦ close left-container ♦  --> 
        <!--  ♦ Right-container ♦  --> 
        <div class="right-container">
            <?php
            $projects = new Content();

            $projects->where('contenttype_id', 6);

            $projects->where('status', 'ACTIVE');

            $projects->where('language_id', $laguageObject->id);

            $projects->get(1);
            ?>
            <div class="home-Project-title"><?= $projects->title; ?></div>
            <div class="home-Project-container">

                <?php
                $project = new Content();

                $project->where('parent', $projects->id);

                $project->where('status', 'ACTIVE');

                $project->order_by('content_order', 'asc');

                $project->get(3);

                foreach ($project as $p) {

                    $file = new File();

                    $file->where('content_id', $p->id);

                    $file->get(1);
                    ?>
                    <div class="home-Project-container-one">
                        <div class="home-Project-img"><a href="<?php echo base_url() . $this->lang->lang() . '/' . $p->url . $p->id; ?>"> 
                                <img src="<?php
                $image_name = $file->name;
                $image_name = str_replace(".", "_small.", $image_name);
                echo base_url() . $file->path . $image_name;
                    ?>" width="128"  height="100" /></a></div>
                        <div class="home-Project-one-title"> <?php echo $p->name; ?></div>
                        <div class="home-Project-one-text" > <span class="cut" cut="135" show="true"><?php echo $p->body; ?></span><a style="display: none;" href="<?php echo base_url() . $this->lang->lang() . '/' . $p->url . $p->id; ?>"><?= lang('home.More'); ?> </a></div>
                    </div>

                <?php } ?>
                <!--  ♦ single Project♦  --> 

                <!--  ♦ close single Project♦  --> 



                <script type="text/javascript">
                    $('.home-Project-container-one:last').addClass("last-Project-one");
                </script>

            </div>
        </div>
        <!--  ♦ close Right-container ♦  --> 
    </div>
</div>
<!--end home-->



<script type="text/javascript">
    $(document).ready(function(){
        $(".cut").each(function(){

            var htm=$(this).text(); 
            if(htm.length>$(this).attr("cut")){
                if($(this).attr("show")){
                    htm=htm.substring(0,$(this).attr("cut"));
                    $(this).parent().children("a").show();
                }
                else htm=htm.substring(0,$(this).attr("cut"))+'...';
            }

            $(this).html(htm);

        });
    });
    // nivoslider init

    jQuery('#slider').nivoSlider({

        effect: 'fade',

        slices:15,

        boxCols:10,

        boxRows:4,

        animSpeed:500,

        pauseTime:5000,

        directionNav: true

    });

</script> 