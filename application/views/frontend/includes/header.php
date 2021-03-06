<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="<?= base_url() ?>assets/frontend/images/isef_favicon_32.ico" rel="icon" type="image/x-icon"/>
        <meta http-equiv="X-UA-Compatible" content="IE=10" />
        <title>Judging Area - Intel ISEF Egypt</title>
        <script scr="<?= base_url() ?>assets/ajax.submit.js" ></script>
        <link rel="stylesheet" href="<?= base_url() ?>assets/frontend/css/pure-min.css" />
        <link rel="stylesheet" href="<?= base_url() ?>assets/frontend/css/site.css" />
        <link rel="stylesheet" href="<?= base_url() ?>assets/frontend/css/base.css" />
        <link rel="stylesheet" href="<?= base_url() ?>assets/frontend/css/accordion.css" />
        <link rel="stylesheet" href="<?= base_url() ?>assets/frontend/css/breadcrumb.css" />
        <link rel="stylesheet" href="<?= base_url() ?>assets/frontend/css/button.css" />
        <link rel="stylesheet" href="<?= base_url() ?>assets/frontend/css/dropdown_slidingmenus.css" />
        <link rel="stylesheet" href="<?= base_url() ?>assets/frontend/css/font.css" />
        <link rel="stylesheet" href="<?= base_url() ?>assets/frontend/css/form.css" />
        <link rel="stylesheet" href="<?= base_url() ?>assets/frontend/css/header.css" />	
        <link rel="stylesheet" href="<?= base_url() ?>assets/frontend/css/icon.css" />
        <link rel="stylesheet" href="<?= base_url() ?>assets/frontend/css/listview.css" />
        <link rel="stylesheet" href="<?= base_url() ?>assets/frontend/css/pagination.css" />
        <link rel="stylesheet" href="<?= base_url() ?>assets/frontend/css/progress_bar.css" />
        <link rel="stylesheet" href="<?= base_url() ?>assets/frontend/css/radiobuttons_checkboxes.css" />
        <link rel="stylesheet" href="<?= base_url() ?>assets/frontend/css/switch.css" />	
        <link rel="stylesheet" href="<?= base_url() ?>assets/frontend/css/tab.css" />
        <link rel="stylesheet" href="<?= base_url() ?>assets/frontend/css/table.css" />
        <link rel="stylesheet" href="<?= base_url() ?>assets/frontend/css/title_bar.css" />	
        
        <link rel="stylesheet" href="<?= base_url() ?>assets/backend/js/jquery/ui/css/ui-lightness/jquery-ui-1.10.4.css" />
        <script src="<?= base_url() ?>assets/frontend/js/jquery-1.10.1.js"></script>		
        <script src="<?= base_url() ?>assets/backend/js/jquery/ui/js/jquery-ui_1.10.4.js"></script>	
        <!--[if lt IE 9]>		
                <link rel="stylesheet" href="<?= base_url() ?>assets/frontend/css/fallback.css" />
                <script src="<?= base_url() ?>assets/frontend/js/modernizr.js"></script>
                <script src="<?= base_url() ?>assets/frontend/js/respond.min.js"></script>
                <script src="<?= base_url() ?>assets/frontend/js/PIE.js"></script>			
        <![endif]-->
        <script src="<?= base_url() ?>assets/frontend/js/master.js"></script>
        <script src="<?= base_url() ?>assets/frontend/js/master.js"></script>
        <script src="<?= base_url() ?>assets/ajax.submit.js"></script>
        <style>
                .forcedHidden{
                    display: none!important;
                }
            </style>
    </head>
    <body>
        <header class="pure-g-r intel-hdr">							
            <div class="intel-u-1 intel-desktop" style="z-index: 10000">								
                <div class="intel-hdr-box-wrap">
                    <div class="intel-hdr-box-info-left">
                        <div class="intel-hdr-infobar">
                            <span class="intel-hdr-ww"><?php echo date("M d, Y") ?></span>
                            <span class="intel-hdr-user"> 
                                <?php $user = $this->session->all_userdata(); ?>
                            </span>
                            <script type="text/javascript">
                                $(function() {
                                    $(".intel-hdr").each(function() {
                                        if (!($(this).attr('id'))) {
                                            $(this).attr("id", "hdr" + IUtility.guid());
                                        }
                                        var tmpHeader = new IHeader("#" + $(this).attr("id"), null, null, null, null, null, "<?php echo $user['username'] ?>");
                                        tmpHeader.init();
                                    });
                                });
                            </script>
                            <span class="intel-hdr-logout"><a href="<?= base_url() ?>home/logout" style="color: white;" >
                                                             Log out
                                                        </a></span>
                            <!--                            <a href="javascript:void(0);" class="intel-hdr-help">
                                                            <span class="icon-b_help"> </span>
                                                            Help
                                                        </a>-->
                            <!--                            <input type="search" id="iptSearch" name="iptSearch" placeholder="Search" />
                                                        <a href="javascript:void(0);" class="intel-btn intel-btn-action intel-btn-icon-only intel-hdr-search">
                                                            <span class="icon-search"> </span>
                                                        </a>-->
                        </div>
                    </div>
                    <div class="intel-hdr-box-title">
                        <div class="intel-hdr-title">Judging</div>
                    </div>
                </div>								
                <div class="intel-hdr-box-logo intel-right intel-desktop">
                    <a href="<?= base_url() ?>"><img class="intel-hdr-logo" src="<?= base_url() ?>assets/frontend/images/iesf.png"   alt="ISEF Logo"/></a>
                </div>
                <div class="social-icon"> <a href="mailto:info@isef-eg.com"><img src="<?= base_url() ?>assets/frontend/images/mail-icon.png" width="24" height="25" /></a>
                    <a target="_blanck" href="http://www.youtube.com/isefeg"><img src="<?= base_url() ?>assets/frontend/images/youtube-icon.png" width="24" height="25" /></a>
                    <a target="_blanck" href="http://twitter.com/isefeg"><img src="<?= base_url() ?>assets/frontend/images/twitter-icon.png" width="24" height="25" /></a>
                    <a target="_blanck" href="http://www.facebook.com/isef.eg"><img src="<?= base_url() ?>assets/frontend/images/facebook-icon.png" width="24" height="25" /></a>
                </div>
            </div>
            <div class="intel-u-1-4 intel-mobile">
                <!--<a href="javascript:void(0);" class="intel-hdr-btn-menu intel-left"><span class="icon-menu"> </span></a>-->
            </div>
            <div class="intel-u-1-2 intel-center intel-mobile">
                <div class="intel-hdr-title">Judging</div>
            </div>
            <div class="intel-u-1-4 intel-right intel-mobile">
                <!--<a href="javascript:void(0);" class="intel-hdr-btn-next-simple ">Next <span class="icon-a_right"> </span></a>-->
            </div>	
        </header>