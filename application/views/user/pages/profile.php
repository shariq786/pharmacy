

  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Profile</h1>
      
          </div><!-- /.col -->
          <div class="col-sm-6">
            
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
  
  <section class="content">
      <div class="row">
        <div class="col-12">
          

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Profile Updating</h3>
            </div>
              <div class="card-body">

                  <?php

                    $error = $this->session->flashdata('error');
                      if($error)
                      {
                          ?>
                          <div class="alert alert-danger alert-dismissable">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                              <?php echo $error; ?>                    
                          </div>
                      <?php 
                    }
                    $success = $this->session->flashdata('success');
                      if($success)
                      {
                          ?>
                          <div class="alert alert-success alert-dismissable">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                              <?php echo $success; ?>                    
                          </div>
                      <?php 
                    }?>
                   <form method="post" action="<?php echo base_url('userProfileUpdate');?>" class="form-horizontal" name="form">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="control-group">
                        <label class="control-label">First Name:</label>
                        <div class="controls">
                          <input name="first_name" class="form-control" type="text" placeholder="protege" class="input-large" required="" value="<?php if(!empty($user)){echo ucfirst($user->first_name);}else{echo set_value('first_name');}; ?>">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="control-group">
                         <label class="control-label">Last Name:</label>
                        <div >
                          <input name="last_name" class="form-control" type="text" placeholder="global" class="input-large" required="" value="<?php if(!empty($user)){echo ucfirst($user->last_name);}else{echo set_value('last_name');}; ?>">
                        </div>
                      </div>
                    </div>
                    
                  </div>

                 <div class="row">
                    <div class="col-md-6">
                       <div class="control-group">
                          <label class="control-label" >Email:</label>
                          <div class="controls">
                            <input name="email" class="form-control" type="email" placeholder="xxx@protegeglobal.com" class="input-large" required="" value="<?php if(!empty($user)){echo $user->email;}else{echo set_value('email');}; ?>" readonly>
                          </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                      
                      <div class="control-group">
                        <label class="control-label" for="contact">Contact:</label>
                        <div class="controls">
                          <input  name="contact" class="form-control" type="text" placeholder="03433000000" class="input-large" required=""  value="<?php if(!empty($user)){echo $user->contact;}else{echo set_value('contact');}; ?>">
                              <em>Ex: 03430000000</em>
                        </div>
                      </div>
                    </div>
                    
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                       <div class="control-group">
                          <label class="control-label" >Date of Birth:</label>
                          <div class="controls">
                            <input name="dob" class="form-control" type="date" placeholder="03/12/2018" class="input-large" required="" value="<?php if(!empty($user)){echo $user->dob;}else{echo set_value('dob');}; ?>" >
                          </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                      
                      <div class="control-group">
                        <label class="control-label" for="country">Country:</label>
                        <div class="controls">
                          <input  name="country" class="form-control" type="text" placeholder="Pakistan" class="input-large" required="" value="<?php if(!empty($user)){echo $user->country;}else{echo set_value('country');}; ?>">
                        </div>
                      </div>
                    </div>
                    
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                       <div class="control-group">
                          <label class="control-label" >City:</label>
                          <div class="controls">
                            <input name="city" class="form-control" type="text" placeholder="Karachi" class="input-large" required="" value="<?php if(!empty($user)){echo $user->city;}else{echo set_value('city');}; ?>">
                          </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                      
                      <div class="control-group">
                        <label class="control-label" for="contact">Address:</label>
                        <div class="controls">
                          <textarea name="address" class="form-control" required="" placeholder="ABC Khadda Market karachi pakistan"><?php if(!empty($user)){echo $user->address;}else{echo set_value('address');}; ?></textarea>
                        </div>
                      </div>
                    </div>
                    
                  </div>
                  
                  
                  <div class="row">
                    <div class="col-md-12">
                      <div class="control-group">
                        <label class="control-label" >Gender:</label>
                        <div class="controls">
                          <label class="radio inline" >
                            <input type="radio" name="gender" value="Male" <?php if(!empty($user) && $user->gender == 'Male'){echo "checked";}else{echo '';}; ?>>Male</label>
                          <label class="radio inline" >
                            <input type="radio" name="gender" value="Female" <?php if(!empty($user) && $user->gender == 'Female'){echo "checked";}else{echo '';}; ?>>Female</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                       <div class="control-group">
                    <label class="control-label" for="confirmsignup"></label>
                    <div class="controls">
                      <button type="submit" class="btn btn-success">Update Information</button>
                    </div>
                  </div>
                 
                  </form>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    
    <!-- /.content -->
  </div>
 
  