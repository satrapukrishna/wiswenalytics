<?php
class Partner_model extends CI_Model{
	function __construct(){
	      parent::__construct();
    }
	
	function insert_partner($data) {
        if (count($data) > 0) {
            $res = $this->db->insert('partners', $data);
            return $res;
        }
        return false;
    }
	
	function get_partners($web_options) {

        $start = $web_options['start'];
        $limit = $web_options['limit'];
        $search_keyword = $web_options['search_keyword'];
		
		$this->db->select('p.*');
        $this->db->from('partners as p');
       
        if ($search_keyword != '') {
            $this->db->where("(p.partner_name LIKE '%" . $search_keyword . "%' OR p.partner_type LIKE '%" . $search_keyword . "%')");
        }      

        if($limit!=''){
            $this->db->limit($limit, $start);
			}
        $websites = $this->db->get();
		
		
        $this->db->select('count(p.partner_id) as ttl_rows');
        $this->db->from('partners as p');
        
        if ($search_keyword != '') {
            $this->db->where("(p.partner_name LIKE '%" . $search_keyword . "%' OR p.partner_type LIKE '%" . $search_keyword . "%')");
        }
        $row = $this->db->get()->row();
        $websites->ttl_rows = $row->ttl_rows;
        return $websites;
    }
	
	function get_partner($p_id) {
        $this->db->select('');
        $this->db->from('partners');
        $this->db->where('partner_id', $p_id);
        $page = $this->db->get()->row_array();
        return $page;
    }
	
	function update_partner($partner_id, $data) {
        if ($partner_id != '') {
            $this->db->where('partner_id', $partner_id);
            $page = $this->db->update('partners', $data);
            return $page;
        }
        return false;
    }
	
	function delete_partner($partner_id) {
		
        if ($partner_id != '') {
            $this->db->where('partner_id', $partner_id);
            $page = $this->db->delete('partners');
            return $page;
        }

        return false;
    }
	
}