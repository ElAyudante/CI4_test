<?php 
namespace App\Controllers; 
use Kenjis\CI3Compatible\Core\CI_Controller; 

    
    class Users extends CI_Controller{

        public function __construct(){
			parent::__construct();
			$this->load->helper('url_helper');
			$this->load->helper('form_helper');
			$this->load->library('form_validation');            
            $this->load->library('email');
			$this->load->library(array('session'));
            $this->load->model('user_model');
		}

        // Register user
        
		public function register(){
			
            $data = new stdClass();                       
            $this->load->helper('form');

			$this->form_validation->set_rules('name', 'Nombre', 'required');
			$this->form_validation->set_rules('nif', 'Nombre de Usuario', 'trim|alpha_numeric|min_length[4]');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
			$this->form_validation->set_rules('password', 'Contraseña', 'trim|required');
			$this->form_validation->set_rules('password2', 'Confirmar Contraseña', 'trim|required|matches[password]');

			if($this->form_validation->run() === false){
				echo view('templates/header');
				echo view('users/register', $data);
				echo view('templates/footer');
			} else {

                $username = $this->input->post('nif');
                $email = $this->input->post('email');
                $password = $this->input->post('password');
				// Encrypt password
				if($this->user_model->create_user($username, $email, $password)) {
                    
                    //user creation ok
                    echo view('templates/header');
                    echo view('users/login', $data);
                    echo view('templates/footer');

                } else {
                    
                    //user creation failed. It never happens.
                    $data->error = 'Ha habido un problema creando la cuenta. Inténtalo de nuevo,';

                    echo view('templates/header');
                    echo view('users/register', $data);
                    echo view('templates/footer');
                }
				
			}
		}

        public function register_formacion(){

            $data = new stdClass();

            $this->load->helper('form');
            
            $this->form_validation->set_rules('nombrecurso', 'Nombrecurso', 'required');
			$this->form_validation->set_rules('nombre', 'Nombre', 'required');
            $this->form_validation->set_rules('apellidos', 'Apellidos', 'required');
            $this->form_validation->set_rules('nif', 'NIF', 'required|alpha_numeric');
            $this->form_validation->set_rules('direccion', 'Direccion', 'required');
            $this->form_validation->set_rules('localidad', 'Localidad', 'required');
            $this->form_validation->set_rules('cp', 'CP', 'required|numeric');
            $this->form_validation->set_rules('provincia', 'Provincia', 'required');
            $this->form_validation->set_rules('telefono', 'Telefono', 'required|max_length[12]');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('titulacion', 'Titulacion', 'required');
            $this->form_validation->set_rules('ncolegiado', 'Ncolegiado', 'required');
            $this->form_validation->set_rules('colegio', 'Colegio', 'required');
            $this->form_validation->set_rules('ammount', 'Ammount', 'required');

			if($this->form_validation->run() === false){

				echo view('templates/header');
				echo view('pages/formacion_detalle', $data);
				echo view('templates/footer');

			} else {

                $nombrecurso = $this->input->post('nombrecurso');
                $nombre = $this->input->post('nombre');
                $apellidos = $this->input->post('apellidos');
                $nif = $this->input->post('nif');
                $direccion = $this->input->post('direccion');
                $localidad = $this->input->post('localidad');
                $cp = $this->input->post('cp');
                $provincia = $this->input->post('provincia');
                $telefono = $this->input->post('telefono');
                $email = $this->input->post('email');
                $ncolegiado = $this->input->post('ncolegiado');
                $colegio = $this->input->post('colegio');
                $ammount = $this->input->post('ammount');

                //llama a la funcion create_formacion() en user_model y si los datos concuerdan con los campos de la tabla, el registro sale adelante
				if($this->user_model->create_formacion($nombrecurso, $nombre, $apellidos, $nif, $direccion, $localidad, $cp, $provincia, $telefono, $email, $ncolegiado, $colegio, $ammount)) {
                    
                    $data->success = "Te has inscrito con éxito";

                    echo view('templates/header');
                    echo view('pages/previa_registro', $data);
                    echo view('templates/footer');

                } else {
                    
                    $data->error = "Ha habido un problema al inscribirte en el curso. Por favor, inténtalo de nuevo. Si el problema persiste contacta con el colegio.";

                    echo view('templates/header');
                    echo view('pages/formacion_detalle', $data);
                    echo view('templates/footer');
                }
				
			}
        }


        public function mostrar_formacion(){

            $data = new stdClass();
            
            $data['formacion_registro'] = $this->user_model->mostrar_formacion();

            echo view('templates/header');
            echo view('pages/previa_registro', $data);
            echo view('templates/footer');
        }

        public function register_colegiado() {

            $data = new stdClass();

            $this->load->helper('form');

            $this->form_validation->set_rules('falta', 'Falta', 'required');
            $this->form_validation->set_rules('nombre', 'Nombre', 'required');
            $this->form_validation->set_rules('apellidos', 'Apellidos', 'required');
            $this->form_validation->set_rules('nif', 'NIF', 'required|alpha_numeric');
            $this->form_validation->set_rules('direccion', 'Direccion', 'required');
            $this->form_validation->set_rules('localidad', 'Localidad', 'required');
            $this->form_validation->set_rules('cp', 'CP', 'required|numeric');
            $this->form_validation->set_rules('provincia', 'Provincia', 'required');
            $this->form_validation->set_rules('comunidad', 'Comunidad', 'required');
            $this->form_validation->set_rules('telefono', 'Telefono', 'required|max_length[12]');
            $this->form_validation->set_rules('movil', 'Movil', 'max_length[12]');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[colegiados.email]');
            $this->form_validation->set_rules('lnacimiento', 'Lnacimiento', 'required');
            $this->form_validation->set_rules('fnacimiento', 'Fnacimiento', 'required');
            $this->form_validation->set_rules('cuenta', 'Cuenta', 'required|numeric|max_length[24]');
            $this->form_validation->set_rules('tlftrabajo', 'Tlftrabajo');
            $this->form_validation->set_rules('lugtrabajo', 'Lugtrabajo');
            $this->form_validation->set_rules('dtrabajo', 'Dtrabajo');
            $this->form_validation->set_rules('loctrabajo', 'Loctrabajo');
            $this->form_validation->set_rules('ncolegiado', 'Ncolegiado', 'required');
            $this->form_validation->set_rules('fexpiracion', 'Fexpiracion', 'required');
            $this->form_validation->set_rules('ejerciente', 'Ejerciente', 'required');
            $this->form_validation->set_rules('titulacion', 'Titulacion', 'required');           
            $this->form_validation->set_rules('especialidad', 'Especialidad', 'required');
            $this->form_validation->set_rules('ambito', 'Ambito', 'required');
            $this->form_validation->set_rules('sector', 'Sector', 'required');
            $this->form_validation->set_rules('habitacion', 'Habitacion', 'required');
            $this->form_validation->set_rules('diplomado', 'Diplomado', 'required');
            $this->form_validation->set_rules('bolsa', 'Bolsa', 'required');
            $this->form_validation->set_rules('traslado', 'Traslado');
            $this->form_validation->set_rules('colegioorigen', 'Colegioorigen');
            $this->form_validation->set_rules('norigen', 'Norigen');
            $this->form_validation->set_rules('observacion', 'Observacion');
            $this->form_validation->set_rules('cuota', 'Cuota');
            $this->form_validation->set_rules('inscripcion', 'Inscripcion', 'required');
            $this->form_validation->set_rules('publicidad', 'Publicidad', 'required');
            $this->form_validation->set_rules('bienvenida', 'Bienvenida', 'required');
            $this->form_validation->set_rules('colegiadoactual', 'Colegiadoactual', 'required');

            if($this->form_validation->run() === false) {

                echo view('templates/header');
				echo view('pages/alta_colegiado', $data);
				echo view('templates/footer');

            } else {

                $falta = $this->input->post('falta');
                $nombre = $this->input->post('nombre');
                $apellidos = $this->input->post('apellidos');
                $nif = $this->input->post('nif');
                $direccion = $this->input->post('direccion');
                $localidad = $this->input->post('localidad');
                $cp = $this->input->post('cp');
                $provincia = $this->input->post('provincia');
                $comunidad = $this->input->post('comunidad');
                $telefono = $this->input->post('telefono');
                $movil = $this->input->post('movil');
                $email = $this->input->post('email');
                $lnacimiento = $this->input->post('lnacimiento');
                $fnacimiento = $this->input->post('fnacimiento');
                $cuenta = $this->input->post('cuenta');
                $tlftrabajo = $this->input->post('tlftrabajo');
                $lugtrabajo = $this->input->post('lugtrabajo');
                $dtrabajo = $this->input->post('dtrabajo');
                $loctrabajo = $this->input->post('loctrabajo');
                $ncolegiado = $this->input->post('ncolegiado');
                $fexpiracion = $this->input->post('fexpiracion');
                $ejerciente = $this->input->post('ejerciente');
                $titulacion = $this->input->post('titulacion');
                $especialidad = $this->input->post('especialidad');
                $ambito = $this->input->post('ambito');
                $sector = $this->input->post('sector');
                $habitacion = $this->input->post('habitacion');
                $diplomado = $this->input->post('diplomado');
                $bolsa = $this->input->post('bolsa');
                $traslado = $this->input->post('traslado');
                $colegioorigen = $this->input->post('colegioorigen');
                $norigen = $this->input->post('norigen');
                $observacion = $this->input->post('observacion');
                $cuota = $this->input->post('cuota');
                $inscripcion = $this->input->post('inscripcion');
                $publicidad = $this->input->post('publicidad');
                $bienvenida = $this->input->post('bienvenida');
                $colegiadoactual = $this->input->post('colegiadoactual');

                if($this->user_model->create_colegiado($nombre, $apellidos, $nif, $direccion, $localidad, $cp, $provincia, $comunidad, $telefono, $movil, $email, $lnacimiento, $fnacimiento, $cuenta, $tlftrabajo, $lugtrabajo, $dtrabajo, $loctrabajo, $ncolegiado, $ejerciente, $titulacion, $especialidad, $ambito, $sector, $habitacion, $diplomado, $bolsa, $traslado, $colegioorigen, $norigen, $observacion, $cuota, $inscripcion, $publicidad, $bienvenida, $colegiadoactual)) {

                    $data->success = "El colegiado se ha creado con éxito";

                    echo view('templates/header');
                    echo view('pages/alta_colegiado', $data);
                    echo view('templates/footer');

                } else {

                    $data->error = "Ha habido un problema registrando al colegiado. Por favor, inténtalo de nuevo. Si el problema persiste contacta con el desarrollador.";

                    echo view('templates/header');
                    echo view('pages/alta_colegiado', $data);
                    echo view('templates/footer');
                }
            }
        }

        public function edit_colegiado() {

            $id = $this->uri->segment(3);

            if (empty($id)) {

                echo view('errors/error404');
            }

            $this->load->helper('form');

            $this->form_validation->set_rules('falta', 'Falta', 'required');
            $this->form_validation->set_rules('nombre', 'Nombre', 'required');
            $this->form_validation->set_rules('apellidos', 'Apellidos', 'required');
            $this->form_validation->set_rules('nif', 'NIF', 'required|alpha_numeric');
            $this->form_validation->set_rules('direccion', 'Direccion', 'required');
            $this->form_validation->set_rules('localidad', 'Localidad', 'required');
            $this->form_validation->set_rules('cp', 'CP', 'required|numeric');
            $this->form_validation->set_rules('provincia', 'Provincia', 'required');
            $this->form_validation->set_rules('comunidad', 'Comunidad', 'required');
            $this->form_validation->set_rules('telefono', 'Telefono', 'required|max_length[12]');
            $this->form_validation->set_rules('movil', 'Movil', 'max_length[12]');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[colegiados.email]');
            $this->form_validation->set_rules('lnacimiento', 'Lnacimiento', 'required');
            $this->form_validation->set_rules('fnacimiento', 'Fnacimiento', 'required');
            $this->form_validation->set_rules('cuenta', 'Cuenta', 'required|numeric|max_length[24]');
            $this->form_validation->set_rules('tlftrabajo', 'Tlftrabajo');
            $this->form_validation->set_rules('lugtrabajo', 'Lugtrabajo');
            $this->form_validation->set_rules('dtrabajo', 'Dtrabajo');
            $this->form_validation->set_rules('loctrabajo', 'Loctrabajo');
            $this->form_validation->set_rules('ncolegiado', 'Ncolegiado', 'required');
            $this->form_validation->set_rules('fexpiracion', 'Fexpiracion', 'required');
            $this->form_validation->set_rules('ejerciente', 'Ejerciente', 'required');
            $this->form_validation->set_rules('titulacion', 'Titulacion', 'required');           
            $this->form_validation->set_rules('especialidad', 'Especialidad', 'required');
            $this->form_validation->set_rules('ambito', 'Ambito', 'required');
            $this->form_validation->set_rules('sector', 'Sector', 'required');
            $this->form_validation->set_rules('habitacion', 'Habitacion', 'required');
            $this->form_validation->set_rules('diplomado', 'Diplomado', 'required');
            $this->form_validation->set_rules('bolsa', 'Bolsa', 'required');
            $this->form_validation->set_rules('traslado', 'Traslado');
            $this->form_validation->set_rules('colegioorigen', 'Colegioorigen');
            $this->form_validation->set_rules('norigen', 'Norigen');
            $this->form_validation->set_rules('observacion', 'Observacion');
            $this->form_validation->set_rules('cuota', 'Cuota');
            $this->form_validation->set_rules('inscripcion', 'Inscripcion', 'required');
            $this->form_validation->set_rules('publicidad', 'Publicidad', 'required');
            $this->form_validation->set_rules('bienvenida', 'Bienvenida', 'required');
            $this->form_validation->set_rules('colegiadoactual', 'Colegiadoactual', 'required');

            if ($this->form_validation->run() === false) {

                echo view('templates/header');
                echo view('pages/edit_colegiado', $data);
                echo view('templates/footer');

            } else {
                


            }

        }

        public function register_sociedad(){

            $data = new stdClass;

            $this->load->helper('form');

            $colegiado = $this->form_validation->set_rules('colegiado', 'Colegiado', 'required');
            $sociedad = $this->form_validation->set_rules('sociedad', 'Sociedad', 'required');
            $nif = $this->form_validation->set_rules('nif', 'Nif', 'required|alpha_numeric');
            $direccion = $this->form_validation->set_rules('direccion', 'Direccion', 'required');
            $cp = $this->form_validation->set_rules('cp', 'Cp', 'required|numeric');
            $poblacion = $this->form_validation->set_rules('poblacion', 'Poblacion', 'required');
            $provincia = $this->form_validation->set_rules('provincia', 'Provincia', 'required');
            $telefono = $this->form_validation->set_rules('telefono', 'Telefono', 'required');
            $fax = $this->form_validation->set_rules('fax', 'Fax', 'required');
            $email = $this->form_validation->set_rules('email', 'Email', 'required');
            $registromercantil = $this->form_validation->set_rules('registromercantil', 'Registromercantil', 'required');
            $tiposociedad = $this->form_validation->set_rules('tiposociedad', 'Tiposociedad', 'required');
            $capitalsocial = $this->form_validation->set_rules('capitalsocial', 'Capitalsocial', 'required');
            $cuentabancaria = $this->form_validation->set_rules('cuentabancaria', 'Cuentabancaria', 'required');
            $fechaalta = $this->form_validation->set_rules('fechalta', 'Fechaalta');
            $ncolegiado = $this->form_validation->set_rules('ncolegiado', 'Ncolegiado');
            $nombre = $this->form_validation->set_rules('nombre', 'Nombre');
            $cargo = $this->form_validation->set_rules('cargo', 'Cargo');
            $participacion = $this->form_validation->set_rules('participacion', 'Participacion');
            $ncolegiadoe = $this->form_validation->set_rules('ncolegiadoe', 'Ncolegiadoe');
            $nombree = $this->form_validation->set_rules('nombree', 'Nombree');
            $dni = $this->form_validation->set_rules('dni', 'Dni', 'alpha_numeric');
            $nombreo = $this->form_validation->set_rules('nombreo', 'Nombreo');
            $cargoo = $this->form_validation->set_rules('cargoo', 'Cargoo');
            $participaciono = $this->form_validation->set_rules('participaciono', 'participaciono');

            if($this->form_validation->run() === false) {
                
                echo view('templates/header');
                echo view('pages/alta_sociedades_prueba', $data);
                echo view('templates/footer');

            } else {

                $colegiado = $this->input->post('colegiado');
                $sociedad = $this->input->post('sociedad');
                $nif = $this->input->post('nif');
                $direccion = $this->input->post('direccion');
                $cp = $this->input->post('cp');
                $poblacion = $this->input->post('poblacion');
                $provincia = $this->input->post('provincia');
                $telefono = $this->input->post('telefono');
                $fax = $this->input->post('fax');
                $email = $this->input->post('email');
                $registromercantil = $this->input->post('registromercantil');
                $tiposociedad = $this->input->post('tiposociedad');
                $capitalsocial = $this->input->post('capitalsocial');
                $cuentabancaria = $this->input->post('cuentabancaria');
                $fechaalta = $this->input->post('fechaalta');
                $ncolegiado = $this->input->post('ncolegiado');
                $nombre = $this->input->post('nombre');
                $cargo = $this->input->post('cargo');
                $participacion = $this->input->post('participacion');
                $ncolegiadoe = $this->input->post('ncolegiadoe');
                $nombree = $this->input->post('nombree');
                $dni = $this->input->post('dni');
                $nombreo = $this->input->post('nombreo');
                $cargoo = $this->input->post('cargoo');
                $participaciono = $this->input->post('participaciono');

                if($this->user_model->create_sociedad($colegiado, $sociedad, $nif, $direccion, $cp, $poblacion, $provincia, $telefono, $fax, $email, $registromercantil, $tiposociedad, $capitalsocial, $cuentabancaria, $fechaalta, $ncolegiado, $nombre, $cargo, $participacion, $ncolegiadoe, $nombree, $dni, $nombreo, $cargoo, $participaciono)) {
                    
                    $data->success = "El colegiado se ha creado con éxito";

                    echo view('templates/header');
                    echo view('pages/alta_sociedades', $data);
                    echo view('templates/footer');
                    

                } else {

                    $data->error = "Ha habido un problema registrando la sociedad. Por favor, inténtalo de nuevo. Si el problema persiste contacta con el desarrollador.";

                    echo view('templates/header');
                    echo view('pages/alta_sociedades', $data);
                    echo view('templates/footer');
                }

            } 
        }

        // Crear evento propio

        public function register_evento_propio(){

            $data = new stdClass();

            $this->load->helper('form');

            $evento = $this->form_validation->set_rules('evento', 'Evento', 'required');
            $descripcion = $this->form_validation->set_rules('descripcion', 'Descripcion', 'required');
            $archivo = $this->form_validation->set_rules('archivo', 'Archivo');
            $importecolegiados = $this->form_validation->set_rules('importecolegiados', 'Importecolegiados', 'required');
            $importenoejercientes = $this->form_validation->set_rules('importenoejercientes', 'Importenoejercientes', 'required');
            $importeasociaciones = $this->form_validation->set_rules('importeasociaciones', 'Importeasociaciones', 'required');
            $nocolegiados = $this->form_validation->set_rules('nocolegiados', 'Nocolegiados', 'required');
            $activo = $this->form_validation->set_rules('activo', 'Activo', 'required');

            if($this->form_validation->run() === false) {

                echo view('templates/header');
                echo view('pages/alta_evento_prueba', $data);
                echo view('templates/footer');

            } else {

                $evento = $this->input->post('evento');
                $descripcion = $this->input->post('descripcion');
                $archivo = $this->input->post('archivo', 'Archivo');
                $importecolegiados = $this->input->post('importecolegiados');
                $importenoejercientes = $this->input->post('importenoejercientes');
                $importeasociaciones = $this->input->post('importeasociaciones');
                $nocolegiados = $this->input->post('nocolegiados');
                $activo = $this->input->post('activo');

                if($this->user_model->create_evento_propio($evento, $descripcion, $archivo, $importecolegiados, $importenoejercientes, $importeasociaciones, $nocolegiados, $activo)) {

                    $data->success = "El evento se ha creado con éxito";

                    echo view('templates/header');
                    echo view('pages/alta_evento_prueba', $data);
                    echo view('templates/footer');

                } else {

                    $data->error = "Ha habido un problema registrando el evento. Por favor, inténtalo de nuevo. Si el problema persiste contacta con el desarrollador.";

                    echo view('templates/header');
                    echo view('pages/alta_evento_prueba', $data);
                    echo view('templates/footer');
                } 
            }
            
        }

        // Crear evento propio

        public function register_evento_ajeno(){

            $data = new stdClass();

            $this->load->helper('form');

            $evento = $this->form_validation->set_rules('evento', 'Evento', 'required');
            $descripcion = $this->form_validation->set_rules('descripcion', 'Descripcion', 'required');
            $archivo = $this->form_validation->set_rules('archivo', 'Archivo');
            $tipo = $this->form_validation->set_rules('tipo', 'Tipo', 'required');
            $activo = $this->form_validation->set_rules('activo', 'Activo', 'require');

            if($this->form_validation->run() === false) {

                echo view('templates/header');
                echo view('pages/alta_evento_prueba', $data);
                echo view('templates/footer');

            } else {

                $evento = $this->input->post('evento');
                $descripcion = $this->input->post('descripcion');
                $archivo = $this->input->post('archivo', 'Archivo');
                $tipo = $this->input->post('tipo');
                $activo = $this->input->post('activo');

                if($this->user_model->create_evento_propio($evento, $descripcion, $archivo, $tipo, $activo)) {

                    $data->success = "El evento se ha creado con éxito";

                    echo view('templates/header');
                    echo view('pages/alta_evento_prueba', $data);
                    echo view('templates/footer');

                } else {

                    $data->error = "Ha habido un problema registrando el evento. Por favor, inténtalo de nuevo. Si el problema persiste contacta con el desarrollador.";

                    echo view('templates/header');
                    echo view('pages/alta_evento_prueba', $data);
                    echo view('templates/footer');
                } 
            }
            
        }

        public function register_documento(){
            
            $data = new stdClass();

            $this->load->helper('form');

            $documento = $this->form_validation->set_rules('documento', 'Documento', 'required');
            $archivo = $this->form_validation->set_rules('archivo', 'Archivo', 'required');
            $publico = $this->form_validation->set_rules('publico', 'Publico', 'required');

            if($this->form_validation->run() === false) {
                
                echo view('templates/header');
                echo view('pages/alta_documentos_prueba', $data);
                echo view('templates/footer');

            } else {

                $documento = $this->input->post('documento');
                $adjunto = $this->input->post('archivo');
                $publico = $this->input->post('publico');

                if($this->user_model->create_documento($documento, $archivo, $publico)) {

                    $data->success = "El documento se ha creado con éxito." ;

                    echo view('templates/header');
                    echo view('pages/alta_documentos_prueba', $data);
                    echo view('templates/footer');

                } else {

                    $data->error = "Ha habido un problema creando el documento. Por favor, inténtalo de nuevo. Si el problema persiste contacta con el desarrollador.";

                    echo view('templates/header');
                    echo view('pages/alta_documentos_prueba', $data);
                    echo view('templates/footer');

                }
            }
        }


        public function register_empleo(){
            
            $data = new stdClass();

            $this->load->helper('form');

            $titulo = $this->form_validation->set_rules('titulo', 'Titulo', 'required');
            $descripcion = $this->form_validation->set_rules('descripcion', 'Descripcion', 'required');
            $activo = $this->form_validation->set_rules('activo', 'Activo', 'required');

            if($this->form_validation->run() === false) {
                
                echo view('templates/header');
                echo view('pages/alta_oferta_prueba', $data);
                echo view('templates/footer');

            } else {

                $titulo = $this->input->post('titulo');
                $descripcion = $this->input->post('descripcion');
                $activo = $this->input->post('activo');

                if($this->user_model->create_empleo($titulo, $descripcion, $activo)) {

                    $data->success = "El documento se ha creado con éxito.";

                    echo view('templates/header');
                    echo view('pages/alta_oferta_prueba', $data);
                    echo view('templates/footer');

                } else {

                    $data->error = "Ha habido un problema creando la oferta. Por favor, inténtalo de nuevo. Si el problema persiste contacta con el desarrollador.";

                    echo view('templates/header');
                    echo view('pages/alta_oferta_prueba', $data);
                    echo view('templates/footer');

                }
            }
        }

        public function register_cuota(){
            
            $data = new stdClass();

            $this->load->helper('form');

            $descripcion = $this->form_validation->set_rules('descripcion', 'Descripcion', 'required');
            $anio = $this->form_validation->set_rules('anio', 'Anio', 'required');

            if($this->form_validation->run() === false) {
                
                echo view('templates/header');
                echo view('pages/alta_cuota_prueba', $data);
                echo view('templates/footer');

            } else {

                $descripcion = $this->input->post('descripcion');
                $anio = $this->input->post('anio');

                if($this->user_model->create_cuota($descripcion, $anio)) {

                    $data->success = "El documento se ha creado con éxito.";

                    echo view('templates/header');
                    echo view('pages/alta_cuota_prueba', $data);
                    echo view('templates/footer');

                } else {

                    $data->error = "Ha habido un problema creando la oferta. Por favor, inténtalo de nuevo. Si el problema persiste contacta con el desarrollador.";

                    echo view('templates/header');
                    echo view('pages/alta_cuota_prueba', $data);
                    echo view('templates/footer');

                }
            }
        }

		// Log in user
		public function login(){

			$data = new stdClass();

            $this->load->helper('form');

			$this->form_validation->set_rules('username', 'Username', 'required|alpha_numeric');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if($this->form_validation->run() == false){

				echo view('templates/header');
				echo view('users/login', $data);
				echo view('templates/footer');

			} else {
				
				// Get username
				$username = $this->input->post('username');
				// Get and encrypt the password
				$password = $this->input->post('password');

                if($this->user_model->resolve_user_login($username, $password)){
				
                    $user_id = $this->user_model->get_user_id_from_username($username);
                    $user = $this->user_model->get_user($user_id);

                    // set session user data
                    $_SESSION['user_id'] = (int)$user->id;
                    $_SESSION['username'] = (string)$user->username;
                    $_SESSION['logged_in'] = (bool)true;
                    $_SESSION['is_confirmed'] = (bool)$user->is_confirmed;
                    $_SESSION['is_admin'] = (bool)$user->is_admin;
                    
                    // user login ok
                    echo view('templates/header');
                    echo view('pages/serviciocolegiado', $data);
                    echo view('templates/footer');

                } else {

                    // login failed
                    $data->error = "Usuario o password erroneo. Inténtalo de nuevo.";

                    // send error to the view
                    echo view('templates/header');
                    echo view('users/login', $data);
                    echo view('templates/footer');
                }
						
			}
		}

		// Log user out
		public function logout() {
		
            // create the data object
            $data = new stdClass();
            
            if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
                
                // remove session datas
                foreach ($_SESSION as $key => $value) {
                    unset($_SESSION[$key]);
                }
                
                // user logout ok
                echo view('templates/header');
                echo view('users/logout/logout_success', $data);
                echo view('templates/footer');
                
            } else {
                
                // there user was not logged in, we cannot logged him out,
                // redirect him to site root
                return redirect()->to('/');
                
            }
            
        }

        public function do_upload() {

                $config['upload_path']          = './uploads/';
                $config['max_size']             = 100;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile')) {

                        $error = array('error' => $this->upload->display_errors());

                        echo view('upload_form', $error);

                } else {

                        $data = array('upload_data' => $this->upload->data());

                        echo view('upload_success', $data);
                        
                }
        }

        public function email_validation($username, $hash) {

            // Create the data object
            $data = new stdClass();

            // avoid blank at the end of the url
            $hash = trim($hash);

            if($this->user_model->confirm_account($username, $hash)){

                // account validation ok
                $data->success = 'Enhorabuena. Tu correo se ha confirmado y tu cuenta se ha validado. Por favor, <a href="' . base_url('login') . '">lógate</a>';
                echo view('templates/header');
                echo view('users/register/confirmation', $data);
                echo view('templates/footer');
            } else {

                // account validation failed
                $data->error = 'Ha habido un error. Tu correo no se ha podido validar. Por favor, contacta con el administrador del sitio web.';
                echo view('templates/header');
                echo view('users/register/confirmation');
                echo view('templates/header');

            }
        }

        public function edit($username = false) {

            // a user can only edit his own profile
            // if ($username === false || $username !== $_SESSION['username']) {
            //     return redirect()->to(base_url(),'/');
            //     return;
            // }

            // create the data object
            $data = new stdClass();

            // load helper
            $this->load->helper('form');

            // form validation
            $password_required_if = $this->input->post('password') ? '|required' : ''; // if there is something on password input, current password is required
            $this->form_validation->set_rules('username', 'Username', 'trim|min_length[4]|max_length[20]|alpha_numeric|is_unique[users.username]', array('is_unique' => 'Este usuario ya existe. Por favor, escoja otro.'));
            $this->form_validation->set_rules('email', 'Email', 'trim|valid_email|is_unique[users.email]', array('is_unique' => 'El correo electrónico introducido ya existe en nuestra base de datos.'));
            $this->form_validation->set_rules('current_password', 'Current Password', 'trim' . $password_required_if . '[callback_verify_current_password]');
            $this->form_validation->set_rules('password', 'New Password', 'trim|min_length[6]|matches[password_confirm]');
            $this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'trim|min_length[6]');

            // get the user object
            $user_id = $this->user_model->get_user_id_from_username($username);
            $user    = $this->user_model->get_user($user_id);

            // create breadcrumb
            // $breadcrumb  = '<ol class="breadcrumb">';
            // $breadcrumb .= '<li><a href="' . base_url(),'/' . '">Inicio</a></li>';
            // $breadcrumb .= '<li><a href="' . base_url('user/' . $username) . '">' . $username . '</a></li>';
            // $breadcrumb .= '<li class="active">Editar</li>';
            // $breadcrumb .= '</ol>';

            // asign objects to the data object
            $data->user       = $user;
            // $data->breadcrumb = $breadcrumb;

            if ($this->form_validation->run() === FALSE) {

                // validation not ok, send validation errors to the view
                echo view('templates/header');
                echo view('users/profile/edit', $data);
                echo view('templates/footer');

            } else {

                $user_id = $_SESSION['user_id'];
                $update_data = [];

                if ($this->input->post('username') != '') {
                    $update_data['username'] = $this->input->post('username');
                }
                
                if ($this->input->post('email') != '') {
                    $update_data['email'] = $this->input->post('email');
                }
                
                if ($this->input->post('password') != '') {
                    $update_data['password'] = $this->input->post('password');
                }

                // avatar upload
                if (isset($_FILES['userfile']['name']) && !empty($_FILES['userfile']['name'])) {

                    //setup upload configuration and load upload library
                    $config['upload_path'] = './uploads/avatars/';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size'] = 2048;
                    $config['max_width'] = 1024;
                    $config['max_height'] = 1024;
                    $config['file_ext_tolower'] = true;
                    $config['encrypt_name'] = true;
                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload()) {

                        // upload not OK
                        $error = array('error' => $this->upload->display_errors());
                        echo view('upload_form', $error);
                    } else {

                        // upload ok send name to $update data
                        $update_data['avatar'] = $this->upload->data('file_name');
                    }
                }

                // if everything is ok
                if ($this->user_model->update_user($user_id, $update_data)) {

                    // if username change, update session
                    if(isset($update_data['username'])) {
                        $_SESSION['username'] = $update_data['username'];
                        if ($this->input->post('username') != '') {
                            // a little hook to send success message the new profil edit url if the username was updated
                            $_SESSION['flash'] = 'Tu perfil se ha actualizado con éxito.';
                        }
                    }

                    // fix the fact that a new avatar was not shown until page refresh
                    if(isset($update_data['avatar'])) {
                        $data->user->avatar = $update_data['avatar'];
                    }

                    if ($this->input->post('username') != '') {

                        // redirect to the new profile edit url
                        return redirect()->to(base_url('users/' . $update_data['username'] . '/edit'));

                    } else {

                        // create a success message
                        $data->success = 'Tu perfil se ha actualizado con éxito.';

                        //send success message to the views
                        echo view('templates/header');
                        echo view('users/profile/edit', $data);
                        echo view('templates/footer');
                    }

                } else {

                    // update user not ok: this should never happen
                    $data->error = "Ha habido un problema actualizando tu cuenta. Por favor, inténtalo de nuevo.";

                    // send error to the views
                    echo view('templates/header');
                    echo view('users/profile/edit', $data);
                    echo view('templates/footer');
                }
            }
        }

        public function delete($username = false) {

            // a user can only delete his own profile and must be logged in
            if ($username == false || !isset($_SESSION['username']) || $username !== $_SESSION['username']) {
                return redirect()->to(base_url(),'/');
                return;
            }

            // create the data object
            $data = new stdClass();

            if ($_SESSION['username'] === $username) {

                $user_id = $this->user_model->get_user_id_from_username($username);
                $data->user = $this->user_model->get_user($user_id);

                if ($this->user_model->delete_user($user_id)) {

                    $data->success = 'Tu ususario se ha eliminado con éxito. Hasta pronto.';

                    // user delete ok, load views
                    echo view('templates/header');
                    echo view('users/profile/delete', $data);
                    echo view('templates/footer');

                } else {

                    // a user can only delete his own profile and must be logged in
                    $data->error = 'Ha habido un problema eliminando tu cuenta. Por favor, contacta con el administrador de la web.';

                    // send errors to the views
                    echo view('templates/header');
                    echo view('users/profile/edit', $data);
                    echo view('templates/footer');

                }
            } else {

                // a user can only delete his own profile and must be logged in
                return redirect()->to(base_url(),'/');
                return;
            }
        }

        public function verify_current_password($str) {

            if ($str != '') {

                if ($this->user_model->resolve_user_login($_SESSION['username'], $str) === true) {

                    return true;
                }

                $this->form_validation->set_message('verify_current_password', 'Tu password no es correcto.');
                return false;
            }

            return true;
        }
    }
