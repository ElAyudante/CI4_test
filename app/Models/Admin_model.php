<?php 
namespace App\Models; 
use Kenjis\CI3Compatible\Core\CI_Model; 




class Admin_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }


    public function update_user_rights($user_id, $is_admin, $is_moderator) {
        $data = array(
            'is_admin' => $is_admin,
            'is_moderator' => $is_moderator,
            'updated_bat' => date('Y-m-j H:i:s'),
            'updated_at' => $_SESSION['user_id'],
        );

        $this->db->where('id', $user_id);
        return $this->db->update('users', $data);
    }
}
