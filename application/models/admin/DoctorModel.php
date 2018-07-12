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
    function checkDoctorUpdateExist($email,$id)
    {
        $this->db->select('id');
 		$this->db->where('id !=',$id);
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
	
	
	function update_doctor(){
		$id  = $this->input->post('id_edit'); 
		$email  = $this->input->post('email_edit'); 
		$exists = $this->checkDoctorUpdateExist($email,$id);
		if($exists){
		 echo TRUE;
		}else{
			
			if(isset($_POST['avatar_edit']) && !empty($_POST['avatar_edit']) && $_POST['avatar_edit'] !="undefined" && $_POST['avatar_edit'] !=undefined){
					
					$data = array(
						'first_name'  =>$_POST["first_name_edit"], 
						'last_name'  => $_POST["last_name_edit"], 
						'email' => $_POST["email_edit"], 
						'department_id'  => $_POST["department_id_edit"], 
						'address'  => $_POST["address_edit"], 
						'contact' =>$_POST["contact_edit"], 
						'clinic_name'  => $_POST["clinic_name_edit"], 
						'visit_fee'  => $_POST["visit_fee_edit"],
						'avatar'  => $_POST["avatar_edit"],  
					);
					$this->db->where('id', $id);
			        $result=$this->db->update('doctors',$data);
			        return $result;
			}else{
					$data = array(
						'first_name'  =>$_POST["first_name_edit"], 
						'last_name'  => $_POST["last_name_edit"], 
						'email' => $_POST["email_edit"], 
						'department_id'  => $_POST["department_id_edit"], 
						'address'  => $_POST["address_edit"], 
						'contact' =>$_POST["contact_edit"], 
						'clinic_name'  => $_POST["clinic_name_edit"], 
						'visit_fee'  => $_POST["visit_fee_edit"],
					);
					$this->db->where('id', $id);
			        $result=$this->db->update('doctors',$data);
			        return $result;
			}
	        
    	}
    }
	
	function delete_doctor(){
        $id=$this->input->post('id');
        $this->db->where('id', $id);
        $result=$this->db->delete('doctors');
        return $result;
    }
   
}

?>