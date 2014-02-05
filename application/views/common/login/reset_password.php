<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta http-equiv="X-UA-Compatible" content="IE=10" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>ISEF: Login</title>
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
            <form action="<?php echo base_url(); ?>home/changepassword" method="post" class="intel-form pure-form-stacked">
                <input value="<?= $id ?>" name="id" type="hidden"/>
                <label for="password">كلمة المرور</label>
                <input id="password" name="password" type="password" placeholder="كلمة المرور"/>
                

                <label for="password">تأكيد كلمة المرور</label>
                <input id="password2" name="password2" type="password" placeholder="تأكيد كلمة المرور"/>
                <div class="intel-checkbox">
                </div>
                <!--                <div class="intel-checkbox">
                                <input type="checkbox" id="Check_Box_1Key"/>
                                    <label  for="Check_Box_1Key">Remember Me</label>
                                </div>-->
                <button type="submit" class="intel-btn intel-btn-action">
                    حفظ 
                </button>
            </form>
            <div style="margin-top: 40px;" class="login-fotter-logo">
                <a href="#"><img src="<?php echo base_url(); ?>assets/frontend/images/intel.jpg" width="87" height="82" /></a><a href="#"><img src="<?php echo base_url(); ?>assets/frontend/images/misr-el-kheir.jpg" width="87" height="82" /></a>
            </div>
        </div>
    </body>
</html>