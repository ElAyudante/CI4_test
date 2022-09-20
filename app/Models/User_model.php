<?php 
namespace App\Models; 
use Kenjis\CI3Compatible\Core\CI_Model; 



	class User_model extends CI_Model{

		public function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function create_user($username, $email, $password){
			// Array que recoge los datos del formulario
			$data = array(
				'Nombre' => $this->input->post('name'), //el nombre del campo tiene que ser el mismo que la propiedad "name" del formulario
				'Apellidos' => $this->input->post('lastname'),
				'NIF' => $this->input->post('nif'),
				'Direccion' => $this->input->post('direccion'),  
				'Localidad' => $this->input->post('localidad'),
				'Provincia' => $this->input->post('provincia'),
				'CP' => $this->input->post('cp'),
				'Telefono' => $this->input->post('telefono'),
				'Titulacion' => $this->input->post('titulacion'),
				'Usuario'   => $username,
				'Email'      => $email,
				'Pass'   => $this->hash_password($password), //hasheo del password
				'FechaAlta' => date('Y-m-j H:i:s')
			);
			//introduce el array en la base de datos
			return $this->db->insert('colegiados', $data);

			//De momento se deja comentado, hay un problema con el servidor de correo SMTP
			/*
			if ($this->db->insert('colegiados', $data)) {
				// send confirmation email
				return $this->send_confirmation_email($username, $email);
			}
			*/
		}

		public function create_formacion($nombrecurso, $nombre, $apellidos, $nif, $direccion, $localidad, $cp, $provincia, $telefono, $email, $ncolegiado, $colegio, $ammount){
			$data = array(
				'Nombrecurso' => $nombrecurso,
				'Nombre' => $nombre,
				'Apellidos' => $apellidos,
				'NIF' => $nif,
				'Direccion' => $direccion,
				'Localidad' => $localidad,
				'CP' => $cp,
				'Provincia'=> $provincia,
				'Telefono' => $telefono,
				'Email' => $email,
				'Ncolegiado' => $ncolegiado,
				'Colegio' => $colegio,
				'Ammount' => $ammount
			);
			//introduce los datos del registro de formacion en esta tabla
			return $this->db->insert('formacion_detalle', $data);

		}

		public function mostrar_formacion(){

			$data = array(
				'Nombre' => $nombre,
				'Apellidos' => $apellidos,
				'NIF' => $nif,
				'Direccion' => $direccion,
				'Localidad' => $localidad,
				'CP' => $cp,
				'Provincia'=> $provincia,
				'Telefono' => $telefono,
				'Email' => $email,
				'Ncolegiado' => $ncolegiado,
				'Colegio' => $colegio,
				'Ammount' => $ammount
			);

			$this->db->insert_string('formacion_detalle', $data); 

			$id = $this->db->insert_id(); // Will return the last insert id.
		}

		public function create_colegiado($falta, $nombre, $apellidos, $nif, $direccion, $localidad, $cp, $provincia, $comunidad, $telefono, $movil, $email, $lnacimiento, $fnacimiento, $cuenta, $fechaalta, $tlftrabajo, $lugtrabajo, $dtrabajo, $loctrabajo, $ncolegiado, $fexpiracion, $ejerciente, $titulacion, $especialidad, $ambito, $sector, $habitacion, $diplomado, $bolsa, $traslado, $colegioorigen, $norigen, $observacion, $cuota, $inscripcion, $publicidad, $bienvenida, $colegiadoactual){
			$data = array(
				'Fechaalta' => $falta,
				'Nombre' => $nombre,
				'Apellidos' => $apellidos,
				'NIF' => $nif,
				'Direccion' => $direccion,
				'Localidad' => $localidad,
				'CP' => $cp,
				'Provincia' => $provincia,
				'Comunidad' => $comunidad,
				'Telefono' => $telefono,
				'Movil' => $movil,
				'Email' => $email,
				'Lugarnacimiento' => $lnacimiento,
				'Fechanacimiento' => $fnacimiento,
				'Cuentabancaria' => $cuenta,
				'Fechaalta' => $fechaalta,
				'Telefonotrabajo' => $tlftrabajo,
				'Lugartrabajo' => $lugtrabajo,
				'Direcciontrabajo' => $dtrabajo,
				'Localidadtrabajo' => $loctrabajo,
				'Colegiado' => $ncolegiado,
				'CaducidadCarnet' => $fexpiracion,
				'Ejerciente' => $ejerciente,
				'Titulacion' => $titulacion,
				'Especialidad' => $especialidad,
				'Ambitotrabajo' => $ambito,
				'Sector' => $sector,
				'Solicitahabilitacion' => $habitacion,
				'Diplomaturalogopedia' => $diplomado,
				'Altabolsatrabajo' => $bolsa,
				'Trasladado' => $traslado,
				'Colegioorigen' => $colegioorigen,
				'Numcolegiado' => $norigen,
				'Observaciones' => $observacion,
				'Cuota' => $cuota,
				'Inscripcion' => $inscripcion,
				'Publicidad' => $publicidad,
				'Bienvenida' => $bienvenida,
				'Activo'=> $colegiadoactual
			);

			if ($this->db->insert('colegiados', $data)) {

				return $this->send_confirmation_email($nombre, $email);
			}; 

		}

		public function create_sociedad($colegiado, $sociedad, $nif, $direccion, $cp, $poblacion, $provincia, $telefono, $fax, $email, $registromercantil, $tiposociedad, $capitalsocial, $cuentabancaria, $fechaalta, $ncolegiado, $nombre, $cargo, $participacion, $ncolegiadoe, $nombree, $dni, $nombreo, $cargoo, $participaciono) {

			$data = array(
				'Colegiado' => $colegiado,
				'Sociedad' => $sociedad,
				'Nif' => $nif,
				'Direccion' => $direccion,
				'Cp' => $cp,
				'Poblacion' => $poblacion,
				'Provincia' => $provincia,
				'Telefono' => $telefono,
				'Fax' => $fax,
				'Email' => $email,
				'Registromercantil' => $registromercantil,
				'Tiposociedad' => $tiposociedad,
				'Capitalsocial' => $capitalsocial,
				'Cuentabancaria' => $cuentabancaria,
				'Fechaalta' => date('Y-m-j H:i:s'),
				'Ncolegiado' => $ncolegiado,
				'Nombre' => $nombre,
				'Cargo' => $cargo,
				'Participacion' => $participacion,
				'Ncolegiadoe' => $ncolegiadoe,
				'Nombree' => $nombree,
				'Dni' => $dni,
				'Nombreo' => $nombreo,
				'Cargoo' => $cargoo,
				'Participaciono' => $participaciono
			);

			return $this->db->insert('sociedades', $data);

		}

		public function create_evento_propio($evento, $descripcion, $archivo, $importecolegiados, $importenoejercientes, $importeasociaciones, $nocolegiados, $activo) {
			$data = array(
				'Evento' => $evento,
				'Descripcion' => $descripcion,
				'Archivo' => $archivo,
				'Importecolegiados' => $importecolegiados,
				'Importenoejercientes' => $importenoejercientes,
				'Importeasociaciones' => $importeasociaciones,
				'Nocolegiados' => $nocolegiados,
				'Activo' => $activo
			);

			return $this->db->insert('eventos', $data);
		}

		public function create_evento_ajeno($evento, $descripcion, $archivo, $tipo, $activo) {
			$data = array(
				'Evento' => $evento,
				'Descripcion' => $descripcion,
				'Archivo' => $archivo,
				'Tipo' => $tipo,
				'Activo' => $activo
			);

			return $this->db->insert('eventos', $data);
		}

		public function create_documento($documento, $archivo, $publico) {
			$data = array(
				'Documento' => $documento,
				'Archivo' => $archivo,
				'Publico' => $publico
			);

			return $this->db->insert('documentos', $data);
		}

		public function create_empleo($titulo, $descripcion, $activo) {
			$data = array(
				'titulo' => $titulo,
				'descripcion' => $descripcion,
				'activo' => $activo
			);

			return $this->db->insert('empleo', $data);
		}

		public function create_cuota($descripcion, $anio) {
			$data = array(
				'descripcion' => $descripcion,
				'anio' => $anio
			);

			return $this->db->insert('cobroscuotas', $data);
		}

		public function create_admin_user($username, $email, $password) {

			$data = array(
				'username' => $username,
				'email' => $email,
				'password' => $this->hash_password($password),
				'created_at' => date('Y-m-j H:i:s'),
				'is_admin' => '1',
				'is_confirmed' => '1'
			);

			return $this->db->insert('users', $data);
		}

		public function create_moderator_user($username, $email, $password) {
			$data = array(
				'username' => $username,
				'email' => $email,
				'password' => $this->hash_password($password),
				'created_at' => date('Y-m-j H:i:s'),
				'is_moderator' => '1',
				'is_confirmed' => '1'
			);

			return $this->db->insert('users', $data);
		}



		public function resolve_user_login($username, $password){

			$this->db->select('password');
			$this->db->from('users');
			$this->db->where('username', $username);
			$hash = $this->db->get()->row('password');

			return $this->verify_password_hash($password, $hash);
		}


		public function get_user_id_from_username($username){
			$this->db->select('id');
			$this->db->from('users');
			$this->db->where('username', $username);

			return $this->db->get()->row('id');
		}


		public function get_user_username_from_id($user_id){
			$this->db->select('username');
			$this->db->from('users');
			$this->db->where('id', $user_id);

			return $this->db->get()->row('username');
		}


		public function get_user($user_id) {
			$this->db->from('users');
			$this->db->where('id', $user_id);

			return $this->db->get()->row();
		}


		public function get_users() {
			$this->db->from('users');

			return $this->db->get()->result();
		}


		public function count_user_posts($user_id) {

			$this->db->select('id');
			$this->db->select('posts');
			$this->db->where('user_id', $user_id);

			return $this->db->get()->num_rows();

		}


		public function count_user_topics($user_id) {

			$this->db->select('id');
			$this->db->select('topics');
			$this->db->where('user_id', $user_id);

			return $this->db->get()->num_rows();

		}


		public function get_user_last_post($user_id) {

			$this->db->from('posts');
			$this->db->where('user_id', $user_id);
			$this->db->order_by('created_at', 'DESC');
			$this->db->limit(1);

			return $this->db->get()->row();
		}


		public function get_user_last_topic($user_id) {

			$this->db->from('topics');
			$this->db->where('user_id', $user_id);
			$this->db->order_by('created_at', 'DESC');
			$this->db->limit(1);

			return $this->db->get()->row();
		}


		public function confirm_account($username, $hash) {

			// find the email for the given user
			$email = $this->db->select('created_at')
				->from('users')
				->where('username', $username)
				->get()
				->row('created_at');

			// find the registration date for the given user
			$registration_date = $this->db->select('created_at')
				->from('users')
				->where('username', $username)
				->get()
				->row('created_at');

			// if the user from the url exists
			if ($email && $registration_date) {

				if(sha1($email . $registration_date) === $hash) {

					// values form the url are good, we can validate the account
					$data = array('is_confirmed' => '1');
					$this->db->where('username', $username);
					return $this->db->update('users', $data);
				}
				return false;

			}
			return false;

		}


		public function update_user($user_id, $update_data) {

			// if user wants to update its password, hash the given password
			if (array_key_exists('password', $update_data)) {
				$update_data['password'] = $this->hash_password($update_data['password']);
			}

			if (!empty($update_data)) {

				$this->db->where('id', $user_id);
				return $this->db->update('users', $update_data);

			}
			return false;

		}


		public function delete_user($user_id) {

			// delete all user topics, posts and delete user account
			$this->db->where('id', $user_id);
			if ($this->db->delete('users')) {
				$this->db->where('user_id', $user_id);
				if ($this->db->delete('topics')) {
					$this->db->where('user_id', $user_id);
					return $this->db->delete('posts');
				}
				return false;

			}
			return false;

		}
		

		private function hash_password($password) {
			return password_hash($password, PASSWORD_BCRYPT);
		}

		private function verify_password_hash($password, $hash) {
			return password_verify($password, $hash);
		}

		private function send_confirmation_email($username, $email) {

			// load email library and url helper
			$this->load->library('email');
			$this->load->helper('url');

			// get the site email address
			$email_address = $this->config->item('site_email');

			// initialize the email configuration
			$config['protocol']='mail';
			$this->email->initialize($config);
			$this->email->initialize(array(
				'mailtype' => 'html',
				'charset' => 'utf-8'
			));

			// get user registration date
			$registration_date = $this->db->select('created_at')->from('users')->where('username', $username)->get()->row('created_at');

			// create a user email hash with user email and user registration date
			$hash = sha1($email . $registration_date);

			// prepare the email
			//$this->email->protocol;
			$this->email->from($email_address, $email_address);
			$this->email->to($email);
			$this->email->subject('Por favor, confirma tu correo para validar tu nueva cuenta de usuario');
			$message = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head><body>';
			$message .= "Hola " . $username . ",<br><br>";
			$message .= "Por favor, clicka el enlace de más abajo para confirmar tu cuenta en " . base_url() . "<br><br>";
			$message .= "Clicka este enlace: <a href=\"" . base_url() . "user/email_validation/" . $username . "/" . $hash . "\">Confirma tu correo y valida tu cuenta</a>";
			$message .= "</body></html>";
			$this->email->message($message);

			// send the email and return status
			return $this->email->send();
		}
	}
		
