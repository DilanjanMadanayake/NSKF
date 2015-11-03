<?php

class functions extends CI_Model
{
    Public function _construct()
    {
        $this->load->database(); 
    }
    
    public function get_tournament()
    {
        $query=  $this->db->query("SELECT tournament_date,tournament_name, tournament_id FROM tournaments");
        return $query->result();
    }
    
    public function get_all_branch()
    {
        $query=  $this->db->query("SELECT * FROM branch");
        return $query->result();
    }
    
    public function get_all_sub_branch($bid)
    {
        $query=  $this->db->query("SELECT * FROM sub_branch sb, branch b WHERE b.branch_id=sb.branch_id AND sb.branch_id=$bid");
        return $query->result();
    }
    
    //get branch of the branch leader
    public function get_branch()
    {
        $query=  $this->db->query("SELECT b.branch_id, b.branch_name, b.town, b.country, b.contact_number, b.email, b.address, b.branch_type, u.first_name, u.last_name FROM branch b, user u WHERE u.user_id=b.branch_lead_id");
        return $query->result();
    }
    public function get_sub_branch($bid)
    {
        $query=  $this->db->query("SELECT u.first_name, u.last_name, s.sub_branch_name, s.contact_number, s.branch_id,s.branch_lead_id, s.email, s.town, s.country, s.address, s.sub_branch_type, b.branch_name FROM user u, sub_branch s, branch b WHERE  u.user_id=b.branch_lead_id AND b.branch_id=$bid");
        return $query->result();        
    }
    
    //get all branches
    public function get_all_branches() {
        
        $query=  $this->db->query("SELECT * FROM branch");
        return $query->result();
        
    }

    public function signup_insert($firstname, $lastname, $email, $password, $address, $dob, $gender, $contact, $status, $nationality, $religion, $occupation, $branch_id, $user_type) 
    {
        try {
            if ($this->db->query("INSERT INTO user (`email` , `password` , `first_name`, `last_name`, `address`, `date_of_birth` , `gender` , `nationality` , `religion` , `contact_number` , `civil_status` , `occupation` , `branch_id` , `user_type`, `request`) 
    			VALUES ('$email', '$password' , '$firstname' , '$lastname', '$address' , '$dob' , '$gender' , '$nationality' , '$religion' , '$contact' , '$status' , '$occupation' , '$branch_id', 'M', 'P')")) {
                $id = $this->db->insert_id();
                return $id;
            } else {
                return NULL;
            }
        } catch (Exception $ex) {
            return FALSE;
        }
    }
    
    public function get_search($search)
    {
        $query=  $this->db->query("SELECT * FROM tournaments WHERE tournament_name LIKE '%$search%' OR tournament_date LIKE '%$search%'");
        return $query->result();
    }

}

?>