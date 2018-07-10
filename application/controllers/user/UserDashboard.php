<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UserDashboard extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->model('user/DashboardModel','userDashboardModel');
    }



	public function index()
	{
		$isLoggedIn = $this->session->userdata('isLoggedIn');
        
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
			redirect("");
        }
        else
        {
        	$role_id = $this->session->userdata('role_id');
        	if($role_id == '1'){
				redirect('admin');
        	}else{
				$this->load->view('user/includes/header');
				$this->load->view('user/includes/nav');
				$this->load->view('user/dashboard');
				$this->load->view('user/includes/footer');
        	}
        }
	}

	public function profileView()
	{
		$isLoggedIn = $this->session->userdata('isLoggedIn');
        
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
			redirect("");
        }
        else
        {
			$userId = $this->session->userdata('id');
        	$data['user'] = $this->userDashboardModel->getUser_details($userId)[0];

          	$this->load->view('user/includes/header');
			$this->load->view('user/includes/nav');
			$this->load->view('user/pages/profile',$data);
			$this->load->view('user/includes/footer');
			
        }
	}
	public function userProfileUpdate()
	{
		$isLoggedIn = $this->session->userdata('isLoggedIn');
        
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
			redirect("");
        }
        else
        {
        	$this->load->library('form_validation');

        	 $this->form_validation
            ->set_rules(
                'first_name',
                'First Name',
                'trim|min_length[4]|required|max_length[20]'
            );

	        $this->form_validation
	        ->set_rules(
	            'last_name',
	            'Last Name',
	            'trim|min_length[4]|required|max_length[20]'
	        );
	        
		 

	        $this->form_validation->
	        set_rules('contact',
	         'Contact',
	          'required|numeric|max_length[11]|min_length[11]'
	        );

	         $this->form_validation->
	        set_rules('dob',
         	  'Birth',
	          'required'
	        );

	        $this->form_validation->
	        set_rules('country',
	         'Country',
	          'required'
	        );

	        $this->form_validation->
	        set_rules('city',
	         'City',
	          'required'
	        );

	        $this->form_validation->
	        set_rules('address',
	         'Address',
	          'required'
	        );

	        $this->form_validation->
	        set_rules('gender',
	         'Gender',
	          'required'
	        );

	       
	        
	        if($this->form_validation->run() == FALSE)
	        {

 				$this->session->set_flashdata('error', 'Error While Updating information , kindly check it , phone number etc');
	            redirect('userProfile');

	        }
	        else
	        {

	            $userId = $this->session->userdata('id');
	            $result = $this->userDashboardModel->updateProfile($userId,$_POST);
	            if(count($result) > 0)
	            {
					foreach ($result as $res)
	                {
	                    $sessionArray = array(

	                                            'id'=>$res->id,                    
	                                            'role_id'=>$res->role_id,
	                                            'first_name'=>ucfirst($res->first_name),
	                                            'last_name'=>ucfirst($res->last_name),
	                                            'roleName'=>$res->display_name,
	                                            'isLoggedIn' => TRUE
	                                    );
	                    $this->session->set_userdata($sessionArray); 
	                    $this->session->set_flashdata('success', 'User Information has been updated');
                  			redirect('userProfile');   
	                    
	                }
	            }
	            else
	            {
	                  $this->session->set_flashdata('error','Error While Updating information , kindly check it');
	                  redirect('userProfile');
	            }
	        }
        }
		
	}
	public function logout()
	{
		$role_id = $this->session->userdata('role_id');
        if($role_id == '1'){
            redirect('admin');
        }else{
             
			session_destroy();
			redirect('');
        }
	}
	

	

}
