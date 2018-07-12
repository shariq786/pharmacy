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

		if(isset($_FILES['avatar']['name']) && !empty($_FILES['avatar']['name'])){
             $uploadPath = 'uploads/doctors/';
             $config['upload_path'] = $uploadPath;
             $config['allowed_types']    = 'jpg|png';
		     $config['max_size']         = 2048;
		     $config['max_width']        = 5000;
		     $config['max_height']       = 5000;
		     $config['file_ext_tolower'] = true;
		     $config['encrypt_name']     = true;   
            
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if($this->upload->do_upload('avatar')){
            	$fileData = $this->upload->data();
            	$_POST['avatar'] =$fileData['file_name'];
	        	$data=$this->DoctorModel->save_doctor();
	     		echo json_encode($data);
            }
        }
	 }
	    
	
	function update_doctor(){
		if(isset($_FILES['avatar_edit']['name']) && !empty($_FILES['avatar_edit']['name'])){
             $uploadPath = 'uploads/doctors/';
             $config['upload_path'] = $uploadPath;
             $config['allowed_types']    = 'jpg|png';
		     $config['max_size']         = 2048;
		     $config['max_width']        = 5000;
		     $config['max_height']       = 5000;
		     $config['file_ext_tolower'] = true;
		     $config['encrypt_name']     = true;   
            
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if($this->upload->do_upload('avatar_edit')){
            	$fileData = $this->upload->data();
            	$_POST['avatar_edit'] =$fileData['file_name'];
	        	$data=$this->DoctorModel->update_doctor();
        		echo json_encode($data);
            }
        }else{
        	$data=$this->DoctorModel->update_doctor();
        	echo json_encode($data);
        }
        
    }
	
	function delete_doctor(){
        $data=$this->DoctorModel->delete_doctor();
        echo json_encode($data);
    }
	
	
	
		
	
	
			
	
	
	
	
	
	
	
}
