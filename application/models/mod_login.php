<?php
    class mod_login extends CI_Model{

    function login_check($email,$password){

        $this->db->select('user_id, email, password, first_name, last_name, branch_id, user_type');
        $this->db->from('user');
        $this->db->where('email',$email);
        $this->db->where('password',$password);
        $query = $this->db->get();

        if($query->num_rows() == 1) {
            return $query->row_array();
        }else{
            return null;
        }

       }

} 