<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller 
{
	function __construct()
	{
        parent::__construct();
		chk_logged_admin();
    }
	
	public function index()
	{
		$this->load->view(ADMINCP.'/dashboard');
	}
	
	public function logout()
	{
        session_unset();
		session_destroy();
        redirect(ADMINCP . '/login');
    }
}