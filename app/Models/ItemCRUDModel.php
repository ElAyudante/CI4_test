<?php 
namespace App\Models; 
use Kenjis\CI3Compatible\Core\CI_Model; 


//EL VERDADERO CRUD

class ItemCRUDModel extends CI_Model{

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

//UPDATE
    public function update_item($id) 
    {
		$data=array(
            'FechaAlta' => $this->input->post('falta'),
            'Nombre'=> $this->input->post('nombre'),
			'Apellidos' => $this->input->post('apellidos'),
			'NIF' => $this->input->post('nif'),
			'Direccion' => $this->input->post('direccion'),
			'Localidad' => $this->input->post('localidad'),
			'CP' => $this->input->post('cp'),
			'Provincia' => $this->input->post('provincia'),
			'Comunidad' => $this->input->post('comunidad'),
			'Telefono' => $this->input->post('telefono'),
			'Movil' => $this->input->post('movil'),
			'Email' => $this->input->post('email'),
			'Lugarnacimiento' => $this->input->post('lnacimiento'),
			'Fechanacimiento' => $this->input->post('fnacimiento'),
			'Cuentabancaria' => $this->input->post('cuenta'),
			'Telefonotrabajo' => $this->input->post('tlftrabajo'),
			'Lugartrabajo' => $this->input->post('lugtrabajo'),
			'Direcciontrabajo' => $this->input->post('dtrabajo'),
			'Localidadtrabajo' => $this->input->post('loctrabajo'),
			'Colegiado' => $this->input->post('ncolegiado'),
			'Ejerciente' => $this->input->post('ejerciente'),
			'Especialidad' => $this->input->post('especialidad'),
			'Ambitotrabajo' => $this->input->post('ambito'),
			'Sector' => $this->input->post('sector'),
        );

        if($id==0){
            return $this->db->insert('colegiados',$data);
        }else{
            $this->db->where('id',$id);
            return $this->db->update('colegiados',$data);
        } 
    }

//READ
    public function find_item($id)
    {
        return $this->db->get_where('colegiados', array('Id' => $id))->row();
    }

//DELETE
    public function delete_item($id)
    {
        return $this->db->delete('colegiados', array('id' => $id));
    }
}
?>
