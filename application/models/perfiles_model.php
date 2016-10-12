<?php
class Perfiles_model extends CI_Model
{
	public function __construct()
	{
		parent:: __construct();
	}

	public function getall_perfiles()
	{
		$query = $this->db->get('perfiles');
		return $query->result();
	}

	public function get_perfil($id)
	{
		$query = $this->db->get_where('perfiles', array('IDPerfiles =' => $id));
		return $query->result();
	}

	public function insert_perfiles($data)
	{
		$this->db->insert('perfiles',$data);
	}

	public function update_perfiles($data)
	{
		$this->db->update('perfiles', $data, "IDPerfiles ='".$data['IDPerfiles']."'");
	}

	public function verif_perfil($id)
	{
		$consulta = $this->db->get_where('perfiles', array('IDPerfiles =' => $id));

		if($consulta->num_rows() == 1)
		{
			return true;
		}
		else
		{
			return false;
		}

	}
}
?>
