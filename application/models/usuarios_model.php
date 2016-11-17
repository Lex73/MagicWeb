<?php
class Usuarios_model extends CI_Model
{
	public function __construct()
	{
		parent:: __construct();
		$this->load->helper('security');
	}

	public function getall_usuarios()
	{
		$this->db->select('*');
		$this->db->from('usuarios');
		$this->db->join('perfiles', 'perfiles.IDPerfiles = usuarios.IDProfile');

		$query = $this->db->get();
		return $query->result();
	}

	public function get_usuario($id)
	{
		$this->db->select('*');
		$this->db->from('usuarios');
		$this->db->join('perfiles', 'perfiles.IDPerfiles = usuarios.IDProfile');
		$this->db->where('IDUsuario',$id);
		$query = $this->db->get();

		return $query->result();
	}

	public function verif_usuario($id)
	{
		$consulta = $this->db->get_where('usuarios', array('IDUsuario =' => $id));

		if($consulta->num_rows() == 1)
		{
			return true;
		}
		else
		{
			return false;
		}

	}

	public function insert_usuario($data)
	{
		$this->db->trans_start();
		$data['ClaveUsuario'] = do_hash($data['ClaveUsuario'], 'md5');
		$this->db->insert('usuarios',$data);
		$this->db->trans_complete();
	}

	public function update_usuario($data)
	{
		$this->db->trans_start();
		$this->db->update('usuarios', $data, "IDUsuario ='".$data['IDUsuario']."'");
		$this->db->trans_complete();
	}

	public function very_user($data)
	{
		$query = $this->db->get_where('usuarios',$data);
		return $query->result();
	}

	public function blanquea_clave($id)
	{
		$this->db->trans_start();
		$data = array('ClaveUsuario' => do_hash('654321','md5'),
									'Cambia' =>1);

		$condicion = "IDUsuario = '".$id."'";

		$str = $this->db->update_string('usuarios', $data, $condicion);

		$this->db->query($str);
		$this->db->trans_complete();
	}

	public function cambia_clave($data)
	{
		$this->db->trans_start();
		$sql = array('ClaveUsuario' => do_hash($data['ClaveUsuario'],'md5'),
								 'Cambia' => 0);

		$condicion = "IDUsuario = '".$data['IDUsuario']."'";

		$str = $this->db->update_string('usuarios', $sql, $condicion);

		$this->db->query($str);
		$this->db->trans_complete();
	}

	function numero_usuarios()
	{
		$this->db->select('*');
		$this->db->from('usuarios');
		$query = $this->db->get();
		$users = 0;

		foreach ($query->result() as $row)
		{
			$users++;
		}

		return $users;
	}
}
?>
