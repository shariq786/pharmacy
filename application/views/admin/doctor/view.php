

  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Doctors</h1>
      
          </div><!-- /.col -->
          <div class="col-sm-6">
            
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
  
  <section class="content">
       <!-- Page Heading -->
    <div class="row">
      <div class="col-12">
      
      <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Table With Full Features</h3>
        <div class="float-right"><a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#Modal_DoctorAdd"><span class="fa fa-plus"></span> Add New</a></div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
      
        
         
                <table class="table table-striped" id="mydata">
                  <thead>
                    <tr>
                      <th>Picture</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Department</th>
                      <th>Email</th>
                      <th>Contact</th>
                      <th>Clinic</th>
                      <th>Address</th>
                      <th>Visit Fee</th>
                      <th style="text-align: right;">Actions</th>
                    </tr>
                  </thead>
                  <tbody id="show_doctordata">
                     
                  </tbody>
                </table>
                </div>
              </div>
              </div>
            </div>
      <!-- /.row -->
    
    
    <!-- MODAL ADD -->
            <form enctype="multipart/form-data" accept-charset="utf-8" name="formname" id="adddoctorform"  method="post" action="">
            <div class="modal fade" id="Modal_DoctorAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalLabel">Add Doctor Information<br/><span id="error"></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
          

                  <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">First Name</label>
                            <div class="col-md-10">
                              <input type="text" name="first_name" class="form-control" placeholder="First Name" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Last Name</label>
                            <div class="col-md-10">
                              <input type="text" name="last_name" class="form-control" placeholder="Last Name" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Email</label>
                            <div class="col-md-10">
                              <input type="email" name="email" class="form-control" placeholder="Email" >
                            </div>
                        </div>
                         
                         <div class="form-group row">
                            <label class="col-md-2 col-form-label">Departments</label>
                            <div class="col-md-10">
                              <select name="department_id" class="form-control">
                                <?php foreach ($departments as $key => $department): ?>
                                  <option value="<?php echo $department->id;?>"><?php echo $department->name;?></option>
                                <?php endforeach ?>
                              </select>
                            </div>
                        </div>
                        
                       
                         <div class="form-group row">
                            <label class="col-md-2 col-form-label">Address</label>
                            <div class="col-md-10">
                               <textarea name="address" class="form-control" ></textarea>
                            </div>
                        </div>
                        
                         
                         
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Contact</label>
                            <div class="col-md-10">
                              <input type="number" name="contact" class="form-control" placeholder="Contact" >
                            </div>
                        </div>
                         <div class="form-group row">
                            <label class="col-md-2 col-form-label">Clinic/Hospital</label>
                            <div class="col-md-10">
                              <input type="text" name="clinic_name" class="form-control" placeholder="Clinic/Hospital" >
                            </div>
                        </div>
                         <div class="form-group row">
                            <label class="col-md-2 col-form-label">Visit Fee</label>
                            <div class="col-md-10">
                              <input type="number" name="visit_fee" class="form-control" placeholder="Visit Fee" >
                            </div>
                        </div>
                         <div class="form-group row">
                            <label class="col-md-2 col-form-label">Picture</label>
                            <div class="col-md-10">
                              <input type="file" name="avatar" id="doctor_image" class="form-control" placeholder="Visit Fee" >
                            </div>
                        </div>

                       
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button  type="submit"  class="btn btn-primary">Save</button>
                  </div>
                </div>
              </div>
                  
            </div>
            </form>
        <!--END MODAL ADD-->
 
 
 
 
 
 
 
 
 
        <!-- MODAL EDIT -->
        <form id="editdoctorform" enctype="multipart/form-data" accept-charset="utf-8" name="edit_formname" method="post" action="" onsubmit="return false;">
            <div class="modal fade" id="Modal_DoctorEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Doctor Information<br/><span id="edit_error"></span</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                       <input type="hidden" name="id_edit" id="id_edit" class="form-control" readonly>
                       <div class="form-group row">
                            <label class="col-md-2 col-form-label">First Name</label>
                            <div class="col-md-10">
                              <input type="text" name="first_name_edit" class="form-control" placeholder="First Name" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Last Name</label>
                            <div class="col-md-10">
                              <input type="text" name="last_name_edit" class="form-control" placeholder="Last Name" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Email</label>
                            <div class="col-md-10">
                              <input type="email" name="email_edit" class="form-control" placeholder="Email" >
                            </div>
                        </div>
                         
                         <div class="form-group row">
                            <label class="col-md-2 col-form-label">Departments</label>
                            <div class="col-md-10">
                              <select name="department_id_edit" class="form-control">
                                <?php foreach ($departments as $key => $department): ?>
                                  <option value="<?php echo $department->id;?>"><?php echo $department->name;?></option>
                                <?php endforeach ?>
                              </select>
                            </div>
                        </div>
                        
                       
                         <div class="form-group row">
                            <label class="col-md-2 col-form-label">Address</label>
                            <div class="col-md-10">
                               <textarea name="address_edit" class="form-control" ></textarea>
                            </div>
                        </div>
                        
                         
                         
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Contact</label>
                            <div class="col-md-10">
                              <input type="number" name="contact_edit" class="form-control" placeholder="Contact" >
                            </div>
                        </div>
                         <div class="form-group row">
                            <label class="col-md-2 col-form-label">Clinic/Hospital</label>
                            <div class="col-md-10">
                              <input type="text" name="clinic_name_edit" class="form-control" placeholder="Clinic/Hospital" >
                            </div>
                        </div>
                         <div class="form-group row">
                            <label class="col-md-2 col-form-label">Visit Fee</label>
                            <div class="col-md-10">
                              <input type="number" name="visit_fee_edit" class="form-control" placeholder="Visit Fee" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Picture</label>
                            <div class="col-md-10">
                              <img src="" id="doctor_image_view" alt="doctor_image" width="200" height="200" />
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Select Picture</label>
                            <div class="col-md-10">
                              <input type="file" name="avatar_edit" id="doctor_image_new" class="form-control" placeholder="Visit Fee" >
                            </div>
                        </div>

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="btn_doctorupdate" class="btn btn-primary">Update</button>
                  </div>
                </div>
              </div>
            </div>
            </form>
        <!--END MODAL EDIT-->
 
        <!--MODAL DELETE-->
         <form>
            <div class="modal fade" id="Modal_DoctorDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Doctor Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                       <strong>Are you sure to delete this record?</strong>
                  </div>
                  <div class="modal-footer">
                    <input type="hidden" name="id" id="id" class="form-control">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="button" type="submit" id="btn_doctordelete" class="btn btn-primary">Yes</button>
                  </div>
                </div>
              </div>
            </div>
            </form>
        <!--END MODAL DELETE-->
    
    
    
    
    
  
    
    
    
    
    
    </section>
  
  
  
  
    
    <!-- /.content -->
  </div>
 <Script>
   function getCheckedValue(radioObj) {
  if(!radioObj)
    return "";
  var radioLength = radioObj.length;
  if(radioLength == undefined)
    if(radioObj.checked)
      return radioObj.value;
    else
      return "";
  for(var i = 0; i < radioLength; i++) {
    if(radioObj[i].checked) {
      return radioObj[i].value;
    }
  }
  return "";
}
 </Script>
  