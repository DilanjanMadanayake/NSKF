<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class branch_leader extends CI_Controller {
    
      /**
         * This function is used as the index function.
         * Implements in the page intialization.
         *  @param int $id branch id  
         */ 
        public function index()	{
         
            $this->load->library('session');
            $this->load->helper('url');
            $this->load->model('branch_leader_func');
            $user_id = $this->session->userdata('user_id');
            $branch_id = $this->session->userdata('branch_id');
            $data['member']=$this->branch_leader_func->get_members($branch_id);
            $data['branch']=$this->branch_leader_func->get_branch($branch_id);
            $data['message'] = "";
            $data["status"]=0;
            $session['name']=$this->branch_leader_func->get_name($user_id);
            $this->load->view('includes/admin/header');
            $this->load->view('includes/admin/admin_navigation.php',$session);
            $this->load->view('includes/branch_leader/BL_sidebar');
            $this->load->view('pages/branch_leader/members',$data);
            $this->load->view('includes/admin/footer');
                
	}

          
        /**
         * This function is used to add new member
         *  @param int $id branch id  
         */
        public function add_new_member() {
                $this->load->helper('url');
                $this->load->helper('html');
                $this->load->library('session');
                $this->load->model('branch_leader_func');
                $user_id = $this->session->userdata('user_id');
                $branch_id = $this->session->userdata('branch_id');
                $session['name']=$this->branch_leader_func->get_name($user_id);
                $data['branch']=$this->branch_leader_func->get_all_branches();
                $data["status"]=0;
                // Including Validation Library
                $this->load->library('form_validation');
                // Validating Fields              //textbox name--display name---check 
                $this->form_validation->set_rules('firstname', 'Firstname', 'required|callback_check_String');
                $this->form_validation->set_rules('lastname', 'Lastname', 'required|callback_check_String');
                $this->form_validation->set_rules('email', 'email', 'required|valid_email');
                $this->form_validation->set_rules('password', 'Passowrd', 'required');
                $this->form_validation->set_rules('address', 'Address', 'required');
                $this->form_validation->set_rules('dob', 'Date of birth', 'required|callback_check_Birth_day');
                $this->form_validation->set_rules('gender', 'Gender', 'required');
                $this->form_validation->set_rules('contact', 'Contact Number', 'required|regex_match[/^[0-9]{10}$/]');
                $this->form_validation->set_rules('branch', 'Branch', 'required');

                $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');

                if ($this->form_validation->run() == FALSE)
                {
                    $this->load->view('includes/admin/header');
                    $this->load->view('includes/admin/admin_navigation.php',$session);
                    $this->load->view('includes/branch_leader/BL_sidebar');
                    $this->load->view('pages/branch_leader/add_new_member',$data);
                    $this->load->view('includes/admin/footer');
                }
                else
                {
                    //textbox value-> variable
                    $firstname=$this->input->post('firstname');
                    $lastname=$this->input->post('lastname');
                    $email=$this->input->post('email');
                    $password= $this->input->post('password');
                    $address= $this->input->post('address');
                    $dob= $this->input->post('dob');
                    $gender = $this->input->post('gender');
                    $contact = $this->input->post('contact');
                    $status= $this->input->post('status');
                    $nationality= $this->input->post('nationality');
                    $religion= $this->input->post('relgion');
                    $occupation= $this->input->post('occupation');
                    $branch_id= $this->input->post('branch');
                    $user_type = $this->input->post('M');
                    // Setting Values For Tabel Columns

               if ($id = $this->branch_leader_func->member_insert($firstname, $lastname, $email, $password,
                       $address, $dob, $gender, $contact, $status, $nationality, $religion, $occupation, 
                       $branch_id, $user_type)) { // the information has therefore been successfully saved in the db
                    $data["user_id"] = $id;
                    $data["status"] = 1;
                    
                   
                    $this->load->view('includes/admin/header');
                    $this->load->view('includes/admin/admin_navigation.php',$session);
                    $this->load->view('includes/branch_leader/BL_sidebar');
                    $this->load->view('pages/branch_leader/add_new_member',$data);
                    $this->load->view('includes/admin/footer');
                    
                } 
                else {
                    echo 'An error occurred saving your information. Please try again later';

                }

                }
            }
        
        
        /**
         * This function is used to update member details
         *  @param int $id branch id  
         */
        public function update_member($id){
            $this->load->library('session');
            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->model('branch_leader_func');
            $user_id = $this->session->userdata('user_id');
            $branch_id = $this->session->userdata('branch_id');
            $session['name']=$this->branch_leader_func->get_name($user_id);
            $data['member']=$this->branch_leader_func->get_member_details($id);
            $data['branch']=$this->branch_leader_func->get_all_branches();
            $data['id']=$id;
            $this->load->library('form_validation');

            
            $branch_id= $this->input->post('branch');
            if ($id = $this->branch_leader_func->member_update($id,$branch_id))
            {
                
                $data["user_id"] = $id;

                $this->load->view('includes/admin/header');
                $this->load->view('includes/admin/admin_navigation.php',$session);
                $this->load->view('includes/branch_leader/BL_sidebar');
                $this->load->view('pages/branch_leader/update_member',$data);
                $this->load->view('includes/admin/footer');
                       
            }
            
        }
        
        /**
         * This function is used to delete a branch
         *  @param int $id branch id  
         */
        public function delete_branch($id) {
            $this->load->library('session');

            $this->load->model('branch_leader_func');
            $error=$this->branch_leader_func->check_branch($id);

            $errors = array_filter($error);
            var_dump($errors);
            if (!empty($errors)) {
                $data["status"] = 7;


            } else {
                $this->branch_leader_func->delete_branch($id);
                $data["status"] = 4;

            }

            $user_id = $this->session->userdata('user_id');
            $session['name']=$this->branch_leader_func->get_name($user_id);
            $branch_id = $this->session->userdata('branch_id');
            $data['main_branch'] = $this->branch_leader_func->get_main_branch_accepted();
            $data['sub_branch'] = $this->branch_leader_func->get_sub_branch_accepted();

            $this->load->view('includes/admin/header');
            $this->load->view('includes/admin/admin_navigation.php',$session);        
            $this->load->view('includes/branch_leader/BL_sidebar');
            $this->load->view('pages/branch_leader/branch_management',$data);
            $this->load->view('includes/admin/footer');
        }
    
        /**
         * This function is used to delete a sub branch
         *  @param int $id branch id  
         */
     public function delete_sub_branch($id) {
        $this->load->library('session');
        $this->load->model('branch_leader_func');
        $this->branch_leader_func->delete_sub_branch($id); 
        $user_id = $this->session->userdata('user_id');
        $data['main_branch'] = $this->branch_leader_func->get_main_branch();
        $data['sub_branch'] = $this->branch_leader_func->get_sub_branch();
        $session['name']=$this->branch_leader_func->get_name($user_id);
        $branch_id = $this->session->userdata('branch_id');
        $data["status"] = 6;
        $this->load->view('includes/admin/header');
        $this->load->view('includes/admin/admin_navigation.php',$session);
        $this->load->view('includes/branch_leader/BL_sidebar');
            $this->load->view('pages/branch_leader/branch_management',$data);
            $this->load->view('includes/admin/footer');
    }
        /**
         * This function is used to delete a member from the database
         *  @param int $id branch id  
         */
        public function delete_member($id) {
            

            $this->load->model('branch_leader_func');
            $this->branch_leader_func->delete_member($id);//delete query
            $this->load->library('session');
            $this->load->helper('url');
            $this->load->helper('form');
            $user_id = $this->session->userdata('user_id');
            $branch_id = $this->session->userdata('branch_id');
            $data['member']=$this->branch_leader_func->get_members($branch_id);
            $session['name']=$this->branch_leader_func->get_name($user_id);
            $data['message'] = "User record has been successfully DELETED";
           
            $data['branch']=$this->branch_leader_func->get_branch($branch_id);
            $data["status"]=1;
            $this->load->view('includes/admin/header');
            $this->load->view('includes/admin/admin_navigation.php',$session);
            $this->load->view('includes/branch_leader/BL_sidebar');
            $this->load->view('pages/branch_leader/members',$data);
            $this->load->view('includes/admin/footer');
            //redirect('branch_leader');//redirect to the members page
            
        
        }
        /**
         * This function gets the details of the unregistered user
         *  @param int $id branch id  
         */
        public function member_request(){
            $this->load->library('session');
            $this->load->helper('url');
            $this->load->model('branch_leader_func');
            $user_id = $this->session->userdata('user_id');
            $branch_id = $this->session->userdata('branch_id');
            $data['member']=$this->branch_leader_func->get_member_req($branch_id);
            $data['message'] = "";
            $data["status"]=0;
            $session['name']=$this->branch_leader_func->get_name($user_id);
            $this->load->view('includes/admin/header');
            $this->load->view('includes/admin/admin_navigation.php',$session);
            $this->load->view('includes/branch_leader/BL_sidebar');
            $this->load->view('pages/branch_leader/member_request',$data);
            $this->load->view('includes/admin/footer');
                
	}
        /**
         * This function accepts and deny the member request sent by the unregistered user
         *  @param int $id branch id  
         */
        public function accept_deny_req($id){
            
            $this->load->library('session');
            $this->load->helper('url');
            $this->load->model('branch_leader_func');
            $user_id = $this->session->userdata('user_id');
            $branch_id = $this->session->userdata('branch_id');
            $data['id']=$id;
            $data['member']=$this->branch_leader_func->get_member_details($id);
            $session['name']=$this->branch_leader_func->get_name($user_id);
            $this->load->view('includes/admin/header');
            $this->load->view('includes/admin/admin_navigation.php',$session);
            $this->load->view('includes/branch_leader/BL_sidebar');
            $this->load->view('pages/branch_leader/accept_deny_req',$data);
            $this->load->view('includes/admin/footer');
                
	}
        /**
         * This function accepts the member request sent by the unregistered user
         *  @param int $id branch id  
         */
        public function accept($id){
            /*
             * accept request
             */
            $this->load->library('session');
            $this->load->helper('url');
            $this->load->model('branch_leader_func');
            $user_id = $this->session->userdata('user_id');
            $branch_id = $this->session->userdata('branch_id');
            $data['id']=$id;
            $data['member']=$this->branch_leader_func->get_member_details($id);
            $session['name']=$this->branch_leader_func->get_name($user_id);
                      

            
            if ($id = $this->branch_leader_func->accept_request($id))
            {
                
                $data["user_id"] = $id;
                $data["status"]=1;

                $this->load->view('includes/admin/header');
                $this->load->view('includes/admin/admin_navigation.php',$session);
                $this->load->view('includes/branch_leader/BL_sidebar');
                $this->load->view('pages/branch_leader/member_request',$data);
                $this->load->view('includes/admin/footer');
                
            }

	}
        
        /**
         * This function deny the member request sent by the unregistered user
         *  @param int $id branch id  
         */
        public function deny($id){
            /*
             * deny request
             */
            $this->load->library('session');
            $this->load->helper('url');
            $this->load->model('branch_leader_func');
            $user_id = $this->session->userdata('user_id');
            $branch_id = $this->session->userdata('branch_id');
            $data['id']=$id;
            $data['member']=$this->branch_leader_func->get_member_details($id);
            $session['name']=$this->branch_leader_func->get_name($user_id);
                      

            
            if ($id = $this->branch_leader_func->deny_request($id))
            {
                
                $data["user_id"] = $id;
                $data["status"]=2;

                $this->load->view('includes/admin/header');
                $this->load->view('includes/admin/admin_navigation.php',$session);
                $this->load->view('includes/branch_leader/BL_sidebar');
                $this->load->view('pages/branch_leader/member_request',$data);
                $this->load->view('includes/admin/footer');
                //redirect('branch_leader/member_request');  
                              
                
            }

	}
        
        /**
         * This function creates examination schedules
         *  @param int $id branch id  
         */
        public function exam_schedule_create(){
            /*
             * exam schedules creation
             */            
                $this->load->helper('url');
                $this->load->helper('html');
                $this->load->library('session');
                $this->load->model('branch_leader_func');
                $user_id = $this->session->userdata('user_id');
                $branch_id = $this->session->userdata('branch_id');
                $session['name']=$this->branch_leader_func->get_name($user_id);
                
                
                $data["insertionStatus"]=0;
                // Including Validation Library
                $this->load->library('form_validation');
                // Validating Fields              //textbox name--display name---check 
                $this->form_validation->set_rules('examType', 'Exam type', 'required');
                $this->form_validation->set_rules('subType', 'Sub type', 'required');
                $this->form_validation->set_rules('currRank', 'Current rank', 'required');
                $this->form_validation->set_rules('targetRank', 'Target rank', 'required');
                $this->form_validation->set_rules('ehpeM', 'This field', 'required');                
                $this->form_validation->set_rules('dte', 'Date', 'required');
                
                

                $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');

                if ($this->form_validation->run() == FALSE)
                {
                    $this->load->view('includes/admin/header');
                    $this->load->view('includes/admin/admin_navigation.php',$session);
                    $this->load->view('includes/branch_leader/BL_sidebar');
                    $this->load->view('pages/branch_leader/exam_schedule_create',$data);
                    $this->load->view('includes/admin/footer');
                }
                else
                {
                    //textbox value-> variable
                    $exam_type = $this->input->post('examType');
                    $sub_type = $this->input->post('subType');
                    $current_rank = $this->input->post('currRank');
                    $target_rank = $this->input->post('targetRank');
                    $times =$this->input->post('ehpeM');
                    $date = $this->input->post('dte');
                   
                    $errors = array();
                    
                    // Setting Values For Tabel Columns

               if ($id = $this->branch_leader_func->exam_insert($exam_type, $sub_type, $current_rank, $target_rank,
                       $times, $date, $branch_id)) { // the information has therefore been successfully saved in the db
                    $data["user_id"] = $id;
                    $data["insertionStatus"] = 1;
                    $this->load->view('includes/admin/header');
                    $this->load->view('includes/admin/admin_navigation.php',$session);
                    $this->load->view('includes/branch_leader/BL_sidebar');
                    $this->load->view('pages/branch_leader/exam_schedule_create',$data);
                    $this->load->view('includes/admin/footer');
                    
                } 
                else {
                    echo 'An error occurred saving your information. Please try again later';

                }

                }
            }
        /**
         * This function is used to view the examination schedules
         *  @param int $id branch id  
         */    
        public function exam_schedule(){
            $this->load->library('session');
            $this->load->helper('url');
            $this->load->model('branch_leader_func');
            $user_id = $this->session->userdata('user_id');
            $branch_id = $this->session->userdata('branch_id');
            $data['exam']=$this->branch_leader_func->get_exams();
            
            $data['message'] = "";
            $data["deleteStatus"]=0;
            $session['name']=$this->branch_leader_func->get_name($user_id);
            $this->load->view('includes/admin/header');
            $this->load->view('includes/admin/admin_navigation.php',$session);
            $this->load->view('includes/branch_leader/BL_sidebar');
            $this->load->view('pages/branch_leader/exam_schedule_retUpDel',$data);
            $this->load->view('includes/admin/footer');
                
	}
        
        /**
         * This function is used to delete an examination schedule
         *  @param int $id branch id  
         */
        public function delete_exam($id){
            $this->load->model('branch_leader_func');
            $this->branch_leader_func->delete_exams($id);//delete query
            $this->load->library('session');
            $this->load->helper('url');
            $this->load->helper('form');
            $user_id = $this->session->userdata('user_id');
            $branch_id = $this->session->userdata('branch_id');
            $data['exam']=$this->branch_leader_func->get_exams();
            
            $data['message'] = "User record has been successfully DELETED";
            $session['name']=$this->branch_leader_func->get_name($user_id);
            $data['branch']=$this->branch_leader_func->get_branch($branch_id);
            $data["deleteStatus"]=1;
            $this->load->view('includes/admin/header');
            $this->load->view('includes/admin/admin_navigation.php',$session);
            $this->load->view('includes/branch_leader/BL_sidebar');
            $this->load->view('pages/branch_leader/exam_schedule_retUpDel',$data);
            $this->load->view('includes/admin/footer');
            //redirect('branch_leader');//redirect to the members page
            
        
        }
        
        /**
         * This function is used to update examination schedule
         *  @param int $id branch id  
         */
        public function update_exam($id){
            $this->load->library('session');
            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->model('branch_leader_func');
            $user_id = $this->session->userdata('user_id');
            $branch_id = $this->session->userdata('branch_id');
            $session['name']=$this->branch_leader_func->get_name($user_id);
            
            $data["status"] = 0;
            $data['exam']=$this->branch_leader_func->get_exams_fromid($id);
            $data['id']=$id;
            $this->load->library('form_validation');

            $this->form_validation->set_rules('examType', 'Exam type', 'required');
            $this->form_validation->set_rules('subType', 'Sub type', 'required');
            $this->form_validation->set_rules('currRank', 'Current rank', 'required');
            $this->form_validation->set_rules('targetRank', 'Target rank', 'required');
            $this->form_validation->set_rules('ehpeM', 'This field', 'required');                
            $this->form_validation->set_rules('dte', 'Date', 'required');
            
            $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
            
            
            
            if ($this->form_validation->run() == FALSE) {
            $this->load->view('includes/admin/header');
            $this->load->view('includes/admin/admin_navigation.php',$session);
            $this->load->view('includes/branch_leader/BL_sidebar');
            $this->load->view('pages/branch_leader/exam_schedule_update',$data);
            $this->load->view('includes/admin/footer');
        } else {
            $exam_type = $this->input->post('examType');
            $sub_type = $this->input->post('subType');
            $current_rank = $this->input->post('currRank');
            $target_rank = $this->input->post('targetRank');
            $times =$this->input->post('ehpeM');
            $date = $this->input->post('dte');

            if ($id = $this->branch_leader_func->exam_update($id,$exam_type, $sub_type, $current_rank, $target_rank,
                       $times, $date, $branch_id)) {

                $data["user_id"] = $id;
                $data["status"] = 1;
                $this->load->view('includes/admin/header');
                $this->load->view('includes/admin/admin_navigation.php',$session);
                $this->load->view('includes/branch_leader/BL_sidebar');
                $this->load->view('pages/branch_leader/exam_schedule_update',$data);
                $this->load->view('includes/admin/footer');
                //redirect('chief_instructor/update_coach' . "/" . $id, 'refresh');
            } else {
                echo 'An error occurred saving your information. Please try again later';
            }
            
        }
        }
        
        /**
         * This function is used to create training schedules
         *  @param int $id branch id  
         */
         public function training_schedule()
        {
            $this->load->library('session');
            $this->load->helper('url');
            $this->load->model('branch_leader_func');
            $user_id = $this->session->userdata('user_id');
            $branch_id = $this->session->userdata('branch_id');
            $data['member']=$this->branch_leader_func->get_members($branch_id);
            $data['branch']=$this->branch_leader_func->get_branch($branch_id);
            $session['name']=$this->branch_leader_func->get_name($user_id);
             
            $data["status"]=0;
            $this->load->view('includes/admin/header');
            $this->load->view('includes/admin/admin_navigation.php',$session);
            $this->load->view('includes/branch_leader/BL_sidebar');
            $this->load->view('pages/branch_leader/training_schedule_create',$data);
            $this->load->view('includes/admin/footer');
                
             
        }
        
        /**
         * This function is used to create training schedules
         *  @param int $id branch id  
         */
        public function create_traning_schedule()
        {
              $data["status"]=0;
              $this->load->library('session');
              $this->load->helper('url');
              $this->load->model('branch_leader_func');
              $user_id = $this->session->userdata('user_id');
              $branch_id = $this->session->userdata('branch_id');
              $data['member']=$this->branch_leader_func->get_members($branch_id);
              $data['branch']=$this->branch_leader_func->get_branch($branch_id);
              $session['name']=$this->branch_leader_func->get_name($user_id);
             
                // Including Validation Library
            $this->load->library('form_validation');
                // Validating Fields
            
          
            $this->form_validation->set_rules('training_schedule_date', 'Traning Schedule Date', 'required');
            $this->form_validation->set_rules('schedule_time', 'Traning Schedule Time', 'required');
            $this->form_validation->set_rules('schedule_description', 'Traning Schedule Description', 'required');
            $this->form_validation->set_rules('venue', 'Traning Schedule Venue', 'required');
           
              $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
              
              if ($this->form_validation->run() == FALSE)
              {
                    $data["status"] = 0;
                   $this->load->view('includes/admin/header');
            $this->load->view('includes/admin/admin_navigation.php',$session);
            $this->load->view('includes/branch_leader/BL_sidebar');
            $this->load->view('pages/branch_leader/training_schedule_create',$data);
            $this->load->view('includes/admin/footer');
                
              }
              else
              {
                  $training_schedule_date=$this->input->post('training_schedule_date');
                   $schedule_time=$this->input->post('schedule_time');
                    $schedule_description=$this->input->post('schedule_description');
                     $venue=$this->input->post('venue');
                  
                       // Setting Values For Tabel Columns
                     if($id=$this->branch_leader_func->create_traning_schedule($training_schedule_date,$branch_id,$schedule_description,$schedule_time,$user_id,$venue))
                     {
                          $data["status"] = 1;
                                 $this->load->view('includes/admin/header');
            $this->load->view('includes/admin/admin_navigation.php',$session);
            $this->load->view('includes/branch_leader/BL_sidebar');
            $this->load->view('pages/branch_leader/training_schedule_create',$data);
            $this->load->view('includes/admin/footer');
                          
                     }
                        else 
                            {
                           echo'An error occured while creating a new training schedule. Please try again.';
                            }
                  
              }
             
        }
/**
         * This function is used to view details about the training schedules
         *  @param int $id branch id  
         */
        public function view_training_schedule() 
        {
            $this->load->library('session');
            $this->load->helper('url');
            $this->load->model('branch_leader_func');
            $user_id = $this->session->userdata('user_id');
           // $branch_lead_id=$user_id;
            $branch_id = $this->session->userdata('branch_id');
            $data['training_schedule']=$this->branch_leader_func->view_training_schedule();
            $data['member']=$this->branch_leader_func->get_members($branch_id);
            $data['branch']=$this->branch_leader_func->get_branch($branch_id);
            $session['name']=$this->branch_leader_func->get_name($user_id);
             
            $data["status"]=0;
            $this->load->view('includes/admin/header');
            $this->load->view('includes/admin/admin_navigation.php',$session);
            $this->load->view('includes/branch_leader/BL_sidebar');
            $this->load->view('pages/branch_leader/training_schedule_retUpdDel',$data);
            $this->load->view('includes/admin/footer');
            
        }

        public function view2_traning_schedule($id)
        {
            $this->load->library('session');
            $this->load->helper('url');
            $this->load->model('branch_leader_func');
            $user_id = $this->session->userdata('user_id');
            $branch_id = $this->session->userdata('branch_id');
            $data['id']=$id;
            $data["status"]=0;
            $data['member']=$this->branch_leader_func->get_members($branch_id);
            $data['branch']=$this->branch_leader_func->get_branch($branch_id);
            $session['name']=$this->branch_leader_func->get_name($user_id);
            $data['training_schedule']=$this->branch_leader_func->get_training_scheduleid($id);
            $this->load->view('includes/admin/header');
            $this->load->view('includes/admin/admin_navigation.php',$session);
            $this->load->view('includes/branch_leader/BL_sidebar');
            $this->load->view('pages/branch_leader/training_schedule_update',$data);
            $this->load->view('includes/admin/footer');
        }
        
        /**
         * This function is used to delete training schedules
         *  @param int $id branch id  
         */
        public function delete_training_schedule($id)
        {
            $this->load->library('session');
            $this->load->helper('url');
            $this->load->model('branch_leader_func');
            $this->branch_leader_func->delete_training_schedule($id);
            $user_id = $this->session->userdata('user_id');
            $branch_id = $this->session->userdata('branch_id');
            $data['id']=$id;
            $data["status"]=1;
            $data['member']=$this->branch_leader_func->get_members($branch_id);
            $data['branch']=$this->branch_leader_func->get_branch($branch_id);
            $session['name']=$this->branch_leader_func->get_name($user_id);
            
            
            $data['training_schedule']=$this->branch_leader_func->view_training_schedule();
            $data['member']=$this->branch_leader_func->get_members($branch_id);
            $data['branch']=$this->branch_leader_func->get_branch($branch_id);
            $this->load->view('includes/admin/header');
            $this->load->view('includes/admin/admin_navigation.php',$session);
            $this->load->view('includes/branch_leader/BL_sidebar');
            $this->load->view('pages/branch_leader/training_schedule_retUpdDel',$data);
            $this->load->view('includes/admin/footer');
        }
        
        /**
         * This function is used to update training schedules
         *  @param int $id branch id  
         */
        public function update_training_schedule($id)
        {
              $this->load->library('session');
              $this->load->helper('url');
              $this->load->model('branch_leader_func');
            
              $user_id = $this->session->userdata('user_id');
              $branch_id = $this->session->userdata('branch_id');
              $data['id']=$id;
              $data["status"]=2;
              $data['member']=$this->branch_leader_func->get_members($branch_id);
              $data['branch']=$this->branch_leader_func->get_branch($branch_id);
              $session['name']=$this->branch_leader_func->get_name($user_id);
              $data['training_schedule']=$this->branch_leader_func->get_training_scheduleid($id);
             
            $this->form_validation->set_rules('training_schedule_date', 'Traning Schedule Date', 'required');
            $this->form_validation->set_rules('schedule_time', 'Traning Schedule Time', 'required');
            $this->form_validation->set_rules('schedule_description', 'Traning Schedule Description', 'required');
            $this->form_validation->set_rules('venue', 'Traning Schedule Venue', 'required');
              
               $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
              
              if ($this->form_validation->run() == FALSE)
              {
                   $data["status"] = 0;
                   $this->load->view('includes/admin/header');
                   $this->load->view('includes/admin/admin_navigation.php',$session);
                   $this->load->view('includes/branch_leader/BL_sidebar');
                   $this->load->view('pages/branch_leader/training_schedule_update',$data);
                   $this->load->view('includes/admin/footer');
              }
              else {
             
        
              $training_schedule_date=$this->input->post('training_schedule_date');
              $schedule_time=$this->input->post('schedule_time');
              $schedule_description=$this->input->post('schedule_description');
              $venue=$this->input->post('venue');
            
             if ($id = $this->branch_leader_func->update_training_schedule($id,$training_schedule_date,$schedule_time,$schedule_description,$venue))
             {
                $data["status"]=2;
                $data["id"]=$id;
                $this->load->view('includes/admin/header');
                $this->load->view('includes/admin/admin_navigation.php',$session);
                $this->load->view('includes/branch_leader/BL_sidebar');
                $this->load->view('pages/branch_leader/training_schedule_retUpdDel',$data);
                $this->load->view('includes/admin/footer');
             }
 else {
     echo'An error occurred.Please try again.';
 
        }
}
        }
        
      /**
         * This function is used to view tournament year plan
         *  @param int $id branch id  
         */
        public function tournament()
	{
            $this->load->library('session');
            $this->load->helper('url');
            $this->load->model('branch_leader_func');
            $user_id = $this->session->userdata('user_id');
            $session['name']=$this->branch_leader_func->get_name($user_id);
            $branch_id = $this->session->userdata('branch_id');
            $data['tournament']=$this->branch_leader_func->get_tournament();
            $this->load->view('includes/admin/header');
            $this->load->view('includes/admin/admin_navigation.php',$session);
            $this->load->view('includes/branch_leader/BL_sidebar');
            $this->load->view('pages/branch_leader/tournament',$data);
            $this->load->view('includes/admin/footer');
                
	}
        
        
         /**
             * This function will register the player 3. if the textboxes are 
             * filled correctly page will submit with 
             * success message if not anderror message will be shown
             * @param int $id tournament id
             **/
        public function team_registration($id)
        {
             
            
            $data["status"]=0;
            $this->load->library('session');
            $this->load->helper('url');
            $this->load->helper('html');
            $data['id']=$id;
            $this->load->model('branch_leader_func');
            $user_id = $this->session->userdata('user_id');
              $data['tournament_name']=$this->branch_leader_func->get_tournamnet_name($id);
            $session['name']=$this->branch_leader_func->get_name($user_id);
            $branch_id = $this->session->userdata('branch_id');
            
             // Including Validation Library
            $this->load->library('form_validation');
                // Validating Fields
            $this->form_validation->set_rules('name', 'Full Name', 'required|callback_check_String');
            $this->form_validation->set_rules('email', 'Email Address', 'required|valid_email');
            $this->form_validation->set_rules('contact_number', 'Contact Number', 'required|regex_match[/^[0-9]{10}$/]');
            $this->form_validation->set_rules('address', 'Address', 'required');
            $this->form_validation->set_rules('dob', 'Date Of Birth', 'required|callback_check_Birth_day');
            $this->form_validation->set_rules('gender', 'Gender', 'required');
            $this->form_validation->set_rules('tournament_section','Tournament Section', 'required');
            $this->form_validation->set_rules('tournament_under', 'Tournament Under', 'required');
            $this->form_validation->set_rules('belts', 'Belt', 'required');
              
            $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
            
            if ($this->form_validation->run() == FALSE)
            {
                $data["status"] = 0;
                $this->load->view('includes/admin/header');
                $this->load->view('includes/admin/admin_navigation.php',$session);
                $this->load->view('includes/branch_leader/BL_sidebar');
                $this->load->view('pages/branch_leader/team_registration',$data);
                $this->load->view('includes/admin/footer');
            }
            
            else
            {   
                $name=$this->input->post('name');
                $email=$this->input->post('email');
                $contact_number=$this->input->post('contact_number');
                $address= $this->input->post('address');
                $dob= $this->input->post('dob');
                $gender= $this->input->post('gender');
                $tournament_section = $this->input->post('tournament_section');
                $tournament_under = $this->input->post('tournament_under');
                $belts= $this->input->post('belts');
                
                // Setting Values For Tabel Columns
             
             if($id=$this->branch_leader_func->player_1_insert($id,$name,$email,$contact_number,$address,$dob,$gender,$tournament_section,$tournament_under,$belts))
                {   
                $data["status"] = 1;
                
                $this->load->view('includes/admin/header');
                $this->load->view('includes/admin/admin_navigation.php',$session);
                $this->load->view('includes/branch_leader/BL_sidebar');
                $this->load->view('pages/branch_leader/player_2',$data);
                $this->load->view('includes/admin/footer');
           
                }
             else 
                {
                
                redirect('branch_leader/player_2/'.$data['id']);

                }
            }
        }
            
        
        
        
        /**
             * This function will register the player 2. if the textboxes are 
             * filled correctly page will submit with 
             * success message if not anderror message will be shown
             * @param int $id tournament id
             **/  
        
            public function player_2($id)
	{
              
                
            $data["status"]=0;
            $this->load->library('session');
            $this->load->helper('url');
            $this->load->helper('html');
            $data['id']=$id;
            $this->load->model('branch_leader_func');
            $user_id = $this->session->userdata('user_id');
            $session['name']=$this->branch_leader_func->get_name($user_id);
              $data['tournament_name']=$this->branch_leader_func->get_tournamnet_name($id);
            $branch_id = $this->session->userdata('branch_id');
            
             // Including Validation Library
            $this->load->library('form_validation');
                // Validating Fields
            $this->form_validation->set_rules('name_2', 'Full Name', 'required|callback_check_String');
            $this->form_validation->set_rules('email_2', 'Email Address', 'required|valid_email');
            $this->form_validation->set_rules('contact_number_2', 'Contact Number', 'required|regex_match[/^[0-9]{10}$/]');
            $this->form_validation->set_rules('address_2', 'Address', 'required');
            $this->form_validation->set_rules('dob_2', 'Date Of Birth', 'required|callback_check_Birth_day');
            $this->form_validation->set_rules('gender_2', 'Gender', 'required');
            $this->form_validation->set_rules('tournament_section_2','Tournament Section');
            $this->form_validation->set_rules('tournament_under_2', 'Tournament Under');
            $this->form_validation->set_rules('belts_2', 'Belt', 'required');
              
            $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
            
            
            
            
            if ($this->form_validation->run() == FALSE)
            {
                $data["status"] = 0;
                $this->load->view('includes/admin/header');
                $this->load->view('includes/admin/admin_navigation.php',$session);
                $this->load->view('includes/branch_leader/BL_sidebar');
                $this->load->view('pages/branch_leader/player_2',$data);
                $this->load->view('includes/admin/footer');
            }
            
            else
            {   
                $name_2=$this->input->post('name_2');
                $email_2=$this->input->post('email_2');
                $contact_number_2=$this->input->post('contact_number_2');
                $address_2= $this->input->post('address_2');
                $dob_2= $this->input->post('dob_2');
                $gender_2= $this->input->post('gender_2');
                $tournament_section_2 = $this->input->post('tournament_section_2');
                $tournament_under_2 = $this->input->post('tournament_under_2');
                $belts_2= $this->input->post('belts_2');
                
                // Setting Values For Tabel Columns
             
            if($inid=$this->branch_leader_func->player_2_insert($id,$name_2,$email_2,$contact_number_2,$address_2,$dob_2,$gender_2,$tournament_section_2,$tournament_under_2,$belts_2))
            {
                $data["status"] = 1;
                $this->load->view('includes/admin/header');
                $this->load->view('includes/admin/admin_navigation.php',$session);
                $this->load->view('includes/branch_leader/BL_sidebar');
                $this->load->view('pages/branch_leader/player_3',$data);
                $this->load->view('includes/admin/footer');
            }
            else 
                {
                 
                 redirect('branch_leader/player_3/'.$data['id']);
                }
            }
                
	}
        
        /**
             * This function will register the player 3. if the textboxes are 
             * filled correctly page will submit with 
             * success message if not anderror message will be shown
             * @param int $id tournament id
             **/ 
            public function player_3($id)
	{                
            $data["status"]=0;
            $this->load->library('session');
            $this->load->helper('url');
            $this->load->helper('html');
            $data['id']=$id;
            $this->load->model('branch_leader_func');
            $user_id = $this->session->userdata('user_id');
            $session['name']=$this->branch_leader_func->get_name($user_id);
            $data['tournament_name']=$this->branch_leader_func->get_tournamnet_name($id);
            $data['teams_players']=$this->branch_leader_func->get_team_players($id);
            $branch_id = $this->session->userdata('branch_id');
            
             // Including Validation Library
            $this->load->library('form_validation');
                // Validating Fields
            $this->form_validation->set_rules('name_3', 'Full Name', 'required|callback_check_String');
            $this->form_validation->set_rules('email_3', 'Email Address', 'required|valid_email');
            $this->form_validation->set_rules('contact_number_3', 'Contact Number', 'required|regex_match[/^[0-9]{10}$/]');
            $this->form_validation->set_rules('address_3', 'Address', 'required');
            $this->form_validation->set_rules('dob_3', 'Date Of Birth', 'required|callback_check_Birth_day');
            $this->form_validation->set_rules('gender_3', 'Gender', 'required');
            $this->form_validation->set_rules('tournament_section_3','Tournament Section');
            $this->form_validation->set_rules('tournament_under_3', 'Tournament Under');
            $this->form_validation->set_rules('belts_3', 'Belt', 'required');
              
            $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
            
            if ($this->form_validation->run() == FALSE)
            {
                $data["status"] = 0;
                $this->load->view('includes/admin/header');
                $this->load->view('includes/admin/admin_navigation.php',$session);
                $this->load->view('includes/branch_leader/BL_sidebar');
                $this->load->view('pages/branch_leader/player_3',$data);
                $this->load->view('includes/admin/footer');
            }
            
            else
            {   
                $name_3=$this->input->post('name_3');
                $email_3=$this->input->post('email_3');
                $contact_number_3=$this->input->post('contact_number_3');
                $address_3= $this->input->post('address_3');
                $dob_3= $this->input->post('dob_3');
                $gender_3= $this->input->post('gender_3');
                $tournament_section_3 = $this->input->post('tournament_section_3');
                $tournament_under_3 = $this->input->post('tournament_under_3');
                $belts_3= $this->input->post('belts_3');
                
                // Setting Values For Tabel Columns
             
            if($inid=$this->branch_leader_func->player_3_insert($id,$name_3,$email_3,$contact_number_3,$address_3,$dob_3,$gender_3,$tournament_section_3,$tournament_under_3,$belts_3))
            {
                $data["status"] = 1;
                $this->load->view('includes/admin/header');
                $this->load->view('includes/admin/admin_navigation.php',$session);
                $this->load->view('includes/branch_leader/BL_sidebar');
                $this->load->view('pages/branch_leader/view_team_registration',$data);
                $this->load->view('includes/admin/footer');
           
            }
            else 
                {
                redirect('branch_leader/view_team_registration/'.$data['id']);
                }
            }
                
	}
        
        
               /**
                * This function view the teams which are
                * registered for a particular tournament
                * with the player's details
                * @param int $id tournament id
                **/
           public function view_team_registration($id)
	{
               
            $this->load->library('session');
            $this->load->helper('url');
            $data['id']=$id;
            $this->load->model('branch_leader_func');
            $user_id = $this->session->userdata('user_id');
            $session['name']=$this->branch_leader_func->get_name($user_id);
            $data['teams_players']=$this->branch_leader_func->get_team_players($id);
            $data['tournament_name']=$this->branch_leader_func->get_tournamnet_name($id);
            $branch_id = $this->session->userdata('branch_id');
            $data['tournament']=$this->branch_leader_func->get_tournament();
            $this->load->view('includes/admin/header');
            $this->load->view('includes/admin/admin_navigation.php',$session);
            $this->load->view('includes/branch_leader/BL_sidebar');
            $this->load->view('pages/branch_leader/view_team_registration',$data);
            $this->load->view('includes/admin/footer');
                
	}
        
        
             /**
              * This function search a registered players details 
              * if there are search results it will be shown
              * and if there are no search result an error message will be shown
             **/
         public function team_registration_search()
	{
            
            $this->load->library('session');
            $this->load->helper('url');
            $search=NULL;
            $search=$this->input->post('search');
            $data["status"]=0;
            $this->load->model('branch_leader_func');
            $user_id = $this->session->userdata('user_id');
            $session['name']=$this->branch_leader_func->get_name($user_id);
      
            $branch_id = $this->session->userdata('branch_id');
            $data['search']=$this->branch_leader_func->get_team_registration_search($search);
            $count= count($data['search']);
            
            if (empty($search) OR $count == 0)
               {
                    $data["status"]=1;
                    $this->load->view('includes/admin/header');
                    $this->load->view('includes/admin/admin_navigation.php',$session);
                    $this->load->view('includes/branch_leader/BL_sidebar');
                    $this->load->view('pages/branch_leader/view_team_registration_search',$data);
                    $this->load->view('includes/admin/footer');
                }
            else 
                {
                    $data["status"]=2;
                    $this->load->view('includes/admin/header');
                    $this->load->view('includes/admin/admin_navigation.php',$session);
                    $this->load->view('includes/branch_leader/BL_sidebar');
                    $this->load->view('pages/branch_leader/view_team_registration_search',$data);
                    $this->load->view('includes/admin/footer');
                
                }
          
}
         
         /**
          * This function search a particular tournament in the tournament year plan 
          * if there are search results it will be shown
          * and if there are no search result an error message will be shown
          * 
          **/

     public function tournament_search()
	{
         
            $this->load->library('session');
            $this->load->helper('url');
            $search=NULL;
            $search=$this->input->post('search');
          
            $data["status"]=0;
            $this->load->model('branch_leader_func');
            $user_id = $this->session->userdata('user_id');
            $session['name']=$this->branch_leader_func->get_name($user_id);
      
            $branch_id = $this->session->userdata('branch_id');
            $data['search']=$this->branch_leader_func->get_search($search);
            $count= count($data['search']);
             
           if (empty($search) OR $count == 0)
            {
                $data["status"]=1;
                $this->load->view('includes/admin/header');
                $this->load->view('includes/admin/admin_navigation.php',$session);
                $this->load->view('includes/branch_leader/BL_sidebar');
                $this->load->view('pages/branch_leader/tournament_search',$data);
                $this->load->view('includes/admin/footer');
            }
          else 
            {
                $data["status"]=2;
                $this->load->view('includes/admin/header');
                $this->load->view('includes/admin/admin_navigation.php',$session);
                $this->load->view('includes/branch_leader/BL_sidebar');
                $this->load->view('pages/branch_leader/tournament_search',$data);
                $this->load->view('includes/admin/footer');
                
            }
          
}


/******************************/

/**
         * By this function a new main branch can be added.
         *  @param int $id branch id  
         */
 public function add_branch() {
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('branch_leader_func');
        $user_id = $this->session->userdata('user_id');
        $session['name'] = $this->branch_leader_func->get_name($user_id);
        $branch_id = $this->session->userdata('branch_id');
        $data['branch'] = $this->branch_leader_func->get_main_branch();
        $data['bl'] = $this->branch_leader_func->get_branch_lead();
        $data['main_branch'] = $this->branch_leader_func->get_main_branch();
        $data['sub_branch'] = $this->branch_leader_func->get_sub_branch();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Branch name', 'required|callback_check_String');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('town', 'Town', 'required|callback_check_String');
        $this->form_validation->set_rules('country', 'Country', 'required|callback_check_String');
        $this->form_validation->set_rules('contact_no', 'Phone No', 'required|exact_length[10]|integer|callback_check_Mobile');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean');
        $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
        $data["status"] = 0;
        $branch_name = $this->input->post('name');
        $town = $this->input->post('town');
        $country = $this->input->post('country');
        $contact_number = $this->input->post('contact_no');
        $email = $this->input->post('email');
        $address = $this->input->post('address');
        $request = 'P';

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('includes/admin/header');
            $this->load->view('includes/admin/admin_navigation.php', $session);
            $this->load->view('includes/branch_leader/BL_sidebar');
            $this->load->view('pages/branch_leader/add_branch', $data);
            $this->load->view('includes/admin/footer');
        } else {
            $branchMainSub = $_POST['selectBranch'];
            if ($branchMainSub == 'sub') {
                if ($id = $this->branch_leader_func->add_sub_branch($branch_name, $contact_number, $email, $town, $country, $address, $request)) {
                    $data["user_id"] = $id;
                    $data["status"] = 1;
                    $this->load->view('includes/admin/header');
                    $this->load->view('includes/admin/admin_navigation.php', $session);
                    $this->load->view('includes/branch_leader/BL_sidebar');
                    $this->load->view('pages/branch_leader/add_branch', $data);
                    $this->load->view('includes/admin/footer');
                } else {
                    echo 'An error occurred saving your information. Please try again later';
                }
            } else {
                if ($id = $this->branch_leader_func->add_branch($branch_name, $contact_number, $email, $town, $country, $address, $request)) {
                    $data["user_id"] = $id;
                    $data["status"] = 1;
                    $this->load->view('includes/admin/header');
                    $this->load->view('includes/admin/admin_navigation.php', $session);
                    $this->load->view('includes/branch_leader/BL_sidebar');
                    $this->load->view('pages/branch_leader/add_branch', $data);
                    $this->load->view('includes/admin/footer');
                } else {
                    echo 'An error occurred saving your information. Please try again later';
                }
            }
        }
    }

    /**
         * By this function sub branch details can be updated
         *  @param int $id branch id  
         */
    public function update_sub_branch($id) {
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('branch_leader_func');
        $data['branch'] = $this->branch_leader_func->get_sub_branch_details($id);
        $data['bl'] = $this->branch_leader_func->get_branch_lead();
        $data['id']=$id;
        $data["status"] = 5;
        $user_id = $this->session->userdata('user_id');
        $session['name']=$this->branch_leader_func->get_name($user_id);
        $branch_id = $this->session->userdata('branch_id');
        $data['branch_name'] = $this->branch_leader_func->get_branch_name($id);
        $data['main_branch'] = $this->branch_leader_func->get_main_branch();
        $data['sub_branch'] = $this->branch_leader_func->get_sub_branch();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Branch name', 'required|callback_check_String');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('town', 'Town', 'required|callback_check_String');
        $this->form_validation->set_rules('country', 'Country', 'required|callback_check_String');
        $this->form_validation->set_rules('contact_no', 'Phone No', 'required|exact_length[10]|integer|callback_check_Mobile');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean');
        $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('includes/admin/header');
            $this->load->view('includes/admin/admin_navigation.php',$session);
            $this->load->view('includes/chief_instructor/CI_sidebar');
            $this->load->view('pages/chief_instructor/update_sub_branch', $data);
            $this->load->view('includes/admin/footer');
        } else {
            $branch_name = $this->input->post('name');
            $town = $this->input->post('town');
            $country = $this->input->post('country');
            $contact_number = $this->input->post('contact_no');
            $email = $this->input->post('email');
            $address = $this->input->post('address');

            if ($id = $this->branch_leader_func->update_sub_branch($id, $branch_name, $contact_number, $email, $town, $country, $address)) {
                $data["user_id"] = $id;
                $this->load->view('includes/admin/header');
                $this->load->view('includes/admin/admin_navigation.php',$session);
                $this->load->view('includes/chief_instructor/CI_sidebar');
                $this->load->view('pages/chief_instructor/branch_management', $data);
                $this->load->view('includes/admin/footer');
            }
        }
    }
    
    /**
         * By this function sub branch details can be viewed
         *  @param int $id branch id  
         */
    public function view_sub_branch($id) {
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('branch_leader_func');
        $data['branch'] = $this->branch_leader_func->get_sub_branch_details($id);
        $user_id = $this->session->userdata('user_id');
        $session['name'] = $this->branch_leader_func->get_name($user_id);
        $branch_id = $this->session->userdata('branch_id');
        $this->load->view('includes/admin/header');
        $this->load->view('includes/admin/admin_navigation.php', $session);
        $this->load->view('includes/branch_leader/BL_sidebar');
                $this->load->view('pages/branch_leader/view_sub_branch', $data);
                $this->load->view('includes/admin/footer');
    }

    /**
         * By this function branch details can be updated.
         *  @param int $id branch id  
         */
    public function update_branch($id) {
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('branch_leader_func');
        $data['branch'] = $this->branch_leader_func->get_main_branch_details($id);
        $data['bl'] = $this->branch_leader_func->get_branch_lead();
        $data['main_branch'] = $this->branch_leader_func->get_main_branch();
        $data['sub_branch'] = $this->branch_leader_func->get_sub_branch();
        $data['id'] = $id;
        $data["status"] = 0;
        $this->load->library('form_validation');
        $user_id = $this->session->userdata('user_id');
        $session['name'] = $this->branch_leader_func->get_name($user_id);
        $branch_id = $this->session->userdata('branch_id');
        $this->form_validation->set_rules('name', 'Branch name', 'required|callback_check_String');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('town', 'Town', 'required|callback_check_String');
        $this->form_validation->set_rules('country', 'Country', 'required|callback_check_String');
        $this->form_validation->set_rules('contact_no', 'Phone No', 'exact_length[10]|integer|callback_check_Mobile');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean');
        $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('includes/admin/header');
            $this->load->view('includes/admin/admin_navigation.php', $session);
            $this->load->view('includes/branch_leader/BL_sidebar');
            $this->load->view('pages/branch_leader/update_branch', $data);
            $this->load->view('includes/admin/footer');
        } else {
            $branch_name = $this->input->post('name');
            $town = $this->input->post('town');
            $country = $this->input->post('country');
            $contact_number = $this->input->post('contact_no');
            $email = $this->input->post('email');
            $address = $this->input->post('address');

            if ($id = $this->branch_leader_func->update_branch($id, $branch_name, $contact_number, $email, $town, $country, $address)) {
                $data["user_id"] = $id;
                $data["status"] = 3;
                $this->load->view('includes/admin/header');
                $this->load->view('includes/admin/admin_navigation.php', $session);
                $this->load->view('includes/branch_leader/BL_sidebar');
                $this->load->view('pages/branch_leader/branch_management', $data);
                $this->load->view('includes/admin/footer');
            }
        }
    }

    /**
         * This function shows all the details about the sub branch and main branch
         *  @param int $id branch id  
         */
    public function branch_management() {

        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('branch_leader_func');
        $data['main_branch'] = $this->branch_leader_func->get_main_branch_accepted();
        $data['sub_branch'] = $this->branch_leader_func->get_sub_branch_accepted();
        $user_id = $this->session->userdata('user_id');
        $session['name'] = $this->branch_leader_func->get_name($user_id);
        $branch_id = $this->session->userdata('branch_id');
        $data["status"] = 0;
        $this->load->view('includes/admin/header');
        $this->load->view('includes/admin/admin_navigation.php', $session);
        $this->load->view('includes/branch_leader/BL_sidebar');
        $this->load->view('pages/branch_leader/branch_management', $data);
        $this->load->view('includes/admin/footer');
    }

    /**
         * By this function main branch details can be viewed
         *  @param int $id branch id  
         */
    public function view_branch($id) {
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('branch_leader_func');
        $branch_lead_id = $id;
        $data['branch_lead'] = $this->branch_leader_func->get_branch_lead1($branch_lead_id);
        $data['branch'] = $this->branch_leader_func->get_main_branch_details($id);
        $user_id = $this->session->userdata('user_id');
        $session['name'] = $this->branch_leader_func->get_name($user_id);
        $branch_id = $this->session->userdata('branch_id');
        $this->load->view('includes/admin/header');
        $this->load->view('includes/admin/admin_navigation.php', $session);
        $this->load->view('includes/branch_leader/BL_sidebar');
        $this->load->view('pages/branch_leader/view_branch', $data);
        $this->load->view('includes/admin/footer');
    }

        
        /**
         * This function checks whether the entered age is over 18
         *  @param int $then, $min 
         */
        function check_Birth_day($then, $min){
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
        
       /**
         * This function checks entered phone number is valid one or not
         *  @param int $field 
         */
        function check_Mobile($field) {
        $res = preg_match('/[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]/', $field);
        if ($res == 0) {
            $this->form_validation->set_message('check_Mobile', 'Please Enter Valid Mobile No!');
            return FALSE;
        } else {
            return TRUE;
        }
    }
    
    /**
         * This function checks whether the sring contains any numbers or symbles
         *  @param int $field 
         */
    function check_String($field) {
        if (ctype_alpha(str_replace(' ', '', $field)) === false) {
            $this->form_validation->set_message('check_String', 'This must only contain letters!');
            return FALSE;
        } else {
            return TRUE;
        }
    }

        
        


}

?>