<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class TestModel extends CI_Model
{
   
	 function checkTestExist($name,$lab_id)
    {
        $this->db->select('id');

        $this->db->where('name', $name);
        $this->db->where('lab_id', $lab_id);
        $query = $this->db->get('tests');

        if ($query->num_rows() > 0){
            return true;
        } else {
            return false;
        }
    }
    function checkTestUpdateExist($name,$id,$lab_id)
    {
        $this->db->select('id');
 		$this->db->where('id !=',$id);
        $this->db->where('name', $name);
        $this->db->where('lab_id', $lab_id);
        $query = $this->db->get('tests');

        if ($query->num_rows() > 0){
            return true;
        } else {
            return false;
        }
    }

    function getLabs()
    {
        $this->db->select('labs.*');
        $this->db->from('labs');
        $query = $this->db->get();
		return $query->result();
    }
	
	function viewRecords()
    {
        $this->db->select('tests.*,labs.name as lab_name');
        $this->db->join('labs','labs.id=tests.lab_id');
        $this->db->from('tests');
        $query = $this->db->get();
		return $query->result();
    }
	
	
	function save_test(){
		
		
		
		$name = $this->checkTestExist($_POST["name"],$_POST["lab_id"]);
		if($name){
			return "name_exist";
		}else{
			
			$data = array(
					'name'  =>$_POST["name"], 
					'lab_id'  => $_POST["lab_id"], 
					'price' => $_POST["price"]
				);


		
			if($this->db->insert('tests',$data)){
				return 'true';
			} else {
				return 'false';
			}
		}
		
		
			
		
		
	}
	
	
	function update_test(){
		$id_edit = $_POST["id_edit"];
		$name_edit = $_POST["name_edit"];
		$lab_id_edit = $_POST["lab_id_edit"];
		$exist = $this->checkTestUpdateExist($name_edit,$id_edit,$lab_id_edit);
		if($exist){
			return "name_exist";
		}else{
			
			$data = array(
					'name'  =>$_POST["name_edit"], 
					'lab_id'  => $_POST["lab_id_edit"], 
					'price' => $_POST["price_edit"]
				);

	 		 $result=$this->db->where('id', $id_edit);
			 $result=$this->db->update('tests',$data);

			if($result){
				return 'true';
			} else {
				return 'false';
			}
		}
    }
	
	function delete_test(){
        $id=$this->input->post('id');
        $this->db->where('id', $id);
        $result=$this->db->delete('tests');
        return $result;
    }
   
}

?>