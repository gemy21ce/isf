<html>



    <head>



        <title>EL SHEIKH</title>



        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />



        <link type="text/css" href="<?php echo base_url(); ?>assets/backend/css/style.css" rel="stylesheet"/>       



        <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/jquery/core/jquery6.min.js" ></script>



         <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/common/common.js" ></script>



         <style>



             #navbar {



	margin: 0;



	padding: 0;



	height: 1em; }



#navbar li {



	list-style: none;



	float: left; }



#navbar li a {



	display: block;



	padding: 3px 8px;



	background-color: #4c4c4c;



	color: #fff;



	text-decoration: none; }



#navbar li ul {



	display: none;



	width: 10em; /* Width to help Opera out */



	background-color: #69f;



	z-index:300;}



#navbar li:hover ul {



	display: block;



	position: absolute;



	margin: 0;



	padding: 0; }



#navbar li:hover li {



	float: none; }



#navbar li:hover li a {



	background-color: #d20025;



	border-bottom: 1px solid #fff;



	border-top: 1px solid #fff;



	color: #fff; }



#navbar li li a:hover {



	background-color: #4c4c4c; }



         </style>



        <meta http-equiv="Content-Type" content="text/html;charse"/>



    </head>







    <body>



    <div class="header">



    <div class="logo-header"></div>



        <?php $user=$this->session->all_userdata();if(!empty ($user['username'])): ?> <span class="username"><span class="welcome-name">Welcome:</span> <span class="user-name"><?php echo $user['username']?></span><span class="logout"> <?=anchor('admin/login/logout','Logout')?></span></span>  </div>



        



<div class="menu"><span class="goto"> <ul id="navbar">



         



	<li><a >Go To</a><ul>



		<li><?=anchor('admin/home/backend','Home')?></li>



		<li><?=anchor('admin/usermanager/home','Users')?></li>



		<li><?=anchor('admin/contentcontroller/home','Content')?></li>



<!--		<li><?=anchor('admin/category/home','Category')?></li>



		<li><?=anchor('admin/offer/home','Offer')?></li>



		<li><?=anchor('admin/product/home','Product')?></li>-->



		<li><?=anchor('admin/configurationmanager/configurationform','Configuration')?></li>



            </ul>



	</li>



</ul></span></div>







<?php endif;?>







        <br>