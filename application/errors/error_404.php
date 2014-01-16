<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>EL-SHEIKH</title>
<link REL="SHORTCUT ICON" href="<?php echo config_item('base_url'); ?>assets/frontend/images/icon.ico"/>
<script type="text/javascript" src="<?php echo config_item('base_url'); ?>assets/frontend/js/jquery-1.7.2.min.js"></script>
	<script>
$(document).ready(function(){
var x=$(window).height();

			x=(x-425)/2;

			$(function(){
				$("#error-404").css("margin-top",x);
				});
});
			
		</script>
<style>
body{
	background-color:#f0efe9;
	font-family:Arial, Helvetica, sans-serif;
	}
.error-404{
	width:400px;
	height:425px;
	margin:0 auto;
	}
.logo{
	width:76px;
	height:102px;
	margin:0 auto;
	}
.error-img{
	width:228px;
	height:200px;
	margin:0 auto;
	margin-top:20px;
	}
.text-error-404{
	width:400px;
	text-align:center;
	color:#333333;
	font-size:16px;
	margin-top:20px;
	}
.link-error-404{
	width:400px;
	text-align:center;
	color:#333333;
	font-size:16px;
	margin-top:20px;
	}
.link-error-404 a{
	color:#f99921;
	text-decoration:none;
	outline:none;
	}
.link-error-404 a:hover{
	color:#3f783a;
	}
</style>
</head>
	
<body>
<div class="error-404" id="error-404">
<div class="logo">
  <img src="<?php echo config_item('base_url'); ?>assets/frontend/images/logo.png" width="76" height="102" /> </div>
  <div class="error-img"><img src="<?php echo config_item('base_url'); ?>assets/frontend/images/error_404.jpg" width="228" height="200" /></div>
  <div class="text-error-404">Sorry, but the page you are looking for not
been found.<br />Try checking the URL For Error</div>
<div class="link-error-404">go to : <a href="<?php echo config_item('base_url'); ?>">HOME</a></div>
</div>
</body>
</html>
