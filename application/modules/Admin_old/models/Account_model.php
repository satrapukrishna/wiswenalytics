<?php
class Account_model extends CI_Model{
	function __construct(){
	      parent::__construct();
    }
	
	function insert_account($data) {
        if (count($data) > 0) {
            $res = $this->db->insert('accounts', $data);
            return $res;
        }
        return false;
    }
	
	function get_accounts($web_options) {

        $start = $web_options['start'];
        $limit = $web_options['limit'];
        $search_keyword = $web_options['search_keyword'];
		$from_date = $web_options['from_date'];
        $to_date = $web_options['to_date'];
		$from = ($from_date) ? date('Y-m-d 00:00:00',strtotime($from_date)) : '';
        $to = ($to_date) ? date('Y-m-d 23:59:59',strtotime($to_date)) : '';
		
		$this->db->select('a.*');
        $this->db->from('accounts as a');
		// $this->db->join('clients as c', 'c.client_id=a.client_id','left');
       
        if ($search_keyword != '') {
            $this->db->where("(a.client LIKE '%" . $search_keyword . "%' OR a.account_type LIKE '%" . $search_keyword . "%')");
        }    
		if($from != ''){
            $this->db->where("a.created_time >= ",$from);
        }
        if($to != ''){
            $this->db->where("a.created_time <= ",$to);
        }
		$this->db->where('a.created_by',$this->session->userdata('user_id'));
        if($limit!=''){
            $this->db->limit($limit, $start);
			}
        $websites = $this->db->get();
		
		
        $this->db->select('count(a.account_id) as ttl_rows');
        $this->db->from('accounts as a');
		// $this->db->join('clients as c', 'c.client_id=a.client_id','left');
        
        if ($search_keyword != '') {
            $this->db->where("(a.account_type LIKE '%" . $search_keyword . "%')");
        }
        $row = $this->db->get()->row();
        $websites->ttl_rows = $row->ttl_rows;
        return $websites;
    }
	
	function get_account($account_id) {
        $this->db->select('');
        $this->db->from('accounts');
        $this->db->where('account_id', $account_id);
        $page = $this->db->get()->row_array();
        return $page;
    }
	
	function update_account($account_id, $data) {
        if ($account_id != '') {
            $this->db->where('account_id', $account_id);
            $page = $this->db->update('accounts', $data);
            return $page;
        }
        return false;
    }
	
	function delete_account($account_id) {
		
        if ($account_id != '') {
            $this->db->where('account_id', $account_id);
            $page = $this->db->delete('accounts');
            return $page;
        }

        return false;
    }
	
}