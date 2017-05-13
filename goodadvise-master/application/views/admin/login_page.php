
<html>
     <head>
         <title>
            
        </title>
         <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>resource/admintheme/css/bootstrap.min.css" rel="stylesheet">

   

    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url(); ?>resource/admintheme/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url(); ?>resource/admintheme/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
     <link href="<?php echo base_url(); ?>resource/bootstrap-toastr/toastr.min.css" rel="stylesheet" type="text/css">

     <link href="<?php echo base_url(); ?>css/subscription_admin_custom.css" rel="stylesheet" type="text/css">
     

    </head>
    <body>
   <div class="container">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
                                                    <h2>Please Login,</h2>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
                                                            <form id="login-form"   action="<?php echo base_url(); ?>admin/adminLoginValidate" method="post" role="form" style="display: block;">
									<div class="form-group">
										<input  required type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
									</div>
									<div class="form-group">
										<input required type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
									</div>
									<div class="form-group text-center">
										<input type="checkbox" tabindex="3" class="" name="remember" id="remember">
										<label for="remember"> Remember Me</label>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="text-center">
													<a href="#" tabindex="5" class="forgot-password">Forgot Password?</a>
												</div>
											</div>
										</div>
									</div>
								</form>
								<form id="register-form" action="http://phpoll.com/register/process" method="post" role="form" style="display: none;">
									<div class="form-group">
										<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
									</div>
									<div class="form-group">
										<input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
									</div>
									<div class="form-group">
										<input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password">
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

    
 <!-- jQuery -->
    <script src="<?php echo base_url(); ?>resource/admintheme/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>resource/admintheme/js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url(); ?>resource/admintheme/js/plugins/morris/raphael.min.js"></script>
    <script src="<?php echo base_url(); ?>resource/admintheme/js/plugins/morris/morris.min.js"></script>
    <script src="<?php echo base_url(); ?>resource/admintheme/js/plugins/morris/morris-data.js"></script>
    <script src="<?php echo base_url(); ?>resource/bootstrap-toastr/toastr.min.js"></script>
    <script src="<?php echo base_url(); ?>resource/bootstrap-toastr/ui-toastr.js"></script>
    
    <?php
if(isset($error_message)){
	
?>
<script type="text/javascript">
 	UIToastr.init("<?='error';?>","<?='Authentication'?>","<?=$error_message?>" );
</script>
<?php	
}
?>
       
    </body>
        
</html>