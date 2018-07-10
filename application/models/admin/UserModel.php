<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class UserModel extends CI_Model
{
   
	 function checkEmailExist($email)
    {
        $this->db->select('id');
        $this->db->where('email', $email);
        $query = $this->db->get('users');

        if ($query->num_rows() > 0){
            return true;
        } else {
            return false;
        }
    }
	
	function viewRecords()
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('users.role_id',2);
        $query = $this->db->get();
		return $query->result();
    }
	
	
	function save_user(){
		
		
		
		$exists = $this->checkEmailExist($this->input->post('email'));
		if($exists){
			return "email_exist";
		}else{
			$data = array(
					'email'  => $this->input->post('email'), 
					'first_name'  => $this->input->post('first_name'), 
					'last_name' => $this->input->post('last_name'), 
					'role_id' => 2, 
				);
				
		
			if($this->db->insert('users',$data)){
				return 'true';
			} else {
				return 'false';
			}
		}
		
		
			
		
		
	}
	
	
	function update_user(){
		
		$id=$this->input->post('id');
		$email=$this->input->post('email');
        $first_name=$this->input->post('first_name');
        $last_name=$this->input->post('last_name');
 
        $this->db->set('email', $email);
        $this->db->set('first_name', $first_name);
		$this->db->set('last_name', $last_name);
        $this->db->where('id', $id);
        $result=$this->db->update('users');
        return $result;
    }
	
	function delete_user(){
        $id=$this->input->post('id');
        $this->db->where('id', $id);
        $result=$this->db->delete('users');
        return $result;
    }
   
}

?>