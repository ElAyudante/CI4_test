<?php 
namespace App\Controllers; 
use Kenjis\CI3Compatible\Core\CI_Controller; 

    
    class Pages extends CI_Controller{

        public function view($page = 'home'){
            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                //Mostrar página no existente
                show_404();
            }

            $data['title'] = ucfirst($page);

            if($this->session->userdata('user')){
                $this->load->view('templates\header_usuarios');
                
            } else if($this->session->userdata('admin')){
                $this->load->view('templates\header_admin');
            } else {
                $this->load->view('templates\header');
            }
            echo view('pages/'.$page, $data);
            echo view('templates/footer');
        }

	}        
