<?php 
class Solicitud_model extends CI_Model{

    public function __construct(){
    // parrent::__construct();
    }

    public function insert_solicitud($id_autor, $dependencia, $departamento, $puesto, $numero_oficio, $fecha_recepcion, $fecha_oficio, $solicitud, $observacion){
        $data = array(
            'id_autor' => $id_autor,
            'dependencia' => $dependencia,
            'departamento' => $departamento,
            'puesto' => $puesto,
            'numero_oficio' => $numero_oficio,
            'fecha_recepcion' => $fecha_recepcion,
            'fecha_oficio' => $fecha_oficio,
            'solicitud' => $solicitud,
            'observacion' => $observacion
        );
        return $this->db->insert('solicitud', $data);
    }

    public function update_solicitud($editando, $id_autor, $dependencia, $departamento, $puesto, $n_oficio, $fecha_recepcion, $fecha_oficio, $solicitud, $observaciones){
        $data = array(
            'id_autor' => $id_autor,
            'dependencia' => $dependencia,
            'departamento' => $departamento,
            'puesto' => $puesto,
            'numero_oficio' => $n_oficio,
            'fecha_recepcion' => $fecha_recepcion,
            'fecha_oficio' => $fecha_oficio,
            'solicitud' => $solicitud,
            'observacion' => $observaciones
        );

            $this->db->where('id_solicitud', $editando);
            return $this->db->update('solicitud', $data);
    }

    public function baja_solicitudes(){
        $query = 'SELECT s.id_solicitud, s.id_autor, s.dependencia, s.departamento, s.puesto, s.numero_oficio,
        s.fecha_recepcion, s.fecha_oficio, s.status, CONCAT(a.nombre, " ", a.paterno, " ", a.materno) AS nombre, 
        s.solicitud, s.observacion FROM solicitud s
        INNER JOIN autor a ON a.id_autor = s.id_autor';
        return $this->db->query($query)->result_array();
    }

    public function elimina_solicitud($id_solicitud){
        $this->db->where('id_solicitud', $id_solicitud);
        return $this->db->delete('solicitud');
    }

    public function busqueda_avanzada($filtro_nombre, $filtro){
        
        $query = "SELECT * FROM solicitud s 
                 INNER JOIN (SELECT CONCAT(nombre, ' ', paterno, ' ', materno) AS nombre, id_autor FROM autor) n_autor ON {$filtro_nombre} n_autor.id_autor = s.id_autor
                 WHERE 1 = 1  {$filtro}
                 GROUP BY s.id_solicitud";
        return $this->db->query($query)->result_array();
    }

    public function busqueda_avanzada_xfecha($f_inicio, $f_fin){
        $query = "SELECT s.id_solicitud, s.id_autor, s.dependencia, s.departamento, s.puesto, s.numero_oficio,
        s.fecha_recepcion, s.fecha_oficio, s.status, CONCAT(a.nombre, ' ', a.paterno, ' ', a.materno) AS nombre, 
        s.solicitud, s.observacion FROM solicitud s
        INNER JOIN autor a ON a.id_autor = s.id_autor
                    WHERE s.fecha_recepcion BETWEEN '{$f_inicio}' AND '{$f_fin}'
                    GROUP BY s.id_solicitud";
        return $this->db->query($query)->result_array();
    }

}

?>