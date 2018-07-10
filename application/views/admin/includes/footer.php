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
		
		
		
		
		show_product(); //call function show all product
         
        $('#mydata').dataTable();
          
        //function show all product
        function show_product(){
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
                    $('#show_data').html(html);
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
								show_product();
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
                    show_product();
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
                    show_product();
                }
            });
            return false;
        });
 
    });
	
	
	
	
	
	
	
	
 
</script>


</body>
</html>