<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminSubAdmin extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
		$this->load->model('admin/SubAdminModel','SubAdminModel');
		
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
	
	public function subAdminListing()
	{
		$this->load->view('admin/includes/header');
		$this->load->view('admin/includes/nav');
		$this->load->view('admin/subadmin/view');
		$this->load->view('admin/includes/footer');
	}
	
	
	public function getAdminData()
	{
		// $results = array('data' => array());
		
		// $adminDatas = $this->SubAdminModel->viewRecords();
		// $no = 0;
		// $index = 0;
		// foreach($adminDatas as $admin) {
		// $no++;
		// $sNo1 = "<span>".$no."</span>";
        // $first_name = '<span>'.$admin->first_name.'</span>';
		// $email = '<span>'.$admin->email.'</span>';
		// $results['data'][$index] = array($sNo1,$first_name,$email);
		// $index++;
		// }
		// echo json_encode($results);
		
		
		$data = $this->SubAdminModel->viewRecords();
		echo json_encode($data);
		
	}
	
	function save(){
        $data=$this->SubAdminModel->save_user();
		echo json_encode($data);
    }
	
	function update(){
        $data=$this->SubAdminModel->update_user();
        echo json_encode($data);
    }
	
	function delete(){
        $data=$this->SubAdminModel->delete_user();
        echo json_encode($data);
    }
	
	
	
		
	
	
			
	
	
	
	
	
	
	
}
