<?php
class Permisos_model extends CI_Model
{
	public function __construct()
	{
		parent:: __construct();
	}

	public function getall_permisos()
	{
		$query = $this->db->get('permisos');
		return $query->result();
	}

	public function getall_pantallas()
	{
		$query = $this->db->get('pantallas');
		return $query->result();
	}

	public function getall_permisos_perfil($perfil)
	{
		$query = $this->db->get_where('permisos', array('allow =' => $perfil['perfil']));
		return $query->result();
	}

	public function get_permiso($permiso)
	{
		$query = $this->db->get_where('permisos', array(
																	'pantalla =' => $permiso['titulo'],
																	'accion =' => $permiso['accion'],
																	'allow =' => $this->session->userdata('usuario')
																	));

		/*echo '-'.$permiso['titulo'];
		echo '-'.$permiso['accion'];
		echo '-'.$this->session->userdata('usuario');
		echo '-'.$this->session->userdata('perfil');*/

		if($query->num_rows() > 0)
		{
			//echo '-'.'usu true';
			return true;
		}
		else
		{
			$query = $this->db->get_where('permisos', array('pantalla =' => $permiso['titulo'],
														    	  'accion =' => $permiso['accion'],
														        'allow =' => $this->session->userdata('perfil')
														       ));

			if($query->num_rows() > 0)
			{
				//echo '-'.'perfil true';
				return true;
			}
			else
			{
				//echo '-'.'false';
				return false;
			}

		}
	}

	public function very_permiso($permiso)
	{
		$query = $this->db->get_where('permisos', array(
																	'pantalla =' => $permiso['pantalla'],
																	'accion =' => $permiso['accion'],
																	'allow =' => $this->session->userdata('usuario')
																	));

		if($query->num_rows() > 0)
		{
			return true;
		}
		else
		{
			$query = $this->db->get_where('permisos', array(
																		'pantalla =' => $permiso['pantalla'],
														    	  'accion =' => $permiso['accion'],
														        'allow =' => $this->session->userdata('perfil')
														       ));

			if($query->num_rows() > 0)
			{
				return true;
			}
			else
			{
				return false;
			}

		}
	}

	public function insert_permiso($data)
	{
		$this->db->insert('permisos',$data);
	}

	public function update_permiso($data)
	{
		$this->db->trans_start();
		$this->db->update('permisos', $data, "IDCliente =".$data['IDCliente']."");
		$this->db->trans_complete();
	}

	public function delete_permiso($data)
	{
		$this->db->delete('permisos', $data,
											"pantalla ='".$data['pantalla']."'",
											"accion ='".$data['accion']."'",
											"allow ='".$data['allow']."'");
	}

}
?>
