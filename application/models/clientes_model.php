<?php
class Clientes_model extends CI_Model
{
	public function __construct()
	{
		parent:: __construct();
	}

	public function getall_clientes()
	{
		$query = $this->db->get('clientes');
		return $query->result();
	}

		public function get_cliente($id)
	{
		$query = $this->db->get_where('clientes', array('IDCliente =' => $id));
		return $query->result();
	}

	public function insert_cliente($data)
	{
		$this->db->insert('clientes',$data);
	}

	public function update_cliente($data)
	{
		$this->db->update('clientes', $data, "IDCliente =".$data['IDCliente']."");
	}

}
?>
