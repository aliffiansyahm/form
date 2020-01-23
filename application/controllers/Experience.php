<?php
/*
 * Generated by CRUDigniter v3.2
 * www.crudigniter.com
 */

class Experience extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Model_experience');
    }

    /*
     * Listing of experience
     */
    function index()
    {
        $data['experience'] = $this->Model_experience->get_all_experience();

        $data['_view'] = 'experience/index';
        $data['title'] = 'Experience';

        $this->load->view('AdminUser/template/header',$data);
        $this->load->view('AdminUser/experience/index',$data);
        $this->load->view('AdminUser/template/footer',$data);
    }

}
