<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Permisos extends CI_Controller {

			public function __construct()
			{
				parent:: __construct();
				$this->load->model('permisos_model');
				$this->very_sesion();
			}

			public function index()
			{

			}

			public function agregar($IDPerfil)
			{
				$data['titulo'] = 'Alta Permiso';

				$data['pantallas'] = $this->permisos_model->getall_pantallas();

				$data['usuario'] = $this->session->userdata('usuario');
				$data['nombre'] = $this->session->userdata('nombre');
				$data['perfil'] = $this->session->userdata('perfil');
				$data['perfiles'] = $IDPerfil;
				$this->load->view('Plantilla/Header',$data);
				$this->load->view('Perfiles/ABMPermisos');
				$this->load->view('Plantilla/Footer');
			}

			public function eliminar($pantalla,$accion,$allow)
			{
				$data = array('pantalla' => $pantalla,
											'accion' => $accion,
										  'allow' => $allow);

				$this->db->trans_start();
				$this->permisos_model->delete_permiso($data);
				$this->db->trans_complete();

				redirect(base_url().'perfiles/modificar/'.$allow);

			}

			public function operaciones_permisos()
			{
				if($this->input->post('Form_Agregar_Permiso'))
				{
					$this->form_validation->set_rules("Pantalla","Pantalla","required|trim|xss_clean");
					$this->form_validation->set_rules("Permiso","Permiso","required|trim|xss_clean");

					$this->form_validation->set_message('required','El campo %s es obligatorio.');

					if($this->form_validation->run() == FALSE)
					{
						$this->agregar($this->input->post('IDPerfiles',TRUE));
					}
					else
					{
						$data = array('pantalla' => $this->input->post('Pantalla',TRUE),
													'accion' => $this->input->post('Permiso',TRUE),
													'allow' => $this->input->post('IDPerfiles',TRUE));


						if(!$this->permisos_model->very_permiso($data))
						{
								$this->db->trans_start();
								$this->permisos_model->insert_permiso($data);
								$this->db->trans_complete();
								redirect(base_url().'perfiles/modificar/'.$this->input->post('IDPerfiles',TRUE));
					  }
						else
						{
								redirect(base_url().'perfiles/modificar/'.$this->input->post('IDPerfiles',TRUE));
						}
					}
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
