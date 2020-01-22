<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/////check logged admin//////
function chk_logged_admin()
{
	if(isset($_SESSION['gn_admin_uid']) && !empty($_SESSION['gn_admin_uid'])) return true;
	else 
	{
		redirect(ADMINCP.'/login');
		die();
	}
}

function print_r_custom ($val)
{
	echo '<pre>';
	print_r($val);
	echo '</pre>';
}

?>