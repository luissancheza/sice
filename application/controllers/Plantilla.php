<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plantilla extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('Utilerias');
        $this->load->model("Plantilla_model");

         $this->load->library('Utilerias');
    }


	public function genera_archivo()
	{
    $server = $_SERVER['DOCUMENT_ROOT']."/sice/";
    $plantilla = $server."plantillas/plantilla.rtf";
    // $plantilla = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
    // echo  base_url(); die();
    // echo $plantilla;
    // die();
    $respuesta = $this->Plantilla_model->demo();
    $equivalencias = array(
        '#*NOMBRE*#' => "n_completo",
        '#*CORREO*#' => "correo",
        '#*TELEFONO*#' => "telefono"
        );
    // $equivalencias[0][0]="#*NOMBRE*#";
    // $equivalencias[0][1]="n_completo";
    // $equivalencias[1][0]="#*CORREO*#";
    // $equivalencias[1][1]="correo";
    // $equivalencias[2][0]="#*TELEFONO*#";
    // $equivalencias[2][1]="telefono";

    $salida = $this->rtf($respuesta, $plantilla, "certificado.rtf", $equivalencias);
    $response = array('ruta'=>"../../".$salida);
    Utilerias::enviaDataJson(200, $response, $this);
        exit;
	}

  public function leef($fichero){


    // $fichero = "";
    // // Asignamos todos los permisos al archivo
     // chmod($fichero, 0777);
    $texto = file($fichero);
    $todo = "";
    // var_dump($texto);
    // die();
    $tamleef = sizeof($texto);
    for($n = 0; $n < $tamleef; $n++){
      $todo = $todo.$texto[$n];
    }
    return $todo;
  }

  public function rtf($filas, $plantilla, $fsalida, $matequivalencias){
    $pre = time();
    $fsalida = "plantillas/".$pre.$fsalida;// para el nombre del archivo de salida

    if($txtplantilla = $this->leef($plantilla)){//-- COMPROBAMOS SI SE CARGO BIEN EL FICHERO
      $punt = fopen($fsalida,"w");//-- CREAMOS EL NUEVO FICHERO
      if(is_array($filas) and count($filas)>0){       
        foreach($filas[0] as $k=>$v){//-- REEMPLAZAMOS LAS VARIABLES     
          $v = utf8_decode($v);
          $txtplantilla = str_replace($k,$v,$txtplantilla);
        }
      }
      fputs($punt,$txtplantilla);//-- AGREGAMOS EL CONTENIDO AL NUEVO FICHERO
      fclose($punt);//- CERRAMOS LA CONEXION DEL FICHERO
        return $fsalida;
      // }
    }
  }


}