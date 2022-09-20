<?php 
namespace App\Controllers; 
use Kenjis\CI3Compatible\Core\CI_Controller; 
use App\Libraries\GroceryCrud;


class ItemCRUD extends CI_Controller {


   public $itemCRUD;


   /**
    * Get All Data from this method.
    *
    * @return Response
   */
   public function __construct() {

      parent::__construct(); 
    
      $CI =&  get_instance();
      $CI->load->helper(array('form', 'url'));
      
      $CI->load->library('form_validation');  
      $CI->load->library('session');
      $encrypter = \Config\Services::encrypter();
      $CI->load->model('ItemCRUDModel');
      $CI->load->library('pagination');

      $this->itemCRUD = new \App\Models\ItemCRUDModel;
   }


   /**
    * Display Data this method.
    *
    * @return Response
   */
   public function lista_colegiados()
   {
	    $crud = new GroceryCrud();

	    $crud->setTable('colegiados');
        $crud->setSubject('Colegiado', 'Colegiados');
        $crud->columns(['Colegiado','Nombre','Apellidos','NIF','Comunidad']);

        $crud->unsetBootstrap();

	    $output = $crud->render();

        echo view('templates/header'); 
        echo view('itemCRUD/list',(array)$output);
        echo view('templates/footer');
    
   }
   public function create_documentos()
   {
      echo view('templates/header');
      echo view('App\Views\pages\alta_documentos_prueba');
      echo view('templates/footer');   
   }

   public function listar_documentos(){

        $crud = new GroceryCrud();
        $crud->setTable('documentos');
        $crud->setSubject('Documento', 'Documentos');
        $crud->columns(['Nombre', 'Archivo']);

        $output = $crud->render();

        echo view('templates/header'); 
        echo view('App\Views\pages\lista_documentos',(array)$output);
        echo view('templates/footer');
   }

   public function index_sociedades()
   {
       $data['data'] = $this->itemCRUD->get_itemCRUDsociedades();

       echo view('templates/header');       
       echo view('itemCRUD/list_sociedades',$data);
       echo view('templates/footer');
   }


   /**
    * Show Details this method.
    *
    * @return Response
   */
   public function show($id)
   {
      $item = $this->itemCRUD->find_item($id);


      echo view('templates/header');
      echo view('itemCRUD/show',array('item'=>$item));
      echo view('templates/footer');
   }


   /**
    * Create from display on this method.
    *
    * @return Response
   */
   public function create()
   {
      echo view('templates/header');
      echo view('itemCRUD/create');
      echo view('templates/footer');   
   }


   /**
    * Store Data from this method.
    *
    * @return Response
   */
   public function store() {

    
    $this->form_validation->set_rules('fecha_alta', 'FechaAlta', 'required');
    $this->form_validation->set_rules('nombre', 'Nombre', 'required');
    $this->form_validation->set_rules('apellidos', 'Apellidos', 'required');
    $this->form_validation->set_rules('nif', 'NIF', 'required|alpha_numeric');
    $this->form_validation->set_rules('usuario', 'Usuario', 'required|is_unique[colegiados.usuario]');
    $this->form_validation->set_rules('pass', 'Pass', 'required');
    $this->form_validation->set_rules('confirm_pass', 'Confirmpass', 'required|matches[pass]');
    $this->form_validation->set_rules('direccion', 'Direccion', 'required');
    $this->form_validation->set_rules('localidad', 'Localidad', 'required');
    $this->form_validation->set_rules('cp', 'CP', 'required|numeric');
    $this->form_validation->set_rules('provincia', 'Provincia', 'required');
    $this->form_validation->set_rules('comunidad', 'Comunidad', 'required');
    $this->form_validation->set_rules('telefono', 'Telefono', 'required|max_length[12]');
    $this->form_validation->set_rules('movil', 'Movil', 'max_length[12]');
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[colegiados.email]');
    $this->form_validation->set_rules('lugarnacimiento', 'Lugarnacimiento', 'required');
    $this->form_validation->set_rules('fechanacimiento', 'Fechanacimiento', 'required');
    $this->form_validation->set_rules('cuentabancaria', 'Cuenta', 'required|numeric|max_length[24]');
    $this->form_validation->set_rules('colegiado', 'Colegiado', 'required');
    $this->form_validation->set_rules('caducidadcarnet', 'CaducidadCarnet', 'required');
    $this->form_validation->set_rules('ejerciente', 'Ejerciente', 'required');
    $this->form_validation->set_rules('titulacion', 'Titulacion', 'required');
    $this->form_validation->set_rules('solicitahabilitacion', 'Solicitahabilitacion', 'required');
    $this->form_validation->set_rules('diplomaturalogopedia', 'Diplomaturalogopedia', 'required');
    $this->form_validation->set_rules('altabolsatrabajo', 'Altabolsatrabajo', 'required');
    $this->form_validation->set_rules('inscripcion', 'Inscripcion', 'required');
    $this->form_validation->set_rules('publicidad', 'Publicidad', 'required');
    $this->form_validation->set_rules('bienvenida', 'Bienvenida', 'required');
    $this->form_validation->set_rules('activo', 'Activo', 'required');


       if ($this->form_validation->run() == FALSE){

           $this->session->set_flashdata('errors', validation_errors());
           return redirect()->to(base_url('itemCRUD/create'));

        } else {

            $this->itemCRUD->insert_item();
            return redirect()->to(base_url('itemCRUD'));

        }
    }


   /**
    * Edit Data from this method.
    *
    * @return Response
   */
   public function edit($id)
   {
       $item = $this->itemCRUD->find_item($id);

       echo view('templates/header');
       echo view('itemCRUD/edit',array('item'=>$item));
       echo view('templates/footer');
   }


   /**
    * Update Data from this method.
    *
    * @return Response
   */
   public function update($id) {
        //error_reporting(E_ALL);
        //ini_set("display_errors",true);


       //var_dump($this->form_validation);
        //exit();
        
        $this->form_validation->set_rules('email', 'Email', 'valid_email');
        $this->form_validation->set_rules('cuentabancaria', 'Cuentabancaria', 'trim');

        if ($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('errors', validation_errors());
            return redirect()->to(base_url('itemCRUD/edit/'.$id));
        }else{ 
          $this->itemCRUD->update_item($id);
          return redirect()->to(base_url('itemCRUD'));
        }

    }


   /**
    * Delete Data from this method.
    *
    * @return Response
   */
   public function delete($id)
   {
       $item = $this->itemCRUD->delete_item($id);

       return redirect()->to(base_url('pages/lista_colegiados'));
   }

   private function _exampleOutput($output = null) {
        return view('itemCRUD/list', (array)$output);
    }
}
