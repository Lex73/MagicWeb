<?php
class Estados_model extends CI_Model
{
	public function __construct()
	{
		parent:: __construct();
	}

	public function getall_estados()
	{
		$query = $this->db->get('estados');
		return $query->result();
	}

		public function get_estado($id)
	{
		$query = $this->db->get_where('estados', array('IDEstados =' => $id));
		return $query->result();
	}

	public function insert_estados($data)
	{
		$this->db->insert('estados',$data);
	}

	public function update_estados($data)
	{
		$this->db->update('estados', $data, "IDEstados ='".$data['IDEstados']."'");
	}

	public function verif_estado($id)
	{
		$consulta = $this->db->get_where('estados', array('IDEstados =' => $id));

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
