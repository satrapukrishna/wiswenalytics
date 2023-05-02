<?php


class Site extends MX_Controller {





    public function __construct() {


        parent::__construct();


    }


    function auth($permission){  


        $permissions = $this->db->get_where('employees',array('user_id' => $this->session->userdata('user_id')))->row_array();


        if(in_array($permission,explode(',',$permissions['permissions']))){


            return true;


        }else{


            redirect('admin/home');


        }


    }


    function authlink($permission){   


        $permissions = $this->db->get_where('employees',array('user_id' => $this->session->userdata('user_id')))->row_array();


        if(in_array($permission,explode(',',$permissions['permissions']))){


            return true;


        }else{


            return 0;


        }


    }


}