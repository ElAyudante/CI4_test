<?php 
namespace App\Controllers; 
use Kenjis\CI3Compatible\Core\CI_Controller; 
use App\Libraries\GroceryCrud;
use CodeIgniter\I18n\Time;
use App\Controllers\api\fpdf\fpdf;
use App\Controllers\PDF_Label;

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
      $this->load->helper('download');
      $this->load->library('email'); 

      $this->itemCRUD = new \App\Models\ItemCRUDModel;

      
   }


   public function mandar_correo($database){

    $this->load->library('email');  
    $config['protocol']    = 'smtp';
    $config['smtp_host']    = '';
    $config['smtp_port']    = '';
    $config['smtp_timeout'] = '';
    $config['smtp_user']    = '';
    $config['smtp_pass']    = '';
    $config['charset']    = 'utf-8';
    $config['newline']    = "\r\n";
    $config['mailtype'] = 'html';

    $this->email->initialize($config);

    $correo = $this->db->get($database)->result_array();
    $arrayCorreo = array();
    foreach($correo as $direccion){
        $arrayCorreo[] = $direccion['Email'];
    }

    $this->email->from('');
    $this->email->to($arrayCorreo);

    $this->email->subject('Email Test');
    $this->email->message('Testing the email class.');
    
    if($this->email->send()){
        echo $this->email->print_debugger(); 
    } else {
        echo $this->email->print_debugger();
    }

    
    
   }


   /**
    * Display Data this method.
    *
    * @return Response
   */
   public function lista_colegiados()
   {

        $query = $this->db->query("SELECT Nombre, Apellidos, Provincia, Localidad, Direccion, CP FROM colegiados ORDER BY Nombre ASC");
        $colegiados['Colegiados'] = $query->result_array();

	    $crud = new GroceryCrud();

	    $crud->setTable('colegiados');
        $crud->setSubject('Colegiado', 'Colegiados');
        $crud->columns(['Colegiado','Nombre','Apellidos','NIF','Comunidad', 'Ejerciente', 'Activo', 'Observaciones']);
        $crud->unsetAdd();

        $crud->callbackColumn(
            'Ejerciente', function($value){
                switch($value){
                    case 0:
                        return $value = 'No Ejerciente';
                    case 1:
                        return $value = 'Ejerciente';
                    case 2: 
                        return $value = 'Jubilado';
                    case 3:
                        return $value = 'Estudiante';
                    default:
                        return $value = 'Sin Especificar';
                }
            }
        );
        $crud->callbackColumn(
            'Activo', function($value){
                switch($value){
                    case 1:
                        return $value = 'En Activo';
                    case 0:
                        return $value = 'Baja';
                    default:
                        return $value = 'Sin Especificar';
                }
            }
        );         

        $crud->unsetBootstrap();
        $crud->where("(Colegiado IS NOT NULL)");


	    $output = $crud->render();
        $titulo = array('titulo' => 'Lista Colegiados (Admin)');

        $data = array_merge((array)$output, $titulo, $colegiados);


        echo view('templates/header_admin'); 
        echo view('itemCRUD/list', $data);
        echo view('templates/footer');
    
   }

   public function lista_cambios_modalidad(){

        $crud = new GroceryCrud();

        $crud->setTable('cambio_modalidad');
        $crud->setSubject('Cambios', 'Cambio');
        $crud->columns(['NumColegiado','Nombre','Apellidos','Modalidad', 'ModalidadCambio', 'Adjunto']);

        $crud->displayAs(array(
            'NumColegiado' => 'Numero',
            'Modalidad' => 'Actual',
            'ModalidadCambio' => 'Solicitada'
        ));
        $crud->setActionButton('Aceptar' ,'', function($row, $value){
            return base_url().'/itemCRUD/admin/aceptar_cambio/'.$row . '/'. $value->NumColegiado;
        });
        $crud->unsetEdit();
        $crud->unsetBootstrap();
        $crud->unsetAdd();

        $output = $crud->render();

        $titulo = array('titulo' => 'Cambios de Modalidad Pendientes');
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
        $crud->unsetAdd();

        $crud->unsetBootstrap();

        $output = $crud->render();

        $titulo = array('titulo' => 'Lista Documentos (Admin)');
        $data = array_merge((array)$output, $titulo);

        echo view('templates/header_admin'); 
        echo view('itemCRUD/list', $data);
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
    $crud->columns(['NumColegiado', 'Nombre', 'Apellidos', 'Transaccion', 'Cantidad', 'Estado']);

    $crud->unsetBootstrap();
    $crud->unsetEdit();
    $crud->unsetAdd();
    $crud->where("pagos_pendientes.Estado = 'Pendiente'");

    $output = $crud->render();

    $titulo = array('titulo' => 'Cobros Pendientes (Admin)');
    $data = array_merge((array)$output, $titulo);

    echo view('templates/header_admin'); 
    echo view('itemCRUD/list', $data);
    echo view('templates/footer');
    }

    public function cobros_realizados(){

        $crud = new GroceryCrud();
        $crud->setTable('pagos_pendientes');
        $crud->setSubject('Pagos Pendientes', 'Pagos');
        $crud->columns(['Fecha', 'Nombre', 'Apellidos', 'Transaccion', 'Cantidad', 'Estado', 'Factura']);
        
        $crud->setActionButton('Generar Factura' ,'', function($row){
            return base_url().'/admin/factura/'.$row;
        });
        
        $crud->callbackColumn('Factura', function($value){
            return "<a href='" . base_url('files/facturas/download/'.$value) ."'>$value</a>";
        });
        
        $crud->unsetAdd();
        $crud->unsetBootstrap();
        $crud->unsetEdit();
        $crud->unsetDelete();
        $crud->where("pagos_pendientes.Estado = 'Pagado'");

        $output = $crud->render();

        $titulo = array('titulo' => 'Cobros Realizados (Admin)');
        $data = array_merge((array)$output, $titulo);

        echo view('templates/header_admin'); 
        echo view('itemCRUD/list', $data);
        echo view('templates/footer');
    }



   public function listar_documentos_usuarios(){

        $value = $_SESSION['user'];
        $data = $this->db->order_by('Fecha', 'DESC')->get_where('documentos', 'Publico = publico')->result_array();

        echo view('templates/header_usuarios'); 
        echo view('App\Views\pages\usuarios\lista_documentos_usuarios',array('data'=>$data));
        echo view('templates/footer');

    }

    public function lista_colegiados_pending(){
        $crud = new GroceryCrud();

	    $crud->setTable('colegiados');
        $crud->setSubject('Colegiado', 'Colegiados');
        $crud->columns(['Colegiado','Nombre','Apellidos','NIF','Comunidad', 'Trasladado']);
        $crud->displayAs('Trasladado', 'Traslado');
        $crud->unsetAdd();

        $crud->unsetBootstrap();
        $crud->where("(Colegiado IS NULL)");


	    $output = $crud->render();

        $titulo = array('titulo' => 'Lista Colegiados Pendiente (Admin)');
        $data = array_merge((array)$output, $titulo);

        echo view('templates/header_admin'); 
        echo view('itemCRUD/list',$data);
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
        $crud->columns(['Fecha', 'Nombre', 'Descripcion', 'Formato', 'PrecioColegiado', 'PrecioNoColegiado', 'Archivo']);

        $crud->displayAs(array(
            'PrecioColegiado' => 'Colegiado',
            'PrecioNoColegiado' => 'No Colegiado',
            'Archivo' => 'Portada'
        ));

        $crud->callbackColumn('Archivo', function($value){
            return "<a href='" . base_url('files/cursos/download/'.$value) ."'>$value</a>";
        });

        $crud->callbackColumn('Duracion', function($value){
            return $value . ' horas';
        });
        $crud->callbackColumn('PrecioColegiado', function($value){
            return $value . ' Euros';
        });
        $crud->callbackColumn('PrecioNoColegiado', function($value){
            return $value . ' Euros';
        });
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

   public function listar_inscripciones_cursos(){
        
    $crud = new GroceryCrud();
    $crud->setTable('inscripciones_cursos');
    $crud->setSubject('Inscripciones', 'Inscripciones');
    $crud->columns(['Fecha', 'NumColegiado', 'Nombre', 'Apellidos', 'NombreCurso', 'Modalidad', 'Importe', 'EstadoPago']);

    $crud->unsetBootstrap();
    $crud->unsetAdd();
    $crud->unsetEdit();
    $crud->unsetDelete();

    $output = $crud->render();

    $titulo = array('titulo' => 'Lista Inscripciones (Admin)');
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
        $crud->unsetAdd();
        $crud->unsetBootstrap();

        $output = $crud->render();

        $titulo = array('titulo' => 'Lista Ofertas (Admin)');
        $data = array_merge((array)$output, $titulo);

        echo view('templates/header_admin'); 
        echo view('itemCRUD/list', $data);
        echo view('templates/footer');
    }

    public function listar_empleos_usuarios(){

        $value = $_SESSION['user'];
        $data = $this->db->get_where('ofertas_empleo', 'Activo = 1')->result_array();

        echo view('templates/header_usuarios'); 
        echo view('App\Views\pages\usuarios\lista_ofertas_usuarios',array('data'=>$data));
        echo view('templates/footer');
    }

    public function listar_reclamaciones(){

        $value = $_SESSION['user'];
        $data = $this->itemCRUD->find_reclamaciones_usuario($value['Email']);

        echo view('templates/header_usuarios'); 
        echo view('App\Views\pages\usuarios\reclamaciones',array('data'=>$data));
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

    public function pagos_pendientes_usuarios(){

        $value = $_SESSION['user'];
        $data = $this->itemCRUD->find_pagos_usuario($value['Colegiado']);

        echo view('templates/header_usuarios');
        echo view('App\Views\pages\usuarios\pagos_pendientes', array('data' => $data));
        echo view('templates/footer');
    }

    public function facturas_usuarios(){

        $value = $_SESSION['user'];
        $data = $this->itemCRUD->find_factura($value['Colegiado']);

        echo view('templates/header_usuarios');
        echo view('App\Views\pages\usuarios\facturas_usuarios', array('data' => $data));
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

   public function tramitar_pago(){
    echo view('templates/header_usuarios');
    echo view('pages/payment_platform');
    echo view('templates/footer');
   }

   public function tramitar_pago_ok($id){

    $data['Id'] = $id;
    $data['Controller'] = $this;

    echo view('templates/header_usuarios');
    echo view('App\Views\pages\usuarios\tramitar_pago_ok',$data);
    echo view('templates/footer');
   }

   public function verificar_pago($id){

    $data = array(
        'Fecha' => date('Y-m-d'),
        'Estado' => 'Pagado'
    );
    return $this->db->update('pagos_pendientes', $data, 'Id ='.$id);
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

    
    public function register_empleo(){

        echo view('templates/header_admin');
        echo view('pages/alta_oferta_prueba');
        echo view('templates/footer');

    }

    public function cambio_modalidad(){

        $data = array(
            'textBoton' => 'Solicitar Cambio'
        );

        echo view('templates/header_usuarios');
        echo view('App\Views\pages\usuarios\cambio_modalidad', $data);
        echo view('templates/footer');
    }

    public function store_documento(){

        $targetDir = "./assets/uploads/files/documentos/";
        $fileName = basename($_FILES["archivo"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

        $allowTypes = array('jpg','png','jpeg','gif','pdf');
        if(in_array($fileType, $allowTypes)){
            // Upload file to server
            if(move_uploaded_file($_FILES["archivo"]["tmp_name"], $targetFilePath)){
                $data = array(

                    'Fecha' => date("Y-m-d H:i:s"),
                    'Nombre' => $this->input->post('nombre'),
                    'Descripcion' => $this->input->post('descripcion'),
                    'Publico' => $this->input->post('archivos'),
                    'Archivo' => $fileName
                );
            }
        }

		$this->db->insert('documentos', $data);

        return redirect()->to(base_url('documentos'));
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

        $targetDir = "./assets/uploads/files/cursos/";
        $fileName = basename($_FILES["archivo"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

        $allowTypes = array('jpg','png','jpeg','pdf');
        if(in_array($fileType, $allowTypes)){
            if(move_uploaded_file($_FILES["archivo"]["tmp_name"], $targetFilePath)){
                $imagen = array(
                    
                    'Archivo' => $fileName
                );
            }
        }

		$this->db->insert('cursos_eventos', $imagen);

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
            $this->itemCRUD->insert_reclamacion([
                'nombre' => $this->request->getPost('nombre'),
                'apellidos'  => $this->request->getPost('apellidos'),
                'email' => $this->request->getPost('email'),
                'telefono' => $this->request->getPost('telefono'),
                'asunto'  => $this->request->getPost('asunto'),
                'comentarios'  => $this->request->getPost('comentarios')
            ]);
        }


        return redirect()->to(base_url('users/reclamaciones'));
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
    $model = model(ItemCRUDModel::class);

    if ($this->request->getMethod() === 'post' && $this->validate([
        'nombre' => 'required|min_length[3]|max_length[255]',
        'apellidos'  => 'required',
        'nif'  => 'required',
        'email' => 'required',
        'telefono' => 'required',
        'lnacimiento' => 'required',
        'direccion' => 'required',
        'cp' => 'required',
        'localidad' => 'required',
        'provincia' => 'required',
        'comunidad' => 'required',
        'tlftrabajo' => 'required',
        'titulacion' => 'required'
        
    ])) {

        $model->update_admin([
            'fechaAlta' => $this->request->getPost('falta'),
            'numColegiado' => $this->request->getPost('ncolegiado'),
            'nombre' => $this->request->getPost('nombre'),
            'apellidos'  => $this->request->getPost('apellidos'),
            'nif'  => $this->request->getPost('nif'),
            'email'  => $this->request->getPost('email'),
            'telefono'  => $this->request->getPost('telefono'),
            'lnacimiento'  => $this->request->getPost('lnacimiento'),
            'fnacimiento'  => $this->request->getPost('fnacimiento'),
            'direccion'  => $this->request->getPost('direccion'),
            'cp'  => $this->request->getPost('cp'),
            'localidad'  => $this->request->getPost('localidad'),
            'comunidad'  => $this->request->getPost('comunidad'),
            'provincia'  => $this->request->getPost('provincia'),
            'cuenta'  => $this->request->getPost('cuenta'),
            'tlftrabajo'  => $this->request->getPost('tlftrabajo'),
            'lugtrabajo'  => $this->request->getPost('lugtrabajo'),
            'dtrabajo'  => $this->request->getPost('dtrabajo'),
            'loctrabajo'  => $this->request->getPost('loctrabajo'),
            'especialidad'  => $this->request->getPost('especialidad'),
            'ambito'  => $this->request->getPost('ambito'),
            'ejerciente' => $this->request->getPost('ejerciente'),
            'titulacion'  => $this->request->getPost('titulacion'),
            'colegioorigen'  => $this->request->getPost('colegioorigen'),
            'norigen'  => $this->request->getPost('norigen'),
            'sectores'  => $this->request->getPost('sectores'),
            'usuario' => $this->request->getPost('usuario'),
            'pass' => $this->request->getPost('pass'),
            'Id' => $this->request->getPost('Id')

        ]);

        return redirect()->to(base_url('itemCRUD'));
    } else {
        return redirect()->to(base_url('itemCRUD/edit/'.$item->Id));
    }
        
    }

    public function update_pendiente(){

        $id = $_POST['id'];

        $data = array(

			'Colegiado' => $this->input->post('colegiado'),
            'Usuario' => $this->input->post('nif'),
            'Pass' => 'temp'

		);

        $this->db->update('colegiados', $data, 'Id ='.$id);

        $data_pago = array(
            'NumColegiado'=>$this->input->post('colegiado'),
            'Nombre'=>$this->input->post('nombre'),
            'Apellidos'=>$this->input->post('apellidos'),
            'Transaccion'=>'Cuota Alta',
            'Cantidad'=>$this->input->post('importe'),
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

        $targetDir = "./assets/uploads/files/documentos/";
        $fileName = basename($_FILES["archivo"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

        $allowTypes = array('jpg','png','jpeg','gif','pdf');
        if(in_array($fileType, $allowTypes)){
            // Upload file to server
            if(move_uploaded_file($_FILES["archivo"]["tmp_name"], $targetFilePath)){
                $data = array(

                    'Archivo' => $fileName
                );
            }
        }

		$this->db->update('documentos', $data,  'ID ='.$id);

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

        $model = model(ItemCRUDModel::class);

        $targetDir = "./assets/uploads/files/cursos/";
        $fileName = basename($_FILES["archivo"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

        $allowTypes = array('jpg','png','jpeg','pdf');
        if(in_array($fileType, $allowTypes)){
            if(move_uploaded_file($_FILES["archivo"]["tmp_name"], $targetFilePath)){
                $imagen = array(
                    
                    'Archivo' => $fileName
                );
            }
        }

		$this->db->update('cursos_eventos', $imagen, 'id ='.$id);

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

    public function responder_reclamacion_usuario(){
        $id = $_POST['Id'];

        $data = array(
            'Comentarios' =>$this->input->post('comentarios'),
            'Estado' => 'Pendiente',
        );

        $this->db->update('reclamaciones', $data, 'Id ='.$id);
        return redirect()->to(base_url('users/reclamaciones'));
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

   public function delete_cobro_pendiente($id){

        $this->itemCRUD->delete_pago_pendiente($id);

        return $this->cobros_pendientes();
   }

   public function delete_cambio_modalidad($id){
        $this->itemCRUD->delete_cambio_modalidad($id);

        return $this->lista_cambios_modalidad();
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
            $this->load->view('App\Views\pages\usuarios\main_usuario');
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
            $this->load->view('templates\header_admin');
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

    public function download_documentos($id){
        $this->load->helper('download');

        $fileInfo = $id;

        $file = 'assets/uploads/files/documentos/' . $fileInfo;

        return $this->response->download($file, NULL);
    }

    public function download_facturas($id){
        $this->load->helper('download');

        $fileInfo = $id;

        $file = 'assets/uploads/files/facturas/' . $fileInfo;

        return $this->response->download($file, NULL);
    }

    public function download_cursos($id){
        $this->load->helper('download');

        $fileInfo = $id;

        $file = 'assets/uploads/files/cursos/' . $fileInfo;

        return $this->response->download($file, NULL);
    }

    public function test_tramitar_pago(){
        echo view('templates/header_usuarios');
        echo view('App\Views\pages\usuarios\tramitar_pago_ok');
        echo view('templates/footer');
    }

    public function siteMap(){
        echo view('templates/header');
        echo view('pages/siteMap');
        echo view('templates/footer');
    }

    public function generar_factura($id){

        $data = $this->db->get_where('pagos_pendientes', 'ID = '. $id)->row();
        

        echo view('templates/header_admin');
        echo view('App\Views\pages\alta_factura', array('data' => $data));
        echo view('templates/footer');
    }

    public function store_factura(){

        $id = $_POST['id'];
        $targetDir = "./assets/uploads/files/facturas/";
        $fileName = basename($_FILES["archivo"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

        $allowTypes = array('jpg','png','jpeg','gif','pdf');
        if(in_array($fileType, $allowTypes)){
            // Upload file to server
            if(move_uploaded_file($_FILES["archivo"]["tmp_name"], $targetFilePath)){
                $data = array(

                    'Factura' => $fileName
                );
            }
        }

		$this->db->update('pagos_pendientes', $data, 'ID ='. $id );

        return redirect()->to(base_url('cobros_realizados'));
    }

    public function tramitar_baja(){
        
        $datos = $_SESSION['user'];
        $id = $datos['Id'];

        $this->itemCRUD->delete_item($id);

        return $this->logout();
    }

    public function tramitar_cambio_modalidad(){

        $textBoton = array(
            'textBoton' => 'Cambio Solicitado'
        );

        $modalidad = $_POST['ejerciente'];
        $usuario = $_SESSION['user'];
        
        $modalidadActual = '';
        switch($usuario['Ejerciente']){
            case 0:
                $modalidadActual = 'No Ejerciente';
                break;
            case 1: 
                $modalidadActual = 'Ejerciente';
                break;
            case 2:
                $modalidadActual = 'Jubilado';
                break;
            case 3:
                $modalidadActual = 'Estudiante';
                break;
        };

        $modalidadCambio = '';
        switch($this->input->post('ejerciente')){
            case 0:
                $modalidadCambio = 'No Ejerciente';
                break;
            case 1: 
                $modalidadCambio = 'Ejerciente';
                break;
            case 2:
                $modalidadCambio = 'Jubilado';
                break;
            case 3:
                $modalidadCambio = 'Estudiante';
                break;
        };

        $data = array(
            'NumColegiado' => $usuario['Colegiado'],
            'Nombre' => $usuario['Nombre'],
            'Apellidos' => $usuario['Apellidos'],
            'Modalidad' => $modalidadActual,
            'ModalidadCambio' => $modalidadCambio
        );

        $this->db->insert('cambio_modalidad', $data);

        echo view('templates/header_usuarios');
        echo view('App\Views\pages\usuarios\cambio_modalidad', $textBoton);
        echo view('templates/footer');

    }

    public function listar_convenios_usuarios(){
        
        
        $data = $this->db->get('convenios')->result_array();

        echo view('templates/header_usuarios');
        echo view('App\Views\pages\usuarios\convenios', array('data' => $data));
        echo view('templates/footer');    

    }

    public function listar_cursos_usuarios(){
        $data = $this->db->get('cursos_eventos')->result_array();

        echo view('templates/header_usuarios');
        echo view('App\Views\pages\usuarios\cursos', array('data' => $data));
        echo view('templates/footer');   
    }

    public function listar_cursos_publico(){
        $data = $this->db->get('cursos_eventos')->result_array();

        if($this->session->userdata('user')){
            echo view('templates/header_usuarios');
        }elseif($this->session->userdata('admin')){
            echo view('templates/header_admin');
        } else {
            echo view('templates/header');
        }
        echo view('App\Views\pages\formacion', array('data' => $data));
        echo view('templates/footer');   
    }

    public function mostrar_cursos_publico($id){
        $data = array(
            'curso' => $this->db->get_where('cursos_eventos', 'Id ='.$id)->row(),
            'detalles' => $this->db->get_where('contenido_cursos', 'Id ='. $id)->row()
        );
        
        if($this->session->userdata('user')){
            echo view('templates/header_usuarios');
        }elseif($this->session->userdata('admin')){
            echo view('templates/header_admin');
        } else {
            echo view('templates/header');
        }
        
        echo view('App\Views\pages\formacion_detalle',$data);
        echo view('templates/footer');  
    }

    public function registro_curso_publico($id){
        

        $data = array(
            'curso' => $this->db->get_where('cursos_eventos', 'Id ='.$id)->row()
        );

        if($this->session->userdata('user')){
            echo view('templates/header_usuarios');
        }elseif($this->session->userdata('admin')){
            echo view('templates/header_admin');
        } else {
            echo view('templates/header');
        }
        echo view('App\Views\pages\registro_curso_publico',$data);
        echo view('templates/footer');  
    }

    public function tramitar_alta_nueva(){

        $model = model(ItemCRUDModel::class);

        if ($this->request->getMethod() === 'post' && $this->validate([
            'nombre' => 'required|min_length[3]|max_length[255]',
            'apellidos'  => 'required',
            'nif'  => 'required',
            'email' => 'required',
            'telefono' => 'required',
            'lnacimiento' => 'required',
            'direccion' => 'required',
            'cp' => 'required',
            'localidad' => 'required',
            'provincia' => 'required',
            'comunidad' => 'required',
            'tlftrabajo' => 'required',
            'titulacion' => 'required'
            
        ])) {

            $targetDir = "./assets/uploads/files/";
            $fileNameFoto = basename($_FILES["foto"]["name"]);
            $fileNameDNI = basename($_FILES['foto_dni']['name']);
            $fileNameTitulo = basename($_FILES['foto_titulo']['name']);
            $fileNameJustificante = basename($_FILES['foto_justificante']['name']);

            $targetFilePath = $targetDir . $fileNameFoto;
            $targetFilePathDNI = $targetDir . $fileNameDNI;
            $targetFilePathTitulo = $targetDir . $fileNameTitulo;
            $targetFilePathJustificante = $targetDir . $fileNameJustificante;

            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
            $fileTypeDNI = pathinfo($targetFilePathDNI,PATHINFO_EXTENSION);
            $fileTypeTitulo = pathinfo($targetFilePathTitulo,PATHINFO_EXTENSION);
            $fileTypeJustificante = pathinfo($targetFilePathJustificante,PATHINFO_EXTENSION);

            $allowTypes = array('jpg','png','jpeg','pdf');
            if(in_array($fileType, $allowTypes)){
                // Upload file to server
                if(move_uploaded_file($_FILES["foto"]["tmp_name"], $targetFilePath)){
                    $data = array(

                        'Foto' => $fileNameFoto
                    );
                }
            }
            if(in_array($fileTypeDNI, $allowTypes)){
                // Upload file to server
                if(move_uploaded_file($_FILES["foto_dni"]["tmp_name"], $targetFilePathDNI)){
                    $data = array(
                        'DNI' => $this->input->post('nif'),
                        'Foto' => $fileNameFoto,
                        'FotoDNI' => $fileNameDNI
                    );
                }
            }
            if(in_array($fileTypeTitulo, $allowTypes)){
                // Upload file to server
                if(move_uploaded_file($_FILES["foto_titulo"]["tmp_name"], $targetFilePathTitulo)){
                    $data = array(
                        'DNI' => $this->input->post('nif'),
                        'Foto' => $fileNameFoto,
                        'FotoDNI' => $fileNameDNI,
                        'FotoTitulo' => $fileNameTitulo
                    );
                }
            }
            if(in_array($fileTypeJustificante, $allowTypes)){
                // Upload file to server
                if(move_uploaded_file($_FILES["foto_justificante"]["tmp_name"], $targetFilePathJustificante)){
                    $data = array(
                        'DNI' => $this->input->post('nif'),
                        'Foto' => $fileNameFoto,
                        'FotoDNI' => $fileNameDNI,
                        'FotoTitulo' => $fileNameTitulo,
                        'FotoBaja' => $fileNameJustificante
                    );
                }
            }

            $this->db->insert('colegiados_adjunto', $data);

            $model->insert_item([
                'nombre' => $this->request->getPost('nombre'),
                'apellidos'  => $this->request->getPost('apellidos'),
                'nif'  => $this->request->getPost('nif'),
                'email'  => $this->request->getPost('email'),
                'telefono'  => $this->request->getPost('telefono'),
                'direccion'  => $this->request->getPost('direccion'),
                'cp'  => $this->request->getPost('cp'),
                'lnacimiento'  => $this->request->getPost('lnacimiento'),
                'fnacimiento'  => $this->request->getPost('fnacimiento'),
                'localidad'  => $this->request->getPost('localidad'),
                'comunidad'  => $this->request->getPost('comunidad'),
                'provincia'  => $this->request->getPost('provincia'),
                'cuenta'  => $this->request->getPost('cuenta'),
                'tlftrabajo'  => $this->request->getPost('tlftrabajo'),
                'lugtrabajo'  => $this->request->getPost('lugtrabajo'),
                'dtrabajo'  => $this->request->getPost('dtrabajo'),
                'loctrabajo'  => $this->request->getPost('loctrabajo'),
                'titulacion'  => $this->request->getPost('titulacion'),
                'especialidad'  => $this->request->getPost('especialidad'),
                'ambito'  => $this->request->getPost('ambito'),
                'ejerciente' => $this->request->getPost('ejerciente'),
                'colegioorigen'  => $this->request->getPost('colegioorigen'),
                'norigen'  => $this->request->getPost('norigen'),
                'sectores'  => $this->request->getPost('sectores'),
                'traslado' => $this->request->getPost('traslado'),
                'bolsa'  => $this->request->getPost('bolsa')

            ]);

            return redirect()->to(base_url('thank-you'));
        } else {
            return redirect()->to(base_url('home'));
        }
    }

    public function store_admin(){

        $model = model(ItemCRUDModel::class);

        if ($this->request->getMethod() === 'post' && $this->validate([
            'nombre' => 'required|min_length[3]|max_length[255]',
            'apellidos'  => 'required',
            'nif'  => 'required',
            'email' => 'required',
            'telefono' => 'required',
            'lnacimiento' => 'required',
            'direccion' => 'required',
            'cp' => 'required',
            'localidad' => 'required',
            'provincia' => 'required',
            'comunidad' => 'required',
            'tlftrabajo' => 'required',
            'titulacion' => 'required'
            
        ])) {
 
            $targetDir = "./assets/uploads/files/";
            $fileNameFoto = basename($_FILES["foto"]["name"]);
            $fileNameDNI = basename($_FILES['foto_dni']['name']);
            $fileNameTitulo = basename($_FILES['foto_titulo']['name']);
            $fileNameJustificante = basename($_FILES['foto_justificante']['name']);

            $targetFilePath = $targetDir . $fileNameFoto;
            $targetFilePathDNI = $targetDir . $fileNameDNI;
            $targetFilePathTitulo = $targetDir . $fileNameTitulo;
            $targetFilePathJustificante = $targetDir . $fileNameJustificante;

            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
            $fileTypeDNI = pathinfo($targetFilePathDNI,PATHINFO_EXTENSION);
            $fileTypeTitulo = pathinfo($targetFilePathTitulo,PATHINFO_EXTENSION);
            $fileTypeJustificante = pathinfo($targetFilePathJustificante,PATHINFO_EXTENSION);

            $allowTypes = array('jpg','png','jpeg','pdf');
            if(in_array($fileType, $allowTypes)){
                // Upload file to server
                if(move_uploaded_file($_FILES["foto"]["tmp_name"], $targetFilePath)){
                    $data = array(

                        'Foto' => $fileNameFoto
                    );
                }
            }
            if(in_array($fileTypeDNI, $allowTypes)){
                // Upload file to server
                if(move_uploaded_file($_FILES["foto_dni"]["tmp_name"], $targetFilePathDNI)){
                    $data = array(
                        'DNI' => $this->input->post('nif'),
                        'Foto' => $fileNameFoto,
                        'FotoDNI' => $fileNameDNI
                    );
                }
            }
            if(in_array($fileTypeTitulo, $allowTypes)){
                // Upload file to server
                if(move_uploaded_file($_FILES["foto_titulo"]["tmp_name"], $targetFilePathTitulo)){
                    $data = array(
                        'DNI' => $this->input->post('nif'),
                        'Foto' => $fileNameFoto,
                        'FotoDNI' => $fileNameDNI,
                        'FotoTitulo' => $fileNameTitulo
                    );
                }
            }
            if(in_array($fileTypeJustificante, $allowTypes)){
                // Upload file to server
                if(move_uploaded_file($_FILES["foto_justificante"]["tmp_name"], $targetFilePathJustificante)){
                    $data = array(
                        'DNI' => $this->input->post('nif'),
                        'Foto' => $fileNameFoto,
                        'FotoDNI' => $fileNameDNI,
                        'FotoTitulo' => $fileNameTitulo,
                        'FotoBaja' => $fileNameJustificante
                    );
                }
            }

            $this->db->insert('colegiados_adjunto', $data);


            $model->insert_item([
                'fechaAlta' => $this->request->getPost('fechaAlta'),
                'nombre' => $this->request->getPost('nombre'),
                'apellidos'  => $this->request->getPost('apellidos'),
                'nif'  => $this->request->getPost('nif'),
                'email'  => $this->request->getPost('email'),
                'telefono'  => $this->request->getPost('telefono'),
                'direccion'  => $this->request->getPost('direccion'),
                'cp'  => $this->request->getPost('cp'),
                'lnacimiento'  => $this->request->getPost('lnacimiento'),
                'fnacimiento'  => $this->request->getPost('fnacimiento'),
                'localidad'  => $this->request->getPost('localidad'),
                'comunidad'  => $this->request->getPost('comunidad'),
                'provincia'  => $this->request->getPost('provincia'),
                'cuenta'  => $this->request->getPost('cuenta'),
                'tlftrabajo'  => $this->request->getPost('tlftrabajo'),
                'lugtrabajo'  => $this->request->getPost('lugtrabajo'),
                'dtrabajo'  => $this->request->getPost('dtrabajo'),
                'loctrabajo'  => $this->request->getPost('loctrabajo'),
                'titulacion'  => $this->request->getPost('titulacion'),
                'especialidad'  => $this->request->getPost('especialidad'),
                'ambito'  => $this->request->getPost('ambito'),
                'colegioorigen'  => $this->request->getPost('colegioorigen'),
                'norigen'  => $this->request->getPost('norigen'),
                'sectores'  => $this->request->getPost('sectores'),
                'bolsa'  => $this->request->getPost('bolsa'),
                'ejerciente' => $this->request->getPost('ejerciente'),
                'observaciones' => $this->request->getPost('observaciones'),
            ]);

            return redirect()->to(base_url('itemCRUD'));
        } else {
            return redirect()->to(base_url('itemCRUD/create'));
        }
    }

    public function thank_you(){

        echo view('templates/header');
        echo view('App\Views\pages\thank-you');
        echo view('templates/footer');
    }

    public function home() {

        if($this->session->userdata('user')){
            echo view('templates/header_usuarios');
        }elseif($this->session->userdata('admin')){
            echo view('templates/header_admin');
        } else {
            echo view('templates/header');
        }
        echo view('App\Views\pages\home');
        echo view('templates/footer');
    }

    public function tramitar_pago_curso_usuario($id){

        $data['Id'] = $id;
        $data['Controller'] = $this;

    echo view('templates/header_usuarios');
    echo view('App\Views\pages\usuarios\tramitar_pago_curso_ok',$data);
    echo view('templates/footer');
    }

    public function registro_curso_usuario(){

        $curso = $this->db->get_where('cursos_eventos', 'Id =' .$_POST['idCurso'])->row_array();
        $nombreCurso = $curso['Nombre'];
        $modalidad = '';
        switch($_POST['ejerciente']){
            case 0:
                $modalidad = 'No Ejerciente';
                break;
            case 1: 
                $modalidad = 'Ejerciente';
                break;
            case 2:
                $modalidad = 'Jubilado';
                break;
            case 3:
                $modalidad = 'Estudiante';
                break;
        };

        $data = array(
            'Fecha' => date('Y-m-d'),
            'NumColegiado' => $_POST['numColegiado'],
            'Nombre' => $_POST['nombre'],
            'Apellidos' => $_POST['apellidos'],
            'NombreCurso' => $nombreCurso,
            'Modalidad' => $modalidad,
            'IdCurso' => $_POST['idCurso'],
            'Importe' => 'Gratis',
            'EstadoPago' => 'Gratis'
        );

        $this->db->insert('inscripciones_cursos', $data);

        echo view('templates/header_usuarios');
        echo view('App\Views\pages\usuarios\registro_curso_ok');
        echo view('templates/footer');
    }

    public function registro_curso_public(){


        $curso = $this->db->get_where('cursos_eventos', 'Id =' .$_POST['idCurso'])->row_array();
        $nombreCurso = $curso['Nombre'];
        $modalidad = 'No Colegiado';

        $data = array(
            'Fecha' => date('Y-m-d'),
            'NumColegiado' => '',
            'Nombre' => $_POST['nombre'],
            'Apellidos' => $_POST['apellidos'],
            'NombreCurso' => $nombreCurso,
            'Modalidad' => $modalidad,
            'IdCurso' => $_POST['idCurso'],
            'Importe' => 'Gratis',
            'EstadoPago' => 'Gratis'
        );

        $this->db->insert('inscripciones_cursos', $data);

        echo view('templates/header_usuarios');
        echo view('App\Views\pages\usuarios\registro_curso_ok');
        echo view('templates/footer');
    }

    public function verificar_pago_curso($id, $user){

        $curso = $this->db->get_where('cursos_eventos', 'Id =' .$id)->row_array();
        $nombreCurso = $curso['Nombre'];
        $modalidad = '';
        $precio = '';
        switch($user['Ejerciente']){
            case 3:
                $precio = $curso['PrecioEstudiante'];
                break;
            default:
                $precio = $curso['PrecioColegiado'];
            }
        switch($user['Ejerciente']){
            case 0:
                $modalidad = 'No Ejerciente';
                break;
            case 1: 
                $modalidad = 'Ejerciente';
                break;
            case 2:
                $modalidad = 'Jubilado';
                break;
            case 3:
                $modalidad = 'Estudiante';
                break;
        };

        $data = array(
            'Fecha' => date('Y-m-d'),
            'NumColegiado' => $user['Colegiado'],
            'Nombre' => $user['Nombre'],
            'Apellidos' => $user['Apellidos'],
            'NombreCurso' => $nombreCurso,
            'Modalidad' => $modalidad,
            'IdCurso' => $id,
            'Importe' => $precio,
            'EstadoPago' => 'Pagado'
        );

        return $this->db->insert('inscripciones_cursos', $data);
    }

    public function faq(){

        if($this->session->userdata('user')){
            echo view('templates/header_usuarios');
        }elseif($this->session->userdata('admin')){
            echo view('templates/header_admin');
        } else {
            echo view('templates/header');
        }
        echo view('App\Views\pages\faq');
        echo view('templates/footer');
    }

    public function juntagob(){

        if($this->session->userdata('user')){
            echo view('templates/header_usuarios');
        }elseif($this->session->userdata('admin')){
            echo view('templates/header_admin');
        } else {
            echo view('templates/header');
        }
        echo view('App\Views\pages\juntagob');
        echo view('templates/footer');
    }

    public function estatutos(){

        if($this->session->userdata('user')){
            echo view('templates/header_usuarios');
        }elseif($this->session->userdata('admin')){
            echo view('templates/header_admin');
        } else {
            echo view('templates/header');
        }
        echo view('App\Views\pages\estatutos');
        echo view('templates/footer');
    }

    public function codigo(){

        if($this->session->userdata('user')){
            echo view('templates/header_usuarios');
        }elseif($this->session->userdata('admin')){
            echo view('templates/header_admin');
        } else {
            echo view('templates/header');
        }
        echo view('App\Views\pages\codigo');
        echo view('templates/footer');
    }
    public function acuerdos(){

        if($this->session->userdata('user')){
            echo view('templates/header_usuarios');
        }elseif($this->session->userdata('admin')){
            echo view('templates/header_admin');
        } else {
            echo view('templates/header');
        }
        echo view('App\Views\pages\acuerdos');
        echo view('templates/footer');
    }

    public function privacidad(){

        if($this->session->userdata('user')){
            echo view('templates/header_usuarios');
        }elseif($this->session->userdata('admin')){
            echo view('templates/header_admin');
        } else {
            echo view('templates/header');
        }
        echo view('App\Views\pages\privacidad');
        echo view('templates/footer');
    }

    public function avisos(){

        if($this->session->userdata('user')){
            echo view('templates/header_usuarios');
        }elseif($this->session->userdata('admin')){
            echo view('templates/header_admin');
        } else {
            echo view('templates/header');
        }
        echo view('App\Views\pages\aviso');
        echo view('templates/footer');
    }

    public function cookies(){

        if($this->session->userdata('user')){
            echo view('templates/header_usuarios');
        }elseif($this->session->userdata('admin')){
            echo view('templates/header_admin');
        } else {
            echo view('templates/header');
        }
        echo view('App\Views\pages\cookies');
        echo view('templates/footer');
    }

    public function rat(){

        if($this->session->userdata('user')){
            echo view('templates/header_usuarios');
        }elseif($this->session->userdata('admin')){
            echo view('templates/header_admin');
        } else {
            echo view('templates/header');
        }
        echo view('App\Views\pages\rat');
        echo view('templates/footer');
    }

    public function otroscursos(){

        if($this->session->userdata('user')){
            echo view('templates/header_usuarios');
        }elseif($this->session->userdata('admin')){
            echo view('templates/header_admin');
        } else {
            echo view('templates/header');
        }
        echo view('App\Views\pages\otroscursos');
        echo view('templates/footer');
    }

    public function test_email(){
        echo view ('App\Views\pages\email_plantilla');
    }

    public function export_pdf(){

        $query = $this->db->query("SELECT Nombre, Apellidos, Provincia, Localidad, Direccion, CP FROM colegiados WHERE Ejerciente='1'");
        $colegiados = $query->result_array();

        require('PDF_Label.php');

        $pdf = new PDF_Label('L7163');

        $pdf->AddPage();

        // Print labels
        foreach($colegiados as $colegiado) {
            $text = sprintf("%s %s\n%s\n%s %s, %s", $colegiado['Nombre'], $colegiado['Apellidos'], $colegiado['Direccion'], $colegiado['CP'], $colegiado['Localidad'], $colegiado['Provincia']);
            $pdf->Add_Label($text);
        }

        $pdf->Output();
        exit;
    
    }

    public function bono_formacion() {
        
        if($this->session->userdata('user')){
            echo view('templates/header_usuarios');
        }elseif($this->session->userdata('admin')){
            echo view('templates/header_admin');
        } else {
            echo view('templates/header');
        }
        echo view('App\Views\pages\bono_formacion');
        echo view('templates/footer');
    }

    public function aceptar_cambio($id, $idColegiado){

        $datoCambio = $this->db->get_where('cambio_modalidad', 'Id ='.$id)->row();
        $cambio = NULL;
        switch($datoCambio->ModalidadCambio){
            case 'Ejerciente':
                $cambio = '1';
                break;
            case 'No Ejerciente':
                $cambio = '0';
                break;
            case 'Jubilado':
                $cambio = '2';
                break;
            case 'Estudiante':
                $cambio = '3';
                break;
        }

        $data = array(
            'Ejerciente' => $cambio
        );
        $this->db->update('colegiados', $data, 'Colegiado =' .$idColegiado);

        return $this->lista_cambios_modalidad();
    }
}