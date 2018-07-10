<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Pharmacy | Forgot Password</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/adminlte.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/iCheck/square/blue.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page" style="background:url('<?php echo base_url();?>assets/images/pharmacy.jpg');background-repeat: no-repeat;
    background-size: cover;
">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Admin Pharmacy</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Reset Your Password</p>
	  
	  <div class="row">
            <div class="col-md-12">
                <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
            </div>
        </div>
        <?php
        
        $invalid = $this->session->flashdata('invalid');
        if($invalid)
        {
            ?>
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $invalid; ?>                    
            </div>
        <?php }
        $success = $this->session->flashdata('success');
        if($success)
        {
            ?>
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $success; ?>                    
            </div>
        <?php } 
		$send = $this->session->flashdata('send');
        if($send)
        {
            ?>
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $send; ?>                    
            </div>
        <?php } 
		$notsend = $this->session->flashdata('notsend');
        if($notsend)
        {
            ?>
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $notsend; ?>                    
            </div>
        <?php } ?>
		
		
		

      <form action="<?php echo base_url() ?>createPasswordUser" method="post">
        <div class="form-group has-feedback">
          <input type="email" name="email" class="form-control" readonly value="<?php echo $email; ?>" placeholder="Email">
		  <input type="hidden" name="activation_code"  value="<?php echo $activation_code; ?>" required />
          
        </div>
		
		<div class="form-group has-feedback">
          <input type="password" name="password" class="form-control" placeholder="Password">
          
        </div>
		
		<div class="form-group has-feedback">
          <input type="password" name="cpassword" class="form-control" placeholder="Confirm Password">
          
        </div>
        
        <div class="row">
         
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mb-0">
        <a href="<?php echo base_url(); ?>admin">Login</a>
      </p>
     
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url() ?>assets/plugins/iCheck/icheck.min.js"></script>
</body>
</html>