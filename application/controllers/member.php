<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class member extends CI_Controller {
    /*
     * Member class.
     * Includes all the member functions.
     */

    /**
         * This function is used to load the main page of chief instructor
         * @param int $id user id 
         */
    public function index() {
      
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('member_func');
        $user_id = $this->session->userdata('user_id');
        $branch_id = $this->session->userdata('branch_id');
        $session['name']=$this->member_func->get_name($user_id);
        $this->load->view('includes/user/header');
        $this->load->view('includes/member/member_navigation',$session);
        $this->load->view('pages/user/index');
        $this->load->view('includes/user/footer');

    }

        /**
         * This function is used to vie member profile
         * @param int $id user id 
         */
    public function member_profile()
    {
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('member_func');
        $user_id = $this->session->userdata('user_id');
        $branch_id = $this->session->userdata('branch_id');
        $session['name']=$this->member_func->get_name($user_id);
        $data['member']=$this->member_func->get_member_details($user_id);
        $data['branch']=$this->member_func->get_branch($branch_id);
        $data['achievement']=$this->member_func->get_achievement($user_id);
        $this->load->view('includes/user/header');
        $this->load->view('includes/member/member_navigation',$session);
        $this->load->view('pages/member/member_profile',$data);
        $this->load->view('includes/user/footer');        
    }
    /**
         * This function is used to update member profile
         * @param int $id user id 
         */
    public function update_profile($id)
    {
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('member_func');
        $data["updateStatus"]=0;
        $user_id = $this->session->userdata('user_id');
        $branch_id = $this->session->userdata('branch_id');
        $session['name']=$this->member_func->get_name($user_id); 
        $data['member']=$this->member_func->get_member_details($user_id);
        $data['branch']=$this->member_func->get_branch($branch_id);
        $data['id']=$id;
        $this->load->library('form_validation');
        
        
        $this->form_validation->set_rules('firstname', 'Firstname', 'required');
        $this->form_validation->set_rules('lastname', 'Lastname', 'required');
        //$this->form_validation->set_rules('email', 'email', 'required|valid_email');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('dob', 'Date of birth', 'required|callback_check_Birth_day');
        //$this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('contact', 'Contact Number', 'required|regex_match[/^[0-9]{10}$/]');
        //$this->form_validation->set_rules('branch', 'Branch', 'required');
        
        //$branch_id= $this->input->post('branch');
        $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');

                if ($this->form_validation->run() == FALSE)
                {
                $this->load->view('includes/user/header');
                $this->load->view('includes/member/member_navigation',$session);
                $this->load->view('pages/member/update_profile',$data);
                $this->load->view('includes/user/footer');  
                }
                else
                {
                    //textbox value-> variable
                    $firstname=$this->input->post('firstname');
                    $lastname=$this->input->post('lastname');
                    
                    
                    $address= $this->input->post('address');
                    $dob= $this->input->post('dob');
                    
                    $contact = $this->input->post('contact');
                    $status= $this->input->post('status');
                    $nationality= $this->input->post('nationality');
                    $religion= $this->input->post('religion');
                    $occupation= $this->input->post('occupation');
                    
                    
        
            if ($id = $this->member_func->update_profile($user_id,$firstname,$lastname,$address,$dob,$contact,
                    $status,$nationality,$religion,$occupation))
            {
                
                $data["user_id"] = $id;
                $data["updateStatus"]=1;
                $this->load->view('includes/user/header');
                $this->load->view('includes/member/member_navigation',$session);
                $this->load->view('pages/member/update_profile',$data);
                $this->load->view('includes/user/footer');  
                       
            }else {
                echo 'An error occurred saving your information. Please try again later';
            }
       }
    }
    /**
         * This function is used to change password field
         * @param int $id user id 
         */
    public function change_password()
    {
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('member_func');
        $user_id = $this->session->userdata('user_id');
        $branch_id = $this->session->userdata('branch_id');
        
        $session['name']=$this->member_func->get_name($user_id);
        $data['member']=$this->member_func->get_member_search($firstname);
        $data['branch']=$this->member_func->get_branch($branch_id);
        $data["updateStatus"]=0;
        
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('current_password', 'Current Password', 'required');
        $this->form_validation->set_rules('new_password', 'New Password', 'required');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required');
        
        $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');

                if ($this->form_validation->run() == FALSE)
                {
                $this->load->view('includes/user/header');
                $this->load->view('includes/member/member_navigation',$session);
                $this->load->view('pages/member/change_password',$data);
                $this->load->view('includes/user/footer');  
                }
                else
                {
                    //textbox value-> variable
                $firstname=$this->input->post('firstname');
                $lastname=$this->input->post('lastname');
                if ($id = $this->member_func->update_profile($user_id,$firstname,$lastname,$address,$dob,$contact,
                    $status,$nationality,$religion,$occupation))
            {
                
                $data["user_id"] = $id;
                $data["updateStatus"]=1;
                $this->load->view('includes/user/header');
                $this->load->view('includes/member/member_navigation',$session);
                $this->load->view('pages/member/change_password',$data);
                $this->load->view('includes/user/footer');  

            }else {
                echo 'An error occurred saving your information. Please try again later';
            }
       }    
                    
        
        
    }
    /**
         * This function is used to serach members
         * @param int $id user id 
         */
    public function member_search()
    {
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('member_func');
        $user_id = $this->session->userdata('user_id');
        $branch_id = $this->session->userdata('branch_id');
        $firstname=$this->input->post('search');
        $session['name']=$this->member_func->get_name($user_id);
        $data['member']=$this->member_func->get_member_search($firstname);
        $data['branch']=$this->member_func->get_branch($branch_id);
        $data['achievement']=$this->member_func->get_achievement($user_id);
        $this->load->view('includes/user/header');
        $this->load->view('includes/member/member_navigation',$session);
        $this->load->view('pages/member/member_search',$data);
        $this->load->view('includes/user/footer');
        
    }
    
    /**
         * This function is used to display tournaments
         * @param int $id user id 
         */
    public function tournament()
	{
        $this->load->library('session');
            $this->load->helper('url');
            $this->load->model('member_func');
            $user_id = $this->session->userdata('user_id');
            $branch_id = $this->session->userdata('branch_id');
            $data['tournament']=$this->member_func->get_tournament();
            $session['name']=$this->member_func->get_name($user_id);
        $data['member']=$this->member_func->get_member_details($user_id);
        $data['branch']=$this->member_func->get_branch($branch_id);
            $this->load->view('includes/user/header');
            $this->load->view('includes/member/member_navigation',$session);
            $this->load->view('pages/member/tournament',$data);
            $this->load->view('includes/user/footer');
                
	}
        /**
         * This function is used to display local tournaments
         */
        public function local_tournament() 
        {
            $this->load->library('session');
            $this->load->helper('url');
            $this->load->model('member_func');
            $user_id = $this->session->userdata('user_id');
            $branch_id = $this->session->userdata('branch_id');
            $data['local_Tournament']=$this->member_func->get_LocalTournament();
            $session['name']=$this->member_func->get_name($user_id);
        $data['member']=$this->member_func->get_member_details($user_id);
        $data['branch']=$this->member_func->get_branch($branch_id);
            $this->load->view('includes/user/header');
            $this->load->view('includes/member/member_navigation',$session);
            $this->load->view('pages/member/local_tournament',$data);
            $this->load->view('includes/user/footer');
            
        }
        /**
         * This function is used to display foreigh tournaments
         * @param int $id user id 
         */
         public function foreign_tournament() 
        {
            $this->load->library('session'); 
            $this->load->helper('url');
            $this->load->model('member_func');
            $user_id = $this->session->userdata('user_id');
            $branch_id = $this->session->userdata('branch_id');
            $data['foreign_Tournament']=$this->member_func->get_ForeignTournament();
            $session['name']=$this->member_func->get_name($user_id);
            $data['member']=$this->member_func->get_member_details($user_id);
            $data['branch']=$this->member_func->get_branch($branch_id);
            $this->load->view('includes/user/header');
            $this->load->view('includes/member/member_navigation',$session);
            $this->load->view('pages/member/foreign_tournament',$data);
            $this->load->view('includes/user/footer');
            
        }
        /**
         * This function is used to display oraganisers
         * @param int $id user id 
         */
        public function contact_org($id)
        {
            $this->load->library('session');
            $this->load->helper('url');
            $this->load->model('member_func');
            $user_id = $this->session->userdata('user_id');
            $branch_id = $this->session->userdata('branch_id');
            $data['contact_org']=$this->member_func->get_contact_org($id);
            $session['name']=$this->member_func->get_name($user_id);
        $data['member']=$this->member_func->get_member_details($user_id);
        $data['branch']=$this->member_func->get_branch($branch_id);
            $this->load->view('includes/user/header');
            $this->load->view('includes/member/member_navigation',$session);
            $this->load->view('pages/member/contact_org',$data);
            $this->load->view('includes/user/footer');
        }
        /**
         * This function is used to display overview
         * @param int $id user id 
         */
          public function overview($id)
        {
            $this->load->library('session');  
            $this->load->helper('url');
            $this->load->model('member_func');
            $user_id = $this->session->userdata('user_id');
            $branch_id = $this->session->userdata('branch_id');
            $data['overview']=$this->member_func->get_overview($id);
            $session['name']=$this->member_func->get_name($user_id);
        $data['member']=$this->member_func->get_member_details($user_id);
        $data['branch']=$this->member_func->get_branch($branch_id);
            $this->load->view('includes/user/header');
            $this->load->view('includes/member/member_navigation',$session);
            $this->load->view('pages/member/overview',$data);
            $this->load->view('includes/user/footer');
        }
        
/**
         * This function is used to displat tournamnet details
         * @param int $id user id 
         */
         public function LT($id)
        {
            $this->load->library('session'); 
            $this->load->helper('url');
            $this->load->model('member_func');
            $user_id = $this->session->userdata('user_id');
            $branch_id = $this->session->userdata('branch_id');
            $data['local_Tournament']=$this->member_func->get_LT($id);
            $session['name']=$this->member_func->get_name($user_id);
            $data['member']=$this->member_func->get_member_details($user_id);
            $data['branch']=$this->member_func->get_branch($branch_id);
            $this->load->view('includes/user/header');
            $this->load->view('includes/member/member_navigation',$session);
            $this->load->view('pages/member/LT',$data);
            $this->load->view('includes/user/footer');
        }
        /**
         * This function is used to tournament registrations
         * @param int $id user id 
         */
        public function registration($id)
    {
            $this->load->library('session');
            $this->load->model('member_func');
            $this->load->helper('url');
            $this->load->helper('html');
            $user_id = $this->session->userdata('user_id');
            $branch_id = $this->session->userdata('branch_id');
            $session['name']=$this->member_func->get_name($user_id);
            //$this->load->view('includes/member/member_navigation',$session);
            $data['registration']=$this->member_func->get_registration($id);
            
            $data['member']=$this->member_func->get_member_details($user_id);
            $data['branch']=$this->member_func->get_branch($branch_id);
            $data['id']=$id;
            $data["status"]=0;
           
             // Including Validation Library
            $this->load->library('form_validation');
                // Validating Fields
            $this->form_validation->set_rules('name', 'Full Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('address', 'Address', 'required');
            $this->form_validation->set_rules('dob', 'Date Of Birth', 'required|callback_check_Birth_day');
            $this->form_validation->set_rules('gender', 'Gender', 'required');
            $this->form_validation->set_rules('tournament_section', 'Tournament Section', 'required');
            $this->form_validation->set_rules('tournament_under','Under', 'required');
            $this->form_validation->set_rules('belts', 'Belt', 'required');
            $this->form_validation->set_rules('number', 'Contact Number', 'required|regex_match[/^[0-9]{10}$/]');
              
            $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
            
            if ($this->form_validation->run() == FALSE)
            {
                $this->load->view('includes/user/header');
                $this->load->view('includes/member/member_navigation',$session);
                $this->load->view('pages/member/registration',$data);
                $this->load->view('includes/user/footer');
            }
            
            else
            {   
                $name=$this->input->post('name');
                $email=$this->input->post('email');
                $address=$this->input->post('address');
                $dob= $this->input->post('dob');
                $gender= $this->input->post('gender');
                $tournament_section= $this->input->post('tournament_section');
                $tournament_under = $this->input->post('tournament_under');
                $belts = $this->input->post('belts');
                $number = $this->input->post('number');
                // Setting Values For Tabel Columns
            
            if($id=$this->member_func->registration($id,$name,$email,$address,$dob,$gender,$tournament_section,$tournament_under,$belts,$number))
            {      
                $data["status"] = 1;
                
                $branch_id = $this->session->userdata('branch_id');
                
                $this->load->view('includes/user/header');
                $this->load->view('includes/member/member_navigation',$session);
                $this->load->view('pages/member/registration',$data);
                $this->load->view('includes/user/footer');

            }
            else 
                {
                echo'An error occured while registrating to this tournament. Please try again.';
                }
            }
            }
         /**
         * This function is used to search members
         */   
     public function search()
        {
         
        $this->load->library('session'); 
        $this->load->helper('url');
        $this->load->model('member_func');
        $user_id = $this->session->userdata('user_id');
        $branch_id = $this->session->userdata('branch_id');
        $search=$this->input->post('search');
        $session['name']=$this->member_func->get_name($user_id);
        $data['member']=$this->member_func->get_member_details($user_id);
        $data['branch']=$this->member_func->get_branch($branch_id);
        $data['search']=$this->member_func->get_search($search);
        $this->load->view('includes/user/header');
        $this->load->view('includes/member/member_navigation',$session);
        $this->load->view('pages/member/tournament_search',$data);
        $this->load->view('includes/user/footer');
        
      }
      
  /**
         * This function is used to display inbox
         * @param int $id user id 
         */
    public function inbox() {
                    /*
                     * display messages
                     */
                    $this->load->library('session');
                    $this->load->helper('url');
                    $this->load->model('member_func');
                    $user_id = $this->session->userdata('user_id');
                    $branch_id = $this->session->userdata('branch_id');
                    $session['name']=$this->member_func->get_name($user_id);
                    //$data['message']=$this->member_func->get_messages($user_id);                    
                    $data['from']=$this->member_func->get_from($user_id);
                    
                    //$fromid=$from->from_id;
                    
                    //$data['from_name']=$this->member_func->get_name($fromid);
                    
                    
                    $this->load->view('includes/user/header');
                    $this->load->view('includes/member/member_navigation',$session);
                    $this->load->view('pages/member/inbox',$data);
                    $this->load->view('includes/user/footer');

        }
        /**
         * This function is used to search the inbox
         * @param int $id user id 
         */
        public function inbox_search() {
            /*
             * search messages
             */
            $this->load->library('session');
            $this->load->helper('url');
            $this->load->model('member_func');
            $user_id = $this->session->userdata('user_id');
            $branch_id = $this->session->userdata('branch_id');
            $name=$this->input->post('search');
            $session['name']=$this->member_func->get_name($user_id);
            //$data['from']=$this->member_func->get_from($user_id);
            $data['from']=$this->member_func->get_inbox_search($name, $user_id);


            $this->load->view('includes/user/header');
            $this->load->view('includes/member/member_navigation',$session);
            $this->load->view('pages/member/inbox_search',$data);
            $this->load->view('includes/user/footer');
        
    }
        /**
         * This function is used to view message
         * @param int $id user id 
         */
        public function view_message($id) {
                    /*
                     * view inbox
                     */
                    $this->load->library('session');
                    $this->load->helper('url');
                    $this->load->model('member_func');
                    $user_id = $this->session->userdata('user_id');
                    $branch_id = $this->session->userdata('branch_id');
                    $session['name']=$this->member_func->get_name($user_id);
                    $data['message']=$this->member_func->get_messages($id);                    
                                                                              
                    
                    $this->load->view('includes/user/header');
                    $this->load->view('includes/member/member_navigation',$session);
                    $this->load->view('pages/member/view_message',$data);
                    $this->load->view('includes/user/footer');

        }
      /**
         * This function is used to load new message field
         * @param int $id user id 
         */
        public function new_message() {
                    /*
                     * send neww message
                     */
                    $data["status"] = 0; 
                    $this->load->library('session');
                    $this->load->helper('url');
                    $this->load->model('member_func');
                    $user_id = $this->session->userdata('user_id');
                    $branch_id = $this->session->userdata('branch_id');
                    $session['name']=$this->member_func->get_name($user_id);
                    $data['member']=$this->member_func->get_members($branch_id);  
                    
                    // Including Validation Library
                    $this->load->library('form_validation');
                    // Validating Fields              //textbox name--display name---check 
                    $this->form_validation->set_rules('to', 'To', 'required');
                    $this->form_validation->set_rules('message', 'Message', 'required');
                    

                    $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');

                    if ($this->form_validation->run() == FALSE)
                    {
                        $data["status"] = 0;
                        $this->load->view('includes/user/header');
                        $this->load->view('includes/member/member_navigation',$session);
                        $this->load->view('pages/member/new_message',$data);
                        $this->load->view('includes/user/footer');
                    }
                    else
                    {
                        //textbox value-> variable
                        $to=$this->input->post('to');                       
                        $message=$this->input->post('message');

                        // Setting Values For Tabel Columns

                   if ($id = $this->member_func->message_insert($to, $user_id, $message)) { // the information has therefore been successfully saved in the db
                        $data["user_id"] = $id;
                        $data["status"] = 1;
                        $this->load->view('includes/user/header');
                        $this->load->view('includes/member/member_navigation',$session);
                        $this->load->view('pages/member/new_message',$data);
                        $this->load->view('includes/user/footer');

                    } 
                    else {
                        echo 'An error occurred saving your information. Please try again later';

                    }

                }

        }  

        
        /**
             * Displays the draw of th selected tournament
             * according to the user selected values from the dropdown.
             * All the registered players for that specific tournament will be displays according
             * to the catagories provided.
             * @param int $int tournamentID 
             */
        public function draw($id) {
            
                   
                    $this->load->library('session');
                    $this->load->helper('url');
                    $this->load->model('member_func');
                    $user_id = $this->session->userdata('user_id');
                    $branch_id = $this->session->userdata('branch_id');
                    $session['name']=$this->member_func->get_name($user_id);
                    $data['id']=$id;
                    $data['contact_org']=$this->member_func->get_contact_org($id);
                      
                    //post values
                    $gender=$data['gender']=$this->input->post('gender');
                    $under=$data['under']=$this->input->post('under');
                    $tournament_section=$data['tournament_section']=$this->input->post('tournament_section');
                    $belt=$data['belt']=$this->input->post('belt');
                    
                    //get the draw details according to the selected values
                    $data['draw']=$this->member_func->get_draw_details($id, $gender, $under, $tournament_section, $belt); 
                    
                    $this->load->view('includes/user/header');
                    $this->load->view('includes/member/member_navigation',$session);
                    $this->load->view('pages/member/draw',$data);
                    $this->load->view('includes/user/footer');

        }
        
        /**
         *This function display the training schedules
         * to member.
         * @param int $id user id 
         */
         public function training_schedule()
	{
            $this->load->library('session');
            $this->load->helper('url');
            $this->load->model('member_func');
            $user_id = $this->session->userdata('user_id');
            $branch_id = $this->session->userdata('branch_id');
            $data['training_schedule']=$this->member_func->get_traning_schedule($branch_id);
            $session['name']=$this->member_func->get_name($user_id);
            $data['member']=$this->member_func->get_member_details($user_id);
            $data['branch']=$this->member_func->get_branch($branch_id);
            $this->load->view('includes/user/header');
            $this->load->view('includes/member/member_navigation',$session);
            $this->load->view('pages/member/training_schedule',$data);
            $this->load->view('includes/user/footer');
                
	}
        /**
         *This function display the branches ranking of tournaments
         * to member.
         * @param int $id user id 
         */
         public function results($id)
        {
             
            $this->load->library('session');  
            $this->load->helper('url');
            $this->load->model('member_func');
            $user_id = $this->session->userdata('user_id');
            $data['results']=$this->member_func->get_results($id);
            $data['tournament']=$this->member_func->get_tournaments($id);
            $session['name']=$this->member_func->get_name($user_id);
            $data['member']=$this->member_func->get_member_details($user_id);
            $data['ranking']=$this->member_func->get_ranking($id);
            $this->load->view('includes/user/header');
            $this->load->view('includes/member/member_navigation',$session);
            $this->load->view('pages/member/results',$data);
            $this->load->view('includes/user/footer');
        }
      
      /*
       * Extra functions
       */
        /**
         *This function check the bday validations
         * to member.
         * @param int $then user input 
         */
       function check_Birth_day($then, $min)
        {
            // $then will first be a string-date
            $then = strtotime($then);
            //The age to be over, over +18
            $min = strtotime('+18 years', $then);

            //echo $min;
            if(time() < $min)  {
                //die('Not 18'); 
                $this->form_validation->set_message('check_Birth_day', 'Please Enter Valid Birth Day!');
                    return FALSE;
            }
            else{
                return true;
            }
        }
        
        
        
    
    
}

?>