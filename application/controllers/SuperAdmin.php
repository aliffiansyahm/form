<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SuperAdmin extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        //Codeigniter : Write Less Do More
        $this->load->model('Model_superAdmin');

    }

    private function logged_in()
    {
        if( ! $this->session->userdata('authenticatedSuper')){
            $this->login();
            //echo "belum login";
        }
    }

    public function login()
    {
        $data['title'] = "Login";

        $this->form_validation->set_rules('password', 'email', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'required');

        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        if($this->form_validation->run() == false){
            //$this->load->view('superAdmin/template/header', $data);
            $this->load->view('SuperAdmin/login', $data);
            //$this->load->view('superAdmin/template/footer', $data);
        }
        else {
            $email = $this->security->xss_clean($this->input->post('username'));
            $password = $this->security->xss_clean($this->input->post('password'));

            $user = $this->Model_superAdmin->login($email, $password);

            if($user){
                $userdata = array(
                    'id' => $user->ID_SUPER_ADMIN,
                    'username' => $user->USERNAME,
                    'authenticatedSuper' => TRUE
                );

                $this->session->set_userdata($userdata);
                //echo "bisa login";
                redirect(site_url('DashboardAdmin'));
            }
            else {
                $this->session->set_flashdata('message', 'Invalid email or password');
                redirect(site_url('SuperAdmin/login'));
                //echo "gabisa login";
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        //redirect('users/login');
        //echo "bisa logout";
        redirect(site_url('SuperAdmin/login'));
    }

}
