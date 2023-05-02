<?php
class Account_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
	
    function get_employee_by_email($to, $data = array())
    {        
        $this->db->select($data);
        $this->db->from('employees');
        $this->db->where('email_id', $to);
        $user = $this->db->get()->row_array();
        return $user;
    }
	
	 function update_employee($emp_id, $emp_data)
    {
        if ($emp_id != '' && count($emp_data) > 0)
        {
            $res = $this->db->update('employees', $emp_data, array('emp_id' => $emp_id));
            return $res;
        } else
        {
            return false;
        }
    }
	function get_client($id)
    {        
        $this->db->select();
        $this->db->from('clients');
        $this->db->where('client_id', $id);
        $user = $this->db->get()->row_array();
        return $user;
    }
	
   
}