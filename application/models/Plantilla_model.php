<?php 
class Plantilla_model extends CI_Model{

    public function __construct(){
    // parrent::__construct();
    }

    public function recupera_datos_oficio1($id_autor){
        $query = "SELECT s.solicitud AS titulo_libro, s.fecha_oficio, CONCAT(a.nombre,' ', a.paterno, ' ', a.materno) AS n_completo 
                FROM solicitud s
                INNER JOIN autor a ON a.id_autor = s.id_autor
                WHERE s.id_autor = {$id_autor} LIMIT 1";
        return $this->db->query($query)->result_array();
    }

}

?>