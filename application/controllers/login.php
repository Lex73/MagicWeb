<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		$this->session->unset_userdata('usuario');
		$this->load->model('usuarios_model');
		$this->load->model('documentos_model');
	}

	public function index()
	{
		$data['titulo'] = 'Login';
		$resultado = $this->documentos_model->obtiene_year();
		$hoy = getdate();
		foreach ($resultado as $row)
		{
				if($hoy['year'] != $row->year)
				{
						$this->db->trans_start();
						$this->documentos_model->aumenta_year($hoy['year']);
						$data['year'] = 'Se ha cambiado el año y se re inician los contadores';
						$this->db->trans_complete();
				}
				else
				{
						$data['year'] = 'Se ha verificado el año y no es necesartio re iniciar los contadores';
				}

		}
		$this->load->view('Login/Index',$data);
	}

	public function ingresar()
	{
		if($this->input->post('submit_login'))
		{
			$data = array('IDUsuario'=>$this->input->post('inputUser',TRUE),
						  			//'ClaveUsuario'=>$this->input->post('inputPassword',TRUE)
						  			'ClaveUsuario'=>do_hash($this->input->post('inputPassword',TRUE),'md5'));

			$resultado  = $this->usuarios_model->very_user($data);

			foreach ($resultado as $row)
			{
				$datos = array('usuario'=> $row->IDUsuario,
							   			 'nombre'=> $row->NombreUsuario,
							   	 		 'perfil'=> $row->IDProfile,
										 	 'cambia'=> $row->Cambia);

				$this->session->set_userdata($datos);
				redirect(base_url().'home/');
				return;
			}

				$data = array('mensaje' => 'El usuario y/o la contraseña son incorrectos.');
				$this->load->view('Login/Index',$data);
		}
		else
		{
			$this->index();
		}
	}
}
?>
