<?php
class SearchModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        //$this->load->database();

    }


    function searchResultData($query)
    {
    	$table = 'employee';
        $this->db->select('*');
        $this->db->from($table);
        $this->db->like('name', $query);
        $query = $this->db->get();
        return $result = $query->result_array();
    }

    function autosuggestData($query)
    {
    	$table = 'employee';
        $this->db->select('name');
        $this->db->from($table);
        $this->db->like('name', $query);
        $query = $this->db->get();
        return $result = $query->result_array();
    }
}    

