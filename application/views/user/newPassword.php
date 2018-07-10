<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Pharmacy</title>
<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
<link href="<?php echo base_url(); ?>assets/css/font-awesome.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/css/animate.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/css/admin.css" rel="stylesheet" type="text/css" />
<style>
  * {box-sizing: border-box}

/* Full-width input fields */
  input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
  padding: 14px 20px;
  background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
  padding: 16px;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
    width: 100%;
  }
}
</style>
</head>
<body class="light_theme fixed_header left_nav_fixed" style="background:url('<?php echo base_url();?>assets/images/pharmacy.jpg');background-repeat: no-repeat;
    background-size: cover;
">

<div class="wrapper">

<!------ Include the above in your HEAD tag ---------->

<!-- Button trigger modal -->
  

<div class="login_page">
      <div class="login_content">
 <div class="card-body login-card-body">
      <p class="login-box-msg">Please Enter Your Email</p>
    
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
      
      
      

        <form action="<?php echo base_url() ?>user/createPasswordUser" method="post">
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
        <a href="<?php echo base_url(); ?>userLogin">Login</a>
      </p>
     
    </div>
          </div>
  </div>
  

  
  
  
  <div class="text-left" style="color : white">
      <div class="text-left"  >
               <h1><img id="dimg_13" src="data:image/jpeg;base64,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" class="rISBZc M4dUYb" height="123" style="margin-left:-7px;margin-right:-8px" title="https://www.freepik.com/premium-vector/pharmacy-logo-design_1214862.htm" width="123" alt="Image result for pharmacy logo" data-atf="2"></h1>
          </div>
  </div>
  
  
  
</div>




<script src="<?php echo base_url(); ?>assets/js/jquery-2.1.0.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.slimscroll.min.js"></script>

</body>

</html>