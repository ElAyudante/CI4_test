<?php 
namespace App\Controllers; 
use Kenjis\CI3Compatible\Core\CI_Controller; 



/**
 * Admin class.
 * 
 * @extends CI_Controller
 */
class Admin extends CI_Controller {

	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {
		
		parent::__construct();
		$this->load->library(array('session'));
		$this->load->helper(array('url'));
		$this->load->model('admin_model');
		$this->load->model('user_model');
		//$this->output->enable_profiler(TRUE);
		
	}

	// Log in Admin
	public function login(){

		$data = new stdClass();

		$this->load->helper('form');

		$this->form_validation->set_rules('username', 'Username', 'required|alpha_numeric');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run() == false){

			echo view('templates/header');
			echo view('users/admin/login', $data);
			echo view('templates/footer');

		} else {
			
			// Get username
			$username = $this->input->post('username');
			// Get and encrypt the password
			$password = $this->input->post('password');

			if($this->user_model->resolve_admin_login($username, $password)){
			
				$user_id = $this->user_model->get_admin_id_from_username($username);
				$user = $this->user_model->get_admin($user_id);

				// set session user data
				$_SESSION['user_id'] = (int)$user->id;
				$_SESSION['username'] = (string)$user->username;
				$_SESSION['logged_in'] = (bool)true;
				$_SESSION['is_confirmed'] = (bool)$user->is_confirmed;
				$_SESSION['is_admin'] = (bool)$user->is_admin;
				
				// user login ok
				echo view('templates/header');
				echo view('pages/admin/main', $data);
				echo view('templates/footer');

			} else {

				// login failed
				$data->error = "Usuario o password erroneo. Inténtalo de nuevo.";

				// send error to the view
				echo view('templates/header');
				echo view('users/admin/login', $data);
				echo view('templates/footer');
			}
					
		}
	}
	
	public function index() {
		
		// if the user is not admin, redirect to base url
		if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
			return redirect()->to(base_url(),'/');
			return;
		}
		
		// create the data object
		$data = new stdClass();
		
		echo view('templates/header');
		echo view('admin/home/index', $data);
		echo view('templates/footer');
		
	}
	
	public function users() {
		
		// if the user is not admin, redirect to base url
		if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
			return redirect()->to(base_url(),'/');
			return;
		}
		
		// create the data object
		$data = new stdClass();
		
		$data->users = $this->user_model->get_users();
		
		echo view('templates/header');
		echo view('admin/users/users', $data);
		echo view('templates/footer');
		
	}
	
	/**
	 * edit_user function.
	 * 
	 * @access public
	 * @param mixed $username (default: false)
	 * @return void
	 */
	public function edit_user($username = false) {
		
		// if the user is not admin, redirect to base url
		if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
			return redirect()->to(base_url(),'/');
			return;
		}
		
		if ($username === false) {
			
			return redirect()->to(base_url('admin/users'));
			return;
			
		}
		
		// create the data object
		$data = new stdClass();
		
		// create the user object
		$user_id = $this->user_model->get_user_id_from_username($username);
		$user    = $this->user_model->get_user($user_id);
		
		// set options
		if ($user->is_admin === '1') {
			$options  = '<option value="administrator" selected>Administrator</option>';
			$options .= '<option value="moderator">Moderator</option>';
			$options .= '<option value="user">User</option>';
		} elseif ($user->is_moderator === '1') {
			$options  = '<option value="administrator">Administrator</option>';
			$options .= '<option value="moderator" selected>Moderator</option>';
			$options .= '<option value="user">User</option>';
		} else {
			$options  = '<option value="administrator">Administrator</option>';
			$options .= '<option value="moderator">Moderator</option>';
			$options .= '<option value="user" selected>User</option>';
		}
		
		// assign values to the data object
		$data->user    = $user;
		$data->options = $options;
		if ($user->updated_by !== null) {
			$data->user->updated_by = $this->user_model->get_username_from_user_id($user->updated_by);
		}
		
		// load form helper and validation library
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		// set form validations rules
		$this->form_validation->set_rules('user_rights', 'User Rights', 'required|in_list[administrator,moderator,user]', array('in_list' => 'Don\'t try to hack the form!'));
		
		if ($this->form_validation->run() == false) {
			
			echo view('templates/header');
			echo view('admin/users/edit_user', $data);
			echo view('templates/footer');
			
		} else {
			
			// assign rights to variables
			if ($this->input->post('user_rights') === 'administrator') {
				$is_admin     = '1';
				$is_moderator = '0';
			} elseif ($this->input->post('user_rights') === 'moderator') {
				$is_admin     = '0';
				$is_moderator = '1';
			} else {
				$is_admin     = '0';
				$is_moderator = '0';
			}
			
			if ($this->admin_model->update_user_rights($user_id, $is_admin, $is_moderator)) {
				// update user success
				$data->success = $user->username . ' se ha actualizado correctamente.';
			} else {
				// error while updating user rights, this should never happen
				$data->error = 'Ha habido un error mientras trataba de actualizar este usuario. Inténtelo de nuevo, por favor.';
			}
			
			echo view('templates/header');
			echo view('admin/users/edit_user', $data);
			echo view('templates/footer');
			
		}
		
	}
	
	public function forums_and_topics() {
		
		// if the user is not admin, redirect to base url
		if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
			return redirect()->to(base_url(),'/');
			return;
		}
		
		// create the data object
		$data = new stdClass();
		
		echo view('templates/header');
		echo view('admin/forums_and_topics/forums_and_topics', $data);
		echo view('templates/footer');
		
	}
	
	public function options() {
		
		// if the user is not admin, redirect to base url
		if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
			return redirect()->to(base_url(),'/');
			return;
		}
		
		// create the data object
		$data = new stdClass();
		
		echo view('templates/header');
		echo view('admin/options/options', $data);
		echo view('templates/footer');
		
	}
	
	public function emails() {
		
		// if the user is not admin, redirect to base url
		if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
			return redirect()->to(base_url(),'/');
			return;
		}
		
		// create the data object
		$data = new stdClass();
		
		echo view('templates/header');
		echo view('admin/emails/emails', $data);
		echo view('templates/footer');
		
	}
	
}
