<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		$this->very_sesion();
	}

	public function index()
	{
		$data['titulo'] = 'About';
		$data['usuario'] = $this->session->userdata('usuario');
		$data['nombre'] = $this->session->userdata('nombre');
		$data['perfil'] = $this->session->userdata('perfil');
		$this->load->view('Plantilla/Header',$data);
		$this->load->view('About/Index');
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
