<?php
/*
 * Generated by CRUDigniter v3.2
 * www.crudigniter.com
 */

class Place_type extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Model_place_type');
    }

    /*
     * Listing of place_type
     */
    function index()
    {
        $data['place_type'] = $this->Model_place_type->get_all_place_type();

        $data['_view'] = 'place_type/index';
        $this->load->view('SuperAdmin/place_type/index',$data);
    }

    /*
     * Adding a new place_type
     */
    function add()
    {
        $this->load->library('form_validation');

    		$this->form_validation->set_rules('TYPE','TYPE','required|max_length[255]');

    		if($this->form_validation->run())
            {
                $params = array(
    				'TYPE' => $this->input->post('TYPE'),
                );

            $place_type_id = $this->Model_place_type->add_place_type($params);
            redirect('place_type/index');
        }
        else
        {
            $data['_view'] = 'place_type/add';
            $this->load->view('SuperAdmin/place_type/add',$data);
        }
    }

    /*
     * Editing a place_type
     */
    function edit($ID_PLACE_TYPE)
    {
        // check if the place_type exists before trying to edit it
        $data['place_type'] = $this->Model_place_type->get_place_type($ID_PLACE_TYPE);

        if(isset($data['place_type']['ID_PLACE_TYPE']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('TYPE','TYPE','required|max_length[255]');

			if($this->form_validation->run())
            {
                $params = array(
					'TYPE' => $this->input->post('TYPE'),
                );

                $this->Model_place_type->update_place_type($ID_PLACE_TYPE,$params);
                redirect('place_type/index');
            }
            else
            {
                $data['_view'] = 'place_type/edit';
                $this->load->view('SuperAdmin/place_type/edit',$data);
            }
        }
        else
            show_error('The place_type you are trying to edit does not exist.');
    }

    /*
     * Deleting place_type
     */
    function remove($ID_PLACE_TYPE)
    {
        $place_type = $this->Model_place_type->get_place_type($ID_PLACE_TYPE);

        // check if the place_type exists before trying to delete it
        if(isset($place_type['ID_PLACE_TYPE']))
        {
            $this->Model_place_type->delete_place_type($ID_PLACE_TYPE);
            redirect('place_type/index');
        }
        else
            show_error('The place_type you are trying to delete does not exist.');
    }

}
