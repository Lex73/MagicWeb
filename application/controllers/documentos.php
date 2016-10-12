<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Documentos extends CI_Controller
{
	private $mensaje;

	public function __construct()
	{
		parent:: __construct();
		$this->very_sesion();
		$this->mensaje = '';
		$this->load->model('permisos_model');
		$this->load->model('documentos_model');
		$this->load->model('proyectos_model');
		$this->load->model('etapas_model');
		$this->load->model('sistemas_model');
		$this->load->model('estados_model');
	}

	public function index($idProyecto, $idItem)
	{
		$data['titulo'] = 'Documentos';
		$data['mensaje'] = $this->mensaje;
		$data['usuario'] = $this->session->userdata('usuario');
		$data['nombre'] = $this->session->userdata('nombre');
		$data['perfil'] = $this->session->userdata('perfil');
		$data['query'] = $this->documentos_model->getall_documentos_por_item($idProyecto,$idItem);
		$data['proy'] = $this->proyectos_model->get_proyecto($idProyecto);
		$data['item'] = $this->proyectos_model->get_item_proyecto($idProyecto,$idItem);

		$data['accion'] = 'ADD';
		$data['agregar'] = $this->permisos_model->get_permiso($data);
		$data['accion'] = 'MOD';
		$data['modificar'] =$this->permisos_model->get_permiso($data);

		$this->load->view('Plantilla/Header',$data);
		$this->load->view('Documentos/Index');
		$this->load->view('Plantilla/Footer');

	}

	public function agregar($idProyecto,$idItem)
	{
		$data['titulo'] = 'ABM Documentos';

		$data['usuario'] = $this->session->userdata('usuario');
		$data['nombre'] = $this->session->userdata('nombre');
		$data['perfil'] = $this->session->userdata('perfil');
		$data['mensaje'] = $this->mensaje;
		$data['proy'] = $this->proyectos_model->get_proyecto($idProyecto);
		$data['item'] = $this->proyectos_model->get_item_proyecto($idProyecto,$idItem);
		$data['etapas'] = $this->etapas_model->getall_etapas();
		$data['sistemas'] = $this->sistemas_model->getall_sistemas();
		$data['estados'] = $this->estados_model->getall_estados();

		$this->load->view('Plantilla/Header',$data);
		$this->load->view('Documentos/ABMDocumentos');
		$this->load->view('Plantilla/Footer');
	}

	public function modificar($idProyecto,$idItem,$CodigoProtocolo)
	{
		$data['titulo'] = 'ABM Documentos';

		$data['usuario'] = $this->session->userdata('usuario');
		$data['nombre'] = $this->session->userdata('nombre');
		$data['perfil'] = $this->session->userdata('perfil');
		$data['mensaje'] = $this->mensaje;
		$data['proy'] = $this->proyectos_model->get_proyecto($idProyecto);
		$data['item'] = $this->proyectos_model->get_item_proyecto($idProyecto,$idItem);
		$data['etapas'] = $this->etapas_model->getall_etapas();
		$data['sistemas'] = $this->sistemas_model->getall_sistemas();
		$data['estados'] = $this->estados_model->getall_estados();
		$data['documento'] = $this->documentos_model->get_documento($CodigoProtocolo);
		$data['soloVer'] = 'N';

		$this->load->view('Plantilla/Header',$data);
		$this->load->view('Documentos/ABMDocumentos');
		$this->load->view('Plantilla/Footer');
	}

	public function ver($idProyecto,$idItem,$CodigoProtocolo)
	{
		$data['titulo'] = 'ABM Documentos';

		$data['usuario'] = $this->session->userdata('usuario');
		$data['nombre'] = $this->session->userdata('nombre');
		$data['perfil'] = $this->session->userdata('perfil');
		$data['mensaje'] = $this->mensaje;
		$data['proy'] = $this->proyectos_model->get_proyecto($idProyecto);
		$data['item'] = $this->proyectos_model->get_item_proyecto($idProyecto,$idItem);
		$data['etapas'] = $this->etapas_model->getall_etapas();
		$data['sistemas'] = $this->sistemas_model->getall_sistemas();
		$data['estados'] = $this->estados_model->getall_estados();
		$data['documento'] = $this->documentos_model->get_documento($CodigoProtocolo);
		$data['soloVer'] = 'S';

		$this->load->view('Plantilla/Header',$data);
		$this->load->view('Documentos/ABMDocumentos');
		$this->load->view('Plantilla/Footer');
	}

	public function operaciones_documentos()
	{
		if($this->input->post('submit_Agregar_Documentos'))
		{
			$this->form_validation->set_rules("CodigoProtocolo","Codigo Protocolo","required|trim|xss_clean");
			$this->form_validation->set_rules("NombreProtocolo","Nombre Protocolo","required|trim|xss_clean");
			//$this->form_validation->set_rules("idEt","Etapa","required|trim|xss_clean");
			$this->form_validation->set_rules("Sistema","Sistema","required|trim|xss_clean");
			$this->form_validation->set_rules("Estado","Estado","required|trim|xss_clean");

			$this->form_validation->set_message('required','El campo %s es obligatorio.');

			if($this->form_validation->run() == FALSE)
			{
				$this->agregar($this->input->post('IDProyecto',TRUE),$this->input->post('IDItemProyecto',TRUE));
			}
			else
			{
				$codigo = $this->input->post('CodigoProtocolo',TRUE);

				$data = array('CodigoProtocolo' => $codigo);

				//Verifico primero que el numero no sea existente
				$existe = $this->documentos_model->get_cod_documento($data);

				if ($existe == true)
				{
					$id = $this->input->post('idEt',TRUE);
					$etapa = $this->etapas_model->get_etapa($id);

					foreach ($etapa as $row)
					{
						$idetapa = $row->ClaveProt;
					}

					$proximo = $this->documentos_model->get_CodigoProt();

					foreach ($proximo as $row)
					{
						$siguiente = $row->siguiente;
						$year = substr($row->year, -3);

						if($siguiente < 10)
						{
							$siguiente = '00'.$siguiente;
						}
						else if($siguiente < 100)
						{
							$siguiente = '0'.$siguiente;
						}

						$codigo = $year.'BA'.$siguiente.'-'.'00'.'.'.$idetapa;
					}
				}

				$data = array('CodigoProtocolo' => $codigo,
										  'NombreProtocolo' => $this->input->post('NombreProtocolo',TRUE),
										  'IDEtapa' => $this->input->post('Et',TRUE),
										  'IDCliente' => $this->input->post('IDCliente',TRUE),
										  'IDSistema' => $this->input->post('Sistema',TRUE),
										  'IDProyecto' => $this->input->post('IDProyecto',TRUE),
										  'CodigoCliente' => $this->input->post('CodigoCliente',TRUE),
										  'FechaEntrega' => $this->input->post('FechaEntrega',TRUE),
										  'IDEstado' => $this->input->post('Estado',TRUE),
										  'IDItemProyecto' => $this->input->post('IDItemProyecto',TRUE),
										  'nuevaversion' => 'N');

				$this->db->trans_start();
				$this->documentos_model->insert_documento($data);

				$query['proximo'] = $this->documentos_model->get_CodigoProt();
				foreach ($query['proximo'] as $value)
				{
						$this->documentos_model->aumenta_numero($value->siguiente + 1);
				}
				$this->db->trans_complete();

				$this->mensaje  = 'Acción completada exitosamente.';
				$this->index($this->input->post('IDProyecto',TRUE),$this->input->post('IDItemProyecto',TRUE));
			}
		}
		else if($this->input->post('submit_Modificar_Documentos'))
		{
				$this->form_validation->set_rules("NombreProtocolo","Nombre Protocolo","required|trim|xss_clean");
				$this->form_validation->set_rules("Sistema","Sistema","required|trim|xss_clean");
				$this->form_validation->set_rules("Estado","Estado","required|trim|xss_clean");

				$this->form_validation->set_message('required','El campo %s es obligatorio.');

				if($this->form_validation->run() == FALSE)
				{
					$this->modificar($this->input->post('IDProyecto',TRUE),
									 $this->input->post('IDItemProyecto',TRUE),
									 $this->input->post('CodigoProtocolo',TRUE));
				}
				else
				{
					$data = array('CodigoProtocolo' => $this->input->post('CodigoProtocolo',TRUE),
								  			'NombreProtocolo' => $this->input->post('NombreProtocolo',TRUE),
											  'IDEtapa' => $this->input->post('Et',TRUE),
											  'IDCliente' => $this->input->post('IDCliente',TRUE),
											  'IDSistema' => $this->input->post('Sistema',TRUE),
											  'IDProyecto' => $this->input->post('IDProyecto',TRUE),
											  'CodigoCliente' => $this->input->post('CodigoCliente',TRUE),
											  'FechaEntrega' => $this->input->post('FechaEntrega',TRUE),
											  'IDEstado' => $this->input->post('Estado',TRUE),
											  'IDItemProyecto' => $this->input->post('IDItemProyecto',TRUE),
										  	'nuevaversion' => 'N');

					if($this->input->post('VersionNueva',TRUE) == 'N')
					{
						$this->db->trans_start();
						$this->documentos_model->update_documento($data);
						$this->db->trans_complete();
					}
					else
					{
						$this->db->trans_start();
						$this->documentos_model->insert_documento($data);
						$data = array('CodigoProtocolo' => $this->input->post('CodigoAnterior',TRUE),
							  	        'nuevaversion' => 'S');
						$this->documentos_model->update_documento($data);
						$this->db->trans_complete();
					}

					$this->mensaje  = 'Acción completada exitosamente.';
					$this->index($this->input->post('IDProyecto',TRUE),$this->input->post('IDItemProyecto',TRUE));
				}
		}
	}

	public function newVersionProt()
	{
		if(!$this->input->is_ajax_request())
		{
			redirect('404');
		}
		else
		{
			$CodigoProtocolo = $this->input->post('CodigoProtocolo',TRUE);
			$Part1 = explode('-',$CodigoProtocolo);
			$Part2 = explode('.',$Part1[1]);
			$Version = $Part2[0] + 1;

			if($Version < 10)
			{
				$Version = '0'.$Version;
			}

			echo $Part1[0].'-'.$Version.'.'.$Part2[1];
		}
	}

	public function getCodigoProt()
	{
		if(!$this->input->is_ajax_request())
		{
			redirect('404');
		}
		else
		{
			$this->form_validation->set_rules("idEt","Etapa","required|trim|xss_clean");

			$this->form_validation->set_message('required','El campo %s es obligatorio.');

			if($this->form_validation->run() == FALSE)
			{
				echo 'Primero se debe elegir la etapa.';
			}
			else
			{
				$id = $this->input->post('idEt',TRUE);
				$etapa = $this->etapas_model->get_etapa($id);

				foreach ($etapa as $row)
				{
					$idetapa = $row->ClaveProt;
				}

				$proximo = $this->documentos_model->get_CodigoProt();

				foreach ($proximo as $row)
				{
					$siguiente = $row->siguiente;
					$year = substr($row->year, -3);

					if($siguiente < 10)
					{
						$siguiente = '00'.$siguiente;
					}
					else if($siguiente < 100)
					{
						$siguiente = '0'.$siguiente;
					}

					echo $year.'BA'.$siguiente.'-'.'00'.'.'.$idetapa;
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
