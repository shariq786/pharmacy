<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminDashboard extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
		//$this->load->model('admin/LoginModel','LoginModel');
		
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
            
			$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/nav');
			$this->load->view('admin/dashboard');
			$this->load->view('admin/includes/footer');
			
        }
	}

	public function all_users()
	{
		$isLoggedIn = $this->session->userdata('isLoggedIn');
        
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
			     redirect('admin');
        }
        else
        {
            
			$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/nav');
			$this->load->view('admin/user/view');
			$this->load->view('admin/includes/footer');
			
        }
	}
	
	
	
	
	
	
	
}
