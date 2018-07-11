<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminDoctor extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
		$this->load->model('admin/DoctorModel','DoctorModel');
		
    }
	
	
	


	public function index()
	{
		$isLoggedIn = $this->session->userdata('isLoggedIn');
        
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
			     redirect('admin');
        }
        else
        {
            $data['content']	 = 'admin/dashboard';
			$this->load->view('admin/template/index',$data);
			
        }
	}
	
	public function doctorListing()
	{
		$data["departments"] = $this->DoctorModel->getDepartments();
		$data["bloodgroups"] = array('A+','A-','B+','B-','O+','O-','AB+','AB-');
		$this->load->view('admin/includes/header');
		$this->load->view('admin/includes/nav');
		$this->load->view('admin/doctor/view',$data);
		$this->load->view('admin/includes/footer');
	}
	
	
	public function getDoctorData()
	{
		
		$data = $this->DoctorModel->viewRecords();
		echo json_encode($data);
		
	}

	
	function save_doctor(){

	     $config['upload_path'] ='assets/images/doctors/'; 
	     $config['allowed_types']    = 'gif|jpg|png';
	     $config['max_size']         = '100';
	     $config['max_width']        = '1024';
	     $config['max_height']       ='768';   
	     $this->load->library('upload', $config);
	     
	     if (!$this->upload->do_upload()) {
	      $error = array('error' => $this->upload->display_errors());
	     } else {
	      		$_POST["avatar"] = time().'_'.$this->upload->data('file_name');
	        	$data=$this->DoctorModel->save_doctor();
	     		echo json_encode($data);
   		 }
	 }
	    
	
	function update_doctor(){
        $data=$this->DoctorModel->update_doctor();
        echo json_encode($data);
    }
	
	function delete_doctor(){
        $data=$this->DoctorModel->delete_doctor();
        echo json_encode($data);
    }
	
	
	
		
	
	
			
	
	
	
	
	
	
	
}
