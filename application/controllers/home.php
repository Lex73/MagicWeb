<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent:: __construct();
		$this->very_sesion();
	}

	public function index()
	{
		$data['usuario'] = $this->session->userdata('usuario');
		$data['nombre'] = $this->session->userdata('nombre');
		$data['perfil'] = $this->session->userdata('perfil');

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
				$this->load->view('Plantilla/Header',$data);
				$this->load->view('Home/Index');
		}

		$this->load->view('Plantilla/Footer');
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
