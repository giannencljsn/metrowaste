<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/login_logo-removebg.png">
    <title>Metrowaste HR System</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	

    <!-- Custom CSS -->

	
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
   	<link href="<?php echo base_url(); ?>assets/css/spinners.css" rel="stylesheet">

    <!-- You can change the theme colors from here -->
    <link href="<?php echo base_url(); ?>assets/css/colors/blue.css" id="theme" rel="stylesheet">

</head>
<body>


	<!-- <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div> -->

	<!-- Main login background image -->
	<section id="wrapper" class="login-register login-sidebar" style="background-image:url(<?php echo base_url();?>assets/images/metrowaste-bg-pic.png">
	<?php if ($this->session->flashdata('feedback')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?php echo $this->session->flashdata('feedback'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>
	<section id="wrapper" class="login-register login-sidebar" style="background-image:url(<?php echo base_url();?>assets/images/metrowaste-bg-pic.png">

		<div class="login-box card"> 
			<div class="card-body login page">
			
				<!-- Find the backend here -->
				<form class="form-horizontal form-material" method="post" id="loginform" action="login/Login_Auth">
					<a href="#" class="text-center db"><br/>
					<img src="<?php echo base_url();?>assets/images/login_logo-removebg.png" width="175px" alt="Home" /> 
				</a>
					<div class="form-group m-t-40">
						<div class="col-xs-12">
							<input class="form-control" name="email" value="<?php if(isset($_COOKIE['email'])){ echo $_COOKIE['email'];} ?>" type="text" required placeholder="Email"> 
						</div>
					</div>

					<div class="form-group">
    					<div class="col-xs-12">
        				<input class="form-control" name="password" value="<?php if(isset($_COOKIE['password'])){ echo $_COOKIE['password']; } ?>" type="password" required placeholder="Password" id="passwordInput">
        				<div class="form-check mt-2">
           					 <input class="form-check-input" type="checkbox" id="showPasswordCheckbox" onclick="togglePassword()">
           					 <label class="form-check-label" for="showPasswordCheckbox">Show Password</label>
       					 </div>
    					</div>
					</div>


					<!-- <div class="form-check"> 
						<input type="checkbox" name="remember" class="form-check-input" id="remember-me">
						
					</div> -->

					<div class="form-group text-center m-t-20">
						<div class="col-xs-12">
							<button class="btn login-button" type="submit">Log In</button>
						</div>
					</div>

					<div class="form-group text-center m-t-20">
    <div class="col-xs-12">
        <a href="<?php echo site_url('ForgotPassword'); ?>">Forgot Password?</a>
    </div>
</div>
					
				</form>


			</div>
		</div>
	</section>
		<!-- JQUERY things -->
		<script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
		<!-- Bootstrap tether Core JavaScript -->
		<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/popper.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
		<!-- slimscrollbar scrollbar JavaScript -->
		<script src="<?php echo base_url(); ?>assets/js/jquery.slimscroll.js"></script>
		<!--Wave Effects -->
		<script src="<?php echo base_url(); ?>assets/js/waves.js"></script>
		<!--Menu sidebar -->
		<script src="<?php echo base_url(); ?>assets/js/sidebarmenu.js"></script>
		<!--stickey kit -->
		<script src="<?php echo base_url(); ?>assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/sparkline/jquery.sparkline.min.js"></script>
		<!--Custom JavaScript -->
		<script src="<?php echo base_url(); ?>assets/js/custom.min.js"></script>
		<!-- ============================================================== -->
		<!-- Style switcher -->
		<!-- ============================================================== -->
		<script src="<?php echo base_url(); ?>assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>



		<script>
    function togglePassword() {
        var passwordInput = document.getElementById("passwordInput");
        var checkbox = document.getElementById("showPasswordCheckbox");

        if (checkbox.checked) {
            passwordInput.type = "text";
        } else {
            passwordInput.type = "password";
        }
    }
</script>
	</body>
</html>
