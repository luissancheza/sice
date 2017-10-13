<?php 
class Plantilla_model extends CI_Model{

    public function __construct(){
    // parrent::__construct();
    }

    public function demo(){
        $query = "SELECT CONCAT(nombre, ' ', paterno, ' ', materno) AS n_completo, correo, telefono FROM autor LIMIT 1";
        return $this->db->query($query)->result_array();
    }

}

?>