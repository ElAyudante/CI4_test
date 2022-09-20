<?php 
namespace App\Controllers; 
use Kenjis\CI3Compatible\Core\CI_Controller; 

    


    class Cursos extends CI_Controller {

        public function __construct(){
            
            parent::__construct();
            $this->load->helper('url_helper');
            $this->load->helper('form_helper');
            $this->load->library('form_validation');
            $this->load->library(array('session'));
            $this->load->model('curso_model');
        }

        public function index($slug = false) {

            $data = new stdClass();

            if ($slug === false) {

                $cursos = $this->curso_model->get_curso();
            }
        }
    }
