<?php
/*
 * Generated by CRUDigniter v3.2
 * www.crudigniter.com
 */

class Form_detail extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Model_form_detail');
    }

    /*
     * Listing of form_detail
     */
    function index()
    {
        $data['form_detail'] = $this->Model_form_detail->get_all_form_detail();

        $data['_view'] = 'form_detail/index';
        $data['title'] = 'Form detail';

        $this->load->view('AdminUser/template/header',$data);
        $this->load->view('AdminUser/form_detail/index',$data);
        $this->load->view('AdminUser/template/footer',$data);
    }

    /*
     * Adding a new form_detail
     */
    function add()
    {
        if(isset($_POST) && count($_POST) > 0)
        {
            $params = array(
				'ID_SUBMIT' => $this->input->post('ID_SUBMIT'),
				'NO_RESPONDEN' => $this->input->post('NO_RESPONDEN'),
				'KODE_SURVEYOR' => $this->input->post('KODE_SURVEYOR'),
				'UNIT_PELAYANAN' => $this->input->post('UNIT_PELAYANAN'),
            );

            $form_detail_id = $this->Model_form_detail->add_form_detail($params);
            redirect('form_detail/index');
        }
        else
        {
            $data['_view'] = 'form_detail/add';
            $this->load->view('layouts/main',$data);
        }
    }

    /*
     * Editing a form_detail
     */
    function edit($ID)
    {
        // check if the form_detail exists before trying to edit it
        $data['form_detail'] = $this->Model_form_detail->get_form_detail($ID);

        if(isset($data['form_detail']['ID']))
        {
            if(isset($_POST) && count($_POST) > 0)
            {
                $params = array(
					'ID_SUBMIT' => $this->input->post('ID_SUBMIT'),
					'NO_RESPONDEN' => $this->input->post('NO_RESPONDEN'),
					'KODE_SURVEYOR' => $this->input->post('KODE_SURVEYOR'),
					'UNIT_PELAYANAN' => $this->input->post('UNIT_PELAYANAN'),
                );

                $this->Model_form_detail->update_form_detail($ID,$params);
                redirect('form_detail/index');
            }
            else
            {
                $data['_view'] = 'form_detail/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The form_detail you are trying to edit does not exist.');
    }

    /*
     * Deleting form_detail
     */
    function remove($ID)
    {
        $form_detail = $this->Model_form_detail->get_form_detail($ID);

        // check if the form_detail exists before trying to delete it
        if(isset($form_detail['ID']))
        {
            $this->Model_form_detail->delete_form_detail($ID);
            redirect('form_detail/index');
        }
        else
            show_error('The form_detail you are trying to delete does not exist.');
    }

}