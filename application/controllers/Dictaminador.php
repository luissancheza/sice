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

}