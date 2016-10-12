<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Items extends CI_Controller {

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

  public function index($id)
  {
    $data['titulo'] = 'Items';
    $data['query'] = $this->proyectos_model->get_items_proyecto($id);
    $data['mensaje'] = $this->mensaje;
    $data['usuario'] = $this->session->userdata('usuario');
    $data['nombre'] = $this->session->userdata('nombre');
    $data['perfil'] = $this->session->userdata('perfil');

    $data['accion'] = 'ADD';
    $data['agregar'] = $this->permisos_model->get_permiso($data);
    $data['accion'] = 'MOD';
    $data['modificar'] =$this->permisos_model->get_permiso($data);
    $this->load->view('Plantilla/Header',$data);
    $this->load->view('Items/Index');
    $this->load->view('Plantilla/Footer');

  }

  public function agregar($id)
  {
    $data['titulo'] = 'ABM Items';
    $data['proyecto'] = $this->proyectos_model->get_proyecto($id);
    $data['mensaje'] = $this->mensaje;

    $data['usuario'] = $this->session->userdata('usuario');
    $data['nombre'] = $this->session->userdata('nombre');
    $data['perfil'] = $this->session->userdata('perfil');
    $this->load->view('Plantilla/Header',$data);
    $this->load->view('Items/ABMItems');
    $this->load->view('Plantilla/Footer');
  }

  public function modificar($id, $idItem)
  {
    $data['titulo'] = 'ABM Items';
    $data['proyecto'] = $this->proyectos_model->get_proyecto($id);
    $data['item'] = $this->proyectos_model->get_item_proyecto($id,$idItem);
    $data['mensaje'] = $this->mensaje;

    $data['usuario'] = $this->session->userdata('usuario');
    $data['nombre'] = $this->session->userdata('nombre');
    $data['perfil'] = $this->session->userdata('perfil');
    $this->load->view('Plantilla/Header',$data);
    $this->load->view('Items/ABMItems');
    $this->load->view('Plantilla/Footer');

  }

  public function operaciones_items()
  {
    if($this->input->post('submit_Agregar_Item'))
    {
      $this->form_validation->set_rules("NombreItem","Nombre Item","required|trim|xss_clean");

      $this->form_validation->set_message('required','El campo %s es obligatorio.');

      if($this->form_validation->run() == FALSE)
      {
        $this->agregar($this->input->post('IDProyecto',TRUE));
      }
      else
      {
        $data = array('IDProyecto' => $this->input->post('IDProyecto',TRUE),
                      'NombreItem' => $this->input->post('NombreItem',TRUE),
                      'Observaciones' => $this->input->post('Observaciones',TRUE));

				$this->db->trans_start();
				$this->proyectos_model->insert_items_proyecto($data);
				$this->db->trans_complete();

        redirect(base_url().'proyectos/modificar/'.$this->input->post('IDProyecto',TRUE));

      }
    }
    else if($this->input->post('submit_Modificar_Item'))
    {
      $this->form_validation->set_rules("NombreItem","Nombre Item","required|trim|xss_clean");

      $this->form_validation->set_message('required','El campo %s es obligatorio.');

      if($this->form_validation->run() == FALSE)
      {
        $this->modificar($this->input->post('IDProyecto',TRUE),$this->input->post('IDItemProyecto',TRUE));
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

        redirect(base_url().'proyectos/modificar/'.$this->input->post('IDProyecto',TRUE));
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
