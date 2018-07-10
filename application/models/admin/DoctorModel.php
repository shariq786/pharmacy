<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class DoctorModel extends CI_Model
{
   
	 function checkDepartmentExist($name)
    {
        $this->db->select('id');

        $this->db->where('name', $name);
        $query = $this->db->get('departments');

        if ($query->num_rows() > 0){
            return true;
        } else {
            return false;
        }
    }
	
	function viewRecords()
    {
        $this->db->select('doctors.*,status.name as status_name,departments.name as department_name');
        $this->db->join('departments','departments.id=doctors.department_id');
        $this->db->join('status','status.id=doctors.status_id');
        $this->db->from('doctors');
        $query = $this->db->get();
		return $query->result();
    }
	
	
	function save_department(){
		
		
		
		$exists = $this->checkDepartmentExist($this->input->post('name'));
		if($exists){
			return "name_exist";
		}else{
			$data = array(
					'name'  => $this->input->post('name'), 
					'description'  => $this->input->post('description'), 
					'status_id' => $this->input->post('status_id'), 
				);
		
			if($this->db->insert('departments',$data)){
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