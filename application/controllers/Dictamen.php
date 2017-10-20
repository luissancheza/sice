<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dictamen extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('Utilerias');
        $this->load->library('My_PHPMailer');
        $this->load->model('Dictamen_model');
        $this->load->model('Dictaminador_model');
    }


	public function index()
	{
        if($this->session->userdata('logged_in')== TRUE){
        $data = array();
        $data['error'] = '';

        Utilerias::pagina_basica($this, 'dictamen/index', $data);
        }else{
          $data = $this->data;
            $data['login_failed'] = TRUE;
            $this->load->view('login',$data);  
        }
	}

  public function baja_dictamenes(){
    if($this->session->userdata('logged_in')== TRUE){
      $dictamenes = $this->Dictamen_model->get_dictamenes();
      $response = array('dictamenes'=>$dictamenes);

        Utilerias::enviaDataJson(200, $response, $this);
        exit;
        }else{
          $data = $this->data;
            $data['login_failed'] = TRUE;
            $this->load->view('login',$data);  
        }
  }

  public function muestra_form_email(){
      $data = array();
      $data["style"] = "class='form-group'";
      $data['correos'] = $this->Dictaminador_model->recupera_name_email();

      $content = $this->load->view('dictamen/email_invitacion', $data, TRUE);
      $response = array('status' => 'OK', 'html'=>$content);
      Utilerias::enviaDataJson(200, $response, $this);
      exit;
  }


}