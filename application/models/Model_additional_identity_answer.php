<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Model_additional_identity_answer extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get additional_identity_answer by ID_ADDITIONAL_IDENTITY_ANSWER
     */
    function get_additional_identity_answer($ID_ADDITIONAL_IDENTITY_ANSWER)
    {
        return $this->db->get_where('ADDITIONAL_IDENTITY_ANSWER',array('ID_ADDITIONAL_IDENTITY_ANSWER'=>$ID_ADDITIONAL_IDENTITY_ANSWER))->row_array();
    }
        
    /*
     * Get all additional_identity_answer
     */
    function get_all_additional_identity_answer()
    {
        $this->db->order_by('ID_ADDITIONAL_IDENTITY_ANSWER', 'desc');
        return $this->db->get('ADDITIONAL_IDENTITY_ANSWER')->result_array();
    }
        
    /*
     * function to add new additional_identity_answer
     */
    function add_additional_identity_answer($params)
    {
        $this->db->insert('ADDITIONAL_IDENTITY_ANSWER',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update additional_identity_answer
     */
    function update_additional_identity_answer($ID_ADDITIONAL_IDENTITY_ANSWER,$params)
    {
        $this->db->where('ID_ADDITIONAL_IDENTITY_ANSWER',$ID_ADDITIONAL_IDENTITY_ANSWER);
        return $this->db->update('ADDITIONAL_IDENTITY_ANSWER',$params);
    }
    
    /*
     * function to delete additional_identity_answer
     */
    function delete_additional_identity_answer($ID_ADDITIONAL_IDENTITY_ANSWER)
    {
        return $this->db->delete('ADDITIONAL_IDENTITY_ANSWER',array('ID_ADDITIONAL_IDENTITY_ANSWER'=>$ID_ADDITIONAL_IDENTITY_ANSWER));
    }
}
