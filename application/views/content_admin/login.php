<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Curbsidefilms - Control Panel Login</title>
 <?php require_once('head.php');?>
  <script>
$(function(){
	$("#login_form").submit(function(e){
	e.preventDefault();
	$.ajax({
	type:"POST",
	url:"<?php echo site_url(ADMINCP.'/login/validate_login_admin');?>",
	dataType:"json",
	data:$("#login_form").serialize(),
	beforeSend:function()
    {
	    $("#login_btn").prop('disabled',true);
		$("#login_resp").html('');
	},
	success:function(response){
		if(response.status=='success')
		{
			$("#login_resp").html(response.desc);
			window.location.href= '<?php echo site_url(ADMINCP.'/dashboard');?>';
		}
		else
		{
			$("#login_resp").html(response.desc);
		}
		$("#login_btn").prop('disabled',false);
	}
	});
	//return false; 
	});
});
</script>
  
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
  <img src="<?php echo base_url().ADMIN_ASSETS;?>/images/logo.png" alt="Curbsidefilms" class="brand-image" /><br />
    
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg"><b>Admin Panel Login</b></p>

      <form id="login_form" action="<?php echo base_url().ADMINCP;?>" name="login_form" method="post">
        <div class="input-group mb-3">
          <input type="text" id="username" name="username" class="form-control" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password"  id="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!--<div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>-->
          <!-- /.col -->
          <div class="col-6 offset-3">
            <button type="submit" name="submit" id="login_btn" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
		<div id="login_resp"></div>
      </form>
	  <p class="mb-1">
		<div id="login_resp"></div>
	  </p>
	<!--
      <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
	  -->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
</body>

</html>
