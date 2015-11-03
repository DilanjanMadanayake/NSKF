<?php

class branch_leader_func extends CI_Model
{
    Public function _construct()
    {
        $this->load->database(); 
    }
    
    public function get_members($branch_id)
    {
        $query=  $this->db->query("SELECT * FROM user WHERE branch_id=$branch_id AND request='A'");
        return $query->result();
    }
    
    public function get_member_details($id)
    {
        $query=  $this->db->query("SELECT * FROM user WHERE user_id=$id");
        return $query->result();
    }
    
    public function get_name($user_id)
    {
        $query=  $this->db->query("SELECT first_name, last_name FROM user WHERE user_id=$user_id");
        return $query->result();
    }
    public function get_all_branches() {
        
        $query=  $this->db->query("SELECT * FROM branch");
        return $query->result();
        
    }
    
    public function get_branch($id) {
        
        $query=  $this->db->query("SELECT * FROM branch WHERE branch_id=$id");
        return $query->result();
        
    }
    
    public function member_insert($firstname, $lastname, $email, $password, $address, $dob, $gender, $contact, $status, $nationality, $religion, $occupation, $branch_id, $user_type) 
    {
        try {
            if ($this->db->query("INSERT INTO user (`email` , `password` , `first_name`, `last_name`, `address`, `date_of_birth` , `gender` , `nationality` , `religion` , `contact_number` , `civil_status` , `occupation` , `branch_id` , `user_type`, `request`) 
    			VALUES ('$email', '$password' , '$firstname' , '$lastname', '$address' , '$dob' , '$gender' , '$nationality' , '$religion' , '$contact' , '$status' , '$occupation' , '$branch_id', 'M', 'A')")) {
                $id = $this->db->insert_id();
                return $id;
            } else {
                return NULL;
            }
        } catch (Exception $ex) {
            return FALSE;
        }
    }
    
       
    public function delete_member($id){
        /*
         * delete member
         */
        $sql= "DELETE FROM user WHERE user_id='$id'";
        if($query = $this->db->query($sql)){
            return TRUE;
        }else{
            return FALSE;
            
        }
    }
    
    public function  member_update($id,$branch_id) {
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
    
    public function get_member_req($branch_id)
    {
        $query=  $this->db->query("SELECT * FROM user WHERE branch_id=$branch_id AND request='P'");
        return $query->result();
    }
    
    public function  accept_request($id) {
        try {
            if ($this->db->query("UPDATE user SET `request` = 'A' WHERE user_id = '$id' ")) {
                return $id;
            } else {
                return FALSE;
            }
        } catch (Exception $ex) {
            return FALSE;
        }
    }
    
    public function  deny_request($id) {
        try {
            if ($this->db->query("UPDATE user SET `request` = 'D' WHERE user_id = '$id' ")) {
                return $id;
            } else {
                return FALSE;
            }
        } catch (Exception $ex) {
            return FALSE;
        }
    }
    
    /*
     * Exam schedule function
     */
    
    
    public function get_branchid($branch_lead_id)
    {
        $query=  $this->db->query("SELECT branch_id FROM user WHERE user_id='$branch_lead_id'");
        return $query->result();
    }
    
    public function get_exams()
    {
        $query=  $this->db->query("SELECT * FROM examination");
        return $query->result();
    }
    
    public function delete_exams($eid){
        /*
         * delete exams
         */
        $sql= "DELETE FROM examination WHERE  exam_id={$eid}";
        if($query = $this->db->query($sql)){
            return TRUE;
        }else{
            return FALSE;
            
        }
    }
    
    public function exam_insert($exam_type, $sub_type, $current_rank, $target_rank, $times, $date, $branch_id) 
    {
        try {
            if ($this->db->query("INSERT INTO examination (`exam_type`, `sub_type`, `current_rank`, `target_rank`, `times_per_year`, `next_exam_date`, `branch_id`) 
    			VALUES ('$exam_type', '$sub_type' , '$current_rank' , '$target_rank', '$times' , '$date' , '$branch_id')")) {
                $id = $this->db->insert_id();
                return $id;
            } else {
                return NULL;
            }
        } catch (Exception $ex) {
            return FALSE;
        }
    }
    public function get_exams_fromid($exam_id)
    {
        $query=  $this->db->query("SELECT * FROM examination WHERE exam_id='$exam_id'");
        return $query->result();
    }
    public function  exam_update($id,$exam_type, $sub_type, $current_rank, $target_rank, $times, $date, $branch_id) {
        try {
            if ($this->db->query("UPDATE examination SET exam_type='$exam_type',sub_type='$sub_type',current_rank='$current_rank',target_rank='$target_rank',times_per_year='$times',next_exam_date='$date' WHERE exam_id='$id'")) {
                return $id;
            } else {
                return FALSE;
            }
        } catch (Exception $ex) {
            return FALSE;
        }
    }
    
       
     public function get_branch_leader($branch_lead_id)
    {
        $query=  $this->db->query("SELECT * FROM user WHERE user_id='$branch_lead_id'");
        return $query->result();
    }
    
    public function view_training_schedule() {
        
         $query=  $this->db->query("SELECT * FROM training_schedule");
        return $query->result();
    }
    
    public function get_training_scheduleid($id)
    {
        $query=  $this->db->query("SELECT * FROM training_schedule WHERE training_schedule_id='$id'");
        return $query->result();
    }
    
    public function delete_training_schedule($id)
             {
       $sql= "DELETE FROM training_schedule WHERE training_schedule_id='$id'";
        if($query = $this->db->query($sql))
                {
            return TRUE;
        }else{
            return FALSE;
            
        }
    }
    
       public function update_training_schedule($id,$training_schedule_date,$schedule_time,$schedule_description,$venue) {
        try {
            if ($this->db->query("UPDATE training_schedule SET training_schedule_date = '$training_schedule_date',schedule_description='$schedule_description' ,
                    schedule_time='$schedule_time', venue='$venue' WHERE training_schedule_id = '$id'")) {
                return $id;
            } else {
                return FALSE;
            }
        } catch (Exception $ex) {
            return FALSE;
        }
    }
    
     public function create_traning_schedule($training_schedule_date,$branch_id,$schedule_description,$schedule_time,$branch_lead_id,$venue) 
    {
        try {
            if ($this->db->query("INSERT INTO training_schedule(`training_schedule_date`,`branch_id`,`schedule_description`,`schedule_time`,`branch_lead_id`,`venue`,`request`) VALUES ('$training_schedule_date','$branch_id','$schedule_description','$schedule_time','$branch_lead_id','$venue','P')")) {
                $id = $this->db->insert_id();
                return $id;
            } else {
                return NULL;
            }
        } catch (Exception $ex) {
            return FALSE;
        }
    }
    
    public function get_tournament()
    {
        $query=  $this->db->query("SELECT * FROM tournaments");
        return $query->result();
    }
    
     public function player_1_insert($id,$name,$email,$contact_number,$address,$dob,$gender,$tournament_section,$tournament_under,$belts) 
    {
        try {
            if ($this->db->query("INSERT INTO team_registration (`tournament_id`,`name`,`email`,`contact_number`,`address`,`dob`,`gender`,`tournament_section`,`tournament_under`,`belts`) 
    			VALUES ('$id','$name','$email','$contact_number','$address','$dob','$gender','$tournament_section','$tournament_under','$belts')")) {
                $id = $this->db->insert_id();
                return $id;
            } else {
                return NULL;
            }
        } catch (Exception $ex) {
            return FALSE;
        }
    }
    
    public function player_2_insert($id,$name_2,$email_2,$contact_number_2,$address_2,$dob_2,$gender_2,$tournament_section_2,$tournament_under_2,$belts_2) 
    {
        try {
            if ($this->db->query("INSERT INTO player_two (`tournament_id`,`name_2`,`email_2`,`contact_number_2`,`address_2`,`dob_2`,`gender_2`,`tournament_section_2`,`tournament_under_2`,`belts_2`) 
    			VALUES ('$id','$name_2','$email_2','$contact_number_2','$address_2','$dob_2','$gender_2','$tournament_section_2','$tournament_under_2','$belts_2')")) {
                $id = $this->db->insert_id();
                return $id;
            } else {
                return NULL;
            }
        } catch (Exception $ex) {
            return FALSE;
        }
    }
    
    public function player_3_insert($id,$name_3,$email_3,$contact_number_3,$address_3,$dob_3,$gender_3,$tournament_section_3,$tournament_under_3,$belts_3) 
    {
        try {
            if ($this->db->query("INSERT INTO player_three (`tournament_id`,`name_3`,`email_3`,`contact_number_3`,`address_3`,`dob_3`,`gender_3`,`tournament_section_3`,`tournament_under_3`,`belts_3`) 
    			VALUES ('$id','$name_3','$email_3','$contact_number_3','$address_3','$dob_3','$gender_3','$tournament_section_3','$tournament_under_3','$belts_3')")) {
                $id = $this->db->insert_id();
                return $id;
            } else {
                return NULL;
            }
        } catch (Exception $ex) {
            return FALSE;
        }
    }
    
    public function view_team($id)
    {   /*
         * get player 1 details
         */
        
        $query=  $this->db->query("SELECT * FROM team_registration WHERE tournament_id='$id'");
        return $query->result();
    }
    
    public function view_player_2($id)
    {   /*
         * get player 2 details
         */
        $query=  $this->db->query("SELECT * FROM player_two WHERE tournament_id='$id'");
        return $query->result();
    }
    
    public function view_player_3($id)
    {   /*
         * get player 3 details
         */
        $query=  $this->db->query("SELECT * FROM player_three WHERE tournament_id='$id'");
        return $query->result();
    }
    
    
    public function get_team_players($id)
    {
        /*
         * join all three player tables
         */
         $query=  $this->db->query("SELECT * FROM team_registration tr, player_two ptw,player_three pth WHERE tr.tournament_id=ptw.tournament_id AND tr.tournament_id=pth.tournament_id AND pth.tournament_id=ptw.tournament_id");
        return $query->result();
    }
    
    public function get_tournamnet_name($id)
    {
        $query=  $this->db->query("SELECT * FROM tournaments WHERE tournament_id='$id'");
        return $query->result();
    }
    
        public function get_team_registration_search($search)
    {
        $query=  $this->db->query("SELECT * FROM team_registration WHERE name LIKE '%$search%' OR tournament_section LIKE '%$search%' OR tournament_under LIKE '%$search%' OR belts LIKE '%$search%'");
        return $query->result();
    }
    
     public function get_search($search)
    {
        $query=  $this->db->query("SELECT * FROM tournaments WHERE tournament_name LIKE '%$search%' OR tournament_date LIKE '%$search%'");
        return $query->result();
    }
    
    
    /*
     * branch
     * 
     */
    
     
    public function get_main_branch() {
        $query = $this->db->query("SELECT * FROM branch");
        return $query->result();
    }
    public function get_branch_lead() {
        $query = $this->db->query("SELECT * FROM `user` WHERE `user_type`='BL'");
        return $query->result();
    }
    public function get_sub_branch() {
        $query = $this->db->query("SELECT * FROM sub_branch");
        return $query->result();
    }
    public function  update_branch($id,$branch_name, $contact_number, $email, $town, $country, $address) {
        try {
            if ($this->db->query("UPDATE branch SET branch_name='$branch_name',contact_number='$contact_number',email='$email',town='$town',country='$country',address='$address' WHERE branch_id='$id'")) {
                return $id;
            } else {
                return FALSE;
            }
        } catch (Exception $ex) {
            return FALSE;
        }
    }
    public function add_branch($branch_name, $contact_number, $email, $town, $country, $address,$request) {
        try {
            if ($this->db->query("INSERT INTO `branch`(`branch_name`, `contact_number`, `email`, `town`, `country`, `address`, `request`) "
                    . "VALUES ('$branch_name', '$contact_number', '$email', '$town', '$country', '$address','$request')")) {
                $id = $this->db->insert_id();
                return $id;
            } else {
                return NULL;
            }
        } catch (Exception $ex) {
            return FALSE;
        }
    }
    
    public function add_sub_branch($branch_name, $contact_number, $email, $town, $country, $address,$request) {
        try {
            if ($this->db->query("INSERT INTO `sub_branch`(`sub_branch_name`, `contact_number`, `email`, `town`, `country`, `address`,`request`)"
                    . "VALUES ('$branch_name', '$contact_number', '$email', '$town', '$country', '$address','$request')")) {
                $id = $this->db->insert_id();
                return $id;
            } else {
                return NULL;
            }
        } catch (Exception $ex) {
            return FALSE;
        }
    }
    
    public function get_main_branch_details($id) {
        $query = $this->db->query("SELECT * FROM branch WHERE branch_id='$id'");
        return $query->result();
    }
    public function get_branch_lead1($branch_lead_id)
    {
        $query=  $this->db->query("select distinct u.first_name, u.last_name from user u, branch b where u.user_id=$branch_lead_id");
        return $query->result();
    }
    
     public function get_main_branch_accepted() {
        $query = $this->db->query("SELECT * FROM branch where request='A'");
        return $query->result();
    }
    
    public function get_sub_branch_accepted() {
        $query = $this->db->query("SELECT * FROM sub_branch where request='A'");
        return $query->result();
    }
   
    public function delete_branch($id) {
        $sql = "DELETE FROM branch WHERE branch_id='$id'";
        if ($query = $this->db->query($sql)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    public function check_branch($id) {
        $query = $this->db->query("SELECT distinct s.sub_branch_name from sub_branch s, branch b where s.branch_id='$id'");
        return $query->result();
}
    
    public function delete_sub_branch($id) {
        $sql = "DELETE FROM sub_branch WHERE sub_branch_id=$id";
        if ($query = $this->db->query($sql)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    public function get_sub_branch_details($id) {
        $query = $this->db->query("SELECT * FROM sub_branch where sub_branch_id=$id");
        return $query->result();
    }
    
    public function get_branch_name($id) {
        $query = $this->db->query("select b.branch_name from branch b, sub_branch s where s.sub_branch_id='$id'");
        return $query->result();
    }
    
    public function  update_sub_branch($id,$branch_name, $contact_number, $email, $town, $country, $address) {
        try {
            if ($this->db->query("UPDATE sub_branch SET sub_branch_name='$branch_name',contact_number='$contact_number',email='$email',town='$town',country='$country',address='$address' WHERE sub_branch_id='$id'")) {
                return $id;
            } else {
                return FALSE;
            }
        } catch (Exception $ex) {
            return FALSE;
        }
    }
    
}
    
?>