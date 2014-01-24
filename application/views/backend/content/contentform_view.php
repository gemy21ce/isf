<h1>Create content</h1>

<link href="<?php echo base_url(); ?>assets/backend/js/jquery/uploadify/uploadify.css" type="text/css" rel="stylesheet" />

<script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/jquery/uploadify/jquery-1.4.2.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/jquery/uploadify/swfobject.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/jquery/uploadify/jquery.uploadify.v2.1.4.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/ckeditor/ckeditor.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/ckeditor/sample.js"></script>


<script type="text/javascript">

    $(document).ready(function() {

<?php
$parentObject = new ArrayObject();
$parentObject->contenttype_id = 0;
$p_parentObject = new ArrayObject();
$p_parentObject->contenttype_id = 0;
if (isset($parent)):

    $contentModle = new Content();

    $id = str_replace('/', '', $parent);

    $contentModle->where('id', $id);

    $parentObject = $contentModle->get();
    if ($parentObject->parent != NULL) {
        $parentContentModle = new Content();
        $parentContentModle->where('id', $parentObject->parent);
        $p_parentObject = $parentContentModle->get();
    }

    if ($parentObject->contenttype_id == 1):
        ?>

                        $('.contenttypes,.headermenu,.lang').hide();
                        $("#language option[value='<?php echo $parentObject->language_id; ?>']").attr('selected', 'selected');
                        $('.title').children('label').html('URL');

    <?php elseif ($parentObject->contenttype_id == 4): ?>

                    $('.contenttypes,.headermenu,.lang').hide();
                    $("#language option[value='<?php echo $parentObject->language_id; ?>']").attr('selected', 'selected');
                    $("#content_type option[value='4']").attr('selected', 'selected');

    <?php elseif ($parentObject->contenttype_id == 5): ?>

                    $('.contenttypes,.headermenu,.lang').hide();
                    $("#language option[value='<?php echo $parentObject->language_id; ?>']").attr('selected', 'selected');
                    $("#content_type option[value='5']").attr('selected', 'selected');

    <?php elseif ($parentObject->contenttype_id == 6): ?>
                    $('.contenttypes,.headermenu,.lang').hide();
                    $("#language option[value='<?php echo $parentObject->language_id; ?>']").attr('selected', 'selected');
                    $("#content_type option[value='6']").attr('selected', 'selected');
    <?php elseif ($parentObject->contenttype_id == 8): ?>
                    $('.contenttypes,.headermenu,.lang').hide();
                    $("#language option[value='<?php echo $parentObject->language_id; ?>']").attr('selected', 'selected');
                    $("#content_type option[value='8']").attr('selected', 'selected');
                    revertTitleAndURL('URL');
                    $('#pbody').hide();

        <?php
    endif;

endif;
?>

        $('#userfile').uploadify({

            'uploader'  : '<?php echo base_url(); ?>assets/backend/js/jquery/uploadify/uploadify.swf',

            'script'    : '<?= site_url('admin/filecontroller/upload') ?>',

            'cancelImg' : '<?php echo base_url(); ?>assets/backend/js/jquery/uploadify/cancel.png',

            'folder'         : '/images',

            'queueID'        : 'fileQueue',

            'fileDataName':'userfile',

            'auto'           : true,

            'multi'          : true,

            //            'fileExt': '*.jpg;*.jpeg;*.gif;*.png;*.swf;',

            //            'fileDesc'      :'Please select Gif,JPG,PNG IMAGES or Flash',

            'buttonText': 'Uplaod File',

//<?php if (!empty($content)): ?> 
            'scriptData'  : {'content':<?= $content->id; ?>},//<?php endif; ?>

            onComplete: function(event, queueID, fileObj, reposnse, data) {

                $('#filesUploaded').append(reposnse);

            }

        });

    });

    function changeAction(){

        if($('form').valid()){

            $('form').attr('action',$('form').attr('action')+'/upload');

            $('input[type=submit]').click();

        }

    }
    function revertTitleAndURL(txt){
        $('.title').children('label').html(txt);
    }
</script>

<fieldset>

    <legend>content information</legend>

    <?php echo validation_errors('<p class="error">'); ?>

    <?php
    echo form_open('admin/contentcontroller/savecontent');
    ?>

    <?php if (isset($parent)): ?> 

        <input type="hidden" id="parent" name="parent" value="<?php echo str_replace('/', '', $parent); ?>"/>

    <?php endif; ?>

    <?php
    if (!empty($content)):
        ?>

        <input type="hidden" id="id" name="id" value="<?= $content->id; ?>" />

        <div style="float: right;">

            <?php if ($content->contenttype_id == 1 && $content->parent == NULL): ?> 

                <a href="<?php echo base_url() . 'admin/contentcontroller/home/' . $content->id; ?>">Manage Slider</a>
                <script type="text/javascript">

                    $(document).ready(function(){

                        $('#fieldset').hide();

                    });

                </script>

            <?php endif; ?>

            <?php if ($content->contenttype_id == 4 && $content->parent == NULL): ?> 

                <a href="<?php echo base_url() . 'admin/contentcontroller/home/' . $content->id; ?>">Manage News</a>

                <script type="text/javascript">

                    $(document).ready(function(){

                        $('#fieldset').hide();

                        $('#pbody').hide();

                    });

                </script>

            <?php endif; ?>

            <?php if ($content->contenttype_id == 6 && $content->parent == NULL): ?> 

                <a href="<?php echo base_url() . 'admin/contentcontroller/home/' . $content->id; ?>">Manage Projects</a>

                <script type="text/javascript">

                    $(document).ready(function(){

                        $('#fieldset').hide();

                        $('#pbody').hide();

                    });

                </script>

            <?php endif; ?>
            <?php if ($content->contenttype_id == 6 && $parentObject->contenttype_id == 6 && $p_parentObject->contenttype_id != 6): ?> 

                <script type="text/javascript">

                    $(document).ready(function(){
                        $('#fieldset').show();
                        $('#pbody').show();

                    });

                </script>
            <?php endif; ?>

            <?php if ($content->contenttype_id == 5 && $content->parent == NULL): ?> 

                <a href="<?php echo base_url() . 'admin/contentcontroller/home/' . $content->id; ?>">Manage Services</a>

                <script type="text/javascript">

                    $(document).ready(function(){

                        $('#fieldset').hide();

                        $('#pbody').hide();

                    });

                </script>

            <?php endif; ?>
            <?php if ($content->contenttype_id == 8 && $content->parent == NULL): ?> 

                <a href="<?php echo base_url() . 'admin/contentcontroller/home/' . $content->id; ?>">Manage Clients</a>

                <script type="text/javascript">

                    $(document).ready(function(){

                        $('#fieldset').hide();

                        $('#pbody').hide();                       
                        

                    });

                </script>

            <?php endif; ?>


        </div>

        <p>

            <label>Name</label>

            <input type="text" id="name" name="name" value="<?= $content->name; ?>" class="required"/>

        </p>

        <p  class="dateRange"  style="display: none;">

            <label>Date Range</label>

            <input type="text" id="date" name="date" value="<?= $content->date; ?>"/>

        </p>

        <p  class="dateRange"  style="display: none;">

            <label>View In Home</label><br>


            <input type="radio" id="view" name="view" value="news" <?php if ($content->view == 'news'): ?>checked="true"<?php endif; ?> onclick="revertTitleAndURL('Title');">News View<br>

            <input type="radio" id="view" name="view" value="ad" <?php if ($content->view == 'ad'): ?>checked="true"<?php endif; ?> onclick="revertTitleAndURL('Title');">Ad View<br>
            <input type="radio" id="view" name="view" value="home" <?php if ($content->view == 'home'): ?>checked="true"<?php endif; ?> onclick="revertTitleAndURL('URL');">Home View
        </p>

        <p class="contenttypes">

            <label>Content Types</label>

            <select id="content_type" name="content_type">

                <?php foreach ($contentTypes as $item): ?><!--  <php if ($item->id == 1||$item->id == 2): ?> onclick="show('ar');"<php else : ?> onclick="hide('ar');"<php endif; ?>  -->

                    <option value="<?= $item->id ?>" <?php if ($item->id == $content->contenttype_id): ?> selected<?php endif; ?> ><?= $item->type ?></option>

                <?php endforeach; ?>



            </select>

        </p>
        <p class="lang">

            <label>Language</label>

            <select id="language" name="language">

                <?php foreach ($languages as $item): ?>

                    <option value="<?= $item->id ?>" <?php if ($item->id == $content->language_id): ?> selected<?php endif; ?> ><?= $item->name ?></option>

                <?php endforeach; ?>



            </select>

        </p>

        <p>

            <label>Status</label>

            <select id="status" name="status">

                <option value="ACTIVE" <?php if ($content->status == 'ACTIVE'): ?> selected<?php endif; ?>>ACTIVE</option>

                <option value="HIDDEN" <?php if ($content->status == 'HIDDEN'): ?> selected<?php endif; ?>>HIDDEN</option>

            </select>



        </p>

        <p class="headermenu">

            <label>Menu </label>

            <select id="header_menu" name="header_menu">

                <option value="0" <?php if ($content->header_menu == 0): ?> selected<?php endif; ?>>False</option>

                <option value="1" <?php if ($content->header_menu == 1): ?> selected<?php endif; ?>>True</option>

            </select>



        </p>





        <p class="title">

            <label>Title</label>

            <input type="text" id="title" name="title" value="<?= $content->title; ?>" class="required"/>

        </p>

        <p id="pbody">

            <label>Body</label>

            <textarea class="ckeditor" id="body" name="body"><?= $content->body; ?></textarea>

        </p>





        <fieldset id="fieldset">

            <legend>Upload</legend>

            <input id="userfile" name="userfile" type="file" />

            <div id="filesUploaded">

                <?php if (!empty($files)):foreach ($files as $file) : ?>

                        <div  id="file_div_<?php echo $file->id; ?>">

                            <?php if (strpos($file->name, '.swf') !== false || strpos($file->name, '.SWF') !== false): ?>

                                <object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="50" height="50">

                                    <param name="movie" value="<?php echo base_url() . $file->path . $file->name ?>" />

                                    <param name="quality" value="high" />

                                    <param name="wmode" value="transparent" />

                                    <param name="swfversion" value="6.0.65.0" />

                                    <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don�t want users to see the prompt. -->

                                    <param name="expressinstall" value="scripts/expressInstall.swf" />

                                    <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->

                                    <!--[if !IE]>-->

                                    <object type="application/x-shockwave-flash" data="<?php echo base_url() . $file->path . $file->name ?>" width="50" height="50">

                                        <!--<![endif]-->

                                        <param name="quality" value="high" />

                                        <param name="wmode" value="transparent" />

                                        <param name="swfversion" value="6.0.65.0" />

                                        <param name="expressinstall" value="scripts/expressInstall.swf" />

                                        <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->

                                        <div>

                                            <h4>Content on this page requires a newer version of Adobe Flash Player.</h4>

                                            <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" width="112" height="33" /></a></p>

                                        </div>

                                        <!--[if !IE]>-->

                                    </object>

                                    <!--<![endif]-->

                                </object>

                            <?php elseif (strpos($file->name, '.pdf') !== false || strpos($file->name, '.PDF') !== false): ?>

                                <img src="<?php echo base_url() . 'assets/backend/image/pdf.gif'; ?>" /><?php echo $file->name; ?>

                            <?php else: ?>

                                <img src="<?php
                $image_name = $file->name;

                $image_name = str_replace(".", "_small.", $image_name);

                echo base_url() . $file->path . $image_name;
                                ?>"  />

                            <?php endif; ?>



                            <input type="button" value="remove" onclick="sendAjax('<?php echo base_url() . 'admin/filecontroller/delete/' . $file->id; ?>','file_div_<?php echo $file->id; ?>');" />

                        </div>

                        <?php
                    endforeach;

                endif;
                ?>

            </div>

            <div id="fileQueue"></div>

        </fieldset>

        <?php
    else :
        ?>

        <p>

            <label>Name</label>

            <input type="text" id="name" name="name" value="" class="required"/>

        </p>

        <p  class="dateRange"  style="display: none;">

            <label>Date Range</label>

            <input type="text" id="date" name="date" value=""/>

        </p>

        <p  class="dateRange"  style="display: none;">

            <label>View In Home</label>

            <input type="radio" id="view" name="view" value="news">News View<br>

            <input type="radio" id="view" name="view" value="ad">Ad View<br>
            <input type="radio" id="view" name="view" value="home">Home View

        </p>

        <p class="contenttypes">

            <label>Content Types</label>

            <select id="content_type" name="content_type">

                <?php foreach ($contentTypes as $item): ?><!-- <php if ($item->id == 1||$item->id == 2): ?> onclick="show('ar');"<php else : ?> onclick="hide('ar');"<php endif; ?>-->

                    <option value="<?= $item->id ?>" <?php if ($item->id == 2): ?> onclick="show('ar');"<?php else: ?> onclick="hide('ar');"<?php endif; ?>  ><?= $item->type ?></option>

                <?php endforeach; ?>



            </select>

        </p>
        <p class="lang">

            <label>Language</label>

            <select id="language" name="language">

                <?php foreach ($languages as $item): ?>

                    <option value="<?= $item->id ?>"  ><?= $item->name ?></option>

                <?php endforeach; ?>



            </select>

        </p>

        <p>

            <label>Status</label>

            <select id="status" name="status">

                <option value="HIDDEN">HIDDEN</option>

                <option value="ACTIVE">ACTIVE</option>

            </select>



        </p>

        <p class="headermenu">

            <label>Menu </label>

            <select id="header_menu" name="header_menu">

                <option value="0" >False</option>

                <option value="1">True</option>

            </select>



        </p>

        <p class="title">

            <label>Title</label>

            <input type="text" id="title" name="title" value="" class="required" />

        </p>

        <p id="pbody">

            <label>Body</label>

            <textarea class="ckeditor" id="body" name="body"></textarea>

        </p>



        <a onclick="changeAction();" style="float: right;">Save to upload</a>

    <?php
    endif;
    ?>

    <?php
    echo form_submit('submit', 'save');

    echo form_close();
    ?>

</fieldset>

<script src="<?php echo base_url(); ?>assets/frontend/js/jquery.validate.js" type="text/javascript" charset="utf-8"></script> 

<script>

    $(document).ready(function(){

        $("form").validate();

    });



</script>

