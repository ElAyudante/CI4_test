<?php 
namespace App\Models; 
use Kenjis\CI3Compatible\Core\CI_Model; 


class Email_model extends CI_Model {

    function display_records() {

        $query = $this->db->get("colegiados");
        return $query->result();
    }
}
