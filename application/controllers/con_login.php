<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class con_login extends CI_Controller {

    /**
         * This function is used as the initialising page
         * @param int $message error message
         */
    function index($message = ""){

        $error['message'] = $message;
            $this->load->helper('url');
            $this->load->model('functions');
            $this->load->view('includes/user/header');
            $this->load->view('includes/user/navigation');
            $this->load->view('pages/user/member_login',$error);
            $this->load->view('includes/user/footer');
    }

    /**
         * This function is used to implement the login funcyionality
         * 
         */
    function login(){
        
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        
        $this->form_validation->set_rules('email','E-mail','required|trim');
        $this->form_validation->set_rules('password','Password','required|trim');

        if($this->form_validation->run()) {
            $this->load->model('mod_login');
            $data_object = $this->mod_login->login_check($email, $password);


            if (!empty($data_object['user_id'])) {

                $userData = array(
                    'user_id' => $data_object['user_id'],
                    'email' => $data_object['email'],
                    'first_name' => $data_object['first_name'],
                    'last_name' => $data_object['last_name'],
                    'branch_id' => $data_object['branch_id'],
                    'user_type' => $data_object['user_type'],

                );
                $this->load->library('session');
                $this->session->set_userdata($userData);

                switch($data_object['user_type']){

                    case('BL'):
                        $this->branch_leader();
                        break;
                    case('CI'):
                        $this->chief_instructor();
                        break;  
                    case('M'):
                        $this->member();
                        break;                       
                }
            }else{
                $message = "* Incorrect email or password";
                $this->index($message);
            }
        }else{
            $message = "";
            $this->index($message);
        }
    }


    /**
         * This function is used to implement the login funcyionality
         * @param int $id branch id 
         */
    function branch_leader(){

       // $this->load->model('Mod_Dmanager');

        $this->load->helper('url');
        $this->load->model('branch_leader_func');
        $user_id = $this->session->userdata('user_id');
        $branch_id = $this->session->userdata('branch_id');
        $data["status"]=0;
        $data['branch']=$this->branch_leader_func->get_branch($branch_id);
        $session['name']=$this->branch_leader_func->get_name($user_id);
        $data['member']=$this->branch_leader_func->get_members($branch_id);
        $this->load->view('includes/admin/header');
        $this->load->view('includes/admin/admin_navigation.php',$session);
        $this->load->view('includes/branch_leader/BL_sidebar');
        $this->load->view('pages/branch_leader/members',$data);
        $this->load->view('includes/admin/footer');
    }
    /**
         *This function is used to implement the login funcyionality
         * @param int $id branch id 
         */
    function chief_instructor(){

       // $this->load->model('Mod_Dmanager');

        $this->load->helper('url');
        $this->load->model('chief_instructor_func');
        $user_id = $this->session->userdata('user_id');
        $branch_id = $this->session->userdata('branch_id');
        $session['name']=$this->chief_instructor_func->get_name($user_id);
        $data['tournament']=$this->chief_instructor_func->get_tournament();
        $this->load->view('includes/admin/header');
        $this->load->view('includes/admin/admin_navigation.php',$session);
        $this->load->view('includes/chief_instructor/CI_sidebar');
        $this->load->view('pages/chief_instructor/tournament',$data);
        $this->load->view('includes/admin/footer');        
    }   
      /**
         * This function is used to implement the login funcyionality
         * @param int $id branch id 
         */
    function member(){

       // $this->load->model('Mod_Dmanager');

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
         * This function is used to implement the logout funcyionality
         * @param int $id branch id 
         */

    function logOut(){

        $this->session->sess_destroy();
        $this->load->helper('url');
        $this->load->model('functions');
        $this->load->view('includes/user/header');
        $this->load->view('includes/user/navigation');
        $this->load->view('pages/user/member_login');
        $this->load->view('includes/user/footer');
    }

    
    
}


?>