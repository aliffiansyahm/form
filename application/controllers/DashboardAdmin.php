<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardAdmin extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        //Codeigniter : Write Less Do More
        $this->logged_in();
    }

      private function logged_in() {
        if(! $this->session->userdata('authenticated')) {
            redirect(site_url('SuperAdmin/login'));
        }
    }

    public function index()
    {
        $data['title'] = "Dashboard";

        $this->load->view('SuperAdmin/template/header', $data);
        $this->load->view('SuperAdmin/dashboard', $data);
        $this->load->view('SuperAdmin/template/footer', $data);
    }

}
