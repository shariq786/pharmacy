<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminLab extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
		$this->load->model('admin/LabModel','LabModel');
		
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
	
	public function labListing()
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
			$this->load->view('admin/lab/view');
			$this->load->view('admin/includes/footer');
		}
	}
	
	
	public function getLabData()
	{
		
		$data = $this->LabModel->viewRecords();
		echo json_encode($data);
		
	}

	
	function save_lab(){

        $data=$this->LabModel->save_lab();
		echo json_encode($data);
    }
	
	function update_lab(){
        $data=$this->LabModel->update_lab();
        echo json_encode($data);
    }
	
	function delete_lab(){
        $data=$this->LabModel->delete_lab();
        echo json_encode($data);
    }
	
	
	
		
	
	
			
	
	
	
	
	
	
	
}
