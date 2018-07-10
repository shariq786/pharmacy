<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UserRegister extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->model('user/RegisterModel','userRegisterModel');
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
                 redirect('userDashboard');
            }
			
        }
	}
	
	public function registeredMe()
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



        $this->form_validation
            ->set_rules(
                'email',
                'Email', 
                'trim|required|valid_email|is_unique[users.email]',array('is_unique'=>'Email address is already taken')
            );          
    
        $this->form_validation
            ->set_rules(
                'password',
                'Password',
                'trim|min_length[5]|max_length[8]'
            );

        $this->form_validation->
        set_rules('contact',
         'Contact No',
          'required|is_unique[users.contact]',array('is_unique'=>'Contact No is already given')
        );

        $this->form_validation->
        set_rules('gender',
         'Gender',
          'required'
        );

        $this->form_validation
        ->set_rules(
            'reenterpassword', 
            'Password Confirmation', 
            'required|matches[password]'
        );

        
        if($this->form_validation->run() == FALSE)
        {
            $this->index();
        }
        else
        {
            
            $result = $this->userRegisterModel->RegisterMe($_POST);
            //var_dump($result); die;
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
                     redirect('userDashboard');       
                    
                }
            }
            else
            {
                $this->session->set_flashdata('error', 'Information Is Incorrect');
                  redirect('userRegister');
            }
        }
    }
	
	

}
