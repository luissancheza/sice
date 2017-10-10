<?php 
class Autor_model extends CI_Model{

    public function __construct(){
    // parrent::__construct();
    }

    public function get_autors(){
        $autores = $this->db->get('autor')->result_array();
        return $autores;
    }

    public function insert_autor($nombre, $paterno, $materno, $correo, $telefono){
        $data = array(
            'nombre' => $nombre,
            'paterno' => $paterno,
            'materno' => $materno,
            'correo' => $correo,
            'telefono' => $telefono
        );
        return $this->db->insert('autor', $data);
        // return $this->db->insert_id();
    }

    public function update_autor($id_editando, $nombre, $paterno, $materno, $correo, $telefono){
        $data = array(
        'nombre' => $nombre,
        'paterno' => $paterno,
        'materno' => $materno,
        'correo' => $correo,
        'telefono' => $telefono
        );

        $this->db->where('id_autor', $id_editando);
        return $this->db->update('autor', $data);
    }

    public function delete_autor($id_autor){
        $this->db->where('id_autor', $id_autor);
        return $this->db->delete('autor');
    }

    public function search_autors($filtro){
        $this->db->like('nombre', $filtro);
        $this->db->or_like('paterno', $filtro);
        $this->db->or_like('materno', $filtro);
        return $this->db->get('autor')->result_array();
    }

}

?>