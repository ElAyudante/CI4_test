<?php 
namespace App\Controllers; 
use Kenjis\CI3Compatible\Core\CI_Controller; 
use App\Libraries\GroceryCrud;
use CodeIgniter\I18n\Time;

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
        $crud->where("(Colegiado IS NOT NULL)");


	    $output = $crud->render();
        $titulo = array('titulo' => 'Lista Colegiados (Admin)');

        $data = array_merge((array)$output, $titulo);


        echo view('templates/header_admin'); 
        echo view('itemCRUD/list', $data);
        echo view('templates/footer');
    
   }
   public function create_documentos()
   {
      echo view('templates/header_admin');
      echo view('App\Views\pages\alta_documentos_prueba');
      echo view('templates/footer');   
   }

   public function crear_convenio(){
    echo view('templates/header_admin');
    echo view('App\Views\pages\alta_convenio');
    echo view('templates/footer');
   }

   public function listar_documentos(){

        $crud = new GroceryCrud();
        $crud->setTable('documentos');
        $crud->setSubject('Documento', 'Documentos');
        $crud->columns(['Nombre', 'descripcion', 'Publico', 'Archivo']);

        $crud->unsetBootstrap();

        $output = $crud->render();

        echo view('templates/header_admin'); 
        echo view('App\Views\pages\lista_documentos',(array)$output);
        echo view('templates/footer');
   }

   public function listar_convenios(){

    $crud = new GroceryCrud();

    $crud->setTable('convenios');
    $crud->setSubject('Convenio', 'Convenios');
    $crud->columns(['empresa','codigo','descripcion','web']);

    $crud->unsetBootstrap();
    $crud->unsetAdd();

    $output = $crud->render();
    $titulo = array('titulo' => 'Lista Convenios (Admin)');

    $data = array_merge((array)$output, $titulo);


    echo view('templates/header_admin'); 
    echo view('itemCRUD/list', $data);
    echo view('templates/footer');
   }

   public function cobros_pendientes(){

    $crud = new GroceryCrud();
    $crud->setTable('pagos_pendientes');
    $crud->setSubject('Pagos Pendientes', 'Pagos');
    $crud->columns(['Nombre', 'Apellidos', 'Transaccion', 'Cantidad', 'Estado']);

    $crud->unsetBootstrap();
    $crud->unsetEdit();
    $crud->where("pagos_pendientes.Estado = 'Pendiente'");

    $output = $crud->render();

    echo view('templates/header_admin'); 
    echo view('App\Views\pages\lista_documentos',(array)$output);
    echo view('templates/footer');
}

    public function cobros_realizados(){

        $crud = new GroceryCrud();
        $crud->setTable('pagos_pendientes');
        $crud->setSubject('Pagos Pendientes', 'Pagos');
        $crud->columns(['Nombre', 'Apellidos', 'Transaccion', 'Cantidad', 'Estado']);

        $crud->unsetBootstrap();
        $crud->unsetEdit();
        $crud->where("pagos_pendientes.Estado = 'Realizado'");

        $output = $crud->render();

        echo view('templates/header_admin'); 
        echo view('App\Views\pages\lista_documentos',(array)$output);
        echo view('templates/footer');
    }



   public function listar_documentos_usuarios(){

    $crud = new GroceryCrud();
    $crud->setTable('documentos');
    $crud->setSubject('Documento', 'Documentos');
    $crud->columns(['Nombre', 'Archivo']);

    $crud->where("documentos.Publico = '0'");


    $crud->unsetBootstrap();
    $crud->unsetDelete();
    $crud->unsetEdit();
    $crud->setActionButton('' ,'', function($row){
        return base_url().'/users/documentos/'.$row;
    });

    $output = $crud->render();

    echo view('templates/header_usuarios'); 
    echo view('App\Views\pages\usuarios\lista_documentos_usuarios',(array)$output);
    echo view('templates/footer');
}

    public function lista_colegiados_pending(){
        $crud = new GroceryCrud();

	    $crud->setTable('colegiados');
        $crud->setSubject('Colegiado', 'Colegiados');
        $crud->columns(['Colegiado','Nombre','Apellidos','NIF','Comunidad']);

        $crud->unsetBootstrap();
        $crud->where("(Colegiado IS NULL)");


	    $output = $crud->render();

        echo view('templates/header_admin'); 
        echo view('itemCRUD/list',(array)$output);
        echo view('templates/footer');
    }

   public function create_curso_evento()
   {
      echo view('templates/header_admin');
      echo view('App\Views\pages\alta_curso_evento');
      echo view('templates/footer');   
   }

   public function listar_cursos_CPLC(){
    
        $crud = new GroceryCrud();
        $crud->setTable('cursos_eventos');
        $crud->setSubject('Cursos CPLC', 'Cursos CPLC');
        $crud->columns(['Fecha', 'Nombre', 'Descripcion', 'Formato', 'Duracion', 'Dirigido', 'PrecioColegiado', 'PrecioNoColegiado']);

        $crud->unsetBootstrap();
        $crud->unsetAdd();
        $crud->where("cursos_eventos.Tipo = 'Curso CPLC'");

        $output = $crud->render();
        $titulo = array('titulo' => 'Lista Cursos CPLC (Admin)');

        $data = array_merge((array)$output, $titulo);
    
        echo view('templates/header_admin'); 
        echo view('itemCRUD/list', $data);
        echo view('templates/footer');
   }

   public function listar_cursos_ajenos(){
        
        $crud = new GroceryCrud();
        $crud->setTable('cursos_eventos');
        $crud->setSubject('Cursos Ajenos', 'Cursos Ajenos');
        $crud->columns(['Nombre', 'Descripcion', 'Fecha', 'Formato', 'Duracion', 'Dirigido', 'PrecioColegiado', 'PrecioNoColegiado']);

        $crud->unsetBootstrap();
        $crud->unsetAdd();
        $crud->where("cursos_eventos.Tipo = 'Curso Ajeno'");

        $output = $crud->render();
        $titulo = array('titulo' => 'Lista Cursos Ajenos (Admin)');

        $data = array_merge((array)$output, $titulo);


        echo view('templates/header_admin'); 
        echo view('itemCRUD/list', $data);
        echo view('templates/footer');
    }

    public function listar_eventos(){
        
        $crud = new GroceryCrud();
        $crud->setTable('cursos_eventos');
        $crud->setSubject('Eventos', 'Eventos');
        $crud->columns(['Nombre', 'Descripcion', 'Fecha', 'Formato', 'Duracion', 'Dirigido', 'PrecioColegiado', 'PrecioNoColegiado']);

        $crud->unsetBootstrap();
        $crud->unsetAdd();
        $crud->where("cursos_eventos.Tipo = 'Evento'");

        $output = $crud->render();
        $titulo = array('titulo' => 'Lista Eventos (Admin)');

        $data = array_merge((array)$output, $titulo);


        echo view('templates/header_admin'); 
        echo view('itemCRUD/list', $data);
        echo view('templates/footer');
    }

    public function listar_ofertas(){

        $crud = new GroceryCrud();
        $crud->setTable('ofertas_empleo');
        $crud->setSubject('Oferta', 'Ofertas');
        $crud->columns(['Empresa', 'Lugar', 'Ofrece', 'Condiciones' , 'Contacto', 'Activo']);

        $crud->unsetBootstrap();

        $output = $crud->render();

        echo view('templates/header_admin'); 
        echo view('App\Views\pages\lista_ofertas',(array)$output);
        echo view('templates/footer');
    }

    public function listar_empleos_usuarios(){

        $crud = new GroceryCrud();
        $crud->setTable('ofertas_empleo');
        $crud->setSubject('Oferta', 'Ofertas');
        $crud->columns(['Empresa', 'Lugar', 'Ofrece', 'Condiciones' , 'Contacto']);

        $crud->where('Activo = 1');
        $crud->setActionButton('' ,'', function($row){
            return base_url().'/users/empleo/'.$row;
        });

        $crud->unsetBootstrap();
        $crud->unsetDelete();
        $crud->unsetEdit();

        $output = $crud->render();

        echo view('templates/header_usuarios'); 
        echo view('App\Views\pages\usuarios\lista_ofertas_usuarios',(array)$output);
        echo view('templates/footer');
    }

    public function listar_reclamaciones(){

        $crud = new GroceryCrud();
        $crud->setTable('reclamaciones');
        $crud->setSubject('Mis Reclamaciones', 'Mis Reclamaciones');
        $crud->columns(['Fecha', 'Asunto', 'Comentarios','MiRespuesta']);

        $value = $this->session->userdata('user');
        $email = $value['Email'];
        $crud->where("reclamaciones.Email='{$email}'");
        $crud->setActionButton('' ,'', function($row){
            return base_url().'/users/reclamaciones/'.$row;
        });

        $crud->unsetBootstrap();
        $crud->unsetDelete();
        $crud->unsetEdit();

        $output = $crud->render();

        echo view('templates/header_usuarios'); 
        echo view('App\Views\pages\usuarios\reclamaciones',(array)$output);
        echo view('templates/footer');
    }

    public function listar_reclamaciones_ADMIN(){

        $crud = new GroceryCrud();
        $crud->setTable('reclamaciones');
        $crud->setSubject('Reclamaciones', 'Reclamaciones');
        $crud->columns(['Fecha', 'Nombre', 'Apellidos', 'Asunto' , 'Comentarios', 'Estado']);

        $crud->unsetBootstrap();
        $crud->unsetEdit();
        $crud->unsetAdd();
        $crud->setActionButton('Responder', '', function ($row){
            return 'lista_reclamaciones/edit/'.$row;
        });

        $output = $crud->render();
        $titulo = array('titulo' => 'Lista Reclamaciones (Admin)');

        $data = array_merge((array)$output, $titulo);
    
    
        echo view('templates/header_admin'); 
        echo view('itemCRUD/list', $data);
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


      echo view('templates/header_admin');
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
      echo view('templates/header_admin');
      echo view('itemCRUD/create');
      echo view('templates/footer');   
   }

   public function alta_nueva(){
    echo view('templates/header');
    echo view('itemCRUD/create_nuevo');
    echo view('templates/footer'); 
   }

   public function payment_advance(){
    echo view('templates/header');
    echo view('pages/payment_platform');
    echo view('templates/footer');
   }

   public function mis_datos(){
    echo view('templates/header_usuarios');
    echo view('App\Views\pages\usuarios\home');
    echo view('templates/footer');
   }

   public function pago_alta(){

        $error = false;
        $amount = false;

        if (isset($_GET['error']))
            $error = $_GET['error'];

        if (isset($_GET['amount']))
            $amount = $_GET['amount'];

        
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
    
    public function register_empleo(){

        echo view('templates/header_admin');
        echo view('pages/alta_oferta_prueba');
        echo view('templates/footer');

    }

    public function cambio_modalidad(){
        echo view('templates/header_usuarios');
        echo view('App\Views\pages\usuarios\cambio_modalidad');
        echo view('templates/footer');
    }

    public function store_documento(){

        $model = model(ItemCRUDModel::class);

        if ($this->request->getMethod() === 'post' && $this->validate([
            'nombre' => 'required|min_length[3]|max_length[255]',
            'publico'  => 'required',
        ])) {
            $model->insert_documento([
                'nombre' => $this->request->getPost('nombre'),
                'descripcion'  => $this->request->getPost('descripcion'),
                'publico'  => $this->request->getPost('publico'),
                'archivo'  => $this->request->getPost('archivo'),
            ]);
        }


        return $this->listar_documentos();
    }

    public function store_empleo(){

        $model = model(ItemCRUDModel::class);

        if ($this->request->getMethod() === 'post' && $this->validate([
            'empresa' => 'required|min_length[3]|max_length[255]',
            'lugar'  => 'required',
            'contacto'  => 'required',
        ])) {
            $model->insert_oferta([
                'empresa' => $this->request->getPost('empresa'),
                'lugar'  => $this->request->getPost('lugar'),
                'contacto'  => $this->request->getPost('contacto'),
                'ofrece'  => $this->request->getPost('ofrece'),
                'activo'  => $this->request->getPost('activo'),
                'condiciones'  => $this->request->getPost('condiciones'),
            ]);
        }


        return $this->listar_ofertas();
    }

    public function store_curso_evento(){

        $model = model(ItemCRUDModel::class);

        if ($this->request->getMethod() === 'post' && $this->validate([
            'nombre' => 'required|min_length[3]|max_length[255]',
            'descripcion'  => 'required|min_length[3]|max_length[500]',
            'fecha'  => 'required',
            'formato'  => 'required',
            'duracion'  => 'required',
            'texto1'  => 'max_length[500]',
            'texto2'  => 'max_length[500]',
            'texto3'  => 'max_length[500]',
            'texto4'  => 'max_length[500]',
            'texto5'  => 'max_length[500]',
            'texto6'  => 'max_length[500]',
            'titulo1' => 'max_length[255]',
            'titulo2' => 'max_length[255]',
            'titulo3' => 'max_length[255]',
            'titulo4' => 'max_length[255]',
            'titulo5' => 'max_length[255]',
            'titulo6' => 'max_length[255]'

        ])) {
            $model->insert_curso_evento([
                'nombre' => $this->request->getPost('nombre'),
                'descripcion'  => $this->request->getPost('descripcion'),
                'tipoCurso'  => $this->request->getPost('tipoCurso'),
                'fecha'  => $this->request->getPost('fecha'),
                'formato'  => $this->request->getPost('formato'),
                'duracion'  => $this->request->getPost('duracion'),
                'horarioInicio'  => $this->request->getPost('horarioInicio'),
                'horarioFin'  => $this->request->getPost('horarioFin'),
                'dirigido'  => $this->request->getPost('dirigido'),
                'precioColegiado'  => $this->request->getPost('precioColegiado'),
                'precioNoColegiado'  => $this->request->getPost('precioNoColegiado'),
                
            ]);

            $model->insert_contenido_curso([
                'titulo1'  => $this->request->getPost('titulo1'),
                'titulo2'  => $this->request->getPost('titulo2'),
                'titulo3'  => $this->request->getPost('titulo3'),
                'titulo4'  => $this->request->getPost('titulo4'),
                'titulo5'  => $this->request->getPost('titulo5'),
                'titulo6'  => $this->request->getPost('titulo6'),
                'texto1'  => $this->request->getPost('texto1'),
                'texto2'  => $this->request->getPost('texto2'),
                'texto3'  => $this->request->getPost('texto3'),
                'texto4'  => $this->request->getPost('texto4'),
                'texto5'  => $this->request->getPost('texto5'),
                'texto6'  => $this->request->getPost('texto6'),
            ]);
        }

        return redirect()->to(base_url('lista_cursos_CPLC'));

    }

    public function store_convenio(){

        $model = model(ItemCRUDModel::class);

        if ($this->request->getMethod() === 'post' && $this->validate([
            'empresa' => 'required|max_length[255]',
            'descripcion'  => 'max_length[500]',
            'codigo'  => 'max_length[255]',
            'web' => 'max_length[255]'
        ])) {
            $model->insert_convenio([
                'empresa' => $this->request->getPost('empresa'),
                'descripcion'  => $this->request->getPost('descripcion'),
                'codigo'  => $this->request->getPost('codigo'),
                'web'  => $this->request->getPost('web')
            ]);
        }

        return redirect()->to(base_url('lista_convenios'));
    }

    public function crear_reclamacion(){

        $model = model(ItemCRUDModel::class);

        if ($this->request->getMethod() === 'post' && $this->validate([
            'nombre' => 'required|min_length[3]|max_length[255]',
            'apellidos'  => 'required',
            'email' => 'required|valid_email',
            'telefono' => 'required|numeric|max_length[9]',
            'asunto'  => 'required',
            'comentarios'  => 'required'
        ])) {
            $model->insert_reclamacion([
                'nombre' => $this->request->getPost('nombre'),
                'apellidos'  => $this->request->getPost('apellidos'),
                'email' => $this->request->getPost('email'),
                'telefono' => $this->request->getPost('telefono'),
                'asunto'  => $this->request->getPost('asunto'),
                'comentarios'  => $this->request->getPost('comentarios')
            ]);
        }


        return $this->listar_reclamaciones();
    }


    public function mostrar_documento($id)
   {
       $item = $this->itemCRUD->find_documento($id);

       echo view('templates/header_usuarios');
       echo view('App\Views\pages\usuarios\ver_documento.php',array('item'=>$item));
       echo view('templates/footer');
   }

   public function mostrar_ofertas($id)
   {
       $item = $this->itemCRUD->find_empleo($id);

       echo view('templates/header_usuarios');
       echo view('App\Views\pages\usuarios\ver_oferta.php',array('item'=>$item));
       echo view('templates/footer');
   }

   public function mostrar_reclamaciones($id)
   {
       $item = $this->itemCRUD->find_reclamaciones($id);

       echo view('templates/header_usuarios');
       echo view('App\Views\pages\usuarios\ver_reclamaciones.php',array('item'=>$item));
       echo view('templates/footer');
   }

   public function nueva_reclamacion(){

    echo view('templates/header_usuarios');
    echo view('App\Views\pages\usuarios\nueva_reclamacion.php');
    echo view('templates/footer');
   }

   /**
    * Edit Data from this method.
    *
    * @return Response
   */
   public function edit($id)
   {
       $item = $this->itemCRUD->find_item($id);

       echo view('templates/header_admin');
       echo view('itemCRUD/edit',array('item'=>$item));
       echo view('templates/footer');
   }

   public function edit_pendiente($id)
   {
       $item = $this->itemCRUD->find_item($id);

       echo view('templates/header_admin');
       echo view('itemCRUD/edit_pendiente',array('item'=>$item));
       echo view('templates/footer');
   }

   public function edit_empleo($id)
   {
       $item = $this->itemCRUD->find_empleo($id);

       echo view('templates/header_admin');
       echo view('pages/edit_empleo',array('item'=>$item));
       echo view('templates/footer');
   }
   public function edit_documento($id)
   {
       $item = $this->itemCRUD->find_documento($id);

       echo view('templates/header_admin');
       echo view('pages/edit_documento',array('item'=>$item));
       echo view('templates/footer');
   }
   public function edit_convenio($id)
   {
       $item = $this->itemCRUD->find_convenio($id);

       echo view('templates/header_admin');
       echo view('pages/edit_convenio',array('item'=>$item));
       echo view('templates/footer');
   }
   public function edit_reclamacion($id)
   {
       $item = $this->itemCRUD->find_reclamaciones($id);

       echo view('templates/header_admin');
       echo view('pages/edit_reclamacion',array('item'=>$item));
       echo view('templates/footer');
   }

   public function edit_cuotas(){

        $item = $this->itemCRUD->find_cuota();

        echo view('templates/header_admin');
        echo view('pages/edit_cuotas',array('item'=>$item));
        echo view('templates/footer');
   }

   public function edit_curso_evento($id)
   {
       $item = $this->itemCRUD->find_curso_evento($id);
       $item2 = $this->itemCRUD->find_contenido_curso($id);

       echo view('templates/header_admin');
       echo view('pages/edit_curso_evento',array('item'=>$item, 'item2'=>$item2));
       echo view('templates/footer');
   }


   /**
    * Update Data from this method.
    *
    * @return Response
   */
   public function update($id) {
        
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

    public function update_pendiente(){

        $id = $_POST['id'];

        $data = array(

			'Colegiado' => $this->input->post('colegiado'),
            'Usuario' => $this->input->post('nif'),
            'Pass' => 'temp'

		);

        $this->db->update('colegiados', $data, 'ID ='.$id);

        $data_pago = array(
            'Nombre'=>$this->input->post('nombre'),
            'Apellidos'=>$this->input->post('apellidos'),
            'Transaccion'=>'Cuota Alta',
            'Cantidad'=>$this->db->get_where('cuotas', array('ID' => '1')->row->Inscripcion),
            'Estado'=>'Pendiente',
        );

        $this->db->insert('pagos_pendientes', $data_pago);

        return redirect()->to(base_url('itemCRUD'));
    }

    public function update_empleo(){

        $id = $_POST['id'];

        $data = array(

			'Empresa' => $this->input->post('empresa'),
			'Lugar' => $this->input->post('lugar'),
			'Ofrece' => $this->input->post('ofrece'),
			'Condiciones' => $this->input->post('condiciones'),
			'Contacto' => $this->input->post('contacto'),
			'Activo' => $this->input->post('activo')
		);

        $this->db->update('ofertas_empleo', $data, 'ID ='.$id);
        return $this->listar_ofertas();
    }
    public function update_documento(){

        $id = $_POST['id'];

        $data = array(

			'Nombre' => $this->input->post('nombre'),
			'descripcion' => $this->input->post('descripcion'),
			'Publico' => $this->input->post('publico'),
			'Archivo' => $this->input->post('archivo')
		);

        $this->db->update('documentos', $data, 'ID ='.$id);
        return $this->listar_documentos();
    }

    public function update_cuotas(){
        $data = array(
            'Jubilados' => $this->input->post('jubilados'),
            'Estudiantes' => $this->input->post('estudiantes'),
            'Inscripcion' => $this->input->post('inscripcion'),
            'Ordinaria' => $this->input->post('ejerciente'),
            'NoEjerciente' => $this->input->post('noEjerciente')
        );

        $this->db->update('cuotas', $data, 'Id = 1');

        return redirect()->to(base_url('edit_cuotas'));
    }

    public function update_convenio(){

        $id = $_POST['id'];

        $data = array(

			'empresa' => $this->input->post('empresa'),
			'descripcion' => $this->input->post('descripcion'),
			'codigo' => $this->input->post('codigo'),
			'web' => $this->input->post('web')
		);

        $this->db->update('convenios', $data, 'id ='.$id);
        return redirect()->to(base_url('lista_convenios'));
    }

    public function update_curso_evento(){

        $id = $_POST['id'];

        $data = array(

			'Nombre' => $this->input->post('nombre'),
            'Descripcion'  => $this->input->post('descripcion'),
            'Tipo'  => $this->input->post('tipoCurso'),
            'Fecha'  => $this->input->post('fecha'),
            'Formato'  => $this->input->post('formato'),
            'Duracion'  => $this->input->post('duracion'),
            'HorarioInicio'  => $this->input->post('horarioInicio'),
            'HorarioFin'  => $this->input->post('horarioFin'),
            'Dirigido'  => $this->input->post('dirigido'),
            'PrecioColegiado'  => $this->input->post('precioColegiado'),
            'PrecioNoColegiado'  => $this->input->post('precioNoColegiado')
		);

        $data_contenido = array(
			'Titulo1'  => $this->input->post('titulo1'),
            'Titulo2'  => $this->input->post('titulo2'),
            'Titulo3'  => $this->input->post('titulo3'),
            'Titulo4'  => $this->input->post('titulo4'),
            'Titulo5'  => $this->input->post('titulo5'),
            'Titulo6'  => $this->input->post('titulo6'),
            'Texto1'  => $this->input->post('texto1'),
            'Texto2'  => $this->input->post('texto2'),
            'Texto3'  => $this->input->post('texto3'),
            'Texto4'  => $this->input->post('texto4'),
            'Texto5'  => $this->input->post('texto5'),
            'Texto6'  => $this->input->post('texto6'),
		);

        $this->db->update('cursos_eventos', $data, 'id ='.$id);
        $this->db->update('contenido_cursos', $data_contenido, 'id ='.$id);

        return redirect()->to(base_url('lista_cursos_CPLC'));
    }

    public function responder_reclamacion(){
        $id = $_POST['id'];

        $data = array(
            'MiRespuesta' =>$this->input->post('mirespuesta'),
            'Estado' => 'Resuelto/a',
        );

        $this->db->update('reclamaciones', $data, 'Id ='.$id);
        return redirect()->to(base_url('lista_reclamaciones'));
    }

   /**
    * Delete Data from this method.
    *
    * @return Response
   */
   public function delete($id)
   {
       $item = $this->itemCRUD->delete_item($id);

       return $this->listar_colegiados();
   }

   public function delete_empleo($id)
   {
        $this->itemCRUD->delete_empleo($id);

       return $this->listar_ofertas();
   }

   public function delete_documento($id)
   {
        $this->itemCRUD->delete_documento($id);

       return $this->listar_documentos();
   }
   public function delete_reclamacion($id)
   {
        $this->itemCRUD->delete_reclamacion($id);

       return $this->listar_reclamaciones_ADMIN();
   }

   public function delete_convenio($id)
   {
        $this->itemCRUD->delete_convenio($id);

       return $this->listar_convenios();
   }

   public function delete_curso_CPLC($id)
   {
        $this->itemCRUD->delete_cursos_eventos($id);
        $this->itemCRUD->delete_contenido_cursos($id);

       return $this->listar_cursos_CPLC();
   }

   public function delete_curso_ajenos($id)
   {
        $this->itemCRUD->delete_cursos_eventos($id);
        $this->itemCRUD->delete_contenido_cursos($id);

       return $this->listar_cursos_ajenos();
   }

   public function delete_eventos($id)
   {
        $this->itemCRUD->delete_cursos_eventos($id);
        $this->itemCRUD->delete_contenido_cursos($id);

       return $this->listar_eventos();
   }


    private function _exampleOutput($output = null) {
        return view('itemCRUD/list', (array)$output);
    }
    private function _exampleOutput1($output = null) {
        return view('listar_ofertas', (array)$output);
    }

    //LOG IN
    public function index_login(){
		//load session library
		$this->load->library('session');
 
		//restrict users to go back to login if session has been set
		if($this->session->userdata('user')){
            $this->load->view('templates\header_usuarios');
            $this->load->view('App\Views\pages\itemCRUD\list');
            $this->load->view('templates\footer');
		}
		else{
            $this->load->view('templates\header');
			$this->load->view('App\Views\pages\usuarios\login');
            $this->load->view('templates\footer');
		}
	}

    
    public function index_admin_login(){
		//load session library
		$this->load->library('session');
 
		//restrict users to go back to login if session has been set
		if($this->session->userdata('admin')){
            $this->load->view('templates\header_usuarios');
            $this->load->view('App\Views\pages\itemCRUD\list');
            $this->load->view('templates\footer');
		}
		else{
            $this->load->view('templates\header');
			$this->load->view('App\Views\pages\admin');
            $this->load->view('templates\footer');
		}
	}
    

    
 
	public function login(){
		//load session library
		$this->load->library('session');
 
		$nif = $_POST['nif'];
		$password = $_POST['pass'];
 
		$data = $this->itemCRUD->login($nif, $password);
 
		if($data){
			$this->session->set_userdata('user', $data);
			$this->load->view('templates\header_usuarios');
            $this->load->view('App\Views\pages\usuarios\main_usuario');
            $this->load->view('templates\footer');
		}
		else{
			$this->load->view('templates\header');
            $this->load->view('App\Views\pages\usuarios\index_login');
            $this->load->view('templates\footer');
			$this->session->set_flashdata('error','Invalid login. User not found');
		} 
	}

    public function admin_login(){
		//load session library
		$this->load->library('session');
 
		$usuario = $_POST['usuario'];
		$password = $_POST['password'];
 
		$data = $this->itemCRUD->login_admin($usuario, $password);
 
		if($data){
			$this->session->set_userdata('admin', $data);
			$this->load->view('templates\header_admin');
            $this->load->view('App\Views\pages\main');
            $this->load->view('templates\footer');
		}
		else{
			$this->load->view('templates\header');
            $this->load->view('App\Views\pages\admin');
            $this->load->view('templates\footer');
			$this->session->set_flashdata('error','Invalid login. User not found');
		} 
	}
 
 
	public function home_login(){
		//load session library
		$this->load->library('session');
 
		//restrict users to go to home if not logged in
		if($this->session->userdata('user')){
            $this->load->view('templates\header_usuarios');
			$this->load->view('App\Views\pages\usuarios\main_usuario');
            $this->load->view('templates\footer');
		}
		else{
			if($this->session->userdata('user')){
                $this->load->view('templates\header_usuarios');
            } else {
                $this->load->view('templates\header');
            }
            
            $this->load->view('App\Views\pages\home');
            $this->load->view('templates\footer');
		}
	}

    public function home_admin_login(){
		//load session library
		$this->load->library('session');
 
		//restrict users to go to home if not logged in
		if($this->session->userdata('admin')){
            $this->lista_colegiados();
		}
		else{
            $this->load->view('templates\header');
            $this->load->view('App\Views\pages\home');
            $this->load->view('templates\footer');
		}
	}
 
	public function logout(){
		//load session library
		$this->load->library('session');
		$this->session->unset_userdata('user');
        
        if($this->session->userdata('user')){
            $this->load->view('templates\header_usuarios');
        } else {
            $this->load->view('templates\header');
        }
        
        $this->load->view('App\Views\pages\home');
        $this->load->view('templates\footer');
	}

    public function admin_logout(){
		//load session library
		$this->load->library('session');
		$this->session->unset_userdata('admin');
        
        if($this->session->userdata('admin')){
            $this->load->view('templates\header_admin');
        } else {
            $this->load->view('templates\header');
        }
        
        $this->load->view('App\Views\pages\home');
        $this->load->view('templates\footer');
	}
}
