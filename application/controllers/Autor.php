<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Autor extends CI_Controller {

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
        if($this->session->userdata('logged_in')== TRUE){
            $data=array();
            Utilerias::pagina_basica($this, 'autor/index', $data);
        }else{
          $data = array();
            $data['login_failed'] = TRUE;
            $this->load->view('login',$data);  
        }
	}

    public function baja_grid_autores(){
        $result = $this->Autor_model->get_autors();
        $response = array('status' => 'OK', 'result'=>$result);
        Utilerias::enviaDataJson(200, $response, $this);
        exit;
    }

    public function muestra_alta(){
        $data = array();
        $content = $this->load->view('autor/alta_autor', $data, TRUE);
        $response = array('status' => 'OK', 'html'=>$content);
        Utilerias::enviaDataJson(200, $response, $this);
        exit;
    }

    public function create()
    {
        if($this->input->post('editando') == 0 || $this->input->post('editando') == '0'){
            $nombre = $this->input->post('nombre_a');
            $paterno = $this->input->post('paterno_a');
            $materno = $this->input->post('materno_a');
            $correo = $this->input->post('correo_a');
            $telefono = $this->input->post('telefono_a');

            $this->Autor_model->insert_autor($nombre, $paterno, $materno, $correo, $telefono);
        }else{
            $id_editando = $this->input->post('editando');
            $nombre = $this->input->post('nombre_a');
            $paterno = $this->input->post('paterno_a');
            $materno = $this->input->post('materno_a');
            $correo = $this->input->post('correo_a');
            $telefono = $this->input->post('telefono_a');

            $response = $this->Autor_model->update_autor($id_editando, $nombre, $paterno, $materno, $correo, $telefono);
        }
        
        redirect('autor/index');
    }

    public function baja_solicitudes(){
        $solicitudes = $this->Solicitud_model->baja_solicitudes();
        $response = array('status' => 'OK', 'solicitudes'=>$solicitudes);

        Utilerias::enviaDataJson(200, $response, $this);
        exit;
    }

    public function elimina_autor(){
        $id_autor = $this->input->post('id_autor');
        $result = $this->Autor_model->delete_autor($id_autor);
        $response = array('status' => 'OK', 'status'=>$result);

        Utilerias::enviaDataJson(200, $response, $this);
        exit;
    }

    public function busca_autores(){
        $filtro = $this->input->post('filtro');
        $result = $this->Autor_model->search_autors($filtro);

        $response = array('status' =>'OK','resultado'=> $result);
        Utilerias::enviaDataJson(200, $response, $this);
        exit;
    }
}