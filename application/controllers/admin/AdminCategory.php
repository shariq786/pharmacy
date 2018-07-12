<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminCategory extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
		$this->load->model('admin/CategoryModel','CategoryModel');
		
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
	
	public function categoryListing()
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
			$this->load->view('admin/category/view');
			$this->load->view('admin/includes/footer');
		}
	}
	
	
	public function getCategoryData()
	{
		
		$data = $this->CategoryModel->viewRecords();
		echo json_encode($data);
		
	}

	
	function save_category(){

        $data=$this->CategoryModel->save_category();
		echo json_encode($data);
    }
	
	function update_category(){
        $data=$this->CategoryModel->update_category();
        echo json_encode($data);
    }
	
	function delete_category(){
        $data=$this->CategoryModel->delete_category();
        echo json_encode($data);
    }
	
	
	
		
	
	
			
	
	
	
	
	
	
	
}
