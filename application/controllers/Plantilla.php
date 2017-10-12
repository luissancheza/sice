<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plantilla extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('Utilerias');
    }


	public function index()
	{

	}

  public function leef(){
    $fichero = "";
    $texto = file($fichero);
    $tamleef = sizeof($texto);
    for($n = 0; $n < $tamleef; $n++){
      $todo = $todo.$texto[$n];
    }
    return $todo;
  }

  public function rtf($sql, $plantilla, $salida, $matequivalencias){
    $pre = time();
    $fsalida = "teleusers/certificados/".$pre.$fsalida;
  }


}