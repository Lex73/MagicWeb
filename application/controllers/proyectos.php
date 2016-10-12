<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Proyectos extends CI_Controller {

	private $mensaje;

	public function __construct()
	{
		parent:: __construct();
		$this->very_sesion();
		$this->mensaje = '';
		$this->load->model('permisos_model');
		$this->load->model('proyectos_model');
		$this->load->model('clientes_model');
		$this->load->model('documentos_model');
	}

	public function index()
	{
		$data['titulo'] = 'Proyectos';
		$data['query'] = $this->proyectos_model->getall_proyectos();
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
			$this->load->view('Proyectos/Index');
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
		$data['titulo'] = 'Documentos';
		$data['accion'] = 'VER';
		$data['verDocs'] = false;

		$data['titulo'] = 'ABM Proyecto';
		$data['query'] = $this->clientes_model->getall_clientes();
		$data['mensaje'] = $this->mensaje;

		$data['usuario'] = $this->session->userdata('usuario');
		$data['nombre'] = $this->session->userdata('nombre');
		$data['perfil'] = $this->session->userdata('perfil');
		$this->load->view('Plantilla/Header',$data);
		$this->load->view('Proyectos/ABMProyectos');
		$this->load->view('Plantilla/Footer');
	}

	public function modificar($id)
	{
		$data['titulo'] = 'Documentos';
		$data['accion'] = 'VER';
		$data['verDocs'] = $this->permisos_model->get_permiso($data);
		$data['titulo'] = 'Items';
		$data['accion'] = 'VER';
		$data['verItems'] = $this->permisos_model->get_permiso($data);

		$data['titulo'] = 'ABM Proyecto';

		$data['proyecto'] = $this->proyectos_model->get_proyecto($id);
		$data['items'] = $this->proyectos_model->get_items_proyecto($id);
		$data['query'] = $this->clientes_model->getall_clientes();
		$data['mensaje'] = $this->mensaje;

		$data['usuario'] = $this->session->userdata('usuario');
		$data['nombre'] = $this->session->userdata('nombre');
		$data['perfil'] = $this->session->userdata('perfil');
		$this->load->view('Plantilla/Header',$data);
		$this->load->view('Proyectos/ABMProyectos');
		$this->load->view('Plantilla/Footer');

	}

	public function operaciones_proyectos()
	{
		if($this->input->post('submit_Agregar_Proyecto'))
		{
			$this->form_validation->set_rules("NombreProyecto","Nombre Proyecto","required|trim|xss_clean");
			$this->form_validation->set_rules("IDCliente","Cliente","required|trim|xss_clean");

			$this->form_validation->set_message('required','El campo %s es obligatorio.');

			if($this->form_validation->run() == FALSE)
			{
				$this->agregar();
			}
			else
			{
				$data = array('NombreProyecto' => $this->input->post('NombreProyecto',TRUE),
							  'IDCliente' => $this->input->post('IDCliente',TRUE));

				$this->db->trans_start();
				$this->proyectos_model->insert_proyecto($data);
				$this->db->trans_complete();

				$this->mensaje  = 'Acción completada exitosamente.';
				$this->index();
			}
		}
		else if($this->input->post('submit_Modificar_Proyecto'))
		{
			$this->form_validation->set_rules("NombreProyecto","Nombre Proyecto","required|trim|xss_clean");
			$this->form_validation->set_rules("IDCliente","Cliente","required|trim|xss_clean");

			$this->form_validation->set_message('required','El campo %s es obligatorio.');

			if($this->form_validation->run() == FALSE)
			{
				$this->modificar($this->input->post('IDProyecto',TRUE));
			}
			else
			{
				$data = array('IDProyecto' => $this->input->post('IDProyecto',TRUE),
							  'NombreProyecto' => $this->input->post('NombreProyecto',TRUE),
							  'IDCliente' => $this->input->post('IDCliente',TRUE));

				$this->db->trans_start();
				$this->proyectos_model->update_proyecto($data);
				$this->db->trans_complete();

				$this->mensaje  = 'Acción completada exitosamente.';
				$this->index();
			}
		}
		else if($this->input->post('submit_Ver_Documentos'))
		{
			$data['titulo'] = 'Documentos';
			$data['query'] = $this->documentos_model->getall_documentos($this->input->post('IDProyecto',TRUE));
			$data['mensaje'] = $this->mensaje;
			$data['usuario'] = $this->session->userdata('usuario');
			$data['nombre'] = $this->session->userdata('nombre');
			$data['perfil'] = $this->session->userdata('perfil');

			$this->load->view('Plantilla/Header',$data);
			$this->load->view('Errores/Index');
			$this->load->view('Plantilla/Footer');

		}
		else if($this->input->post('submit_Agregar_Item'))
		{
			$this->form_validation->set_rules("NombreItem","Nombre Item","required|trim|xss_clean");

			$this->form_validation->set_message('required','El campo %s es obligatorio.');

			if($this->form_validation->run() == FALSE)
			{
				$this->modificar($this->input->post('IDProyecto',TRUE));
			}
			else
			{
				$data = array('IDProyecto' => $this->input->post('IDProyecto',TRUE),
							  			'NombreItem' => $this->input->post('NombreItem',TRUE),
							  			'Observaciones' => $this->input->post('Observaciones',TRUE));

				$this->db->trans_start();
				$this->proyectos_model->insert_items_proyecto($data);
				$this->db->trans_complete();

				$this->mensaje  = 'Acción completada exitosamente.';
				$this->modificar($this->input->post('IDProyecto',TRUE));
			}
		}
		else if($this->input->post('submit_Modificar_Item'))
		{
			$this->form_validation->set_rules("NombreItem","Nombre Item","required|trim|xss_clean");

			$this->form_validation->set_message('required','El campo %s es obligatorio.');

			if($this->form_validation->run() == FALSE)
			{
				$this->modificar($this->input->post('IDProyecto',TRUE));
			}
			else
			{
				$data = array('IDProyecto' => $this->input->post('IDProyecto',TRUE),
							  			'IDItemProyecto' => $this->input->post('IDItemProyecto',TRUE),
							  			'NombreItem' => $this->input->post('NombreItem',TRUE),
							  			'Observaciones' => $this->input->post('Observaciones',TRUE));

				$this->db->trans_start();
				$this->proyectos_model->update_items_proyecto($data);
				$this->db->trans_complete();

				$this->mensaje  = 'Acción completada exitosamente.';
				$this->modificar($this->input->post('IDProyecto',TRUE));
			}
		}
		else
		{

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
