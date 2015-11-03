<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home extends CI_Controller {

	/**
         * This function is used to load the main page of chief instructor
         * @param int $id user id 
         */
	public function index()
	{
            $this->load->helper('url');
            $this->load->model('functions');
            $this->load->view('includes/user/header');
            $this->load->view('includes/user/navigation');
            $this->load->view('pages/user/index');
            $this->load->view('includes/user/footer');
                
	}
        /**
         * This function is used to display news to users
         * @param int $id branch id 
         */
        public function news()
	{
            $this->load->helper('url');
            $this->load->model('functions');
            $this->load->view('includes/user/header');
            $this->load->view('includes/user/navigation');
            $this->load->view('pages/user/news');
            $this->load->view('includes/user/footer');
                
	}
        
        /**
         * This function is used to dsiplay tournaments to users
         * @param int $id branch id 
         */
        public function tournament()
	{
            $this->load->helper('url');
            $this->load->model('functions');
            $data['tournament']=$this->functions->get_tournament();
            $this->load->view('includes/user/header');
            $this->load->view('includes/user/navigation');
            $this->load->view("pages/user/UR_tournament", $data);
            $this->load->view('includes/user/footer');
                
	}
        /**
         * This function is used to display branches
         * @param int $id branch id 
         */
        public function view_branch()
	{
            $this->load->helper('url');
            $this->load->model('functions');
            $data['branch']=$this->functions->get_all_branch();
            $this->load->view('includes/user/header');
            $this->load->view('includes/user/navigation');
            $this->load->view('pages/user/guest_view_branch',$data);
            $this->load->view('includes/user/footer');
                
	}
        /**
         * This function is used to diplay sub branches
         * @param int $id branch id 
         */
        public function sub_branches()
	{
            $this->load->helper('url');
            $this->load->model('functions');
            $bid = $_GET["id"];
            $data['sub_branch']=$this->functions->get_all_sub_branch($bid);
            $this->load->view('includes/user/header');
            $this->load->view('includes/user/navigation');
            $this->load->view('pages/user/sub_branches',$data);
            $this->load->view('includes/user/footer');
                
	}
        /**
         * This function is used to display the sign up form
         * @param int $id branch id 
         */
        public function signup()//sign up controller
	{
            $this->load->helper('url');
            $this->load->helper('html');
            $this->load->model('functions');
            $data['branch']=$this->functions->get_all_branches();
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
                $this->load->view('includes/user/header');
                $this->load->view('includes/user/navigation');
                $this->load->view('pages/user/signup_form',$data);
                $this->load->view('includes/user/footer');
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

           if ($id = $this->functions->signup_insert($firstname, $lastname, $email, $password, $address, $dob, $gender, $contact, $status, $nationality, $religion, $occupation, $branch_id, $user_type)) { // the information has therefore been successfully saved in the db
                $data["user_id"] = $id;
                $data["status"]=1;
                $this->load->view('includes/user/header');
                $this->load->view('includes/user/navigation');
                //$this->load->view('includes/user/successmsg');
                $this->load->view('pages/user/signup_form',$data);
                $this->load->view('includes/user/footer');
            } else {
                echo 'An error occurred saving your information. Please try again later';

            }

            }
        }
        /**
         * This function is used to check the birthday validations
         * @param int $then input value
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
        
        /**
         * This function is used to search
         * @param int $id branch id 
         */
        public function search()
    {
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('functions');
        $search=$this->input->post('search');
        $data['search']=$this->functions->get_search($search);
        $this->load->view('includes/user/header');
        $this->load->view('includes/user/navigation');
        $this->load->view('pages/user/tournament_search',$data);
        $this->load->view('includes/user/footer');
        
    }
        /**
         * This function is used check string value
         * @param int $filed input value 
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



/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */