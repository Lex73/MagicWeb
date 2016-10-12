<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Clientes extends CI_Controller {

	private $mensaje;

	public function __construct()
	{
		parent:: __construct();
		$this->very_sesion();
		$this->load->model('clientes_model');
		$this->load->model('permisos_model');
		$this->mensaje = '';
	}

	public function index()
	{
		$data['query'] = $this->clientes_model->getall_clientes();

		$data['titulo'] = 'Clientes';
		$data['mensaje'] = $this->mensaje;
		$data['usuario'] = $this->session->userdata('usuario');
		$data['nombre'] = $this->session->userdata('nombre');
		$data['perfil'] = $this->session->userdata('perfil');

		$data['accion'] = 'VER';

		$permiso = $this->permisos_model->get_permiso($data);

		if($permiso == true)
        {
        	$data['accion'] = 'ADD';
			$data['agregar'] = $this->permisos_model->get_permiso($data);
			$data['accion'] = 'MOD';
			$data['modificar'] =$this->permisos_model->get_permiso($data);
			$this->load->view('Plantilla/Header',$data);
			$this->load->view('Clientes/Index');
			$this->load->view('Plantilla/Footer');
		}
		else
		{
			$this->load->view('Plantilla/Header',$data);
			$this->load->view('Errores/Index');
			$this->load->view('Plantilla/Footer');
		}
	}

	public function agregar()
	{
		$data['titulo'] = 'ABM Cliente';

		$data['usuario'] = $this->session->userdata('usuario');
		$data['nombre'] = $this->session->userdata('nombre');
		$data['perfil'] = $this->session->userdata('perfil');
		$data['mensaje'] = $this->mensaje;
		$this->load->view('Plantilla/Header',$data);
		$this->load->view('Clientes/ABMClientes');
		$this->load->view('Plantilla/Footer');
	}

	public function modificar($id)
	{
		$data['titulo'] = 'ABM Cliente';
		$val['clientes'] = $this->clientes_model->get_cliente($id);

		$data['usuario'] = $this->session->userdata('usuario');
		$data['nombre'] = $this->session->userdata('nombre');
		$data['perfil'] = $this->session->userdata('perfil');
		$data['mensaje'] = $this->mensaje;

		$this->load->view('Plantilla/Header',$data);
		$this->load->view('Clientes/ABMClientes',$val);
		$this->load->view('Plantilla/Footer');
	}

	public function operaciones_clientes()
	{
		if($this->input->post('submit_Agregar_Cliente'))
		{
			$this->form_validation->set_rules("NombreCliente","Nombre Cliente","required|trim|xss_clean");

			$this->form_validation->set_message('required','El campo %s es obligatorio.');

			if($this->form_validation->run() == FALSE)
			{
				$this->agregar();
			}
			else
			{
				$data = array('NombreCliente' => $this->input->post('NombreCliente',TRUE));

				$this->db->trans_start();
				$this->clientes_model->insert_cliente($data);
				$this->db->trans_complete();

				$this->mensaje  = 'Acción completada exitosamente.';
				$this->index();
			}
		}
		else if($this->input->post('submit_Modificar_Cliente'))
		{
			$this->form_validation->set_rules("NombreCliente","Nombre Cliente","required|trim|xss_clean");

			$this->form_validation->set_message('required','El campo %s es obligatorio.');

			if($this->form_validation->run() == FALSE)
			{
				$this->modificar($this->input->post('IDCliente',TRUE));
			}
			else
			{
				$data = array('IDCliente' => $this->input->post('IDCliente',TRUE),
						      'NombreCliente' => $this->input->post('NombreCliente',TRUE));

				$this->db->trans_start();
				$this->clientes_model->update_cliente($data);
				$this->db->trans_complete();

				$this->mensaje  = 'Acción completada exitosamente.';
				$this->index();
			}
		}
		else
		{

		}
	}

	function very_sesion()
	{
		if(!$this->session->userdata('usuario'))
		{
			redirect(base_url().'login/');
		}
	}
}
?>
