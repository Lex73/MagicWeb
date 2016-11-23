<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent:: __construct();
		$this->load->model('proyectos_model');
		$this->load->model('documentos_model');
		$this->load->model('usuarios_model');
		$this->very_sesion();
	}

	public function index()
	{
		$data['usuario'] = $this->session->userdata('usuario');
		$data['nombre'] = $this->session->userdata('nombre');
		$data['perfil'] = $this->session->userdata('perfil');
		$data['db'] = $this->session->userdata('db');
		$data['dbdriver'] = $this->session->userdata('dbdriver');

		if ($this->session->userdata('cambia') == 1)
		{
				$data['titulo']= 'Clave';
				$data['cambia']= 1;
				$this->load->view('Plantilla/Header',$data);
				$this->load->view('Usuarios/CambiaClave');
		}
		else
		{
				$data['titulo']= 'Home';
				$data['cambia']= 0;
				$data['proyectos']= $this->proyectos_model->numero_proyectos();
				$data['documentos']= $this->documentos_model->numero_documentos();
				$data['usuarios']= $this->usuarios_model->numero_usuarios();
				$data['proximo']= $this->documentos_model->get_CodigoProt();
				$this->load->view('Plantilla/Header',$data);
				$this->load->view('Home/Index');
		}

	$this->load->view('Plantilla/Footer',$data);
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
