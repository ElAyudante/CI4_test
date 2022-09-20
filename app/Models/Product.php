<?php 
namespace App\Models; 
use Kenjis\CI3Compatible\Core\CI_Model; 

 
class Product extends CI_Model{ 
     
    public function __construct() { 
        parent::__construct();
        $this->load->database(); 
    } 
     
    /* 
     * Fetch products data from the database 
     * @param id returns a single record if specified, otherwise all records 
     */ 
    public function getRows($id = ''){ 
        $this->db->select('id,name,image,price'); 
        $this->db->from('products'); 
        if ($id) { 
            $this->db->where('id', $id); 
            $query = $this->db->get(); 
            $result = $query->row_array(); 
        } else { 
            $this->db->order_by('name', 'asc'); 
            $query = $this->db->get(); 
            $result = $query->result_array(); 
        } 
         
        // return fetched data 
        return !empty($result)?$result:false; 
    } 

    public function insertTransaction($data = array()) {
        $insert = $this->db->insert('payments', $data);
        return $insert ? true : false;
    }
     
}
