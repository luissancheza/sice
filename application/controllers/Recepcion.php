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
        // echo"<pre>";
        // print_r($_POST);
        // die();
        $editando = $this->input->post('editando_recepcion');
        $id_autor = $this->input->post('id_autor_l');
        $dependencia = $this->input->post('dependencia');
        $departamento = $this->input->post('departamento');
        $puesto = $this->input->post('puesto');
        $fecha_recepcion = $this->input->post('dtp_input_recepcion');
        $fecha_oficio = $this->input->post('dtp_input_oficio');
        $n_oficio = $this->input->post('n_oficio');
        $solicitud = $this->input->post('solicitud');
        $observaciones = $this->input->post('observaciones');
        if($editando == 0 || $editando == "0"){
            $this->Solicitud_model->insert_solicitud($id_autor, $dependencia, $departamento, $puesto, $n_oficio, $fecha_recepcion, $fecha_oficio, $solicitud, $observaciones);
        }else{
            $this->Solicitud_model->update_solicitud($editando, $id_autor, $dependencia, $departamento, $puesto, $n_oficio, $fecha_recepcion, $fecha_oficio, $solicitud, $observaciones);
        }
        
        redirect('panel/index');
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

    public function elimina_solicitud(){
         if($this->session->userdata('logged_in')== TRUE){
            $data=array();
            $id_eliminar = $this->input->post('id_solicitud');
            $result = $this->Solicitud_model->elimina_solicitud($id_eliminar);
            $response = array('status'=>$result);
            Utilerias::enviaDataJson(200, $response, $this);
            exit;
        }else{
          $data = array();
            $data['login_failed'] = TRUE;
            $this->load->view('login',$data);  
        }
    }

    public function busqueda(){
        if($this->session->userdata('logged_in')== TRUE){
            // echo "<pre>";
            // print_r($_POST);
            // die();
            $data=array();
            $x_fecha = $this->input->post('x_fecha');
            if($x_fecha == 1 || $x_fecha == '1'){

            }else{
                $id_solicitud = $this->input->post('id_solicitud');
                $dependencia = $this->input->post('dependencia');
                $departamento = $this->input->post('departamento');
                $autor = $this->input->post('autor');
                $filtro = "";
                $filtro_nombre = "";
                if(isset($id_solicitud) && $id_solicitud != ""){
                    $filtro .= "  s.id_solicitud = {$id_solicitud}  ";
                }
                if(isset($dependencia) && $dependencia != ""){
                    $filtro .= "  OR s.dependencia LIKE '%{$dependencia}%'";
                }
                if(isset($departamento) && $departamento != ""){
                    $filtro .= "  OR s.departamento LIKE '%{$departamento}%'";
                }
                if(isset($autor) && $autor != ""){
                    $filtro_nombre .= "  n_autor.nombre LIKE '%{$autor}%' AND";
                }
                $result = $this->Solicitud_model->busqueda_avanzada($filtro_nombre, $filtro);
//                 
            }
             $response = array('result'=>$result);
                Utilerias::enviaDataJson(200, $response, $this);
                exit;
        }else{
          $data = array();
            $data['login_failed'] = TRUE;
            $this->load->view('login',$data);  
        }
    }
}