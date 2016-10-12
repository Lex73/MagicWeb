<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Etapas extends CI_Controller {

	private $mensaje;

	public function __construct()
	{
		parent:: __construct();
		$this->very_sesion();
		$this->load->model('etapas_model');
		$this->load->model('permisos_model');
		$this->mensaje = '';
	}

	public function index()
	{
		$data['query'] = $this->etapas_model->getall_etapas();

		$data['titulo'] = 'Etapas';
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
			$this->load->view('Etapas/Index');
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
		$data['titulo'] = 'ABM Etapas';

		$data['usuario'] = $this->session->userdata('usuario');
		$data['nombre'] = $this->session->userdata('nombre');
		$data['perfil'] = $this->session->userdata('perfil');
		$this->load->view('Plantilla/Header',$data);
		$this->load->view('Etapas/ABMEtapas');
		$this->load->view('Plantilla/Footer');
	}

	public function modificar($id)
	{
		$data['titulo'] = 'ABM Etapas';
		$val['etapas'] = $this->etapas_model->get_etapa($id);

		$data['usuario'] = $this->session->userdata('usuario');
		$data['nombre'] = $this->session->userdata('nombre');
		$data['perfil'] = $this->session->userdata('perfil');

		$this->load->view('Plantilla/Header',$data);
		$this->load->view('Etapas/ABMEtapas',$val);
		$this->load->view('Plantilla/Footer');
	}

	public function operaciones_etapas()
	{
		if($this->input->post('submit_Agregar_Etapas'))
		{
			$this->form_validation->set_rules("IDEtapa","ID Etapa","required|trim|xss_clean|callback_idtapa_check");
			$this->form_validation->set_rules("NombreEtapa","Nombre Etapa","required|trim|xss_clean");
			$this->form_validation->set_rules("ClaveProt","Clave Protocolo","required|trim|xss_clean");
			$this->form_validation->set_rules("ClaveInf","Clave Informe","required|trim|xss_clean");

			$this->form_validation->set_message('required','El campo %s es obligatorio.');
			$this->form_validation->set_message('idtapa_check','El %s ya existe.');

			if($this->form_validation->run() == FALSE)
			{
				$this->agregar();
			}
			else
			{
				$data = array('IDEtapa' => $this->input->post('IDEtapa',TRUE),
						      		'NombreEtapa' => $this->input->post('NombreEtapa',TRUE),
						      		'ClaveProt' => $this->input->post('ClaveProt',TRUE),
						      		'ClaveInf' => $this->input->post('ClaveInf',TRUE));

				$this->db->trans_start();
				$this->etapas_model->insert_etapas($data);
				$this->db->trans_complete();

				$this->mensaje  = 'Acción completada exitosamente.';
				$this->index();
			}
		}
		else if($this->input->post('submit_Modificar_Etapas'))
		{
			$this->form_validation->set_rules("NombreEtapa","Nombre Etapa","required|trim|xss_clean");
			$this->form_validation->set_rules("ClaveProt","Clave Protocolo","required|trim|xss_clean");
			$this->form_validation->set_rules("ClaveInf","Clave Informe","required|trim|xss_clean");

			$this->form_validation->set_message('required','El campo %s es obligatorio.');

			if($this->form_validation->run() == FALSE)
			{
				$this->modificar($this->input->post('IDEtapa',TRUE));
			}
			else
			{
				$data = array('IDEtapa' => $this->input->post('IDEtapa',TRUE),
						      		'NombreEtapa' => $this->input->post('NombreEtapa',TRUE),
						      		'ClaveProt' => $this->input->post('ClaveProt',TRUE),
						      		'ClaveInf' => $this->input->post('ClaveInf',TRUE));

				$this->db->trans_start();
				$this->etapas_model->update_etapas($data);
				$this->db->trans_complete();

				$this->mensaje  = 'Acción completada exitosamente.';
				$this->index();
			}
		}
		else
		{

		}
	}

	function idtapa_check($id)
    {
    	$val = $this->etapas_model->verif_etapa($id);

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
