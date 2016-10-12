<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sistemas extends CI_Controller {

	private $mensaje;

	public function __construct()
	{
		parent:: __construct();
		$this->very_sesion();
		$this->load->model('sistemas_model');
		$this->load->model('permisos_model');
		$this->mensaje = '';
	}

	public function index()
	{
		$data['query'] = $this->sistemas_model->getall_sistemas();

		$data['titulo'] = 'Sistemas';
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
			$this->load->view('Sistemas/Index');
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
		$data['titulo'] = 'ABM Sistemas';

		$data['usuario'] = $this->session->userdata('usuario');
		$data['nombre'] = $this->session->userdata('nombre');
		$data['perfil'] = $this->session->userdata('perfil');
		$this->load->view('Plantilla/Header',$data);
		$this->load->view('Sistemas/ABMSistemas');
		$this->load->view('Plantilla/Footer');
	}

	public function modificar($id)
	{
		$data['titulo'] = 'ABM Sistemas';
		$val['sistemas'] = $this->sistemas_model->get_sistema($id);

		$data['usuario'] = $this->session->userdata('usuario');
		$data['nombre'] = $this->session->userdata('nombre');
		$data['perfil'] = $this->session->userdata('perfil');

		$this->load->view('Plantilla/Header',$data);
		$this->load->view('Sistemas/ABMSistemas',$val);
		$this->load->view('Plantilla/Footer');
	}

	public function operaciones_sistemas()
	{
		if($this->input->post('submit_Agregar_Sistema'))
		{
			$this->form_validation->set_rules("IDSistema","ID Sistemas","required|trim|xss_clean|callback_idsistema_check");
			$this->form_validation->set_rules("NombreSistema","Nombre Sistemas","required|trim|xss_clean");

			$this->form_validation->set_message('required','El campo %s es obligatorio.');
			$this->form_validation->set_message('idsistema_check','El %s ya existe.');

			if($this->form_validation->run() == FALSE)
			{
				$this->agregar();
			}
			else
			{
				$data = array('IDSistema' => $this->input->post('IDSistema',TRUE),
						      		'NombreSistema' => $this->input->post('NombreSistema',TRUE));

				$this->db->trans_start();
				$this->sistemas_model->insert_sistema($data);
				$this->db->trans_complete();

				$this->mensaje  = 'Acción completada exitosamente.';
				$this->index();
			}
		}
		else if($this->input->post('submit_Modificar_Sistema'))
		{
			$this->form_validation->set_rules("NombreSistema","Nombre","required|trim|xss_clean");

			$this->form_validation->set_message('required','El campo %s es obligatorio.');

			if($this->form_validation->run() == FALSE)
			{
				$this->modificar($this->input->post('IDSistema',TRUE));
			}
			else
			{
				$data = array('IDSistema' => $this->input->post('IDSistema',TRUE),
						      'NombreSistema' => $this->input->post('NombreSistema',TRUE));

				$this->db->trans_start();
				$this->sistemas_model->update_sistema($data);
				$this->db->trans_complete();

				$this->mensaje  = 'Acción completada exitosamente.';
				$this->index();
			}
		}
		else
		{

		}
	}

	function idsistema_check($id)
    {
    	$val = $this->sistemas_model->verif_sistemas($id);

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
