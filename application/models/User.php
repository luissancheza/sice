<?php 
class User extends CI_Model{

    public function __construct(){
    // parrent::__construct();
    }

    public function get_user_data($email){
        $where['user'] = $email;
        $query = $this->db->get_where('usuario',$where, 1);
        if($this->db->count_all_results()){
            return $query->result();
        }else{
            return FLASE;
        }
    }

}

?>