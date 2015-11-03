<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class chief_instructor extends CI_Controller {
    
     /**
         * This function is used to load the main page of chief instructor
         * @param int $id user id 
         */
   
    	public function index()
	{
            $this->load->library('session');
            $this->load->helper('url');
            $this->load->model('chief_instructor_func');
            $user_id = $this->session->userdata('user_id');
            $session['name']=$this->chief_instructor_func->get_name($user_id);
            $branch_id = $this->session->userdata('branch_id');
            $data['tournament']=$this->chief_instructor_func->get_tournament();
            $this->load->view('includes/admin/header');
            $this->load->view('includes/admin/admin_navigation.php',$session);
            $this->load->view('includes/chief_instructor/CI_sidebar');
            $this->load->view('pages/chief_instructor/tournament',$data);
            $this->load->view('includes/admin/footer');
                
	}
        
         /**
         * This function is used to get all the branch leaders registered in NSKF
         * @param int $id branch id 
         */
        
        public function branch_leaders()
        {
            $this->load->library('session');
            $this->load->helper('url');
            $this->load->model('chief_instructor_func');
            $user_id = $this->session->userdata('user_id');
            $session['name']=$this->chief_instructor_func->get_name($user_id);
            $branch_id = $this->session->userdata('branch_id');
            $data['leader']=$this->chief_instructor_func->get_branch_leaders();
           // $data['branch']=$this->chief_instructor_func->get_branch($id);
            $this->load->view('includes/admin/header');
            $this->load->view('includes/admin/admin_navigation.php',$session);
            $this->load->view('includes/chief_instructor/CI_sidebar');
            $this->load->view('pages/chief_instructor/branch_leaders',$data);
            $this->load->view('includes/admin/footer');
            
        }
        
         /**
         * This function is used to assign privileges for branh leaders.
         * @param int $id branch id 
         */
        
        public function privileges($id)
        {
            $this->load->library('session');
            $this->load->helper('url');
            $this->load->model('chief_instructor_func');
            $user_id = $this->session->userdata('user_id');
            $session['name']=$this->chief_instructor_func->get_name($user_id);
            $branch_id = $this->session->userdata('branch_id');
            $data['branch']=$this->chief_instructor_func->get_branch($id);
            $data['privilege']=$this->chief_instructor_func->get_branch_leader_details($id);
            $data['details']=$this->chief_instructor_func->get_privileges($id);
            $this->load->view('includes/admin/header');
            $this->load->view('includes/admin/admin_navigation.php',$session);
            $this->load->view('includes/chief_instructor/CI_sidebar');
            $this->load->view('pages/chief_instructor/privileges',$data);
            $this->load->view('includes/admin/footer');
            
        }
        
         /**
         * This function is used to add privileges to branch leaders.
         * @param int $id branch id 
         */
        public function add_privileges($id)
        {
            $this->load->library('session');
            $this->load->helper('url');
            $this->load->model('chief_instructor_func');
            $user_id = $this->session->userdata('user_id');
            $data['id']=$id;
            $session['name']=$this->chief_instructor_func->get_name($user_id);
            $branch_id = $this->session->userdata('branch_id');
            $data['branch']=$this->chief_instructor_func->get_branch($id);
            $data['privilege']=$this->chief_instructor_func->get_branch_leader_details($id);
            $data['details']=$this->chief_instructor_func->get_privileges($id);
            
            $privileges=$this->input->post('privilege');
            
            if ($id1 = $this->chief_instructor_func->add_privileges($id, $privileges)) { 
                    $data["user_id"] = $id1;
                    $this->load->view('includes/admin/header');
                    $this->load->view('includes/admin/admin_navigation.php',$session);
                    $this->load->view('includes/chief_instructor/CI_sidebar');
                    $this->load->view('pages/chief_instructor/add_privileges',$data);
                    $this->load->view('includes/admin/footer');
                    //redirect('chief_instructor/branch_leaders');//redirect to the members page
                } else {
                    //echo 'An error occurred saving your information. Please try again later';

                }
        }
        
         /**
         * This function is used to update privileges which are assigned to branch leaders.
         * @param int $id branch id 
         */
        
        public function update_privileges($id)
        {
            $this->load->library('session');
            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->model('chief_instructor_func');
            $user_id = $this->session->userdata('user_id');
            $data['id']=$id;
            $session['name']=$this->chief_instructor_func->get_name($user_id);
            $branch_id = $this->session->userdata('branch_id');
            $data['branch']=$this->chief_instructor_func->get_branch($id);
            $data['privilege']=$this->chief_instructor_func->get_branch_leader_details($id);
            $data['details']=$this->chief_instructor_func->get_privileges($id);
            
            $this->load->library('form_validation');
            $privileges=$this->input->post('privilege');
            
            
            if ($id1 = $this->chief_instructor_func->update_privileges($id, $privileges)) 
                {
                    $data["user_id"] = $id1;
                    $this->load->view('includes/admin/header');
                    $this->load->view('includes/admin/admin_navigation.php',$session);
                    $this->load->view('includes/chief_instructor/CI_sidebar');
                    $this->load->view('pages/chief_instructor/update_privileges',$data);
                    $this->load->view('includes/admin/footer');
                    //redirect('chief_instructor/update_privileges'."/".$id,'refresh');//redirect to the members page
                } else {
                    echo 'An error occurred saving your information. Please try again later';

                }
        }

         /**
         * This function is used to get the branch management page
         * @param int $id branch id 
         */
        
        public function branch_management() {
            
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('chief_instructor_func');
        $data['main_branch'] = $this->chief_instructor_func->get_main_branch();
        $data['sub_branch'] = $this->chief_instructor_func->get_sub_branch();
        $user_id = $this->session->userdata('user_id');
        $session['name']=$this->chief_instructor_func->get_name($user_id);
        $branch_id = $this->session->userdata('branch_id');   
        $data["status"] = 0;
        $this->load->view('includes/admin/header');
        $this->load->view('includes/admin/admin_navigation.php',$session);
        $this->load->view('includes/chief_instructor/CI_sidebar');
        $this->load->view('pages/chief_instructor/branch_management', $data);
        $this->load->view('includes/admin/footer');
    }

     /**
         * This function is used to accept or decline branch request
         * @param int $id branch id 
         */
    public function branch_accept_decline() {
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('chief_instructor_func');
        $data['main_branch'] = $this->chief_instructor_func->get_main_branch_pending();
        $data['sub_branch'] = $this->chief_instructor_func->get_sub_branch_pending();
        $user_id = $this->session->userdata('user_id');
        $session['name'] = $this->chief_instructor_func->get_name($user_id);
        $branch_id = $this->session->userdata('branch_id');
        $data["status"] = 0;
        $this->load->view('includes/admin/header');
        $this->load->view('includes/admin/admin_navigation.php', $session);
        $this->load->view('includes/chief_instructor/CI_sidebar');
        $this->load->view('pages/chief_instructor/branch_accept_decline', $data);
        $this->load->view('includes/admin/footer');
    }

     /**
         * This function is used to accept branch request
         * @param int $id branch id 
         */
    public function branch_accept() {
        $branchType = $_GET['type'];
        $branchId = $_GET['bid'];
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('chief_instructor_func');
        $data['main_branch'] = $this->chief_instructor_func->get_main_branch_pending();
        $data['sub_branch'] = $this->chief_instructor_func->get_sub_branch_pending();
        $user_id = $this->session->userdata('user_id');
        $session['name'] = $this->chief_instructor_func->get_name($user_id);
        $branch_id = $this->session->userdata('branch_id');
        $data["status"] = 1;
        $request = 'A';
        if ($branchType == 'main') {
            if ($id = $this->chief_instructor_func->accept_main_request($branchId, $request)) {
                $data["user_id"] = $id;
                $data["status"] = 1;
                $this->load->view('includes/admin/header');
                $this->load->view('includes/admin/admin_navigation.php', $session);
                $this->load->view('includes/chief_instructor/CI_sidebar');
                $this->load->view('pages/chief_instructor/branch_accept_decline', $data);
                $this->load->view('includes/admin/footer');
                redirect('chief_instructor/branch_accept_decline' . "/" . $id, 'refresh');
            }
        } else {
            if ($id = $this->chief_instructor_func->accept_sub_request($branchId, $request)) {
                $data["user_id"] = $id;
                $data["status"] = 1;
                $this->load->view('includes/admin/header');
                $this->load->view('includes/admin/admin_navigation.php', $session);
                $this->load->view('includes/chief_instructor/CI_sidebar');
                $this->load->view('pages/chief_instructor/branch_accept_decline', $data);
                $this->load->view('includes/admin/footer');
                redirect('chief_instructor/branch_accept_decline' . "/" . $id, 'refresh');
            }
        }
    }
    
     /**
         * This function is used to deny branch request
         * @param int $id branch id 
         */

    public function branch_deny() {
        $branchType = $_GET['type'];
        $branchId = $_GET['bid'];
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('chief_instructor_func');
        $data['main_branch'] = $this->chief_instructor_func->get_main_branch_pending();
        $data['sub_branch'] = $this->chief_instructor_func->get_sub_branch_pending();
        $user_id = $this->session->userdata('user_id');
        $session['name'] = $this->chief_instructor_func->get_name($user_id);
        $branch_id = $this->session->userdata('branch_id');
        $data["status"] = 2;
        if ($branchType == 'main') {
            if ($id = $this->chief_instructor_func->delete_main_request($branchId)) {
                $data["user_id"] = $id;
                $data["status"] = 2;
                $this->load->view('includes/admin/header');
                $this->load->view('includes/admin/admin_navigation.php', $session);
                $this->load->view('includes/chief_instructor/CI_sidebar');
                $this->load->view('pages/chief_instructor/branch_accept_decline', $data);
                $this->load->view('includes/admin/footer');
                redirect('chief_instructor/branch_accept_decline' . "/" . $id, 'refresh');
            }
        } else {
            if ($id = $this->chief_instructor_func->delete_sub_request($branchId)) {
                $data["user_id"] = $id;
                $data["status"] = 2;
                $this->load->view('includes/admin/header');
                $this->load->view('includes/admin/admin_navigation.php', $session);
                $this->load->view('includes/chief_instructor/CI_sidebar');
                $this->load->view('pages/chief_instructor/branch_accept_decline', $data);
                $this->load->view('includes/admin/footer');
                redirect('chief_instructor/branch_accept_decline' . "/" . $id, 'refresh');
            }
        }
    }

    
     /**
         * This function is used to create announcmentfor members and staff
         * @param int $id user id 
         */
    public function announcement() {
        $this->load->library('session');
        
        $this->load->helper('url');
        $pref = array('show_next_prev' => 'TRUE');
        $data['cal'] = $this->load->library('calendar', $pref);
        $user_id = $this->session->userdata('user_id');
        $session['name']=$this->chief_instructor_func->get_name($user_id);
        $branch_id = $this->session->userdata('branch_id');
        $this->load->view('includes/admin/header');
        $this->load->view('includes/admin/admin_navigation.php',$session);
        $this->load->view('includes/chief_instructor/CI_sidebar');
        $this->load->view('pages/chief_instructor/announcement');
        $this->load->view('includes/admin/footer');
    }

    
     /**
         * This function is used to load the coach management page
         * @param int $id branch id 
         */
    public function coach_management() {
        $this->load->library('session');
       
        $this->load->helper('url');
        $this->load->model('chief_instructor_func');
        $data['status']=0;
        $data['coach'] = $this->chief_instructor_func->get_coach_details();
        $user_id = $this->session->userdata('user_id');
        $session['name']=$this->chief_instructor_func->get_name($user_id);
        $branch_id = $this->session->userdata('branch_id');
        $this->load->view('includes/admin/header');
        $this->load->view('includes/admin/admin_navigation.php',$session);
        $this->load->view('includes/chief_instructor/CI_sidebar');
        $this->load->view('pages/chief_instructor/coach_management', $data);
        $this->load->view('includes/admin/footer');
    }

     /**
         * This function is used to get the branch leader management
         * @param int $id branch id 
         */
    public function branch_lead_management() {
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('chief_instructor_func');
        $data['status'] = 0;
        $data['bl'] = $this->chief_instructor_func->get_branch_lead();
        $user_id = $this->session->userdata('user_id');
        $session['name'] = $this->chief_instructor_func->get_name($user_id);
        $branch_id = $this->session->userdata('branch_id');
        $this->load->view('includes/admin/header');
        $this->load->view('includes/admin/admin_navigation.php', $session);
        $this->load->view('includes/chief_instructor/CI_sidebar');
        $this->load->view('pages/chief_instructor/branch_lead_management', $data);
        $this->load->view('includes/admin/footer');
    }
    
     /**
         * This function is used to get all the coaches in NSKF
         * @param int $id user id 
         */

    public function view_coach($id) {
        $this->load->library('session');
        
        $this->load->helper('url');
        $this->load->model('chief_instructor_func');
        $data['coach'] = $this->chief_instructor_func->get_coach($id);
        $user_id = $this->session->userdata('user_id');
        $session['name']=$this->chief_instructor_func->get_name($user_id);
        $branch_id = $this->session->userdata('branch_id');
        $this->load->view('includes/admin/header');
        $this->load->view('includes/admin/admin_navigation.php',$session);
        $this->load->view('includes/chief_instructor/CI_sidebar');
        $this->load->view('pages/chief_instructor/view_coach', $data);
        $this->load->view('includes/admin/footer');
    }

     /**
         * This function is used to add coaches to the system
         * @param int $id user id 
         */
    public function add_coach() {
        $this->load->library('session');
        
        $this->load->helper('url');
        $this->load->model('chief_instructor_func');
        $data['branch'] = $this->chief_instructor_func->get_main_branch();
        $data['branch1'] = $this->chief_instructor_func->get_sub_branch();
        $data['coach'] = $this->chief_instructor_func->get_coach_details();
        $this->load->library('form_validation');
        $user_id = $this->session->userdata('user_id');
        $session['name']=$this->chief_instructor_func->get_name($user_id);
        $branch_id = $this->session->userdata('branch_id');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('name', 'name', 'required|callback_check_String');
        $this->form_validation->set_rules('dob', 'Date of birth', 'required|callback_check_Birth_day');
        //$this->form_validation->set_rules('initials', 'Initials', 'required');
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|xss_clean');
        $this->form_validation->set_rules('address', 'address', 'required');
        $this->form_validation->set_rules('contact_no', 'contact Number', 'exact_length[10]|integer|callback_check_Mobile');
        $this->form_validation->set_rules('selectBranch', 'Branch', 'required');
        $this->form_validation->set_rules('nic', 'NIC', 'required|exact_length[10]|is_unique[coach.nic]|callback_check_NIC');
        $this->form_validation->set_rules('qualification', 'qualification', 'required');
        $this->form_validation->set_rules('date', 'Caree starting date', 'required');

        $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
        $data["status"] = 0;
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('includes/admin/header');
            $this->load->view('includes/admin/admin_navigation.php',$session);
            $this->load->view('includes/chief_instructor/CI_sidebar');
            $this->load->view('pages/chief_instructor/add_coach', $data);
            $this->load->view('includes/admin/footer');
        } else {
            $coach_name = $this->input->post('name');
            $nic = $this->input->post('nic');
            $contact_no = $this->input->post('contact_no');
            $gender = $this->input->post('gender');
            $status = $this->input->post('status');
            $email = $this->input->post('email');
            $address = $this->input->post('address');
            $branch = $this->input->post('branchType');
            $branch_type = $this->input->post('selectBranch');
            $qualifications = $this->input->post('qualification');
            $date = $this->input->post('date');
            $dob = $this->input->post('dob');

            //if ($id = $this->chief_instructor_func->add_coach($coach_name, $nic, $contact_no, $email, $address, $branch, $qualifications)) { // the information has therefore been successfully saved in the db
            if ($id = $this->chief_instructor_func->add_coach($coach_name, $nic, $dob, $gender, $status, $contact_no, $email, $address, $branch, $branch_type, $qualifications,$date)) { // the information has therefore been successfully saved in the db
                $data["user_id"] = $id;
                $data["status"] = 1;
                $this->load->view('includes/admin/header');
                $this->load->view('includes/admin/admin_navigation.php',$session);
                $this->load->view('includes/chief_instructor/CI_sidebar');
                $this->load->view('pages/chief_instructor/add_coach', $data);
                $this->load->view('includes/admin/footer');
                //redirect('chief_instructor/add_coach');
            } else {
                echo 'An error occurred saving your information. Please try again later';
            }
        }
    }
    
    
     /**
         * This function is used to add branch leaders
         * @param int $id branch id 
         */
    public function add_branch_lead() {
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('string');
        $this->load->model('chief_instructor_func');
        $this->load->library('form_validation');
        $data['status'] = 0;
        $user_id = $this->session->userdata('user_id');
        $session['name'] = $this->chief_instructor_func->get_name($user_id);
        $branch_id = $this->session->userdata('branch_id');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('first_name', 'name', 'required|callback_check_String');
        $this->form_validation->set_rules('last_name', 'name', 'required|callback_check_String');
        $this->form_validation->set_rules('dob', 'Date of birth', 'required|callback_check_Birth_day');
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|xss_clean');
        $this->form_validation->set_rules('address', 'address', 'required');
        $this->form_validation->set_rules('contact_no', 'contact Number', 'exact_length[10]|integer|callback_check_Mobile');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('nationality', 'nationality', 'required|callback_check_String');
        $this->form_validation->set_rules('religion', 'religion', 'required|callback_check_String');
        $this->form_validation->set_rules('occupation', 'occupation', 'required|callback_check_String');

        $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('includes/admin/header');
            $this->load->view('includes/admin/admin_navigation.php', $session);
            $this->load->view('includes/chief_instructor/CI_sidebar');
            $this->load->view('pages/chief_instructor/add_branch_lead', $data);
            $this->load->view('includes/admin/footer');
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $first_name = $this->input->post('first_name');
            $last_name = $this->input->post('last_name');
            $address = $this->input->post('address');
            $dob = $this->input->post('dob');
            $gender = $this->input->post('gender');
            $nationality = $this->input->post('nationality');
            $religion = $this->input->post('religion');
            $contact_no = $this->input->post('contact_no');
            $civil_status = $this->input->post('status');
            $occupation = $this->input->post('occupation');
            $type = "BL";
            $branch_id = '6';
            $sub_branch_id = '0';

            if ($id = $this->chief_instructor_func->add_branch_lead($email, $password, $first_name, $last_name, $address, $dob, $gender, $nationality, $religion, $contact_no, $civil_status, $occupation, $branch_id, $sub_branch_id, $type)) { // the information has therefore been successfully saved in the db
                $data["user_id"] = $id;
                $data["status"] = 1;
                $this->load->view('includes/admin/header');
                $this->load->view('includes/admin/admin_navigation.php', $session);
                $this->load->view('includes/chief_instructor/CI_sidebar');
                $this->load->view('pages/chief_instructor/add_branch_lead', $data);
                $this->load->view('includes/admin/footer');
            } else {
                echo 'An error occurred saving your information. Please try again later';
            }
        }
    }

    
     /**
         * This function is used to update coach.
         * @param int $id user id 
         */
    public function update_coach($id) {
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('chief_instructor_func');
        $data['branch'] = $this->chief_instructor_func->get_main_branch();
        $data['coach'] = $this->chief_instructor_func->get_coach($id);
        $data['id'] = $id;
        $user_id = $this->session->userdata('user_id');
        $session['name']=$this->chief_instructor_func->get_name($user_id);
        $branch_id = $this->session->userdata('branch_id');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('name', 'name', 'required|callback_check_String');
        $this->form_validation->set_rules('dob', 'Date of birth', 'required|callback_check_Birth_day');
        //$this->form_validation->set_rules('initials', 'Initials', 'required');
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|xss_clean');
        $this->form_validation->set_rules('address', 'address', 'required');
        $this->form_validation->set_rules('contact_no', 'contact Number', 'exact_length[10]|integer|callback_check_Mobile');
        $this->form_validation->set_rules('selectBranch', 'Branch', 'required');
        //$this->form_validation->set_rules('nic', 'NIC', 'required|exact_length[10]|is_unique[coach.nic]|callback_check_NIC');
        $this->form_validation->set_rules('qualification', 'qualification', 'required');
        $this->form_validation->set_rules('date', 'Caree starting date', 'required');

        $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('includes/admin/header');
            $this->load->view('includes/admin/admin_navigation.php',$session);
            $this->load->view('includes/chief_instructor/CI_sidebar');
            $this->load->view('pages/chief_instructor/update_coach', $data);
            $this->load->view('includes/admin/footer');
        } else {
            $coach_name = $this->input->post('name');
            $nic = $this->input->post('nic');
            $contact_no = $this->input->post('contact_no');
            $gender = $this->input->post('gender');
            $status = $this->input->post('status');
            $email = $this->input->post('email');
            $address = $this->input->post('address');
            $branch = $this->input->post('branchType');
            $branch_type = $this->input->post('selectBranch');
            $qualifications = $this->input->post('qualification');
            $date = $this->input->post('date');
            $dob = $this->input->post('dob');

            if ($id = $this->chief_instructor_func->update_coach($id,$coach_name, $dob, $gender, $status, $contact_no, $email, $address, $branch, $branch_type, $qualifications, $date)) {

                $data["user_id"] = $id;
                $data["status"] = 2;
                $this->load->view('includes/admin/header');
                $this->load->view('includes/admin/admin_navigation.php',$session);
                $this->load->view('includes/chief_instructor/CI_sidebar');
                $this->load->view('pages/chief_instructor/coach_management', $data);
                $this->load->view('includes/admin/footer');
                //redirect('chief_instructor/update_coach' . "/" . $id, 'refresh');
            } else {
                echo 'An error occurred saving your information. Please try again later';
            }
        }
    }
    
     /**
         * This function is used to update branch leader
         * @param int $id user id 
         */

    public function update_branch_lead($id) {
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('chief_instructor_func');
        $data['branch'] = $this->chief_instructor_func->get_main_branch();
        $data['bl'] = $this->chief_instructor_func->get_branch_leader_details($id);
        $data['id'] = $id;
        $data["status"] = 0;
        $user_id = $this->session->userdata('user_id');
        $session['name'] = $this->chief_instructor_func->get_name($user_id);
        $branch_id = $this->session->userdata('branch_id');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('first_name', 'name', 'required|alpha');
        $this->form_validation->set_rules('last_name', 'name', 'required|alpha');
        $this->form_validation->set_rules('dob', 'Date of birth', 'required|callback_check_Birth_day');
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|xss_clean');
        $this->form_validation->set_rules('address', 'address', 'required');
        $this->form_validation->set_rules('contact_no', 'contact Number', 'exact_length[10]|integer|callback_check_Mobile');
        
        $this->form_validation->set_rules('nationality', 'nationality', 'required');
        $this->form_validation->set_rules('religion', 'religion', 'required');
        $this->form_validation->set_rules('occupation', 'occupation', 'required');

        $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('includes/admin/header');
            $this->load->view('includes/admin/admin_navigation.php', $session);
            $this->load->view('includes/chief_instructor/CI_sidebar');
            $this->load->view('pages/chief_instructor/update_branch_lead', $data);
            $this->load->view('includes/admin/footer');
        } else {
            $email = $this->input->post('email');            
            $first_name = $this->input->post('first_name');
            $last_name = $this->input->post('last_name');
            $address = $this->input->post('address');
            $dob = $this->input->post('dob');
            $gender = $this->input->post('gender');
            $nationality = $this->input->post('nationality');
            $religion = $this->input->post('religion');
            $contact_no = $this->input->post('contact_no');
            $civil_status = $this->input->post('status');
            $occupation = $this->input->post('occupation');

            if ($id = $this->chief_instructor_func->update_branch_lead($id, $email, $first_name, $last_name, $address, $dob, $gender, $nationality, $religion, $contact_no, $civil_status, $occupation)) {

                $data["user_id"] = $id;
                $data["status"] = 2;
                $this->load->view('includes/admin/header');
                $this->load->view('includes/admin/admin_navigation.php', $session);
                $this->load->view('includes/chief_instructor/CI_sidebar');
                $this->load->view('pages/chief_instructor/branch_lead_management', $data);
                $this->load->view('includes/admin/footer');
            } else {
                echo 'An error occurred saving your information. Please try again later';
            }
        }
    }

    
     /**
         * This function is used to delete coach
         * @param int $id user id 
         */
    public function delete_coach($id) {
        $this->load->library('session');
        
        $this->load->model('chief_instructor_func');
        $this->chief_instructor_func->delete_coach($id);
        $this->load->helper('url');
        $this->load->helper('form');
        $user_id = $this->session->userdata('user_id');
        $data['coach'] = $this->chief_instructor_func->get_coach_details();
        $data['status']=3;
        $session['name']=$this->chief_instructor_func->get_name($user_id);
        $branch_id = $this->session->userdata('branch_id');
        $this->load->view('includes/admin/header');
        $this->load->view('includes/admin/admin_navigation.php',$session);
        $this->load->view('includes/chief_instructor/CI_sidebar');
        $this->load->view('pages/chief_instructor/coach_management', $data);
        $this->load->view('includes/admin/footer');
        //redirect('chief_instructor/coach_management');
    }

     /**
         * This function is used to delete branch leaders
         * @param int $id user id 
         */
    public function delete_branch_lead($id) {
        $this->load->library('session');
        $this->load->model('chief_instructor_func');
        $this->chief_instructor_func->delete_branch_lead($id);
        $this->load->helper('url');
        $this->load->helper('form');
        $user_id = $this->session->userdata('user_id');
        $data['bl'] = $this->chief_instructor_func->get_branch_lead();
        $data['status'] = 3;
        $session['name'] = $this->chief_instructor_func->get_name($user_id);
        $branch_id = $this->session->userdata('branch_id');
        $this->load->view('includes/admin/header');
        $this->load->view('includes/admin/admin_navigation.php', $session);
        $this->load->view('includes/chief_instructor/CI_sidebar');
        $this->load->view('pages/chief_instructor/branch_lead_management', $data);
        $this->load->view('includes/admin/footer');
    }

     /**
         * This function is used to add announcements for members
         * @param int $id user id 
         */
    public function add_announcement() {
        $this->load->library('session');
        
        $this->load->helper('url');
        $this->load->model('chief_instructor_func');
        $data['branch'] = $this->chief_instructor_func->get_main_branch();
        $this->load->library('form_validation');
        $user_id = $this->session->userdata('user_id');
        $session['name']=$this->chief_instructor_func->get_name($user_id);
        $branch_id = $this->session->userdata('branch_id');
        $data['announcement'] = $this->chief_instructor_func->get_announcement_details();
        $data['status']=0;
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('textarea', 'Descrption', 'required');
        $this->form_validation->set_rules('date', 'Date', 'required');
        $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('includes/admin/header');
            $this->load->view('includes/admin/admin_navigation.php',$session);
            $this->load->view('includes/chief_instructor/CI_sidebar');
            $this->load->view('pages/chief_instructor/add_announcement', $data);
            $this->load->view('includes/admin/footer');
        } else {
            $title = $this->input->post('title');
            $description = $this->input->post('textarea');
            $date = $this->input->post('date');

            if ($id = $this->chief_instructor_func->add_announcement($title, $description, $date)) { // the information has therefore been successfully saved in the db
                $data["user_id"] = $id;
                $data['status']=1;
                $this->load->view('includes/admin/header');
                $this->load->view('includes/admin/admin_navigation.php',$session);
                $this->load->view('includes/chief_instructor/CI_sidebar');
                $this->load->view('pages/chief_instructor/add_announcement', $data);
                $this->load->view('includes/admin/footer');
                //redirect('chief_instructor/add_announcement');
            } else {
                echo 'An error occurred saving your information. Please try again later';
            }
        }
    }

    
     /**
         * This function is used to get the announcment management page
         * @param int $id user id 
         */
    public function announcement_management() {
        $this->load->library('session');
        
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('chief_instructor_func');
        $user_id = $this->session->userdata('user_id');
        $session['name']=$this->chief_instructor_func->get_name($user_id);
        $branch_id = $this->session->userdata('branch_id');
        $data['status']=0;
        $data['announcement'] = $this->chief_instructor_func->get_announcement_details();
        $this->load->view('includes/admin/header');
        $this->load->view('includes/admin/admin_navigation.php',$session);
        $this->load->view('includes/chief_instructor/CI_sidebar');
        $this->load->view('pages/chief_instructor/announcement_management', $data);
        $this->load->view('includes/admin/footer');
    }

     /**
         * This function is used to get 8 players who scored high marks in a tournament
         * @param int $id user id 
         */
    public function get_top_8($id) {
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('chief_instructor_func');
        $user_id = $this->session->userdata('user_id');
        $session['name'] = $this->chief_instructor_func->get_name($user_id);
        $branch_id = $this->session->userdata('branch_id');
        $data['id'] = $id;
        $data['tournament'] = $id;
        
        
        session_start();
        $data['player'] = $_SESSION['playerData'];
        
        $length=0;
            $length=  count($data['player']);
            settype($length, "integer");
            if($length==0){

  echo '<script language="javascript">';
echo 'alert("Enter Refree Marks to Get Top 8 Players")';
echo '</script>';
                redirect('chief_instructor/add_refree_marks' . "/" . $id, 'refresh');
            }
            else{
            for($i=0; $i<$length; $i++)
            {
                $data['playerone']=$data['player'][$i];
                $under=$data['playerone']->tournament_under;
                $gender=$data['playerone']->gender;
                $belt=$data['playerone']->belt;
                $tournament_section=$data['playerone']->tournament_section;
            }
            $data['ref'] = $this->chief_instructor_func->get_ref_marks($id, $gender, $tournament_section, $belt, $under);
            $data['count']=  count($data['ref']);
        $data['refree'] = array_slice($data['ref'], 0, 8);
        $this->load->view('includes/admin/header');
        $this->load->view('includes/admin/admin_navigation.php', $session);
        $this->load->view('includes/chief_instructor/CI_sidebar');
        $this->load->view('pages/chief_instructor/get_top_8', $data);
        $this->load->view('includes/admin/footer');
            }
    }
    
    
     /**
         * This function is used to add refree marks in tournament for a single player.
         * @param int $id user id 
         */
    
         public function add_refree_marks($id) {
        $data["status"] = 0;
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('chief_instructor_func');
        $data['id'] = $id;
        $user_id = $this->session->userdata('user_id');
        $session['name'] = $this->chief_instructor_func->get_name($user_id);
        $branch_id = $this->session->userdata('branch_id');
        $under = $this->input->post('under');
        $belt = $this->input->post('belt');
        $tournament_section = $this->input->post('tournament_section');
        $gender = $this->input->post('gender');
        $data['refree'] = $this->chief_instructor_func->get_ref_marks($id, $gender, $tournament_section, $belt, $under);
        $data['tournament'] = $id;
        session_start();
        $_SESSION['playerData'] = $data['player'] = $this->chief_instructor_func->reg_players($id, $under, $belt, $tournament_section, $gender);
        $this->load->view('includes/admin/header');
        $this->load->view('includes/admin/admin_navigation.php', $session);
        $this->load->view('includes/chief_instructor/CI_sidebar');
        $this->load->view('pages/chief_instructor/add_refree_marks', $data);
        $this->load->view('includes/admin/footer');
    }
    
     /**
         * This function is used to add refree marks in tournament for a single player.
         * @param int $id user id 
         */
    public function add_refree_marks1($id) {

        $data["status"] = 0;
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('chief_instructor_func');
        $user_id = $this->session->userdata('user_id');
        $session['name'] = $this->chief_instructor_func->get_name($user_id);
        $branch_id = $this->session->userdata('branch_id');
        $data['id'] = $id;
  
        $this->load->library('form_validation');
        $this->form_validation->set_rules('ref1', 'referee marks', 'required|callback_check_feild');
        $this->form_validation->set_rules('ref2', 'referee marks', 'required|callback_check_feild');
        $this->form_validation->set_rules('ref3', 'referee marks', 'required|callback_check_feild');
        $this->form_validation->set_rules('ref4', 'referee marks', 'required|callback_check_feild');
        $this->form_validation->set_rules('ref5', 'referee marks', 'required|callback_check_feild');

        $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
        
        session_start();
        $data['player'] = $_SESSION['playerData'];
        
        $length=0;
            $length=  count($data['player']);
            settype($length, "integer");
            for($i=0; $i<($length+1)/2; $i=$i+2)
            {
                $data['playerone']=$data['player'][$i];
                $under=$data['playerone']->tournament_under;
                $gender=$data['playerone']->gender;
                $belt=$data['playerone']->belt;
                $tournament_section=$data['playerone']->tournament_section;
            }
        
        $data['tournament'] = $id;
        
        if ($this->form_validation->run() == FALSE) {
            $data['refree'] = $this->chief_instructor_func->get_ref_marks($id, $gender, $tournament_section, $belt, $under);
            $this->load->view('includes/admin/header');
            $this->load->view('includes/admin/admin_navigation.php', $session);
            $this->load->view('includes/chief_instructor/CI_sidebar');
            $this->load->view('pages/chief_instructor/add_refree_marks', $data);
            $this->load->view('includes/admin/footer');
        } else {        
        
        $data['refree'] = $this->chief_instructor_func->get_ref_marks($id, $gender, $tournament_section, $belt, $under);
        $player_name = $this->input->post('player');
        $ref_mark_1 = $this->input->post('ref1');
        $ref_mark_2 = $this->input->post('ref2');
        $ref_mark_3 = $this->input->post('ref3');
        $ref_mark_4 = $this->input->post('ref4');
        $ref_mark_5 = $this->input->post('ref5');

        $error=$this->chief_instructor_func->check_player($player_name);
               
        $errors = array_filter($error);

        if (!empty($errors)) {
            
            echo '<script language="javascript">';
                    echo 'alert("This player is already added.")';
                    echo '</script>';
$data["status"] = 1;
            $data['refree'] = $this->chief_instructor_func->get_ref_marks($id, $gender, $tournament_section, $belt, $under);
            $this->load->view('includes/admin/header');
            $this->load->view('includes/admin/admin_navigation.php', $session);
            $this->load->view('includes/chief_instructor/CI_sidebar');
            $this->load->view('pages/chief_instructor/add_refree_marks', $data);
            $this->load->view('includes/admin/footer');
        } else {
            
        $numbers = array($ref_mark_1, $ref_mark_2, $ref_mark_3, $ref_mark_4, $ref_mark_5);
        sort($numbers);

        $arrlength = count($numbers);
        $numbers = array_filter($numbers);
        $min = min($numbers);
        $max = max($numbers);
        $total = array_sum(array_slice($numbers, 1, 3));
        

        if ($this->chief_instructor_func->add_refree_marks($player_name, $ref_mark_1, $ref_mark_2, $ref_mark_3, $ref_mark_4, $ref_mark_5, $total, $id)) { // the information has therefore been successfully saved in the db
            $data['refree'] = $this->chief_instructor_func->get_ref_marks($id, $gender, $tournament_section, $belt, $under);
            $data["status"] = 1;
            $this->load->view('includes/admin/header');
            $this->load->view('includes/admin/admin_navigation.php', $session);
            $this->load->view('includes/chief_instructor/CI_sidebar');
            $this->load->view('pages/chief_instructor/add_refree_marks', $data);
            $this->load->view('includes/admin/footer');
        } else {
            echo 'Error';
        }
        }
        }
    }

    
      /**
         * This function is used to aview announcment which are created by the chief instrutor
         * @param int $id user id 
         */
    public function view_announcement($id) {
        $this->load->library('session');
        
        $this->load->helper('url');
        $this->load->model('chief_instructor_func');
        $data['announcement'] = $this->chief_instructor_func->get_announcement($id);
        $user_id = $this->session->userdata('user_id');
        $session['name']=$this->chief_instructor_func->get_name($user_id);
        $branch_id = $this->session->userdata('branch_id');
        $this->load->view('includes/admin/header');
        $this->load->view('includes/admin/admin_navigation.php',$session);
        $this->load->view('includes/chief_instructor/CI_sidebar');
        $this->load->view('pages/chief_instructor/view_announcement', $data);
        $this->load->view('includes/admin/footer');
    }
    
      /**
         * This function is used to delete announcment which are cretaed by chief instructor
         * @param int $id user id 
         */

    public function delete_announcement($id) {
        $this->load->library('session');
        
        $this->load->model('chief_instructor_func');
        $this->chief_instructor_func->delete_announcement($id);
        $user_id = $this->session->userdata('user_id');
        $session['name']=$this->chief_instructor_func->get_name($user_id);
        $branch_id = $this->session->userdata('branch_id');
        $data['status']=2;
        $data['announcement'] = $this->chief_instructor_func->get_announcement_details();
        $this->load->view('includes/admin/header');
        $this->load->view('includes/admin/admin_navigation.php',$session);
        $this->load->view('includes/chief_instructor/CI_sidebar');
        $this->load->view('pages/chief_instructor/announcement_management', $data);
        $this->load->view('includes/admin/footer');
        //redirect('chief_instructor/announcement_management');
    }

      /**
         * This function is used to search a coach
         * @param int $id user id 
         */
    public function search_coach() {
        $this->load->library('session');
        
        $this->load->model('chief_instructor_func');
        $coach_name = $this->input->post('search');
        $branch = $this->input->post('search');
        $nic = $this->input->post('search');
        $data['coach'] = $this->chief_instructor_func->search_coach($coach_name, $branch, $nic);
        $user_id = $this->session->userdata('user_id');
        $session['name']=$this->chief_instructor_func->get_name($user_id);
        $branch_id = $this->session->userdata('branch_id');
        $this->load->helper('url');
        $this->load->view('includes/admin/header');
        $this->load->view('includes/admin/admin_navigation.php',$session);
        $this->load->view('includes/chief_instructor/CI_sidebar');
        $this->load->view('pages/chief_instructor/coach_management', $data);
        $this->load->view('includes/admin/footer');
    }

      /**
         * This function is used to update announcements which are created by chief instructor.
         * @param int $id user id 
         */
      public function update_announcement($id) {
        $this->load->library('session');
        
        $this->load->helper('url');
        $this->load->model('chief_instructor_func');
        $data['announcement'] = $this->chief_instructor_func->get_announcement($id);
        $data['id'] = $id;
        $data['status']=0;
        $this->load->library('form_validation');
        $user_id = $this->session->userdata('user_id');
        $session['name']=$this->chief_instructor_func->get_name($user_id);
        $branch_id = $this->session->userdata('branch_id');
        $this->form_validation->set_rules('title', 'title', 'required');
        $this->form_validation->set_rules('textarea', 'descrption', 'required');
        $this->form_validation->set_rules('date', 'date', 'required');

        $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('includes/admin/header');
            $this->load->view('includes/admin/admin_navigation.php',$session);
            $this->load->view('includes/chief_instructor/CI_sidebar');
            $this->load->view('pages/chief_instructor/update_announcement', $data);
            $this->load->view('includes/admin/footer');
        } else {

            $title = $this->input->post('title');
            $description = $this->input->post('textarea');
            $date = $this->input->post('date');

            if ($id = $this->chief_instructor_func->update_announcement($id, $title, $description, $date)) {

                $data["user_id"] = $id;
                $data['status']=1;
                $data['announcement'] = $this->chief_instructor_func->get_announcement_details();
                $this->load->view('includes/admin/header');
                $this->load->view('includes/admin/admin_navigation.php',$session);
                $this->load->view('includes/chief_instructor/CI_sidebar');
                $this->load->view('pages/chief_instructor/announcement_management', $data);
                $this->load->view('includes/admin/footer');
            }
        }
    }

      /**
         * This function is used to add branches 
         * @param int $id branch id 
         */
 public function add_branch() {
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('chief_instructor_func');
        $user_id = $this->session->userdata('user_id');
        $session['name'] = $this->chief_instructor_func->get_name($user_id);
        $branch_id = $this->session->userdata('branch_id');
        $data['branch'] = $this->chief_instructor_func->get_main_branch();
        $data['bl'] = $this->chief_instructor_func->get_branch_lead();
        $data['main_branch'] = $this->chief_instructor_func->get_main_branch();
        $data['sub_branch'] = $this->chief_instructor_func->get_sub_branch();
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
        $branch_id=$this->input->post('branchType');
        $branch_lead_id = $this->input->post('branch_lead_id');
        $request='A';

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('includes/admin/header');
            $this->load->view('includes/admin/admin_navigation.php', $session);
            $this->load->view('includes/chief_instructor/CI_sidebar');
            $this->load->view('pages/chief_instructor/add_branch', $data);
            $this->load->view('includes/admin/footer');
        } else {
            $branchMainSub = $_POST['selectBranch'];
            if ($branchMainSub == 'sub') {
                if ($id = $this->chief_instructor_func->add_sub_branch($branch_name, $contact_number, $email, $town, $country, $address, $branch_id, $branch_lead_id, $request)) {
                    $data["user_id"] = $id;
                    $data["status"] = 1;
                    $this->load->view('includes/admin/header');
                    $this->load->view('includes/admin/admin_navigation.php', $session);
                    $this->load->view('includes/chief_instructor/CI_sidebar');
                    $this->load->view('pages/chief_instructor/add_branch', $data);
                    $this->load->view('includes/admin/footer');
                } else {
                    echo 'An error occurred saving your information. Please try again later';
                }
            } else {
                if ($id = $this->chief_instructor_func->add_branch($branch_name, $contact_number, $email, $town, $country, $address, $branch_lead_id,$request)) {
                    $data["user_id"] = $id;
                    $data["status"] = 1;
                    $this->load->view('includes/admin/header');
                    $this->load->view('includes/admin/admin_navigation.php', $session);
                    $this->load->view('includes/chief_instructor/CI_sidebar');
                    $this->load->view('pages/chief_instructor/add_branch', $data);
                    $this->load->view('includes/admin/footer');
                } else {
                    echo 'An error occurred saving your information. Please try again later';
                }
            }
        }
    }

  /**
         * This function is used to delete branches which are created by chief instructor.
         * @param int $id branch id 
         */
   public function delete_branch($id) {
        $this->load->library('session');
        
        $this->load->model('chief_instructor_func');
        $error=$this->chief_instructor_func->check_branch($id);
               
        $errors = array_filter($error);

        if (!empty($errors)) {
            //return FALSE;
            $data["status"] = 7;
            
            
        } else {
            $this->chief_instructor_func->delete_branch($id);
            $data["status"] = 4;
            
        }
        
        $user_id = $this->session->userdata('user_id');
        $session['name']=$this->chief_instructor_func->get_name($user_id);
        $branch_id = $this->session->userdata('branch_id');
        $data['main_branch'] = $this->chief_instructor_func->get_main_branch();
        $data['sub_branch'] = $this->chief_instructor_func->get_sub_branch();
        
        $this->load->view('includes/admin/header');
        $this->load->view('includes/admin/admin_navigation.php',$session);
        $this->load->view('includes/chief_instructor/CI_sidebar');
        $this->load->view('pages/chief_instructor/branch_management', $data);
        $this->load->view('includes/admin/footer');
    }

  /**
         * This function is used to update branches which are created by chief instructor
         * @param int $id branch id 
         */
    public function update_branch($id) {
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('chief_instructor_func');
        $data['branch'] = $this->chief_instructor_func->get_main_branch_details($id);
        $data['bl'] = $this->chief_instructor_func->get_branch_lead();
        $data['main_branch'] = $this->chief_instructor_func->get_main_branch();
        $data['sub_branch'] = $this->chief_instructor_func->get_sub_branch();
        $data['id'] = $id;
        $data["status"] = 0;
        $this->load->library('form_validation');
        $user_id = $this->session->userdata('user_id');
        $session['name'] = $this->chief_instructor_func->get_name($user_id);
        $branch_id = $this->session->userdata('branch_id');
        $this->form_validation->set_rules('name', 'Branch name', 'required|callback_check_String');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('town', 'Town', 'required|callback_check_String');
        $this->form_validation->set_rules('country', 'Country', 'required|callback_check_String');
        $this->form_validation->set_rules('contact_no', 'Phone No', 'required|exact_length[10]|integer|callback_check_Mobile');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean');
        $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('includes/admin/header');
            $this->load->view('includes/admin/admin_navigation.php', $session);
            $this->load->view('includes/chief_instructor/CI_sidebar');
            $this->load->view('pages/chief_instructor/update_branch', $data);
            $this->load->view('includes/admin/footer');
        } else {
            $branch_name = $this->input->post('name');
            $town = $this->input->post('town');
            $country = $this->input->post('country');
            $contact_number = $this->input->post('contact_no');
            $email = $this->input->post('email');
            $address = $this->input->post('address');

            if ($id = $this->chief_instructor_func->update_branch($id, $branch_name, $contact_number, $email, $town, $country, $address)) {
                $data["user_id"] = $id;
                $data["status"] = 3;
                $this->load->view('includes/admin/header');
                $this->load->view('includes/admin/admin_navigation.php', $session);
                $this->load->view('includes/chief_instructor/CI_sidebar');
                $this->load->view('pages/chief_instructor/branch_management', $data);
                $this->load->view('includes/admin/footer');
            }
        }
    }
    
      /**
         * This function is used to view braches which are created by chief instructor
         * @param int $id branch id 
         */
    public function view_branch($id) {
        $this->load->library('session');
       
        $this->load->helper('url');
        $this->load->model('chief_instructor_func');
        $branch_lead_id=$id;
        $data['branch_lead'] = $this->chief_instructor_func->get_branch_lead1($branch_lead_id);
        $data['branch'] = $this->chief_instructor_func->get_main_branch_details($id);
        $user_id = $this->session->userdata('user_id');
        $session['name']=$this->chief_instructor_func->get_name($user_id);
        $branch_id = $this->session->userdata('branch_id');
        $this->load->view('includes/admin/header');
        $this->load->view('includes/admin/admin_navigation.php',$session);
        $this->load->view('includes/chief_instructor/CI_sidebar');
        $this->load->view('pages/chief_instructor/view_branch', $data);
        $this->load->view('includes/admin/footer');
    }
   
    
      /**
         * This function is used to view branch leaders added by chief instructor.
         * @param int $id user id 
         */
    public function view_branch_lead($id) {
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('chief_instructor_func');
        $data['bl'] = $this->chief_instructor_func->get_branch_leader_details($id);
        $user_id = $this->session->userdata('user_id');
        $session['name'] = $this->chief_instructor_func->get_name($user_id);
        $branch_id = $this->session->userdata('branch_id');
        $this->load->view('includes/admin/header');
        $this->load->view('includes/admin/admin_navigation.php', $session);
        $this->load->view('includes/chief_instructor/CI_sidebar');
        $this->load->view('pages/chief_instructor/view_branch_lead', $data);
        $this->load->view('includes/admin/footer');
    }
    
      /**
         * This function is used to update sub branches
         * @param int $id branch id 
         */
    public function update_sub_branch($id) {
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('chief_instructor_func');
        $data['branch'] = $this->chief_instructor_func->get_sub_branch_details($id);
        $data['bl'] = $this->chief_instructor_func->get_branch_lead();
        $data['id']=$id;
        $data["status"] = 5;
        $user_id = $this->session->userdata('user_id');
        $session['name']=$this->chief_instructor_func->get_name($user_id);
        $branch_id = $this->session->userdata('branch_id');
        $data['main_branch'] = $this->chief_instructor_func->get_main_branch();
        $data['sub_branch'] = $this->chief_instructor_func->get_sub_branch();
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

            if ($id = $this->chief_instructor_func->update_sub_branch($id, $branch_name, $contact_number, $email, $town, $country, $address)) {
                $data["user_id"] = $id;
                $this->load->view('includes/admin/header');
                $this->load->view('includes/admin/admin_navigation.php',$session);
                $this->load->view('includes/chief_instructor/CI_sidebar');
                $this->load->view('pages/chief_instructor/branch_management', $data);
                $this->load->view('includes/admin/footer');
                //redirect('chief_instructor/update_sub_branch' . "/" . $id, 'refresh');
            }
        }
    }
    
      /**
         * This function is used to delete sub branches
         * @param int $id branch id 
         */
    
    public function delete_sub_branch($id) {
        $this->load->library('session');
        $this->load->model('chief_instructor_func');
        //$result=$this->chief_instructor_func->get_branch_delete($id);
        //if ($result->num_rows() > 0){
        $this->chief_instructor_func->delete_sub_branch($id); 
        $user_id = $this->session->userdata('user_id');
        $data['main_branch'] = $this->chief_instructor_func->get_main_branch();
        $data['sub_branch'] = $this->chief_instructor_func->get_sub_branch();
        $session['name']=$this->chief_instructor_func->get_name($user_id);
        $branch_id = $this->session->userdata('branch_id');
        $data["status"] = 5;
        //}
        $this->load->view('includes/admin/header');
        $this->load->view('includes/admin/admin_navigation.php',$session);
        $this->load->view('includes/chief_instructor/CI_sidebar');
        $this->load->view('pages/chief_instructor/branch_management', $data);
        $this->load->view('includes/admin/footer');
        //redirect('chief_instructor/branch_management');
    }


  /**
         * This function is used to view all the local tournaments which are created by chief instructor.
         * @param int $id tournament id 
         */
        public function LocalTournaments() 
        {
            $data["status"]=0;
            $this->load->library('session');
            $this->load->helper('url');
            $this->load->model('chief_instructor_func');
            $data['LocalTournaments']=$this->chief_instructor_func->get_LocalTournaments();
            $user_id = $this->session->userdata('user_id');
            $session['name']=$this->chief_instructor_func->get_name($user_id);
            $branch_id = $this->session->userdata('branch_id');
            $this->load->view('includes/admin/header');
            $this->load->view('includes/admin/admin_navigation.php',$session);
            $this->load->view('includes/chief_instructor/CI_sidebar');
            $this->load->view('pages/chief_instructor/CI_L_tournament',$data);
            $this->load->view('includes/admin/footer');
        }
    
          /**
         * This function is used to view all the foreign tournaments which are created by chief instructor.
         * @param int $id tournament id 
         */
        public function ForeignTournaments() 
        {
            $this->load->library('session');
            $this->load->helper('url');
            $this->load->model('chief_instructor_func');
            $data['ForeignTournaments']=$this->chief_instructor_func->get_ForeignTournaments();
            $user_id = $this->session->userdata('user_id');
            $session['name']=$this->chief_instructor_func->get_name($user_id);
            $branch_id = $this->session->userdata('branch_id');
            $this->load->view('includes/admin/header');
            $this->load->view('includes/admin/admin_navigation.php',$session);
            $this->load->view('includes/chief_instructor/CI_sidebar');
            $this->load->view('pages/chief_instructor/CI_F_tournament',$data);
            $this->load->view('includes/admin/footer');
        }
        
          /**
         * This function is used to create local and foreign tournament.
         * @param int $id tournament id 
         */
        public function CI_create()
        {
            $data["status"]=0;
            $this->load->library('session');
            $this->load->helper('url');
            $this->load->helper('html');
            $this->load->model('chief_instructor_func');
            $user_id = $this->session->userdata('user_id');
            $session['name']=$this->chief_instructor_func->get_name($user_id);
            $branch_id = $this->session->userdata('branch_id');

             // Including Validation Library
            $this->load->library('form_validation');
                // Validating Fields
            $this->form_validation->set_rules('tournament_name', 'Tournament Name', 'required');
            $this->form_validation->set_rules('tournament_date', 'Tournament Date', 'required');
            $this->form_validation->set_rules('tournament_type', 'Tournament Type', 'required');
            $this->form_validation->set_rules('location', 'Location', 'required');
            $this->form_validation->set_rules('overview', 'Overview', 'required');
            $this->form_validation->set_rules('org_name', 'Organizer', 'required');
            $this->form_validation->set_rules('org_contactnum','organizer contactnum', 'required|regex_match[/^[0-9]{10}$/]');
            $this->form_validation->set_rules('org_email', 'Organizer email', 'required|valid_email');
              
            $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
            
            if ($this->form_validation->run() == FALSE)
            {
                $data["status"] = 0;
                $this->load->view('includes/admin/header');
                $this->load->view('includes/admin/admin_navigation.php',$session);
                $this->load->view('includes/chief_instructor/CI_sidebar');
                $this->load->view('pages/chief_instructor/CI_create',$data);
                $this->load->view('includes/admin/footer');
            }
            
            else
            {   
                $tournament_name=$this->input->post('tournament_name');
                $tournament_type=$this->input->post('tournament_type');
                $tournament_date=$this->input->post('tournament_date');
                $overview= $this->input->post('overview');
                $org_name= $this->input->post('org_name');
                $org_contactnum= $this->input->post('org_contactnum');
                $org_email = $this->input->post('org_email');
                $location = $this->input->post('location');
                
                // Setting Values For Tabel Columns
             
            if($id=$this->chief_instructor_func-> CI_create($tournament_name,$tournament_type,$tournament_date,$overview,$org_name,$org_contactnum,$org_email,$location))
            {
            $data["status"] = 1;
            $this->load->view('includes/admin/header');
            $this->load->view('includes/admin/admin_navigation.php',$session);
            $this->load->view('includes/chief_instructor/CI_sidebar');
            $this->load->view('pages/chief_instructor/CI_create',$data);
            $this->load->view('includes/admin/footer');
            //redirect('chief_instructor');    
            }
            else 
                {
                echo'An error occured while creating a new tournament. Please try again.';
                }
            }
            }
            
              /**
         * This function is used to delete tournaments which are created by chief instructor.
         * @param int $id tournament id 
         */
        public function delete_tournaments($id) 
            {
           
            $this->load->library('session');
            $this->load->model('chief_instructor_func');
            $this->chief_instructor_func->delete_tournaments($id);
            
            $this->load->helper('url');
            $this->load->helper('form');
            $user_id = $this->session->userdata('user_id');
            $session['name']=$this->chief_instructor_func->get_name($user_id);
            $branch_id = $this->session->userdata('branch_id');
            $data['LocalTournaments']=$this->chief_instructor_func->get_LocalTournaments();
            
            $data["status"]=1;
            //$data['message'] = "Tournament has been successfully DELETED";
            $this->load->view('includes/admin/header');
            $this->load->view('includes/admin/admin_navigation.php',$session);
            $this->load->view('includes/chief_instructor/CI_sidebar');
            $this->load->view('pages/chief_instructor/CI_L_tournament',$data);
            $this->load->view('includes/admin/footer');
            //redirect('chief_instructor'); 
            
            
            }
        
          /**
         * This function is used to view all the local tournaments which are created by chief instructor.
         * @param int $id tournament id 
         */
        public function CI_LT($id) 
            {
            $this->load->library('session');
            $this->load->helper('url');
            $this->load->model('chief_instructor_func');
            $data['CI_LT']=$this->chief_instructor_func->get_CI_LT($id);
            $data['id']=$id;
            $data['status']=2;
            $data['LocalTournaments']=$this->chief_instructor_func->get_LocalTournaments();
            $user_id = $this->session->userdata('user_id');
            $session['name']=$this->chief_instructor_func->get_name($user_id);
            $branch_id = $this->session->userdata('branch_id');
            $this->load->view('includes/admin/header');
            $this->load->view('includes/admin/admin_navigation.php',$session);
            $this->load->view('includes/chief_instructor/CI_sidebar');
            $this->load->view('pages/chief_instructor/CI_LT',$data);
            $this->load->view('includes/admin/footer');
            }
  
        
         
      /**
         * This function is used to view the contact organizer page in a specfic tournament
         * @param int $id tournament id 
         */
        public function CI_contact_org($id) 
           {
            $this->load->library('session');
            $this->load->helper('url');
            $this->load->model('chief_instructor_func');
            $data['CI_contact_org']=$this->chief_instructor_func->get_CI_contact_org($id);
            $user_id = $this->session->userdata('user_id');
            $session['name']=$this->chief_instructor_func->get_name($user_id);
            $branch_id = $this->session->userdata('branch_id');
            $data['id']=$id;
            $data["status"]=0;
            $this->load->view('includes/admin/header');
            $this->load->view('includes/admin/admin_navigation.php',$session);
            $this->load->view('includes/chief_instructor/CI_sidebar');
            $this->load->view('pages/chief_instructor/CI_contact_org',$data);
            $this->load->view('includes/admin/footer');
           }  
        
            /**
         * This function is used to view the result page in a specfic tournament
         * @param int $id tournament id 
         */
        public function CI_results($id) 
          {
            $this->load->library('session');  
            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->model('chief_instructor_func');
            $user_id = $this->session->userdata('user_id');
            $session['name']=$this->chief_instructor_func->get_name($user_id);
            $branch_id = $this->session->userdata('branch_id');
            $data['CI_LT']=$this->chief_instructor_func->get_CI_LT($id);
            $data['CI_results']=$this->chief_instructor_func->get_CI_results($id);
            $data['id']=$id;
            $data["status"]=0;
            
            $data['LocalTournaments']=$this->chief_instructor_func->get_LocalTournaments();
            // Including Validation Library
            $this->load->library('form_validation');
                // Validating Fields
            
            $this->form_validation->set_rules('section', 'Tournament Section', 'required');
            $this->form_validation->set_rules('tournament_under', 'Tournament Under', 'required');
            $this->form_validation->set_rules('champion', 'Champion Name', 'required|alpha');
            $this->form_validation->set_rules('Runner_up','Runner_up Name', 'required|alpha');
            $this->form_validation->set_rules('second_Runner_up', 'second_Runner_up Name','required|alpha');
              
            $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
            
            if ($this->form_validation->run() == FALSE)
            {
                $this->load->view('includes/admin/header');
                $this->load->view('includes/admin/admin_navigation.php',$session);
                $this->load->view('includes/chief_instructor/CI_sidebar');
                $this->load->view('pages/chief_instructor/CI_results',$data);
                $this->load->view('includes/admin/footer');
            }
            
            else
            {    
                $tournament_date=$this->input->post('date');
                $section=$this->input->post('section');
                $tournament_under=$this->input->post('tournament_under');
                $champion=$this->input->post('champion');
                $Runner_up= $this->input->post('Runner_up');
                $second_Runner_up= $this->input->post('second_Runner_up');
                  
                // Setting Values For Tabel Columns
            
            if($id=$this->chief_instructor_func->CI_results($id,$tournament_date,$section,$tournament_under,$champion,$Runner_up,$second_Runner_up))
            { $data["status"]=4;
            $this->load->view('includes/admin/header');
            $this->load->view('includes/admin/admin_navigation.php',$session);
            $this->load->view('includes/chief_instructor/CI_sidebar');
            $this->load->view('pages/chief_instructor/CI_L_tournament',$data);
            $this->load->view('includes/admin/footer');
            //redirect('chief_instructor');    
            }
            else 
                {
                echo'An error occured while adding results to this tournament. Please try again.';
                }
            }
            
        }
        
         /**
         * This function is used to update the overview page in a specfic tournament
         * @param int $id tournament id 
         */
         public function overview_update($id)
        {
            $this->load->library('session');
            $this->load->helper('url');
            $this->load->model('chief_instructor_func');
            $data['id']=$id;
            $data["status"]=2;
            $data['LocalTournaments']=$this->chief_instructor_func->get_LocalTournaments();
            $data['CI_LT']=$this->chief_instructor_func->get_CI_LT($id);
            $user_id = $this->session->userdata('user_id');
            $session['name']=$this->chief_instructor_func->get_name($user_id);
            $branch_id = $this->session->userdata('branch_id');
            $this->load->library('form_validation');
            $this->load->view('includes/admin/header');
            $this->load->view('includes/admin/admin_navigation.php',$session);
            $this->load->view('includes/chief_instructor/CI_sidebar');
            $this->load->view('pages/chief_instructor/CI_L_tournament',$data);
            $this->load->view('includes/admin/footer');
            $overview=$this->input->post('overview');
                 
                 
            if ($id = $this->chief_instructor_func->overview_update($id,$overview))
            {
                $data["status"]=2;
                $data["id"] = $id;
                $this->load->view('includes/admin/header');
                $this->load->view('includes/admin/admin_navigation.php',$session);
                $this->load->view('includes/chief_instructor/CI_sidebar');
                $this->load->view('pages/chief_instructor/CI_L_tournament',$data);
                $this->load->view('includes/admin/footer');
                //redirect('chief_instructor');
            }
        
}

 /**
         * This function is used to update contact organizer in a specfic tournament
         * @param int $id tournament id 
         */

             public function contact_org_update($id)
              {
                 $this->load->library('session');
                 $this->load->helper('url');
                 $this->load->helper('form');
                 $this->load->model('chief_instructor_func');
                 $data['id']=$id;
                 $data["status"]=3;
                 $user_id = $this->session->userdata('user_id');
                 $session['name']=$this->chief_instructor_func->get_name($user_id);
                 $branch_id = $this->session->userdata('branch_id');
                 $data['CI_LT']=$this->chief_instructor_func->get_CI_LT($id);
                 $data['LocalTournaments']=$this->chief_instructor_func->get_LocalTournaments();
                 $this->load->library('form_validation');
                 $this->load->view('includes/admin/header');
                 $this->load->view('includes/admin/admin_navigation.php',$session);
                 $this->load->view('includes/chief_instructor/CI_sidebar');
                 $this->load->view('pages/chief_instructor/CI_L_tournament',$data);
                 $this->load->view('includes/admin/footer');
                 $tournament_date=$this->input->post('tournament_date');
                 $org_name=$this->input->post('org_name');
                 $location=$this->input->post('location');
                 
            if ($id = $this->chief_instructor_func->contact_org_update($id,$tournament_date,$org_name,$location))
            {
                $data["status"]=3;
                $data["id"] = $id;
                $this->load->view('includes/admin/header');
                $this->load->view('includes/admin/admin_navigation.php',$session);
                $this->load->view('includes/chief_instructor/CI_sidebar');
                $this->load->view('pages/chief_instructor/CI_L_tournament',$data);
                $this->load->view('includes/admin/footer');
                //redirect('chief_instructor');
            }
    
    
}

 /**
         * This function is used to search a specific tournament from the tournament list.
         * @param int $id tournament id 
         */
         public function search()
    {
      
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('chief_instructor_func');
        $search=$this->input->post('search');
        $user_id = $this->session->userdata('user_id');
        $session['name']=$this->chief_instructor_func->get_name($user_id);
        $branch_id = $this->session->userdata('branch_id');
        $data['search']=$this->chief_instructor_func->get_search($search);
        $this->load->view('includes/admin/header');
        $this->load->view('includes/admin/admin_navigation.php',$session);
        $this->load->view('includes/chief_instructor/CI_sidebar');
        $this->load->view('pages/chief_instructor/tournament_search',$data);
        $this->load->view('includes/admin/footer');
        
    }
    
    /**
         * This function is used to get the registred players in a specific tournament.
         * @param int $id tournament id 
         */
    public function registered_players($id) 
    {
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('chief_instructor_func');
        $data['tournament']=$this->chief_instructor_func->get_tournament($id);
        $data['registered_players']=$this->chief_instructor_func->get_registered_players($id);
        $data['id']=$id;
        $user_id = $this->session->userdata('user_id');
        $session['name']=$this->chief_instructor_func->get_name($user_id);
        $branch_id = $this->session->userdata('branch_id');
        $this->load->view('includes/admin/header');
        $this->load->view('includes/admin/admin_navigation.php',$session);
        $this->load->view('includes/chief_instructor/CI_sidebar');
        $this->load->view('pages/chief_instructor/registered_players',$data);
        $this->load->view('includes/admin/footer');
   }
    
    /**
         * This function is used to search registered players in a specific tournament
         * @param int $id tournament id 
         */
   public function registered_players_search($id) {
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('chief_instructor_func');
        $search=$this->input->post('search');
        $data['registered_players']=$this->chief_instructor_func->get_registered_players_search($id,$search);
        $data['id']=$id;
        $user_id = $this->session->userdata('user_id');
        $session['name']=$this->chief_instructor_func->get_name($user_id);
        $branch_id = $this->session->userdata('branch_id');
        $this->load->view('includes/admin/header');
        $this->load->view('includes/admin/admin_navigation.php',$session);
        $this->load->view('includes/chief_instructor/CI_sidebar');
        $this->load->view('pages/chief_instructor/registered_players',$data);
        $this->load->view('includes/admin/footer');
    }
    
     /**
         * This function is used to view results page in a specfic tournament
         * @param int $id tournament id 
         */
    public function view_results($id)
    {
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('chief_instructor_func');
        $data['view_results']=$this->chief_instructor_func->get_CI_results($id);
        $data['id']=$id;
        $user_id = $this->session->userdata('user_id');
        $session['name']=$this->chief_instructor_func->get_name($user_id);
        $branch_id = $this->session->userdata('branch_id');
        $this->load->view('includes/admin/header');
        $this->load->view('includes/admin/admin_navigation.php',$session);
        $this->load->view('includes/chief_instructor/CI_sidebar');
        $this->load->view('pages/chief_instructor/view_results',$data);
        $this->load->view('includes/admin/footer');
    }
    

    /**
         * This function is used to create the draw for local tournaments.
         * The tournament ID is passed from the URL.
         * It is used to get the tournament and then the filters are added accordingly.
         * @param int $id tournament id 
         */
    public function create_draw($id) 
        {
        
            $data['status']=0;
            $this->load->library('session');
            $this->load->helper('url');
            $this->load->model('chief_instructor_func');
            $data['id']=$id;
            $user_id = $this->session->userdata('user_id');
            $session['name']=$this->chief_instructor_func->get_name($user_id);
            $branch_id = $this->session->userdata('branch_id');
            
                      
            
            $gender=$data['gender']=$this->input->post('gender');
            $under=$data['under']=$this->input->post('under');
            $tournament_section=$data['tournament_section']=$this->input->post('tournament_section');
            $belt=$data['belt']=$this->input->post('belt');


            session_start();
            $_SESSION['playerData']=$data['player']=$this->chief_instructor_func->get_players($id, $gender, $under, $tournament_section, $belt);
            
            $data['draw']=$this->chief_instructor_func->check_draw($id, $gender, $under, $tournament_section, $belt);
            $drawcount=-1;  
            
            $drawcount= count($data['draw']);
            if($drawcount==0){
            $data['status']=0;
            }
            else {
                $data['status']=1;

             }
            
            $this->load->view('includes/admin/header');
            $this->load->view('includes/admin/admin_navigation.php',$session);
            $this->load->view('includes/chief_instructor/CI_sidebar');
            $this->load->view('pages/chief_instructor/create_draw',$data);
            $this->load->view('includes/admin/footer');
      }
      
       /**
         * This function is used to display the draw of the selected tournament.
         * It will shuffle the selected data array and randomly assign players to two teams.
         * @param int $id tournament id
         * 
         */
      public function draw($id) 
        {
        
            $data["status"]=0;
            $this->load->library('session');
            $this->load->helper('url');
            $this->load->model('chief_instructor_func');
            $user_id = $this->session->userdata('user_id');
            $session['name']=$this->chief_instructor_func->get_name($user_id);
            $branch_id = $this->session->userdata('branch_id');
            $data['id']=$id;
            $data['tournament']=$this->chief_instructor_func->get_tournament_details($id);
            
            
            session_start();
            $data['playerData']=$_SESSION['playerData'];
            shuffle($data['playerData']);
            $length=0;
            $length=  count($data['playerData']);
            settype($length, "integer"); //sets the variable type to an integer
            $data['draw']=$this->chief_instructor_func->get_draw_details($id);
            $count=1;            
            $count=count($data['draw']);
            
            /*
             * From the below if clause it checks whether the if there is data in the array and 
             * whether a draw has been added already for that particular tournament.
             */            
            if($length>0 and $count==0)
            {
            for($i=0; $i<($length+1)/2; $i=$i+2)
            {
                $data['playerone']=$data['playerData'][$i];
                $data['playertwo']=$data['playerData'][$i+1];
                
                $tournament_id=$data['playerone']->tournament_id;
                $playerone_id=$data['playerone']->registration_id;
                $playerone_name=$data['playerone']->player_name;
                $gender=$data['playerone']->gender;
                $under=$data['playerone']->tournament_under;
                $tournament_section=$data['playerone']->tournament_section;
                $belt=$data['playerone']->belt;
                $playertwo_id=$data['playertwo']->registration_id;
                $playertwo_name=$data['playertwo']->player_name;
                
                $insert_id=$this->chief_instructor_func-> create_draw($tournament_id, $playerone_id, $playerone_name, 
                        $playertwo_id, $playertwo_name, $gender, $under, $tournament_section, $belt);
              
                
            }
            
            
            $data['draw']=$this->chief_instructor_func->get_draw_details($id);
            
            $this->load->view('includes/admin/header');
            $this->load->view('includes/admin/admin_navigation.php',$session);
            $this->load->view('includes/chief_instructor/CI_sidebar');
            $this->load->view('pages/chief_instructor/draw',$data);
            $this->load->view('includes/admin/footer');
            }
            else 
            {  
                redirect(base_url('chief_instructor/create_draw/'.$id));

            }

      }
      
      /**
         * This function is used to delete the draw.
         * It will get the selected values and checks whether the tournament is not a past tournament.
         * If so it allows user to delete it.
         *  @param int $id tournament id  
         */
      public function view_draw($id) 
        {
        
            $data['status']=0;
            $this->load->library('session');
            $this->load->helper('url');
            $this->load->helper('date');
            $this->load->model('chief_instructor_func');
            $data['id']=$id;
            $user_id = $this->session->userdata('user_id');
            $session['name']=$this->chief_instructor_func->get_name($user_id);
                        
            $data['tournament']=$this->chief_instructor_func->get_tournament_details($id);
            
                        
            $gender=$data['gender']=$this->input->post('gender');
            $under=$data['under']=$this->input->post('under');
            $tournament_section=$data['tournament_section']=$this->input->post('tournament_section');
            $belt=$data['belt']=$this->input->post('belt');

            $data['player']=$this->chief_instructor_func->get_players($id, $gender, $under, $tournament_section, $belt);
            $data['draw']=$this->chief_instructor_func->check_draw($id, $gender, $under, $tournament_section, $belt);
            

            $action=$this->input->post('submit');
            if ($action =='delete') {
                
                $check=$this->chief_instructor_func->check_tournament($id);
                $date=date("Y-m-d");
                
                
                $check=$check->tournament_date;
                
                $todate=strtotime($check);
                $curdate=strtotime($date);
                
                if($curdate<$todate)
                {
                $this->chief_instructor_func->delete_draw($id, $gender, $under, $tournament_section, $belt);
                
                redirect(base_url('chief_instructor/view_draw/'.$id),'refresh');
                }
                else 
                {
                    echo '<script language="javascript">';
                    echo 'alert("This draw cannot be deleted. Please check the tournament date.")';
                    echo '</script>';

                    redirect(base_url('chief_instructor/view_draw/'.$id),'refresh');

                }
                
            
            }
            else{
               
                $this->load->view('includes/admin/header');
                $this->load->view('includes/admin/admin_navigation.php',$session);
                $this->load->view('includes/chief_instructor/CI_sidebar');
                $this->load->view('pages/chief_instructor/delete_draw',$data);
                $this->load->view('includes/admin/footer');
            }
      }
      
       /**
         * This function is used to get traning schedule requests.whether it should accept or deny.
         * It is used to get the tournament and then the filters are added accordingly.
         * @param int $id branch id 
         */
      
       public function training_schedule_request()
    {
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('chief_instructor_func');
        $data["status"]=0;
        $branch_id = $this->session->userdata('branch_id');
        $data['training_schedule']=$this->chief_instructor_func->get_training_details();
        $data['request']=$this->chief_instructor_func->get_member_req($branch_id);
        $user_id = $this->session->userdata('user_id');
        $session['name']=$this->chief_instructor_func->get_name($user_id);
        $this->load->view('includes/admin/header');
        $this->load->view('includes/admin/admin_navigation.php',$session);
        $this->load->view('includes/chief_instructor/CI_sidebar');
        $this->load->view('pages/chief_instructor/training_schedule_request',$data);
        $this->load->view('includes/admin/footer');
    }
    
    
     /**
         * This function is used to accept training schedule request
         * The request ID is passed from the URL.
         * @param int $id branch id 
         */
      public function accept($id)
	{
          $this->load->library('session');
          $this->load->helper('url');
          $this->load->model('chief_instructor_func');
          $user_id = $this->session->userdata('user_id');
          $branch_id = $this->session->userdata('branch_id');
          $data['id']=$id;
          $data['training_schedule']=$this->chief_instructor_func->get_training_details($id);
          $session['name']=$this->chief_instructor_func->get_name($user_id);
                   
          $data["status"]=0;
            
            if ($id = $this->chief_instructor_func->accept_request($id))
            {
                
                $data["user_id"] = $id;
                $data["status"]=1;

               $this->load->view('includes/admin/header');
               $this->load->view('includes/admin/admin_navigation.php',$session);
               $this->load->view('includes/chief_instructor/CI_sidebar');
               $this->load->view('pages/chief_instructor/training_schedule_request',$data);
               $this->load->view('includes/admin/footer');
            }

	}
        
         /**
         * This function is used to deny training schedule request
         * The request ID is passed from the URL.
         * @param int $id branch id 
         */
        
        public function deny($id)
	{
            $this->load->library('session');
            $this->load->helper('url');
            $this->load->model('chief_instructor_func');
            $user_id = $this->session->userdata('user_id');
            $branch_id = $this->session->userdata('branch_id');
            $data['id']=$id;
            $data['member']=$this->chief_instructor_func->get_member_details($id);
            $data['training_schedule']=$this->chief_instructor_func->get_training_details($id);
            $session['name']=$this->chief_instructor_func->get_name($user_id);
                      //$data["status"]=0;    

            
            if ($id = $this->chief_instructor_func->deny_request($id))
            {
                
                $data["user_id"] = $id;
                $data["status"]=2;
                

                $this->load->view('includes/admin/header');
                $this->load->view('includes/admin/admin_navigation.php',$session);
                $this->load->view('includes/chief_instructor/CI_sidebar');
                $this->load->view('pages/chief_instructor/training_schedule_request',$data);
                $this->load->view('includes/admin/footer');
                //redirect('branch_leader/member_request');  
                              
                
            }

	}
    
          /**
         * This function is used to delete the draw.
         * It will get the selected values and checks whether the tournament is not a past tournament.
         * If so it allows user to delete it.
         *  @param int $id tournament id  
         */
        public function delete_message($id)
        {
            $this->load->library('session');
            $this->load->helper('url');
            $this->load->model('chief_instructor_func');
            $user_id = $this->session->userdata('user_id');
            $branch_id = $this->session->userdata('branch_id');
            $data['id']=$id;
            $data["status"]=0;
            $data['registered_players']=$this->chief_instructor_func->get_registered_players($id);
            $session['name']=$this->chief_instructor_func->get_name($user_id);
            $this->load->view('includes/admin/header');
            $this->load->view('includes/admin/admin_navigation.php',$session);
            $this->load->view('includes/chief_instructor/CI_sidebar');
            $this->load->view('pages/chief_instructor/delete_message',$data);
            $this->load->view('includes/admin/footer');
        }
           
          /**
         * This function is used to send a message to players who are registered for a tournament, 
           * when deleteing a tournament.
         *  @param int $id tournament id  
         */
         public function new_message($id) {
                    
            $data["status"] = 0; 
            $this->load->library('session');
            $this->load->helper('url');
            $this->load->model('chief_instructor_func');
            $user_id = $this->session->userdata('user_id');
            $branch_id = $this->session->userdata('branch_id');
            $data['registered_players']=$this->chief_instructor_func->get_registered_players($id);
            $session['name']=$this->chief_instructor_func->get_name($user_id);
                   
            $data['id']=$id;
            $data['user_id']=$user_id;
                    // Including Validation Library
            $this->load->library('form_validation');
                    // Validating Fields              //textbox name--display name---check 
                    
            $this->form_validation->set_rules('message', 'Message', 'required');
                    

            $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
                    //**********
            $this->load->library('session');
            $this->load->model('chief_instructor_func');
            $this->chief_instructor_func->delete_tournaments($id);
            
            $this->load->helper('url');
            $this->load->helper('form');
            $user_id = $this->session->userdata('user_id');
            $session['name']=$this->chief_instructor_func->get_name($user_id);
            $branch_id = $this->session->userdata('branch_id');
            $data['LocalTournaments']=$this->chief_instructor_func->get_LocalTournaments();
            
            $data["status"]=0;
            
                    if ($this->form_validation->run() == FALSE)
                    {
                        $data["status"] = 0;
                                $this->load->view('includes/admin/header');
                                $this->load->view('includes/admin/admin_navigation.php',$session);
                                $this->load->view('includes/chief_instructor/CI_sidebar');
                                $this->load->view('pages/chief_instructor/delete_message',$data);
                                $this->load->view('includes/admin/footer');
                    }
                    else
                    {
                        //textbox value-> variable
                        $to=$this->input->post('to');                       
                        $message=$this->input->post('message');
                        

                        // Setting Values For Tabel Columns

                   if ($id = $this->chief_instructor_func->message_insert($to, $user_id, $message)) { // the information has therefore been successfully saved in the db
                        $data["user_id"] = $id;
                        $data["status"] = 1;
             
                        
                                   $this->load->view('includes/admin/header');
                                   $this->load->view('includes/admin/admin_navigation.php',$session);
                                   $this->load->view('includes/chief_instructor/CI_sidebar');
                                   $this->load->view('pages/chief_instructor/delete_message',$data);
                                   $this->load->view('includes/admin/footer');

                    } 
                    else {
                        echo 'An error occurred saving your information. Please try again later';

                    }

                }

        }  
        
              /**
                * This function list down all the tournaments available
                * in the year plan
                **/
        public function tournament_standing()
	{
                
            $this->load->library('session');
            $this->load->helper('url');
            $this->load->model('chief_instructor_func');
            $user_id = $this->session->userdata('user_id');
            $data["status"]=0;
            $session['name']=$this->chief_instructor_func->get_name($user_id);
            $branch_id = $this->session->userdata('branch_id');
            $data['tournament']=$this->chief_instructor_func->get_tournament();
            $this->load->view('includes/admin/header');
            $this->load->view('includes/admin/admin_navigation.php',$session);
            $this->load->view('includes/chief_instructor/CI_sidebar');
            $this->load->view('pages/chief_instructor/tournament_standing',$data);
            $this->load->view('includes/admin/footer');
                
	}
        
        
        /**
             * This function list down all the winning branches of a tournament
             * with the branch names and number of medal obtained.
             * The list is order with the branch which has hightest number of gold medals.
             * 
             **/
        public function standings($id)
	{
            
            $this->load->library('session');
            $this->load->helper('url');
            $this->load->model('chief_instructor_func');
            $data['id']=$id;
            $user_id = $this->session->userdata('user_id');
            $session['name']=$this->chief_instructor_func->get_name($user_id);
            $branch_id = $this->session->userdata('branch_id');
            $data['tournament']=$this->chief_instructor_func->get_tournament();
            $data['standing']=$this->chief_instructor_func->get_standing($id);
            $data['name']=$this->chief_instructor_func->get_tournament_name($id);
            $this->load->view('includes/admin/header');
            $this->load->view('includes/admin/admin_navigation.php',$session);
            $this->load->view('includes/chief_instructor/CI_sidebar');
            $this->load->view('pages/chief_instructor/standings',$data);
            $this->load->view('includes/admin/footer');
                
	}
        
        
        /**
      * This function search a particular branch name or medals obtained in the ranking list 
      * if there are search results it will be shown
      * and if there are no search result an error message will be shown
      **/
        public function ranking_search()
    {
            
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('chief_instructor_func');
        $search=NULL;
        $search=$this->input->post('search');
        $data["status"]=0;
        
        $user_id = $this->session->userdata('user_id');
        $session['name']=$this->chief_instructor_func->get_name($user_id);
        $branch_id = $this->session->userdata('branch_id');
        $data['search']=$this->chief_instructor_func->get_ranking_search($search);
        $count= count($data['search']);
        
        if (empty($search) OR $count == 0)
            {
                $data["status"]=1;
                $this->load->view('includes/admin/header');
                $this->load->view('includes/admin/admin_navigation.php',$session);
                $this->load->view('includes/chief_instructor/CI_sidebar');
                $this->load->view('pages/chief_instructor/standings_search',$data);
                $this->load->view('includes/admin/footer');
            }
        else
            {
                $data["status"]=2;
                $this->load->view('includes/admin/header');
                $this->load->view('includes/admin/admin_navigation.php',$session);
                $this->load->view('includes/chief_instructor/CI_sidebar');
                $this->load->view('pages/chief_instructor/standings_search',$data);
                $this->load->view('includes/admin/footer');
            }
    }
    
    
   /**
     * This function search a particular tournament in the tournament year plan 
      * if there are search results it will be shown
      * and if there are no search result an error message will be shown
     **/
     public function tournament_search()
    {
          
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('chief_instructor_func');
        $search=NULL;
        $search=$this->input->post('search');
        $data["status"]=0;
        $user_id = $this->session->userdata('user_id');
        $session['name']=$this->chief_instructor_func->get_name($user_id);
        $branch_id = $this->session->userdata('branch_id');
        $data['search']=$this->chief_instructor_func->get_tournament_search($search);
        $count= count($data['search']);
        
            if (empty($search) OR $count == 0)
                {
                        $data["status"]=1;
                        $this->load->view('includes/admin/header');
                        $this->load->view('includes/admin/admin_navigation.php',$session);
                        $this->load->view('includes/chief_instructor/CI_sidebar');
                        $this->load->view('pages/chief_instructor/tournament_search',$data);
                        $this->load->view('includes/admin/footer');
                }
            else
                {
                        $data["status"]=2;
                        $this->load->view('includes/admin/header');
                        $this->load->view('includes/admin/admin_navigation.php',$session);
                        $this->load->view('includes/chief_instructor/CI_sidebar');
                        $this->load->view('pages/chief_instructor/tournament_search',$data);
                        $this->load->view('includes/admin/footer');
                }
    }
    
      /**
         * This function is used to view today's tournament
         *  @param int $id tournament id  
         */
    public function today_tournament() {
        $data["status"] = 0;
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('chief_instructor_func');
        $date = date("Y-m-d");
        $data['tournaments'] = $this->chief_instructor_func->get_today_tournaments($date);
        $user_id = $this->session->userdata('user_id');
        $session['name'] = $this->chief_instructor_func->get_name($user_id);
        $branch_id = $this->session->userdata('branch_id');
        $this->load->view('includes/admin/header');
        $this->load->view('includes/admin/admin_navigation.php', $session);
        $this->load->view('includes/chief_instructor/CI_sidebar');
        $this->load->view('pages/chief_instructor/today_tournament', $data);
        $this->load->view('includes/admin/footer');
    }
    
    
      /**
         * This function is used to do the ranking procedure for round one
         *  @param int $id user id  
         */
        public function rankings_round_one($id) {
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('chief_instructor_func');
        $data['id'] = $id;
        $user_id = $this->session->userdata('user_id');
        $session['name'] = $this->chief_instructor_func->get_name($user_id);
        $branch_id = $this->session->userdata('branch_id'); 
        
        session_start();
        $data['player'] = $_SESSION['playerData'];
        
        $length=0;
            $length=  count($data['player']);
            settype($length, "integer");
            for($i=0; $i<1; $i++)
            {
                $data['playerone']=$data['player'][$i];
                $under=$data['playerone']->tournament_under;
                $gender=$data['playerone']->gender;
                $belt=$data['playerone']->belt;
                $tournament_section=$data['playerone']->tournament_section;
            }
        $data['tournament'] = $id;
        $data['ref'] = $this->chief_instructor_func->get_ref_marks($id, $gender, $tournament_section, $belt, $under);
        $data['winner1'] = array_slice($data['ref'], 0, 1);
        $data['winner2'] = array_slice($data['ref'], 1,1);
        $data['winner3'] = array_slice($data['ref'], 2, 2);
        //$this->chief_instructor_func->add_ranks($player_name, $ref_mark_1, $ref_mark_2, $ref_mark_3, $ref_mark_4, $ref_mark_5, $total, $id);
            //$data['refree'] = $this->chief_instructor_func->get_ref_marks1($id, $gender, $tournament_section, $belt, $under);
            $this->load->view('includes/admin/header');
            $this->load->view('includes/admin/admin_navigation.php', $session);
            $this->load->view('includes/chief_instructor/CI_sidebar');
            $this->load->view('pages/chief_instructor/rankings_round_one', $data);
            $this->load->view('includes/admin/footer');
        
    }
    
    /**
         * This function is used to do the ranking procedure for round two
         *  @param int $id user id  
         */
    public function round_2($id) {
        $data["status"] = 0;
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('chief_instructor_func');
        $data['id'] = $id;
        $user_id = $this->session->userdata('user_id');
        $session['name'] = $this->chief_instructor_func->get_name($user_id);
        $branch_id = $this->session->userdata('branch_id');
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('ref1', 'referee marks', 'required|callback_check_feild');
        $this->form_validation->set_rules('ref2', 'referee marks', 'required|callback_check_feild');
        $this->form_validation->set_rules('ref3', 'referee marks', 'required|callback_check_feild');
        $this->form_validation->set_rules('ref4', 'referee marks', 'required|callback_check_feild');
        $this->form_validation->set_rules('ref5', 'referee marks', 'required|callback_check_feild');

        $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');

        
        session_start();
        $data['player'] = $_SESSION['playerData'];
        
        $length=0;
            $length=  count($data['player']);
            settype($length, "integer");
            for($i=0; $i<($length+1)/2; $i=$i+2)
            {
                $data['playerone']=$data['player'][$i];
                $under=$data['playerone']->tournament_under;
                $gender=$data['playerone']->gender;
                $belt=$data['playerone']->belt;
                $tournament_section=$data['playerone']->tournament_section;
            }
        $data['tournament'] = $id;
        
        
        $data['ref'] = $this->chief_instructor_func->get_ref_marks($id, $gender, $tournament_section, $belt, $under);
        $data['refree'] = array_slice($data['ref'], 0, 8);
        $player_name = $this->input->post('player');
        $ref_mark_1 = $this->input->post('ref1');
        $ref_mark_2 = $this->input->post('ref2');
        $ref_mark_3 = $this->input->post('ref3');
        $ref_mark_4 = $this->input->post('ref4');
        $ref_mark_5 = $this->input->post('ref5');
        $numbers = array($ref_mark_1, $ref_mark_2, $ref_mark_3, $ref_mark_4, $ref_mark_5);
        sort($numbers);
        $arrlength = count($numbers);
        $numbers = array_filter($numbers);
        $total = array_sum(array_slice($numbers, 1, 3));

        if ($this->chief_instructor_func->add_refree_marks1($player_name, $ref_mark_1, $ref_mark_2, $ref_mark_3, $ref_mark_4, $ref_mark_5, $total, $id)) { // the information has therefore been successfully saved in the db
            $data['refree1'] = $this->chief_instructor_func->get_ref_marks1($id, $gender, $tournament_section, $belt, $under);
            $this->load->view('includes/admin/header');
            $this->load->view('includes/admin/admin_navigation.php', $session);
            $this->load->view('includes/chief_instructor/CI_sidebar');
            $this->load->view('pages/chief_instructor/add_refree_marks_2', $data);
            $this->load->view('includes/admin/footer');
        } else {
            echo 'Error';
        }
    }
    
    /**
         * This function is used to do the ranking procedure for round one
         *  @param int $id user id  
         */
    public function results1() {
        //$this->load->library('session');
        $this->load->helper('url');
        $this->load->model('chief_instructor_func');
        $age = $_GET['age'];
        $belt = $_GET['belt'];
        $type = $_GET['type'];
        $gender = $_GET['gender'];

        $this->load->library('form_validation');

        $this->form_validation->set_rules('ref1', 'ref1', 'required');

        $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
        //$data["status"] = 0;
        $data['player'] = $this->chief_instructor_func->reg_players($age, $belt, $type, $gender);
        $data['refree'] = $this->chief_instructor_func->get_ref_marks();
        $data['tournament'] = $id;

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('includes/admin/header');
            $this->load->view('includes/admin/admin_navigation.php');
            $this->load->view('includes/chief_instructor/CI_sidebar');
            $this->load->view('pages/chief_instructor/results1', $data);
            $this->load->view('includes/admin/footer');
        } else {
            $player_name = $this->input->post('player');
            $ref_mark_1 = $this->input->post('ref1');
            $ref_mark_2 = $this->input->post('ref2');
            $ref_mark_3 = $this->input->post('ref3');
            $ref_mark_4 = $this->input->post('ref4');
            $ref_mark_5 = $this->input->post('ref5');

            $numbers = array($ref_mark_1, $ref_mark_2, $ref_mark_3, $ref_mark_4, $ref_mark_5);


            //$numbers=array(4,6,2,22,11);
            sort($numbers);

            $arrlength = count($numbers);
            for ($x = 0; $x < $arrlength; $x++) {
                echo $numbers[$x];
                echo "<br>";
            }


            $numbers = array_filter($numbers);

            $min = min($numbers);
            $max = max($numbers);
            echo "<br>";
            echo $min;
            echo "<br>";
            echo $max;


            echo "<br>";
            unset($numbers[$min - 1], $numbers[$max - 1]);
            echo "<br>";
            var_dump($numbers);
            echo "<br>";
            $total = array_sum($numbers);
            echo "<br>";

            echo $total;


            if ($id = $this->chief_instructor_func->add_refree_marks($player_name, $ref_mark_1, $ref_mark_2, $ref_mark_3, $ref_mark_4, $ref_mark_5, $total)) { // the information has therefore been successfully saved in the db
                //$data["user_id"] = $id;
                //$data["status"] = 1;
                $this->load->view('includes/admin/header');
                $this->load->view('includes/admin/admin_navigation.php');
                $this->load->view('includes/chief_instructor/CI_sidebar');
                $this->load->view('pages/chief_instructor/results1', $data);
                $this->load->view('includes/admin/footer');
            } else {
                echo 'Error';
                //redirect('chief_instructor/results1?age=' .$age.'&belt='.$belt.'&type='.$type.'&gender='.$gender, 'refresh');
            }
        }
    }
    /**
         * This function is used to do the ranking of players
         *  @param int $id user id  
         */
    
     public function rankings($id) {
        $data["status"] = 0;
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('chief_instructor_func');
        $data['id'] = $id;
        $user_id = $this->session->userdata('user_id');
        $session['name'] = $this->chief_instructor_func->get_name($user_id);
        $branch_id = $this->session->userdata('branch_id');
        
        
        session_start();
        $data['player'] = $_SESSION['playerData'];
        
        $length=0;
            $length=  count($data['player']);
            settype($length, "integer");
            for($i=0; $i<$length; $i++)
            {
                $data['playerone']=$data['player'][$i];
                $under=$data['playerone']->tournament_under;
                $gender=$data['playerone']->gender;
                $belt=$data['playerone']->belt;
                $tournament_section=$data['playerone']->tournament_section;
            }
        $data['tournament'] = $id;

        $data['ref'] = $this->chief_instructor_func->get_ref_marks1($id, $gender, $tournament_section, $belt, $under);
        $data['winner1'] = array_slice($data['ref'], 0, 1);
        $data['winner2'] = array_slice($data['ref'], 1,1);
        $data['winner3'] = array_slice($data['ref'], 2, 2);
        //$this->chief_instructor_func->add_ranks($player_name, $ref_mark_1, $ref_mark_2, $ref_mark_3, $ref_mark_4, $ref_mark_5, $total, $id);
        //$data['refree'] = $this->chief_instructor_func->get_ref_marks1($id, $gender, $tournament_section, $belt, $under);
        $this->load->view('includes/admin/header');
        $this->load->view('includes/admin/admin_navigation.php', $session);
        $this->load->view('includes/chief_instructor/CI_sidebar');
        $this->load->view('pages/chief_instructor/rankings', $data);
        $this->load->view('includes/admin/footer');
        
    }
    
        /**
         * This function is used to view sub branch
         *  @param int $id branch id  
         */
    public function view_sub_branch($id) {
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('chief_instructor_func');
        $data['branch'] = $this->chief_instructor_func->get_sub_branch_details($id);
        $user_id = $this->session->userdata('user_id');
        $session['name'] = $this->chief_instructor_func->get_name($user_id);
        $branch_id = $this->session->userdata('branch_id');
        $this->load->view('includes/admin/header');
        $this->load->view('includes/admin/admin_navigation.php', $session);
        $this->load->view('includes/chief_instructor/CI_sidebar');
        $this->load->view('pages/chief_instructor/view_sub_branch', $data);
        $this->load->view('includes/admin/footer');
    }
    
    
     /**
         * This function is used to validate refree marks
         *  @param int $num input value  
         */
    function check_feild($num) {
        if (is_numeric ($num)) {        
        if ( (int)$num == $num && (int)$num > 0 ){
            if ( (int)$num == $num && (int)$num <= 10 ){
            return true;
            }
            else{
               $this->form_validation->set_message('check_feild', 'Enter a number less than 10');
            return FALSE; 
            
            }
        }else{
            $this->form_validation->set_message('check_feild', 'This does not contains positive number');
            return FALSE;
        } 
        
        }else {
        $this->form_validation->set_message('check_feild', 'This does not consist of all digits');
            return FALSE;
    }
    }
    
    
    /**
         * This function is used to validate email
         *  @param string $str input value  
         */
    public function email_check($str) {

        if (stristr($str, '@uni-email-1.com') !== false)
            return true;
        if (stristr($str, '@uni-email-2.com') !== false)
            return true;
        if (stristr($str, '@uni-email-3.com') !== false)
            return true;

        $this->form_validation->set_message('email', 'Please provide an acceptable email address.');
        return FALSE;
    }

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
         * This function is used to validate contact numbers
         *  @param int $field input value  
         */
    function check_marks($field) {

        $res = preg_match('/[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]/', $field);
        if ($res == 0) {
            $this->form_validation->set_message('check_Mobile', 'Please Enter Valid Mobile No!');
            return FALSE;
        } else {
            return TRUE;
        }
    }
    
     /**
         * This function is used to validation a text where input value hould only  be characters.
         *  @param string $field input value  
         */
    function check_String($field) {
        if (ctype_alpha(str_replace(' ', '', $field)) === false) {
            $this->form_validation->set_message('check_String', 'This must only contain letters!');
            return FALSE;
        } else {
            return TRUE;
        }
    }
    
     /**
         * This function is used to validate NIC
         *  @param int $field input value  
         */

    function check_NIC($field) {

        $res = preg_match('/[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][vV]/', $field);
        if ($res == 0) {
            $this->form_validation->set_message('check_NIC', 'Please Enter Your Valid NIC!');
            return FALSE;
        } else {
            return TRUE;
        }
    }
    
     /**
         * This function is used to validate birthday
         *  @param int $then input value  
         */
    function check_Birth_day($then, $min) {
        $then = strtotime($then);
        //The age to be over, over +18
        $min = strtotime('+18 years', $then);
        if (time() < $min) {
            $this->form_validation->set_message('check_Birth_day', 'Please Enter Valid Birth Day!');
            return FALSE;
        } else {
            return true;
        }
    }
    





 
    
    
    
    
    
    
}
?>