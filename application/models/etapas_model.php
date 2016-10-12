<?php
class Etapas_model extends CI_Model
{
	public function __construct()
	{
		parent:: __construct();
	}

	public function getall_etapas()
	{
		$query = $this->db->get('etapas');
		return $query->result();
	}

	public function get_etapa($id)
	{
		$query = $this->db->get_where('etapas', array('IDEtapa =' => $id));
		return $query->result();
	}

	public function insert_etapas($data)
	{
		$this->db->insert('etapas',$data);
	}

	public function update_etapas($data)
	{
		$this->db->update('etapas', $data, "IDEtapa ='".$data['IDEtapa']."'");
	}

	public function verif_etapa($id)
	{
		$consulta = $this->db->get_where('etapas', array('IDEtapa =' => $id));

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
