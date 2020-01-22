<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller 
{
	function __construct()
	{
        parent::__construct();
		/*if(chk_logged_admin() === true)
		{
            redirect(ADMINCP.'/dashboard');
        }*/
		
    }
	
	public function index()
	{
		
		$this->load->view(ADMINCP.'/login');
	}

	public function validate_login_admin()
	{
		$this->load->model(ADMINCP.'/login_model');
		/////////
		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
			
		if (!$this->form_validation->run())
		{
			echo json_encode(array("status"=>"error","desc"=>validation_errors()));
		}
		else
		{
			$username = $this->input->post('username');
			$password = hash('sha256',$this->input->post('password'));
			$login_usr = $this->login_model->login_admin($username,$password);
			if(is_array($login_usr))
			{
				if($login_usr['status'] == 'A')
				{
					$_SESSION['gn_admin_uid'] = $login_usr['uid'];
					$_SESSION['gn_admin_uname'] = $login_usr['uname'];
					$_SESSION['gn_admin_level'] = $login_usr['level'];
					$user_log = $this->login_model->insert_admin_access_log($login_usr['uid']);
					echo json_encode(array("status"=>"success","desc"=>"Logged in succesfully, please wait..."));
				}
				else
				{
					echo json_encode(array("status"=>"error","desc"=>"Account is disabled, please contact admin"));
				}
			}
			else echo json_encode(array("status"=>"error","desc"=>"Wrong username or password!"));
		}
		
		
		/////////
		
	}
	
	
}

?>