<!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2018</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.js"></script>

<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/morris/morris.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url() ?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.js"></script>

<!-- Sparkline -->
<script src="<?php echo base_url() ?>assets/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url() ?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url() ?>assets/plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url() ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url() ?>assets/ckeditor/ckeditor.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url() ?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url() ?>assets/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url() ?>assets/dist/js/pages/dashboard.js"></script>

 <script>
	
		// $(window).on('load', function() {
		
			// var table = $('#view').DataTable( {
			// ajax:"<?php echo base_url('admin/AdminSubAdmin/getAdminData');?>"
			// });

		  
		  
			// setInterval( function () {
			// table.ajax.reload(null , false);
			// }, 10000);
	  
	  
		// });
		
</script>

<script type="text/javascript">









    $(document).ready(function(){
		
		
		
		
		show_subadmin(); //call function show all product
        $('#mydata').dataTable();
       
         
       
          
        //function show all product
        function show_subadmin(){
            $.ajax({
                type  : 'ajax',
                url   : '<?php echo base_url('admin/AdminSubAdmin/getAdminData')?>',
                async : false,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                '<td>'+data[i].first_name+'</td>'+
                                '<td>'+data[i].last_name+'</td>'+
                                '<td>'+data[i].email+'</td>'+
                                '<td style="text-align:right;">'+
                                    '<a href="javascript:void(0);" class="btn btn-info btn-sm item_edit" data-id="'+data[i].id+'" data-first_name="'+data[i].first_name+'" data-last_name="'+data[i].last_name+'" data-email="'+data[i].email+'">Edit</a>'+' '+
                                    '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-id="'+data[i].id+'">Delete</a>'+
                                '</td>'+
                                '</tr>';
                    }
                    $("#mydata").dataTable().fnDestroy();
                    $('#show_data').html(html);
                    $("#mydata").dataTable();
                   
                }
 
            });
        }

		
		
		
 
        //Save product
        //$('#btn_save').on('click',function(){
			
			
			
			$('#addform').validate({
				rules: {
					email: {
					  required: true,
					  email: true
					},
					first_name: {
					  required: true
					},
					last_name: {
					  required: true
					}
					
				  },
				submitHandler: function(form) {
					var email = $('#email').val();
					var first_name = $('#first_name').val();
					var last_name        = $('#last_name').val();
					$.ajax({
						type : "POST",
						url  : "<?php echo base_url('admin/AdminSubAdmin/save')?>",
						dataType : "JSON",
						data : {email:email , first_name:first_name, last_name:last_name},
						success: function(data){
							if(data == 'email_exist'){
								$("#error").html('<label class="error" >Email already exist!</label>');
							}
							else if(data == 'false'){
								$("#error").html('<label class="error" >Error in adding!</label>');
							} else {
								$("#error").empty();
								$('[name="email"]').val("");
								$('[name="first_name"]').val("");
								$('[name="last_name"]').val("");
								$('#Modal_Add').modal('hide');
								show_subadmin();
							}
						}
					});
					return false;
				},
				// other options
			});
			
			
			
            
       // });
 
        //get data for update record
        $('#show_data').on('click','.item_edit',function(){
			
			var id 		= $(this).data('id');
			var email = $(this).data('email');
            var first_name = $(this).data('first_name');
            var last_name        = $(this).data('last_name');
             
            $('#Modal_Edit').modal('show');
			$('[name="id_edit"]').val(id);
            $('[name="email_edit"]').val(email);
            $('[name="first_name_edit"]').val(first_name);
            $('[name="last_name_edit"]').val(last_name);
        });
 
        //update record to database
         $('#btn_update').on('click',function(){
			var id 			 	 = $('#id_edit').val();
            var email 			 = $('#email_edit').val();
            var first_name 		 = $('#first_name_edit').val();
            var last_name        = $('#last_name_edit').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('admin/AdminSubAdmin/update')?>",
                dataType : "JSON",
                data : {id:id, email:email , first_name:first_name, last_name:last_name},
                success: function(data){
					$('[name="id_edit"]').val("");
                    $('[name="email_edit"]').val("");
                    $('[name="first_name_edit"]').val("");
                    $('[name="last_name_edit"]').val("");
                    $('#Modal_Edit').modal('hide');
                    show_subadmin();
                }
            });
            return false;
        });
 
        //get data for delete record
        $('#show_data').on('click','.item_delete',function(){
            var id = $(this).data('id');
             
            $('#Modal_Delete').modal('show');
            $('[name="id"]').val(id);
        });
 
        //delete record to database
         $('#btn_delete').on('click',function(){
                    var id = $('#id').val();
                    $.ajax({
                        type : "POST",
                        url  : "<?php echo base_url('admin/AdminSubAdmin/delete')?>",
                        dataType : "JSON",
                        data : {id:id},
                        success: function(data){
                            $('[name="id"]').val("");
                            $('#Modal_Delete').modal('hide');
                            show_subadmin();
                        }
                    });
                    return false;
                });
         

         show_users();
         function show_users(){
            $.ajax({
                type  : 'ajax',
                url   : '<?php echo base_url('admin/AdminUser/getUserData')?>',
                async : false,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                '<td>'+data[i].first_name+'</td>'+
                                '<td>'+data[i].last_name+'</td>'+
                                '<td>'+data[i].email+'</td>'+
                                '<td style="text-align:right;">'+
                                    '<a href="javascript:void(0);" class="btn btn-info btn-sm item_edit" data-id="'+data[i].id+'" data-first_name="'+data[i].first_name+'" data-last_name="'+data[i].last_name+'" data-email="'+data[i].email+'">Edit</a>'+' '+
                                    '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-id="'+data[i].id+'">Delete</a>'+
                                '</td>'+
                                '</tr>';
                    }
                    $("#mydata").dataTable().fnDestroy();
                    $('#show_userdata').html(html);
                    $("#mydata").dataTable();
                    
                }
 
            });
        }

            
            
            
            $('#adduserform').validate({
                rules: {
                    email: {
                      required: true,
                      email: true
                    },
                    first_name: {
                      required: true
                    },
                    last_name: {
                      required: true
                    }
                    
                  },
                submitHandler: function(form) {
                    var email = $('#email').val();
                    var first_name = $('#first_name').val();
                    var last_name        = $('#last_name').val();
                    $.ajax({
                        type : "POST",
                        url  : "<?php echo base_url('admin/AdminUser/save')?>",
                        dataType : "JSON",
                        data : {email:email , first_name:first_name, last_name:last_name},
                        success: function(data){
                            if(data == 'email_exist'){
                                $("#error").html('<label class="error" >Email already exist!</label>');
                            }
                            else if(data == 'false'){
                                $("#error").html('<label class="error" >Error in adding!</label>');
                            } else {
                                $("#error").empty();
                                $('[name="email"]').val("");
                                $('[name="first_name"]').val("");
                                $('[name="last_name"]').val("");
                                $('#Modal_UserAdd').modal('hide');
                                show_users();
                            }
                        }
                    });
                    return false;
                },
                // other options
            });
            
            
            
            
       // });
 
        //get data for update record
        $('#show_userdata').on('click','.item_edit',function(){
            
            var id      = $(this).data('id');
            var email = $(this).data('email');
            var first_name = $(this).data('first_name');
            var last_name        = $(this).data('last_name');
             
            $('#Modal_UserEdit').modal('show');
            $('[name="id_edit"]').val(id);
            $('[name="email_edit"]').val(email);
            $('[name="first_name_edit"]').val(first_name);
            $('[name="last_name_edit"]').val(last_name);
        });
 
        //update record to database
         $('#btn_userupdate').on('click',function(){
            var id               = $('#id_edit').val();
            var email            = $('#email_edit').val();
            var first_name       = $('#first_name_edit').val();
            var last_name        = $('#last_name_edit').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('admin/AdminUser/update')?>",
                dataType : "JSON",
                data : {id:id, email:email , first_name:first_name, last_name:last_name},
                success: function(data){
                    $('[name="id_edit"]').val("");
                    $('[name="email_edit"]').val("");
                    $('[name="first_name_edit"]').val("");
                    $('[name="last_name_edit"]').val("");
                    $('#Modal_UserEdit').modal('hide');
                    show_users();
                }
            });
            return false;
        });
 
        //get data for delete record
        $('#show_userdata').on('click','.item_delete',function(){
            var id = $(this).data('id');
             
            $('#Modal_UserDelete').modal('show');
            $('[name="id"]').val(id);
        });
 
        //delete record to database
         $('#btn_userdelete').on('click',function(){
                    var id = $('#id').val();
                    $.ajax({
                        type : "POST",
                        url  : "<?php echo base_url('admin/AdminUser/delete')?>",
                        dataType : "JSON",
                        data : {id:id},
                        success: function(data){
                            $('[name="id"]').val("");
                            $('#Modal_UserDelete').modal('hide');
                            show_users();
                        }
                    });
                    return false;
                });

                 show_departments();
                 function show_departments(){
                    $.ajax({
                        type  : 'ajax',
                        url   : '<?php echo base_url('admin/AdminDepartment/getDepartmentData')?>',
                        async : false,
                        dataType : 'json',
                        success : function(data){
                            var html = '';
                            var i;
                            for(i=0; i<data.length; i++){
                                html += '<tr>'+
                                        '<td>'+data[i].name+'</td>'+
                                        '<td>'+data[i].description+'</td>'+
                                        '<td style="text-align:right;">'+
                                            '<a href="javascript:void(0);" class="btn btn-info btn-sm item_edit" data-id="'+data[i].id+'" data-name="'+data[i].name+'" data-description="'+data[i].description+'">Edit</a>'+' '+
                                            '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-id="'+data[i].id+'">Delete</a>'+
                                        '</td>'+
                                        '</tr>';
                            }
                            $("#mydata").dataTable().fnDestroy();
                            $('#show_departmentdata').html(html);
                            $("#mydata").dataTable();
                           
                        }
         
                    });
                }

            
            
            
            $('#adddepartmentform').validate({
                rules: {
                    name: {
                      required: true
                    },
                    description: {
                      required: true
                    }
                    
                  },
                submitHandler: function(form) {
                    var name = $('[name="name"]').val();
                    var description = $('[name="description"]').val();
                    $.ajax({
                        type : "POST",
                        url  : "<?php echo base_url('admin/AdminDepartment/save_department')?>",
                        dataType : "JSON",
                        data : {name:name , description:description},
                        success: function(data){
                            if(data == 'name_exist'){
                                $("#error").html('<label class="error" >Department name already exist!</label>');
                            }
                            else if(data == 'false'){
                                $("#error").html('<label class="error" >Error in adding!</label>');
                            } else {
                                $("#error").empty();
                                $('[name="name"]').val("");
                                $('[name="description"]').val("");
                                $('#Modal_DepartmentAdd').modal('hide');
                                show_departments();
                            }
                        }
                    });
                    return false;
                },
                // other options
            });
            
            
            
            
       // });
 
        //get data for update record
        $('#show_departmentdata').on('click','.item_edit',function(){
            
            var id      = $(this).data('id');
            var name = $(this).data('name');
            var description = $(this).data('description');
            $('[name="id_edit"]').val(id);
            $('[name="name_edit"]').val(name);
            $('[name="description_edit"]').val(description);
            $('#Modal_DepartmentEdit').modal('show');

        });
 
        //update record to database
         $('#btn_departmentupdate').on('click',function(){
            var id  = $('[name="id_edit"]').val();
            var name = $('[name="name_edit"]').val();
            var description = $('[name="description_edit"]').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('admin/AdminDepartment/update_department')?>",
                dataType : "JSON",
                data : {id:id, name:name , description:description},
                success: function(data){
                    $('#Modal_DepartmentEdit').modal('hide');
                    show_departments();
                }
            });
            return false;
        });
 
        //get data for delete record
        $('#show_departmentdata').on('click','.item_delete',function(){
            var id = $(this).data('id');
             
            $('#Modal_DepartmentDelete').modal('show');
            $('[name="id"]').val(id);
        });
 
        //delete record to database
         $('#btn_departmentdelete').on('click',function(){
                    var id = $('#id').val();
                    $.ajax({
                        type : "POST",
                        url  : "<?php echo base_url('admin/AdminDepartment/delete_department')?>",
                        dataType : "JSON",
                        data : {id:id},
                        success: function(data){
                            $('[name="id"]').val("");
                            $('#Modal_DepartmentDelete').modal('hide');
                            show_departments();
                        }
                    });
            return false;
        });

         show_doctors();
         function show_doctors(){
            $.ajax({
                type  : 'ajax',
                url   : '<?php echo base_url('admin/AdminDoctor/getDoctorData')?>',
                async : false,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                '<td><img src="<?php echo base_url();?>uploads/doctors/'+data[i].avatar+'" alt="Doctor Image" width="100" height="100" /></td>'+
                                '<td>'+data[i].first_name+'</td>'+
                                '<td>'+data[i].last_name+'</td>'+
                                '<td>'+data[i].department_name+'</td>'+
                                '<td>'+data[i].email+'</td>'+
                                '<td>'+data[i].contact+'</td>'+
                                
                                '</td>'+
                                '<td>'+data[i].clinic_name+'</td>'+ 
                                '<td>'+data[i].address+'</td>'+ 
                                '<td>'+data[i].visit_fee+'</td>'+ 
                                
                                '<td class="center">'+
                                    '<a href="javascript:void(0);" class="btn btn-info btn-sm item_edit" data-id="'+data[i].id+'" data-first_name="'+data[i].first_name+'" data-last_name="'+data[i].last_name+'" data-department_id="'+data[i].department_id+'" data-email="'+data[i].email+'" data-contact="'+data[i].contact+'" data-clinic_name="'+data[i].clinic_name+'" data-address="'+data[i].address+'" data-visit_fee="'+data[i].visit_fee+'" data-avatar="'+data[i].avatar+'" >Edit</a>'+' '+
                                    '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-id="'+data[i].id+'">Delete</a>'+
                                '</tr>';
                    }
                    $("#mydata").dataTable().fnDestroy();
                    $('#show_doctordata').html(html);
                    $("#mydata").dataTable();

                }
 
            });
        }
        $('#adddoctorform').validate({
                rules: {
                    first_name: {
                      required: true
                    },
                    last_name: {
                      required: true
                    },
                    email: {
                      required: true,
                      email : true
                    },
                    department_id: {
                      required: true
                    },
                    address: {
                      required: true
                    },
                    contact: {
                      required: true
                    },
                    clinic_name: {
                      required: true
                    },
                    visit_fee: {
                      required: true
                    },
                    avatar: {
                      required: true
                    }
                    
                  },
                submitHandler: function(form) {
                       var formData = new FormData( $("#adddoctorform")[0]);
                       formData.append('avatar', $("#doctor_image")[0].files[0])

                        $.ajax({
                            url : "<?php echo base_url('admin/AdminDoctor/save_doctor')?>",  // Controller URL
                            type : 'POST',
                            data : formData,
                            async : false,
                            cache : false,
                            contentType : false,
                            processData : false,
                            success : function(data) {
                               if(data == 'email_exist'){
                                    $("#error").html('<label class="error" >Email already exist!</label>');
                                }
                                else if(data == 'false'){
                                    $("#error").html('<label class="error" >Error in adding!</label>');
                                } else {
                                    $("#error").empty();
                                    $('[name="first_name"]').val("");
                                    $('[name="last_name"]').val("");
                                    $('[name="email"]').val("");
                                    $('[name="address"]').val("");
                                    $('[name="contact"]').val("");
                                    $('[name="clinic_name"]').val("");
                                    $('[name="visit_fee"]').val("");
                                    $('[name="avatar"]').val("");
                                    $('#Modal_DoctorAdd').modal('hide');
                                    show_doctors();
                                }
                            }
                        });            
                
                    return false;
                },
                // other options
            });
        $('#show_doctordata').on('click','.item_edit',function(){
           var id = $(this).data('id');
            var first_name = $(this).data('first_name');
            var last_name = $(this).data('last_name');
            var email = $(this).data('email');
            var department_id = $(this).data('department_id');
            var address = $(this).data('address');
            var contact = $(this).data('contact');
            var clinic_name = $(this).data('clinic_name');
            var visit_fee   = $(this).data('visit_fee');
            var avatar = $(this).data('avatar');
            $('[name="id_edit"]').val(id);
            $('[name="first_name_edit"]').val(first_name);
            $('[name="last_name_edit"]').val(last_name);
            $('[name="email_edit"]').val(email);
            $('[name="department_id_edit"]').val(department_id);
            $('[name="address_edit"]').val(address);
            $('[name="contact_edit"]').val(contact);
            $('[name="clinic_name_edit"]').val(clinic_name);
            $('[name="visit_fee_edit"]').val(visit_fee);
            $("#doctor_image_view").attr("src","<?php echo base_url();?>uploads/doctors/" +avatar);
             $("#edit_error").empty();
            $('#Modal_DoctorEdit').modal('show');

        });


      
          $('#editdoctorform').validate({
                rules: {
                    first_name_edit: {
                      required: true
                    },
                    last_name_edit: {
                      required: true
                    },
                    email_edit: {
                      required: true,
                      email : true
                    },
                    department_id_edit: {
                      required: true
                    },
                    address_edit: {
                      required: true
                    },
                    contact_edit: {
                      required: true
                    },
                    clinic_name_edit: {
                      required: true
                    },
                    visit_fee_edit: {
                      required: true
                    }
                    
                  },
                submitHandler: function(form) {
                        var formData = new FormData( $("#editdoctorform")[0]);
                        formData.append('avatar_edit', $("#doctor_image_new")[0].files[0])
                        
                        $.ajax({
                            url : "<?php echo base_url('admin/AdminDoctor/update_doctor')?>",  
                            type : 'POST',
                            data : formData,
                            async : false,
                            cache : false,
                            contentType : false,
                            processData : false,
                            success : function(data) {
                            console.log(data)         
                                    if(data !='1null')
                                    {
                                    $("#edit_error").empty();
                                    $('[name="id_edit"]').val("");
                                    $('[name="first_name_edit"]').val("");
                                    $('[name="last_name_edit"]').val("");
                                    $('[name="email_edit"]').val("");
                                    $('[name="department_id_edit"]').val("");
                                    $('[name="address_edit"]').val("");
                                    $('[name="contact_edit"]').val("");
                                    $('[name="clinic_name_edit"]').val("");
                                    $('[name="visit_fee_edit"]').val("");
                                    $('[name="avatar_edit"]').val("");
                                    $('#Modal_DoctorEdit').modal('hide');
                                    show_doctors();
                                     return false;
                                  
                                } else {
                                      $("#edit_error").html('<label class="error" >Error in editing! Check email is not exist or something</label>');
                                      // $('#Modal_DoctorEdit').modal('show');
                                     return false;
                                }
                            }
                        });         
                   
                },
                // other options
            });

           $('#show_doctordata').on('click','.item_delete',function(){
            var id = $(this).data('id');
             
            $('#Modal_DoctorDelete').modal('show');
            $('[name="id"]').val(id);
        });
 
        //delete record to database
         $('#btn_doctordelete').on('click',function(){
                    var id = $('#id').val();
                    $.ajax({
                        type : "POST",
                        url  : "<?php echo base_url('admin/AdminDoctor/delete_doctor')?>",
                        dataType : "JSON",
                        data : {id:id},
                        success: function(data){
                            $('[name="id"]').val("");
                            $('#Modal_DoctorDelete').modal('hide');
                            show_doctors();
                        }
                    });
            return false;
        });

                 show_labs();
                 function show_labs(){
                    $.ajax({
                        type  : 'ajax',
                        url   : '<?php echo base_url('admin/AdminLab/getLabData')?>',
                        async : false,
                        dataType : 'json',
                        success : function(data){
                            var html = '';
                            var i;
                            for(i=0; i<data.length; i++){
                                html += '<tr>'+
                                        '<td>'+data[i].name+'</td>'+
                                        '<td>'+data[i].address+'</td>'+
                                        '<td>'+data[i].contact+'</td>'+
                                        '<td>'+data[i].sec_contact+'</td>'+
                                        '<td style="text-align:right;">'+
                                            '<a href="javascript:void(0);" class="btn btn-info btn-sm item_edit" data-id="'+data[i].id+'" data-name="'+data[i].name+'" data-address="'+data[i].address+'" data-contact="'+data[i].contact+'" data-sec_contact="'+data[i].sec_contact+'">Edit</a>'+' '+
                                            '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-id="'+data[i].id+'">Delete</a>'+
                                        '</td>'+
                                        '</tr>';
                            }
                            $("#mydata").dataTable().fnDestroy();
                            $('#show_labdata').html(html);
                            $("#mydata").dataTable();
                           
                        }
         
                    });
                }

            
            
            
            $('#addlabform').validate({
                rules: {
                    name: {
                      required: true
                    },
                    address: {
                      required: true
                    },
                    contact: {
                      required: true
                    },
                    sec_contact: {
                      required: true
                    }
                    
                  },
                submitHandler: function(form) {
                    var name = $('[name="name"]').val();
                    var address = $('[name="address"]').val();
                    var contact = $('[name="contact"]').val();
                    var sec_contact = $('[name="sec_contact"]').val();
                    $.ajax({
                        type : "POST",
                        url  : "<?php echo base_url('admin/AdminLab/save_lab')?>",
                        dataType : "JSON",
                        data : {name:name , address:address, contact:contact,sec_contact:sec_contact},
                        success: function(data){
                            if(data == 'name_exist'){
                                $("#error").html('<label class="error" >Lab name already exist!</label>');
                            }
                            else if(data == 'false'){
                                $("#error").html('<label class="error" >Error in adding!</label>');
                            } else {
                                $("#error").empty();
                                $('[name="name"]').val("");
                                $('[name="description"]').val("");
                                 $('[name="contact"]').val("");
                                $('[name="sec_contact"]').val("");
                                $('#Modal_LabAdd').modal('hide');
                                show_labs();
                            }
                        }
                    });
                    return false;
                },
                // other options
            });
            
            
            
            
       // });
 
        //get data for update record
        $('#show_labdata').on('click','.item_edit',function(){
            
            var id      = $(this).data('id');
            var name      = $(this).data('name');
            var address      = $(this).data('address');
            var contact      = $(this).data('contact');
            var sec_contact      = $(this).data('sec_contact');
          
            $('[name="id_edit"]').val(id);
            $('[name="name_edit"]').val(name);
            $('[name="address_edit"]').val(address);
            $('[name="contact_edit"]').val(contact);
            $('[name="sec_contact_edit"]').val(sec_contact);
            $("#edit_error").empty();
            $('#Modal_LabEdit').modal('show');

        });
 
        //update record to database
         $('#btn_labupdate').on('click',function(){
            var id  = $('[name="id_edit"]').val();
            var name = $('[name="name_edit"]').val();
            var address = $('[name="address_edit"]').val();
            var contact = $('[name="contact_edit"]').val();
            var sec_contact = $('[name="sec_contact_edit"]').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('admin/AdminLab/update_lab')?>",
                dataType : "JSON",
                data : {name:name , address:address, contact:contact,sec_contact:sec_contact,id:id},
                success: function(data){
                     if(data == 'name_exist'){
                        $("#edit_error").html('<label class="error" >Lab name already exist!</label>');
                    }
                    else if(data == 'false'){
                        $("#edit_error").html('<label class="error" >Error in adding!</label>');
                    } else {
                       $("#edit_error").empty();
                       $('#Modal_LabEdit').modal('hide');
                        show_labs();
                    }
                }
            });
            return false;
        });
 
        //get data for delete record
        $('#show_labdata').on('click','.item_delete',function(){
            var id = $(this).data('id');
             
            $('#Modal_LabDelete').modal('show');
            $('[name="id"]').val(id);
        });
 
        //delete record to database
         $('#btn_labdelete').on('click',function(){
                    var id = $('#id').val();
                    $.ajax({
                        type : "POST",
                        url  : "<?php echo base_url('admin/AdminLab/delete_lab')?>",
                        dataType : "JSON",
                        data : {id:id},
                        success: function(data){
                            $('[name="id"]').val("");
                            $('#Modal_LabDelete').modal('hide');
                            show_labs();
                        }
                    });
            return false;
        });

         show_tests();
         function show_tests(){
            $.ajax({
                type  : 'ajax',
                url   : '<?php echo base_url('admin/AdminTest/getTestData')?>',
                async : false,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                '<td>'+data[i].name+'</td>'+
                                '<td>'+data[i].lab_name+'</td>'+
                                '<td>'+data[i].price+'</td>'+
                                '<td style="text-align:right;">'+
                                    '<a href="javascript:void(0);" class="btn btn-info btn-sm item_edit" data-id="'+data[i].id+'" data-name="'+data[i].name+'" data-lab_id="'+data[i].lab_id+'" data-price="'+data[i].price+'" >Edit</a>'+' '+
                                    '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-id="'+data[i].id+'">Delete</a>'+
                                '</td>'+
                                '</tr>';
                    }
                    $("#mydata").dataTable().fnDestroy();
                    $('#show_testdata').html(html);
                    $("#mydata").dataTable();
                   
                }
 
            });
        }

          $('#addtestform').validate({
                rules: {
                    name: {
                      required: true
                    },
                    lab_id: {
                      required: true
                    },
                    price: {
                      required: true
                    }
                    
                  },
                submitHandler: function(form) {
                    var name = $('[name="name"]').val();
                    var lab_id = $('[name="lab_id"]').val();
                    var price = $('[name="price"]').val();
                    $.ajax({
                        type : "POST",
                        url  : "<?php echo base_url('admin/AdminTest/save_test')?>",
                        dataType : "JSON",
                        data : {name:name , lab_id:lab_id, price:price},
                        success: function(data){
                            if(data == 'name_exist'){
                                $("#error").html('<label class="error" >Test name already exist!</label>');
                            }
                            else if(data == 'false'){
                                $("#error").html('<label class="error" >Error in adding!</label>');
                            } else {
                                $("#error").empty();
                                $('[name="name"]').val("");
                                $('[name="price"]').val("");
                                $('#Modal_TestAdd').modal('hide');
                                show_tests();
                            }
                        }
                    });
                    return false;
                },
                // other options
            });
            
            
            
            
       // });
 
        //get data for update record
        $('#show_testdata').on('click','.item_edit',function(){
            
            var id      = $(this).data('id');
            var name      = $(this).data('name');
            var lab_id      = $(this).data('lab_id');
            var price      = $(this).data('price');
          
            $('[name="id_edit"]').val(id);
            $('[name="name_edit"]').val(name);
            $('[name="lab_id_edit"]').val(lab_id);
            $('[name="price_edit"]').val(price);
            $("#edit_error").empty();
            $('#Modal_TestEdit').modal('show');

        });
 
        //update record to database
         $('#btn_testupdate').on('click',function(){
            var id_edit  = $('[name="id_edit"]').val();
            var name_edit = $('[name="name_edit"]').val();
            var lab_id_edit = $('[name="lab_id_edit"]').val();
            var price_edit = $('[name="price_edit"]').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('admin/AdminTest/update_test')?>",
                dataType : "JSON",
                data : {name_edit:name_edit , lab_id_edit:lab_id_edit, price_edit:price_edit,id_edit:id_edit},
                success: function(data){
                    if(data == 'name_exist'){
                        $("#edit_error").html('<label class="error" >Test name already exist!</label>');
                    }
                    else if(data == 'false'){
                        $("#edit_error").html('<label class="error" >Error in adding!</label>');
                    } else {
                        $("#edit_error").empty();
                       $('#Modal_TestEdit').modal('hide');
                        show_tests();
                    }
                   
                }
            });
            return false;
        });
 
        //get data for delete record
        $('#show_testdata').on('click','.item_delete',function(){
            var id = $(this).data('id');
            $('[name="id"]').val(id);
            $('#Modal_TestDelete').modal('show');
        });
 
        //delete record to database
         $('#btn_testdelete').on('click',function(){
                    var id = $('#id').val();
                    $.ajax({
                        type : "POST",
                        url  : "<?php echo base_url('admin/AdminTest/delete_test')?>",
                        dataType : "JSON",
                        data : {id:id},
                        success: function(data){
                            $('[name="id"]').val("");
                            $('#Modal_TestDelete').modal('hide');
                            show_tests();
                        }
                    });
            return false;
        });










         
});
	
	
	
	
	
	
	
	
 
</script>

<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    // ClassicEditor
    //   .create(document.querySelector('#address'))
    //   .then(function (editor) {
    //    console.log(editor)
    //   })
    //   .catch(function (error) {
    //     console.error(error)
    //   })

   //  $(function () {
 
 
   //    CKEDITOR.replace( 'editor1',
   //    {
   //     removeButtons: 'Source,Table,About,Image'
   //    });
  
   // })


 
    // bootstrap WYSIHTML5 - text editor

    // $('#address').wysihtml5({
    //   toolbar: { fa: true }
    // })

  })
</script>


</body>
</html>