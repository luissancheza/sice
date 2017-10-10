<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    function __construct(){
        parent::__construct();
        // $this->load->model('User');
        // $this->logged_in = FALSE;
    }


	public function panel()
	{
        if($session = $this->session->logged_in == TRUE){
            $session = $this->session->logged_in;
            $this->data['error'] = '';
            $this->data['session'] = $session;
            $this->load->view('main/panel',$this->data);
        }else{
            redirect('login/index');
        } 
	}
}