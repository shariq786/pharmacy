<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class DoctorModel extends CI_Model
{
   
	 function checkDoctorExist($email)
    {
        $this->db->select('id');

        $this->db->where('email', $email);
        $query = $this->db->get('doctors');

        if ($query->num_rows() > 0){
            return true;
        } else {
            return false;
        }
    }

    function getDepartments()
    {
        $this->db->select('departments.*');
        $this->db->from('departments');
        $query = $this->db->get();
		return $query->result();
    }
	
	function viewRecords()
    {
        $this->db->select('doctors.*,departments.name as department_name');
        $this->db->join('departments','departments.id=doctors.department_id');
        $this->db->from('doctors');
        $query = $this->db->get();
		return $query->result();
    }
	
	
	function save_doctor(){
		
		
		
		$exists = $this->checkDoctorExist($_POST["email"]);
		if($exists){
			return "email_exist";
		}else{
			$data = array(
					'first_name'  =>$_POST["first_name"], 
					'last_name'  => $_POST["last_name"], 
					'email' => $_POST["email"], 
					'department_id'  => $_POST["department_id"], 
					'address'  => $_POST["address"], 
					'contact' =>$_POST["contact"], 
					'clinic_name'  => $_POST["clinic_name"], 
					'visit_fee'  => $_POST["visit_fee"],
					'avatar'  => $_POST["avatar"],  
				);


		
			if($this->db->insert('doctors',$data)){
				return 'true';
			} else {
				return 'false';
			}
		}
		
		
			
		
		
	}
	
	
	function update_department(){
		$id  = $this->input->post('id'); 
		$name  = $this->input->post('name'); 
		$description  = $this->input->post('description'); 
		$status_id = $this->input->post('status_id');
 
        $this->db->set('name', $name);
        $this->db->set('description', $description);
		$this->db->set('status_id', $status_id);
        $this->db->where('id', $id);
        $result=$this->db->update('departments');
        return $result;
    }
	
	function delete_department(){
        $id=$this->input->post('id');
        $this->db->where('id', $id);
        $result=$this->db->delete('departments');
        return $result;
    }
   
}

?>