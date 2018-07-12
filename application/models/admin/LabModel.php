<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class LabModel extends CI_Model
{
   
	 function checkLabExist($name)
    {
        $this->db->select('id');

        $this->db->where('name', $name);
        $query = $this->db->get('labs');

        if ($query->num_rows() > 0){
            return true;
        } else {
            return false;
        }
    }
     function checkUpdateLabExist($name,$id)
    {
        $this->db->select('id');
 		$this->db->where('id !=', $id);
        $this->db->where('name', $name);
        $query = $this->db->get('labs');

        if ($query->num_rows() > 0){
            return true;
        } else {
            return false;
        }
    }
	
	function viewRecords()
    {
        $this->db->select('labs.*');
        $this->db->from('labs');
        $query = $this->db->get();
		return $query->result();
    }
	
	
	function save_lab(){
		
		
		
		$exists = $this->checkLabExist($this->input->post('name'));
		if($exists){
			return "name_exist";
		}else{
			$data = array(
					'name'  => $this->input->post('name'), 
					'address'  => $this->input->post('address'), 
					'contact'  => $this->input->post('contact'), 
					'sec_contact'  => $this->input->post('sec_contact'), 
				);
		
			if($this->db->insert('labs',$data)){
				return 'true';
			} else {
				return 'false';
			}
		}
		
		
			
		
		
	}
	
	
	function update_lab(){
		$exists = $this->checkUpdateLabExist($this->input->post('name'),$this->input->post('id'));
		if($exists){
			return "name_exist";
		}else{
		$id  = $this->input->post('id'); 
		$name  = $this->input->post('name'); 
		$address  = $this->input->post('address'); 
		$contact  = $this->input->post('contact'); 
		$sec_contact  = $this->input->post('sec_contact'); 
 
        $this->db->set('name', $name);
        $this->db->set('address', $address);
        $this->db->set('contact', $contact);
        $this->db->set('sec_contact', $sec_contact);
        $this->db->where('id', $id);
        $result=$this->db->update('labs');
        return $result;
    	}
    }
	
	function delete_lab(){
        $id=$this->input->post('id');
        $this->db->where('id', $id);
        $result=$this->db->delete('labs');
        return $result;
    }
   
}

?>