<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta http-equiv="X-UA-Compatible" content="IE=10" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Reset Password - Intel ISEF Egypt </title>
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
                            required:true,
                            minlength: 6
                        },
                        password2: {
                            equalTo: "#password"
                        }
                    },
                    messages:{
                        password: "Min lengh of chars 6",
                        email:  "Incorrect email format"
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
            <form action="<?php echo base_url(); ?>home/changepassword" method="post" class="intel-form pure-form-stacked">
                <input value="<?= $id ?>" name="id" type="hidden"/>
                <label for="password">Password</label>
                <input id="password" name="password" value="" type="password" placeholder="Password"/>


                <label for="password">Confirm Password</label>
                <input id="password2" name="password2" value="" type="password" placeholder="Confirm Password"/>
                <div class="intel-checkbox">
                </div>
                <!--                <div class="intel-checkbox">
                                <input type="checkbox" id="Check_Box_1Key"/>
                                    <label  for="Check_Box_1Key">Remember Me</label>
                                </div>-->
                <button type="submit" class="intel-btn intel-btn-action">
                    Save 
                </button>
            </form>
             <div style="margin-top: 40px;" class="login-fotter-logo">
                <a target="_blanck" href="http://www.intel.eg/"><img src="<?php echo base_url(); ?>assets/frontend/images/intel.jpg" width="87" height="82" /></a><a target="_blanck" href="http://www.misrelkheir.org/"><img src="<?php echo base_url(); ?>assets/frontend/images/misr-el-kheir.jpg" width="87" height="82" /></a>
            </div>
        </div>
    </body>
</html>
