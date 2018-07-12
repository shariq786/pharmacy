<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class CategoryModel extends CI_Model
{
   
	 function checkCategoryExist($name)
    {
        $this->db->select('id');

        $this->db->where('name', $name);
        $query = $this->db->get('categories');

        if ($query->num_rows() > 0){
            return true;
        } else {
            return false;
        }
    }

     function checkUpdateCategoryExist($name,$id)
    {
        $this->db->select('id');
		$this->db->where('id !=', $id);
        $this->db->where('name', $name);
        $query = $this->db->get('categories');

        if ($query->num_rows() > 0){
            return true;
        } else {
            return false;
        }
    }
	
	function viewRecords()
    {
        $this->db->select('categories.*');
        $this->db->from('categories');
        $query = $this->db->get();
		return $query->result();
    }
	
	
	function save_category(){
		
		
		
		$exists = $this->checkCategoryExist($this->input->post('name'));
		if($exists){
			return "name_exist";
		}else{
			$data = array(
					'name'  => $this->input->post('name'),  
				);
		
			if($this->db->insert('categories',$data)){
				return 'true';
			} else {
				return 'false';
			}
		}
		
		
			
		
		
	}
	
	
	function update_category(){

		$exists = $this->checkUpdateCategoryExist($this->input->post('name_edit'),$this->input->post('id_edit'));
			if($exists){
				return "name_exist";
			}else{
			$id  = $this->input->post('id_edit'); 
			$name  = $this->input->post('name_edit');
	 
	        $this->db->set('name', $name);
	        $this->db->where('id', $id);
	        $result=$this->db->update('categories');
	        return $result;
    	}
    }
	
	function delete_category(){
        $id=$this->input->post('id');
        $this->db->where('id', $id);
        $result=$this->db->delete('categories');
        return $result;
    }
   
}

?>