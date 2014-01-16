<div class="container">
    <div class="service-title">
        <?php echo $content->name; ?>
    </div>
    <!--  ♦ news-home ♦  -->
    <div class="map-contaner">
        <div class="map">

            <iframe width="573" height="412" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src=" <?php
        $configuration = $this->load->model('configuration');
        $configuration = new Configuration();
        $configuration->get_by_id(1);
        echo "{$configuration->sitemap}";
        ?>"></iframe>

        </div>
    </div>

    <div class="contact-text-contaner">
        <?php echo $content->body; ?>
    </div>

    <div class="contact-text-title">
    <?= lang('home.ContactForm'); ?>
    </div>
   
    <div class="contact-form-error"><?= lang('home.Allfields'); ?></div>
    <div class="contact-form-contaner">
 <span class=""><?php
        if (!empty($message))
            echo lang($message);
        ?></span>
        <?php
        echo form_open('home/sendmail');
        ?>
        <div class="contact-form-text"><?= lang('home.YourMail'); ?></div> <div class="contact-form-input">
            <input class="required email" name="clientMail" id="clientMail" type="text" value="" size="31" />
        </div>

        <div class="contact-form-text"> <?= lang('home.MessageSubject'); ?></div> <div class="contact-form-input">
            <input class="required" name="subject" id="subject" type="text" value="" size="31" />
        </div>

        <div class="contact-form-text"><?= lang('home.Message'); ?></div> <div class="contact-form-input">
            <textarea name="message" class="required"  id="message" cols="24" rows="5"></textarea>
        </div>
        <input type="hidden" id="url" name="url" value="<?php echo current_url(); ?>"/>
        <div class="contact-form-supmet f-r">
            <input onclick="submitForm();" id="submit" type="button" value="<?= lang('home.SendEmail'); ?>"/>
            <input style="display: none;" id="fireME" type="submit" value="Send email"/>
        </div>
        <div class="contact-form-supmet f-r">
            <input type="reset" value="<?= lang('home.Clear'); ?>" >
        </div>

        </form>
    </div>

</div>
<script src="<?php echo base_url(); ?>assets/frontend/js/jquery.validate.js" type="text/javascript" charset="utf-8"></script> 

<script>

    //        $(document).ready(function(){

    //            $('.contact-text.f,.contact-title.f').each(function(index){

    //                if($.trim($(this).html())=='')$(this).remove();

    //            })

    //            jQuery.validator.setDefaults({

    //                errorPlacement: function(error, element) {

    //                    error.appendTo('#invalid-' + element.attr('id'));

    //                }

    //            });                        $("form").validate();

    //        });

    $(document).ready(function(){

        $("form").validate();

    });

    function submitForm(){

        if($("form").valid()){

            $('#submit').hide();

            $("#fireME").click();

        }

    }

</script>