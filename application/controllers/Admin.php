<?php
/*
 * Generated by CRUDigniter v3.2
 * www.crudigniter.com
 */

class Admin extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Model_admin');$this->logged_in();
    }

    private function logged_in() {
        if(! $this->session->userdata('authenticated')) {
            redirect('superAdmin/login');
        }
    }
    /*
     * Listing of admin
     */
    function index()
    {
        $data['admin'] = $this->Model_admin->get_all_admin();

        $data['_view'] = 'admin/index';
        $data['title'] = 'admin [all]';
        $this->load->view('superAdmin/template/header',$data);
        $this->load->view('SuperAdmin/admin/index',$data);
        $this->load->view('superAdmin/template/footer',$data);
    }

    /*
     * Adding a new admin
     */
    function add()
    {
        $this->load->library('form_validation');

		$this->form_validation->set_rules('NAMA','NAMA','required|max_length[1024]');
		$this->form_validation->set_rules('EMAIL','EMAIL','required|max_length[1024]');
		$this->form_validation->set_rules('PASSWORD','PASSWORD','required|max_length[1024]');
		$this->form_validation->set_rules('ID_PLACE','ID PLACE','required');

		if($this->form_validation->run())
        {
            $params = array(
				'ID_PLACE' => $this->input->post('ID_PLACE'),
				'NAMA' => $this->input->post('NAMA'),
				'EMAIL' => $this->input->post('EMAIL'),
				'PASSWORD' => $this->input->post('PASSWORD'),
            );

            $admin_id = $this->Model_admin->add_admin($params);
            redirect('admin/index');
        }
        else
        {
			$this->load->model('Model_place');
			$data['all_place'] = $this->Model_place->get_all_place();

            $data['_view'] = 'admin/add';
            $data['title'] = 'admin [all]';
            $this->load->view('superAdmin/template/header',$data);
            $this->load->view('SuperAdmin/admin/add',$data);
            $this->load->view('superAdmin/template/footer',$data);
        }
    }

    /*
     * Editing a admin
     */
    function edit($ID_ADMIN)
    {
        // check if the admin exists before trying to edit it
        $data['admin'] = $this->Model_admin->get_admin($ID_ADMIN);

        if(isset($data['admin']['ID_ADMIN']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('NAMA','NAMA','required|max_length[1024]');
			$this->form_validation->set_rules('EMAIL','EMAIL','required|max_length[1024]');
			$this->form_validation->set_rules('PASSWORD','PASSWORD','required|max_length[1024]');
			$this->form_validation->set_rules('ID_PLACE','ID PLACE','required');

			if($this->form_validation->run())
            {
                $params = array(
					'ID_PLACE' => $this->input->post('ID_PLACE'),
					'NAMA' => $this->input->post('NAMA'),
					'EMAIL' => $this->input->post('EMAIL'),
					'PASSWORD' => $this->input->post('PASSWORD'),
                );

                $this->Model_admin->update_admin($ID_ADMIN,$params);
                redirect('admin/index');
            }
            else
            {
				$this->load->model('Model_place');
				$data['all_place'] = $this->Model_place->get_all_place();

                $data['title'] = 'admin edit';
                $this->load->view('superAdmin/template/header',$data);
                $this->load->view('SuperAdmin/admin/edit',$data);
                $this->load->view('superAdmin/template/footer',$data);
            }
        }
        else
            show_error('The admin you are trying to edit does not exist.');
    }

    /*
     * Deleting admin
     */
    function remove($ID_ADMIN)
    {
        $admin = $this->Model_admin->get_admin($ID_ADMIN);

        // check if the admin exists before trying to delete it
        if(isset($admin['ID_ADMIN']))
        {
            $this->Model_admin->delete_admin($ID_ADMIN);
            redirect('admin/index');
        }
        else
            show_error('The admin you are trying to delete does not exist.');
    }

}
