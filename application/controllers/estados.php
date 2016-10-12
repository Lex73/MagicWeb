<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Estados extends CI_Controller {

	private $mensaje;

	public function __construct()
	{
		parent:: __construct();
		$this->very_sesion();
		$this->load->model('estados_model');
		$this->load->model('permisos_model');
		$this->mensaje = '';
	}

	public function index()
	{
		$data['query'] = $this->estados_model->getall_estados();

		$data['titulo'] = 'Estados';
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
			$this->load->view('Estados/Index');
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
		$data['titulo'] = 'ABM Estados';

		$data['usuario'] = $this->session->userdata('usuario');
		$data['nombre'] = $this->session->userdata('nombre');
		$data['perfil'] = $this->session->userdata('perfil');
		$this->load->view('Plantilla/Header',$data);
		$this->load->view('Estados/ABMEstados');
		$this->load->view('Plantilla/Footer');
	}

	public function modificar($id)
	{
		$data['titulo'] = 'ABM Estados';
		$val['estados'] = $this->estados_model->get_estado($id);

		$data['usuario'] = $this->session->userdata('usuario');
		$data['nombre'] = $this->session->userdata('nombre');
		$data['perfil'] = $this->session->userdata('perfil');

		$this->load->view('Plantilla/Header',$data);
		$this->load->view('Estados/ABMEstados',$val);
		$this->load->view('Plantilla/Footer');
	}

	public function operaciones_estados()
	{
		if($this->input->post('submit_Agregar_Estado'))
		{
			$this->form_validation->set_rules("IDEstados","ID Estado","required|trim|xss_clean|callback_idestado_check");
			$this->form_validation->set_rules("NombreEstado","Nombre Estado","required|trim|xss_clean");

			$this->form_validation->set_message('required','El campo %s es obligatorio.');
			$this->form_validation->set_message('idestado_check','El %s ya existe.');

			if($this->form_validation->run() == FALSE)
			{
				$this->agregar();
			}
			else
			{
				$data = array('IDEstados' => $this->input->post('IDEstados',TRUE),
						      		'NombreEstado' => $this->input->post('NombreEstado',TRUE));

				$this->db->trans_start();
				$this->estados_model->insert_estados($data);
				$this->db->trans_complete();

				$this->mensaje  = 'Acción completada exitosamente.';
				$this->index();
			}
		}
		else if($this->input->post('submit_Modificar_Estado'))
		{
			$this->form_validation->set_rules("NombreEstado","Nombre","required|trim|xss_clean");

			$this->form_validation->set_message('required','El campo %s es obligatorio.');

			if($this->form_validation->run() == FALSE)
			{
				$this->modificar($this->input->post('IDEstados',TRUE));
			}
			else
			{
				$data = array('IDEstados' => $this->input->post('IDEstados',TRUE),
						      'NombreEstado' => $this->input->post('NombreEstado',TRUE));

				$this->db->trans_start();
				$this->estados_model->update_estados($data);
				$this->db->trans_complete();

				$this->mensaje  = 'Acción completada exitosamente.';
				$this->index();
			}
		}
		else
		{

		}
	}

	function idestado_check($id)
    {
    	$val = $this->estados_model->verif_estado($id);

    	if($val == true)
    	{
    		return false;
    	}
    	else
    	{
    		return true;
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
