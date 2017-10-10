<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panel extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->data = array( 
         'css' => $this->config->item('css'), 
         'js' => $this->config->item('js')
        );
        $this->load->library('Utilerias');
    }


	public function index()
	{
        if($this->session->userdata('logged_in')== TRUE){

        $this->data = array( 
         'css' => $this->config->item('css'), 
         'js' => $this->config->item('js')
        ); 

        $data = $this->data;
        $data['error'] = '';

        Utilerias::pagina_basica($this, 'main/panel', $data);
        }else{
          $data = $this->data;
            $data['login_failed'] = TRUE;
            $this->load->view('login',$data);  
        }
	}


}