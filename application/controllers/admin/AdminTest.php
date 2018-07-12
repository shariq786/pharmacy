<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminTest extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
		$this->load->model('admin/TestModel','TestModel');
		
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
	
	public function testListing()
	{
		$isLoggedIn = $this->session->userdata('isLoggedIn');
        
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
			     redirect('admin');
        }
        else
        {
			$data["labs"] = $this->TestModel->getLabs();
			$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/nav');
			$this->load->view('admin/test/view',$data);
			$this->load->view('admin/includes/footer');
		}
	}
	
	
	public function getTestData()
	{
		
		$data = $this->TestModel->viewRecords();
		echo json_encode($data);
		
	}

	
	function save_test(){

    	$data=$this->TestModel->save_test();
 		echo json_encode($data);
	 }
	    
	
	function update_test(){
		
    	$data=$this->TestModel->update_test();
 		echo json_encode($data);
        
    }
	
	function delete_test(){
        $data=$this->TestModel->delete_test();
        echo json_encode($data);
    }
	
	
	
		
	
	
			
	
	
	
	
	
	
	
}
