<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recepcion extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('Autor_model');
        $this->load->model('Solicitud_model');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('Utilerias');
    }


	public function index()
	{
        $this->data = array( 
         'css' => $this->config->item('css'), 
         'js' => $this->config->item('js')
        ); 

        $data = $this->data;
        $data['error'] = '';

        echo json_encode($this->load->view('recepcion/recepcion', $data, TRUE));
	}

    public function create()
    {
        echo"<pre>";
        print_r($_POST);
        die();
        $id_autor = $this->input->post('id_autor_l');
        $dependencia = $this->input->post('dependencia');
        $departamento = $this->input->post('departamento');
        $puesto = $this->input->post('puesto');
        $fecha_recepcion = $this->input->post('dtp_input_recepcion');
        $fecha_oficio = $this->input->post('dtp_input_oficio');
        $n_oficio = $this->input->post('noficio');
        $solicitud = $this->input->post('solicitud');
        $observaciones = $this->input->post('observaciones');
        $this->Solicitud_model->insert_solicitud($id_autor, $dependencia, $departamento, $puesto, $n_oficio, $fecha_recepcion, $fecha_oficio);
        
        redirect('recepcion/recepcion');
    }

    public function baja_solicitudes(){
        $solicitudes = $this->Solicitud_model->baja_solicitudes();
        $response = array('status' => 'OK', 'solicitudes'=>$solicitudes);

        Utilerias::enviaDataJson(200, $response, $this);
        exit;
    }

    public function llama_vista(){
        if($this->session->userdata('logged_in')== TRUE){
            $data=array();
            $content = $this->load->view('autor/index', $data, TRUE);
            $response = array('status' => 'OK', 'html'=>$content);
            Utilerias::enviaDataJson(200, $response, $this);
            exit;
        }else{
          $data = array();
            $data['login_failed'] = TRUE;
            $this->load->view('login',$data);  
        }
    }
}