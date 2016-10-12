<?php
class Documentos_model extends CI_Model
{
	public function __construct()
	{
		parent:: __construct();
	}

	public function getall_documentos()
	{
		$this->db->select('*');
		$this->db->from('proyectos');
		$this->db->join('clientes', 'clientes.IDCliente = proyectos.IDCliente');

		$query = $this->db->get();
		return $query->result();
	}

	public function get_cod_documento($data)
	{
		$this->db->select('*');
		$this->db->from('documentos');
		$this->db->where('CodigoProtocolo', $data['CodigoProtocolo']);
		$query = $this->db->get();

		if($query->num_rows() > 0)//si el codigo ya existe
		{
			return true;
		}
		else //si no existe
		{
			return false;
		}
	}

	public function aumenta_numero($numero)
	{
		$data = array('siguiente' => $numero);
		$this->db->update('numero', $data);
	}

	public function obtiene_year()
	{
		$query = $this->db->get('numero');
		return $query->result();
	}
	public function aumenta_year($year)
	{
		$data = array('year' => $year,
									'siguiente' => 1);

		$this->db->update('numero', $data);
	}

	public function getall_documentos_por_item($IDProyecto,$IDItemProyecto)
	{
		$this->db->select('*');
		$this->db->from('documentos');
		$this->db->join('etapas', 'etapas.IDEtapa = documentos.IDEtapa');
		$this->db->join('clientes', 'clientes.IDCliente = documentos.IDCliente');
		$this->db->join('sistemas', 'sistemas.IDSistema = documentos.IDSistema');
		$this->db->join('proyectos', 'proyectos.IDProyecto = documentos.IDProyecto');
		$this->db->join('itemproyecto', 'itemproyecto.IDItemProyecto = documentos.IDItemProyecto');
		$this->db->join('estados', 'estados.IDEstados = documentos.IDEstado');
		$this->db->where('documentos.IDProyecto', $IDProyecto);
		$this->db->where('documentos.IDItemProyecto', $IDItemProyecto);
		$query = $this->db->get();
		return $query->result();
	}

	public function insert_documento($data)
	{
		$this->db->insert('documentos',$data);
	}

	public function get_documento($id)
	{
		$query = $this->db->get_where('documentos', array('CodigoProtocolo =' => $id));
		return $query->result();
	}

	public function get_CodigoProt()
	{
		$query = $this->db->get('numero');
		return $query->result();
	}

	public function update_documento($data)
	{
		$this->db->update('documentos', $data, "CodigoProtocolo ='".$data['CodigoProtocolo']."'");
	}

}
?>
