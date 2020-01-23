<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Model_identity_answer extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get identity_answer by ID_IDENTITY_ANSWER
     */
    function get_identity_answer($ID_IDENTITY_ANSWER)
    {
        return $this->db->get_where('IDENTITY_ANSWER',array('ID_IDENTITY_ANSWER'=>$ID_IDENTITY_ANSWER))->row_array();
    }
        
    /*
     * Get all identity_answer
     */
    function get_all_identity_answer()
    {
        $this->db->order_by('ID_IDENTITY_ANSWER', 'desc');
        return $this->db->get('IDENTITY_ANSWER')->result_array();
    }
        
    /*
     * function to add new identity_answer
     */
    function add_identity_answer($params)
    {
        $this->db->insert('IDENTITY_ANSWER',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update identity_answer
     */
    function update_identity_answer($ID_IDENTITY_ANSWER,$params)
    {
        $this->db->where('ID_IDENTITY_ANSWER',$ID_IDENTITY_ANSWER);
        return $this->db->update('IDENTITY_ANSWER',$params);
    }
    
    /*
     * function to delete identity_answer
     */
    function delete_identity_answer($ID_IDENTITY_ANSWER)
    {
        return $this->db->delete('IDENTITY_ANSWER',array('ID_IDENTITY_ANSWER'=>$ID_IDENTITY_ANSWER));
    }
}
