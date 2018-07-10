<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');

	}

	
	public function index()
	{
		$isLoggedIn = $this->session->userdata('isLoggedIn');
        
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
			 $this->load->view('home');
        }
        else
        {
        	$role_id = $this->session->userdata('role_id');
        	if($role_id == '1'){
				redirect('admin');
        	}else{
				redirect('user');
        	}
			
        }
	}
	

	

}
