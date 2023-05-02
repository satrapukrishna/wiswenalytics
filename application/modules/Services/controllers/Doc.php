<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Doc extends MX_Controller
{
    /*function __construct()
    {
        parent::__construct();
        //modules::run('login/is_logged_in');
    }*/
    
    //api documentation
    function index()
    {
        $this->load->view('api_doc');
    }
	
    
    
}