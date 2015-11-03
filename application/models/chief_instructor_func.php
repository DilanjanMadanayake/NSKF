<?php

class chief_instructor_func extends CI_Model
{
    Public function _construct()
    {
        $this->load->database(); 
    }
    
    public function get_tournament()
    {
        $query=  $this->db->query("SELECT tournament_date,tournament_name FROM tournaments");
        return $query->result();
    }
     
    public function get_name($user_id)
    {
        $query=  $this->db->query("SELECT first_name, last_name FROM user WHERE user_id=$user_id");
        return $query->result();
    }
    
    public function get_branch_leaders()
    {
        $query=  $this->db->query("SELECT * FROM user WHERE user_type='BL' ");
        return $query->result();
    }
    
    public function get_branch_leader_details($id)
    {
        $query=  $this->db->query("SELECT * FROM user WHERE user_id=$id");
        return $query->result();
    }
    
    public function get_branch($id)//get branch from id
    {
        $query=  $this->db->query("SELECT b.branch_name FROM branch b, user u WHERE u.user_id='$id' AND u.branch_id=b.branch_id ");
        return $query->result();
    }
    
//    public function get_branch($id) {
//        $query = $this->db->query("SELECT distinct b.branch_name FROM sub_branch s, branch b WHERE b.branch_id=$id");
//        return $query->result();
//    }
    
    public function add_privileges($id, $privilege) 
    {
        try {
            if ($this->db->query("INSERT INTO privileges (`user_id` , `privilege`) VALUES ('$id', '$privilege')")) {
                $id1 = $this->db->insert_id();
                return $id1;
            } else {
                return NULL;
            }
        } catch (Exception $ex) {
            return FALSE;
        }
    }
    
    public function get_privileges($id)//get privileges from id
    {
        $query=  $this->db->query("SELECT DISTINCT privilege FROM privileges WHERE user_id='$id'");
        return $query->result();
    }
   
    public function update_privileges($id, $privileges) {
        try {
            if ($this->db->query("UPDATE privileges SET `privilege` = '$privileges' WHERE user_id = '$id' ")) {
                return $id;
            } else {
                return FALSE;
            }
        } catch (Exception $ex) {
            return FALSE;
        }
    }
    
    //aruni
    
     public function get_main_branch() {
        $query = $this->db->query("SELECT * FROM branch");
        return $query->result();
    }
    
    public function get_main_branch_pending() {
        $query = $this->db->query("SELECT * FROM branch where request='P'");
        return $query->result();
    }

    public function get_main_branch_details($id) {
        $query = $this->db->query("SELECT * FROM branch WHERE branch_id='$id'");
        return $query->result();
    }

    public function get_sub_branch() {
        $query = $this->db->query("SELECT * FROM sub_branch");
        return $query->result();
    }
    
    public function accept_sub_request($id, $request) {
        try {
            if ($this->db->query("UPDATE sub_branch SET `request`='$request' WHERE `sub_branch_id`=$id")) {
                return $id;
            } else {
                return FALSE;
            }
        } catch (Exception $ex) {
            return FALSE;
        }
    }

    public function accept_main_request($id, $request) {
        try {
            if ($this->db->query("UPDATE branch SET `request`='$request' WHERE `branch_id`=$id")) {
                return $id;
            } else {
                return FALSE;
            }
        } catch (Exception $ex) {
            return FALSE;
        }
    }

    public function get_sub_branch_pending() {
        $query = $this->db->query("SELECT * FROM sub_branch where request='P'");
        return $query->result();
    }

    public function get_sub_branch_details($id) {
        $query = $this->db->query("SELECT * FROM sub_branch where sub_branch_id=$id");
        return $query->result();
    }

    public function get_branch_lead1($branch_lead_id)
    {
        $query=  $this->db->query("select distinct u.first_name, u.last_name from user u, branch b where u.user_id=$branch_lead_id");
        return $query->result();
    }
    
    public function get_branch_lead_id()
    {
        $query=  $this->db->query("select branch_lead_id from branch");
        return $query->result();
    }

    public function get_coach_details() {
        $query = $this->db->query("SELECT * FROM coach");
        return $query->result();
    }

    public function get_coach($id) {
        $query = $this->db->query("SELECT * FROM coach where coach_id=$id");
        return $query->result();
    }

    public function get_b_lead($id) {
        $query = $this->db->query("SELECT * FROM coach where coach_id=$id");
        return $query->result();
    }

    //public function add_coach($name, $nic, $dob, $gender, $status, $contact_no, $email, $address, $qualifications, $date) {
    public function add_coach($coach_name, $nic, $dob, $gender, $status, $contact_no, $email, $address, $branch, $branch_type, $qualifications, $date){    
    try {
            //if ($this->db->query("INSERT INTO `nskf`.`coach` (`coach_name`, `nic`, `dob`, `gender`, `status`, `contact_no`, `email`, `address`, `qualifications`, `careeStartingDate`) VALUES ('$name', '$nic','$dob', '$gender', '$status', '$contact_no', '$email', '$address', '$qualifications', '$date')")) {
              if ($this->db->query("INSERT INTO `coach` (`coach_name`, `nic`, `dob`, `gender`, `status`, `contact_no`, `email`, `address`, `branch`,`branch_type`, `qualifications`, `careeStartingDate`) VALUES ('$coach_name', '$nic', '$dob', '$gender', '$status', '$contact_no', '$email', '$address', '$branch', '$branch_type', '$qualifications', '$date')")) {
              $id = $this->db->insert_id();
                return $id;
            } else {
                return NULL;
            }
        } catch (Exception $ex) {
            return FALSE;
        }
    }

    public function add_branch_lead($email, $password, $first_name, $last_name, $address, $dob, $gender, $nationality, $religion, $contact_no, $civil_status, $occupation, $branch_id, $sub_branch_id, $type) {
        try {
            if ($this->db->query("INSERT INTO user(`email`, `password`, `first_name`, `last_name`, `address`, `date_of_birth`, `gender`, `nationality`, `religion`, `contact_number`, `civil_status`, `occupation`, `branch_id`,`sub_branch_id`,`user_type`) VALUES ('$email', '$password', '$first_name', '$last_name', '$address', '$dob', '$gender', '$nationality', '$religion', '$contact_no', '$civil_status', '$occupation', '$branch_id', '$sub_branch_id', '$type')")) {
                $id = $this->db->insert_id();
                return $id;
            } else {
                return NULL;
            }
        } catch (Exception $ex) {
            return FALSE;
        }
    }

    public function add_announcement($title, $description, $date) {
        try {
            if ($this->db->query("INSERT INTO announcement(`title`, `description`, `date`) VALUES ('$title', '$description', '$date')")) {
                $id = $this->db->insert_id();
                return $id;
            } else {
                return NULL;
            }
        } catch (Exception $ex) {
            return FALSE;
        }
    }

    public function delete_coach($id) {
        $sql = "DELETE FROM coach WHERE coach_id='$id'";
        if ($query = $this->db->query($sql)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    public function delete_main_request($id) {
        $sql = "DELETE FROM branch WHERE branch_id='$id'";
        if ($query = $this->db->query($sql)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function delete_sub_request($id) {
        $sql = "DELETE FROM sub_branch WHERE sub_branch_id='$id'";
        if ($query = $this->db->query($sql)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function delete_branch_lead($id) {
        $sql = "DELETE FROM user WHERE user_id='$id'";
        if ($query = $this->db->query($sql)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function get_announcement_details() {
        $query = $this->db->query("SELECT * FROM announcement");
        return $query->result();
    }
    
    public function get_announcement($id) {
        $query = $this->db->query("SELECT * FROM announcement where announcement_id='$id'");
        return $query->result();
    }
    
    public function delete_announcement($id) {
        $sql = "DELETE FROM announcement WHERE announcement_id='$id'";
        if ($query = $this->db->query($sql)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    public function search_coach($coach_name, $branch, $nic)
    {
        $query=  $this->db->query("SELECT * FROM coach WHERE `coach_name` like '%$coach_name%' or `branch` like '%$branch%' or `nic` like '%$nic%'");
        return $query->result();
    }
    
    public function  update_coach($id,$coach_name, $dob, $gender, $status, $contact_no, $email, $address, $branch, $branch_type, $qualifications, $date) {
        try {
           // if ($this->db->query("UPDATE coach SET `coach_name`='$coach_name',`nic`='$nic',`contact_no`='$contact_no',`email`='$email',`address`='$address',`branch`='$branch',`qualifications`='$qualifications' WHERE `coach_id`='$id'")) {
        if ($this->db->query("UPDATE `coach` SET `coach_name`='$coach_name',`dob`='$dob',`gender`='$gender',`status`='$status',`contact_no`='$contact_no',`email`='$email',`address`='$address',`branch`='$branch',`branch_type`='$branch_type',`qualifications`='$qualifications',`careeStartingDate`='$date' WHERE `coach_id`=$id")){
                return $id;
            } else {
                return FALSE;
            }
        } catch (Exception $ex) {
            return FALSE;
        }
    }
    
    public function update_branch_lead($id, $email, $first_name, $last_name, $address, $dob, $gender, $nationality, $religion, $contact_no, $civil_status, $occupation) {
        try {
            if ($this->db->query("UPDATE user SET `email`='$email',`first_name`='$first_name',`last_name`='$last_name',`address`='$address',`date_of_birth`='$dob',`gender`='$gender',`nationality`='$nationality',`religion`='$religion',`contact_number`='$contact_no',`civil_status`='$civil_status',`occupation`='$occupation' WHERE `user_id`=$id")) {
                return $id;
            } else {
                return FALSE;
            }
        } catch (Exception $ex) {
            return FALSE;
        }
    }
    public function  update_announcement($id, $title, $description, $date) {
        try {
            if ($this->db->query("UPDATE announcement SET `title`='$title',`description`='$description',`date`='$date' WHERE `announcement_id`='$id'")) {
                return $id;
            } else {
                return FALSE;
            }
        } catch (Exception $ex) {
            return FALSE;
        }
    }
    
 public function add_branch($branch_name, $contact_number, $email, $town, $country, $address,$branch_lead_id, $request) {
        try {
            if ($this->db->query("INSERT INTO `branch`(`branch_name`, `contact_number`, `email`, `town`, `country`, `address`,`branch_lead_id`, `request`) "
                    . "VALUES ('$branch_name', '$contact_number', '$email', '$town', '$country', '$address','$branch_lead_id', '$request')")) {
                $id = $this->db->insert_id();
                return $id;
            } else {
                return NULL;
            }
        } catch (Exception $ex) {
            return FALSE;
        }
    }
    
    public function add_sub_branch($branch_name, $contact_number, $email, $town, $country, $address, $branch_id, $branch_lead_id, $request) {
        try {
            if ($this->db->query("INSERT INTO `sub_branch`(`sub_branch_name`, `contact_number`, `email`, `town`, `country`, `address`,`branch_id`, `branch_lead_id`, `request`)"
                    . "VALUES ('$branch_name', '$contact_number', '$email', '$town', '$country', '$address', '$branch_id', '$branch_lead_id', '$request')")) {
                $id = $this->db->insert_id();
                return $id;
            } else {
                return NULL;
            }
        } catch (Exception $ex) {
            return FALSE;
        }
    }
    
    
     public function delete_sub_branch($id) {
        $sql = "DELETE FROM sub_branch WHERE sub_branch_id=$id";
        if ($query = $this->db->query($sql)) {
            return TRUE;
        } else {
            return FALSE;
        }
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
    
    public function check_branch($id) {
        $query = $this->db->query("SELECT distinct s.sub_branch_name from sub_branch s, branch b where s.branch_id='$id'");
        return $query->result();
    }

    public function get_branch_lead() {
        $query = $this->db->query("SELECT * FROM `user` WHERE `user_type`='BL'");
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
    
    public function get_branch_delete($id) {
        $query = $this->db->query("SELECT branch_name FROM branch WHERE branch_id=$id");
        return $query->result();
    }
    
      public function get_LocalTournaments()
    {
        $query=  $this->db->query("SELECT * FROM tournaments WHERE `tournament_type`=\"local\"");
        return $query->result();
    }

    public function get_today_tournaments($date) {
        $query = $this->db->query("SELECT * FROM tournaments WHERE `tournament_date`='$date'");
        return $query->result();
    }
    
    public function get_CI_LT($id)
    {
        $query=  $this->db->query("SELECT * FROM tournaments WHERE tournament_id='$id'");
        return $query->result();
    }
    
    public function get_tournament_name($id)
    {
        $query=  $this->db->query("SELECT tournament_name FROM tournaments WHERE tournament_id='$id'");
        $result=$query->row_array();
        
        return $result;
    }
    
    public function get_CI_results($id)
    {
        $query=  $this->db->query("SELECT * FROM tournament_results WHERE tournament_id='$id'");
        return $query->result();
    }
    
     public function get_CI_contact_org($id)
    {
        $query=  $this->db->query("SELECT * FROM tournaments WHERE tournament_id='$id'");
        return $query->result();
    }
    
    
    public function get_ForeignTournaments()
    {
        $query=  $this->db->query("SELECT * FROM tournaments WHERE `tournament_type`=\"foreign\"");
        return $query->result();
    }
    
     public function CI_create($tournament_name,$tournament_type,$tournament_date,$overview,$org_name,$org_contactnum,$org_email,$location) 
    {
        try {
            if ($this->db->query("INSERT INTO tournaments(`tournament_name`,`tournament_type`,`tournament_date`,`overview`,`org_name`,`org_contactnum`,`org_email`,`location`) VALUES ('$tournament_name','$tournament_type','$tournament_date','$overview','$org_name','$org_contactnum','$org_email','$location')")) {
                $id = $this->db->insert_id();
                return $id;
            } else {
                return NULL;
            }
        } catch (Exception $ex) {
            return FALSE;
        }
    }
    
     public function delete_tournaments($id) {
       $sql= "DELETE FROM tournaments WHERE tournament_id='$id'";
        if($query = $this->db->query($sql))
                {
            return TRUE;
        }else{
            return FALSE;
            
        }
    }
    
     public function  overview_update($id,$overview) {
        try {
            if ($this->db->query("UPDATE tournaments SET `overview` = '$overview' WHERE tournament_id = '$id'")) {
                return $id;
            } else {
                return FALSE;
            }
        } catch (Exception $ex) {
            return FALSE;
        }
    }
    
    public function  contact_org_update($id,$tournament_date,$org_name,$location) {
        try {
            if ($this->db->query("UPDATE tournaments SET `tournament_date` = '$tournament_date',`org_name`='$org_name',`location`='$location' WHERE tournament_id = '$id'")) {
                return $id;
            } else {
                return FALSE;
            }
        } catch (Exception $ex) {
            return FALSE;
        }
    }
    
    public function get_overview($id)
    {
        $query=  $this->db->query("SELECT overview FROM tournaments WHERE tournament_id='$id'");
        return $query->result();
    }
    
   
    
     public function get_CI_FT($id)
    {
        $query=  $this->db->query("SELECT * FROM tournaments WHERE tournament_id='$id'");
        return $query->result();
    }
    
    public function get_results($id)
    {
        $query=  $this->db->query("SELECT * FROM tournament_results WHERE tournament_id='$id'");
        return $query->result();
        
    }
    
     public function get_search($search)
    {
        $query=  $this->db->query("SELECT * FROM tournaments WHERE tournament_name LIKE '%$search%' OR tournament_date LIKE '%$search%'");
        return $query->result();
    }
    
    public function get_registered_players($id)
    {
         $query=  $this->db->query("SELECT * FROM tournament_registration WHERE tournament_id='$id'");
        return $query->result();
        
    }
    
    public function get_registered_players_search($id,$search)
    {
        $query=  $this->db->query("SELECT * FROM tournament_registration WHERE tournament_id='$id' AND player_name LIKE '%$search%'");
        return $query->result();
    }
    
    
     public function CI_results($id,$tournament_date,$section,$tournament_under,$champion,$Runner_up,$second_Runner_up) 
    {
        try {
            if ($this->db->query("INSERT INTO tournament_results(`tournament_id`,`tournament_section`,`champion`,`Runner_up`,`second_Runner_up`,`tournament_date`,`tournament_under`) VALUES ('$id','$section','$champion','$Runner_up','$second_Runner_up','$tournament_date','$tournament_under')")) {
                $id = $this->db->insert_id();
                return $id;
            } else {
                return NULL;
            }
        } catch (Exception $ex) {
            return FALSE;
        }
    }
    
   
    /*
         * Get the registered players
         * Players are selected according to the selected values of the dropbox.
         */
    public function get_players($id, $gender, $under, $tournament_section, $belt){
        
        $query=  $this->db->query("SELECT * FROM tournament_registration WHERE tournament_id='$id' AND gender='$gender' AND tournament_under='$under' AND tournament_section='$tournament_section' AND belt='$belt'");
        return $query->result();
    }
    /*
         * Get the tournament details.
         * Tournament details are selcted according to the tournament ID
         */
    public function get_tournament_details($id){
        
        $query=  $this->db->query("SELECT * FROM tournaments WHERE tournament_id='$id'");
        return $query->result();
    }
     /*
         * Creation of draw
         * All the selcted values are inserted in to the draw table
         */
    public function create_draw($tournament_id, $playerone_id, $playerone_name, $playertwo_id, $playertwo_name, $gender, $under, $tournament_section, $belt){
       
        try {
            if ($this->db->query("INSERT INTO draw(`tournament_id`, `playerone_id`, `playerone_name`, `playertwo_id`, `playertwo_name`, `round`, `winner_id`, `gender`, `tournament_section`, `tournament_under`, `belt`) "
                    . "VALUES ('$tournament_id','$playerone_id','$playerone_name','$playertwo_id','$playertwo_name','1','0','$gender','$tournament_section','$under','$belt')")) {
                $id = $this->db->insert_id();
                return $id;
            } else {
                return NULL;
            }
        } catch (Exception $ex) {
            return FALSE;
        }
    }
    /*
         * Retrieve draw details.
         * draw details are selcted according to the tournament ID
         */
    public function get_draw_details($id){
        
        $query=  $this->db->query("SELECT * FROM draw WHERE tournament_id='$id'");
        return $query->result();
    }
    /*
         * Checking if the draw already exist.
         * The draw table is checked for a previous record of the same draw.
         */
    public function check_draw($id, $gender, $under, $tournament_section, $belt){
        
        $query=  $this->db->query("SELECT * FROM draw WHERE tournament_id='$id' AND gender='$gender' AND tournament_under='$under' AND tournament_section='$tournament_section' AND belt='$belt'");
        
        return $query->result();
    }
    /*
         * Deletion of the tournament draw.
         * The draw is deleted according to the inputted fields.
         */
    public function delete_draw($id, $gender, $under, $tournament_section, $belt) {
        
       $sql= "DELETE FROM draw WHERE tournament_id='$id' AND gender='$gender' AND tournament_under='$under' AND tournament_section='$tournament_section' AND belt='$belt'";
        if($query = $this->db->query($sql))
        {
            return TRUE;
        }else{
            return FALSE;
            
        }
    }
    /**
         * check the tournament date
         * retrieve the date of a tournament which is equal to the ID
         * @param int $id tournamentid 
         */
    public function check_tournament($id){
        
        $query=  $this->db->query("SELECT tournament_date FROM tournaments WHERE tournament_id='$id'");
        
        return $query->row();
    }
    
    
    
     public function get_training_details()
    {
         $query=  $this->db->query("SELECT * FROM training_schedule t,branch b WHERE t.branch_id=b.branch_id AND t.request='P'");
        return $query->result();
    }
    
 public function  accept_request($id) {
        try {
            if ($this->db->query("UPDATE training_schedule SET `request` = 'A' WHERE training_schedule_id = '$id' ")) {
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
            if ($this->db->query("UPDATE training_schedule SET `request` = 'D' WHERE training_schedule_id = '$id' ")) {
                return $id;
            } else {
                return FALSE;
            }
        } catch (Exception $ex) {
            return FALSE;
        }
    }
    
     public function get_member_details($id)
    {
        $query=  $this->db->query("SELECT * FROM user WHERE user_id=$id");
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

    
     public function get_member_req($branch_id)
    {
        $query=  $this->db->query("SELECT * FROM training_schedule WHERE branch_id=$branch_id AND request='P'");
        return $query->result();
    }
    
       public function get_standing($id)
    {
           /**
             * get the standing according to the decending order of gold medals
             **/  
        $query=  $this->db->query("SELECT * FROM standing WHERE tournament_id=$id ORDER BY gold DESC;");
        return $query->result();
    }
    
       public function get_ranking_search($search)
    {        /**
             * get the search results according to branch name and medals
             **/
        $query=  $this->db->query("SELECT * FROM standing WHERE gold LIKE '%$search%' OR silver LIKE '%$search%' OR bronze LIKE '%$search%' OR branch_name LIKE '%$search%'");
        return $query->result();
    }
    
        public function get_tournament_search($search)
    {        /**
              * get the tournaments results according to the keyword
             **/
        $query=  $this->db->query("SELECT * FROM tournaments WHERE tournament_name LIKE '%$search%' ");
        return $query->result();
    }
    
    public function get_ref_marks($id, $gender,$type,$belt, $age) {
        //$query = $this->db->query("select distinct r.player_name, r.`ref_mark_1`, r.`ref_mark_2`, r.`ref_mark_3`, r.`ref_mark_4`, r.`ref_mark_5`, r.total from refree_marks r, tournament_registration t where r.`tournament_id` = '$id' and t.gender='$gender' and t.tournament_section='$type' and t.belt='$belt' and t.tournament_under='$age' ORDER BY total desc");
        $query = $this->db->query("select distinct r.player_name, r.`ref_mark_1`, r.`ref_mark_2`, r.`ref_mark_3`, r.`ref_mark_4`, r.`ref_mark_5`, r.total from refree_marks r, tournament_registration t where r.`tournament_id` = '$id' and t.`gender`='$gender' and t.`tournament_section`='$type' and t.`belt`='$belt' and t.`tournament_under`='$age'ORDER BY total desc");
        return $query->result();
    }
    
    public function check_player($player_name) {
        $query = $this->db->query("SELECT distinct `player_name` FROM `refree_marks` WHERE `player_name`='$player_name'");
        return $query->result();
    }
    
    public function get_ref_marks1($id, $gender,$type,$belt, $age) {
        $query = $this->db->query("select distinct r.player_name, r.`ref_mark_1`, r.`ref_mark_2`, r.`ref_mark_3`, r.`ref_mark_4`, r.`ref_mark_5`, r.total from refree_marks2 r, tournament_registration t where t.`tournament_id` = r.`tournament_id` and t.gender='$gender' and t.tournament_section='$type' and t.belt='$belt' and t.tournament_under='$age' ORDER BY total desc");
        return $query->result();
    }
    
    public function reg_players($id, $age, $belt, $type, $gender) {
        $query = $this->db->query("SELECT distinct * FROM tournament_registration WHERE tournament_under='$age' and belt='$belt' and `tournament_section`='$type' and `gender`='$gender' and `tournament_id`='$id'");
        return $query->result();
    }
    public function get_tournament_name1($date) {
        $query = $this->db->query("SELECT * FROM tournaments where `tournament_date`='$date'");
        return $query->result();
    }
    
    public function add_refree_marks($player_name, $ref_mark_1, $ref_mark_2, $ref_mark_3, $ref_mark_4, $ref_mark_5, $total, $id) {
        try {
            if ($this->db->query("INSERT INTO refree_marks(`player_name`, `ref_mark_1`, `ref_mark_2`, `ref_mark_3`, `ref_mark_4`, `ref_mark_5`, `total`,`tournament_id`) VALUES ('$player_name','$ref_mark_1','$ref_mark_2','$ref_mark_3','$ref_mark_4','$ref_mark_5', '$total', '$id')")) {
                $id1 = $this->db->insert_id();
                return true;
            } else {
                return FALSE;
            }
        } catch (Exception $ex) {
            return FALSE;
        }
    }
    
    public function add_refree_marks1($player_name, $ref_mark_1, $ref_mark_2, $ref_mark_3, $ref_mark_4, $ref_mark_5, $total, $id) {
        try {
            if ($this->db->query("INSERT INTO refree_marks2(`player_name`, `ref_mark_1`, `ref_mark_2`, `ref_mark_3`, `ref_mark_4`, `ref_mark_5`, `total`,`tournament_id`) VALUES ('$player_name','$ref_mark_1','$ref_mark_2','$ref_mark_3','$ref_mark_4','$ref_mark_5', '$total', '$id')")) {
                $id1 = $this->db->insert_id();
                return true;
            } else {
                return FALSE;
            }
        } catch (Exception $ex) {
            return FALSE;
        }
    }

}
    
?>