<?php 
namespace App\Models; 
use Kenjis\CI3Compatible\Core\CI_Model; 
use CodeIgniter\I18n\Time;


class ItemCRUDModel extends CI_Model{

	function __construct(){
		parent::__construct();
		$this->load->database();
	}


	public function login($usuario, $pass){
		$query = $this->db->get_where('colegiados', array('Usuario'=>$usuario, 'Pass'=>$pass));
		return $query->row_array();
	}

	public function login_admin($usuario, $pass){
		$query = $this->db->get_where('users', array('username'=>$usuario, 'password'=>$pass));
		return $query->row_array();
	}

	//CREATE
    public function insert_item()
    {    
        $data = array(
            'FechaAlta' => $this->input->post('fecha_alta'),
			'Nombre' => $this->input->post('nombre'),
			'Apellidos' => $this->input->post('apellidos'),
			'NIF' => $this->input->post('nif'),
			'Usuario' => $this->input->post('usuario'),
			'Pass' => $this->input->post('pass'),
			'Direccion' => $this->input->post('direccion'),
			'Localidad' => $this->input->post('localidad'),
			'CP' => $this->input->post('cp'),
			'Provincia' => $this->input->post('provincia'),
			'Comunidad' => $this->input->post('comunidad'),
			'Telefono' => $this->input->post('telefono'),
			'Movil' => $this->input->post('movil'),
			'Email' => $this->input->post('email'),
			'Lugarnacimiento' => $this->input->post('lugarnacimiento'),
			'Fechanacimiento' => $this->input->post('fechanacimiento'),
			'Cuentabancaria' => $this->input->post('cuentabancaria'),
			'Telefonotrabajo' => $this->input->post('telefonotrabajo'),
			'Lugartrabajo' => $this->input->post('lugartrabajo'),
			'Direcciontrabajo' => $this->input->post('direcciontrabajo'),
			'Localidadtrabajo' => $this->input->post('localidadtrabajo'),
			'Colegiado' => $this->input->post('colegiado'),
			'CaducidadCarnet' => $this->input->post('caducidadcarnet'),
			'Ejerciente' => $this->input->post('ejerciente'),
			'Titulacion' => $this->input->post('titulacion'),
			'Especialidad' => $this->input->post('especialidad'),
			'Ambitotrabajo' => $this->input->post('ambitotrabajo'),
			'Sector' => $this->input->post('sector'),
			'Solicitahabilitacion' => $this->input->post('solicitahabilitacion'),
			'Diplomaturalogopedia' => $this->input->post('diplomaturalogopedia'),
			'Altabolsatrabajo' => $this->input->post('altabolsatrabajo'),
			'Trasladado' => $this->input->post('traslado'),
			'Colegioorigen' => $this->input->post('colegioorigen'),
			'Numcolegiado' => $this->input->post('numOrigen'),
			'Observaciones' => $this->input->post('observaciones'),
			'Cuota' => $this->input->post('cuota'),
			'Inscripcion' => $this->input->post('inscripcion'),
			'Publicidad' => $this->input->post('publlicidad'),
			'Bienvenida' => $this->input->post('bienvenida'),
			'Activo'=> $this->input->post('activo'),
        );

        return $this->db->insert('colegiados', $data);
    }

	public function insert_oferta(){

		$data = array(

			'Empresa' => $this->input->post('empresa'),
			'Lugar' => $this->input->post('lugar'),
			'Ofrece' => $this->input->post('ofrece'),
			'Condiciones' => $this->input->post('condiciones'),
			'Contacto' => $this->input->post('contacto'),
			'Activo' => $this->input->post('activo')
		);

		return $this->db->insert('ofertas_empleo', $data);
	}

	public function insert_documento(){

		$data = array(

			'Nombre' => $this->input->post('nombre'),
			'Descripcion' => $this->input->post('descripcion'),
			'Publico' => $this->input->post('publico'),
			'Archivo' => $this->input->post('archivo')
		);

		return $this->db->insert('documentos', $data);
	}

	public function insert_reclamacion(){

		$data = array(

			'Fecha' => date('Y-m-d'),
			'Nombre' => $this->input->post('nombre'),
			'Apellidos' => $this->input->post('apellidos'),
			'Email' => $this->input->post('email'),
			'Telefono' => $this->input->post('telefono'),
			'Asunto' => $this->input->post('asunto'),
			'Comentarios' => $this->input->post('comentarios'),
			'Estado' => 'Pendiente'
		);

		return $this->db->insert('reclamaciones', $data);
	}

	public function insert_convenio(){

		$data = array(

			//'Fecha' => Time::now(),
			'empresa' => $this->input->post('empresa'),
			'descripcion' => $this->input->post('descripcion'),
			'codigo' => $this->input->post('codigo'),
			'web' => $this->input->post('web'),

		);

		return $this->db->insert('convenios', $data);
	}


//READ
    public function find_item($id)
    {
        return $this->db->get_where('colegiados', array('Id' => $id))->row();
    }
	public function find_empleo($id)
    {
        return $this->db->get_where('ofertas_empleo', array('ID' => $id))->row();
    }
	public function find_documento($id)
    {
        return $this->db->get_where('documentos', array('Id' => $id))->row();
    }
	public function find_reclamaciones($id)
    {
        return $this->db->get_where('reclamaciones', array('Id' => $id))->row();
    }
	public function find_cuota(){
		return $this->db->get_where('cuotas', array('Id' => '1'))->row();
	}
	public function find_convenio($id){
		return $this->db->get_where('convenios', array('id' => $id))->row();
	}


//DELETE
    public function delete_item($id)
    {
        return $this->db->delete('colegiados', array('id' => $id));
    }

	public function delete_empleo($id)
    {
        return $this->db->delete('ofertas_empleo', array('ID' => $id));
    }

	public function delete_documento($id)
    {
        return $this->db->delete('documentos', array('Id' => $id));
    }
	public function delete_convenio($id)
    {
        return $this->db->delete('convenios', array('Id' => $id));
    }
	public function delete_reclamacion($id)
    {
        return $this->db->delete('reclamaciones', array('Id' => $id));
    }
	
}
?>
