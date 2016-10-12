<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Perfiles extends CI_Controller
{
	private $mensaje;

	public function __construct()
	{
		parent:: __construct();
		$this->very_sesion();
		$this->load->model('perfiles_model');
		$this->load->model('permisos_model');
		$this->mensaje = '';
	}

	public function index()
	{
		$data['query'] = $this->perfiles_model->getall_perfiles();

		$data['titulo'] = 'Perfiles';
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
				$this->load->view('Perfiles/Index');
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
		$data['titulo'] = 'ABM Perfiles';

		$data['usuario'] = $this->session->userdata('usuario');
		$data['nombre'] = $this->session->userdata('nombre');
		$data['perfil'] = $this->session->userdata('perfil');
		$this->load->view('Plantilla/Header',$data);
		$this->load->view('Perfiles/ABMPerfiles');
		$this->load->view('Plantilla/Footer');
	}

	public function modificar($id)
	{
		$data['titulo'] = 'ABM Perfiles';
		$val['perfiles'] = $this->perfiles_model->get_perfil($id);

		$data['usuario'] = $this->session->userdata('usuario');
		$data['nombre'] = $this->session->userdata('nombre');
		$data['perfil'] = $this->session->userdata('perfil');

		$val['permisos']  = $this->permisos_model->getall_permisos_perfil($data);

		$this->load->view('Plantilla/Header',$data);
		$this->load->view('Perfiles/ABMPerfiles',$val);
		$this->load->view('Plantilla/Footer');
	}

	public function operaciones_perfil()
	{
		if($this->input->post('submit_Agregar_Perfiles'))
		{
			$this->form_validation->set_rules("IDPerfiles","ID Perfil","required|trim|xss_clean|callback_idperfil_check");
			$this->form_validation->set_rules("NombrePerfil","Nombre Perfil","required|trim|xss_clean");

			$this->form_validation->set_message('required','El campo %s es obligatorio.');
			$this->form_validation->set_message('idperfil_check','El %s ya existe.');

			if($this->form_validation->run() == FALSE)
			{
				$this->agregar();
			}
			else
			{
				$data = array('IDPerfiles' => $this->input->post('IDPerfiles',TRUE),
						      		'NombrePerfil' => $this->input->post('NombrePerfil',TRUE));

				$this->db->trans_start();
				$this->perfiles_model->insert_perfiles($data);
				$this->db->trans_complete();

				$this->mensaje  = 'Acción completada exitosamente.';
				$this->index();
			}
		}
		else if($this->input->post('submit_Modificar_Perfiles'))
		{
			$this->form_validation->set_rules("NombrePerfil","Nombre","required|trim|xss_clean");

			$this->form_validation->set_message('required','El campo %s es obligatorio.');

			if($this->form_validation->run() == FALSE)
			{
				$this->modificar($this->input->post('IDPerfiles',TRUE));
			}
			else
			{
				$data = array('IDPerfiles' => $this->input->post('IDPerfiles',TRUE),
						      		'NombrePerfil' => $this->input->post('NombrePerfil',TRUE));

				$this->db->trans_start();
				$this->perfiles_model->update_perfiles($data);
				$this->db->trans_complete();

				$this->mensaje  = 'Acción completada exitosamente.';
				$this->index();
			}
		}
		else
		{

		}
	}

	function idperfil_check($id)
  {
    	$val = $this->perfiles_model->verif_perfil($id);

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
