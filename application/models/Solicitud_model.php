<?php 
class Solicitud_model extends CI_Model{

    public function __construct(){
    // parrent::__construct();
    }

    public function insert_solicitud($id_autor, $dependencia, $departamento, $puesto, $numero_oficio, $fecha_recepcion, $fecha_oficio){
        $data = array(
            'id_autor' => $id_autor,
            'dependencia' => $dependencia,
            'departamento' => $departamento,
            'puesto' => $puesto,
            'numero_oficio' => $numero_oficio,
            'fecha_recepcion' => $fecha_recepcion,
            'fecha_oficio' => $fecha_oficio
        );
        return $this->db->insert('solicitud', $data);
    }

    public function baja_solicitudes(){
        $solicitudes = $this->db->get('solicitud')->result_array();
        return $solicitudes;
    }

}

?>