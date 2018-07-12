<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class ProductModel extends CI_Model
{
   
	 function checkProductExist($name,$id)
    {
        $this->db->select('id');

        $this->db->where('name', $name);
        $this->db->where('id', $id);
        $query = $this->db->get('products');

        if ($query->num_rows() > 0){
            return true;
        } else {
            return false;
        }
    }
    function checkProductUpdateExist($name,$id,$lab_id)
    {
        $this->db->select('id');
 		$this->db->where('id !=',$id);
        $this->db->where('name', $name);
        $this->db->where('lab_id', $lab_id);
        $query = $this->db->get('products');

        if ($query->num_rows() > 0){
            return true;
        } else {
            return false;
        }
    }

    function getProducts()
    {
        $this->db->select('products.*');
        $this->db->from('products');
        $query = $this->db->get();
		return $query->result();
    }
	
	function viewRecords()
    {
        $this->db->select('products.*,categories.name as category_name');
        $this->db->join('products','categories.id=products.cat_id');
        $this->db->from('products');
        $query = $this->db->get();
		return $query->result();
    }
	
	
	function save_product(){
		
		
		
		$name = $this->checkProductExist($_POST["name"],$_POST["lab_id"]);
		if($name){
			return "name_exist";
		}else{
			
			$data = array(
					'name'  =>$_POST["name"], 
					'lab_id'  => $_POST["lab_id"], 
					'price' => $_POST["price"]
				);


		
			if($this->db->insert('products',$data)){
				return 'true';
			} else {
				return 'false';
			}
		}
		
		
			
		
		
	}
	
	
	function update_product(){
		$id_edit = $_POST["id_edit"];
		$name_edit = $_POST["name_edit"];
		$lab_id_edit = $_POST["lab_id_edit"];
		$exist = $this->checkProductUpdateExist($name_edit,$id_edit,$lab_id_edit);
		if($exist){
			return "name_exist";
		}else{
			
			$data = array(
					'name'  =>$_POST["name_edit"], 
					'lab_id'  => $_POST["lab_id_edit"], 
					'price' => $_POST["price_edit"]
				);

	 		 $result=$this->db->where('id', $id_edit);
			 $result=$this->db->update('products',$data);

			if($result){
				return 'true';
			} else {
				return 'false';
			}
		}
    }
	
	function delete_product(){
        $id=$this->input->post('id');
        $this->db->where('id', $id);
        $result=$this->db->delete('products');
        return $result;
    }
   
}

?>