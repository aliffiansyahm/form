<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Model_additional_identity_question extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get additional_identity_question by ID_ADDITIONAL_IDENTITY_QUESTION
     */
    function get_additional_identity_question($ID_ADDITIONAL_IDENTITY_QUESTION)
    {
        return $this->db->get_where('ADDITIONAL_IDENTITY_QUESTION',array('ID_ADDITIONAL_IDENTITY_QUESTION'=>$ID_ADDITIONAL_IDENTITY_QUESTION))->row_array();
    }
        
    /*
     * Get all additional_identity_question
     */
    function get_all_additional_identity_question()
    {
        $this->db->order_by('ID_ADDITIONAL_IDENTITY_QUESTION', 'desc');
        return $this->db->get('ADDITIONAL_IDENTITY_QUESTION')->result_array();
    }
        
    /*
     * function to add new additional_identity_question
     */
    function add_additional_identity_question($params)
    {
        $this->db->insert('ADDITIONAL_IDENTITY_QUESTION',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update additional_identity_question
     */
    function update_additional_identity_question($ID_ADDITIONAL_IDENTITY_QUESTION,$params)
    {
        $this->db->where('ID_ADDITIONAL_IDENTITY_QUESTION',$ID_ADDITIONAL_IDENTITY_QUESTION);
        return $this->db->update('ADDITIONAL_IDENTITY_QUESTION',$params);
    }
    
    /*
     * function to delete additional_identity_question
     */
    function delete_additional_identity_question($ID_ADDITIONAL_IDENTITY_QUESTION)
    {
        return $this->db->delete('ADDITIONAL_IDENTITY_QUESTION',array('ID_ADDITIONAL_IDENTITY_QUESTION'=>$ID_ADDITIONAL_IDENTITY_QUESTION));
    }
}
