<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dictaminador extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('Utilerias');
        $this->load->library('My_PHPMailer');
        $this->load->model('Dictaminador_model');
    }


	public function index()
	{
        if($this->session->userdata('logged_in')== TRUE){
        $data = array();
        $data['error'] = '';

        Utilerias::pagina_basica($this, 'dictaminadores/index', $data);
        }else{
          $data = $this->data;
            $data['login_failed'] = TRUE;
            $this->load->view('login',$data);  
        }
	}

    public function create(){
        if($this->input->post('editando') == 0 || $this->input->post('editando') == '0'){
            $nombre = $this->input->post('nombre_d');
            $paterno = $this->input->post('paterno_d');
            $materno = $this->input->post('materno_d');
            $correo = $this->input->post('correo_d');
            $telefono = $this->input->post('telefono_d');
            $celular = $this->input->post('celular_d');
            $estado = $this->input->post('estado_d');
            $municipio = $this->input->post('municipio_d');
            $localidad = $this->input->post('localidad_d');
            $colonia = $this->input->post('colonia_d');
            $calle = $this->input->post('calle_d');
            $num_ext = $this->input->post('num_ext_d');
            $num_int = $this->input->post('num_int_d');

            $this->Dictaminador_model->insert_dictaminador($nombre, $paterno, $materno, $correo, $telefono, $celular, $estado, $municipio, $localidad, $colonia, $calle, $num_ext, $num_int);
        }else{
            $id_editando = $this->input->post('editando');
            $nombre = $this->input->post('nombre_d');
            $paterno = $this->input->post('paterno_d');
            $materno = $this->input->post('materno_d');
            $correo = $this->input->post('correo_d');
            $telefono = $this->input->post('telefono_d');
            $celular = $this->input->post('celular_d');
            $estado = $this->input->post('estado_d');
            $municipio = $this->input->post('municipio_d');
            $localidad = $this->input->post('localidad_d');
            $colonia = $this->input->post('colonia_d');
            $calle = $this->input->post('calle_d');
            $num_ext = $this->input->post('num_ext_d');
            $num_int = $this->input->post('num_int_d');
            $response = $this->Dictaminador_model->update_dictaminador($id_editando, $nombre, $paterno, $materno, $correo, $telefono, $celular, $estado, $municipio, $localidad, $colonia, $calle, $num_ext, $num_int);
        }
        
        redirect('dictaminador/index');
    }

    public function elimina_dictaminador(){
        $id_dictaminador = $this->input->post('id_dictaminador');
        $result = $this->Dictaminador_model->delete_dictaminador($id_dictaminador);
        $response = array('status' => 'OK', 'status'=>$result);

        Utilerias::enviaDataJson(200, $response, $this);
        exit;
    }

    public function busca_dictaminador(){
        $filtro = $this->input->post('filtro');
        $result = $this->Dictaminador_model->search_dictaminador($filtro);

        $response = array('status' =>'OK','resultado'=> $result);
        Utilerias::enviaDataJson(200, $response, $this);
        exit;
    }

  public function baja_dictamenadores(){
    if($this->session->userdata('logged_in')== TRUE){
      $dictamenes = $this->Dictaminador_model->get_dictaminadores();
      $response = array('dictaminadores'=>$dictamenes);

        Utilerias::enviaDataJson(200, $response, $this);
        exit;
        }else{
          $data = $this->data;
            $data['login_failed'] = TRUE;
            $this->load->view('login',$data);  
        }
  }

    public function muestra_alta(){
        $data = array();
        $content = $this->load->view('dictaminadores/alta_dictaminador', $data, TRUE);
        $response = array('status' => 'OK', 'html'=>$content);
        Utilerias::enviaDataJson(200, $response, $this);
        exit;
    }

}