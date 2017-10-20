<?php 
class Dictaminador_model extends CI_Model{

    public function __construct(){
    // parrent::__construct();
    }

    public function get_dictaminadores(){
        $query = "SELECT *, CONCAT(nombre, ' ', paterno, ' ', materno) AS n_completo FROM dictaminador";
        return $this->db->query($query)->result_array();
    }

    public function insert_dictaminador($nombre, $paterno, $materno, $correo, $telefono, $celular, $estado, $municipio, $localidad, $colonia, $calle, $num_ext, $num_int){
        $data = array(
            'nombre' => $nombre,
            'paterno' => $paterno,
            'materno' => $materno,
            'email' => $correo,
            'telefono' => $telefono,
            'celular' => $celular,
            'estado' => $estado,
            'municipio' => $municipio,
            'localidad' => $localidad,
            'colonia' => $colonia,
            'calle' => $calle,
            'num_ext' => $num_ext,
            'num_int' => $num_int
        );
        return $this->db->insert('dictaminador', $data);
    }

    public function update_dictaminador($id_editando, $nombre, $paterno, $materno, $correo, $telefono, $celular, $estado, $municipio, $localidad, $colonia, $calle, $num_ext, $num_int){
        $data = array(
            'nombre' => $nombre,
            'paterno' => $paterno,
            'materno' => $materno,
            'email' => $correo,
            'telefono' => $telefono,
            'celular' => $celular,
            'estado' => $estado,
            'municipio' => $municipio,
            'localidad' => $localidad,
            'colonia' => $colonia,
            'calle' => $calle,
            'num_ext' => $num_ext,
            'num_int' => $num_int
        );

        $this->db->where('id_dictaminador', $id_editando);
        return $this->db->update('dictaminador', $data);
    }

    public function delete_dictaminador($id_dictaminador){
        $this->db->where('id_dictaminador', $id_dictaminador);
        return $this->db->delete('dictaminador');
    }

    public function search_dictaminador($filtro){
        $query = "SELECT *, CONCAT(nombre, ' ', paterno, ' ', materno) AS n_completo FROM dictaminador WHERE nombre LIKE '%{$filtro}%' OR paterno LIKE '%{$filtro}%' OR materno LIKE '%{$filtro}%'";
        return $this->db->query($query)->result_array();
    }

    public function recupera_name_email(){
        $query = "SELECT CONCAT(nombre, ' ', paterno, ' ', materno, ' ', '[', email, ']') AS label, email AS data  FROM dictaminador";
        return $this->db->query($query)->result_array();
    }

}

?>