<?php 
class Dictaminador_model extends CI_Model{

    public function __construct(){
    // parrent::__construct();
    }

    public function get_dictaminadores(){
        $query = "SELECT *, CONCAT(nombre, ' ', paterno, ' ', materno) AS n_completo FROM dictaminador";
        return $this->db->query($query)->result_array();
    }

    public function insert_dictamen($id_solicitud){
        $data = array(
            'id_solicitud' => $id_solicitud,
        );
        return $this->db->insert('dictaminador', $data);
        // return $this->db->insert_id();
    }

}

?>