<style>
.header {
	background:none;

}
</style>
   <script type="text/javascript" src="http://code.jquery.com/jquery-1.6.2.min.js"></script>


		<script>


			var x=$(window).height();





			x=(x-360)/2;





			$(function(){


				$("#login_form").css("margin-top",x);


				});


		</script>


         <style>


           .logo-header{


	height:71px;


	margin:10px;


	background:none;


	float:left;


	width:260px;


	}


         </style>


<div id="login_form">


<span class="login-form-logo"></span>


    <h3>Welcome please login  </h3>


    <?php


    echo form_open('backend/login/validate');


    echo form_input('email','email');


    echo form_password('password','password');


    echo form_submit('submit','login');


    echo form_close();


    ?>





</div>


