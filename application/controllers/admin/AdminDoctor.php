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
		$this->load->view('admin/includes/header');
		$this->load->view('admin/includes/nav');
		$this->load->view('admin/doctor/view');
		$this->load->view('admin/includes/footer');
	}
	
	
	public function getDoctorData()
	{
		
		$data = $this->DoctorModel->viewRecords();
		echo json_encode($data);
		
	}

	
	function save(){
		
        $data=$this->DoctorModel->save_user();
		echo json_encode($data);
    }
	
	function update(){
        $data=$this->DoctorModel->update_user();
        echo json_encode($data);
    }
	
	function delete(){
        $data=$this->DoctorModel->delete_user();
        echo json_encode($data);
    }
	
	
	
		
	
	
			
	
	
	
	
	
	
	
}
