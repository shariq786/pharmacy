<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminDepartment extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
		$this->load->model('admin/DepartmentModel','DepartmentModel');
		
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
	
	public function departmentListing()
	{
		$this->load->view('admin/includes/header');
		$this->load->view('admin/includes/nav');
		$this->load->view('admin/department/view');
		$this->load->view('admin/includes/footer');
	}
	
	
	public function getDepartmentData()
	{
		
		$data = $this->DepartmentModel->viewRecords();
		echo json_encode($data);
		
	}

	
	function save_department(){

        $data=$this->DepartmentModel->save_department();
		echo json_encode($data);
    }
	
	function update_department(){
        $data=$this->DepartmentModel->update_department();
        echo json_encode($data);
    }
	
	function delete_department(){
        $data=$this->DepartmentModel->delete_department();
        echo json_encode($data);
    }
	
	
	
		
	
	
			
	
	
	
	
	
	
	
}
