<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminProduct extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
		$this->load->model('admin/ProductModel','ProductModel');
		
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
	
	public function productListing()
	{
		$isLoggedIn = $this->session->userdata('isLoggedIn');
        
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
			     redirect('admin');
        }
        else
        {
		$data["products"] = $this->ProductModel->getProducts();
		$this->load->view('admin/includes/header');
		$this->load->view('admin/includes/nav');
		$this->load->view('admin/product/view',$data);
		$this->load->view('admin/includes/footer');
		}
	}
	
	
	public function getProductData()
	{
		
		$data = $this->ProductModel->viewRecords();
		echo json_encode($data);
		
	}

	
	function save_product(){

    	$data=$this->ProductModel->save_product();
 		echo json_encode($data);
	 }
	    
	
	function update_product(){
		
    	$data=$this->ProductModel->update_product();
 		echo json_encode($data);
        
    }
	
	function delete_product(){
        $data=$this->ProductModel->delete_product();
        echo json_encode($data);
    }
	
	
	
		
	
	
			
	
	
	
	
	
	
	
}
