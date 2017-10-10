<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
	class Utilerias{
		public function __construct() {
	        //  require_once APPPATH.'third_party/Utils.php';
	    }

			/*
	    Funcion para retornar datos a peticiones ajax
	     */
	    public static function enviaDataJson($status, $data, $contexto){
	        return $contexto->output
	                    ->set_status_header($status)
	                    ->set_content_type('application/json', 'utf-8')
	                    ->set_output(json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
	                    ->_display();
	    }

	    public static function pagina_basica($contexto, $vista = '', $data) {
	        $contexto->load->view('header');
	        $contexto->load->view($vista, $data);
	        $contexto->load->view('footer');
	    }
	}
?>