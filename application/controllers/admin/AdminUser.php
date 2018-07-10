<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminUser extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
		$this->load->model('admin/UserModel','UserModel');
		
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
	
	public function userListing()
	{
		$this->load->view('admin/includes/header');
		$this->load->view('admin/includes/nav');
		$this->load->view('admin/user/view');
		$this->load->view('admin/includes/footer');
	}
	
	
	public function getUserData()
	{
		
		$data = $this->UserModel->viewRecords();
		echo json_encode($data);
		
	}

	
	function save(){
        $data=$this->UserModel->save_user();
		echo json_encode($data);
    }
	
	function update(){
        $data=$this->UserModel->update_user();
        echo json_encode($data);
    }
	
	function delete(){
        $data=$this->UserModel->delete_user();
        echo json_encode($data);
    }
	
	
	
		
	
	
			
	
	
	
	
	
	
	
}
