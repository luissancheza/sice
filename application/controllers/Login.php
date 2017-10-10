<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

    function __construct(){
        parent::__construct();
        $this->load->model('User');
        $this->logged_in = FALSE;
        $this->load->helper('url');
        $this->data = array( 
         'css' => $this->config->item('css'), 
         'js' => $this->config->item('js')
        );
    }


	public function index()
	{
    // you really don't need the line below
    $data = $this->data;
    $data['error'] = ''; 

    $this->load->view('login',$data); 
	}

    public function login_action(){
        $user = $this->input->post('email');
        $pwd = $this->input->post('password');

        $user_data = $this->User->get_user_data($user);
        $password = $user_data ? $user_data[0]->pwd : '' ;

        if(md5($pwd) == $password){
            $this->session->logged_in = TRUE;
            $usuario_data = array(
               'id' => 1,
               'nombre' => "jose",
               'logueado' => TRUE
            );
            $this->session->set_userdata($usuario_data);
            redirect('panel/index');
        }else{
            // $this->load->helper('url');
            // $this->data = array( 
            //  'css' => $this->config->item('css'), 
            //  'js' => $this->config->item('js')
            // ); 

            $data = $this->data;
            $data['login_failed'] = TRUE;
            $this->load->view('login',$data); 
        }
    }

    public function cerrar_sesion(){
        $this->session->sess_destroy();
        $this->session->unset_userdata();
        // var_dump(session_destroy());
        // die();
        redirect('login/index');
    }

   //  public function cerrar_sesion() {
   //    $usuario_data = array(
   //       'logueado' => FALSE
   //    );
   //    $this->session->set_userdata($usuario_data);
   //    redirect('login/index');
   // }
}
