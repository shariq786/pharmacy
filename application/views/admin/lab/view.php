

  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Labs</h1>
      
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
        <div class="float-right"><a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#Modal_LabAdd"><span class="fa fa-plus"></span> Add New Lab</a></div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
      
        
         
                <table class="table table-striped" id="mydata">
                  <thead>
                    <tr>
                      <th>Lab Name</th>
                      <th>Address</th>
                      <th>Contact</th>
                      <th>Secondary Contact</th>
                      <th style="text-align: right;">Actions</th>
                    </tr>
                  </thead>
                  <tbody id="show_labdata">
                     
                  </tbody>
                </table>
                </div>
              </div>
              </div>
            </div>
      <!-- /.row -->
    
    
    <!-- MODAL ADD -->
            <form id="addlabform">
            <div class="modal fade" id="Modal_LabAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalLabel">Add New Lab <br/><span id="error"></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
          

                  <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Name</label>
                            <div class="col-md-10">
                              <input type="text" name="name" class="form-control" placeholder="Lab Name" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Address</label>
                            <div class="col-md-10">
                               <textarea name="address" class="form-control" placeholder="Lab address" ></textarea>
                            </div>
                         </div>
                          <div class="form-group row">
                            <label class="col-md-2 col-form-label">Contact</label>
                            <div class="col-md-10">
                              <input type="number" name="contact" class="form-control" placeholder="Contact" >
                            </div>
                        </div>
                         <div class="form-group row">
                            <label class="col-md-2 col-form-label">Seconday Contact</label>
                            <div class="col-md-10">
                              <input type="number" name="sec_contact" class="form-control" placeholder="Secondary Contact" >
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
        <form>
            <div class="modal fade" id="Modal_LabEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Lab</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                       <input type="hidden" name="id_edit" id="id_edit" class="form-control" readonly>
                       <div class="form-group row">
                            <label class="col-md-2 col-form-label">Name</label>
                            <div class="col-md-10">
                              <input type="text" name="name_edit" class="form-control" placeholder="Lab Name" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Address</label>
                            <div class="col-md-10">
                               <textarea name="address_edit" class="form-control" placeholder="Lab address" ></textarea>
                            </div>
                         </div>
                          <div class="form-group row">
                            <label class="col-md-2 col-form-label">Contact</label>
                            <div class="col-md-10">
                              <input type="number" name="contact_edit" class="form-control" placeholder="Contact" >
                            </div>
                        </div>
                         <div class="form-group row">
                            <label class="col-md-2 col-form-label">Seconday Contact</label>
                            <div class="col-md-10">
                              <input type="number" name="sec_contact_edit" class="form-control" placeholder="Secondary Contact" >
                            </div>
                        </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" type="submit" id="btn_labupdate" class="btn btn-primary">Update</button>
                  </div>
                </div>
              </div>
            </div>
            </form>
        <!--END MODAL EDIT-->
 
        <!--MODAL DELETE-->
         <form>
            <div class="modal fade" id="Modal_LabDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Lab</h5>
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
                    <button type="button" type="submit" id="btn_labdelete" class="btn btn-primary">Yes</button>
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
  