<div class="container">    <div class="service-title">        <?php echo $content->name; ?>    </div>    <div class="service-container">        <!--  ♦ news one ♦  -->        <?php        foreach ($result as $news_single) {            $file = new File();            $file->where('content_id', $news_single->id);            $file->get(1);            ?>            <div class="news-container-one">                <div class="news-img"> <img src="<?php        $image_name = $file->name;        $image_name = str_replace(".", "_small.", $image_name);        echo base_url() . $file->path . $image_name;            ?>" /></div>                <div class="news-title-one"><a href="<?php echo base_url() . $this->lang->lang() . '/' . $news_single->url . $news_single->id; ?>"><?php echo $news_single->name; ?> </a></div>                <div class="news-text-one"><span class="cut" cut="356" show="true"><?php echo $news_single->body; ?></span> <a style="display: none;" href="<?php echo base_url() . $this->lang->lang() . '/' . $news_single->url . $news_single->id; ?>"><?= lang('home.More'); ?></a></div>            </div>            <?php        }        ?>        <!--  ♦ close news one ♦  -->    </div>    <div class="conrtrol-container">        <?php echo $links; ?>    </div></div><script>    $(document).ready(function(){        $(".cut").each(function(){            var htm=$(this).text();             if(htm.length>$(this).attr("cut")){                if($(this).attr("show")){                    htm=htm.substring(0,$(this).attr("cut"));                    $(this).parent().children("a").show();                }                else htm=htm.substring(0,$(this).attr("cut"))+'...';            }            $(this).html(htm);        });        //  $(".cut").html();        $('.singlenews-inner-contaner:last').addClass('last');    });</script>