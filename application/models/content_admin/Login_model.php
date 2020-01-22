<?php
class Login_model extends CI_Model
{
	//////authenticate user login with username and password//////
	function login_admin($userid,$pass)
	{
		$this->db->where("uname",$userid);
		$this->db->where("pass",$pass);
		
		$query = $this->db->get('admin');
		//echo $this->db->last_query();
		if ($query->num_rows() > 0)
		{
			$res = $query->row_array();
			$this->db->set('last_login',time());
			$this->db->where('uid',$res['uid']);
			$this->db->update('admin');
			$result = $query->row_array();
			return $result;
		}
	}
	
	///insert admin logs/////
	function insert_admin_access_log($uid)
	{
		if (!empty($_SERVER["HTTP_CLIENT_IP"])) $ip = $_SERVER["HTTP_CLIENT_IP"];
		elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])) $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
		else $ip = $_SERVER["REMOTE_ADDR"];
		$user_agent = $_SERVER['HTTP_USER_AGENT'];
		$data=array(
					"uid"=>$uid,
					"ip"=>$ip,
					"user_agent"=>$user_agent,
					"time"=>time(),
					);
		$sql = $this->db->insert('admin_access_logs', $data);
		if($sql) return true;
	}
	
}

?>