<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta http-equiv="X-UA-Compatible" content="IE=10" />
        <title>Login</title>
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
            <form action="home/login" method="post" class="intel-form pure-form-stacked">
                <label for="email">البريد الاليكتروني</label>
                <input id="email" type="email" placeholder="البريد الاليكتروني"/>

                <label for="password">كلمة المرور</label>
                <input id="password" type="password" placeholder="كلمة المرور"/>
                <?php if (isset($errormessage)) { ?>
                <div id="errorDiv" class="intel-checkbox">
                        <a style="color:red;font-size: 12px;line-height: 0em;">خطأ في اسم البريد الاليكتروني أو كلمة السر</a>
                    </div>
                <style>
                    input#password, input#email{
                        border-color:red;
                    }
                </style>
                <script type="text/javascript">
                    $(function(){
                        $("input#password, input#email").keyup(function(){
                            $("#errorDiv").hide();
                            $(this).css("border-color","#d3d8db");
                        });
                    });
                </script>
                <?php } ?>
                <div class="intel-checkbox">
                    <a href="#">نسيت كلمة المرور</a> </div>
                <!--                <div class="intel-checkbox">
                                <input type="checkbox" id="Check_Box_1Key"/>
                                    <label  for="Check_Box_1Key">Remember Me</label>
                                </div>-->
                <button type="submit" class="intel-btn intel-btn-action">
                    تسجيل الدخول
                </button>
            </form>
            <div class="login-fotter-logo"><a href="#"><img src="<?php echo base_url(); ?>assets/frontend/images/intel.jpg" width="87" height="82" /></a><a href="#"><img src="<?php echo base_url(); ?>assets/frontend/images/misr-el-kheir.jpg" width="87" height="82" /></a></div>
        </div>
    </body>
</html>

<!--<div id="login_form">
    <span class="login-form-logo"></span>
<?php
if (isset($errormessage)) {
    echo '<b>user name or password error</b>';
}
echo form_open('home/login');
echo form_input('email', 'email');
echo form_password('password', 'password');
echo form_submit('submit', 'login');
echo form_close();
?>
</div>-->