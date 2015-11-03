<?php

class member_func extends CI_Model
{
    Public function _construct()
    {
        $this->load->database(); 
    }
    
    public function get_name($user_id){
        /*
         * get name
         * according to the user id
         */
        $query=  $this->db->query("SELECT user_id, first_name, last_name FROM user WHERE user_id=$user_id");
        return $query->result();
    }
    public function get_member_details($user_id){
        /*
         * get the members details
         * according to the user id
         */
        $query=  $this->db->query("SELECT * FROM user WHERE user_id=$user_id");
        return $query->result();
    }
    
    public function  member_update($id,$branch_id) {
        /*
         * update member details
         * according to the branch id
         */
        try {
            if ($this->db->query("UPDATE user SET `branch_id` = '$branch_id' WHERE user_id = '$id' ")) {
                return $id;
            } else {
                return FALSE;
            }
        } catch (Exception $ex) {
            return FALSE;
        }
    }
       
    public function get_branch($branch_id)
    {
        $query=  $this->db->query("SELECT branch_name FROM branch WHERE branch_id=$branch_id");
        return $query->result();
    }
    public function get_member_search($firstname)
    {
        $query=  $this->db->query("SELECT * FROM user u, achievement a WHERE u.first_name LIKE '%$firstname%' OR u.last_name LIKE '%$firstname%' OR a.achievement LIKE '%$firstname%'");
        return $query->result();
    }
    
    public function get_achievement($user_id)
    {
        $query=  $this->db->query("SELECT * FROM achievement WHERE user_id=$user_id");
        return $query->result();
    }
    
    //seshi
    
     public function get_tournament()
    {
        $query=  $this->db->query("SELECT tournament_date,tournament_name,tournament_id FROM tournaments");
        return $query->result();
    }
    
     public function get_LocalTournament()
    {
        $query=  $this->db->query("SELECT * FROM tournaments WHERE `tournament_type`=\"local\"");
        return $query->result();
    }
    
     public function get_ForeignTournament()
    {
        $query=  $this->db->query("SELECT * FROM tournaments WHERE `tournament_type`=\"foreign\"");
        return $query->result();
    }
    
    public function get_contact_org($id)
    {
        $query=  $this->db->query("SELECT * FROM tournaments WHERE tournament_id='$id'");
        return $query->result();
    }
    
     public function get_overview($id="")
    {
        $query=  $this->db->query("SELECT * FROM tournaments WHERE tournament_id='$id'");
        return $query->result();
    }
    
    
     public function get_registration($id)
    {
        $query=  $this->db->query("SELECT * FROM tournaments WHERE tournament_id='$id'");
        return $query->result();
    }
    
     public function get_results($id)
    {
        $query=  $this->db->query("SELECT * FROM tournament_results WHERE tournament_id='$id'");
        return $query->result();
    }
    
        public function get_tournaments($id)
    {
        $query=  $this->db->query("SELECT * FROM tournaments WHERE tournament_id='$id'");
        return $query->result();
    }
    
    public function get_LT($id)
    {
        $query=  $this->db->query("SELECT * FROM tournaments WHERE tournament_id='$id'");
        return $query->result();
    }
    
    public function registration($id,$name,$email,$address,$dob,$gender,$tournament_section,$tournament_under,$belts,$number) 
    {
        try {
            if ($this->db->query("INSERT INTO tournament_registration(`tournament_id`,`player_name`,`email`,`address`,`dob`,`gender`,`tournament_section`,`contact_num`,`tournament_under`,`belt`) VALUES ('$id','$name','$email','$address','$dob','$gender','$tournament_section','$number','$tournament_under','$belts')")) {
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
    /*
     * iteration 3
     */
    
    public function get_messages($id)
    {
        $query=  $this->db->query("SELECT * FROM inbox WHERE from_id='$id' ");
        return $query->result();
    }
    
    public function get_from($user_id)
    {
        $query=  $this->db->query("SELECT DISTINCT u.first_name, u.last_name, i.from_id FROM inbox i, user u WHERE i.to_id='$user_id' AND i.from_id=u.user_id ");
        return $query->result();
    }
    
    
    public function  get_members($branch_id)
            /*
             * select members from a particular branch
             */
    {
        $query=  $this->db->query("SELECT * FROM user WHERE branch_id='$branch_id' ");
        return $query->result();
    }
    
    
    public function message_insert($to, $user_id, $message)
    {
        try {
            if ($this->db->query("INSERT INTO inbox(`to_id`,`from_id`,`message`, `time`) VALUES ('$to','$user_id','$message', Now())")) {
                $id = $this->db->insert_id();
                return $id;
            } else {
                return NULL;
            }
        } catch (Exception $ex) {
            return FALSE;
        }
    }
    
    public function get_inbox_search($name, $user_id)
    {
        $query=  $this->db->query("SELECT DISTINCT u.first_name, u.last_name, i.from_id FROM user u, inbox i WHERE (u.first_name LIKE '%$name%' OR u.last_name LIKE '%$name%') AND i.to_id='$user_id' AND u.user_id=i.from_id " );
        return $query->result();
    }
    
    public function  update_profile($user_id,$firstname,$lastname,$address,$dob,$contact,
                    $status,$nationality,$religion,$occupation) {
        /*
         * update member details
         */
        try {
            if ($this->db->query("UPDATE user SET `first_name` = '$firstname', `last_name` = '$lastname', "
                    . " `address` = '$address', `date_of_birth` = '$dob',  `nationality` = '$nationality',  `religion` = '$religion', "
                    . " `contact_number` = '$contact',  `civil_status` = '$status', `occupation` = '$occupation'  WHERE user_id = '$user_id' ")) {
                $id =1;
                return $id;
            } else {
                return FALSE;
            }
        } catch (Exception $ex) {
            return FALSE;
        }
    }
    

    public function get_draw_details($id, $gender, $under, $tournament_section, $belt){
        /*
         * get the draw details
         * according to the selected fields
         */
        $query=  $this->db->query("SELECT * FROM draw WHERE tournament_id='$id' AND gender='$gender' AND tournament_under='$under' AND tournament_section='$tournament_section' AND belt='$belt'");
        
        return $query->result();
    }
    
    
      public function get_traning_schedule($branch_id)
    {
        $query= $this->db->query("SELECT * from training_schedule WHERE branch_id='$branch_id'");
         return $query->result();
        
    }
    
    public function get_ranking($id)
    {
        $query= $this->db->query("SELECT * from standing WHERE Tournament_id='$id' ORDER BY gold DESC;");
         return $query->result();
        
    }
    
}
    
?>