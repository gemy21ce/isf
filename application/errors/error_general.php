<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta http-equiv="X-UA-Compatible" content="IE=10" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Not Found - Intel ISEF Egypt </title>
        <link href="<?php echo base_url(); ?>assets/frontend/images/isef_favicon_32.ico" rel="icon" type="image/x-icon"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/pure-min.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/site.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/base.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/accordion.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/breadcrumb.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/button.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/dropdown_slidingmenus.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/font.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/form.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/header.css" />	
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/icon.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/listview.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/pagination.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/progress_bar.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/radiobuttons_checkboxes.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/switch.css" />	
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/tab.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/table.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/title_bar.css" />	
        <script src="<?php echo base_url(); ?>assets/frontend/js/jquery-1.10.1.js"></script>
        <script src="<?php echo base_url(); ?>assets/ajax.submit.js"></script>
        <script src="<?php echo base_url(); ?>assets/jquery.validate.min.js"></script>
        <!--[if lt IE 9]>		
                <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/fallback.css" />
                <script src="<?php echo base_url(); ?>assets/frontend/js/modernizr.js"></script>
                <script src="<?php echo base_url(); ?>assets/frontend/js/respond.min.js"></script>
                <script src="<?php echo base_url(); ?>assets/frontend/js/PIE.js"></script>			
        <![endif]-->
        <script src="<?php echo base_url(); ?>assets/frontend/js/master.js"></script>
        <script>
            $(document).ready(function() {
                var x = $(window).height();

                x = (x - 380) / 2;

                $(function() {
                    $("#login-form").css("margin-top", x);
                });
                $("form").validate({
                    rules: {
                        password: {
                            required: true,
                            minlength: 6
                        },
                        email: {
                            required: true,
                            email: true
                        }
                    },
                    messages: {
                        password: "يجب ألايقل طول الكلمة عن 6 أحرف",
                        email: "البريد الاليكتروني غير صحيح"
                    }
                });
            });

        </script>
        <style>
            body{
                background:#edeff0; 
            }
        </style>
    </head>

    <body>
        <div class="login-form" id="login-form">
            <div class="login-logo"><img src="<?php echo base_url(); ?>assets/frontend/images/iesf.png" width="100" height="117" /></div>
            <div class="intel-checkbox" style="margin-top: 120px;margin-bottom: 120px;font-size: x-large;text-align: center;color: black;">error 500 - page not found</div>
            <div class="login-fotter-logo"><a href="http://www.intel.com/content/www/xr/en/homepage.html"><img src="<?php echo base_url(); ?>assets/frontend/images/intel.jpg" width="87" height="82" /></a><a href="http://www.misrelkheir.org/"><img src="<?php echo base_url(); ?>assets/frontend/images/misr-el-kheir.jpg" width="87" height="82" /></a></div>
        </div>
        <div style="display: none;">
            <h1><?php echo $heading; ?></h1>
		<?php echo $message; ?>
        </div>
    </body>
</html>
