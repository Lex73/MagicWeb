<?php
class Proyectos_model extends CI_Model
{
	public function __construct()
	{
		parent:: __construct();
	}

	public function getall_proyectos()
	{
		$this->db->select('*');
		$this->db->from('proyectos');
		$this->db->join('clientes', 'clientes.IDCliente = proyectos.IDCliente');

		$query = $this->db->get();

		//$query = $this->db->get('proyectos');
		return $query->result();
	}

	public function get_proyecto($id)
	{
		$query = $this->db->get_where('proyectos', array('IDProyecto =' => $id));
		return $query->result();
	}

	public function get_items_proyecto($id)
	{
		$query = $this->db->get_where('itemproyecto', array('IDProyecto =' => $id));
		return $query->result();
	}

	public function get_item_proyecto($idproy,$iditem)
	{
		$query = $this->db->get_where('itemproyecto', array('IDProyecto =' => $idproy, 'IDItemProyecto =' => $iditem));
		return $query->result();
	}

	public function insert_items_proyecto($data)
	{
		$IDitem = $this->proximo_numero_item($data['IDProyecto']);

		$datos = array('IDProyecto' => $data['IDProyecto'],
					         'NombreItem' => $data['NombreItem'],
					         'Observaciones' => $data['Observaciones']);

		$this->db->insert('itemproyecto',$datos);
	}

	public function update_items_proyecto($data)
	{
		$this->db->trans_start();
		$this->db->update('itemproyecto',$data, "IDProyecto =".$data['IDProyecto']." AND "."IDItemProyecto =".$data['IDItemProyecto']."");
		$this->db->trans_complete();
	}

	public function insert_proyecto($data)
	{
		$this->db->trans_start();
		$this->db->insert('proyectos',$data);
		$this->db->trans_complete();
	}

	public function update_proyecto($data)
	{
		$this->db->trans_start();
		$this->db->update('proyectos', $data, "IDProyecto =".$data['IDProyecto']."");
		$this->db->trans_complete();
	}

	function proximo_numero_item($id)
	{
		$this->db->select_max('IDItemProyecto','Max_ID');
		$this->db->where('IDProyecto', $id);
		$query = $this->db->get('itemproyecto');

		foreach ($query->result() as $row)
		{
 			return $row->Max_ID;
		}
	}
}
?>
