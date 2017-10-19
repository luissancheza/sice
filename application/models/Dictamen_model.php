<?php 
class Dictamen_model extends CI_Model{

    public function __construct(){
    // parrent::__construct();
    }

    public function get_dictamenes(){
        $query = "SELECT d.id_dictamen, s.solicitud, d.id_dictaminador, d.fecha_inicio, d.fecha_fin, d.status FROM dictamen d
                INNER JOIN solicitud s ON s.id_solicitud = d.id_solicitud
                WHERE 1 = 1
                ORDER BY d.id_dictamen";
        return $this->db->query($query)->result_array();
    }

    public function insert_dictamen($id_solicitud){
        $data = array(
            'id_solicitud' => $id_solicitud,
        );
        return $this->db->insert('dictamen', $data);
        // return $this->db->insert_id();
    }

}

?>