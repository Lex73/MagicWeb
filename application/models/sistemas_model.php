<?php
class Sistemas_model extends CI_Model
{
	public function __construct()
	{
		parent:: __construct();
	}

	public function getall_sistemas()
	{
		$query = $this->db->get('sistemas');
		return $query->result();
	}

		public function get_sistema($id)
	{
		$query = $this->db->get_where('sistemas', array('IDSistema =' => $id));
		return $query->result();
	}

	public function insert_sistema($data)
	{
		$this->db->trans_start();
		$this->db->insert('sistemas',$data);
		$this->db->trans_complete();
	}

	public function update_sistema($data)
	{
		$this->db->trans_start();
		$this->db->update('sistemas', $data, "IDSistema ='".$data['IDSistema']."'");
		$this->db->trans_complete();
	}


	public function verif_sistemas($id)
	{
		$consulta = $this->db->get_where('sistemas', array('IDSistema =' => $id));

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
