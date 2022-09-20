<?php 
namespace App\Models; 
use Kenjis\CI3Compatible\Core\CI_Model; 



class Curso_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('url'));
    }

    public function create_curso($titulo_curso, $sub_curso) {
        $data = array(
            'titulo_curso' => $titulo_curso,
            'slug' => strtolower(url_title($titulo_curso)),
            'sub_curso' => $sub_curso,
            'fecha_curso' => $fecha_curso,
            'lugar_curso' => $lugar_curso,
            'duracion_curso' => $duracion_curso,
            'horario_curso' => $horario_curso,
            'publico_curso' => $publico_curso,
            'precio_curso' => $precio_curso
        );

        return $this->db->insert('cursos', $data);
    }

    public function get_curso_id_from_curso_slug($slug) {
        $this->db->select('id');
        $this->db->from('cursos');
        $this->db->where('slug', $slug);

        return $this->db->get()->row('id');
    }

    public function get_cursos() {
        
        return $this->db->get('cursos')->result();
    }
} 
