<?php include('../session.php');?>
<?php include('../class/Admin.php');
$admin=new Admin();
$comp=$admin->get_company();
$banner=$comp[0]['banner'];
if($banner=='')
{$banner='background/background-5.jpg';}
?>
<?php include('header.php');?>
<style>
	.auth-background-holder {
		background: url("../theme/assets/images/<?php echo $banner; ?>") no-repeat center center;
		@include background-size(cover);
		height: 100vh;
		min-height: 100%;
		background-size:cover;
	}
</style>

<div class="row g-0 app-auth-wrapper">
	    <div class="col-12 col-md-7 col-lg-6  text-center p-5">
		    <div class="d-flex flex-column align-content-end">
			    <div class="app-auth-body mx-auto">	
				    <div class="app-auth-branding mb-4"><a class="app-logo" href="#"><img class="logo-icon me-2" src="<?php echo $base_url;?>theme/assets/images/icon.webp" alt="logo"></a></div>
					<h2 class="auth-heading text-center mb-5">Log in to ERP</h2>
					<?php 
					if(isset($_GET['status']))
					{
						echo "<div class='alert alert-danger'>Wrong Credentials !!!</div>";
					}
					?>
			        <div class="auth-form-container text-start">
						<form class="auth-form login-form" method="post" action="../processlogin.php">         
							<div class="email mb-3">
								<label class="sr-only" for="signin-email">Email</label>
								<input name="uname" type="text" class="form-control signin-email" placeholder="Email address" required="required">
							</div><!--//form-group-->
							<div class="password mb-3">
								<label class="sr-only" for="signin-password">Password</label>
								<input id="signin-password" name="password" type="password" class="form-control signin-password" placeholder="Password" required="required">
								<div class="extra mt-3 row justify-content-between">
									<div class="col-6">
										<div class="form-check">
											<input class="form-check-input" type="checkbox" value="" id="RememberPassword">
											<label class="form-check-label" for="RememberPassword">
											Remember me
											</label>
										</div>
									</div><!--//col-6-->
									<div class="col-6">
										<div class="forgot-password text-end">
											<a href="reset-password.html">Forgot password?</a>
										</div>
									</div><!--//col-6-->
								</div><!--//extra-->
							</div><!--//form-group-->
							<div class="text-center">
								<button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto" name="btnlogin">Log In</button>
							</div>
						</form>
						
					</div><!--//auth-form-container-->	

			    </div><!--//auth-body-->
		    
			    <footer class="app-auth-footer">
				    <div class="container text-center py-3">
				         <!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
			           
				    </div>
			    </footer><!--//app-auth-footer-->	
		    </div><!--//flex-column-->   
	    </div><!--//auth-main-col-->
	    <div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
		    <div class="auth-background-holder">
		    </div>
		    <div class="auth-background-mask"></div>
		    <div class="auth-background-overlay p-3 p-lg-5">
			    <div class="d-flex flex-column align-content-end h-100">
				    <div class="h-100"></div>
				    
				</div>
		    </div><!--//auth-background-overlay-->
	    </div><!--//auth-background-col-->
    
    </div><!--//row-->
	<?php include('footer.php');?>